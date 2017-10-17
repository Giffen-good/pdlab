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
<div style="width:50vw">
	<img style="width:100%;" src="<?php echo $thumb_url; ?>" />
	</div><?php
}
	if (have_rows('post_gallery')) {
		while (have_rows('post_gallery')) {
			the_row();
?>			<div style="width:50vw">

			<img style="width:100%;" src="<?php the_sub_field('post_images'); ?>"/>
			</div><?php
		}
	}
	?>
	</div>

	<div class="post-body">
		<div class="post-title tr rem"><?php the_title(); ?></div>
		<div class="body-text">
		<?php if (have_posts()) {
			while (have_posts()) {
				the_post(); ?>
		<?php the_content(); ?>
<?php
			}
		} ?>
		</div>
		<div class="sm-icons">
			<a target="_blank" class="facebook footer-icon" href="https://www.facebook.com/prototypedesignlab/">
			<img class="footer-icon facebook-icon cen-xy" src="<?php echo get_template_directory_uri(); ?>/pic/facebook-black.png"/></a>
			<a target="_blank" class="twitter footer-icon" href="https://twitter.com/pdlabinc">
			<img class="footer-icon twitter-icon cen-xy" src="<?php echo get_template_directory_uri(); ?>/pic/twitter-black.png" /></a>
			<a target="_blank" class="instagram footer-icon" href="https://www.instagram.com/pdlab/">
			<img class="footer-icon instagram-icon cen-xy" src="<?php echo get_template_directory_uri(); ?>/pic/instagram-black.png"/></a>
			
			
			<a target="_blank" class="pintrest footer-icon" href="https://www.pinterest.ca/pdlabinc/">
			<img class="footer-icon pintrest-icon cen-xy" src="<?php echo get_template_directory_uri(); ?>/pic/pintrest-black.png" /></a>
		</div>
	</div>

</div>
<div class="two-up post-nav">
	<?php $next_post = get_next_post(); 
		if (!empty( $next_post)) { ?>

			<a class="da-link next-link" href="<?php echo get_permalink($next_post->ID); ?>">
			<div class="jk">
				<div class="pp tr ten"><p>Prev project</p></div>
				<div class="post-picture prev-pp" style="background-image:url(<?php echo get_the_post_thumbnail_url( $next_post->ID ); ?>">
					
				
					


				</div>
			</div>
			<div class="nav-title rem cen-x tr prev-title"><?php echo $next_post->post_title ?></div>
			</a><?php
		} else {
			?>
			<a class="da-link next-link tc" href="<?php echo get_page_link(7); ?>">View Portfolio</a><?php
		}
	$next_post = get_previous_post(); 
		if (!empty( $next_post)) { ?>
			<a class="da-link next-link" href="<?php echo get_permalink($next_post->ID); ?>">
				<div class="pp nx tr ten"><p>Next project</p></div>
				<div class="post-picture prev-pp" style="background-image:url(<?php echo get_the_post_thumbnail_url( $next_post->ID ); ?>">
					
					

				</div>
				<div class="nav-title cen-x rem tr prev-title"><?php echo $next_post->post_title ?></div>
			</a><?php
		} else {
			?>

			<a class="da-link next-link tc" href="<?php echo get_page_link(7); ?>">View Portfolio</a><?php
		}
?>
</div>

<?php get_footer(); ?>