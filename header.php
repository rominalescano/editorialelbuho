<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package editorialelbuho
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600;700&family=Roboto:wght@100;400;500;700&display=swap" rel="preload" as="style" onload="this.rel='stylesheet'">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open();


$class_nav='';
$class_margin='';
$fixed_nav = get_field('fixed-nav');


if ($fixed_nav == 'on'){
	$class_nav='fixed-top';
	$class_margin='margin-top: 38px;';
}


?>

	<header id="masthead" class="site-header">

<!-- 	<?php
	//if ( is_user_logged_in() ) {
	?>
		<nav class="nav-secondary color-secondary <?php //echo $class_nav;?>">		
				<?php
					//	wp_nav_menu([
					// 		'menu' => 'secondary-menu',
					// 		'theme_location' => 'secondary-menu',
					// 		'depth' => 2,
					// 		'container' => 'div',
					// 		'container_class' =>  '',
					// 		'container_id' => 'navbarSupportedContent',
					// 		'menu_class' => '',
					// 		'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
					// 		'walker' => new wp_bootstrap_navwalker()
					// ]);
						?>	
		
		</nav>
	<?php
	//} else { -->
		$class_margin='';
	//}
	?>
		<!-- <div class="space-nav  <?php //echo $class_nav;?>">

		</div> -->
		<nav class="navbar primary-menu navbar-expand-lg navbar-dark color-secondary <?php echo $class_nav;?>" style="<?php echo $class_margin;?>">
		<div class="ml-md-5"><?php the_custom_logo(); ?></div>			
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button> 
		
					<?php

					wp_nav_menu([
							'menu' => 'primary-menu',
							'theme_location' => 'primary-menu',
							'depth' => 4,
							'container' => 'div',
							'container_class' => 'collapse navbar-collapse',
							'container_id' => 'navbarSupportedContent',
							'menu_class' => 'nav navbar-nav main-menu ml-auto mt-md-3',
							'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
							'walker' => new wp_bootstrap_navwalker()
					]);

					?>

		</nav>
	 <div class="space"></div>
	</header><!-- #masthead -->

