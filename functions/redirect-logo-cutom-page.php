<?php

add_filter( 'get_custom_logo',  'custom_logo_url' );
function custom_logo_url ( $html ) {

$custom_logo_id = get_theme_mod( 'custom_logo' );

$url = home_url();
$html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
        esc_url( $url ),
        wp_get_attachment_image( $custom_logo_id, 'full', false, array(
            'class'    => 'custom-logo',
        ) )
    );

return $html;    
}

?>