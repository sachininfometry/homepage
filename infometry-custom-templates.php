<?php
/**
 * Plugin Name: Infometry Custom Templates
 * Description: Adds the staging-safe “Home Design Test” page template for the Infometry enterprise homepage.
 * Version: 2.0.0
 * Author: Infometry
 * Text Domain: infometry-custom-templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'INFOMETRY_CT_VERSION', '2.0.0' );
define( 'INFOMETRY_CT_PATH', plugin_dir_path( __FILE__ ) );
define( 'INFOMETRY_CT_URL', plugin_dir_url( __FILE__ ) );

/**
 * Expose the plugin template in the WordPress page-template selector.
 *
 * @param array $templates Available page templates.
 * @return array
 */
function infometry_ct_register_page_template( $templates ) {
	$templates['templates/page-home-design-test.php'] = __( 'Home Design Test', 'infometry-custom-templates' );
	return $templates;
}
add_filter( 'theme_page_templates', 'infometry_ct_register_page_template' );

/**
 * Decide whether the current page has selected this plugin template.
 *
 * @return bool
 */
function infometry_ct_should_use_home_template() {
	return is_page_template( 'templates/page-home-design-test.php' );
}

/**
 * Load the template from this plugin without modifying BeTheme.
 *
 * @param string $template Resolved template path.
 * @return string
 */
function infometry_ct_load_page_template( $template ) {
	if ( infometry_ct_should_use_home_template() ) {
		$plugin_template = INFOMETRY_CT_PATH . 'templates/page-home-design-test.php';
		if ( is_readable( $plugin_template ) ) {
			return $plugin_template;
		}
	}
	return $template;
}
add_filter( 'template_include', 'infometry_ct_load_page_template', 99 );

/**
 * Add a page-specific body class for safely scoping BeTheme overrides.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function infometry_ct_body_classes( $classes ) {
	if ( infometry_ct_should_use_home_template() ) {
		$classes[] = 'infometry-home-test-page';
	}
	return array_unique( $classes );
}
add_filter( 'body_class', 'infometry_ct_body_classes' );

/**
 * Enqueue isolated assets only when “Home Design Test” is selected.
 */
function infometry_ct_enqueue_assets() {
	if ( ! infometry_ct_should_use_home_template() ) {
		return;
	}

	$css_path    = INFOMETRY_CT_PATH . 'assets/css/home-design-test.css';
	$js_path     = INFOMETRY_CT_PATH . 'assets/js/home-design-test.js';
	$css_version = is_readable( $css_path ) ? (string) filemtime( $css_path ) : INFOMETRY_CT_VERSION;
	$js_version  = is_readable( $js_path ) ? (string) filemtime( $js_path ) : INFOMETRY_CT_VERSION;

	wp_enqueue_style(
		'infometry-home-design-test',
		INFOMETRY_CT_URL . 'assets/css/home-design-test.css',
		array(),
		$css_version
	);

	wp_enqueue_script(
		'infometry-home-design-test',
		INFOMETRY_CT_URL . 'assets/js/home-design-test.js',
		array(),
		$js_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'infometry_ct_enqueue_assets', 20 );
