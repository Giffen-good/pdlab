<?php get_header(); ?>

<div class="tr contact-page">

<?php if(have_posts() ) {
	while(have_posts()) {
		the_post();
				if ( has_post_thumbnail() ) { 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
						$thumb_url = $thumb_url_array[0]; 
					} 
					?>
					<div class="cen-xy">
						<img class="location-pic" src="<?php echo $thumb_url; ?>"/>
						<div class="contact description ten"><div><p><?php the_content(); ?></p></div></div>
					</div>
<?php
	}
}

?>
</div>
<?php
get_footer();