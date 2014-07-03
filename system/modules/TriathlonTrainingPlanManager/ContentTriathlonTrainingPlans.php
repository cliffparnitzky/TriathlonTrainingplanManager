<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2013 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2013
 * @author     Cliff Parnitzky
 * @package    TriathlonTrainingPlanManager
 * @license    LGPL
 */

/**
 * Class ContentTriathlonTrainingPlans
 *
 * Content element "triathlonTrainingPlan".
 * @copyright  Cliff Parnitzky 2013
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class ContentTriathlonTrainingPlans extends ContentElement 
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_triathlonTrainingPlan';

	/**
	 * 	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE') {
			$objTemplate = new BackendTemplate('be_wildcard');
			
			$objTemplate->wildcard = '### TRIATHLON TRAINING PLAN ###';
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
		if (TL_MODE == 'FE' && $this->triathlonTrainingPlanTemplate != $strTemplate)
		{
			$this->strTemplate = $this->triathlonTrainingPlanTemplate;

			$this->Template = new FrontendTemplate($this->strTemplate);
			$this->Template->setData($this->arrData);
		}
		
		$arrPlanIds = array();
		
		if ($this->triathlonTrainingPlanSource == 'choose')
		{
			$arrPlanIds[] = $this->triathlonTrainingPlan;
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
				$this->Template->errorMsg = $GLOBALS['TL_LANG']['ERR']['TriathlonTrainingPlan_NoPlans'];
			}
		}
		else
		{
			$this->Template->error = true;
			$this->Template->errorMsg = $GLOBALS['TL_LANG']['ERR']['TriathlonTrainingPlan_NoIds'];
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
			$this->loadLanguageFile('tl_triathlon_training_plans'); 
			$objPlan = $this->Database->prepare("SELECT * FROM tl_triathlon_training_plans WHERE published=1 AND id IN (" . implode(",", $arrIds) . ")")
									  ->execute();
			
			while ($objPlan->next())
			{
				$plan = array
				(
					'title'                 => $objPlan->title,
					'titleLabel'            => $GLOBALS['TL_LANG']['tl_triathlon_training_plans']['title'][0],
					'date'                  => $objPlan->date,
					'dateText'              => $this->parseDate($GLOBALS['TL_CONFIG']['dateFormat'], $objPlan->date),
					'dateLabel'             => $GLOBALS['TL_LANG']['tl_triathlon_training_plans']['date'][0],
					'kindOfSport'           => $objPlan->kindOfSport,
					'kindOfSportText'       => $GLOBALS['TL_LANG']['TriathlonTrainingPlan']['kindOfSport'][$objPlan->kindOfSport],
					'kindOfSportImage'      => '<img src="system/modules/TriathlonTrainingPlanManager/html/plan_' . $objPlan->kindOfSport . '.png" title="' . $GLOBALS['TL_LANG']['TriathlonTrainingPlan']['kindOfSport'][$objPlan->kindOfSport] . '" alt="' . $GLOBALS['TL_LANG']['TriathlonTrainingPlan']['kindOfSport'][$objPlan->kindOfSport] . '" />',
					'kindOfSportLabel'      => $GLOBALS['TL_LANG']['tl_triathlon_training_plans']['kindOfSport'][0],
					'forPerformanceClass'   => $objPlan->assignmentForPerformanceClass,
					'performanceClass'      => $objPlan->assignmentPerformanceClass,
					'performanceClassText'  => $GLOBALS['TL_LANG']['TriathlonTrainingPlan']['performanceClass'][$objPlan->assignmentPerformanceClass][0],
					'performanceClassLabel' => $GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentPerformanceClass'][0],
					'forMembers'            => $objPlan->assignmentForMembers,
					'members'               => $this->getMembers(deserialize($objPlan->assignmentMembers)),
					'membersLabel'          => $GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentMembers'][0],
					'forMemberGroups'       => $objPlan->assignmentForMemberGroups,
					'memberGroups'          => $this->getMemberGroups(deserialize($objPlan->assignmentMemberGroups)),
					'memberGroupsLabel'     => $GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentMemberGroups'][0],
					'comment'               => $objPlan->comment,
					'commentLabel'          => $GLOBALS['TL_LANG']['tl_triathlon_training_plans']['comment'][0]
				);
				
				$instructions = $this->getInstructions(deserialize($objPlan->instructions));
				$plan['instructions'] = $instructions;
				$plan['instructionsLabel'] = $GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructions'][0];
				
				$plan['totalSums'] = $this->getTotalSums($instructions);
				$plan['totalSumsLabel'] = (count($plan['totalSums']) > 1 ) ? $GLOBALS['TL_LANG']['TriathlonTrainingPlan']['totalSums'] : $GLOBALS['TL_LANG']['TriathlonTrainingPlan']['totalSum'];
				
				$arrPlans[] = $plan;
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
			$time = time();
			$objMember = $this->Database->prepare("SELECT * FROM tl_member WHERE disable!=1 AND (start='' OR start<$time) AND (stop='' OR stop>$time) AND id IN (" . implode(",", $arrMemberIds) . ")")
										->execute();
			
			while ($objMember->next())
			{
				$arrMembers[] = array
				(
					'id'        => $objMember->id,
					'firstname' => $objMember->firstname,
					'lastname'  => $objMember->lastname,
					'name'      => $objMember->firstname . ' ' . $objMember->lastname
				);
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
			$time = time();
			$objMemberGroup = $this->Database->prepare("SELECT * FROM tl_member_group WHERE disable!=1 AND (start='' OR start<$time) AND (stop='' OR stop>$time) AND id IN (" . implode(",", $arrMemberGroupIds) . ")")
											 ->execute();
			
			while ($objMemberGroup->next())
			{
				$arrMemberGroups[] = array
				(
					'id'   => $objMemberGroup->id,
					'name' => $objMemberGroup->name
				);
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
					'block'				=> $instruction['block'],
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