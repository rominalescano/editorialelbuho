<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package editorialelbuho
 */

?>
	<footer id="colophon" class="site-footer container-menus-footer">
		<div class="">
			<div class="row">
					<div class="col-12 col-md-3 text-center">
							<?php the_custom_logo(); ?>
						</div>
						<div class="col-12 col-md-3">
							<nav class="d-none d-md-block">	
										<?php
										$locations = get_nav_menu_locations();
										$footer_menu1 = wp_get_nav_menu_object( $locations['footer_menu1'] );

										echo '<p class="h4">' . wp_kses_post( $footer_menu1->name ). '</p>';

										wp_nav_menu([
												'menu' => 'footer_menu1',
												'theme_location' => 'footer_menu1',
												'depth' => 2,
												'container' => 'div',
												'container_class' => '',
												'container_id' => 'navbarSupportedContent',
												'menu_class' => 'font-1 h5 text-white menu-footer ml-auto mt-md-3',
												'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
												'walker' => new wp_bootstrap_navwalker()
										]);

										?>

							</nav>
						</div>
						<div class="col-12 col-md-3">
							<nav class="d-none d-md-block">	
										<?php
										$locations = get_nav_menu_locations();
										$footer_menu2 = wp_get_nav_menu_object( $locations['footer_menu2'] );

										echo '<p class="h4">' . wp_kses_post( $footer_menu2->name ). '</p>';

										wp_nav_menu([
												'menu' => 'footer_menu2',
												'theme_location' => 'footer_menu2',
												'depth' => 2,
												'container' => 'div',
												'container_class' => '',
												'container_id' => 'navbarSupportedContent',
												'menu_class' => 'font-1 h5 text-white menu-footer ml-auto mt-md-3',
												'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
												'walker' => new wp_bootstrap_navwalker()
										]);
										?>

							</nav>
						</div>
						<div class="col-12 col-md-3">
							<nav class="d-none d-md-block">		
										<?php

										$locations = get_nav_menu_locations();
										$footer_menu3 = wp_get_nav_menu_object( $locations['footer_menu3'] );

										echo '<p class="h4">' . wp_kses_post( $footer_menu3->name ). '</p>';

										wp_nav_menu([
												'menu' => 'footer_menu3',
												'theme_location' => 'footer_menu3',
												'depth' => 2,
												'container' => 'div',
												'container_class' => '',
												'container_id' => 'navbarSupportedContent',
												'menu_class' => 'font-1 h5 text-white menu-footer ml-auto mt-md-3',
												'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
												'walker' => new wp_bootstrap_navwalker()
										]);
										?>

							</nav>
						</div>
					</div>
			<?php
			$footer_text= get_option('footer_text');
			$author_web= get_option('author_web');
			?>
					<div class="mt-1">
						<p class="text-white text-center text-footer" style="">  <?php echo $footer_text;?></p>
					</div>
					<div class="site-info text-center text-primary h5 mt-1 mb-2 font-2 pb-5">
						<?php echo $author_web;?>
					</div><!-- .site-info -->
			</div>
		</div>	
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
