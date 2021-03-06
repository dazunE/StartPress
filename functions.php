<?php
/**
 * StartPress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package StartPress
 */

if ( ! function_exists( 'start_press_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function start_press_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on StartPress, use a find and replace
	 * to change 'start-press' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'start-press', get_template_directory() . '/languages' );

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
		'main-nav' => esc_html__( 'Primary', 'start-press' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'start_press_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'sensei' );

	add_post_type_support( 'page','excerpt' );
}
endif;
add_action( 'after_setup_theme', 'start_press_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function start_press_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'start_press_content_width', 640 );
}
add_action( 'after_setup_theme', 'start_press_content_width', 0 );

/**
 * Nav item class filter
 *
*/

function start_press_nav_item_class( $classes , $item ) {

	$classes[] = 'nav-item';

	return $classes;
}

add_filter('nav_menu_css_class', 'start_press_nav_item_class', 10, 2 );

function start_press_nav_item_link_class ( $atts , $item , $args ) {

	$atts['class'] = 'nav-link';

	return $atts;
}

add_filter('nav_menu_link_attributes' , 'start_press_nav_item_link_class' , 10, 3 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function start_press_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'start-press' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'start-press' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'start_press_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function start_press_scripts() {

	wp_enqueue_style( 'bootstrap-4-alpha', get_stylesheet_directory_uri().'/css/bootstrap.min.css');

	wp_enqueue_style( 'animate-css' , get_stylesheet_directory_uri().'/css/animate.css');

	wp_enqueue_style( 'start-press-style', get_stylesheet_uri() );

	wp_enqueue_script('tether', get_stylesheet_directory_uri().'/js/tether.min.js', '201721', true);

	wp_enqueue_script( 'bootstrap-4-alpha', get_stylesheet_directory_uri(). '/js/bootstrap.min.js', array('jquery'), '2017112',true );

	wp_enqueue_script( 'start-press-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'start-press-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'wow-js', get_template_directory_uri().'/js/wow.min.js', array(), '201725', true );

	wp_enqueue_script( 'start-press', get_template_directory_uri() . '/js/main.js' , array('jquery') , '201721' , true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'start_press_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Sensei compatibility file.
 */

//require get_template_directory() . '/inc/theme-compatibility.php';

/**
 * Load Shortcodes
 */

require get_template_directory() . '/inc/shortcodes-master.php';

/**
* Load Meta Boxes
*/

