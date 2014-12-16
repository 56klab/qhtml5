<?php
 /**
 * @copyright	Copyright (C) 2013 www.quantility.it
 **/
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
$itemidMenu			= JRequest::getVar('Itemid');
$menu				= $app->getMenu()->getActive();
$active				= $app->getMenu()->getItem($itemidMenu);
$pageclass			= '';
$contentwidth    	= '';
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
$doc->addStyleSheet('templates/' . $this->template . '/css/template.css');
if (file_exists('templates/' . $this->template . '/css/magento.css')) {
	$doc->addStyleSheet('templates/' . $this->template . '/css/magento.css');
}
if (file_exists('templates/' . $this->template . '/css/responsive.css')) {
	$doc->addStyleSheet('templates/' . $this->template . '/css/responsive.css');
}
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
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<?php include 'head.php'; //include il file contente l'HEAD della pagina html ?>
</head>
<body class="site <?php echo ($pageclass ? $pageclass : '') .''.$option . ' view-' . $view . 
							 ($layout ? ' layout-' . $layout : ' no-layout') . 
							 ($task ? ' task-' . $task : ' no-task') .
							 ($itemid ? ' itemid-' . $itemid : '');
						?>">
<?php include 'template.php'; //include la parte modificabile dalla sviluppatore del template ?>
<jdoc:include type="modules" name="debug" style="none" />
</body>
<?php if(JDEBUG) {
		//session_start();
		echo "<h3> PHP List All Session Variables</h3>";
		foreach ($_SESSION as $key=>$val) {
			echo '<pre>';	
			print_r($val);
			echo '</pre>';	
		}		
	} ?>
</html>
