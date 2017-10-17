<?php get_header(); ?>
<div class="studio-page two-up">
<?php 
	if(have_posts()) {
		while(have_posts()) {
			the_post();
			?>
			<div class="ccone">
				<div>
					<div class="ti tr studio-title"><p><?php the_title(); ?></p></div>
					<div class="bod studio-body"><p><?php the_content(); ?></p></div>
				</div>
			</div>
			<div class="cctwo">
				<div class="lo cen-xy">
				<div class="sliderr ">
				<?php if (have_rows('post_gallery')) {
					while (have_rows('post_gallery')) {
						the_row();
						?>
					<div style="width:30vw">
						<img style="width:100%" class="dimage" style="" src="<?php the_sub_field('post_images'); ?>"/>
					</div><?php
					}
					
				}	?>
				</div>
				</div>
			</div>
			<?php
		}
	}
	?>
</div>
<?php get_footer();