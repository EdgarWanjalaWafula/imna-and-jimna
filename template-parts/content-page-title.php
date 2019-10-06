<?php 
    $img        = "" ; 
    $tagline    = "" ; 
    $pagetitle  = ""; 
    
    if(is_single()){
        $img    = get_the_post_thumbnail_url(); 
        
        // Fetch taxonomy terms using get_the_id() function 
        $terms  = get_the_terms(get_the_id(), 'service_categories');

        foreach ($terms as $term) {
           $tagline = "in " . $term->name . ""; 
        }

    } elseif(is_single() && !has_post_thumbnail()){
        $img        = wp_get_attachment_image_url('109','full'); 
    } else {
        $img        = wp_get_attachment_image_url('109','full'); 
        $tagline    = get_field('page_tag_title'); 
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="page-title d-flex align-items-end position-relative parralax-window" data-parallax="scroll" data-image-src="" style="background-image:url('<?php echo $img; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-white">
                    <div class="">                   
                        <h1 class="animated fadeInUp delay-1s">
                            <?php 
                                if( !is_front_page() && is_home() ){
                                   echo $pagetitle = "Blog"; 
                                } else {
                                   echo $pagetitle = get_the_title(); 
                                }
                            ?>
                        </h1>
                        <span class="animated fadeIn slower delay-2s"><?php echo $tagline; ?></span>
                        &nbsp; 
                    </div>
                </div>
            </div>
        </div>
    </section>
</article> 