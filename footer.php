<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ImnaJimna
 */

?>

	</div><!-- #content -->
 
	<footer id="colophon" class="ij-footer ir-padding text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-3 aos-animate" data-aos="fade-in" data-aos-delay="100"> 
					<img src="<?php echo wp_get_attachment_image_url('218', 'full'); ?>" alt="Imna & Jimnah" class="footer-logo">
					
				</div>
				<div class="col-md-6 aos-animate" data-aos="fade-in" data-aos-delay="500">
					<h5>WHAT WE OFFER</h5>
					<ul class="list-unstyled footer-services">
					<?php
						echo do_shortcode('[services_footer-sc]'); 
					?>
					</ul>
				</div>
				<div class="col aos-animate" data-aos="fade-in" data-aos-delay="700">
					<h5>REACH US</h5>
					<ul class="list-unstyled contact">
						<li><span><i class="fab fa-phone"></i></span>+254 723 456 789</li>
						<li><span><i class="fab fa-envelope"></i></span>info@imnajimna.com</li>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<div class="copyright small py-3">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-md-3"></div>
				<div class="col-md-3">
					Copyright &copy; 2019 Imna & Jimnah 
				</div>
				<div class="col-md-3">
					<?php
						wp_nav_menu([
							'menu'            => 'menu-3',
							'theme_location'  => 'menu-3',
							'menu_id'         => false,
							'menu_class'      => 'copyright-menu list-unstyled d-flex m-0', 
							'depth'           => 2,
							'fallback_cb'     => 'bs4navwalker::fallback',
							'walker'          => new bs4navwalker()
						]);
					?>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled d-flex m-0 social" >
						<li><a href=""><i class="fab fa-facebook"></i></a></li>
						<li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-instagram"></i></a></li>
						<li><a href=""><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
   
</body>
</html>
