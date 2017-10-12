<?php get_header(); ?>

<div class="jobs-page">
		<?php 
$arg = array('post_type' => 'jobs');
$ty = new WP_Query($arg);
if ($ty->have_posts()) {
	while( $ty->have_posts() ) {
		$ty->the_post();
		?>
	<div class="ti tr jobs-title"><p><?php the_title(); ?></p></div>

	<div class="bod job-text"><p><?php the_content(); ?></p></div>
	<div class="jobs">
		<div class="log">

		<?php 
		if (have_rows('job')) {
			while( have_rows('job')) {
				the_row();
				?>
			<a class="hpost-box">
				<div class="bod job-title hpost-title"><?php the_sub_field('title'); ?></div>
				<div class="bod availablility hdate"><?php the_sub_field('pt_ft'); ?></div>
				
			</a>
			<div>
				<div class="bod description"><?php the_sub_field('description'); ?></div>
				<div class="ex">
					<span></span>
					<span></span>
				</div>
			</div>
				
<?php						
			}
		}
?>		
		</div>

	</div>

						
<?php
		}
	}
		?>
</div>
<?php get_footer();