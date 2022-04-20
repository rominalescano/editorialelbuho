<?php
/**
 * Content- Media Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Variables for Current Block.

$sub_headline= get_field('sub-headline');
$headline = get_field('headline');
$headlines_sizes= get_field('headlines-sizes');
$content = get_field('content');
$image_id = get_field('image');
$video= get_field('video');
$invert_columns = get_field('invert-columns'); 
$label_button = get_field('label-button');
$link_button= get_field('link-button');
$type_media= get_field('type-media');
$lights_position= get_field('lights-position');
$type_of_ligths = get_field('type-of-lights');
$margin_top =  get_field('margin-top');
$margin_bottom = get_field('margin-bottom');
$icons= get_field('icons');
$border= get_field('border');
$proportion= get_field('proportion');

$imagen = '';
if($image_id && is_numeric($image_id))
  $imagen = wp_get_attachment_image_src( $image_id, 'full' );

$class_invert_columns='';
if ($invert_columns){
    $class_invert_columns= 'order-md-2';
}

$class_button_visibility='';
$class_image_visibility='';
$class_video_visibility='';
$class_sub_headline_visibility='';


if ($sub_headline==''){
  $class_sub_headline_visibility='d-none';
}

if ($label_button == ''){
  $class_button_visibility='d-none';
} 


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

$class_width_text='';
$class_width_media='';
if ($proportion=='3text-2media'){
  $class_width_text='col-md-7';
  $class_width_media='col-md-5';
} else {
  $class_width_text='col-md-5';
  $class_width_media='col-md-7';
}

?>
<section class="block-content-media <?php echo $margin_top.' '. $margin_bottom ;?>">
    <div class="bg-custom <?php echo $class_lights_position.' '.$type_of_ligths;?>">
    <?php //echo $value_border;?>
      <div class="row align-items-center">     
        <div class="col-12  <?php echo $class_width_text.' '. $class_invert_columns;?> mt-5 mt-md-0">
          <div class="div">
              <h5 class="text-primary <?php echo $class_sub_headline_visibility; ?>"><?php echo $sub_headline;?></h5>
              <h1 class="<?php echo $headlines_sizes; ?>"><?php echo $headline; ?></h1>
              <div><?php echo $content; ?> </div>
              <img class="" src="<?php echo $icons;?>" alt="">
              <a class="btn btn-primary btn-glow button-content-media mb-3 <?php echo $class_button_visibility;?>" href="<?php echo $link_button;?>"><?php echo $label_button;?></a>
          </div>
        </div>    
        <div class="col-12 <?php echo $class_width_media;?>">          
          <div class="<?php echo $class_border;?>">
           <?php
            if ($type_media== 'video') { ?> 
              <div>
                 <?php echo $video; ?> 
              </div>  
            <?php } elseif(is_array($imagen)) {?>
              <img class="mw-100 h-auto" src="<?php echo $imagen[0];?>" width="<?php echo $imagen[1]; ?>" height="<?php echo $imagen[2]; ?>" alt="<?php echo $headline ?>">
          <?php
          }?>           
        </div>         
       </div>   
      </div>
    </div>
  </section>
