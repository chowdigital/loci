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
function cloudsdale_master_enqueue_styles() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), null);

    // Enqueue custom minified style after Bootstrap
    wp_enqueue_style('clousedale-minified-style', get_theme_file_uri('style.min.css'), array('bootstrap'), '2.0');

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '5.0.2', true);

    // Enqueue other scripts
    wp_enqueue_script('cloudsdale-master-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.1', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array(), '1.5', true);
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/metabox.js', array('jquery'), '1.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cloudsdale_master_enqueue_styles');

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
	
   // Setting for History Page Image
$wp_customize->add_setting('history_page_image', array(
    'default' => '',
    'transport' => 'refresh',
));

// Control for History Page Image
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'history_page_image', array(
    'label' => 'History Page Image',
    'section' => 'custom_images_section',
    'settings' => 'history_page_image',
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

/* Allow editor to edit customizations */
function customize_editor_role_and_menu() {
    // Grant 'edit_theme_options' capability to Editor role.
    $role = get_role('editor');
    if ($role) {
        $role->add_cap('edit_theme_options');
    }
}

add_action('init', 'customize_editor_role_and_menu');

function adjust_appearance_menu_for_editors() {
    // Check if the current user is an Editor and not an Administrator.
    if (!current_user_can('administrator') && current_user_can('editor')) {
        // Remove all submenu items from the Appearance section
        global $submenu;
        unset($submenu['themes.php']);

        // Allow access only to Customizer
        add_submenu_page('themes.php', 'Customize', 'Customize', 'edit_theme_options', 'customize.php');
    }
}

// It's crucial to hook this with a priority high enough that it runs after all other menu items have been added.
add_action('admin_menu', 'adjust_appearance_menu_for_editors', 999);

/* Remove Tools and Comments from the dashboard */
function remove_menus_for_editors() {
    // Check if the current user is an Editor and not an Administrator.
    if (!current_user_can('administrator') && current_user_can('editor')) {
        remove_menu_page('edit-comments.php'); // Comments
        remove_menu_page('tools.php');         // Tools
    }
}

add_action('admin_init', 'remove_menus_for_editors');

/* Remove Comments link from the WordPress Multisite admin bar */
function remove_multisite_comments_link($wp_admin_bar) {
    // Check if the user is an Editor and not an Administrator.
    if (!current_user_can('administrator') && current_user_can('editor')) {
        // Remove the Comments menu from the admin bar.
        $wp_admin_bar->remove_node('comments');

        // Loop through each blog if it's a multisite.
        if (is_multisite()) {
            $blogs = get_blogs_of_user(get_current_user_id());
            foreach ($blogs as $blog) {
                // Construct the node ID and remove it.
                $node_id = 'blog-' . $blog->userblog_id . '-c'; // ID for the Manage Comments link
                $wp_admin_bar->remove_node($node_id);
            }
        }
    }
}

add_action('admin_bar_menu', 'remove_multisite_comments_link', 100);


/*
====== Metaboxes 
*/
require_once get_template_directory() . '/functions/metaboxes.php';

/*
====== Google Tag
*/


// Add Google Tag (gtag.js) to all pages
function add_google_tag() {
    ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3TM4FLFPQ1"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-3TM4FLFPQ1');
</script>
<!-- Hotjar Tracking Code for Loci -->
<script>
(function(h, o, t, j, a, r) {
    h.hj = h.hj || function() {
        (h.hj.q = h.hj.q || []).push(arguments)
    };
    h._hjSettings = {
        hjid: 5023390,
        hjsv: 6
    };
    a = o.getElementsByTagName('head')[0];
    r = o.createElement('script');
    r.async = 1;
    r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
    a.appendChild(r);
})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
</script>
<?php
}
add_action('wp_head', 'add_google_tag');