<?php 

?>
    <section class="ir-padding personal-services">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php 
                        echo do_shortcode('
                        [ajax_load_more loading_style="infinite classic" container_type="div" css_classes="row" post_type="our_services" posts_per_page="2" taxonomy="service_categories" taxonomy_terms="personal-sector" taxonomy_operator="IN" button_label="Older Services" button_loading_label="Loading Services"]
                        ');
                    ?>
                </div>
                <div class="col-md-4">
                    <div class="widget-area">
                        <?php
                            if(is_page('personal')){
                                _e('<h2 class="widget-title">Cover (Business)</h2>', ''); 
                                echo do_shortcode('[show-services-business category="business-sector"]'); 
                            } elseif(is_page('business')){
                                echo do_shortcode('[show-services-business category="personal-sector"]'); 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>