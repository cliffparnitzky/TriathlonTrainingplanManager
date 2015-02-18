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
 * Table tl_triathlon_trainingplans
 */
$GLOBALS['TL_DCA']['tl_triathlon_trainingplans'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'           => 'Table',
		'enableVersioning'        => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array (
			'mode'                    => 2,
			'fields'                  => array('date DESC', 'kindOfSport'),
			'panelLayout'             => 'filter;sort,search,limit'
		),
		'label' => array
		(
			'fields'                => array('kindOfSport', 'title'),
			'format'                => '%s <span style="color:#b3b3b3; padding-left:3px;">%s</span>',
			'label_callback'        => array('tl_triathlon_trainingplans', 'addIcon')
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleVisibility(this, %s);"',
				'button_callback'     => array('tl_triathlon_trainingplans', 'toggleIcon')
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__' => array('assignmentForPerformanceClass', 'assignmentForMembers', 'assignmentForMemberGroups'),
		'default'      => '{general_legend},title,date,kindOfSport;{assignment_legend},assignmentForPerformanceClass,assignmentForMembers,assignmentForMemberGroups;{instructions_legend},instructions;{comment_legend},comment;{publish_legend},published'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'assignmentForPerformanceClass' => 'assignmentPerformanceClass',
		'assignmentForMembers'          => 'assignmentMembers',
		'assignmentForMemberGroups'     => 'assignmentMemberGroups'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                   => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                   => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['title'],
			'exclude'               => true,
			'search'                => true,
			'inputType'             => 'text',
			'eval'                  => array('mandatory'=>true, 'tl_class'=>'w50', 'maxlength'=>255),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'date' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['date'],
			'exclude'               => true,
			'filter'                => true,
			'sorting'               => true,
			'flag'                  => 5,
			'inputType'             => 'text',
			'eval'                  => array('mandatory'=>true, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard', 'doNotCopy'=>true),
			'sql'                   => "varchar(11) NOT NULL default ''"
		),
		'kindOfSport' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['kindOfSport'],
			'exclude'               => true,
			'filter'                => true,
			'sorting'               => true,
			'flag'                  => 11,
			'inputType'             => 'select',
			'options'               => array('swim', 'bike', 'run', 'athletics'),
			'reference'             => &$GLOBALS['TL_LANG']['TriathlonTrainingplan']['kindOfSport'],
			'eval'                  => array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'clr w50'),
			'sql'                   => "varchar(20) NOT NULL default ''"
		),
		'assignmentForPerformanceClass' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentForPerformanceClass'],
			'exclude'               => true,
			'inputType'             => 'checkbox',
			'eval'                  => array('tl_class'=>'m12 w50 clr', 'submitOnChange'=>true),
			'sql'                   => "char(1) NOT NULL default ''"
		),
		'assignmentPerformanceClass' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentPerformanceClass'],
			'exclude'               => true,
			'filter'                => true,
			'sorting'               => true,
			'flag'                  => 11,
			'inputType'             => 'select',
			'options'               => array('all', 'beginners', 'intermediates', 'ambitious', 'professionals'),
			'reference'             => &$GLOBALS['TL_LANG']['TriathlonTrainingplan']['performanceClass'],
			'eval'                  => array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50', 'helpwizard'=>true),
			'sql'                   => "varchar(255) NOT NULL default ''"
		),
		'assignmentForMembers' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentForMembers'],
			'exclude'               => true,
			'inputType'             => 'checkbox',
			'eval'                  => array('tl_class'=>'m12 w50 clr', 'submitOnChange'=>true),
			'sql'                   => "char(1) NOT NULL default ''"
		),
		'assignmentMembers' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentMembers'],
			'exclude'               => true,
			'filter'                => true,
			'inputType'             => 'select',
			'foreignKey'            => 'tl_member.CONCAT(firstname," ",lastname)',
			'eval'                  => array('mandatory'=>true, 'multiple'=>true, 'tl_class'=>'w50 m12', 'chosen'=>true),
			'sql'                   => "blob NULL",
			'relation'              => array('type'=>'hasMany', 'load'=>'lazy')
		),
		'assignmentForMemberGroups' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentForMemberGroups'],
			'exclude'               => true,
			'inputType'             => 'checkbox',
			'eval'                  => array('tl_class'=>'m12 w50 clr', 'submitOnChange'=>true),
			'sql'                   => "char(1) NOT NULL default ''"
		),
		'assignmentMemberGroups' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['assignmentMemberGroups'],
			'exclude'               => true,
			'filter'                => true,
			'inputType'             => 'select',
			'foreignKey'            => 'tl_member_group.name',
			'eval'                  => array('mandatory'=>true, 'multiple'=>true, 'tl_class'=>'w50 m12', 'chosen'=>true),
			'sql'                   => "blob NULL",
			'relation'              => array('type'=>'hasMany', 'load'=>'lazy')
		),
		'instructions' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructions'],
			'exclude'               => true,
			'inputType'             => 'multiColumnWizard',
			'load_callback' => array
			(
				array('tl_triathlon_trainingplans', 'addImportWizardToLabel')
			),
			'eval'                  => array
			(
				'mandatory'       => true,
				'style'           => 'min-width: 100%;',
				'tl_class'        =>'clr wizard',
				'minCount'        => 1,
				'files'           => true,
				'filesOnly'       => true,
				'extensions'      => 'csv',
				'fieldType'       => 'radio',
				'columnFields' => array
				(
					'block' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsBlock'],
						'inputType'        => 'select',
						'options'          => array('MAIN', 'MAIN_1', 'MAIN_2', 'MAIN_3', 'MAIN_4', 'MAIN_5', 'TECHNIQUE', 'WARM_UP', 'COOL_DOWN'),
						'reference'        => &$GLOBALS['TL_LANG']['TriathlonTrainingplan']['instructionBlock'],
						'eval'             => array('style'=>'width: 80px;', 'includeBlankOption'=>true)
					),
					'repetition' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsRepetition'],
						'inputType'        => 'text',
						'eval'             => array('style'=>'width: 80px', 'mandatory'=>true, 'rgxp'=>'digit')
					),
					'interval' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsInterval'],
						'inputType'        => 'inputUnit',
						'options'          => array('m', 'km', 'sek', 'min'),
						'eval'             => array('style'=>'width: 40px', 'mandatory'=>true, 'rgxp'=>'digit')
					),
					'description' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsDescription'],
						'inputType'        => 'text',
						'eval'             => array('style'=>'width: 95%;', 'mandatory'=>true)
					),
					'execution' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['instructionsExecution'],
						'inputType'        => 'text',
						'eval'             => array('style'=>'width: 95%;')
					)
				)
			),
			'sql'                   => "blob NOT NULL"
		),
		'comment' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['comment'],
			'exclude'               => true,
			'search'                => true,
			'inputType'             => 'textarea',
			'eval'                  => array('rte'=>'tinyMCE'),
			'sql'                   => "text NULL"
		),
		'published' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['published'],
			'exclude'               => true,
			'filter'                => true,
			'inputType'             => 'checkbox',
			'eval'                  => array('tl_class'=>'m12 w50', 'doNotCopy'=>true),
			'sql'                   => "char(1) NOT NULL default ''"
		)
	)
);

