<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package TriathlonTrainingPlanManager
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'ModuleTriathlonTrainingPlanManagerListing' => 'system/modules/TriathlonTrainingPlanManager/ModuleTriathlonTrainingPlanManagerListing.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_triathlonTrainingPlanManagerListing' => 'system/modules/TriathlonTrainingPlanManager/templates',
));
