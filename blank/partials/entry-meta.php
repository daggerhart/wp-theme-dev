<?php
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
?>
<span class="posted-on">
	Posted on
	<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
		<?php if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) : ?>
			<time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ?>"><?php echo get_the_date() ?></time>
			<time class="updated" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ) ?>"><?php echo get_the_modified_date() ?></time>
		<?php else: ?>
			<time class="entry-date published updated" datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ?>"><?php echo get_the_date() ?></time>
		<?php endif; ?>
	</a>
</span>
<span class="byline">
	by
	<span class="author vcard">
		<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
			<?php echo get_the_author() ?>
		</a>
	</span>
</span>