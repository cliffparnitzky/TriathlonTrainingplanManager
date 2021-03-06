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
 * Define error messages
 */
$GLOBALS['TL_LANG']['ERR']['TriathlonTrainingplan_NoIds']    = "Es konnten keine Ids für Trainingspläne ermittelt werden.";
$GLOBALS['TL_LANG']['ERR']['TriathlonTrainingplan_NoPlan']   = "Es konnten kein Trainingsplane ermittelt werden.";
$GLOBALS['TL_LANG']['ERR']['TriathlonTrainingplan_NoPlans']  = "Es konnten keine Trainingspläne ermittelt werden.";
$GLOBALS['TL_LANG']['ERR']['TriathlonTrainingplan_NoImport'] = "Es konnten keine Importdaten ermittelt werden.";

/**
 * Define kinds of sport
 */
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['kindOfSport']['swim']      = 'Schwimmen';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['kindOfSport']['bike']      = 'Radfahren';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['kindOfSport']['run']       = 'Laufen';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['kindOfSport']['athletics'] = 'Athletik';

/**
 * Define performance classes
 */
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['performanceClass']['all']           = array('Alle', 'Sportler jeder Leistungsklasse');
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['performanceClass']['beginners']     = array('Anfänger', 'Technik nicht vorhanden oder nur sehr schlecht, langsame Fortbewegung, betreibt den Sport erst seit Kurzem');
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['performanceClass']['intermediates'] = array('Fortgeschrittene', 'Technik okay mit Verbesserungsbedarf, gemütliche bis zügige Fortbewegung, betreibt den Sport als intensives Hobby');
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['performanceClass']['ambitious']     = array('Ambitionierte', 'Technik gut mit wenig Schwächen, schnelle Fortbewegung, betreibt den Sport semi professionell');
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['performanceClass']['professionals'] = array('Profis', 'Technik sehr gut, sehr schnelle Fortbewegung, betreibt den Sport professionell');

/**
 * Define performance classes
 */
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock']['MAIN']      = 'Hauptserie';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock']['MAIN_1']    = 'Hauptserie 1';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock']['MAIN_2']    = 'Hauptserie 2';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock']['MAIN_3']    = 'Hauptserie 3';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock']['MAIN_4']    = 'Hauptserie 4';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock']['MAIN_5']    = 'Hauptserie 5';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock']['TECHNIQUE'] = 'Techniktraining';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock']['WARM_UP']   = 'Aufwärmen';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock']['COOL_DOWN'] = 'Cool down';

/**
 * Define some front end labels
 */
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['totalSum']   = 'Summe';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['totalSums']  = 'Summen';
$GLOBALS['TL_LANG']['TriathlonTrainingplan']['repetition'] = 'Mal';

?>