<?php	
/**
 * The home template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ImnaJimna
 */
get_header();

    // Check if has posts
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'home' );

    endwhile; // End of the loop.

get_footer(); 