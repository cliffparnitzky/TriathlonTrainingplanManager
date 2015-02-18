<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package TriathlonTrainingplanManager
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'TriathlonTrainingplanManager',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'TriathlonTrainingplanManager\ContentTriathlonTrainingplanManagerPlan' => 'system/modules/TriathlonTrainingplanManager/elements/ContentTriathlonTrainingplanManagerPlan.php',

	// Models
	'TriathlonTrainingplanManager\MemberGroupModel'                        => 'system/modules/TriathlonTrainingplanManager/models/MemberGroupModel.php',
	'TriathlonTrainingplanManager\MemberModel'                             => 'system/modules/TriathlonTrainingplanManager/models/MemberModel.php',
	'TriathlonTrainingplanManager\TriathlonTrainingplansModel'             => 'system/modules/TriathlonTrainingplanManager/models/TriathlonTrainingplansModel.php',

	// Modules
	'TriathlonTrainingplanManager\ModuleTriathlonTrainingplans'            => 'system/modules/TriathlonTrainingplanManager/modules/ModuleTriathlonTrainingplans.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_triathlonTrainingplanManagerPlan' => 'system/modules/TriathlonTrainingplanManager/templates/elements',
	'mod_triathlonTrainingplanDetails'    => 'system/modules/TriathlonTrainingplanManager/templates/modules',
	'mod_triathlonTrainingplanList'       => 'system/modules/TriathlonTrainingplanManager/templates/modules',
));
