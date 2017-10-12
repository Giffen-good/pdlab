<?php get_header(); ?>
<div class="tr team-page">
	<?php if (have_posts() ) {
		while (have_posts() ) {
			the_post();
			?>
			<div class="ti team-title"><?php the_title(); ?></div>
			<?php 	if ( has_post_thumbnail() ) { 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
						$thumb_url = $thumb_url_array[0]; 
					} 
					?>
			<div class="two-up">
				<div class="tuuu">
					<div>
						<img class="the-man" src="<?php echo $thumb_url; ?>" />
						<div class="bb honorific"><p><?php the_field('honorific'); ?></p></div>
					</div>
				</div>
				<div class="tuple">
					<div class="bod team-text"><p><?php the_content(); ?></p></div>
				</div>
			</div>
<?php
		}
	}
	?>
</div>
<?php get_footer(); ?>