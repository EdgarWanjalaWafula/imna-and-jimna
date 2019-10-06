<?php
/**
 * Template part for displaying modal for generating quotes. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ImnaJimna
 */

?>    

    <!-- Cta Button  -->
    <div class="modal-btn text-right">
        <div class="row d-md-flex justify-content-end">
            <div class="col-md-3">
                <button data-toggle="modal" data-target="#quotemodal" class="btn primary-ij-bgcolor w-100 rounded-0 text-white d-flex align-items-center justfy-content-center">Get Cover <i class="icon ion-ios-arrow-round-forward"></i></button>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal animated fadeIn slow" id="quotemodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg bg-transparent border-0" role="document">
            <div class="modal-content rounded-0 border-0">
                <div class="get-quote-form">
                    
                    <i class="icon ion-ios-close" data-dismiss="modal" aria-label="Close" title="Close <?php echo the_title(); ?>"></i>
                    
                    <div class="row">
                        <?php 
                            $background_image = ""; 

                            if(has_post_thumbnail()){
                                $background_image = get_the_post_thumbnail_url(); 
                            } else {
                                $background_image = wp_get_attachment_image_url('109', 'full'); 
                            }
                        ?>
                            <div class="col-md-5 get-quote-background" style="background-image:url('<?php echo $background_image; ?>');"></div>
                            <div class="col-md-7">
                                <div class="modal-body">
                                    <?php echo do_shortcode('[contact-form-7 id="168" title="Quotation Form"]'); ?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>