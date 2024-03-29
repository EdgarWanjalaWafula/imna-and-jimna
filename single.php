<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
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
