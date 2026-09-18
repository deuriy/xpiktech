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
	} elseif (is_page('about-us')) {
		wp_enqueue_script('page', get_template_directory_uri() . '/js/about.js');
	} elseif (is_page('why-xpiktech')) {
		wp_enqueue_script('page', get_template_directory_uri() . '/js/why-xpiktech.js');
	} elseif (is_page('homepage-2')) {
		wp_enqueue_script('page', get_template_directory_uri() . '/js/homepage-2.js');
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
	register_block_type(get_template_directory() . '/blocks/hero-about-section');
	register_block_type(get_template_directory() . '/blocks/intro-section');
	register_block_type(get_template_directory() . '/blocks/steps-section');
	register_block_type(get_template_directory() . '/blocks/automation-solution-section');
	register_block_type(get_template_directory() . '/blocks/proven-result-section');
	register_block_type(get_template_directory() . '/blocks/text-blocks-section');
	register_block_type(get_template_directory() . '/blocks/timeline-section');
	register_block_type(get_template_directory() . '/blocks/tariff-section');
	register_block_type(get_template_directory() . '/blocks/hero-banner');
	register_block_type(get_template_directory() . '/blocks/statistics-running-line');
	register_block_type(get_template_directory() . '/blocks/geographic-coverage');
	register_block_type(get_template_directory() . '/blocks/expertise-section');
	register_block_type(get_template_directory() . '/blocks/what-we-build');
	register_block_type(get_template_directory() . '/blocks/stats-tile-section');
	register_block_type(get_template_directory() . '/blocks/quality-section');
	register_block_type(get_template_directory() . '/blocks/budget-section');
	register_block_type(get_template_directory() . '/blocks/how-we-work');
	register_block_type(get_template_directory() . '/blocks/faq-section');
	register_block_type(get_template_directory() . '/blocks/what-we-build-v2');
	register_block_type(get_template_directory() . '/blocks/team-statistics-section');
	register_block_type(get_template_directory() . '/blocks/technologies-section');
	register_block_type(get_template_directory() . '/blocks/why-clients-stay-section');
	register_block_type(get_template_directory() . '/blocks/running-systems-section');
	register_block_type(get_template_directory() . '/blocks/contact-form-section');
}
add_action('init', 'xpiktech_register_blocks');

add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('walker_nav_menu_start_el', function ($item_output, $item) {

    if (in_array('js-fancybox', $item->classes, true)) {
        $item_output = preg_replace(
            '/<a\b/',
            '<a data-fancybox',
            $item_output,
            1
        );
    }

    return $item_output;

}, 10, 2);

add_action('wp_head', function() {
	if ( is_page('why-xpiktech') ) {
		?>
		<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Organization",
			"name": "XPikTech",
			"url": "https://xpiktech.com/",
			"logo": "https://xpiktech.com/logo.png",
			"description": "AI Automation for eCommerce. Custom software, eCommerce and business process automation for small and medium businesses.",
			"slogan": "AI that grows with your business.",
			"email": "contact@xpiktech.com",
			"telephone": "+1-786-796-14-15",
			"areaServed": ["US", "CA", "Europe"],
			"contactPoint": {
				"@type": "ContactPoint",
				"telephone": "+1-786-796-14-15",
				"email": "contact@xpiktech.com",
				"contactType": "sales",
				"availableLanguage": ["en"]
			},
			"sameAs": [
				"https://www.linkedin.com/company/xpiktech",
				"https://t.me/xpiktech"
			]
		}
		</script>

		<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "FAQPage",
			"mainEntity": [
				{
					"@type": "Question",
					"name": "What does XPikTech build?",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "Quite a range, so it's a fair thing to ask. We're a custom software and eCommerce development company working with small and medium businesses across Europe, the US, and Canada. That covers custom software, online stores and store features, CRM and ERP integrations, and business process automation, plus AI tools like our Smart AI Catalog and AI Email Automation where they add real value. We've worked across eCommerce, logistics, retail, real estate, education, hospitality, and health and beauty."
					}
				},
				{
					"@type": "Question",
					"name": "Do you do everyday development, or only AI projects?",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "Both, and fairly evenly. A large part of what we do is everyday custom software and eCommerce development, CRM and ERP work, and automation. AI comes in when it makes the result better, so you're never paying for it just to have it on the page."
					}
				},
				{
					"@type": "Question",
					"name": "How do you keep a project on budget?",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "We agree an estimate up front, then track every billable hour with activity-based time tracking linked to Jira. You get access to the same tracker, so you can see exactly what's been worked on and what it cost whenever you like. If a task starts running long, a manager hears about it early and we talk it through with you rather than letting it drift."
					}
				},
				{
					"@type": "Question",
					"name": "Will the work affect my live website or systems?",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "We're careful here, since most of our clients are running active businesses. We build and test in separate environments before anything touches your live setup, and we keep watch around the clock so anything unexpected is caught quickly. Ideally your customers notice the improvements and nothing else."
					}
				},
				{
					"@type": "Question",
					"name": "Can you work with the tools and platform I already use?",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "Almost certainly. We connect to your existing setup, your CRM, ERP, eCommerce platform, marketplaces, or custom databases, through secure connections that leave what you've already got intact. You end up with something new and capable that still feels part of the system you know."
					}
				},
				{
					"@type": "Question",
					"name": "Are you a good fit for a smaller business?",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "Very much so, and plenty of our clients are exactly that. We work just as happily with a team of ten as with a large, established company, and we scope each project to suit your goals and budget. Whatever the size, you get the same direct access and the same care."
					}
				},
				{
					"@type": "Question",
					"name": "How do we get started?",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "A free consultation is the easiest first step. Tell us a little about your business and what you'd like to build or improve, and we'll come back with some practical ideas and a sense of how we'd approach it. There's no obligation, and you'll come away with something useful either way."
					}
				}
			]
		}
		</script>
		<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "BreadcrumbList",
			"itemListElement": [
				{
					"@type": "ListItem",
					"position": 1,
					"name": "Home",
					"item": "https://xpiktech.com/"
				},
				{
					"@type": "ListItem",
					"position": 2,
					"name": "Why XPikTech",
					"item": "https://xpiktech.com/why-xpiktech"
				}
			]
		}
		</script>
		<?php
	}
});
