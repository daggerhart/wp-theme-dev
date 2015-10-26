<?php

/*
 * About the author
 */
$author_id = get_the_author_meta( 'ID' );
$author_description = get_the_author_meta( 'description' );
$author_posts_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
$author_avatar = get_avatar( $author_id, 96, '', 'author avatar', array( 'class' => 'media-object img-circle' ) );
$author_url = get_the_author_meta( 'url' );
?>
<div class="about-the-author">
	<h4 class="author-title">About the Author</h4>

	<div class="row">
		<div class="col-sm-3">
			<a class="author-avatar" href="<?php echo $author_posts_url; ?>">
				<?php echo $author_avatar; ?>
			</a>
		</div>

		<div class="col-sm-9">
			<h4><?php the_author(); ?></h4>
			<?php if ( $author_description ) : ?>
				<p><?php echo $author_description; ?></p>
			<?php endif; ?>
			<div class="list-group">
				<a href="<?php echo $author_posts_url; ?>" class="list-group-item">
					Other posts by <?php the_author(); ?> <span class="badge"><?php the_author_posts(); ?></span>
				</a>

				<?php if ( $author_url ) : ?>
					<a href="<?php echo $author_url; ?>" class="list-group-item" target="_blank">
						Visit <?php the_author(); ?>'s website
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
