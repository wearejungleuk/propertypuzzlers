<?php

/**
 * Page template for all attachment pages (images/video/etc.) of the Property Puzzler 2025 website theme
 * Outputs either a full-size version of the attachment itself (e.g. jpg), or a downloadable link (e.g. pdf)
 * Finishes at the end of 'the loop' - the query that outputs the attachment
 */

global $post;
?>

<?php get_header(); ?>
<div class="container main-content misc-page clearfix">
	<?php
	if (have_posts()) {
		while (have_posts()) : the_post();
	?>
			<h1><?php echo basename($post->guid); ?></h1>
			<?php
			if (wp_attachment_is_image($post->id)) {
				$image = wp_get_attachment_image_src($post->id, 'full');
			?>
				<a href="<?php echo wp_get_attachment_url($post->id); ?>" target="_blank" title="Open this image">
					<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>"
						height="<?php echo $image[2]; ?>" alt="<?php echo basename($post->guid); ?>" />
				</a>
			<?php
			} else {
			?>
				<p>
					<a href="<?php echo wp_get_attachment_url($post->ID); ?>" target="_blank"
						title="Download this attachment">Download this attachment</a>
				</p>
	<?php
			}
		endwhile;
	}
	?>
</div>
<?php get_footer();
