<?php
/**
 * Membership Cards Block Template.
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
$sub_headline= get_field('sub-headline');


$class_lights_position='';
if ($lights_position=='left'){
  $class_lights_position='bg-left';
} else {
  $class_lights_position='';
}
?>

<section class="<?php echo $class_lights_position.' '.$margin_top.' '. $margin_bottom ;?> block-membership container pb-5 pb-md-1 bg-custom  <?php echo $class_lights_position;?>">
<div class="row justify-content-center">
        <div class="col-12 col-md-4 mb-md-2 text-center">
                <h2 class=""><?php echo $headline; ?></h2>
                <p class=""><?php echo $sub_headline; ?></p>
        </div>      
</div>     
<div class="slider-membership">
    <?php
    $rows = get_field('memberships');
                if( $rows ) {

                            // Loop through rows.
                            foreach( $rows as $row ) {
                                //$sub_headline_membership = $row['sub-headline-membership'];
                                $headline_membership = $row['headline-membership'];
                                $membership_price = $row['membership-price'];
                                $list_features = $row['list-features'];
                                $link_membership = $row['link-membership'];
                                $membership_period= $row['period-membership'];
                                // Load sub field value.
                            ?>


            <div class="h-100 px-2 pb-3">
                <div class="card card-membership shadow-lg h-100">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $headline_membership; ?></h4>
                        <span class="h2 text-primary"><?php echo $membership_price; ?> </span><span class="h4 font-1"> <?php echo $membership_period; ?></span>
                        <ul class="h5 pl-3 font-1">
                            <?php
                            if( $list_features ) {

                                // Loop through rows.
                                foreach( $list_features as $feature ) {
                                    //$sub_headline_membership = $row['sub-headline-membership'];
                                    $text_feature = $feature['feature'];
                                    // Load sub field value.
                                    ?>
                                <li><?php echo $text_feature; ?></li>
                                <?php    }
                            } ?>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo $link_membership; ?>" class="btn  btn-block button-custom">Sign Up</a>
                    </div>
                </div>
            </div>
            <?php
                        }
            } ?>
</div>
</section>