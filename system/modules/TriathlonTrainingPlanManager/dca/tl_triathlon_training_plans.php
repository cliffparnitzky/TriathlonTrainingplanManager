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
 * Table tl_triathlon_training_plans
 */
$GLOBALS['TL_DCA']['tl_triathlon_training_plans'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'           => 'Table',
		'enableVersioning'        => true
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
			'label_callback'        => array('tl_triathlon_training_plans', 'addIcon') 
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
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleVisibility(this, %s);"',
				'button_callback'     => array('tl_triathlon_training_plans', 'toggleIcon')
			), 
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['show'],
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
		'title' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['title'],
			'exclude'               => true,
			'search'                => true,
			'inputType'             => 'text',
			'eval'                  => array('mandatory'=>true, 'tl_class'=>'w50', 'maxlength'=>255)
		),
		'date' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['date'],
			'exclude'               => true,
			'filter'                => true,
			'sorting'               => true,
			'flag'                  => 5,
			'inputType'             => 'text',
			'eval'                  => array('mandatory'=>true, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard', 'doNotCopy'=>true)
		),
		'kindOfSport' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['kindOfSport'],
			'exclude'               => true,
			'filter'                => true,
			'sorting'               => true,
			'flag'                  => 11,
			'inputType'             => 'select',
			'options'               => array('swim', 'bike', 'run', 'athletics'),
			'reference'             => &$GLOBALS['TL_LANG']['TriathlonTrainingPlan']['kindOfSport'],
			'eval'                  => array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'clr w50')
		),
		'assignmentForPerformanceClass' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentForPerformanceClass'],
			'exclude'               => true,
			'inputType'             => 'checkbox',
			'eval'                  => array('tl_class'=>'m12 w50 clr', 'submitOnChange'=>true)
		),
		'assignmentPerformanceClass' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentPerformanceClass'],
			'exclude'               => true,
			'filter'                => true,
			'sorting'               => true,
			'flag'                  => 11,
			'inputType'             => 'select',
			'options'               => array('all', 'beginners', 'intermediates', 'ambitious', 'professionals'),
			'reference'             => &$GLOBALS['TL_LANG']['TriathlonTrainingPlan']['performanceClass'],
			'eval'                  => array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50', 'helpwizard'=>true)
		),
		'assignmentForMembers' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentForMembers'],
			'exclude'               => true,
			'inputType'             => 'checkbox',
			'eval'                  => array('tl_class'=>'m12 w50 clr', 'submitOnChange'=>true)
		),
		'assignmentMembers' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentMembers'],
			'exclude'               => true,
			'filter'                => true,
			'inputType'             => 'checkbox',
			'foreignKey'            => 'tl_member.CONCAT(firstname," ",lastname)',
			'eval'                  => array('mandatory'=>true, 'multiple'=>true, 'tl_class'=>'w50')
		),
		'assignmentForMemberGroups' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentForMemberGroups'],
			'exclude'               => true,
			'inputType'             => 'checkbox',
			'eval'                  => array('tl_class'=>'m12 w50 clr', 'submitOnChange'=>true)
		),
		'assignmentMemberGroups' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['assignmentMemberGroups'],
			'exclude'               => true,
			'filter'                => true,
			'inputType'             => 'checkbox',
			'foreignKey'            => 'tl_member_group.name', 
			'eval'                  => array('mandatory'=>true, 'multiple'=>true, 'tl_class'=>'w50')
		),
		'instructions' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructions'],
			'exclude'               => true,
			'inputType'             => 'multiColumnWizard',
			'load_callback' => array
			(
				array('tl_triathlon_training_plans', 'addImportWizardToLabel')
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
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsBlock'],
						'inputType'        => 'select',
						'options'          => array('MAIN', 'MAIN_1', 'MAIN_2', 'MAIN_3', 'MAIN_4', 'MAIN_5', 'TECHNIQUE', 'WARM_UP', 'COOL_DOWN'),
						'reference'        => &$GLOBALS['TL_LANG']['TriathlonTrainingPlan']['instructionBlock'],
						'eval'             => array('style'=>'width: 80px;', 'includeBlankOption'=>true)
					),
					'repetition' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsRepetition'],
						'inputType'        => 'text',
						'eval'             => array('style'=>'width: 80px', 'mandatory'=>true, 'rgxp'=>'digit')
					),
					'interval' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsInterval'],
						'inputType'        => 'inputUnit',
						'options'          => array('m', 'km', 'sek', 'min'), 
						'eval'             => array('style'=>'width: 40px', 'mandatory'=>true, 'rgxp'=>'digit')
					),
					'description' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsDescription'],
						'inputType'        => 'text',
						'eval'             => array('style'=>'width: 95%;', 'mandatory'=>true)
					),
					'execution' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['instructionsExecution'],
						'inputType'        => 'text',
						'eval'             => array('style'=>'width: 95%;')
					)
				)
			)
		),
		'comment' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['comment'],
			'exclude'               => true,
			'search'                => true,
			'inputType'             => 'textarea',
			'eval'                  => array('rte'=>'tinyMCE')
		),
		'published' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['published'],
			'exclude'               => true,
			'filter'                => true,
			'inputType'             => 'checkbox',
			'eval'                  => array('tl_class'=>'m12 w50', 'doNotCopy'=>true)
		)
	)
);

