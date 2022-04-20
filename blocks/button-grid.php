<?php
/**
 * Button grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Variables for Current Block.

$margin_top =  get_field('margin-top');
$margin_bottom = get_field('margin-bottom');


?>

<section class="<?php echo $margin_top.' '. $margin_bottom ;?>">
    <div class="text-center">   
            <div class="row ">
                            <?php
                            $rows = get_field('buttons');
                                    if( $rows ) {

                                        // Loop through rows.
                                        foreach( $rows as $row ) {
                                              $link = $row['link'];
                                              $label = $row['label'];
                                              
                                              // Load sub field value.
                                              ?>
                                              <div class="col-12 col-md-3 text-center mb-md-5 px-5">
                                                  <div>
                                                      <a class="btn btn-primary btn-block button-call-to-action mb-2 mb-md-0" href="<?php echo $link;?>"><?php echo $label; ?></a>
                                                  </div>    
                                              </div> 
                                            <?php
                                        }

                                      }
                            ?>
            </div>
    </div>
</section>