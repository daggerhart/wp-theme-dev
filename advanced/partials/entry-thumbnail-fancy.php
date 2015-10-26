<?php
if ( has_post_thumbnail() )
{
	// use a special version of the featured image as a fancy header image
	$thumb_id = get_post_thumbnail_id( get_the_ID() );
	$thumb = wp_get_attachment_image_src( $thumb_id, 'fancy-large' );
	?>
	<div class="fancy-large-wrapper" style="background-image: url(<?php echo $thumb[0]; ?>);">
		<div class="fancy-large-overlay"></div>
	</div>
	<?php
}