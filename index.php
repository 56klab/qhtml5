<?php
 /**
 * @copyright	Copyright (C) 2013 www.quantility.it
 **/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app 				= JFactory::getApplication();
$doc 				= JFactory::getDocument();
$user 				= JFactory::getUser();
$this->language 	= $doc->language;
$this->direction 	= $doc->direction;
$itemid				= JRequest::getVar('Itemid');
$menu				= $app->getMenu();
$templateparams		= $app -> getTemplate(true) -> params;
$active				= $menu -> getItem($itemid);
$pageclass			= '';
$fixedclass			= '';
$bottomstyle		= '';
$containerwidth 	= '';

JHtml::_('bootstrap.framework');
$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap.min.css');


if ($params -> get('pageclass_sfx')) {
	if ($templateparams -> get('classepagina') == 0) {
		$pageclass = ' class="' . $params -> get('pageclass_sfx') . '" ';
	}
	else if ($templateparams -> get('classepagina') == 1) {
		if (!$menu -> getActive() === $menu -> getDefault()) {
			$pageclass = ' class="' . $params -> get('pageclass_sfx') . '" ';
		}
	}
	else if ($templateparams -> get('classepagina') == 2) {
		if ($menu -> getActive() === $menu -> getDefault()) {
			$pageclass = ' class="' . $params -> get('pageclass_sfx') . '" ';
	}
	}
	else if ($templateparams -> get('classepagina') == 3) {
		$pageclass = '';
	}
}

if ($templateparams -> get('topfixed') == 0) {
	$fixedclass = ' class="fixed"';
} else if ($templateparams -> get('topfixed') == 1) {
	$fixedclass = '';
} else if ($templateparams -> get('topfixed') == 2) {
	$fixedclass = ' class="absolute"';
}

if ($templateparams -> get('bottomsetting') == 0) {
		$bottomstyle = '';
}
if ($templateparams -> get('bottomsetting') == 1) {
		$bottomstyle = ' class="clearfix"';
}
if ($templateparams -> get('bottomsetting') == 2) {
		$bottomstyle = ' class="fixed"';
}

if ($this->countModules('left or right')) {
	$containerwidth = "-medium";
	if ($this->countModules('left and right')) {
		$containerwidth = "-small";
	}
}


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>> <!--<![endif]-->

<?php include 'head.php'; ?>

<body<?php echo $pageclass; ?>>

<?php include 'template.php'; ?>

<?php if($templateparams->get('jsbottom') == 0): ?>
<!-- javascript alla fine del body -->
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/js/plugins.js"></script>			
<!-- fine javascript alla fine del body -->
<?php endif; ?>
<jdoc:include type="modules" name="debug" />
</body>
</html>