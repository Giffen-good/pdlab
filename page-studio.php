<?php get_header(); ?>
<div class="studio-page two-up">
<?php 
	if(have_posts()) {
		while(have_posts()) {
			the_post();
			?>
			<div class="ccone">
				<div class="ti tr studio-title"><p><?php the_title(); ?></p></div>
				<div class="bod studio-body"><p><?php the_content(); ?></p></div>
			</div>
			<div class="cctwo">
				<div class="gallery"></div>
			</div>
			<?php
		}
	}
	?>
</div>
<?php get_footer();