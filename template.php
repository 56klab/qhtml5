<?php
 /**
 * @copyright	Copyright (C) 2014 www.quantility.it
 **/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<div id="wrapper">
	<section class="header">
		<header class="container">
			<div id="header" class="row">
				<?php if ($this->countModules('top')): ?>
					<div id="top">
						<jdoc:include type="modules" name="top" style="html5"/>
					</div>
					<?php endif; ?>
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
					<nav>
						<div id="menu">
							<jdoc:include type="modules" name="menu" style="html5"/>
						</div>
					</nav>
				</div>
		</header>
	</section>			
	<?php if ($this->countModules('section-top')): ?>
	<section class="container">
		<div id="section-top" class="row">
			<jdoc:include type="modules" name="section-top" style="html5"/>
		</div>
	</section>	
	<?php endif; ?>	
	<section class="container">
		<div id="center" class="row"> 		
			<?php if ($this->countModules('left')){ ?>
				<aside id="left" class="<?php echo $rightspan; ?>">
					<jdoc:include type="modules" name="left" style="html5"/>
				</aside>
			<?php } ?>			
			<div id="content" class="<?php echo $contentwidth; ?>">
				<jdoc:include type="message">
				<?php if ($this->countModules('center-top')): ?>
					<section class="row-fluid">	
						<div id="center-top">
							<jdoc:include type="modules" name="center-top" style="html5"/>
						</div>
					</section>	
				<?php endif; ?>
				<?php if ( $this->params->get('showcomponent') == 0  OR  $menu != $app->getMenu()->getDefault($lang->getTag())) { ?>
					<section>
						<jdoc:include type="component" />
					</section>
				<?php }	?>
				<?php if ($this->countModules('center-bottom')): ?>
					<section class="row-fluid">
						<div id="center-bottom">
							<jdoc:include type="modules" name="center-bottom" style="html5"/>
						</div>
					</section>	
				<?php endif; ?>
			</div>			
			<?php if ($this->countModules('right')) { ?>
				<aside id="right" class="<?php echo $rightspan; ?>">
					<jdoc:include type="modules" name="right" style="html5"/>
				</aside>
			<?php } ?>	
		</div>
	</section>
	<!-- end center -->
	<?php if ($this->countModules('section-bottom')): ?>
	<section class="container">
		<div id="section-bottom" class="row">
			<jdoc:include type="modules" name="section-bottom" style="html5"/>
		</div>
	</section>
	<?php endif; ?>	
	<div id="bottom">
		<footer class="container">
			<div id="footer" class="row">			
				<jdoc:include type="modules" name="footer" style="html5" />
			</div>
		</footer>
		<?php if ($this->countModules('copyright')): ?>
		<section class="container">
			<div id="copyright" class="row">				
				<jdoc:include type="modules" name="copyright" style="html5"/>
			</div>
		</section>
		<?php endif; ?>
	</div><!-- Fine Bottom -->	
</div><!-- Fine Wrapper -->
