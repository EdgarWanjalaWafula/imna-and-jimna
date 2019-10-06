<section>
    <div class="container-fluid">
        <div class="row">
            <div class="row w-100">
            <?php 
                $contactus = get_field('contact_us_group'); 

                if($contactus){
                    ?>  
                        <div class="col-md-4">
                            <?php echo $contactus['map']; ?>
                        </div>

                        <div class="col-md-8">
                            <div class="ir-padding contact-details-form">
                                <div class="row">
                                    <div class="col-md-5">
                                        <?php
                                            $i = 0; 
                                            if( have_rows('contact_us_group') ): while ( have_rows('contact_us_group') ) : the_row(); 
                                                if( have_rows('contact_details') ): while ( have_rows('contact_details') ) : the_row();       
                                                    $i++; 
                                                    ?>
                                                        <div class="card  border-0 aos-animate" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>">
                                                            <span><?php echo the_sub_field('title'); ?></span>
                                                            <p class="m-0"><?php echo the_sub_field('content'); ?></p>
                                                        </div>
                                                    <?php 
                                                endwhile; endif;
                                            endwhile; endif;
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 

                                            // Title
                                            _e('<h4>Send us a message</h4>'); 

                                            // Show contact form
                                            echo do_shortcode($contactus['contact_form']);                            
                                            
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                }
            ?>
            </div>
        </div>
    </div>
</section>