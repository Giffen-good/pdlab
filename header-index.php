<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pdlab
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<aside class='psr' style='height:70vw'>
		<section id="i-glitch" class='TT psf dn t0 l0 w100 vh100'>
			<img class='h100 w100 ofc' src="<?php echo get_template_directory_uri() . '/pic/glitch-fast.gif'; ?>" alt="">
		</section>

		<section class='z4 psf t0 l0 TT x xw xac xjc w100 vh100'>
			<div class='psf t0 l0 w100 vh100 bgs40 bgpc' style=' opacity: 0.1;background-image:url(https://cdn.shopify.com/s/files/1/2197/1827/files/123.gif?4793801016737452506)'></div>
			<div id="i-intro-text" class='c-yellow ff tac'>
				<span id='i-initWord'></span>
				<span id='i-words'></span>
			</div>
		</section>

		<section id='i-title' class='px1 py1 fs10vw lh1 w100 ffs c-yellow dn'>
			<div class='dn z3 psr'>PROTOTYPE</div>
			<div class='dn z3 psr'>DESIGN</div>
			<div class='dn z3 psr'>LAB</div>
<?php
			$image_box_1 = [];

				if(have_rows('header_images_1')) {
					while(have_rows('header_images_1')) {
						the_row(); 
						$image_box_1[] =  get_sub_field('image'); ?>

						
						<?php
					}
				} 
		$arr_to_string = '["' . implode( '","', $image_box_1) . '"]'; 

				?>
			<div 
				class="psa wide1 dn title-img" data-imgs='<?php echo $arr_to_string; ?>'> 
				<img class='w100' src="<?php echo $image_box_1[0]; ?>" alt="">
				
			</div>
<?php
$image_box_2 = [];
				if(have_rows('header_images_2')) {
					while(have_rows('header_images_2')) {
						the_row(); 
						$image_box_2[] =  get_sub_field('image'); ?>


						<?php
					}
				} 

		?>
		<?php 
		$arr_to_string = '["' . implode( '","', $image_box_2) . '"]'; 
		console_log($arr_to_string); ?>

			<div 
				class="psa wide2 dn title-img" data-imgs='<?php echo $arr_to_string; ?>'> 
				<img class='w100' src="<?php echo $image_box_2[0]; ?>" alt="">

			</div>
<?php
$image_box_3 = [];
				if(have_rows('header_images_3')) {
					while(have_rows('header_images_3')) {
						the_row(); 
						$image_box_3[] =  get_sub_field('image'); ?>


						<?php
					}
				} 
		$arr_to_string = '["' . implode( '","', $image_box_3) . '"]'; 
				
				?>

			<div 
				class="psa small1 dn title-img" data-imgs='<?php echo $arr_to_string; ?>'>
				<img class='w100' src="<?php echo $image_box_3[0]; ?>" alt="">

			</div>

<?php
			$image_box_4 = [];
				if(have_rows('header_images_4')) {

					while(have_rows('header_images_4')) {
						the_row();
						$image_box_4[] =  get_sub_field('image'); ?>


						<?php
					}
				} 
		$arr_to_string = '["' . implode( '","', $image_box_4) . '"]'; 

				?>
			<div 
				class="psa small2 dn title-img" data-imgs='<?php echo $arr_to_string; ?>'>
				<img class='w100' src="<?php echo $image_box_4[0]; ?>" alt="">

			</div>

		</section>
	</aside>
<div id="page" class="site">
	
	

	<header id="masterhead" class=" index-header site-header">

		<nav id="site-navigation" class="main-navigation">
			<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a class="cin" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a></h1>
			<?php else : ?>
				<p class="site-title"><a class="cin" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a></p>
			<?php
			endif;
 ?>
		</div><!-- .site-branding -->
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container' => false
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
