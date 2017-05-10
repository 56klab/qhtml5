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
$honeypot_file		= $menu->params->get('honeypot_file');
$qhtml5_template	= 'templates/' . $this->template . '/css/template.css';
$qhtml5_magento		= 'templates/' . $this->template . '/css/magento.css';
$qhtml5_responsive	= 'templates/' . $this->template . '/css/responsive.css';

if ($this->params->get('bootstrap') == '1') {
	JHtml::_('bootstrap.framework');
	JHtml::_('bootstrap.loadCss', false, $this->direction);
} else if ($this->params->get('bootstrap') == '2') {
	// Bootstrap 3.x
} else if ($this->params->get('bootstrap') == '3') {
	// Bootstrap Latest 4.x
}

// Add template js
JHtml::_('script', 'template.js', array('version' => 'auto', 'relative' => true));
// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Variabili per microdati LD+Json
$md_sitetype = $this->params->get('md_sitetype');

if (is_object($menu)) {
    $pageclass = $menu->params->get('pageclass_sfx');
}
// Caricamento jquery UI core o sortable
if($this->params->get('jqueryui') == 1):
	JHtml::_('jquery.ui');
endif;
if($this->params->get('jqueryui') == 2):
	JHtml::_('jquery.ui', array('core', 'sortable'));
endif;

//Caricamento JS funzioni speciali
if ($this->params->get('radiobtn') == 1) {
	$doc->addScript('templates/' . $this->template . '/js/radiobtn.js');
}

// Load specific language related CSS
$doc->addStyleSheet('../media/jui/css/chosen.css');

// Caricamento fogli di stile di QHTML5
$doc->addStyleSheet('templates/system/css/general.css');
$doc->addStyleSheet('templates/system/css/system.css');

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
<?php
	echo $this->params->get('after_head_open');
	include 'files/favicon-app.php'; 							//include il file contente favicon e app icons
	include 'head.php'; 									//include il file contente l'HEAD della pagina html
	echo $this->params->get('before_head_close');
?>
</head>
<body class="<?php echo $bodyclass; ?>">
<?php
	echo $this->params->get('after_body_open');
	include 'template.php';									//include la parte modificabile dalla sviluppatore del template
?>
<jdoc:include type="modules" name="debug" style="none" />
<?php
	include 'files/microdata.php';								//include i microdati standard
	if ($this->params->get('enable_honeypot') == 1) { include 'files/honeypot.php'; }	//include honeypot
	echo $this->params->get('before_body_close');
?>
</body>
</html>
