<?php get_header();

?>


<div class="projects-in-page">
<?php if (single_cat_title('',0) == 'large projects') { ?>
		<div class="marquee marquee3k l3 tr rem" data-speed="125"><?php single_cat_title(); ?></div><?php
	} else if (single_cat_title('',0) == 'medium projects') { ?>
		<div class="marquee marquee3k l2 tr rem" data-speed="125"><?php single_cat_title(); ?></div><?php
	} else { ?>
	<div class="marquee marquee3k l1 tr rem" data-speed="125"><?php single_cat_title(); ?></div>
<?php
	}
	?>
	<div class="posts-bin ajax_posts">
		<?php
		$category = get_category( get_query_var( 'cat' ) );
 $cat_id = $category->category_nicename;
		$arg = array('posts_per_page' => 9,
			'post_type' => 'projects',
			'category_name' => $cat_id);
		console_log($cat_id);
		$ten = new WP_Query($arg);
		
		if ($ten->have_posts()) {
			while( $ten->have_posts() ) {
				$ten->the_post();
					if ( has_post_thumbnail() ) { 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
						$thumb_url = $thumb_url_array[0]; 
					} 
					?>
					<div class="post-container">
						
							<a class="post-pic cen-xy" href="<?php echo get_post_permalink(); ?>">
								<img src="<?php echo $thumb_url; ?>"/>
							</a>
						<a href="<?php  echo get_post_permalink(); ?>" style="display:block" class="post-title"><p><?php echo get_the_title(); ?></p></a> 
						<div class="grow"></div>
					</div>
	
						<?php
			}
		}
		?>
		</div>
		<div class="asdf">

	<a class="tr learn-more ten" href="">
	<span style="display:none">1</span>
	<div class="category-id" style="display:none"><?php echo $cat_id; ?></div>
								<div class="learn-more-text" id="more_posts">Load More</div>
							</a>
	</div>
</div><?php
		get_footer(); ?>
		<script>

	</script>