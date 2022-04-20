<?php
/**
 * Media Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Variables for Current Block.


$imagen = get_field('image');
$video= get_field('video');

$type_media= get_field('type-media');
$lights_position= get_field('lights-position');
$type_of_ligths = get_field('type-of-lights');
$margin_top =  get_field('margin-top');
$margin_bottom = get_field('margin-bottom');
$border= get_field('border');



$class_button_visibility='';
$class_image_visibility='';
$class_video_visibility='';
$class_sub_headline_visibility='';



$class_lights_position='';
if ($lights_position=='left'){
  $class_lights_position='bg-left';
} else {
  $class_lights_position='';
}

$class_border='';
if ($border){
    $class_border= 'border-custom';
}


?>
<section class="block-media <?php echo $margin_top.' '. $margin_bottom ;?>">
    <div class="container bg-custom <?php echo $class_lights_position.' '.$type_of_ligths;?>">
    <?php //echo $value_border;?>
      <div class="row justify-content-center">
        <div class="col-12">          
          <div class="<?php echo $class_border;?>">
          <?php
          if ($type_media== 'video') { ?> 
          <div> <?php  echo $video; ?> </div>  
          <?php } else {?>
            <img class="w-100" src="<?php echo $imagen;?>" alt="">
          <?php
          }?>           
        </div>         
       </div>            
      </div>
    </div>
  </section>