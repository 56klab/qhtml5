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
$menu				   = $app->getMenu();
$active				= $menu -> getItem($itemidMenu);
$pageclass			= '';
$fixedclass			= '';
$bottomstyle		= '';
$contentspan    	= '';

// Caricamento framework boostrap
JHtml::_('bootstrap.framework');

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
$doc->addStyleSheet('templates/' . $this->template . '/css/magento.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/responsive.css');

if ($this->params->get('topfixed') == 0) {
	$fixedclass = '';
} else if ($this->params->get('topfixed') == 1) {
	$fixedclass = '.navbar-fixed-top';
}

if ($this->params->get('bottomfixed') == 0) {
	$fixedclass = '';
} else if ($this->params->get('bottomfixed') == 1) {
	$fixedclass = '.navbar-fixed-bottom';
}

/*
if ($templateparams -> get('bottomsetting') == 0) {
		$bottomstyle = '';
}
if ($templateparams -> get('bottomsetting') == 1) {
		$bottomstyle = ' class="clearfix"';
}
if ($templateparams -> get('bottomsetting') == 2) {
		$bottomstyle = ' class="fixed"';
}
*/

// calcolo span e moduli

//span per left e right: dimensioni fisse per migliore user interface span3 | span6 | span3
	if ($this->countModules('left or right')) { //se esiste una delle colonne laterali
		$contentspan = "span9";
		if ($this->countModules('left and right')) { //se esistono entrambe le colonne
			$contentspan = "span6";
		}
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<?php include 'head.php'; //include il file contente l'HEAD della pagina html ?>
</head>

<body class="site <?php echo $pageclass . $option . ' view-' . $view . 
								($layout ? ' layout-' . $layout : ' no-layout') . 
								($task ? ' task-' . $task : ' no-task') .
								($itemid ? ' itemid-' . $itemid : '');
						?>">
	<?php
		include 'template.php'; //include la parte modificabile dalla sviluppatore del template
	?>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
<?php
	if(JDEBUG)
	{
		//session_start();
		echo "<h3> PHP List All Session Variables</h3>";
		foreach ($_SESSION as $key=>$val) {
			print_r($val);
		}		
	}
?>