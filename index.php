<?php
/**
 * @package      Qhtml5
 *
 * @author       Quantility
 * @copyright    Copyright (C) 2016. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

//Inizializzo le variabili per Joomla
$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$lang            = JFactory::getLanguage();
$this->language  = $doc->language;
$this->direction = $doc->direction;

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

// Variabili per microdati LD+Json
$md_sitetype = $this->params->get('md_sitetype');

if (is_object($menu)) {
    $pageclass = $menu->params->get('pageclass_sfx');
}
// Caricamento framework boostrap
	JHtml::_('bootstrap.framework');

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

//Caricamento Fogli di Style, attenzione all'ordine!
if ($this->params->get('bootstrapcss') == '1') {
	JHtml::_('bootstrap.loadCss', true, $this->direction);
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
$bodyclasses =	'site'
		. ($pageclass ? $pageclass : '') . ' '
		. $option . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout')
		. ($task ? ' task-' . $task : ' no-task')
		. ($itemid ? ' itemid-' . $itemid : '');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<?php	include 'files/favicon-app.php'; 						//include il file contente favicon e app icons
	include 'head.php'; 								//include il file contente l'HEAD della pagina html
	if ($this->params->get('enable_md') == 1) { include 'files/microdata.php';	//include i microdati standard
?>
</head>
<body class="<?php echo $bodyclasses; ?>">
<?php	if ($this->params->get('enable_gtm') == 1) { echo $this->params->get('script_gtm'); }	//include Google Tag Manager
	include 'template.php'; 								//include la parte modificabile dalla sviluppatore del template
	if ($this->params->get('enable_honeypot') == 1) { include 'files/honeypot.php'; }	//include honeypot
?>
<jdoc:include type="modules" name="debug" style="none" />
</body>
<?php include 'files/debugger.php'; 				//include il file debugger ?>
</html>
