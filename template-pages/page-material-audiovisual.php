<?php
/* Template Name: Material Audiovisual */

get_header(); ?>

<div class="row justify-content-center">
	<div class="col-12 col-md-8">
		<div id="primary" class="featured-content content-area">
			<main id="main" class="site-main">
				<div class="">
						<?php
						if ( have_posts() ) : ?>
						
						<?php
						/* Start the Loop */
						query_posts( array ( 'category_name' => 'audiovisuales', 'posts_per_page' => -1 ) );
						while ( have_posts() ) : the_post(); ?>
	
						<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry fbox blogposts-list'); ?>>
						<div class="content-wrapper-ancho">
							<header class="entry-header">
								<h1><?php the_title();  ?></h1>
							</header>
						</div>


						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail('medium'); ?>
						<?php endif; ?>


						<div class="entry-content">
							<p><?php the_content();  ?></p>
						</div>	

						</article>
						<?php

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
