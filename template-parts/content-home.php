<?php 
// get_header(); 
?>
    <section class="landing-slider position-relative">
        <div class="owl-carousel owl-theme home-slider">
            <?php 
                if(have_rows('landing_slider')):
                    while(have_rows('landing_slider')): the_row(); 
                        ?>
                            <div class="card rounded-0 border-0 position-relative">
                                <img src="<?php echo the_sub_field('slider_image');  ?>" alt="<?php echo the_sub_field('slider_heading'); ?>">
                                <div class="slider-text">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 offset-2 text-center text-justify text-white">
                                                <h3 class="slider-lead text-white animated fadeInDown slow delay-3s "><?php echo the_sub_field('slider_heading'); ?></h3>
                                                <p class="animated fadeInDown slower delay-2s"><?php echo the_sub_field('slider_description'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                    endwhile; 
                else: 

            endif; 

            wp_reset_postdata();
            ?>
        </div>
    </section>
    <div class="home-header">
        <?php 
            if(is_page('home')){
                get_template_part( 'template-parts/content', 'nav-bar' );
            } else {
                echo "navbar not found"; 
            }
        ?>
    </div>

    <!-- About Us  -->
    <section class="ij-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php _e('<h5 class="section-side-title primary-ij-color">About us</h5>') ?>
                </div>
                <?php 
                    $aboutus_content = get_field('about_imna_jimna'); 

                    if($aboutus_content){
                        // var_dump($aboutus_content); 
                        ?>
                            <div class="col-md-6">
                                <h4 class="main-section-title aos-animate" data-aos="fade-up" data-aos-delay="150"><?php echo $aboutus_content['about_us_title']; ?></h4>
                                <div class="aos-animate" data-aos="fade-up" data-aos-delay="100">
                                    <?php echo $aboutus_content['about_imna_&_jimnah_content']; ?>
                                </div>
                                <a href="<?php echo home_url('about-us'); ?>" class="ij-link text-uppercase aos-animate" data-aos="fade-down" data-aos-delay="300">Read More</a>
                            </div>
                        <?php 
                    } else {
                        ""; 
                    }

                    wp_reset_postdata();
                ?>

                <!-- Statistics  -->
                <div class="col-md-3">
                    <?php echo do_shortcode('[lgx-counter]'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="ij-background-image" style="background-image:url(<?php echo the_field('background_image_'); ?>)">    </section>
    
    <!-- Services  -->
    <section class="ij-our-services ir-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="section-side-title primary-ij-color">our products</h5>
            </div>

            <?php 
                $our_services = get_field('services_we_offer'); 

                if($our_services){
                    // var_dump($aboutus_content); 
                    ?>
                        <div class="col-md-9">
                            <h4 class="main-section-title aos-animate" data-aos="fade-up" data-aos-delay="150"><?php echo $our_services['services_we_offer_title']; ?></h4>
                            <div class="aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <?php 
                                    echo do_shortcode('[show-services-home]'); 
                                ?>
                            </div>
                        </div>
                    <?php 
                } else {
                    ""; 
                }

                wp_reset_postdata(); 
                ?>
        </div>
    </section>  
    
    <!-- Partnership  -->
    <section class="ij-partnership ir-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="section-side-title primary-ij-color">partnership</h5>
            </div>  

            <div class="col-md-9">
                <h4 class="main-section-title"><span class="primary-ij-color">Clients</span> showcase our reliability in any sector.</h4>
                    <div class="client-testimonials">
                                                
                    </div>

                    <div class="client-logos">
                        <ul class="list-unstyled row align-items-center"> 
                            <?php 
                                $clients = array(
                                    'post_type'         => 'clients',  
                                    'posts_per_page'    =>  -1
                                );

                                $i = 0; 

                                $loop = new WP_QUERY($clients);
                                
                                while($loop->have_posts()): $loop->the_post(); 
                                    $i++; 
                                    ?>
                                        <li class="aos-animate col-md-3" data-aos="fade-right" data-aos-delay="<?php echo $i; ?>00"><img src="<?php echo the_post_thumbnail_url(); ?>" title="<?php echo the_title(); ?>" alt="<?php echo the_title(); ?>" class="client-logo"></li>
                                    <?php 
                                    if($i%4 == 0){
                                        ?>
                                        </ul> 

                                        <ul class="list-unstyled row align-items-center pt-3"> 
                                        <?php
                                    }
                                endwhile;  

                                wp_reset_postdata(); 
                            ?>
                        </ul>
                    </div>
            </div>
        </div>
    </section>  
    <!-- Quote  -->
    <section class="ij-quote ir-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="section-side-title primary-ij-color">request a quote</h5>
            </div>  

            <div class="col-md-9 aos-animate" data-aos="fade-up" data-aos-delay="150">
                <h4 class="main-section-title"><span class="primary-ij-color">Ask</span> us anything!</h4>
                <div class="contact-form aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <?php echo do_shortcode('[contact-form-7 id="7" title="Send us a message"]'); ?>
                </div>
            </div>
        </div>
    </section>  
<?php 
get_footer(); 