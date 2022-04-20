<?php
/**
 * Call-To-Action Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Variables for Current Block.

$headline = get_field('headline');
$sub_headline = get_field('sub-headline');
$lights_position= get_field('lights-position');
$type_of_ligths = get_field('type-of-lights');
$margin_top =  get_field('margin-top');
$margin_bottom = get_field('margin-bottom');
$button_label= get_field('button-label');
$button_link= get_field('button-link');

$class_button_visibility='';
$class_lights_position='';



$class_lights_position='';
if ($lights_position=='left'){
  $class_lights_position='bg-left';
} else {
  $class_lights_position='';
}
?>

<section class="<?php echo $margin_top.' '. $margin_bottom ;?>">
    <div class="container text-center bg-custom <?php echo $class_lights_position.' '.$type_of_ligths;?>">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 mb-md-4">
                      <h2 class=""><?php echo $headline; ?></h2>
                      <p class="mb-2"><?php echo $sub_headline; ?></p>

                      <?php if ($button_label!='') {?>
                            <a class="btn btn-primary button-call-to-action <?php echo $class_button_visibility;?>" href="<?php echo $button_link;?>"><?php echo $button_label; ?></a>
                     <?php } ?>
                     
                </div>      
            </div>           
            <div class="row justify-content-around">
                      
                            <?php
                            $rows = get_field('items');
                                    if( $rows ) {

                                        // Loop through rows.
                                        foreach( $rows as $row ) {
                                              $content = $row['content-item'];
                                              $image_id = $row['image-item'];
                                              $image = '';
                                              if($image_id && is_numeric($image_id))
                                                $image = wp_get_attachment_image_src( $image_id, 'full' );
                                              $headline_item= $row['headline-item'];
                                              // Load sub field value.
                                              ?>
                                              <div class="col-12 col-md-5 text-center mb-md-5 px-5">
                                                  <div class="px-md-3">
                                                    <?php if(is_array($image)): ?>
                                                      <img class="w-15 mb-4 h-auto" src="<?php echo $image[0];?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $headline_item ?>">
                                                    <?php endif; ?>
                                                    <h5><?php echo $headline_item; ?></h5>
                                                    <p><?php echo $content; ?> </p>
                                                  </div>    
                                              </div> 
                                            <?php
                                        }

                                      }
                            ?>
            </div>
    </div>
</section>