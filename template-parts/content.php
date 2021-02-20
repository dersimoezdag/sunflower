<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sunflower
 */

 $metadata = $class = false;
 extract($args);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<header class="entry-header full-width">
		<div class="container">
			<div class="row position-relative">
				<div class="col-12 offset-md-1 <?php echo ($metadata) ? 'text-left col-md-8' : 'col-md-10'; ?>">
					<?php
						$roofline = @get_post_meta( $post->ID, '_sunflower_roofline')[0] ?: false;
						if( $roofline ){
							printf(' <div class="roofline arvogruen">%s</div>', $roofline);
						}
					?>
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta mb-3">
							<?php
							sunflower_posted_on();
							sunflower_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
					</div>

					<?php
						if($metadata){
							printf('<div class="col-md-3 metabox small">%s</div>',
								$metadata
							);
						}
					?>
				
			</div>
		</div>
	</header><!-- .entry-header -->

	<?php sunflower_post_thumbnail(); ?>

	<div class="col-12 col-md-10 offset-md-1">
		<div class="row entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'sunflower' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sunflower' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer mt-5">
			<?php sunflower_entry_footer(true); ?>
		</footer><!-- .entry-footer -->

		</div>	
</article><!-- #post-<?php the_ID(); ?> -->
