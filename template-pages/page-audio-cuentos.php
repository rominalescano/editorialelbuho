<?php
/* Template Name: Audio Cuentos */

get_header(); ?>


<div class="row justify-content-center">
	<div class="col-12 col-md-9">
		<div id="primary" class="featured-content content-area">
			<main id="main" class="site-main">
				<div class="">
					
					<?php
					if ( have_posts() ) : ?>

						
						<?php
						/* Start the Loop */
						query_posts( array ( 'category_name' => 'audiocuentos', 'posts_per_page' => -1 ) );
						while ( have_posts() ) : the_post();

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content-audio-cuentos', get_post_format() );

						endwhile;
				
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>


<?php get_footer(); ?>