<?php

/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if (!function_exists('understrap_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts()
	{
		// Get the theme data.
		$the_theme = wp_get_theme();
		$theme_version = $the_theme->get('Version');

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
		wp_enqueue_style('understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $css_version);

		wp_enqueue_script('jquery');
		wp_enqueue_script('popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), $theme_version, true);
		wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js', array(), '', true);




		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');
		wp_enqueue_script('understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');

// Enqueue Admin script
if (!function_exists('nampil_admin_scripts')) {
	function nampil_admin_scripts()
	{
		wp_register_style('lat_admin_css', get_template_directory_uri() . '/css/nampil-lat-admin.css', array(), '1.0.0', 'all');
		wp_enqueue_style('lat_admin_css');
		wp_enqueue_media();
		wp_register_script('nampil_admin_script', get_template_directory_uri() . '/js/nampil_admin.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('nampil_admin_script');
	}
}
add_action('admin_enqueue_scripts', 'nampil_admin_scripts');