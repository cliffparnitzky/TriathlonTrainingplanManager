<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'triathlonLeagueRatingType';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'triathlonLeagueColumns';

$GLOBALS['TL_DCA']['tl_module']['palettes']['triathlonTrainingPlanManagerListing'] = '{title_legend},name,headline,type;{ligatable_legend},triathlonLeagueRatingType;{template_legend:hide},triathlonLeagueTableTemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['subpalettes']['triathlonLeagueRatingType_men_mixed'] = 'triathlonLeagueColumns'; 
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['triathlonLeagueRatingType_women']     = 'triathlonLeagueColumns'; 
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['triathlonLeagueColumns_pkt']          = 'triathlonLeagueTable,triathlonLeagueAutoSortTable,triathlonLeagueUpdateDate,triathlonLeagueRaceCount'; 
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['triathlonLeagueColumns_wp_pz']        = 'triathlonLeagueTable,triathlonLeagueAutoSortTable,triathlonLeagueUpdateDate,triathlonLeagueRaceCount'; 


$GLOBALS['TL_DCA']['tl_module']['config']['onsubmit_callback'][] = array('tl_module_RscTriathlonLeagueManager', 'storeLeagueTable');

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['triathlonLeagueRatingType'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueRatingType'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('men_mixed', 'women'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueRatingTypeOptions'],
	'load_callback'           => array(array('tl_module_RscTriathlonLeagueManager', 'setSelectedRatingType')),
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'includeBlankOption'=>true, 'submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['triathlonLeagueColumns'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueColumns'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('pkt', 'wp_pz'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueColumnsOptions'],
	'load_callback'           => array(array('tl_module_RscTriathlonLeagueManager', 'setSelectedColumns')),
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'includeBlankOption'=>true, 'submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['triathlonLeagueTable'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueTable'],
	'inputType'               => 'multiColumnWizard',
	'eval'                    => array
	(
		'mandatory'       => false,
		'style'           => 'min-width: 100%;',
		'tl_class'        =>'clr',
		'minCount'        => 1,
		//'buttons'         => array('up' => false, 'down' => false),
		'columnsCallback' =>array('tl_module_RscTriathlonLeagueManager', 'getLeagueTableColumns')
	)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['triathlonLeagueAutoSortTable'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueAutoSortTable'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr m12 w50', 'submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['triathlonLeagueUpdateDate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueUpdateDate'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'clr w50 wizard')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['triathlonLeagueRaceCount'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueRaceCount'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'multiple'=>true, 'size'=>2, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['triathlonLeagueTableTemplate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueTableTemplate'],
	'default'                 => 'pl_ce_list_default',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_RscTriathlonLeagueManager', 'getTableTemplates'),
	'eval'                    => array('tl_class'=>'clr')
); 

