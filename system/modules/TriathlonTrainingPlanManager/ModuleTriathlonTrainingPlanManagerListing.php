<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
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
 * Class ModuleTriathlonTrainingPlanManagerListing
 *
 * Front end module "triathlonTrainingPlanManagerListing".
 * @copyright  Cliff Parnitzky 2013
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class ModuleTriathlonTrainingPlanManagerListing extends Module {
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_triathlonTrainingPlanManagerListing';

	/**
	 * Redirect to the selected page
	 * @return string
	 */
	public function generate() {
		if (TL_MODE == 'BE') {
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### TRIATHLON TRAINING PLAN MANAGER LISTING ###';
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
		if ($this->triathlonLeagueTableTemplate != 'mod_triathlonTrainingPlanManagerListing')
		{
			$this->strTemplate = $this->triathlonLeagueTableTemplate;

			$this->Template = new FrontendTemplate($this->strTemplate);
			$this->Template->setData($this->arrData);
		} 
		
		$this->Template->table = deserialize($this->triathlonLeagueTable);
		$this->Template->teams = $this->getTeams();
		
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