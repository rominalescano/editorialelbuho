<?php

function my_customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'my_custom_options', array(
	  'title' => __( 'Bonusbank Options', 'textdomain' ),
	  'priority' => 160,
	  'capability' => 'edit_theme_options',
	));

	// Section Home
	$wp_customize->add_section( 'home_section' , array(
		'title' => __( 'Home Page', 'textdomain' ),
		'panel' => 'my_custom_options',
		'priority' => 1,
		'capability' => 'edit_theme_options',
	  ));

      //Custom Fields Section Home
	
      //footer_text
	$wp_customize->add_setting( 'footer_text', array(
		'type' => 'option',
		'capability' => 'edit_theme_options',
	  ));
	
	$wp_customize->add_control('footer_text', array(
		'label' => __( 'Footer Text', 'textdomain' ),
		'section' => 'home_section',
		'priority' => 1,
		'type' => 'text',
	  ));

    //author_web
	$wp_customize->add_setting( 'author_web', array(
		'type' => 'option',
		'capability' => 'edit_theme_options',
	  ));
	
	$wp_customize->add_control('author_web', array(
		'label' => __( 'Author Web', 'textdomain' ),
		'section' => 'home_section',
		'priority' => 1,
		'type' => 'text',
	  ));
  
    }
    add_action( 'customize_register', 'my_customize_register' );
?>