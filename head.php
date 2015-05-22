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
?>
<?php header('X-UA-Compatible: IE=edge,chrome=1');?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--apple touch icon-->
<?php 
$icon1 = 'templates/' . $this->template . '/images/icons/touch-icon-iphone.png';
$icon2 = 'templates/' . $this->template . '/images/icons/touch-icon-ipad.png';
$icon3 = 'templates/' . $this->template . '/images/icons/touch-icon-iphone-retina.png';
$icon4 = 'templates/' . $this->template . '/images/icons/touch-icon-ipad-retina.png';
?>
<?php if (file_exists($icon1)) { ?>
<link rel="apple-touch-icon" href="<?php echo $icon1; ?>">
<?php } ?>
<?php if (file_exists($icon2)) { ?>
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $icon2; ?>">
<?php } ?>
<?php if (file_exists($icon3)) { ?>
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $icon3; ?>">
<?php } ?>
<?php if (file_exists($icon4)) { ?>
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $icon4; ?>">
<link rel="icon" sizes="192x192" href="<?php echo $icon4; ?>">
<?php } ?>
<!--fine apple touch icon-->
<jdoc:include type="head" />
<?php if($this->params->get('tpdebug') == 1): ?>
<style>
	* {border: 1px solid #f00;}
	*:hover {border: 1px solid #4218f8;}
</style>
<?php endif; ?>
<!--[if lt IE 9]><script src="<?php echo $this->baseurl; ?>/media/jui/js/html5.js"></script><![endif]-->
<?php
	if($this->params->get('enablega') == 1) {
	echo $this->params->get('scriptga');
	}
?>
