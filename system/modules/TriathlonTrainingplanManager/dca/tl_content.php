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
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'triathlonTrainingplanManagerPlanSource';

$GLOBALS['TL_DCA']['tl_content']['palettes']['triathlonTrainingplanManagerPlan'] = '{type_legend},type,headline;{trainingplan_legend},triathlonTrainingplanManagerPlanSource;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_content']['subpalettes']['triathlonTrainingplanManagerPlanSource_choose'] = 'triathlonTrainingplanManagerPlanSelection';

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['triathlonTrainingplanManagerPlanSource'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['triathlonTrainingplanManagerPlanSource'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('choose'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['triathlonTrainingplanManagerPlanSourceOptions'],
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'includeBlankOption'=>true, 'submitOnChange'=>true),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['triathlonTrainingplanManagerPlanSelection'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['triathlonTrainingplanManagerPlanSelection'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'foreignKey'              => 'tl_triathlon_trainingplans.CONCAT(FROM_UNIXTIME(date, GET_FORMAT(DATE,"EUR")), " - ", kindOfSport, " : ", title)',
	'options_callback'        => array('tl_content_TriathlonTrainingplanManager', 'getPlanOptions'),
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'clr w50', 'chosen'=>true),
	'wizard' => array
	(
		array('tl_content_TriathlonTrainingplanManager', 'editPlan')
	),
	'sql'                     => "int(10) unsigned NOT NULL default '0'",
	'relation'                => array('type'=>'hasOne', 'load'=>'lazy')
);

/**
 * Class tl_module_TriathlonTrainingplanManager
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * PHP version 5
 * @copyright  Cliff Parnitzky 2013-2015
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_content_TriathlonTrainingplanManager extends Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Returns all training plans
	 */
	public function getPlanOptions(DataContainer $dc)
	{
		$arrOptions = array();
		$objTrainingPlans = \TriathlonTrainingplansModel::findAllPublished(array('order'=>'date DESC'));
		if ($objTrainingPlans != null)
		{
			while ($objTrainingPlans->next())
			{
				$arrOptions[\Date::parse(\Config::get('dateFormat'), $objTrainingPlans->date)][$objTrainingPlans->id] = \Date::parse(\Config::get('dateFormat'), $objTrainingPlans->date) . " - " . $GLOBALS['TL_LANG']['TriathlonTrainingplan']['kindOfSport'][$objTrainingPlans->kindOfSport] . " : " . $objTrainingPlans->title;
			}
		}

		return $arrOptions;
	}

	/**
	 * Return the edit plan wizard
	 * @param \DataContainer
	 * @return string
	 */
	public function editPlan(DataContainer $dc)
	{
		return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=triathlonTrainingplans&amp;act=edit&amp;id=' . $dc->value . '&amp;popup=1&amp;nb=1&amp;rt=' . REQUEST_TOKEN . '" title="' . sprintf(specialchars($GLOBALS['TL_LANG']['tl_content']['editalias'][1]), $dc->value) . '" style="padding-left:3px" onclick="Backend.openModalIframe({\'width\':768,\'title\':\'' . specialchars(str_replace("'", "\\'", sprintf($GLOBALS['TL_LANG']['tl_content']['editalias'][1], $dc->value))) . '\',\'url\':this.href});return false">' . Image::getHtml('alias.gif', $GLOBALS['TL_LANG']['tl_content']['editalias'][0], 'style="vertical-align:top"') . '</a>';
	}
}

?>