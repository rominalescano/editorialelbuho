<?php 
if( function_exists('acf_register_block_type') ):


    acf_register_block_type(array(
        'name' => 'text',
        'title' => 'Text',
        'description' => 'Block to add  Text',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/text.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/text.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-embed-photo',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'media',
        'title' => 'Media',
        'description' => 'Block to add  Photo or video ',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/media.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/media.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-embed-photo',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'content-media',
        'title' => 'Content-Media',
        'description' => 'Block to add Text and Photo / or video in two columns',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/content-media.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/content-media.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-columns',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'content-content',
        'title' => 'Content-Content',
        'description' => 'Block to add Text in two columns',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/content-content.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/content-content.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-columns',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));
    
    acf_register_block_type(array(
        'name' => 'content-list',
        'title' => 'Content-List',
        'description' => 'Block to add Text List',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/content-list.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/content-list.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-list-view',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'testimonials',
        'title' => 'Testimonials',
        'description' => 'Block to add testimonial text',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/testimonials.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/slider-theme.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-admin-comments',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'testimonials-select',
        'title' => 'Testimonials Select',
        'description' => 'Block to add testimonials select',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/testimonials-select.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/slider-theme.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-admin-comments',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'slider-features',
        'title' => 'Slider Features',
        'description' => 'Block to add slider features',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/slider-features.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/slider-theme.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-slides',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'call-to-action',
        'title' => 'Call to Action',
        'description' => 'Block to add Call to Action',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/call-to-action.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/call-to-action.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-screenoptions',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'button-grid',
        'title' => 'Button Grid',
        'description' => 'Block to add button grid',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/button-grid.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/button-grid.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-grid-view',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'membership-cards',
        'title' => 'Membership Cards',
        'description' => 'Block to add Membership Cards',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/membership-cards.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/membership-cards.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-admin-page',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));

    acf_register_block_type(array(
        'name' => 'feature-cards',
        'title' => 'Feature Cards',
        'description' => 'Block to add Feature Cards',
        'category' => 'common',
        'keywords' => array(
            0 => 'content',
        ),
        'post_types' => array(
            0 => 'page',
        ),
        'mode' => 'preview',
        'align' => '',
        'render_template' => '/blocks/onboarding-cards.php',
        'render_callback' => '',
        'enqueue_style' => get_template_directory_uri() . '/src/assets/docs/css/blocks/onboarding-cards.css',
        'enqueue_script' => '',
        'enqueue_assets' => '',
        'icon' => 'dashicons dashicons-admin-page',
        'supports' => array(
            'align' => true,
            'mode' => true,
            'multiple' => true,
        ),
    ));




    endif;

?>