<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2015 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2013-2015
 * @author     Cliff Parnitzky
 * @package    TriathlonTrainingplanManager
 * @license    LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace TriathlonTrainingplanManager;

/**
 * Class ContentTriathlonTrainingplanManagerPlan
 *
 * Content element "TriathlonTrainingplan".
 * @copyright  Cliff Parnitzky 2013-2015
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class ContentTriathlonTrainingplanManagerPlan extends \ContentElement
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_triathlonTrainingplanManagerPlan';

	/**
	 * Generate content element
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['triathlonTrainingplanManagerPlan'][0]) . ' ###';
			$objTemplate->title = $this->headline;

			return $objTemplate->parse();
		}

		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{
		$arrPlanIds = array();

		if ($this->triathlonTrainingplanManagerPlanSource == 'choose')
		{
			$arrPlanIds[] = $this->triathlonTrainingplanManagerPlanSelection;
		}

		if (count($arrPlanIds) > 0)
		{
			$plans = $this->getTrainingplans($arrPlanIds);

			if (count($plans) > 0)
			{
				$this->Template->error = false;
				$this->Template->plans = $plans;
			}
			else
			{
				$this->Template->error = true;
				$this->Template->errorMsg = count($arrPlanIds) == 1 ? $GLOBALS['TL_LANG']['ERR']['TriathlonTrainingplan_NoPlan'] : $GLOBALS['TL_LANG']['ERR']['TriathlonTrainingplan_NoPlans'];
			}
		}
		else
		{
			$this->Template->error = true;
			$this->Template->errorMsg = $GLOBALS['TL_LANG']['ERR']['TriathlonTrainingplan_NoIds'];
		}
	}

	/**
	 * Get all training plans for the given ids
	 */
	private function getTrainingplans($arrIds)
	{
		$arrPlans = array();

		if (is_array($arrIds) && count($arrIds) > 0)
		{
			$this->loadLanguageFile('tl_triathlon_trainingplans');

			$objPlans = \TriathlonTrainingplansModel::findPublishedByIds($arrIds);

			if ($objPlans != null)
			{
				while ($objPlans->next())
				{
					$plan = array
					(
						'title'                 => $objPlans->title,
						'titleLabel'            => $GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['title'][0],
						'date'                  => $objPlans->date,
						'dateText'              => $this->parseDate($GLOBALS['TL_CONFIG']['dateFormat'], $objPlans->date),
						'dateLabel'             => $GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['date'][0],
						'kindOfSport'           => $objPlans->kindOfSport,
						'kindOfSportText'       => $GLOBALS['TL_LANG']['TriathlonTrainingplan']['kindOfSport'][$objPlans->kindOfSport],
						'kindOfSportImage'      => '<img src="system/modules/TriathlonTrainingplanManager/assets/plan_' . $objPlans->kindOfSport . '.png" title="' . $GLOBALS['TL_LANG']['TriathlonTrainingplan']['kindOfSport'][$objPlans->kindOfSport] . '" alt="' . $GLOBALS['TL_LANG']['TriathlonTrainingplan']['kindOfSport'][$objPlans->kindOfSport] . '" />',
						'kindOfSportLabel'      => $GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['kindOfSport'][0],
						'forPerformanceClass'   => $objPlans->assignmentForPerformanceClass,
						'performanceClass'      => $objPlans->assignmentPerformanceClass,
						'performanceClassText'  => $GLOBALS['TL_LANG']['TriathlonTrainingplan']['performanceClass'][$objPlans->assignmentPerformanceClass][0],
						'performanceClassLabel' => $GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentPerformanceClass'][0],
						'forMembers'            => $objPlans->assignmentForMembers,
						'members'               => $this->getMembers(deserialize($objPlans->assignmentMembers)),
						'membersLabel'          => $GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentMembers'][0],
						'forMemberGroups'       => $objPlans->assignmentForMemberGroups,
						'memberGroups'          => $this->getMemberGroups(deserialize($objPlans->assignmentMemberGroups)),
						'memberGroupsLabel'     => $GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentMemberGroups'][0],
						'comment'               => $objPlans->comment,
						'commentLabel'          => $GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['comment'][0]
					);

					$instructions = $this->getInstructions(deserialize($objPlans->instructions));
					$plan['instructions'] = $instructions;
					$plan['instructionsLabel'] = $GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructions'][0];

					$plan['totalSums'] = $this->getTotalSums($instructions);
					$plan['totalSumsLabel'] = (count($plan['totalSums']) > 1 ) ? $GLOBALS['TL_LANG']['TriathlonTrainingplan']['totalSums'] : $GLOBALS['TL_LANG']['TriathlonTrainingplan']['totalSum'];

					$arrPlans[] = $plan;
				}
			}
		}

		return $arrPlans;
	}

	/**
	 * Fetches a simple array of the assigned members.
	 */
	private function getMembers($arrMemberIds)
	{
		$arrMembers = array();
		if (is_array($arrMemberIds) && count($arrMemberIds) > 0)
		{
			$objMembers = \MemberModel::findActiveByIds($arrMemberIds);

			if ($objMembers != null)
			{
				while ($objMembers->next())
				{
					$arrMembers[] = array
					(
						'id'        => $objMembers->id,
						'firstname' => $objMembers->firstname,
						'lastname'  => $objMembers->lastname,
						'name'      => $objMembers->firstname . ' ' . $objMembers->lastname
					);
				}
			}
		}
		return $arrMembers;
	}

	/**
	 * Fetches a simple array of the assigned member groups.
	 */
	private function getMemberGroups($arrMemberGroupIds)
	{
		$arrMemberGroups = array();
		if (is_array($arrMemberGroupIds) && count($arrMemberGroupIds) > 0)
		{
			$objMemberGroups = \MemberGroupModel::findActiveByIds($arrMemberGroupIds);

			if ($objMemberGroups != null)
			{
				while ($objMemberGroups->next())
				{
					$arrMemberGroups[] = array
					(
						'id'   => $objMemberGroups->id,
						'name' => $objMemberGroups->name
					);
				}
			}
		}
		return $arrMemberGroups;
	}

	/**
	 * Get all instructions grouped by block
	 */
	private function getInstructions($arrInstructions)
	{
		$instructions = array();
		if (is_array($arrInstructions) && count($arrInstructions) > 0)
		{
			foreach($arrInstructions as $instruction)
			{
				$block = $instruction['block'];
				if (strlen($block) == 0)
				{
					$block = "-";
				}
				$instructions[$block][] = array
				(
					'block'			=> $instruction['block'],
					'repetition'	=> $instruction['repetition'],
					'interval'		=> deserialize($instruction['interval']),
					'description'	=> $instruction['description'],
					'execution'		=> $instruction['execution']
				);
			}
		}
		return $instructions;
	}

	/**
	 * Calculates all sums.
	 */
	private function getTotalSums($arrInstructions)
	{
		$arrTotalSums = array();
		if (is_array($arrInstructions) && count($arrInstructions) > 0)
		{
			foreach($arrInstructions as $block)
			{
				foreach($block as $instruction)
				{
					$unit = $instruction['interval']['unit'];
					$interval = $instruction['interval']['value'];
					$repetition = $instruction['repetition'];

					$value = ($interval * $repetition);

					$existingValue = $arrTotalSums[$unit];

					$arrTotalSums[$unit] = $existingValue + $value;
				}
			}
		}
		return $arrTotalSums;
	}
}

?>