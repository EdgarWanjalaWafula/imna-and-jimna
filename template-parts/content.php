<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ImnaJimna
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_post_thumbnail('post-thumbnail', 
		array(
			'class'	=> 	'img-fluid blog-image'
		)
	); ?>
&nbsp; 
	<div class="entry-content">
		<?php
		if(is_single()){
			?>
				<div class="readmore-content">
					<?php 
						the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'imnajimna' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );
					?>
				</div>
			<?php
		} else {
			echo wp_trim_words(get_the_content(), '65', '[..]'); 
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'imnajimna' ),
			'after'  => '</div>',
		) );
		?>
		<div class="cat-lnks">
			<?php imnajimna_entry_footer(); ?>
		</div>

		<div class="entry-footer">
			<?php ij_blog_readmore(); ?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
