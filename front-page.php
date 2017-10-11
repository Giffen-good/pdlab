<?php get_header();

?>
<div class="home-page">
	<div class="ccon">
		<div class="two-up-label"></div>
		<div class="two-up">
			<div class="recent-posts">
			<?php
			$args = array('posts_per_page' => 7);
			$home = new WP_Query($args);
			$k = 1;
			$gallery_array = [];
				?> 
				<div class="recent-text"><div>Recent Logs</div></div>
				<div class="rlp">
				<?php
				if ($home->have_posts()) {
					while ($home->have_posts()) {
						$home->the_post();

						?>
							<a href="<?php the_permalink(); ?>" class="hpost-box ptp-<?php echo $k; ?>">
<?php $k++; ?>
								<div class="hpost-title">
									<p><?php echo get_the_title(); ?></p>
								</div>
								<div class="hdate date">
								<?php
								echo get_the_date('d/m/y'); ?>
								</div>
							</a>
					
	<?php
						$image_gallery =[];
						if ( has_post_thumbnail() ) { 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0]; 
						} 
						$image_gallery[] = $thumb_url;
			
				if (have_rows('post_gallery')){
					while (have_rows('post_gallery')) {
						the_row();
						$image_gallery[] = get_sub_field('post_images');
					}
				}
			$gallery_array[] = $image_gallery;

					}
				} wp_reset_query();
				?>
				</div>


	<?php 
	$k = 1;
	if( have_posts() ) {
		while (have_posts()) {
			the_post();
			?>
			<?php 
						if ( has_post_thumbnail() ) { 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
						$thumb_url = $thumb_url_array[0]; 
					} 
					?><div class="bnm">
						<div class="cin dfirs" style="background-image:url(<?php echo $thumb_url; ?>)"></div>
					<?php foreach($gallery_array as $tier) {
						?><div id="ptp-<?php echo $k; ?>" class="ptp-<?php echo $k; ?>"><?php
							foreach($tier as $image) {
								?>
								<div style="background-image:url(<?php echo $image; ?>)" class=" cin hpost-image ptp-<?php echo $k; ?>"></div>
								<?php
							}
							?></div><?php
							$k++;
						} ?>
					</div>
			</div>
		</div>
	</div>
			<div class="about-us">
				<div class="ccon">
					<div class="cone">

						<img src="<?php the_field('who_we_are_image'); ?>"/>
					</div>
					<div class="ctwo">
						<div class="cen-y inner-contain">
							<div class="ti tr about-us title scp"><p><?php the_field('who_we_are_title'); ?></p></div>
							<div class="about-us-text">
							
							<?php the_field('who_we_are'); ?>
							</div>
							<a class="tr learn-more" href="<?php get_page_link(9); ?>">
								<div class="learn-more-text">Learn More</div>
							</a>
						</div> 
					</div>
				</div>
			</div>
			<div class="brands">
			<div class="tr ti scp"><p><?php echo the_field('brand_title'); ?></p></div>
				<div class="four-up">

				<?php 
				if( have_rows('brands') ):

				    while ( have_rows('brands') ) : the_row();
		?>
						
						<div class="cin brand" style="background-image:url(<?php the_sub_field('image'); ?>)">
				        </div>
		<?php
				    endwhile;
				endif;
?>				</div>
			</div>




			<?php
			}
		}
		?>
	<div class="ti tr insta-tag"><a href="https://www.instagram.com/pdlab/">@pdlab on instagram</a></div>
	<div class="feed-container">
		<div class="gradient gleft"></div>
		<div class="gradient gright"></div>
		<div class="instagram-feed">
			
			<?php	
			

			  $json = fetchData("https://api.instagram.com/v1/users/self/media/recent/?access_token=209486357.96c430e.99c119b5a7704be4b9d32bab8f843d37");

			  $data = json_decode($json);

				// to get the array with all resolutions
				$images = array();
				$links = array();
				$links_parsed= array();

				foreach( $data->data as $user_data ) {
				    $images[] = (array) $user_data->images;
				}
				foreach( $data->data as $user_data ) {
				    $links[] = (array) $user_data->link;
				}

				// print_r( $images );

				// to get the array with standard resolutions
				$standard = array_map( function( $item ) {
				    return $item['standard_resolution']->url;
				}, $images );
				$width = array_map( function( $item ) {
				    return $item['standard_resolution']->width;
				}, $images );
				$height = array_map( function( $item ) {
				    return $item['standard_resolution']->height;
				}, $images );
			$r = 0;
			
			  foreach ($standard as $posted) {
			  	
		  	?>

			    <div class='cin ig-post da-post pp' style="background-image:url(<?php echo $posted; ?>)"><a class="ig-tag" target="_blank" href="<?php echo $links[$r][0]; ?>"></a></div>
			    	
			    

			  <?php	

				
					$r++;
			} 	    		  
			  ?>


			
		</div>
	</div>	
</div>	
<?php
	get_footer();
?>