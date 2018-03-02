<?php
add_action('wp_ajax_nopriv_mytheme_more_post_ajax', 'mytheme_more_post_ajax');
add_action('wp_ajax_mytheme_more_post_ajax', 'mytheme_more_post_ajax');
 
if (!function_exists('mytheme_more_post_ajax')) {
	function mytheme_more_post_ajax(){
 
	    $ppp     = (isset($_POST['ppp'])) ? $_POST['ppp'] : 9;
	    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : 0;
	    $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
 
	    $args = array(
	        'post_type'      => 'post',
	        'posts_per_page' => $ppp,
	        'cat'            => $cat,
	        'offset'          => $offset,
	    );
 
	    $loop = new WP_Query($args);
 
	    $out = '';
 
	    if ($loop -> have_posts()) :
	    	while ($loop -> have_posts()) :
	    		$loop -> the_post();
		    	
		    	$category_out = array();
		    	$categories = get_the_category();
				foreach ($categories as $category_one) {
					$category_out[] ='<a href="'.esc_url( get_category_link( $category_one->term_id ) ).'" class="'.strtolower($category_one->name).'">' .$category_one->name.'</a>';
				}
				$category_out = implode(', ', $category_out);
 
				$cat_out = (!empty($categories)) ? '<span class="cat-links"><span class="screen-reader-text">'.esc_html__('Categories', 'twentysixteen').'</span>'.$category_out.'</span>' : '';
 
				$out .= '<article id="post-'. get_the_ID().'" class="'. implode(' ', get_post_class()) .'">
							<header class="entry-header">';
						if ( is_sticky() && is_home() && ! is_paged() ){
							$out .= '<span class="sticky-post">'. __( 'Featured', 'twentysixteen' ).'</span>';
						}
						$out .= '<h2 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">'.get_the_title().'</a></h2>';
					$out .= '</header>'.
							 twentysixteen_excerpt() . '<a class="post-thumbnail" href="'.esc_url(get_permalink()).'" aria-hidden="true" style="opacity: 1;">'.get_the_post_thumbnail('', 'post-thumbnail', array( 'alt' => the_title_attribute (array('echo' => 0) ) ) ).'</a>';
						$out .= '<div class="entry-content">'.get_the_content( sprintf(
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
										get_the_title()
									) );
						$out .= '</div>';
						$out .= '<footer class="entry-footer">
								<span class="byline">
									<span class="author vcard">'.get_avatar( get_the_author_meta( 'ID' ), 49 ).'
										<span class="screen-reader-text">'._x( 'Author', 'Used before post author name.', 'twentysixteen' ).'</span>
										<a class="url fn n" href="'.esc_url(get_the_author_meta( 'user_email' )).'">'.get_the_author_meta( 'display_name' ).'</a>
									</span>
								</span>
								<span class="posted-on">
									<span class="screen-reader-text">'.esc_html__('Posted On', 'twentysixteen').'</span>
									<a href="'.esc_url( get_permalink() ).'" rel="bookmark">
										<time class="entry-date published" datetime="'.get_the_date('c').'">'.get_the_date('F d, Y').'</time>
										<time class="updated" datetime="'.get_the_modified_date('c').'">'.get_the_modified_date('F d, Y').'</time>
									</a>
								</span>
								'.$cat_out.'
								<span class="comments-link">
									<a href="'.esc_url(get_comments_link()).'">'.esc_html__('Leave a comment', 'twentysixteen').'<span class="screen-reader-text">'.esc_html__(' on ', 'twentysixteen'). get_the_title().'</span>
									</a>
								</span>
								<span class="edit-link">
									<a class="post-edit-link" href="'.esc_url(get_edit_post_link()).'">'.esc_html__('Edit', 'twentysixteen').'<span class="screen-reader-text"> "'.get_the_title().'"</span>
									</a>
								</span>';
						$out .= '</footer>
						</article>';
 
	    	endwhile;
	    endif;
 
	    wp_reset_postdata();
 
	    wp_die($out);
	}
}