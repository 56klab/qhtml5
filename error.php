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
$file = JURI::root().'pagina-non-trovata';
$file_headers = get_headers($file);

if( (strpos($file_headers[0], '404') !== false) OR (strpos($file_headers[0], '508') !== false) ){
    echo "Error 404 Page not Found";
} else {
    echo file_get_contents($file);
}
?>
