<?php

/**
 * xpiktech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package xpiktech
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function xpiktech_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on xpiktech, use a find and replace
		* to change 'xpiktech' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('xpiktech', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'xpiktech'),
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
			'xpiktech_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'xpiktech_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xpiktech_content_width()
{
	$GLOBALS['content_width'] = apply_filters('xpiktech_content_width', 640);
}
add_action('after_setup_theme', 'xpiktech_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xpiktech_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'xpiktech'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'xpiktech'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'xpiktech_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function xpiktech_scripts()
{
	wp_enqueue_style('xpiktech-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('xpiktech-style', 'rtl', 'replace');

	wp_enqueue_script('xpiktech-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js');

	if (is_front_page()) {
		wp_enqueue_script('index', get_template_directory_uri() . '/js/index.js');
	}
}
add_action('wp_enqueue_scripts', 'xpiktech_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Allow SVG files uploading
add_filter('upload_mimes', function ($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
});

function is_svg_by_attachment_id($attachment_id)
{
	$mime = get_post_mime_type($attachment_id);
	return $mime === 'image/svg+xml';
}

function get_svg_inline_by_id($attachment_id)
{
	$path = get_attached_file($attachment_id);
	if (!file_exists($path)) return '';

	return file_get_contents($path);
}

function xpiktech_register_blocks()
{
	register_block_type(get_template_directory() . '/blocks/hero-section');
	register_block_type(get_template_directory() . '/blocks/activity-section');
	register_block_type(get_template_directory() . '/blocks/banner-section');
	register_block_type(get_template_directory() . '/blocks/info-slider-section');
	register_block_type(get_template_directory() . '/blocks/testimonials-section');
	register_block_type(get_template_directory() . '/blocks/statistics-section');
	register_block_type(get_template_directory() . '/blocks/advantages-section');
	register_block_type(get_template_directory() . '/blocks/contacts-section');
}
add_action('init', 'xpiktech_register_blocks');
