<?php
get_header();
?>

<div class="row justify-content-center">
	<div class="col-12 col-md-9">
		<div id="primary" class="featured-content content-area">
			<main id="main" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			</main><!-- #main -->
		</div>
	</div>
</div>

<?php
//get_sidebar();
get_footer();
