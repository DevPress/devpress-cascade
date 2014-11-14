<?php
/**
 * Cascade functions and definitions
 *
 * @package Cascade
 */

/**
 * The current version of the theme.
 */
define( 'CASCADE_VERSION', '0.3.0' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 840; /* pixels */
}

if ( ! function_exists( 'cascade_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cascade_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Cascade, use a find and replace
	 * to change 'cascade' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cascade', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 874, 9999 );

	// Registers menu above the site title
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cascade' ),
		'secondary' => __( 'Secondary Menu', 'cascade' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'gallery', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cascade_custom_background_args', array(
		'default-color' => 'f7f7f7',
		'default-image' => '',
	) ) );

	// Theme layouts
	add_theme_support(
		'theme-layouts',
		array(
			'single-column' => __( '1 Column Wide', 'cascade' ),
			'single-column-narrow' => __( '1 Column Narrow', 'cascade' ),
			'sidebar-right' => __( '2 Columns: Content / Sidebar', 'cascade' ),
			'sidebar-left' => __( '2 Columns: Sidebar / Content', 'cascade' )
		),
		array( 'default' => is_rtl() ? 'sidebar-right' :'sidebar-left' )
	);
}
endif; // cascade_setup
add_action( 'after_setup_theme', 'cascade_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function cascade_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cascade' ),
		'id'            => 'primary',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget module %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'cascade' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


}
add_action( 'widgets_init', 'cascade_widgets_init' );

/**
 * Enqueue fonts.
 */
function cascade_fonts() {

	// Font options
	$fonts = array();

	// Site title font only required when logo not in use
	if ( ! get_theme_mod( 'logo', 0 ) ) :
		$fonts[0] = get_theme_mod( 'site-title-font', customizer_library_get_default( 'site-title-font' ) );
	endif;

	$fonts[1] = get_theme_mod( 'primary-font', customizer_library_get_default( 'primary-font' ) );
	$fonts[2] = get_theme_mod( 'secondary-font', customizer_library_get_default( 'secondary-font' ) );

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'cascade-body-fonts', $font_uri, array(), null, 'screen' );

	// Icon Font
	wp_enqueue_style( 'cascade-icons', get_template_directory_uri() . '/fonts/cascade-icons.css', array(), '0.1.0' );

}
add_action( 'wp_enqueue_scripts', 'cascade_fonts' );

/**
 * Enqueue scripts and styles.
 */
function cascade_scripts() {

	wp_enqueue_style(
		'cascade-style',
		get_stylesheet_uri(),
		array(),
		CASCADE_VERSION
	);

	// Use style-rtl.css for RTL layouts
	wp_style_add_data(
		'cascade-style',
		'rtl',
		'replace'
	);

	if ( SCRIPT_DEBUG || WP_DEBUG ) :

		wp_enqueue_script(
			'cascade-skip-link-focus-fix',
			get_template_directory_uri() . '/js/skip-link-focus-fix.js',
			array(),
			CASCADE_VERSION,
			true
		);

		wp_enqueue_script(
			'cascade-fitvids',
			get_template_directory_uri() . '/js/jquery.fitvids.js',
			array( 'jquery' ),
			CASCADE_VERSION,
			true
		);

		wp_enqueue_script(
			'cascade-global',
			get_template_directory_uri() . '/js/global.js',
			array( 'jquery', 'cascade-fitvids' ),
			CASCADE_VERSION,
			true
		);

	else :

		wp_enqueue_script(
			'cascade-scripts',
			get_template_directory_uri() . '/js/cascade.min.js',
			array( 'jquery' ),
			CASCADE_VERSION,
			true
		);

	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cascade_scripts' );

/**
 * Load placeholder polyfill for IE9 and older
 */
function cascade_placeholder_polyfill() {
    echo '<!--[if lte IE 9]><script src="' . get_template_directory_uri() . '/js/jquery-placeholder.js"></script><![endif]-->'. "\n";
}
add_action( 'wp_head', 'cascade_placeholder_polyfill' );


// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Helper library for the theme customizer.
require get_template_directory() . '/inc/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/inc/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/inc/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/inc/mods.php';

// Loop pagination
require get_template_directory() . '/inc/loop-pagination.php';

// Theme Layouts
require get_template_directory() . '/inc/theme-layouts.php';

// Theme Updater
function cascade_theme_updater() {
	require( get_template_directory() . '/inc/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'cascade_theme_updater' );