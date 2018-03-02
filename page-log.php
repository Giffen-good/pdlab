<?php get_header(); 
$cat_id = get_query_var('cat');
?>


<div class="log-page pfif">
	<div class="ti tr log-title"><p>Pdlab Log</p></div>
	<div class="log ajax_posts">
		<?php 

$page     = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;
 
		$arg = array('posts_per_page' => 10,
						'paged' => $page);
		$po = new WP_Query($arg);
		if ($po->have_posts() ) {
			while ( $po->have_posts() ) {
				$po->the_post();
				?>

				<a href="<?php the_permalink(); ?>" class="hpost-box ptp-<?php echo $k; ?>">
					<div class="hpost-title">
						<p><?php echo get_the_title(); ?></p>
					</div>
					<div class="hdate date ten">
					<?php
					echo get_the_date(); ?>
					</div>
				</a> <?php
			}
		}
	?>
	</div>
	<div class="asdf">

	<a class="tr learn-more ten" href="">
	<span style="display:none">1</span>
								<div class="learn-more-text" id="more_posts">Load More</div>
							</a>
	</div>
</div>
<?php
		get_footer();