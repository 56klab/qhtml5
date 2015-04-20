<?php
/**
 * @package      Qhtml5
 *
 * @author       Quantility
 * @copyright    Copyright (C) 2015. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

if(JDEBUG) {
    //session_start();
    echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val) {
        echo '<pre>';   
        print_r($val);
        echo '</pre>';  
    }       
}
?>