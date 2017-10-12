<?php get_header(); 
?>
<div class="single-post">
	<div class="slider">
<?php 
if ( has_post_thumbnail() ) { 
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0]; 
	
?>
<div style="width:60vw">
	<img style="width:100%;" src="<?php echo $thumb_url; ?>" />
	</div><?php
}
	if (have_rows('post_gallery')) {
		while (have_rows('post_gallery')) {
			the_row();
?>			<div style="width:60vw">

			<img style="width:100%;" src="<?php the_sub_field('post_images'); ?>"/>
			</div><?php
		}
	}
	?>
	</div>

	<div class="post-body">
		<div class="post-title"><?php the_title(); ?></div>
		<div class="body-text">
		<?php if (have_posts()) {
			while (have_posts()) {
				the_post(); ?>
		<?php the_content(); ?>
<?php
			}
		} ?>
		</div>
	</div>
</div>
<div class="two-up post-nav">
	<?php $next_post = get_next_post(); 
		if (!empty( $next_post)) { ?>
			<a class="da-link next-link" href="<?php echo get_permalink($next_post->ID); ?>">
				<div class="pp"><p>Prev project</p></div>
				<div class="post-picture prev-pp" style="background-image:url(<?php echo get_the_post_thumbnail_url( $next_post->ID ); ?>">
					
					<div class="nav-title prev-title"><?php echo $next_post->post_title ?></div>

				</div>
			</a><?php
		} else {
			?>
			<a class="da-link next-link" href="">
				<div class="pp"><p></p></div>
				<div class="post-picture prev-pp" style="">
					
					<div class="nav-title prev-title"></div>

				</div>
			</a><?php
		}
	$next_post = get_previous_post(); 
		if (!empty( $next_post)) { ?>
			<a class="da-link next-link" href="<?php echo get_permalink($next_post->ID); ?>">
				<div class="pp"><p>Next project</p></div>
				<div class="post-picture prev-pp" style="background-image:url(<?php echo get_the_post_thumbnail_url( $next_post->ID ); ?>">
					
					<div class="nav-title prev-title"><?php echo $next_post->post_title ?></div>

				</div>
			</a><?php
		} else {
			?>
			<a class="da-link next-link" href="">
				<div class="pp"><p></p></div>
				<div class="post-picture prev-pp" style="">
					
					<div class="nav-title prev-title"></div>

				</div>
			</a><?php
		}
?>
</div>


<?php get_footer(); ?>