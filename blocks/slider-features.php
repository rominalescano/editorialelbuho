<?php
/**
 * Slider-Features Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Variables for Current Block.

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


<section class="<?php echo $margin_top.' '. $margin_bottom ;?>">
    <div class="container bg-custom <?php echo $class_lights_position.' '.$type_of_ligths;?>">
            <div class="slider-features">              
                            <?php
                            $rows = get_field('features');
                                    if( $rows ) {
                                        // Loop through rows.
                                        foreach( $rows as $row ) {
                                              $content = $row['content'];
                                              $headline = $row['headline'];
                                              $sub_headline= $row['sub-headline'];
                                              $image_id = $row['image'];
                                              $image = '';
                                              if($image_id && is_numeric($image_id))
                                                $image = wp_get_attachment_image_src( $image_id, 'full' );
                                              // Load sub field value.
                                              ?>
                                              <div class="slider-item">
                                                <div class="row mb-5">
                                                    <div class="col-12 col-md-6">
                                                        <div class="border-custom">
                                                          <?php if(is_array($image)): ?>
                                                          <img class="mw-100 h-auto" src="<?php echo $image[0];?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $headline ?>">
                                                          <?php endif; ?>
                                                        </div>
                                                            
                                                      </div>
                                                      <div class="col-12 col-md-6 mt-5 mt-md-0">
                                                        <div class="pl-md-5">
                                                            <h4 class="text-primary text-uppercase"> <?php echo $sub_headline; ?></h4>
                                                            <h2 class=""><?php echo $headline; ?></h2>
                                                            <p><?php echo $content; ?> </p> 
                                                        </div>                                                       
                                                    </div>
                                                </div>         
                                              </div>
                                            <?php
                                        }

                                      }
                                    ?>    
            </div>
    </div>
</section>