<?php

/**
 * Engress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Engress
 */

if (!defined('_S_VERSION')) {
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
function engress_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Engress, use a find and replace
		* to change 'engress' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('engress', get_template_directory() . '/languages');

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
			'menu-1' => esc_html__('Primary', 'engress'),
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
			'engress_custom_background_args',
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
add_action('after_setup_theme', 'engress_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function engress_content_width()
{
	$GLOBALS['content_width'] = apply_filters('engress_content_width', 640);
}
add_action('after_setup_theme', 'engress_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function engress_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'engress'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'engress'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'footer',
			'id'            => 'footer-1',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'engress_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function engress_scripts()
{
	wp_enqueue_style('engress-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('engress-style', 'rtl', 'replace');

	wp_enqueue_script('engress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'engress_scripts');

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

// コンソールに出るマイグレイトの表示を消す
function remove_jquery_migrate_notice()
{
	$m = $GLOBALS['wp_scripts']->registered['jquery-migrate'];
	$m->extra['before'][] = 'temp_jm_logconsole = window.console.log; window.console.log=null;';
	$m->extra['after'][] = 'window.console.log=temp_jm_logconsole;';
}
add_action('init', 'remove_jquery_migrate_notice', 5);


// スラッグを自動で'カスタム投稿タイプ名'-'投稿ID'
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
	if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
		$slug = utf8_uri_encode($post_type) . '-' . $post_ID;
	}
	return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);


add_action('init', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	// メニューをサポート
	register_nav_menus([
		'global_nav' => 'グローバルナビゲーション',
	]);


	// カスタム投稿タイプ
	register_post_type('success', [
		'label' => '成功事例',
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-awards',
		'supports' => ['thumbnail', 'title', 'editor', 'custom-fields'],
	]);

	register_post_type('news', [
		'label' => 'お知らせ',
		'public' => true,
		'menu_position' => 5,
		'has_archive' => true,
		'menu_icon' => 'dashicons-text-page',
		'supports' => ['thumbnail', 'title', 'editor', 'custom-fields'],
	]);

	register_post_type('price-setting', [
		'label' => 'コース・料金',
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-money-alt',
		'supports' => ['thumbnail', 'title', 'editor', 'custom-fields'],
	]);
});

// 投稿のアーカイブページ
function post_has_archive($args, $post_type)
{

	if ('post' == $post_type) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'blogs'; //任意のスラッグ名
	}
	return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// アーカイブの表示件数変更
function change_posts_per_page($query)
{
	if (is_admin() || !$query->is_main_query())
		return;

	if ($query->is_archive()) { /* アーカイブページの時に表示件数を10件にセット */
		$query->set('posts_per_page', '10');
	}
}
add_action('pre_get_posts', 'change_posts_per_page');

// 投稿の内容が多いときの文末を指定
function new_excerpt_more($more)
{
	if (!is_archive()) {
		return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">...　＜続きを読む＞</a>';
	} else {
		return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '"></a>';
	}
}
add_filter('excerpt_more', 'new_excerpt_more');

// 抜粋の長さ変更
function custom_excerpt_length($length)
{
	if (!is_archive()) {
		return 20;
	} else {
		return 100;
	}
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// ページネーション
function custom_posts_pagination($page, $args)
{
	if ($page !== true) {
		$max_pages = $page;
	} else {
		global $wp_query;
		$max_pages = $wp_query->max_num_pages;
	}
	echo
	preg_replace('<div class="nav-links">', 'div style="width: calc(50px * ' . $max_pages . ' + 20px * ' . ($max_pages - 1) . ');" class="nav-links"', get_the_posts_pagination($args));
}

// カテゴリー多いとき「etc...」をつける
function category_etc($count) {
	$args = [];
	for ($i = 0; $i <= 0; $i++) {
		$args[$i] = $i;
	}
	$end = end($args);
	for ($i = 0; $i <= 0; $i++) :
		if (get_the_category()[$i]) :
			echo get_the_category()[$i]->name;
		endif;
	endfor;
}