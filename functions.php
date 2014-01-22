<?php
/**
 * Init Genesis
 */
include_once( get_template_directory() . '/lib/init.php' );

/**
 * Setup Child Theme
 */
define( 'CHILD_THEME_NAME', 'WP Console Starter' );
define( 'CHILD_THEME_URL', 'http://www.wpconsole.com/' );
define( 'CHILD_THEME_VERSION', '1.0' );

/**
 * Add HTML5 markup structure
 */
add_theme_support( 'html5' );

/**
 * Add viewport meta tag for mobile browsers
 */
add_theme_support( 'genesis-responsive-viewport' );

/**
 * Add support for custom background
 */
add_theme_support( 'custom-background' );

/**
 * Add support for 3-column footer widgets
 */
add_theme_support( 'genesis-footer-widgets', 3 );

/**
 * Add support for structural wraps
 */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'site-inner', 'footer-widgets', 'footer' ) );

/**
 * Add SVG Support
 */
add_filter( 'upload_mimes', 'wpc_mime_types' );
function wpc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

/**
 * Load Theme Scripts
 */
add_action('wp_enqueue_scripts', 'wpc_load_scripts');
function wpc_load_scripts() {
	wp_enqueue_script( 'init-js', get_stylesheet_directory_uri() . '/scripts/init.js', array( 'jquery' ), '');
}

/**
 * Load Theme Styles
 */
add_action( 'wp_enqueue_scripts', 'wpc_load_styles' );
function wpc_load_styles() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}

/**
 * Customize Genesis Footer
 */
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'tow_footer' );
function tow_footer() {
    ?>
    <p>&copy; <?php echo __( 'Copyright' . date("Y") . ' ' . get_bloginfo( 'name ') . '&middot; All Rights Reserved', 'wpc' ) ?>  </p>
    <?php
}

/**
 * Custom Widget Areas
 */
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
	    'name' => __( 'Home Page Widgets', 'wpc' ),
	    'id' => 'home-page-widget',
	    'before_widget' => '<div class="grid_4">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	    'description' => __( 'Add widgets to home page below the content area.', 'wpc' ),
    ));
}