/**
 * Class tl_triathlon_trainingplans
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * PHP version 5
 * @copyright  Cliff Parnitzky 2013-2015
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_triathlon_trainingplans extends Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Add an image to each record
	 * @param array
	 * @param string
	 * @return string
	 */
	public function addIcon($row, $label)
	{
		$image = 'plan_' . $row['kindOfSport'];

		if (!$row['published'])
		{
			$image .= '_';
		}

		return sprintf('<div class="list_icon" style="background-image:url(\'system/modules/TriathlonTrainingplanManager/assets/%s.png\');">%s</div>', $image, $label);
	}

	/**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		if (strlen($this->Input->get('tid')))
		{
			$this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 1));
			$this->redirect($this->getReferer());
		}

		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_triathlon_trainingplans::published', 'alexf'))
		{
			return '';
		}

		$href .= '&amp;tid='.$row['id'].'&amp;state='.!$row['published'];

		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}

	/**
	 * Publish/unpublish a trainingplan
	 * @param integer
	 * @param boolean
	 */
	public function toggleVisibility($intId, $blnVisible)
	{
		// Check permissions
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_triathlon_trainingplans::published', 'alexf'))
		{
			$this->log('Not enough permissions to publish/unpublish trainingplan ID "'.$intId.'"', 'tl_triathlon_trainingplans toggleVisibility', TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}

		$this->createInitialVersion('tl_triathlon_trainingplans', $intId);

		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_triathlon_trainingplans']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_triathlon_trainingplans']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		$time = time();

		// Update the database
		$this->Database->prepare("UPDATE tl_triathlon_trainingplans SET tstamp=$time, published='" . (!$blnVisible ? '' : 1) . "' WHERE id=?")
					   ->execute($intId);

		$this->createNewVersion('tl_triathlon_trainingplans', $intId);
	}

	/**
	 * Link to list import wizard
	 * @param string
	 * @param array
	 * @return array
	 */
	public function addImportWizardToLabel($value, $dc)
	{
		$GLOBALS['TL_DCA']['tl_triathlon_trainingplans']['fields']['instructions']['label'][0] .= '<a href="'.$this->Environment->request.'&amp;field=instructions&amp;key=import" title="'.$GLOBALS['TL_LANG']['MSC']['lw_import'][1].'" onclick="Backend.getScrollOffset();"><img src="system/themes/default/images/tablewizard.gif" width="16" height="14" alt="'.$GLOBALS['TL_LANG']['MSC']['lw_import'][0].'" style="vertical-align:text-bottom; margin-left: 5px;"></a>';

		return $value;
	}

	/**
	 * Return a form to choose a CSV file and import it
	 * @param object
	 * @return string
	 */
	public function importList(DataContainer $dc)
	{
		if ($this->Input->get('key') != 'import')
		{
			return '';
		}

		$this->import('BackendUser', 'User');
		$class = $this->User->uploader;

		// See #4086 and #7046
		if (!class_exists($class) || $class == 'DropZone')
		{
			$class = 'FileUpload';
		}

		$objUploader = new $class();

		// Import CSV
		if ($this->Input->post('FORM_SUBMIT') == 'tl_list_import')
		{
			$arrUploaded = $objUploader->uploadTo('system/tmp');

			if (empty($arrUploaded))
			{
				\Message::addError($GLOBALS['TL_LANG']['ERR']['all_fields']);
				$this->reload();
			}

			$this->import('Database');
			$arrList = array();

			foreach ($arrUploaded as $strCsvFile)
			{
				$objFile = new \File($strCsvFile, true);

				if ($objFile->extension != 'csv')
				{
					\Message::addError(sprintf($GLOBALS['TL_LANG']['ERR']['filetype'], $objFile->extension));
					continue;
				}

				// Get separator
				switch (\Input::post('separator'))
				{
					case 'semicolon':
						$strSeparator = ';';
						break;

					case 'tabulator':
						$strSeparator = "\t";
						break;

					case 'linebreak':
						$strSeparator = "\n";
						break;

					default:
						$strSeparator = ',';
						break;
				}

				$resFile = $objFile->handle;

				while(($arrRow = @fgetcsv($resFile, null, $strSeparator)) !== false)
				{
					if (count($arrRow) == 6 && strpos($arrRow[0], '#') !== 0)
					{
						$arrList[count($arrList)] = array
						(
							'block'       => $arrRow[0],
							'repetition'  => $arrRow[1],
							'interval'    => array
							(
								'value' => $arrRow[2],
								'unit'  => $arrRow[3]
							),
							'description' => $arrRow[4],
							'execution'   => $arrRow[5]
						);
					}
				}
			}

			if (count($arrList) > 0)
			{
				$objVersions = new \Versions($dc->table, \Input::get('id'));
				$objVersions->create();

				$this->Database->prepare("UPDATE " . $dc->table . " SET instructions=? WHERE id=?")
							   ->execute(serialize($arrList), \Input::get('id'));
			}
			else
			{
				\Message::addError($GLOBALS['TL_LANG']['ERR']['TriathlonTrainingplan_NoImport']);
			}

			\System::setCookie('BE_PAGE_OFFSET', 0, 0);
			$this->redirect(str_replace('&key=import', '', \Environment::get('request')));
		}

		// Return form
		return '
<div id="tl_buttons">
<a href="'.ampersand(str_replace('&key=list', '', \Environment::get('request'))).'" class="header_back" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']).'" accesskey="b">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>
</div>

<h2 class="sub_headline">'.$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['import'][1].'</h2>
'.$this->getMessages().'
<form action="'.ampersand(\Environment::get('request'), true).'" id="tl_list_import" class="tl_form" method="post" enctype="multipart/form-data">
<div class="tl_formbody_edit">
<input type="hidden" name="FORM_SUBMIT" value="tl_list_import">
<input type="hidden" name="REQUEST_TOKEN" value="'.REQUEST_TOKEN.'">
<input type="hidden" name="MAX_FILE_SIZE" value="'.\Config::get('maxFileSize').'">

<div class="tl_tbox block">
  <h3><label for="separator">'.$GLOBALS['TL_LANG']['MSC']['separator'][0].'</label></h3>
  <select name="separator" id="separator" class="tl_select" onfocus="Backend.getScrollOffset()">
    <option value="comma">'.$GLOBALS['TL_LANG']['MSC']['comma'].'</option>
    <option value="semicolon">'.$GLOBALS['TL_LANG']['MSC']['semicolon'].'</option>
    <option value="tabulator">'.$GLOBALS['TL_LANG']['MSC']['tabulator'].'</option>
    <option value="linebreak">'.$GLOBALS['TL_LANG']['MSC']['linebreak'].'</option>
  </select>'.(($GLOBALS['TL_LANG']['MSC']['separator'][1] != '') ? '
  <p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['MSC']['separator'][1].'</p>' : '').'
  <h3>'.$GLOBALS['TL_LANG']['MSC']['source'][0].'</h3>'.$objUploader->generateMarkup().(isset($GLOBALS['TL_LANG']['MSC']['source'][1]) ? '
  <p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['MSC']['source'][1].'</p>' : '').'
  <h3><label for="separator">'.$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['importTemplates'][0].'</label></h3>
  <ul>' . $this->getImportTemplateFiles() . '</ul>'.(($GLOBALS['TL_LANG']['MSC']['separator'][1] != '') ? '
  <p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['importTemplates'][1].'</p>' : '').'
</div>

</div>

<div class="tl_formbody_submit">

<div class="tl_submit_container">
  <input type="submit" name="save" id="save" class="tl_submit" accesskey="s" value="'.specialchars($GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['import'][0]).'">
</div>

</div>
</form>';
	}

	/**
	 * Return the csv template files
	 * @param object
	 * @return string
	 */
	private function getImportTemplateFiles()
	{
		$strReturn = "";
		foreach ($GLOBALS['TL_LANG']['tl_triathlon_trainingplans']['importTemplateFiles'] as $arrImportTemplateFile)
		{
			$strReturn .= '<li>&raquo; <a href="' . $arrImportTemplateFile[2] . '" alt="' . $arrImportTemplateFile[1] . '" title="' . $arrImportTemplateFile[1] . '">' . $arrImportTemplateFile[0] . '</a></li>';
		}
		return $strReturn;
	}
}

?>