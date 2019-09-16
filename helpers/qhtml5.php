<?php
/**
 * @package      Qhtml5
 * @subpackage   Templates.qhtml5
 * @author       Quantility
 * @copyright    Copyright (C) 2017. All rights reserved.
 * @license      GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die();
use Joomla\Registry\Registry;
/**
 * Helper class for Qhtml5 template.
 *
 * @since  3.8
 */
class Qhtml5Helper
{
	/**
	 * Adds the correct script to the document.
	 *
	 * @param   Registry  $params  The parameters form the template
	 *
	 * @return  void
	 *
	 * @since   3.8
	 */
	public static function addCSS(Registry $params)
	{
		$document = JFactory::getDocument();
		$cssFile  = '/templates/qhtml5/css/template.css';
		// The mode: 1 = production, 2 = developer
		switch ($params->get('mode', 1))
		{
			case 1:
				if (!JFile::exists(JPATH_BASE . $cssFile))
				{
					self::compile($params);
				}
				$document->addStyleSheet(JUri::base() . $cssFile);
				break;
			case 2:
				self::compile($params);
				$document->addStyleSheet(JUri::base() . $cssFile);
				break;
		}
	}
	/**
	 * Compiles the template.scss file.
	 *
	 * @param   Registry  $params  The parameters form the template
	 *
	 * @return  void
	 *
	 * @since   3.8
	 */
	public static function compile(Registry $params)
	{
		try
		{
			$content = '';
			if (JFile::exists(JPATH_THEMES . '/qhtml5/scss/custom.scss'))
			{
				$content .= PHP_EOL . '@import "' . 'custom.scss";';
			}
			$scss = new JScss;
			$content .= PHP_EOL . $scss->getVariablesFromParams($params) . PHP_EOL;
			$content .= '@import "' . 'template.scss";';
			$css = $scss->compile(
				$content,
				array(
					JPATH_THEMES . '/qhtml5/scss',
					JPATH_ROOT . '/media/jui/scss',
					JPATH_ROOT . '/media/jui/bs3/scss',
					JPATH_ROOT . '/media/jui/fa4/scss',
				),
				$params->get('mode', 1)
			);
			// Writting the css content to the cache file
			JFile::write(JPATH_THEMES . '/qhtml5/css/template.css', $css);
		}
		catch (Exception $e)
		{
			JFactory::getApplication()->enqueueMessage($e->getMessage());
		}
	}
}