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
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['title']                         = array('Titel', 'Geben Sie den Titel für diesen Trainingsplan an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['date']                          = array('Datum', 'Wählen Sie das Datum für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['kindOfSport']                   = array('Sportart', 'Wählen Sie die Sportart für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentForPerformanceClass'] = array('Zuordnung zu Leistungsklasse', 'Wählen Sie ob diesem Trainingsplan eine Leistungsklasse zugeordnet werden soll.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentPerformanceClass']    = array('Leistungsklasse', 'Wählen Sie die Leistungsklasse für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentForMembers']          = array('Zuordnung zu Mitglieder', 'Wählen Sie ob diesem Trainingsplan ein oder mehrere Mitglieder zugeordnet werden soll.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentMembers']             = array('Mitglieder', 'Wählen Sie die Mitglieder für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentForMemberGroups']     = array('Zuordnung zu Mitgliedergruppen', 'Wählen Sie ob diesem Trainingsplan ein oder mehrere Mitgliedergruppen zugeordnet werden soll.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentMemberGroups']        = array('Mitgliedergruppen', 'Wählen Sie die Mitgliedergruppen für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructions']                  = array('Trainingsanweisungen', 'Geben Sie die Trainingsanweisungen für diesen Trainingsplan ein.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsBlock']             = array('Block', 'Geben Sie den Block für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsRepetition']        = array('Wiederholung', 'Geben Sie die Anzahl der Wiederholungen für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsInterval']          = array('Intervall', 'Geben Sie die Intervalllänge für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsDescription']       = array('Beschreibung', 'Geben Sie die Beschreibung für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsExecution']         = array('Ausführung', 'Geben Sie spezielle Ausführungshinweise für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['comment']                       = array('Kommentar', 'Geben Sie ein Kommentar zu diesen Trainingsplan an.');
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['published']                     = array('Trainingsplan veröffentlichen', 'Geben Sie an ob der Trainingsplan auf der Webseite anzeigt werden soll.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['general_legend']      = 'Allgemein';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignment_legend']   = 'Zuordnung';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructions_legend'] = 'Trainingsanweisungen';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['comment_legend']      = 'Kommentar';
$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['publish_legend']      = 'Veröffentlichung';

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