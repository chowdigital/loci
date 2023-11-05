<?php
/**
 * Cloudsdale_Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cloudsdale_Theme
 */

if ( ! defined( 'CLOUDSDALE_MASTER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CLOUDSDALE_MASTER_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cloudsdale_master_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Cloudsdale_Theme, use a find and replace
		* to change 'cloudsdale-master' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cloudsdale-master', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'cloudsdale-master' ),
		)
	);

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
			'cloudsdale_master_custom_background_args',
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
add_action( 'after_setup_theme', 'cloudsdale_master_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cloudsdale_master_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cloudsdale_master_content_width', 640 );
}
add_action( 'after_setup_theme', 'cloudsdale_master_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function cloudsdale_master_scripts() {
	wp_enqueue_style( 'Bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array() );

	//wp_enqueue_style( 'cloudsdale-master-style', get_stylesheet_uri(), array(), $ver = 1.3 );
	wp_enqueue_style('clousedale-minified-style', get_theme_file_uri('style.min.css') , array(), $ver = 1.1 );
	wp_style_add_data( 'cloudsdale-master-style', 'rtl', 'replace' );
    wp_enqueue_script( 'Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true );

	wp_enqueue_script( 'cloudsdale-master-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.1', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(),'1.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cloudsdale_master_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Opening Time Start
 */

 function custom_theme_customize_register($wp_customize) {
    // Create a section for opening times
    $wp_customize->add_section('opening_times', array(
        'title' => 'Opening Times',
        'priority' => 30,
    ));

    $wp_customize->add_section('opening_times_kitchen', array(
        'title' => 'Opening Times Kitchen',
        'priority' => 31,
    ));
	$wp_customize->add_section('contact_info', array(
        'title' => 'Contact Information',
        'priority' => 32,
    ));


    // Add a control for each day of the week (Opening Times)
    $days_of_week = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
    foreach ($days_of_week as $day) {
        $wp_customize->add_setting('opening_times_' . $day, array(
            'default' => 'Closed', // Set the default value to 'Closed'
        ));

        $wp_customize->add_control('opening_times_' . $day, array(
            'label' => ucfirst($day) . ' Opening Times',
            'section' => 'opening_times',
            'type' => 'text',
        ));
    }

    // Add a control for kitchen opening times (Opening Times Kitchen)
    $days_of_week_kitchen = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
    foreach ($days_of_week_kitchen as $day) {
        $wp_customize->add_setting('opening_times_kitchen_' . $day, array(
            'default' => 'Closed', // Set the default value to 'Closed'
        ));

        $wp_customize->add_control('opening_times_kitchen_' . $day, array( // Added an underscore here
            'label' => ucfirst($day) . ' Opening Times Kitchen',
            'section' => 'opening_times_kitchen',
            'type' => 'text',
        ));
    }
// Add a control for contact information 
$contact_info_fields = array('address', 'phone', 'email', 'facebook', 'instagram');
foreach ($contact_info_fields as $info_field) {
    $default_value = '';

    if ($info_field === 'email') {
        $default_value = 'example@example.com'; // Default email
    } elseif ($info_field === 'phone') {
        $default_value = '+1234567890'; // Default phone number
    }

    $wp_customize->add_setting('contact_info_' . $info_field, array(
        'default' => $default_value,
    ));

    $wp_customize->add_control('contact_info_' . $info_field, array( 
        'label' => ucfirst($info_field) . ' Contact Info',
        'section' => 'contact_info',
        'type' => 'text',
    ));
}

}
add_action('customize_register', 'custom_theme_customize_register');
	
//




/**
 * remove customiser options 
 */ 

function remove_customizer_sections($wp_customize) {
    // Remove sections you don't want
    
    // Remove Header Image
    $wp_customize->remove_section('header_image');
    
    // Remove Colors
    $wp_customize->remove_section('colors');
    
    // Remove Background Image
    $wp_customize->remove_section('background_image');
    
    // Remove Widgets
    $wp_customize->remove_panel('widgets');
    
    // Remove Menus
    $wp_customize->remove_panel('nav_menus');
	    
	// Remove Menus
	$wp_customize->remove_panel('menus');
    
    // Remove Homepage Settings
    $wp_customize->remove_section('static_front_page');
    
    // Remove Additional CSS
    $wp_customize->remove_section('custom_css');
}

add_action('customize_register', 'remove_customizer_sections');

// register new post type 


/*section Menus */
function create_posttype_again() {
 
    register_post_type( 'menus',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Menus' ),
                'singular_name' => __( 'Menu' )
				
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'menu'),
            'show_in_rest' => true,
			'supports' => array( 'title', 'editor', 'revisions' ),
			'menu_icon' => 'dashicons-smiley',
			

	
 
        )
    );
		
	
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_again' );

/* MENUS END*/


/**
 * Add Catagoies to custom menu section
 */

function reg_cat() {
	register_taxonomy_for_object_type('category','menus');
	
}
add_action('init', 'reg_cat');