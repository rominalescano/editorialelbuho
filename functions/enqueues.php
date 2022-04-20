<?php
function bonusbank_scripts() {

	//Styles and Scripts Bonusbank
	if(is_front_page()) {
		//wp_enqueue_style( 'bonusbank-home', get_template_directory_uri() . '/assets/docs/css/templates/template-home.css', array(), _S_VERSION );
		wp_enqueue_style( 'bonusbank-style', get_template_directory_uri() . '/assets/docs/css/style.css', array(), _S_VERSION );
	} 
	else {
		wp_enqueue_style( 'bonusbank-style', get_template_directory_uri() . '/assets/docs/css/style.css', array(), _S_VERSION );
	}
	
	//wp_style_add_data( 'bonusbank-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bonusbank-all', get_template_directory_uri() . '/assets/docs/js/all.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'bonusbank-navigation', get_template_directory_uri() . '/assets/components/js/navigation.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// memberpress magnific popup
	// echo "maginific poppup";
	wp_deregister_script('mpcs-jquery-magnific-popup');
	wp_register_script('mpcs-jquery-magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'));
	wp_enqueue_script('mpcs-jquery-magnific-popup');
}
add_action( 'wp_enqueue_scripts', 'bonusbank_scripts' );




// Styles Admin
//add_action( 'enqueue_block_editor_assets', function() {
    //wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/assets/docs/css/style.css', false, '1.0', 'all' );
//} );

?>
