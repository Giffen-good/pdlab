<?php get_header(); ?>

<div class="log-page">
	<div class="ti tr log-title"><p>Pdlab Log</p></div>
	<div class="log">
		<?php 
		$arg = array('posts_per_page' => 10);
		$po = new WP_Query($arg);
		if ($po->have_posts() ) {
			while ( $po->have_posts() ) {
				$po->the_post();
				?>

				<a href="<?php the_permalink(); ?>" class="hpost-box ptp-<?php echo $k; ?>">
					<div class="hpost-title">
						<p><?php echo get_the_title(); ?></p>
					</div>
					<div class="hdate date">
					<?php
					echo get_the_date(); ?>
					</div>
				</a> <?php
			}
		}
	?>
	</div>
	<div class="asdf">

	<a class="tr learn-more" href="">
								<div class="learn-more-text">Learn More</div>
							</a>
	</div>
</div>
<?php
		get_footer();