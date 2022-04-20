<?php
/**
 * Text Block Template.
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
$margin_top =  get_field('margin-top');
$margin_bottom = get_field('margin-bottom');



?>
<section class="<?php echo $margin_top.' '. $margin_bottom ;?>">  
  <div class="container">
        <div class="row align-items-center">              
          <div class="col-12">
            <div class="div">
                <h4 class="text-primary text-uppercase"><?php echo $sub_headline;?></h4>
                <h1 class="<?php echo $headlines_sizes; ?>"><?php echo $headline; ?></h1>
                <p><?php echo $content; ?> </p>
            </div>
          </div>      
        </div>
  </div>
</section>