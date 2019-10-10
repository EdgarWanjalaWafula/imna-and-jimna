<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ImnaJimna
 */

if ( ! function_exists( 'imnajimna_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function imnajimna_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'imnajimna' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'imnajimna_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function imnajimna_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'imnajimna' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'imnajimna_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function imnajimna_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'imnajimna' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'imnajimna' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'imnajimna' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'imnajimna' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'imnajimna' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'imnajimna' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'imnajimna_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function imnajimna_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

function show_services(){
	$terms = get_terms( array(
		'taxonomy' => 'service_categories',
		'hide_empty' => true,
	) );

	$i = "";

	$count = count($terms);
		?>
			<nav>
				<div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
					<?php 
						if($count > 0){
							foreach ($terms as $term) {
								$i++;
								$active = ($i == 1) ? "active" : "" ;
								$selected = ($i == 1) ? "true" : "false" ;

								?>
								<a class="nav-item nav-link <?php echo $active; ?> aos-animate" data-aos="fade-up" data-aos-delay="<?php echo ($i*2); ?>00" id="nav-<?php echo $term->slug; ?>-tab" data-toggle="tab" href="#nav-<?php echo $term->slug; ?>" role="tab" aria-controls="nav-<?php echo $term->slug; ?>" aria-selected="true"><?php echo $term->name; ?></a>
								<?php 
							}
						} else {
							""; 
						}
					?>
					<a class="nav-item nav-link ml-auto ij-link" href="">View all </a>
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<?php 
				
					foreach($terms as $key => $term ){
						//echo $key;

						if ($key == 0) {
							$active = "show active";
						}else{
							$active = "";
						}
							?>
								<div class="tab-pane fade <?php echo $active; ?>" id="nav-<?php echo $term->slug; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $term->slug; ?>-tab">
									<?php 
										$services = array(
											'post_type' 			=> 	'our_services', 
											'service_categories' 	=> 	$term->slug,
											'posts_per_page'		=> 	4
										);

										$loop = new WP_QUERY($services);
										$i = 0; 
											?>
												<div class="owl-carousel owl-theme home-services">
													<?php 
														while($loop->have_posts()): $loop->the_post(); 
														$i++; 
															?>
																<div class="card rounded-0 border-0 aos-animate position-relative" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>00"> 
																	<img src="<?php echo the_post_thumbnail_url(); ?>" class="service-image" alt="">
																	<div class="card-bdy">
																		<h4 class="service-title"><?php echo the_title(); ?></h4>
																		<a href="<?php echo the_permalink(); ?>" class="ij-link ">learn more</a>
																	</div>
																</div>
															<?php 
														endwhile;
													?>
												</div>
											<?php 
									?>		
								</div>	
							<?php 
					}
				?>
			</div>
			
		<?php 
}

add_shortcode('show-services-home', 'show_services'); 

function services_footer(){
	$servicesfooter = array(
		'post_type' 			=> 	'our_services', 
		'posts_per_page'		=> 	-1, 
		// 'order'
	);

	$loop = new WP_QUERY($servicesfooter);

	while($loop->have_posts()): $loop->the_post(); 
		?>
			<li><a href="" class="text-white"><?php echo the_title(); ?></a></li>
		<?php 
	endwhile; 

	wp_reset_postdata(); 
}

add_shortcode('services_footer-sc', 'services_footer'); 

function menu_items($attr){

	if(!empty($attr['category'])){
		$product_type = $attr['category']; 
	} else {
		$product_type = ""; 
	}

	$menuservices = array(
		'post_type' 			=> 	'our_services', 
		'posts_per_page'		=> 	-1, 
		'service_categories'	=> 	$product_type, 
		'orderby'				=> 	'date', 
		'order'					=> 	'asc'
	);

	$return = ""; 
	$return .= "<div>";
	$return .= "<ul class='ij-submenu p-0 m-0 list-unstyled'>"; 

	$l = new WP_QUERY($menuservices); 

	while($l->have_posts()): $l->the_post(); 
		$return .= "<li>";
		$return .= "<a class='ij-link " . get_the_id() . "' href='" . get_the_permalink() . "'>";
		$return .= get_the_title();
		$return .= "</a>";
		$return .= "</li>";   
	endwhile; 

	$return .= "</ul>"; 
	$return .= "</div>"; 

	wp_reset_postdata();

	return $return; 
}

add_shortcode('show-services', 'menu_items');
// End --->

function show_clients(){
	$clients = array(
		'post_type' =>  'clients', 
	);	
	
	$loop = new WP_QUERY($clients); 

	$output = ""; 

	$output .=  "<div class='owl-carousel owl-theme clients-single row'>"; 
	
	while($loop->have_posts()): $loop->the_post(); 
		$output .= "<div class='col'>";
		$output .= "<img src='" . get_the_post_thumbnail_url() ."' class='client-logo'>"; 
		$output .= "</div>"; 
	endwhile; 
	
	$output .= "</div>"; 

	wp_reset_postdata(); 

	return $output;
}

add_shortcode('show-our-clients', 'show_clients'); 

function show_services_business($attr){

	if(!empty($attr['category'])){
		$product_type = $attr['category']; 
	} else {
		$product_type = ""; 
	}

	$servicesbusiness = array(
		'post_type' 			=> 	'our_services', 
		'posts_per_page'		=> 	5, 
		'service_categories'	=> 	$product_type
	);	
	
	$loop = new WP_QUERY($servicesbusiness); 

	$output = ""; 

	$output .=  "<ul class='services-sidebar list-unstyled'>"; 
	
	while($loop->have_posts()): $loop->the_post(); 
		$output .= "<li><a class=''";
		$output .= "href='"; 
		$output .= get_the_permalink(); 
		$output .= "'>"; 
		$output .= get_the_title();
		$output .= "</a></li>"; 
	endwhile; 
	
	$output .= "</ul>"; 

	wp_reset_postdata(); 

	return $output;
}

add_shortcode('show-services-business', 'show_services_business' ); 

if(!function_exists('ij_blog_readmore')):
	/**
	 * Adds the read more permalink on the blog page and hides on the single page 
	 */
	function ij_blog_readmore(){
		if(! is_single()):

			echo "<div class='entry-footer'>"; 
			$readmore = ""; 
			$readmore = sprintf(
				
				/* readmore link */
				'<a title="' . get_the_title() . '" class="blog-readmore" href="' . esc_url( get_permalink() ) . '" rel="bookmark">Read More</a>'
			);			
			
			echo $readmore; 
			echo "</div>"; 


		endif; 
	}
endif; 