/**
 * Class tl_triathlon_training_plans
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * PHP version 5
 * @copyright  Cliff Parnitzky 2013
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_triathlon_training_plans extends Backend
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

		return sprintf('<div class="list_icon" style="background-image:url(\'system/modules/TriathlonTrainingPlanManager/html/%s.png\');">%s</div>', $image, $label);
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
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_triathlon_training_plans::published', 'alexf'))
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
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_triathlon_training_plans::published', 'alexf'))
		{
			$this->log('Not enough permissions to publish/unpublish trainingplan ID "'.$intId.'"', 'tl_triathlon_training_plans toggleVisibility', TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}

		$this->createInitialVersion('tl_triathlon_training_plans', $intId);
	
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_triathlon_training_plans']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_triathlon_training_plans']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		$time = time();

		// Update the database
		$this->Database->prepare("UPDATE tl_triathlon_training_plans SET tstamp=$time, published='" . (!$blnVisible ? '' : 1) . "' WHERE id=?")
					   ->execute($intId);

		$this->createNewVersion('tl_triathlon_training_plans', $intId);
	}
	
	/**
	 * Link to list import wizard
	 * @param string
	 * @param array
	 * @return array
	 */
	public function addImportWizardToLabel($value, $dc)
	{
		$GLOBALS['TL_DCA']['tl_triathlon_training_plans']['fields']['instructions']['label'][0] .= '<a href="'.$this->Environment->request.'&amp;field=instructions&amp;key=import" title="'.$GLOBALS['TL_LANG']['MSC']['lw_import'][1].'" onclick="Backend.getScrollOffset();"><img src="system/themes/default/images/tablewizard.gif" width="16" height="14" alt="'.$GLOBALS['TL_LANG']['MSC']['lw_import'][0].'" style="vertical-align:text-bottom; margin-left: 5px;"></a>';
		
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
		
		// Import CSV
		if ($this->Input->post('FORM_SUBMIT') == 'tl_list_import')
		{
			if (!$this->Input->post($this->Input->get('field')))
			{
				$_SESSION['TL_ERROR'][] = $GLOBALS['TL_LANG']['ERR']['all_fields'];
				$this->reload();
			}

			$this->import('Database');
			$arrList = array();

			if(is_numeric($this->Input->post($this->Input->get('field'))))
			{
				$objTmp = \FilesModel::findByPk($this->Input->post($this->Input->get('field')));
				$strCsvFile = $objTmp->path;
			}
			else
			{
				$strCsvFile = $this->Input->post($this->Input->get('field'));
			}

			$objFile = new File($strCsvFile);

			if ($objFile->extension != 'csv')
			{
				$_SESSION['TL_ERROR'][] = sprintf($GLOBALS['TL_LANG']['ERR']['filetype'], $objFile->extension);
				continue;
			}

			// Get separator
			switch ($this->Input->post('separator'))
			{
				case 'semicolon':
					$strSeparator = ';';
					break;

				case 'tabulator':
					$strSeparator = '\t';
					break;

				case 'linebreak':
					$strSeparator = '\n';
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

			$this->createNewVersion($dc->table, $this->Input->get('id'));

			$this->Database->prepare("UPDATE " . $dc->table . " SET ".$this->Input->get('field')."=? WHERE id=?")
						   ->execute(serialize($arrList), $this->Input->get('id'));

			setcookie('BE_PAGE_OFFSET', 0, 0, '/');
			$this->redirect(str_replace('&key=import', '', $this->Environment->request));
		}

		$objTree = new FileTree($this->prepareForWidget($GLOBALS['TL_DCA'][$dc->table]['fields'][$this->Input->get('field')], $this->Input->get('field'), null, $this->Input->get('field'), $dc->table));

		// Return form
		return '
<div id="tl_buttons">
<a href="'.ampersand(str_replace('&key=import', '', $this->Environment->request)).'" class="header_back" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['backBT']).'" accesskey="b">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>
</div>

<h2 class="sub_headline">'.$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['import'][1].'</h2>
'.$this->getMessages().'
<form action="'.ampersand($this->Environment->request, true).'" id="tl_list_import" class="tl_form" method="post">
<div class="tl_formbody_edit">
<input type="hidden" name="FORM_SUBMIT" value="tl_list_import">
<input type="hidden" name="REQUEST_TOKEN" value="'.REQUEST_TOKEN.'">

<div class="tl_tbox block">
  <h3><label for="separator">'.$GLOBALS['TL_LANG']['MSC']['separator'][0].'</label></h3>
  <select name="separator" id="separator" class="tl_select" onfocus="Backend.getScrollOffset();">
    <option value="comma">'.$GLOBALS['TL_LANG']['MSC']['comma'].'</option>
    <option value="semicolon">'.$GLOBALS['TL_LANG']['MSC']['semicolon'].'</option>
    <option value="tabulator">'.$GLOBALS['TL_LANG']['MSC']['tabulator'].'</option>
    <option value="linebreak">'.$GLOBALS['TL_LANG']['MSC']['linebreak'].'</option>
  </select>'.(($GLOBALS['TL_LANG']['MSC']['separator'][1] != '') ? '
  <p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['MSC']['separator'][1].'</p>' : '').'
  <h3><label for="source">'.$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['importfile'][0].'</label> <a href="contao/files.php" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['fileManager']) . '" rel="lightbox[files 765 80%]">' . $this->generateImage('filemanager.gif', $GLOBALS['TL_LANG']['MSC']['fileManager'], 'style="vertical-align:text-bottom;"') . '</a></h3>
'.$objTree->generate().(($GLOBALS['TL_LANG']['tl_triathlon_training_plans']['importfile'][1] != '') ? '
  <p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['tl_triathlon_training_plans']['importfile'][1].'</p>' : '').'
</div>

</div>

<div class="tl_formbody_submit">

<div class="tl_submit_container">
  <input type="submit" name="save" id="save" class="tl_submit" accesskey="s" value="'.specialchars($GLOBALS['TL_LANG']['tl_triathlon_training_plans']['import'][0]).'">
</div>

</div>
</form>';
	}
} 

?>