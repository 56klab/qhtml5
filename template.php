<?php
 /**
 * @copyright	Copyright (C) 2014 www.quantility.it
 **/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<div id="wrapper">

	<div id="top"<?php echo $fixedclass; ?>>
		<header>
			<div id="header">				
				<h1>
					<?php if ($this->countModules('logo')): ?>
					<div id="logo">
						<jdoc:include type="modules" name="logo" />
					</div>
					<?php endif; ?>
					<?php if ($this->countModules('payoff')): ?>
					<div id="payoff">
						<jdoc:include type="modules" name="payoff" />
					</div>
					<?php endif; ?>
				</h1>							
			</div>
		</header>
		<nav>
			<div id="menu">
				<jdoc:include type="modules" name="menu" />
			</div>
		</nav>
	</div><!-- end Top -->
	
	<?php if ($this->countModules('center-top')): ?>
	<div id="center-top">
		<jdoc:include type="modules" name="center-top" />
	</div>
	<?php endif; ?>	
	
	<div id="center">    
        <div id="center-floater">
            <div id="container<?php echo $containerwidth; ?>">
				<jdoc:include type="message" />		
				<?php if ( $templateparams->get('showcomponent') == 0  OR  $menu->getActive() != $menu->getDefault() ) { ?>
				<div id="content">
					<section>
						<div id="sezione">
							<jdoc:include type="component" />
							<jdoc:include type="modules" name="sezione"  />
						</div>
					</section>
				</div>
				<?php }	?>
			</div><!-- end container -->
            <?php if ($this->countModules('left')){ ?>
				<aside id="left">
					<jdoc:include type="modules" name="left" />
				</aside >
			<?php } ?>
        </div><!-- end center-floater -->
        <?php if ($this->countModules('right')) { ?>
			<aside id="right">
				<jdoc:include type="modules" name="right" />
			</aside >
		<?php } ?>
    </div><!-- end center -->
    
    <?php if ($this->countModules('center-bottom')): ?>
	<div id="center-bottom">
		<jdoc:include type="modules" name="center-bottom" />
	</div>
	<?php endif; ?>	
	
	<div id="bottom"<?php echo $bottomstyle; ?>>
		<footer>
				<div id="footer">				
					<jdoc:include type="modules" name="footer" />
				</div>
		</footer>
	</div>
	<?php if ($this->countModules('copyright')): ?>
	<div id="copyright">				
					<jdoc:include type="modules" name="copyright" />
	</div>
	<?php endif; ?>
	
</div><!-- Fine Wrapper -->