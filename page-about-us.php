<?php
/**
 * Template file used to display the About Us page content. 
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
            get_template_part( 'template-parts/content', 'about-us' );

    endwhile; // End of the loop.

get_footer();