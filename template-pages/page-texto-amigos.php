<?php
/* Template Name: Texto amigos */

get_header(); ?>


<div id="primary" class="featured-content content-area">
<div class="content-wrap content-texto-amigo">
    	<h1>Compartí con nosotros tus textos</h1><a class="bottom-texto-amigo" href="/page/carga-texto-amigo">Subilos aquí</a> 
</div>
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			
			<?php
			/* Start the Loop */
			query_posts( array ( 'category_name' => 'textos-amigos', 'posts_per_page' => -1 ) );
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

		echo '<div class="text-center">';
				
				echo '</div>';
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>