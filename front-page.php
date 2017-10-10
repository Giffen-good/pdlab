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

				if ($home->have_posts()) {
					while ($home->have_posts()) {
						$home->the_post();
						?>

						<a style="display:block" href="<?php the_permalink(); ?>" class="hpost-box ptp-<?php echo $k; ?>">

							<div class="hpost-title">
								<?php echo get_the_title(); ?>
							</div>
							<div class="hdate date">
							<?php
							echo get_the_date(); ?>
							</div>
						</a>
						<div style="background-image:url()" class="hpost-image ptp-<?php echo $k; ?>"></div>
	<?php
					}
				} wp_reset_query();
				?>
			</div>
		</div>
	</div>
	<?php if( have_posts() ) {
		while (have_posts()) {
			the_post();
			?>
			<div class="about-us">
				<div class="ccon">
					<div class="cone">

						<img src="<?php the_field('who_we_are_image'); ?>"/>
					</div>
					<div class="ctwo">
						<div class="about-us title scp"><p><?php the_field('who_we_are_title'); ?></p></div>
						<div class="about-us-text">
						
						<?php the_field('who_we_are'); ?>
						</div>
						<div class="learn-more">
							<div class="learn-more-text">Learn More</div>
						</div>
					</div> 
				</div>
			</div>
			<div class="ccon brands">
			<div class="scp"><p><?php echo the_field('brand_title'); ?></p></div>
				<?php 
				if( have_rows('brands') ):

				    while ( have_rows('brands') ) : the_row();
		?>
						
						<div class="brand" style="background-image:url(<?php the_sub_field('image'); ?>)">
				        </div>
		<?php
				    endwhile;
				endif;
?>			</div>




			<?php
			}
		}
		?>
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

			    <div class='ig-post da-post pp' style="background-image:url(<?php echo $posted; ?>)"><a class="ig-tag" target="_blank" href="<?php echo $links[$r][0]; ?>"></a></div>
			    	
			    

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