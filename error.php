<?php
/**
 * @package      Qhtml5
 * @subpackage   Templates.qhtml5
 * @author       Quantility
 * @copyright    Copyright (C) 2017. All rights reserved.
 * @license      GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;
header("HTTP/1.0 404 Not Found");
$error_page = file_get_contents(JURI::root().'/pagina-non-trovata');
if ( $error_page === false ) {
  echo "Error 404 Page not Found";
} else {
  echo $error_page;
};
?>
