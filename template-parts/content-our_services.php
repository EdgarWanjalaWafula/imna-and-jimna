<?php
/**
 * Template part for displaying services on single pages 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ImnaJimna
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="service-title"> 
        <?php 
            // Show title
            echo the_title('<h4 class="m-0">', '</h4>'); 
        ?>
    </div>

    <div class="service-content text-justify">
        <?php 
            // Show content description
            if(get_the_id() == "184"){
                ?>  <p>Download document file for <?php echo the_title(); ?></p>
                    <a href="<?php echo get_field('download_document'); ?>">Download <i class="fas text-dark fa-file-pdf"></i></a>
                    </div>

                    <p class="m-0">Visit website</p>
                    <a target="_blank" href="https://bimanet.co.ke/">Bimanet</a>

                <?php 
            } else {
                echo get_the_content();       
                
                // Load modal for generating quote
                get_template_part('template-parts/content', 'get-quote');
            }
        ?>
</article><!-- #post-<?php the_ID(); ?> -->
