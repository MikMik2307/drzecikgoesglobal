<?php
/**
 * Plugin Name:       WBDM ACF Blocks
 * Plugin URI:        https://www.webdevdm.pl/
 * Description:       Plugin containing ACF Gutenberg blocks
 * Version:           2.0.0
 * Author:            Webdevdm
 * Author URI:        https://www.webdevdm.pl/
 * Text Domain:       wbdm-acf-blocks
 */

namespace Webdevdm\WBDM_ACF_Blocks;

if (!defined('WBDM_PATH')) {
    define('WBDM_PATH', plugin_dir_path(__FILE__));
}
if (!defined('WBDM_URL')) {
    define('WBDM_URL', plugin_dir_url(__FILE__));
}

//Import block files
require __DIR__ . '/index.php';

function register_scripts()
{
	// Main plugin styles and scripts
	wp_enqueue_style('WBDM-bundle', WBDM_URL . 'dist/css/bundle.css');
	wp_enqueue_script('WBDM-bundle', WBDM_URL . 'dist/js/bundle.js', ['jquery', 'acf']);
	wp_localize_script('WBDM-bundle', 'WBDM_loc', array(
		'ajax_url' => admin_url('admin-ajax.php')
	));

	// Google Fonts
	wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

	// ✅ Slick Carousel
	wp_enqueue_style('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], '1.8.1');
	wp_enqueue_style('slick-carousel-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', ['slick-carousel'], '1.8.1');
	wp_enqueue_script('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true);

	// ✅ AOS (Animate On Scroll)
	wp_enqueue_style('aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', [], '2.3.4');
	wp_enqueue_script('aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', [], '2.3.4', true);
}


add_action('wp_enqueue_scripts', __NAMESPACE__ . '\register_scripts');
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\register_scripts');

/* Loading texdomain */
function WBDM_load_plugin_textdomain()
{
    load_plugin_textdomain('wbdm-acf-blocks', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

add_action('init', __NAMESPACE__ . '\\WBDM_load_plugin_textdomain');
