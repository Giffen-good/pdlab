<?php get_header(); 
?>
<div class="single-post">
	<div class="slider">

	</div>

	<div class="post-body">
		<div class="post-title"><?php the_title(); ?></div>
		<div class="body-text">
			<?php the_content(); ?>
		</div>
	</div>
	
</div>
<div class="two-up post-nav">
	<?php $next_post = get_next_post(); 
		if (!empty( $next_post)) { ?>
			<a class="da-link next-link" href="<?php echo get_permalink($next_post->ID); ?>">
				<div class="pp"><p>Prev project</p></div>
				<div class="post-picture prev-pp" style="background-image:url(<?php echo get_the_post_thumbnail_url( $next_post->ID ); ?>">
					
					<div class="nav-title prev-title"><?php echo $next_post->post_title ?></div>

				</div>
			</a><?php
		}
	$next_post = get_previous_post(); 
		if (!empty( $next_post)) { ?>
			<a class="da-link next-link" href="<?php echo get_permalink($next_post->ID); ?>">
				<div class="pp"><p>Next project</p></div>
				<div class="post-picture prev-pp" style="background-image:url(<?php echo get_the_post_thumbnail_url( $next_post->ID ); ?>">
					
					<div class="nav-title prev-title"><?php echo $next_post->post_title ?></div>

				</div>
			</a><?php
		}
?>
</div>


<?php get_footer(); ?>