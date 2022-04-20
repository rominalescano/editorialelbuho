<?php
/**
 * Onboarding Cards Block Template.
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
$headline = get_field('headline');
$sub_headline = get_field('sub-headline');
$columns = get_field('columns');
$with_link = get_field('with-link');



$class_lights_position='';
if ($lights_position=='left'){
  $class_lights_position='bg-left';
} else {
  $class_lights_position='';
}
?>


<section class="<?php echo $margin_top.' '. $margin_bottom ;?>">
    <div class="container text-center bg-custom <?php echo  $class_lights_position.' '.$type_of_ligths;?>">
        <div class="row justify-content-center">
                <div class="col-12 col-md-8 mb-md-2 text-center">
                        <h1 class=""><?php echo $headline.' '; ?><?php echo do_shortcode("[show_logged_user]"); ?></h1>
                        <p class=""><?php echo $sub_headline;?></p>
                        
                </div>      
        </div>     
        <div class="row mt-md-5">
            <?php
            $rows = get_field('features');
                        if( $rows ) {
                                    // Loop through rows.
                                    foreach( $rows as $row ) {
                                        $headline_feature = $row['headline-feature'];
                                        $icon_feature= $row['icon-feature'];
                                        $link_feature = $row['link-feature'];
                                        $content = $row['content'];
                                        // Load sub field value.
                                    ?>
                    <div class="col-12 <?php echo $columns;?> mb-3">
                                <?php if ($with_link) {?>
                                    <a href="<?php echo $link_feature;?>"> 
                                <?php } ?>
                                        <div class="card card-feature shadow-lg h-100">
                                            <div class="px-md-4 pt-3 py-md-5">
                                                <h4 class="card-title"><?php echo $headline_feature; ?></h4>
                                                <img class="w-50" src="<?php echo $icon_feature;?>" alt="">
                                                <?php if (!empty($content)) {?>
                                                <p><?php echo $content;?></p>
                                                <?php }  ?>
                                            </div>
                                        </div>
                                <?php if ($with_link) {?>
                                    </a>
                                <?php }  ?>
        
                    </div>
                    <?php
                    }
                } ?>
        </div>
    </div>
</section>