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

// Caricamento classi da helpers/qhtml5.php
JLoader::import('qhtml5.helpers.qhtml5', JPATH_THEMES);

//Inizializzo le variabili per Joomla
$app             = JFactory::getApplication();
$user            = JFactory::getUser();

// Output come HTML5
$this->setHtml5(true);

// Inizializzo i paramentri dalla configurazione del template
$params = $app->getTemplate(true)->params;

// Controllo le variabili attive (POST e GET) - Come su template Protostar
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

// Variabili di QHTML5
$itemidMenu		= JRequest::getVar('Itemid');
$menu			= $app->getMenu()->getActive();
$active			= $app->getMenu()->getItem($itemidMenu);
$pageclass		= '';
$contentwidth    	= '';
if (is_object($menu)) {
    $pageclass = $menu->params->get('pageclass_sfx');
}

// ---------- caricamento CSS Styles ---------------- //

if ($params->get('bootstrapcss') == '1') {
    \JHtml::_('stylesheet', 'media/jui/css/bootstrap.min.css', false, false);
    \JHtml::_('bootstrap.loadCss', false, $this->direction);
} else if ($params->get('bootstrapcss') == '2') {
    \JHtml::_('stylesheet', 'media/jui/css/bootstrap.min.css', false, false);
    \JHtml::_('stylesheet', 'media/jui/css/bootstrap-responsive.min.css', false, false);
    \JHtml::_('bootstrap.loadCss', false, $this->direction);
} else if ($params->get('bootstrapcss') == '3') {
    \JHtml::_('stylesheet', 'media/jui/css/bootstrap.min.css',false, false);
    \JHtml::_('stylesheet', 'media/jui/css/bootstrap-responsive.min.css',false, false);
    \JHtml::_('stylesheet', 'media/jui/css/bootstrap-extended.css',false, false);
    \JHtml::_('bootstrap.loadCss', false, $this->direction);
}

$qhtml5_template	= 'templates/' . $this->template . '/css/template.css';
$qhtml5_magento		= 'templates/' . $this->template . '/css/magento.css';
$qhtml5_responsive	= 'templates/' . $this->template . '/css/responsive.css';

if(file_exists($qhtml5_template)){
	\JHtml::_('stylesheet', $qhtml5_template, false, false);
}
if(file_exists($qhtml5_magento)){
	\JHtml::_('stylesheet', $qhtml5_magento, false, false);
}
if(file_exists($qhtml5_responsive)){
	\JHtml::_('stylesheet', $qhtml5_responsive, false, false);
}
// -------------------------------------------------- //


// ---------- caricamento JS Scripts ---------------- //

// Caricamento jquery UI core o sortable
if($params->get('jquery') == 1):
	\JHtml::_('jquery.framework');
endif;
if($params->get('jqueryui') == 1):
	\JHtml::_('jquery.ui', array('core', 'sortable'));
endif;

if ($params->get('bootstrap') == '1') {
	\JHtml::_('bootstrap.framework');
} else if ($params->get('bootstrap') == '2') {
	// Bootstrap Custom
} 

// Add template js
\JHtml::_('script', 'template.js', array('version' => 'auto', 'relative' => true));

// -------------------------------------------------- //


// ---------- calcoli template ---------------- //
//span per left e right: dimensioni fisse per migliore user interface span3 | span6 | span3
if ($this -> countModules('left')) {
	$leftspan = 'span3';
}
if ($this -> countModules('right')) {
	$rightspan = 'span3';
}
if ($this -> countModules('left or right')) {
	$contentwidth = "span9";
	if ($this -> countModules('left and right')) {
		$contentwidth = "span6";
	} 	
} else {
		$contentwidth = "span12";
}

// array di classi per il body
$bodyclass =	'site ' . $option . ' view-' . $view
		. ($layout ? ' layout-' . $layout : ' no-layout')
		. ($task ? ' task-' . $task : ' no-task')
		. ($itemid ? ' itemid-' . $itemid : '')
		. ($pageclass ? $pageclass : '')
		. ($this->direction === 'rtl' ? ' rtl' : '');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<!-- Metas -->
	<meta charset="utf-8">
	<?php echo $params->get('after_head_open'); ?>
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
	<?php echo $params->get('favicon_code');?>
	<jdoc:include type="head" />

	<!-- Styles -->

	<!-- Scripts -->

	<?php if ($this->countModules('head')): ?><jdoc:include type="modules" name="head" style="raw" /><?php } ?>
	<?php echo $params->get('before_head_close');?>
</head>
<body class="<?php echo $bodyclass; ?>">
	<?php echo $params->get('after_body_open'); ?>
	<?php if ($params->get('browserupgrade') == '1') { ?>
		<!--[if IE]><p class="browserupgrade">Stai usando un browser <strong>vecchio e non aggiornato</strong>. Per favore <a href="https://browsehappy.com/">aggiorna il tuo browser</a> per migliorare l'esperienza di navigazione e la sicurezza in ogni sito che visiterai.</p><![endif]-->
	<?php } ?>
	<?php include 'template.php'; ?>
	<?php echo $params->get('before_body_close'); ?>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
