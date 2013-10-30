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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['title']                           = array('Titel', 'Geben Sie den Titel für diesen Trainingsplan an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['date']                            = array('Datum', 'Wählen Sie das Datum für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['kindOfSport']                     = array('Sportart', 'Wählen Sie die Sportart für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['performanceClass']                = array('Leistungsklasse', 'Wählen Sie die Leistungsklasse für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructions']            = array('Trainingsanweisungen', 'Geben Sie die Trainingsanweisungen für diesen Trainingsplan ein.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructionsBlock']       = array('Block', 'Geben Sie den Block für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructionsRepetition']  = array('Wiederholung', 'Geben Sie die Anzahl der Wiederholungen für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructionsInterval']    = array('Intervall', 'Geben Sie die Intervalllänge für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructionsDescription'] = array('Beschreibung', 'Geben Sie die Beschreibung für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructionsExecution']   = array('Ausführung', 'Geben Sie spezielle Ausführungshinweise für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['comment']                         = array('Kommentar', 'Geben Sie ein Kommentar zu diesen Trainingsplan an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['published']                       = array('Trainingsplan veröffentlichen', 'Den Trainingsplan auf der Webseite anzeigen.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['general_legend']              = 'Allgemein';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructions_legend'] = 'Trainingsplan';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['comment_legend']              = 'Kommentar';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['publish_legend']              = 'Veröffentlichung';

/**
 * Options
 */
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['kindOfSportOptions']['swim']                    = 'Schwimmen';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['kindOfSportOptions']['bike']                    = 'Radfahren';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['kindOfSportOptions']['run']                     = 'Laufen';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['kindOfSportOptions']['athletics']               = 'Athletik';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['performanceClassOptions']['all']                = array('Alle', 'Sportler jeder Leistungsklasse');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['performanceClassOptions']['lk1']                = array('LK1', '<i>Anfänger/in</i><br/>Technik nicht vorhanden oder nur sehr schlecht, langsame Fortbewegung');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['performanceClassOptions']['lk2']                = array('LK2', '<i>Fortgeschrittene/r</i><br/>Technik okay mit Verbesserungsbedarf, gemütliche bis zügige Fortbewegung');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['performanceClassOptions']['lk3']                = array('LK3', '<i>Ambitionierte/r</i><br/>Technik gut mit wenig Schwächen, schnelle Fortbewegung');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructionsBlockOptions']['MAIN']      = 'Hauptserie';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructionsBlockOptions']['TECHNIQUE'] = 'Techniktraining';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructionsBlockOptions']['WARM_UP']   = 'Aufwärmen';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['trainingInstructionsBlockOptions']['COOL_DOWN'] = 'Cool down';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['new']    = array('Neuer Trainingsplan', 'Einen neuen Trainingsplan anlegen');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['show']   = array('Details des Trainingsplans', 'Details des Trainingsplans ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['edit']   = array('Trainingsplan bearbeiten', 'Trainingsplan ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['copy']   = array('Trainingsplan duplizieren', 'Trainingsplan ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['delete'] = array('Trainingsplan löschen', 'Trainingsplan ID %s löschen');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['toggle'] = array('Trainingsplan veröffentlichen/unveröffentlichen', 'Trainingsplan ID %s veröffentlichen/unveröffentlichen');

/**
 * Import wizard
 */
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['import']     = array('Importieren','Trainingsanweisungen importieren');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['importfile'] = array('Quelldatei','Wählen Sie die zu importierende CSV-Datei aus.');

?>