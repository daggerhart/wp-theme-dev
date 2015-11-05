<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?></a></h2>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php get_template_part( 'partials/entry-meta', get_post_type() ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php get_template_part( 'partials/entry-footer', get_post_type() ) ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

