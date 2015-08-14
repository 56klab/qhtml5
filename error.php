<?php
/**
 * @package      Qhtml5
 *
 * @author       Quantility
 * @copyright    Copyright (C) 2015. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
header("HTTP/1.0 404 Not Found");
echo file_get_contents(JURI::root().'/pagina-non-trovata');
?>
