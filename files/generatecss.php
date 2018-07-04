<?php
/**
 * @package      Qhtml5
 *
 * @author       Quantility
 * @copyright    Copyright (C) 2018. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// Set flag that this is a parent file.
const _JEXEC = 1;

// Import namespaced classes
use Joomla\CMS\Application\CliApplication;

// Set fixed precision value to avoid round related issues
ini_set('precision', 14);

// Load system defines
if (file_exists(dirname(__DIR__) . '/defines.php'))
{
	require_once dirname(__DIR__) . '/defines.php';
}

if (!defined('_JDEFINES'))
{
	define('JPATH_BASE', dirname(__DIR__));
	require_once JPATH_BASE . '/includes/defines.php';
}

require_once JPATH_LIBRARIES . '/import.php';

require_once JPATH_LIBRARIES . '/cms.php';

/**
 * This script will recompile the CSS files for templates using Less to build their stylesheets.
 *
 * @since  3.0
 */
class GenerateCss extends CliApplication
{
	/**
	 * Entry point for the script
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function doExecute()
	{
		$templates = array(
			JPATH_SITE . '/templates/qhtml5/less/qhtml5.less' => JPATH_SITE . '/templates/qhtml5/css/template_less.css'
		);

		$less = new JLess;
		$less->setFormatter(new JLessFormatterJoomla);

		foreach ($templates as $source => $output)
		{
			try
			{
				$less->compileFile($source, $output);
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
			}
		}
	}
}

CliApplication::getInstance('GenerateCss')->execute();
?>
