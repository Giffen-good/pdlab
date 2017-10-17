<?php get_header();
$gallery_array = [];
?>
<div class="projects-page">
	<div class="two-up">
		<div class="tu-one">
		<?php $arg = array('post_type' => 'projects', 'category_name' => 'small-projects');
	
		$po = new WP_Query($arg);
		$small_gallery = [];
		if ($po->have_posts()) { 
			while($po->have_posts()) {
				$po->the_post();
				if ( has_post_thumbnail() ) { 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0]; 
						
						$small_gallery[] = $thumb_url;
						} 
				?>

<?php
			}
		} wp_reset_query();

		$arg = array('post_type' => 'projects',
							'category_name' => 'medium-projects');
		$med = new WP_Query($arg);
		$medium_gallery = [];
		if ($med->have_posts()) { 
			while($med->have_posts()) {
				$med->the_post();
				if ( has_post_thumbnail() ) { 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0]; 
						
						$medium_gallery[] = $thumb_url;
						} 
				?>

<?php
			}
		} wp_reset_query();
		$arg = array('post_type' => 'projects',
							'category_name' => 'large-projects');
		$med = new WP_Query($arg);
		$large_gallery = [];
		if ($med->have_posts()) { 
			while($med->have_posts()) {
				$med->the_post();
				if ( has_post_thumbnail() ) { 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
						$large_gallery[] = $thumb_url;

						} 
				?>

<?php
			}
		} wp_reset_query();

		$gallery_array = [$small_gallery,$medium_gallery,$large_gallery];

		if (have_posts() ) {
			while(have_posts()) {
				the_post();
			
				if ( has_post_thumbnail() ) { 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
								?>
				<img class="tu-image cen-xy" id="dfirst" style="width:75%;position:absolute" src="<?php echo $thumb_url; ?>" />
				<?php
				}
			}
		}
		$l = 1;

		foreach($gallery_array as $gal) {
			$u = 1;
			?><div class="prp-<?php echo $l; ?>"><?php
			foreach ($gal as $image) {
				?>
			<img class="tu-image cen-xy opassz pmp-<?php echo $l; ?> pfp-<?php echo $u; ?>" style="width:75%;position:absolute" src="<?php echo $image; ?>" />

				<?php
				$u++;
			}
			$l++;
			?></div><?php
		}
		?>


		</div>
		<div class="tu-two tr">
			<a class="cen-y prp-1" href="<?php echo get_category_link(3); ?>">Small Projects</a>
			<a class="cen-y prp-2" href="<?php echo get_category_link(4); ?>">Medium Projects</a>
			<a class="cen-y prp-3" href="<?php echo get_category_link(5); ?>">Large Projects</a>
		</div>
	</div>
</div>
<?php get_footer(); ?>