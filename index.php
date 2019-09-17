<?php
/**
 * @package      Qhtml5
 * @subpackage   Templates.qhtml5
 * @author       Quantility
 * @copyright    Copyright (C) 2019. All rights reserved.
 * @license      GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

// Caricamento classi da helpers/qhtml5.php
JLoader::import('qhtml5.helpers.qhtml5', JPATH_THEMES);

//Inizializzo le variabili per Joomla
$app             = JFactory::getApplication();
$user            = JFactory::getUser();

// Output come HTML5
$this->setHtml5(true);

// Disabilita Generator
$this->setGenerator(null);

//Imposta Meta
$this->setMetaData('viewport', 'width=device-width,initial-scale=1');

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
$contentwidth   = '';
if (is_object($menu)) {
    $pageclass = $menu->params->get('pageclass_sfx');
}
$qhtml5_bs4_grid_min	= 'templates/' . $this->template . 'css/boostrap4/bootstrap-grid.min.css';
$qhtml5_bs4_grid		= 'templates/' . $this->template . 'css/boostrap4/bootstrap-grid.css';
$qhtml5_template		= 'templates/' . $this->template . '/css/template.css';
$qhtml5_magento			= 'templates/' . $this->template . '/css/magento.css';
$qhtml5_responsive		= 'templates/' . $this->template . '/css/responsive.css';
$qhtml5_customjs		= 'templates/' . $this->template . '/js/custom.js';

// array di classi per il body
$bodyclass =	'site ' . $option . ' view-' . $view
		. ($layout ? ' layout-' . $layout : ' no-layout')
		. ($task ? ' task-' . $task : ' no-task')
		. ($itemid ? ' itemid-' . $itemid : '')
		. ($pageclass ? $pageclass : '')
		. ($this->direction === 'rtl' ? ' rtl' : '');

// ---------- caricamento CSS Styles ---------------- //
if ($params->get('bootstrapcss') == '1') {
    HTMLHelper::_('stylesheet', 'media/jui/css/bootstrap.min.css', false, false);
    HTMLHelper::_('bootstrap.loadCss', false, $this->direction);
} else if ($params->get('bootstrapcss') == '2') {
    HTMLHelper::_('stylesheet', 'media/jui/css/bootstrap.min.css', false, false);
    HTMLHelper::_('stylesheet', 'media/jui/css/bootstrap-responsive.min.css', false, false);
    HTMLHelper::_('bootstrap.loadCss', false, $this->direction);
} else if ($params->get('bootstrapcss') == '3') {
    HTMLHelper::_('stylesheet', 'media/jui/css/bootstrap.min.css', false, false);
    HTMLHelper::_('stylesheet', 'media/jui/css/bootstrap-responsive.min.css', false, false);
    HTMLHelper::_('stylesheet', 'media/jui/css/bootstrap-extended.css', false, false);
    HTMLHelper::_('bootstrap.loadCss', false, $this->direction);
}
if ($params->get('bootstrapcss4grid') == '1') {
	if(file_exists($qhtml5_bs4_grid_min)){
		HTMLHelper::_('stylesheet', $qhtml5_bs4_grid_min, false, false);
	} else if(file_exists($qhtml5_bs4_grid)){
		HTMLHelper::_('stylesheet', $qhtml5_bs4_grid, false, false);
	}
}
if(file_exists($qhtml5_template)){
	HTMLHelper::_('stylesheet', $qhtml5_template, false, false);
}
if(file_exists($qhtml5_magento)){
	HTMLHelper::_('stylesheet', $qhtml5_magento, false, false);
}
if(file_exists($qhtml5_responsive)){
	HTMLHelper::_('stylesheet', $qhtml5_responsive, false, false);
}
// -------------------------------------------------- //

// ---------- caricamento JS Scripts ---------------- //
// Caricamento jquery UI core o sortable
if($params->get('jquery') == 1):
	HTMLHelper::_('jquery.framework');
endif;
if($params->get('jqueryui') == 1):
	HTMLHelper::_('jquery.ui', array('core', 'sortable'));
endif;
if ($params->get('bootstrap') == '1') {
	HTMLHelper::_('bootstrap.framework');
} else if ($params->get('bootstrap') == '2') {
	// Bootstrap Custom
} 
// Add template js
HTMLHelper::_('script', 'template.js', array('version' => 'auto', 'relative' => true));
// -------------------------------------------------- //

// ---------- calcoli template ---------------------- //
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
// -------------------------------------------------- //
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<!-- Meta Start -->
	<?php if ($params->get('after_head_open') echo "<!-- after_head_open start -->"."\r\n".$params->get('after_head_open')."\r\n"."<!-- after_head_open end -->"."\r\n"; ?>	
	<?php echo $params->get('favicon_code')."\r\n";?>
<!-- Meta End -->
<!-- Head Start -->
	<jdoc:include type="head" />
<!-- Head End -->
<!-- Extra Styles Start -->
<!-- Extra Styles End -->
<!-- Extra Scripts Start -->
<!-- Extra Scripts End -->
	<?php if ($this->countModules('head')): ?><jdoc:include type="modules" name="head" style="raw" /><?php endif; ?>
	<?php if ($params->get('before_head_close') echo "<!-- before_head_close start -->"."\r\n".$params->get('before_head_close')."\r\n"."<!-- before_head_close end -->"."\r\n"; ?>
</head>
<body class="<?php echo $bodyclass; ?>">
	<?php if ($params->get('after_body_open') echo "<!-- after_body_open start -->"."\r\n".$params->get('after_body_open')."\r\n"."<!-- after_body_open end -->"."\r\n"; ?>
	<?php if ($params->get('browserupgrade') == '1') : ?>
		<?php include 'includes/browserupgrade.php'; ?>
    <?php endif; ?>
	<?php include 'template.php'; ?>
	<?php if ($params->get('before_body_close') echo "<!-- before_body_close start -->"."\r\n".$params->get('before_body_close')."\r\n"."<!-- before_body_close end -->"."\r\n"; ?>
	<jdoc:include type="modules" name="debug" style="none" />
	<?php if(file_exists($qhtml5_customjs)){ ?>
		<script src="js/custom.js"></script>
	<?php endif; ?>
</body>
</html>
