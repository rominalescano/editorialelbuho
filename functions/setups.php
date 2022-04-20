<?php 
if ( ! function_exists( 'bonusbank_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bonusbank_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bonusbank, use a find and replace
		 * to change 'bonusbank' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bonusbank', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.

		register_nav_menus( array(
			'primary-menu'=>'Main Menu'
		) );

		register_nav_menus( array(
			'footer_menu1'=>'Footer Menú 1'
		) );

		register_nav_menus( array(
			'footer_menu2'=>'Footer Menú 2'
		) );

		register_nav_menus( array(
			'footer_menu3'=>'Footer Menú 3'
		) );



		/** navwalker boostrap  */
		require_once get_template_directory() . '/functions/navwalker.php';


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'bonusbank_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'bonusbank_setup' );

add_filter ('the_title', 'remove_home_page_title', 10, 2);

function remove_home_page_title ($title, $id){
	if (is_front_page()){
		$home_id = get_option('page_on_front');
		if ( $home_id == $id ) return '';

	}
	return $title;
}


// Paginator
function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

// Logged User Shortcode

add_shortcode( 'show_logged_user', 'wp_show_logged_user' );
function shortcodes_init(){

	function wp_show_logged_user( $atts ) {
		global $current_user, $user_login;
			  wp_get_current_user();
			if ($user_login) {
			$first_name=$current_user->user_firstname;
				if($first_name !=''){
					return $current_user->user_firstname;
				} else {
					return  $current_user->display_name;
				}
				

			}
				
			else {
				return '';
			}
				
	}
	
}

add_action('init', 'shortcodes_init');

// LoginLogout Menú Primary
add_filter( 'wp_nav_menu_items', 'dcms_items_login_logout', 10, 2);

function dcms_items_login_logout( $items, $args ) {


	if ($args->theme_location == 'primary-menu') {

		if (is_user_logged_in() && $args->menu == 'logged-in-primary-free'){ 

			$items .= '<li class="menu-item btn-menu btn-login btn btn-primary py-0 ml-md-2 mt-1 mt-md-0">
			<a class="nav-link" href="'. home_url('membership-plans/') .'">'. __("Upgrade") .'</a>
			</li>';
		}
	}

	if ($args->theme_location == 'primary-menu') {
		if (!is_user_logged_in()){
			$items .= '<li class="menu-item btn-menu btn-login btn btn-outline-primary py-0 ml-md-5">
						<a class="nav-link" href="'. home_url('login') .'">'. __("Log In") .'</a>
						</li>';

			$items  .='<li class="menu-item btn-menu btn-login btn btn-primary py-0 ml-md-2 mt-1 mt-md-0">
						<a class="nav-link" href="'. home_url('plans/memberships/') .'">'. __("Sign Up") .'</a>
						</li>';			
		}
	}

	if ($args->theme_location == 'secondary-menu') {
			if (is_user_logged_in()) {
				$items .= '<li class="menu-item">
				<a class="nav-link" href="'.  wp_logout_url(home_url('')) .'"><span itemprop="name">'. __("Log Out") .'</span></a>
							</li>';
				$items  .='<li class="menu-item">
				<a class="nav-link" href="'. home_url('account') .'"><strong><span itemprop="name">'. wp_get_current_user()->display_name .'</span></strong></a>
				</li>';	
			}
		}	
	return $items;
}


/*Hide the Login Error Message*/
function login_error_override()
{
	return __( 'Incorrect login details.', 'targetimc' );
}
add_filter('login_errors', 'login_error_override');

// ???????????
// function wpcc_front_end_login_fail( $username ) {
// 	$referrer = $_SERVER['HTTP_REFERER'];
//     error_log($referrer);
// 	if ( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) {
// 	  $referrer = esc_url( remove_query_arg( 'login', $referrer ) );
// 	  wp_redirect( $referrer . '?login=failed' );
// 	  exit;
// 	}
//   }
// add_action( 'wp_login_failed', 'wpcc_front_end_login_fail' );

function custom_authenticate_wpcc( $user, $username, $password ) {
	if ( is_wp_error( $user ) && isset( $_SERVER[ 'HTTP_REFERER' ] ) && !strpos( $_SERVER[ 'HTTP_REFERER' ], 'wp-admin' ) && !strpos( $_SERVER[ 'HTTP_REFERER' ], 'wp-login.php' ) ) {
	  $referrer = $_SERVER[ 'HTTP_REFERER' ];
	  foreach ( $user->errors as $key => $error ) {
		  if ( in_array( $key, array( 'empty_password', 'empty_username') ) ) {
			unset( $user->errors[ $key ] );
			$user->errors[ 'custom_'.$key ] = $error;
		  }
		}
	}
 
  return $user;
}
add_filter( 'authenticate', 'custom_authenticate_wpcc', 31, 3);

?>