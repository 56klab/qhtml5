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
$itemidMenu     = JRequest::getVar('Itemid');
$menu           = $app->getMenu()->getActive();
$active         = $app->getMenu()->getItem($itemidMenu);
$pageclass      = '';
$contentwidth       = '';
$honeypot_file      = $params->get('honeypot_file');
$qhtml5_template    = 'templates/' . $this->template . '/css/template.css';
$qhtml5_magento     = 'templates/' . $this->template . '/css/magento.css';
$qhtml5_responsive  = 'templates/' . $this->template . '/css/responsive.css';


if ($this->error->getCode() == '404') {
    header("HTTP/1.0 404 Not Found");
    $this->setMetaData('robots', 'noindex' );
}
if ($params->get('bootstrap') == '1') {
    JHtml::_('bootstrap.framework');
} else if ($params->get('bootstrap') == '2') {
    // Bootstrap 3.x
} else if ($params->get('bootstrap') == '3') {
    // Bootstrap Latest 4.x
}
if ($params->get('bootstrapcss') == '1') {
    JHtml::_('stylesheet', 'media/jui/css/bootstrap.min.css',false,false);
    JHtml::_('bootstrap.loadCss', false, $this->direction);
} else if ($params->get('bootstrapcss') == '2') {
    JHtml::_('stylesheet', 'media/jui/css/bootstrap.min.css',false,false);
    JHtml::_('stylesheet', 'media/jui/css/bootstrap-responsive.min.css',false,false);
    JHtml::_('bootstrap.loadCss', false, $this->direction);
} else if ($params->get('bootstrapcss') == '3') {
    JHtml::_('stylesheet', 'media/jui/css/bootstrap.min.css',false,false);
    JHtml::_('stylesheet', 'media/jui/css/bootstrap-responsive.min.css',false,false);
    JHtml::_('stylesheet', 'media/jui/css/bootstrap-extended.css',false,false);
    JHtml::_('bootstrap.loadCss', false, $this->direction);
}

// Add template js
JHtml::_('script', 'template.js', array('version' => 'auto', 'relative' => true));
// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Variabili per microdati LD+Json
$md_sitetype = $params->get('md_sitetype');

if (is_object($menu)) {
    $pageclass = $menu->params->get('pageclass_sfx');
}
// Caricamento jquery UI core o sortable
if($params->get('jqueryui') == 1):
    JHtml::_('jquery.ui');
endif;
if($params->get('jqueryui') == 2):
    JHtml::_('jquery.ui', array('core', 'sortable'));
endif;

// array di classi per il body
$bodyclass =    'site ' . $option . ' view-' . $view
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
    echo $params->get('after_head_open');
    include 'files/favicon-app.php';                            //include il file contente favicon e app icons
    include 'head.php';                                     //include il file contente l'HEAD della pagina html
    echo $params->get('before_head_close');
?>
</head>
<body class="<?php echo $bodyclass; ?>">
<?php echo $params->get('after_body_open');?>
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
?>
<section class="header">
    <header class="container">
        <div id="header" class="row">
            <?php if (JModuleHelper::getModule('top')): ?>
                <div id="top">
                    <jdoc:include type="modules" name="top" style="html5"/>
                </div>
                <?php endif; ?>
                <?php if (JModuleHelper::getModule('logo')): ?>
                <div id="logo">
                    <jdoc:include type="modules" name="logo" style="html5"/>
                </div>
                <?php endif; ?>
                <?php if (JModuleHelper::getModule('payoff')): ?>
                <div id="payoff">
                    <jdoc:include type="modules" name="payoff" style="html5"/>
                </div>
                <?php endif; ?>
                <nav>
                    <div id="menu">
                        <jdoc:include type="modules" name="menu" style="html5"/>
                    </div>
                </nav>
            </div>
    </header>
</section>          
<section class="container">
    <div id="center" class="row">             
        <div id="content" class="<?php echo $contentwidth; ?>">
            <jdoc:include type="message"/>
                <section>                                      
                    <div id="error-404">
                        <?php 
                                foreach (JModuleHelper::getModules('error-404') as $module404);
                                echo JModuleHelper::renderModule($module404, array('style'=>'none'));
                                //echo $this->getBuffer('$module404', 'error-404', array('style' => 'none'));
                        ?>
                    </div>                  
                </section>           
        </div>          
    </div>
</section>
<!-- end center -->
<div id="bottom">
    <footer class="container">
        <div id="footer" class="row">           
            <jdoc:include type="modules" name="footer" style="html5" />
        </div>
    </footer>
    <?php if (JModuleHelper::getModule('copyright')): ?>
    <section class="container">
        <div id="copyright" class="row">                
            <jdoc:include type="modules" name="copyright" style="html5"/>
        </div>
    </section>
    <?php endif; ?>
</div><!-- Fine Bottom -->  
<jdoc:include type="modules" name="debug" style="none" />
<?php echo $params->get('before_body_close'); ?>

<?php if ($this->debug) : ?>
<div>
    <?php echo $this->renderBacktrace(); ?>
    <?php // Check if there are more Exceptions and render their data as well ?>
    <?php if ($this->error->getPrevious()) : ?>
        <?php $loop = true; ?>
        <?php // Reference $this->_error here and in the loop as setError() assigns errors to this property and we need this for the backtrace to work correctly ?>
        <?php // Make the first assignment to setError() outside the loop so the loop does not skip Exceptions ?>
        <?php $this->setError($this->_error->getPrevious()); ?>
        <?php while ($loop === true) : ?>
            <p><strong><?php echo JText::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
            <p><?php echo htmlspecialchars($this->_error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>
            <?php echo $this->renderBacktrace(); ?>
            <?php $loop = $this->setError($this->_error->getPrevious()); ?>
        <?php endwhile; ?>
        <?php // Reset the main error object to the base error ?>
        <?php $this->setError($this->error); ?>
    <?php endif; ?>
</div>
<?php endif; ?>
</body>
</html>