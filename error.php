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

$app			= JFactory::getApplication();
$config         = JFactory::getConfig();
$langTag 		= JFactory::getLanguage()->getTag();

$params 		= $app->getTemplate(true)->params;
$notfound_alias	= $params->get('notfound_alias');

$langUrl 		= substr($langTag, 0, -3);
$file 			= JURI::root().$langUrl.'/'.$notfound_alias;

$file_headers 	= get_headers($file);

// joomla don't cal this error.php file when is offline, but i think is a bug... so...
if( $config->get( 'offline' ) == 1 ) {
    echo "Website is in Offline Mode: custome error 404 page works only in Online Mode";
} else {

    if( (strpos($file_headers[0], '404') !== false) OR (strpos($file_headers[0], '508') !== false) OR empty($notfound_alias) == true ){
        echo "Error 404 Page not Found";
    } else {
        echo file_get_contents($file);
    }
}
?>