/**
 * Class tl_module_TriathlonTrainingPlanManager
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * PHP version 5
 * @copyright  Cliff Parnitzky 2011
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_module_TriathlonTrainingPlanManager extends Backend
{
	public static $selectedRatingType;
	public static $selectedColumns;
	
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Used to remember the selected rating type
	 * @param String $value
	 * @return the value
	 */
	public function setSelectedRatingType($value)
	{
		tl_module_RscTriathlonLeagueManager::$selectedRatingType = $value;
		return $value;
	}
	
	/**
	 * Used to remember the selected rating type
	 * @param String $value
	 * @return the value
	 */
	public function setSelectedColumns($value)
	{
		tl_module_RscTriathlonLeagueManager::$selectedColumns = $value;
		return $value;
	}
	
	/**
	 * Get all calendars and return them as array
	 * @return array
	 */
	public function getTeams(MultiColumnWizard $mcw)
	{
		$selectedTeams = array();
		foreach ($mcw->value as $option) {
			$selectedTeams[] = $option['triathlonLeagueTableTeam'];
		}
		
		$arrTeams = array();
		$objTeams = $this->Database->prepare("SELECT id, name FROM tl_triathlon_league_teams WHERE ratingType = ? ORDER BY name")->execute(tl_module_RscTriathlonLeagueManager::$selectedRatingType);

		while ($objTeams->next())
		{
			if ($objTeams->id == $selectedTeams[$mcw->activeRow] || !in_array($objTeams->id, $selectedTeams))
			{
				$arrTeams[$objTeams->id] = $objTeams->name;
			}
		}
	
		return $arrTeams;
	}
	
	/**
	 * Get the columns for the league table
	 * @return array
	 */
	public function getLeagueTableColumns (MultiColumnWizard $mcw)
	{
		$arrColumns = array();
		$arrColumns['triathlonLeagueTablePlace'] = array
		(
			'label'            => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueTablePlace'],
			'exclude'          => true,
			'inputType'        => 'text',
			'eval'             => array('style'=>'width: 40px;')
		);
		
		$arrColumns['triathlonLeagueTableTeam'] = array
		(
			'label'            => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueTableTeam'],
			'exclude'          => true,
			'inputType'        => 'select',
			'options_callback' => array('tl_module_RscTriathlonLeagueManager', 'getTeams'),
			'eval'             => array('style'=>'width: 95%;', 'includeBlankOption'=>true, 'mandatory'=>true, 'submitOnChange'=>true)
		);
		
		if (tl_module_RscTriathlonLeagueManager::$selectedColumns == 'wp_pz')
		{
			$arrColumns['triathlonLeagueTableScoringPoints'] = array
			(
				'label'            => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueTableScoringPoints'],
				'exclude'          => true,
				'inputType'        => 'text',
				'eval'             => array('style'=>'width: 95%;', 'mandatory'=>true, 'rgxp'=>'digit')
			);
			
			$arrColumns['triathlonLeagueTablePlaceNumber'] = array
			(
				'label'            => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueTablePlaceNumber'],
				'exclude'          => true,
				'inputType'        => 'text',
				'eval'             => array('style'=>'width: 95%;', 'mandatory'=>true, 'rgxp'=>'digit')
			);
		}
		else if (tl_module_RscTriathlonLeagueManager::$selectedColumns == 'pkt')
		{
			$arrColumns['triathlonLeagueTablePoints'] = array
			(
				'label'            => &$GLOBALS['TL_LANG']['tl_module']['triathlonLeagueTablePoints'],
				'exclude'          => true,
				'inputType'        => 'text',
				'eval'             => array('style'=>'width: 95%;', 'mandatory'=>true, 'rgxp'=>'digit')
			);
		}
		
		return $arrColumns;
	}
	
	function comparePkt($a, $b)
	{
		if ($a['triathlonLeagueTablePoints'] == $b['triathlonLeagueTablePoints']) {
			return 0;
		}
		return ($a['triathlonLeagueTablePoints'] < $b['triathlonLeagueTablePoints']) ? -1 : 1;
	}
	
	function compareWpPz($a, $b)
	{
		if ($a['triathlonLeagueTableScoringPoints'] == $b['triathlonLeagueTableScoringPoints']) {
			if ($a['triathlonLeagueTablePlaceNumber'] == $b['triathlonLeagueTablePlaceNumber']) {
				return 0;
			}
			return ($a['triathlonLeagueTablePlaceNumber'] < $b['triathlonLeagueTablePlaceNumber']) ? -1 : 1;
		}
		return ($a['triathlonLeagueTableScoringPoints'] < $b['triathlonLeagueTableScoringPoints']) ? -1 : 1;
	}
	
	/**
	 * SAVE CALLBACK to sort the table when saving.
	 */
	public function storeLeagueTable(DataContainer $dc)
	{
		// Return if there is no active record (override all)
		if (!$dc->activeRecord || $dc->activeRecord->dateAdded > 0)
		{
			return;
		}
		
		// return if auto sort is inactive
		if (!$dc->activeRecord->triathlonLeagueAutoSortTable)
		{
			return;
		}

		$arrLeagueTable = $dc->activeRecord->triathlonLeagueTable;
		if (!is_array($arrLeagueTable))
		{
			$arrLeagueTable = deserialize($arrLeagueTable);
		}
		
		if (tl_module_RscTriathlonLeagueManager::$selectedColumns == 'wp_pz')
		{
			usort($arrLeagueTable, array($this, 'compareWpPz'));
		}
		else if (tl_module_RscTriathlonLeagueManager::$selectedColumns == 'pkt')
		{
			usort($arrLeagueTable, array($this, 'comparePkt'));
		}
		
		// now set the place number
		foreach ($arrLeagueTable as $index => $entry)
		{
			$arrLeagueTable[$index]['triathlonLeagueTablePlace'] = ($index + 1);
		}
		
		$this->Database->prepare("UPDATE tl_module SET triathlonLeagueTable = ? WHERE id = ?")
					   ->execute(serialize($arrLeagueTable), $dc->id); 
	}
	
	/**
	 * Return all templates as array
	 * @param object
	 * @return array
	 */
	public function getTableTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('mod_rscTriathlonLeagueManagerTableManual', $intPid);
	}  
}

?>