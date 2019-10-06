<?php
/**
 * Template file used to display Personal category services. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mygroceries
 */
get_header();

// Load Navbar 
get_template_part( 'template-parts/content', 'nav-bar' );

    while ( have_posts() ) :
        
        the_post();
            
            // Load Page Title 
            get_template_part( 'template-parts/content', 'page-title' );

            // Load page content
            get_template_part( 'template-parts/content', 'business-category' );
            
    endwhile; // End of the loop.

get_footer();