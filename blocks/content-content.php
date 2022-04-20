<?php
/**
 * Content- Content Block Template.
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
$label_button = get_field('label-button');
$link_button= get_field('link-button');

$sub_headline2= get_field('sub-headline2');
$headline2 = get_field('headline2');
$headlines_sizes2= get_field('headlines-sizes2');
$content2 = get_field('content2');
$label_button2 = get_field('label-button2');
$link_button2= get_field('link-button2');

$invert_columns = get_field('invert-columns'); 
$lights_position= get_field('lights-position');
$type_of_ligths = get_field('type-of-lights');
$margin_top =  get_field('margin-top');
$margin_bottom = get_field('margin-bottom');

$class_invert_columns='';
if ($invert_columns){
    $class_invert_columns= 'order-md-2';
}

$class_button_visibility='';
$class_sub_headline_visibility='';
$class_button_visibility2='';
$class_sub_headline_visibility2='';


if ($sub_headline==''){
  $class_sub_headline_visibility='d-none';
}

if ($label_button == ''){
  $class_button_visibility='d-none';
} 

if ($sub_headline2==''){
  $class_sub_headline_visibility2='d-none';
}

if ($label_button2 == ''){
  $class_button_visibility2='d-none';
} 


$class_lights_position='';
if ($lights_position=='left'){
  $class_lights_position='bg-left';
} else {
  $class_lights_position='';
}


?>
<section class="block-content-content <?php echo $margin_top.' '. $margin_bottom ;?>">
    <div class="container bg-custom <?php echo $class_lights_position.' '.$type_of_ligths;?>">
    <?php //echo $value_border;?>
      <div class="row align-items-center">     
        <div class="col-12 col-md-6 <?php echo $class_invert_columns;?> mt-5 mt-md-0">
          <div class="div">
              <h4 class="text-primary text-uppercase <?php echo $class_sub_headline_visibility; ?>"><?php echo $sub_headline;?></h4>
              <h1 class="<?php echo $headlines_sizes; ?>"><?php echo $headline; ?></h1>
              <div><?php echo $content; ?> </div>
              <a class="btn btn-primary btn-glow button-content-content mb-3 <?php echo $class_button_visibility;?>" href="<?php echo $link_button;?>"><?php echo $label_button;?></a>
          </div>
        </div>    
        <div class="col-12 col-md-6 mt-5 mt-md-0 order-md-2">
          <div class="div">
              <h4 class="text-primary text-uppercase <?php echo $class_sub_headline_visibility2; ?>"><?php echo $sub_headline2;?></h4>
              <h1 class="<?php echo $headlines_sizes; ?>"><?php echo $headline2; ?></h1>
              <div><?php echo $content2; ?> </div>  
              <a class="btn btn-primary btn-glow button-content-content mb-3 <?php echo $class_button_visibility2;?>" href="<?php echo $link_button2;?>"><?php echo $label_button2;?></a>
          </div>
        </div>    
       </div>  
    </div>
  </section>