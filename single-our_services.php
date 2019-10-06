<?php
/**
 * The template for displaying all single posts related to our services post type. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ImnaJimna
 */

get_header();

// Load Navbar 
get_template_part( 'template-parts/content', 'nav-bar' );

	while ( have_posts() ) :
		the_post();

		// Load Page Title 
		get_template_part( 'template-parts/content', 'page-title' );
			?>
				<div class="ir-padding">
					<div class="main-content container">
						<div class="row">
							<div class="col-md-8">
								<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
							</div>
						<?php
					endwhile; // End of the loop.
				?>	
				<div class="col-md-4">
					<?php get_sidebar('our-services'); ?>		
				</div>
			</div>
		</div>
	</div> 
<?php 
get_footer();
