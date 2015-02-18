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
 * @package    TriathlonTrainingPlanManager
 * @license    LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace TriathlonTrainingplanManager;

/**
 * Class ModuleTriathlonTrainingplans
 *
 * Front end module "triathlonTrainingplan".
 * @copyright  Cliff Parnitzky 2013-2015
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class ModuleTriathlonTrainingplans extends \Module {
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_triathlonTrainingplanList';

	/**
	 * Redirect to the selected page
	 * @return string
	 */
	public function generate() {
		if (TL_MODE == 'BE') {
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### TRIATHLON TRAINING PLAN ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile() {
		if ($this->triathlonLeagueTableTemplate != $strTemplate)
		{
			$this->strTemplate = $this->triathlonLeagueTableTemplate;

			$this->Template = new FrontendTemplate($this->strTemplate);
			$this->Template->setData($this->arrData);
		} 
		
		$this->Template->table = deserialize($this->triathlonLeagueTable);
		$this->Template->teams = $this->getTeams();
		
		
		
		// TODO ist totalComputable : über alles instructions gehen und prüfen ob die Einheiten gleich sind .... wenn ja -> true
		// wenn in Modul displaySum && totalComputable ... Summe berechnen und ausgeben ... wenn !totalComputable -> Fehlermeldung ausgeben
		
		$arrRaceCount = deserialize($this->triathlonLeagueRaceCount);
		$this->Template->tfoot = sprintf($GLOBALS['TL_LANG']['RscTriathlonLeagueManager']['tfoot'], date('d.m.Y', $this->triathlonLeagueUpdateDate), $arrRaceCount[0], $arrRaceCount[1]);
	}
	
	/**
	 * Get all calendars and return them as array
	 * @return array
	 */
	public function getTeams()
	{
		$arrTeams = array();
		$objTeams = $this->Database->prepare("SELECT * FROM tl_triathlon_league_teams WHERE ratingType = ?")->execute($this->triathlonLeagueRatingType);

		while ($objTeams->next())
		{
			$arrTeams[$objTeams->id] = array('name' => $objTeams->name, 'ownTeam' => $objTeams->ownTeam, 'website' => $objTeams->website, 'logo' => $objTeams->logo);
		}
	
		return $arrTeams;
	}
}

?>