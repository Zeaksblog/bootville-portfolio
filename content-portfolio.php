<?php
/**
 * @package bootville
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title page-header">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail('featured-large', array('class' => 'alignleft')); ?>
				<?php endif; ?>

				<?php the_content(); ?>
			</div>

		</div> <!-- .row -->

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bootville' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'bootville' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->