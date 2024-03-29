<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ImnaJimna
 */

get_header();

// Load Navbar 
get_template_part( 'template-parts/content', 'nav-bar' );

// Load Page Title 
get_template_part( 'template-parts/content', 'page-title' );
?>

	<section class="ir-padding">
	<div id="primary" class="content-area container">
		<main id="main" class="site-main row">
			<div class="col-md-8">
					<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
				?>
			</div>

			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	</section>

<?php

get_footer();
