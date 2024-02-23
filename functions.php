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
	wp_enqueue_style('clousedale-minified-style', get_theme_file_uri('style.min.css') , array(), $ver = 1.9 );
	wp_style_add_data( 'cloudsdale-master-style', 'rtl', 'replace' );
    wp_enqueue_script( 'Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true );

	wp_enqueue_script( 'cloudsdale-master-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.1', true );
	// wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/simpleParallax.min.js', array(), CLOUDSDALE_MASTER_VERSION, true );

	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(),'1.3', true );

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
    
	  // Section for Custom Images
	  $wp_customize->add_section('custom_images_section', array(
        'title' => 'Custom Page Images',
        'priority' => 33,
    ));

    // Setting for Food & Drink Page Image
    $wp_customize->add_setting('food_drink_page_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Control for Food & Drink Page Image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'food_drink_page_image', array(
        'label' => 'Food & Drink Page Image',
        'section' => 'custom_images_section',
        'settings' => 'food_drink_page_image',
    )));

    // Setting for What's On Page Image
    $wp_customize->add_setting('whats_on_page_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Control for What's On Page Image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'whats_on_page_image', array(
        'label' => 'What\'s On Page Image',
        'section' => 'custom_images_section',
        'settings' => 'whats_on_page_image',
    )));
	

		
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
$contact_info_fields = array('address', 'map', 'phone', 'email', 'instagram');
foreach ($contact_info_fields as $info_field) {
    $default_value = '';

    if ($info_field === 'email') {
        $default_value = 'example@example.com'; // Default email
    } elseif ($info_field === 'phone') {
        $default_value = '+1234567890'; // Default phone number
    }
	$label = ($info_field === 'map') ? 'Enter Google Maps URL' : ucfirst($info_field) . ' Contact Info';
	$label = ($info_field === 'instagram') ? 'Enter Instagram URL' : ucfirst($info_field) . ' Contact Info';

	$wp_customize->add_setting('contact_info_' . $info_field, array(
		'default' => $default_value,
	));

	$wp_customize->add_control('contact_info_' . $info_field, array(
		'label' => $label,
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
            'show_in_nav_menus' => true, 		

	
 
        )
    );
		
	
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_again' );

// Add a no follow to menus pages so all menu info can be in the archive 

function add_noindex_to_menus_post_type() {
    // Check if on a single post of the 'menus' custom post type
    if (is_singular('menus')) {
        // Adding the noindex, follow meta tag to the head section of the page
        echo '<meta name="robots" content="noindex, follow">';
    }
}

add_action('wp_head', 'add_noindex_to_menus_post_type');
/* MENUS END*/


/**
 * Add Catagoies to custom menu section
 */

function reg_cat() {
	register_taxonomy_for_object_type('category','menus');
	
}
add_action('init', 'reg_cat');

/* Allow editor to edit custimisations */

function customize_editor_role_and_menu() {
    // Grant 'edit_theme_options' capability to Editor role.
    $role = get_role('editor');
    $role->add_cap('edit_theme_options');

    // Remove unnecessary items from the Appearance menu for editors.
    function remove_appearance_options_for_editors() {
        // Check if the current user is an Editor.
        if (!current_user_can('administrator') && current_user_can('editor')) {
            // Remove menu items from the Appearance section.
            remove_submenu_page('themes.php', 'themes.php'); // Themes
            remove_submenu_page('themes.php', 'widgets.php'); // Widgets
            remove_submenu_page('themes.php', 'nav-menus.php'); // Menus
            remove_submenu_page('themes.php', 'theme-editor.php'); // Theme Editor
        }
    }

    add_action('admin_menu', 'remove_appearance_options_for_editors', 101); // Execute after default items are added
}

add_action('init', 'customize_editor_role_and_menu');

/* END - Allow editor to edit custimisations */