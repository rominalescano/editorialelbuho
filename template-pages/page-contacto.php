<?php
/* Template Name: Contacto */

get_header(); ?>

<div class="container mt-5">
    <div class="row justify-content-center my-md-5 container-form">
        <div class="col-12 col-md-5 my-md-5">
            <?php   
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    the_content(); 
                    //
                    // Contenido Aqui
                    //
                }
            }  //  ?> 		

            <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ); ?> 	
        </div>	
    </div>	
</div>
      

<?php get_footer(); ?>