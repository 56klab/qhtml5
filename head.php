<?php
 /**
 * @copyright	Copyright (C) 2014 www.quantility.it
 **/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
JHtml::_('bootstrap.framework');
JHtml::_('bootstrap.loadcss')
?>
<head>
	<?php header('X-UA-Compatible: IE=edge,chrome=1');?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- framework per funzionamento joomla -->
	<jdoc:include type="head" />
	<!-- fine framework per funzionamento joomla -->
	
	
    <!-- jQuery obbligatorio prima degli altri script -->
	<?php if($templateparams->get('jquerymigrate') == 0): ?>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<?php endif; ?>
	<?php if($templateparams->get('jqueryui') == 0): ?>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
	<?php endif; ?>
	<?php if($templateparams->get('jquerymobile') == 0): ?>
	<script src="//code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	<?php endif; ?>
	<!-- fine jQuery obbligatorio prima degli altri script -->


<!-- fogli di stile -->
<?php if($templateparams->get('normalize') == 0): ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css" type="text/css" />
<?php endif; ?>
<?php if($templateparams->get('jqueryui') == 0): ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" type="text/css" />
<?php endif; ?>
<?php if($templateparams->get('jquerymobile') == 0): ?>
<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" type="text/css" /
<?php endif; ?>

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/template.css" type="text/css" />
<?php if($templateparams->get('tpdebug') == 1): ?>
<style>
	* {border: 1px solid #f00;}
	*:hover {border: 1px solid #4218f8;}
</style>
<?php endif; ?>	
	<!-- fine fogli di stile -->
<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
<?php // If Right-to-Left
if ($this->direction == 'rtl') :
    $doc->addStyleSheet('../media/jui/css/bootstrap-rtl.css');
endif;
 
// Load specific language related CSS
$doc->addStyleSheet('../media/jui/css/chosen.css');
?>
	<!-- extra javascript -->
	<!-- fine extra javascript -->

<!--[if lt IE 9]>
	<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
<![endif]-->
<?php if($templateparams->get('enablega') == 0) : echo $templateparams->get('scriptga');
endif; ?>
</head>