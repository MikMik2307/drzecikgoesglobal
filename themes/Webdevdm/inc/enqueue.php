<?php
/**
 * Understrap enqueue scripts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts()
	{
		// Get the theme data.
		$the_theme = wp_get_theme();
		$theme_version = $the_theme->get('Version');
		$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap4');
		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		// Grab asset urls.
		$theme_styles = "/dist/styles/main{$suffix}.css";
		$theme_scripts = "/dist/scripts/main{$suffix}.js";

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . $theme_styles); // @phpstan-ignore-line -- file exists
		wp_enqueue_style('understrap-styles', get_template_directory_uri() . $theme_styles, array(), $css_version);

		wp_enqueue_script('jquery');

		$js_version = $theme_version . '.' . filemtime(get_template_directory() . $theme_scripts); // @phpstan-ignore-line -- file exists
		wp_enqueue_script('understrap-scripts', get_template_directory_uri() . $theme_scripts, array(), $js_version, true);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');

if (!function_exists('understrap_offcanvas_admin_bar_inline_styles')) {
	/**
	 * Add inline styles for the offcanvas component if the admin bar is visibile.
	 *
	 * Fixes that the offcanvas close icon is hidden behind the admin bar.
	 *
	 * @since 1.2.0
	 */
	function understrap_offcanvas_admin_bar_inline_styles()
	{
		$navbar_type = get_theme_mod('understrap_navbar_type', 'collapse');
		if ('offcanvas' !== $navbar_type) {
			return;
		}

		$css = '
		body.admin-bar .offcanvas.show  {
			margin-top: 32px;
		}
		@media screen and ( max-width: 782px ) {
			body.admin-bar .offcanvas.show {
				margin-top: 46px;
			}
		}';
		wp_add_inline_style('understrap-styles', $css);
	}
}
