<?php
/**
 * Template part for displaying the navigation bar on the homepage only at the bottom of the virtual height of the page. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ImnaJimna
 */

	$pagetitle  = ""; 

	if(is_page('home')){
		$pagetitle = "ij-homepage"; 
	} else {
		$pagetitle = "inner";
	}
	?>
	<header id="masthead" class="site-header ij-header <?php echo $pagetitle; ?>">
		<div class="container gcc-br">
			<div class="row d-flex align-items-center no-gutters">
				<div class="col-md-3 d-flex align-items-center">
					<!-- Site logo  -->
					<?php the_custom_logo(''); ?>
				</div>
				<div class="col-md-7 d-flex align-items-center">
					<nav class="navbar navbar-expand-md w-100 p-0">
						<?php
							wp_nav_menu([
								'menu'            => 'menu-1',
								'theme_location'  => 'menu-1',
								'container'       => 'div',
								'container_id'    => 'bs4navbar',
								'container_class' => 'collapse navbar-collapse w-100',
								'menu_id'         => false,
								'menu_class'      => 'navbar-nav ij-menu w-100 d-flex text-uppercase justify-content-center',
								'depth'           => 2,
								'fallback_cb'     => 'bs4navwalker::fallback',
								'walker'          => new bs4navwalker()
							]);
						?>
					</nav>
				</div>
				<div class="col-md-2 d-flex align-items-center justify-content-end">
					<a href="" class="request-quote-cta text-uppercase ij-cb">get quote</a>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->