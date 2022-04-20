<?php
/**
 * Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Variables for Current Block.

$headline = get_field('headline');
$lights_position= get_field('lights-position');
$type_of_ligths = get_field('type-of-lights');
$margin_top =  get_field('margin-top');
$margin_bottom = get_field('margin-bottom');



$class_lights_position='';
if ($lights_position=='left'){
  $class_lights_position='bg-left';
} else {
  $class_lights_position='';
}
?>

<section class="<?php echo $margin_top.' '. $margin_bottom ;?> pb-2 pb-md-4">
    <div class="container bg-custom <?php echo $class_lights_position.' '.$type_of_ligths;?>">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 text-center">
                      <h2 class=""><?php echo $headline; ?></h2>
                      <div class="slider-testimonial">
                            <?php
                            $rows = get_field('testimonials');
                                    if( $rows ) {

                                        // Loop through rows.
                                        foreach( $rows as $row ) {
                                        
                                              $content = $row['content'];
                                              $name = $row['name'];
                                              $sub_headline= $row['sub-headline'];
                                              // Load sub field value.
                                              ?>
                                                <div class="slider-item">
                                                    <p><?php echo $content; ?> </p>
                                                    <h4 class="text-primary"> <?php echo $name; ?></h4>
                                                    <h5><?php echo $sub_headline; ?></h5>
                                                </div>
                                            <?php
                                        }

                                      }
                                    ?>
                   </div>  
              </div>
            </div>
    </div>
</section>