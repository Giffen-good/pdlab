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

				<a style="display:block" href="<?php the_permalink(); ?>" class="hpost-box ptp-<?php echo $k; ?>">

					<div class="hpost-title">
						<?php echo get_the_title(); ?>
					</div>
					<div class="hdate date">
					<?php
					echo get_the_date(); ?>
					</div>
				</a> <?php
			}
		}
		get_footer();