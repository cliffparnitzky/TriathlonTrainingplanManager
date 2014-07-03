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
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'triathlonTrainingPlanSource';

$GLOBALS['TL_DCA']['tl_content']['palettes']['triathlonTrainingPlans'] = '{type_legend},type,headline;{trainingplan_legend},triathlonTrainingPlanSource;{template_legend:hide},triathlonTrainingPlanTemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_content']['subpalettes']['triathlonTrainingPlanSource_choose'] = 'triathlonTrainingPlan'; 

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['triathlonTrainingPlanSource'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['triathlonTrainingPlanSource'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('choose'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['triathlonTrainingPlanSourceOptions'],
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'includeBlankOption'=>true, 'submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['triathlonTrainingPlan'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['triathlonTrainingPlan'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'foreignKey'              => 'tl_triathlon_training_plans.CONCAT(date, " - ", kindOfSport, " : ", title)', // TODO:replace with option_callback to format date
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'clr w50', 'includeBlankOption'=>true)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['triathlonTrainingPlanTemplate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['triathlonTrainingPlanTemplate'],
	'default'                 => 'ce_triathlonTrainingPlan',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_TriathlonTrainingPlanManager', 'getTrainingPlanTemplates'),
	'eval'                    => array('tl_class'=>'clr')
);

/**
 * Class tl_module_TriathlonTrainingPlanManager
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * PHP version 5
 * @copyright  Cliff Parnitzky 2013
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_content_TriathlonTrainingPlanManager extends Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Return all templates as array
	 * @param object
	 * @return array
	 */
	public function getTrainingPlanTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('ce_triathlonTrainingPlan', $intPid);
	}  
}

?>