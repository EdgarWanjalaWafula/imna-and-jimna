<section class="ir-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php _e('<h5 class="section-side-title primary-ij-color">Introduction</h5>') ?>
            </div>
            <div class="col-md-9">
                <?php _e('<h4 class="main-section-title aos-init aos-animate">A few words about us</h4>'); ?>
                
                <?php 
                    $introduction = get_field('introduction'); 

                    if($introduction){
                        // var_dump($aboutus_content); 
                        ?>
                            <p class="lead"><?php echo $introduction['lead_introduction'];  ?></p>
                            <p class="text-justify"><?php echo $introduction['main_paragraph']; ?></p>
                        <?php 
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<section class="section-background" style="background-image:url('<?php echo the_field('introduction_image'); ?>');"></section>
<section class="clients-main ir-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php _e('<h5 class="section-side-title primary-ij-color">Clients</h5>') ?>
            </div>
            <div class="col-md-9">
                <h4 class="main-section-title"><span class="primary-ij-color">People</span> who we've worked with.</h4>
                <?php _e('I&J Insurance Agency has a strong partnerships with the following:', ''); ?>
                &nbsp; 
                <div class="">
                    <div class="row d-flex align-items-center">
                        
                        <?php 
                            $clients = array(
                                'post_type'         =>  'clients', 
                                'posts_per_page'    => -1
                            );

                            $i = 0; 

                            $loop = new WP_QUERY($clients);
                            
                            while($loop->have_posts()): $loop->the_post(); 
                                $i++; 
                                    ?>
                                        <div class="col-md-3 text-center">
                                            <?php 
                                               the_post_thumbnail( 'post-thumbnail', array(
                                                'alt'       =>  the_title_attribute( array(
                                                    'echo'  => false,
                                                ) ),
                                                'class'     =>  'img-fluid client-logo', 
                                                'title'     =>  the_title_attribute(array(
                                                    'echo'  =>  false
                                                )), 
                                            ) );
                                            ?>
                                        </div>
                                <?php 
                                if($i%4==0){
                                    echo "</div>"; 
                                    echo "<br>";
                                    echo "<div class='row d-flex align-items-center'>"; 
                                }
                            endwhile;  

                            wp_reset_postdata(); 
                        ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-background" style="background-image:url('<?php echo the_field('clients_image'); ?>');"></section>