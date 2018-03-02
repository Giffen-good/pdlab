<?php
/**
 * pdlab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pdlab
 */

if ( ! function_exists( 'pdlab_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pdlab_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pdlab, use a find and replace
		 * to change 'pdlab' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pdlab', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pdlab' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pdlab_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pdlab_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pdlab_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pdlab_content_width', 640 );
}
add_action( 'after_setup_theme', 'pdlab_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pdlab_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pdlab' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pdlab' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pdlab_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require_once WP_CONTENT_DIR . '/themes/pdlab/ajax.php';

function pdlab_scripts() {
	wp_enqueue_style( 'pdlab-style', get_stylesheet_uri() );
	wp_enqueue_script('marquee3k.min', get_template_directory_uri() . '/js/marquee3k.min.js', true);
	if ( is_front_page() ) {

	wp_enqueue_style( 'lil', get_template_directory_uri() . '/js/lil.css' );
	
	wp_enqueue_script('index', get_template_directory_uri() . '/js/index.js', '20151215', true );

}
	
	
	wp_enqueue_script('pdlab-jquery-3.2.1.min', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', '20151215', true );

	wp_enqueue_script( 'pdlab-slick.min', get_template_directory_uri() . '/js/slick.min.js', '20151215', true );
	wp_enqueue_script( 'transitions', get_template_directory_uri() . '/js/transitions.js', '20151215', true );

	wp_enqueue_script( 'ajax-pagination', get_template_directory_uri() . '/js/ajax-pagination.js', '20151215', true );
global $wp_query;
wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
	'ajaxurl' => admin_url( 'admin-ajax.php' ),
	'query_vars' => json_encode( $wp_query->query )
));
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pdlab_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



function console_log($narp) {
	echo '<script>' . 'console.log(' . json_encode($narp) . '); </script>';
}
	function fetchData($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  $result = curl_exec($ch);
  curl_close($ch); 
  return $result;
  }


/*add_filter( 'single_template', function ($single_template) {

     global $post;

    if ( in_category( 'Location' ) ) {
          $single_template = dirname( __FILE__ ) . '/single-projects.php';
     }
     return $single_template;

}, 10, 3 );
add_post_type_support( 'projects', 'thumbnail' );    */

function create_posttype() {
 
    register_post_type( 'projects',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'projects' ),
                'singular_name' => __( 'project' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'projects'),
            'taxonomies'  => array( 'category' )
        )
    );
}
add_action( 'init', 'create_posttype' );
function create_postype() {
 
    register_post_type( 'jobs',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'jobs' ),
                'singular_name' => __( 'job' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'jobs')
        )
    );
}
add_action( 'init', 'create_postype' );

add_action( 'wp_ajax_nopriv_ajaxx_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajaxx_pagination', 'my_ajax_pagination' );
	add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajaxx_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajaxx_pagination' );




function my_ajaxx_pagination(){
	console_log('po');

	 $args = array('posts_per_page' => 9,
			'post_type' => 'projects'
			
					);
 $args['paged'] = $_POST['page'];
 $args['category_name'] = $_POST['cat'];


    $posts = new WP_Query( $args);
    console_log($posts);
    $GLOBALS['wp_query'] = $posts;

    add_filter( 'editor_max_image_size', 'my_image_size_override' );
    if( ! $posts->have_posts() ) { 
      echo '<span class="nil" style="display:none"></span>';
    }
    else {
    	$k = 0;
        while ( $posts->have_posts() ) { 
            $posts->the_post();
            if ( has_post_thumbnail() ) { 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
						$thumb_url = $thumb_url_array[0]; 
					} 
          echo '<div class="post-container"><a class="post-pic cen-xy" href="' . get_post_permalink() . '"><img src="' . $thumb_url . '"/></a><a href="' . get_post_permalink() . '" style="display:block" class="post-title"><p>' . get_the_title() . '</p></a> 
					</div>';
          $k++;
        }
        if ($k < 9) {
        	echo '<span class="nil" style="display:none"></span>';
        }
    }
    die();
}
function my_ajax_pagination() {
     $args = array('posts_per_page' => 10,
					);
 $args['paged'] = $_POST['page'];

    $posts = new WP_Query( $args);
    $GLOBALS['wp_query'] = $posts;

    add_filter( 'editor_max_image_size', 'my_image_size_override' );
    if( ! $posts->have_posts() ) { 
        echo '<span class="nil" style="display:none"></span>';
    }
    else {
    	$k = 0;
        while ( $posts->have_posts() ) { 
            $posts->the_post();
          echo '<a href="' . get_permalink() . '" class="hpost-box ptp"><div class="hpost-title"><p>' . get_the_title() . '</p></div><div class="hdate date ten">' . get_the_date() . '</div></a>';
          $k++;
        }
        if ($k < 10) {
        	echo '<span class="nil" style="display:none"></span>';
        }
    }
    die();
}

