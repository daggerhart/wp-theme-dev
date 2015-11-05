<?php
if ( has_post_thumbnail() )
{
	// use a special version of the featured image as a fancy header image
	$thumb_id = get_post_thumbnail_id( get_the_ID() );
	$thumb = wp_get_attachment_image_src( $thumb_id, 'fancy-large' );
	$full = wp_get_attachment_image_src( $thumb_id, 'full' );
	?>
	<div class="fancy-large-wrapper" style="background-image: url(<?php echo $thumb[0]; ?>);">
		<a class="fancy-large-overlay" href="<?php echo esc_url( $full[0] ); ?>" rel="lightbox"></a>
	</div>
	<?php
}