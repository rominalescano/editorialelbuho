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
$with_headline = get_field('with-headline');
$headline = get_field('headline');
$headlines_sizes= get_field('headlines-sizes');
$content = get_field('content');
$lights_position= get_field('lights-position');
$type_of_ligths = get_field('type-of-lights');
$margin_top =  get_field('margin-top');
$margin_bottom = get_field('margin-bottom');
$class_sub_headline_visibility='';


if ($sub_headline==''){
  $class_sub_headline_visibility='d-none';
}


$class_lights_position='';
if ($lights_position=='left'){
  $class_lights_position='bg-left';
} else {
  $class_lights_position='';
}

?>

<section class="<?php echo $margin_top.' '. $margin_bottom ;?>">
    <div class="container bg-custom <?php echo $class_lights_position.' '.$type_of_ligths;?>">
      <div class="row align-items-center">
        <div class="col-12 mt-md-0">
          <div class="div">
          <?php if ($with_headline) {?>
              <div class="border-custom">
                <div class="titles">
                  <h4 class="text-primary text-uppercase <?php echo $class_sub_headline_visibility; ?>"><?php echo $sub_headline;?></h4>
                  <h1 class="text-center   <?php echo $headlines_sizes; ?>"><?php echo $headline; ?></h1>
                </div>
              </div> 
              <?php }?>  
              <p><?php echo $content; ?> </p>
              <ul class="h5 font-1 pl-0">
              <?php
              $rows = get_field('list');
                if( $rows ) {
                            // Loop through rows. 
                            foreach( $rows as $row ) {
                                $title = $row['title'];
                                $content_list = $row['content-list'];
                                // Load sub field value.
                            ?>
                            <li class="d-block">
                            <h3 class="text-primary"><?php echo $title;?></h3>
                            <p> <?php echo $content_list; ?></p>
                           </li>
                            <?php }?>
             </ul>
             <?php } ?>
          </div>
        </div>      
      </div>
    </div>
  </section>