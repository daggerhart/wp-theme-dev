<?php
/**
 * Template part for displaying a single post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

$categories_list = get_the_category_list( esc_html__( ', ', 'awesomesauce' ) );
$tags_list = get_the_tag_list( '', esc_html__( ', ', 'awesomesauce' ) );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	/*
	 * Viewing this content on its own
	 */
	if ( is_single( get_the_ID() ) ) : ?>
		<header class="entry-header page-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta">
				<?php get_template_part( 'partials/entry-meta', get_post_type() ); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<?php if ( has_post_thumbnail() ): ?>
			<?php the_post_thumbnail( 'medium', array( 'class' => 'img-responsive' ) ); ?>
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awesomesauce' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php if ( $categories_list && awesomesauce_categorized_blog() ) : ?>
				<span class="cat-links">
					Posted in <?php echo $categories_list ?>
				</span>
			<?php endif; ?>

			<?php if ( $tags_list ) : ?>
				<span class="tags-links">
					Tagged <?php echo $tags_list?>
				</span>
			<?php endif; ?>

			<?php get_template_part( 'partials/entry-footer', get_post_type() ); ?>
		</footer><!-- .entry-footer -->
	<?php

	/*
	 * Viewing this content as part of a list
	 */
	else: ?>
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header><!-- .entry-header -->

		<?php if ( has_post_thumbnail() ): ?>
			<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive' ) ); ?>
		<?php endif; ?>

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<div class="entry-meta">
			<?php get_template_part( 'partials/entry-footer', get_post_type() ); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

</article><!-- #post-## -->

