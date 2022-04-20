<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package editorialelbuho
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row mt-5 mb-4 pt-5">
		<div class="col-12 col-md-6">
			<header class="entry-header mt-3">
				<div class="entry-content">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
					the_content();
					?>
				</div><!-- .entry-content -->
			</header><!-- .entry-header -->
			
		</div>
		
		<div class="col-12 col-md-6">
			<img src="<?php the_post_thumbnail_url(); ?>" class="w-100"/> 

		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->