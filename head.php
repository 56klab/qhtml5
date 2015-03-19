<?php
/**
* @copyright	Copyright (C) 2014 www.quantility.it
**/
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
<link rel="apple-touch-icon" href="<?php echo $icon1; ?> ">
<?php } ?>
<?php if (file_exists($icon2)) { ?>
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $icon2; ?> ">
<?php } ?>
<?php if (file_exists($icon3)) { ?>
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $icon3; ?> ">
<?php } ?>
<?php if (file_exists($icon4)) { ?>
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $icon4; ?> ">
<?php } ?>
<!--fine apple touch icon-->
<jdoc:include type="head" />
<!-- jQuery obbligatorio prima degli altri script -->
<?php /*if($templateparams->get('jquerymigrate') == 0): ?>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<?php endif; ?>
<?php if($templateparams->get('jquerymobile') == 0): ?>
<script src="//code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<?php endif; */?>
<!-- fine jQuery obbligatorio prima degli altri script -->
<!-- fogli di stile -->
<?php /*<?php if($templateparams->get('jqueryui') == 0): ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" type="text/css" />
<?php endif; ?>
<?php if($templateparams->get('jquerymobile') == 0): ?>
<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" type="text/css" /
<?php endif; */?>
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
