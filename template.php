<?php
 /**
 * @copyright	Copyright (C) 2014 www.quantility.it
 **/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<div id="wrapper">

	<div id="top" class="<?php echo $fixedclass; ?>">
		<header>
			<div id="header">				
					<?php if ($this->countModules('logo')): ?>
					<div id="logo">
						<jdoc:include type="modules" name="logo" style="html5"/>
					</div>
					<?php endif; ?>
					<?php if ($this->countModules('payoff')): ?>
					<div id="payoff">
						<jdoc:include type="modules" name="payoff" style="html5"/>
					</div>
					<?php endif; ?>							
			</div>
		</header>
		<nav>
			<div id="menu">
				<jdoc:include type="modules" name="menu" style="html5"/>
			</div>
		</nav>
	</div><!-- end Top -->
	
	<?php if ($this->countModules('center-top')): ?>
	<div id="center-top">
		<jdoc:include type="modules" name="center-top" style="html5"/>
	</div>
	<?php endif; ?>	
	
	<div id="center">    
	
		<?php if ($this->countModules('left')){ ?>
			<aside id="left" class="span3">
				<jdoc:include type="modules" name="left" style="html5"/>
			</aside>
		<?php } ?>
		
		<div id="content" class="<?php echo $contentspan; ?>">
			<jdoc:include type="message" />	
			<?php if ( $this->params->get('showcomponent') == 0  OR  $menu->getActive() != $menu->getDefault($lang->getTag())) { ?>
				<section>
					<jdoc:include type="component" />
				</section>
			<?php }	?>
		</div><!-- end container -->
		
		<?php if ($this->countModules('right')) { ?>
			<aside id="right" class="span3">
				<jdoc:include type="modules" name="right" style="html5"/>
			</aside>
		<?php } ?>

	</div><!-- end center -->
    
   <?php if ($this->countModules('center-bottom')): ?>
	<div id="center-bottom">
		<jdoc:include type="modules" name="center-bottom" style="html5"/>
	</div>
	<?php endif; ?>	
	
	<div id="bottom" class="<?php echo $bottomstyle; ?>">
		<footer>
			<div id="footer">				
				<jdoc:include type="modules" name="footer" style="html5" />
			</div>
		</footer>
		<?php if ($this->countModules('copyright')): ?>
			<div id="copyright">				
				<jdoc:include type="modules" name="copyright" style="html5"/>
			</div>
		<?php endif; ?>
	</div><!-- Fine Bottom -->
	
</div><!-- Fine Wrapper -->