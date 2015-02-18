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
 * @copyright  Cliff Parnitzky 2015
 * @author     Cliff Parnitzky
 * @package    TriathlonTrainingplanManager
 * @license    LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace TriathlonTrainingplanManager;

/**
 * Class TriathlonTrainingplansModel
 *
 * @copyright  Cliff Parnitzky 2015
 * @author     Cliff Parnitzky
 * @package    Models
 */
class TriathlonTrainingplansModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_triathlon_trainingplans';

	/**
	 * Find all published training plans
	 *
	 * @param array $arrOptions An optional options array
	 *
	 * @return \Model\Collection|null A collection of models or null if there are no published training plans
	 */
	public static function findAllPublished(array $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("$t.published='1'");
		$arrValues = array();

		if ($arrOptions['column'])
		{
			$arrColumns = array_merge($arrColumns, $arrOptions['column']);
			unset($arrOptions['column']);
		}
		if ($arrOptions['value'])
		{
			$arrValues = array_merge($arrValues, $arrOptions['value']);
			unset($arrOptions['value']);
		}

		return static::findBy($arrColumns, $arrValues, $arrOptions);
	}

	/**
	 * Find all published training plans by their IDs
	 *
	 * @param array $arrIds     An array of IDs
	 * @param array $arrOptions An optional options array
	 *
	 * @return \Model\Collection|null A collection of models or null if there are no training plans
	 */
	public static function findPublishedByIds($arrIds, array $arrOptions=array())
	{
		if (empty($arrIds) || !is_array($arrIds))
		{
			return null;
		}

		$t = static::$strTable;
		$arrColumns = array("$t.published='1' AND $t.id IN(" . implode(',', $arrIds) . ")");
		$arrValues = array();

		if ($arrOptions['column'])
		{
			$arrColumns = array_merge($arrColumns, $arrOptions['column']);
			unset($arrOptions['column']);
		}
		if ($arrOptions['value'])
		{
			$arrValues = array_merge($arrValues, $arrOptions['value']);
			$arrOptions['value'] = $arrValues;
		}

		return static::findBy($arrColumns, $arrValues, $arrOptions);
	}

}