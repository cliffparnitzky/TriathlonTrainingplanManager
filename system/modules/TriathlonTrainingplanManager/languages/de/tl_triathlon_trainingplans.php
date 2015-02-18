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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['title']                         = array('Titel', 'Geben Sie den Titel für diesen Trainingsplan an.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['date']                          = array('Datum', 'Wählen Sie das Datum für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['kindOfSport']                   = array('Sportart', 'Wählen Sie die Sportart für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentForPerformanceClass'] = array('Zuordnung zu Leistungsklasse', 'Wählen Sie ob diesem Trainingsplan eine Leistungsklasse zugeordnet werden soll.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentPerformanceClass']    = array('Leistungsklasse', 'Wählen Sie die Leistungsklasse für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentForMembers']          = array('Zuordnung zu Mitglieder', 'Wählen Sie ob diesem Trainingsplan ein oder mehrere Mitglieder zugeordnet werden soll.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentMembers']             = array('Mitglieder', 'Wählen Sie die Mitglieder für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentForMemberGroups']     = array('Zuordnung zu Mitgliedergruppen', 'Wählen Sie ob diesem Trainingsplan ein oder mehrere Mitgliedergruppen zugeordnet werden soll.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentMemberGroups']        = array('Mitgliedergruppen', 'Wählen Sie die Mitgliedergruppen für diesen Trainingsplan aus.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructions']                  = array('Trainingsanweisungen', 'Geben Sie die Trainingsanweisungen für diesen Trainingsplan ein.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsBlock']             = array('Block', 'Geben Sie den Block für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsRepetition']        = array('Wiederholung', 'Geben Sie die Anzahl der Wiederholungen für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsInterval']          = array('Intervall', 'Geben Sie die Intervalllänge für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsDescription']       = array('Beschreibung', 'Geben Sie die Beschreibung für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsExecution']         = array('Ausführung', 'Geben Sie spezielle Ausführungshinweise für diese Trainingsanweisungen an.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['comment']                       = array('Kommentar', 'Geben Sie ein Kommentar zu diesen Trainingsplan an.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['published']                     = array('Trainingsplan veröffentlichen', 'Geben Sie an ob der Trainingsplan auf der Webseite anzeigt werden soll.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['general_legend']      = 'Allgemein';
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignment_legend']   = 'Zuordnung';
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructions_legend'] = 'Trainingsanweisungen';
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['comment_legend']      = 'Kommentar';
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['publish_legend']      = 'Veröffentlichung';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['new']    = array('Neuer Trainingsplan', 'Einen neuen Trainingsplan anlegen');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['show']   = array('Details des Trainingsplans', 'Details des Trainingsplans ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['edit']   = array('Trainingsplan bearbeiten', 'Trainingsplan ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['copy']   = array('Trainingsplan duplizieren', 'Trainingsplan ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['delete'] = array('Trainingsplan löschen', 'Trainingsplan ID %s löschen');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['toggle'] = array('Trainingsplan veröffentlichen/unveröffentlichen', 'Trainingsplan ID %s veröffentlichen/unveröffentlichen');

/**
 * Import wizard
 */
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['import']                          = array('CSV-Import','Trainingsanweisungen aus einer CSV-Datei importieren');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['importTemplates']                 = array('Import Vorlagen','Laden Sie sich eine Import Vorlage als CSV-Datei runter.');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['importTemplateFiles']['template'] = array('Vorlage', 'Vorlage für einen importierbaren Trainingsplan', 'system/modules/TriathlonTrainingplanManager/assets/import_plan_template.csv');
$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['importTemplateFiles']['example']  = array('Beispiel', 'Beispiel für einen importierbaren Trainingsplan', 'system/modules/TriathlonTrainingplanManager/assets/import_plan_example.csv');

?>