<?php
/**
 * Plugin Name: Infometry Custom Templates
 * Description: Adds the staging-safe “Home Design Test” page template for the Infometry enterprise homepage.
 * Version: 2.1.2
 * Author: Infometry
 * Text Domain: infometry-custom-templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'INFOMETRY_CT_VERSION', '2.1.2' );
define( 'INFOMETRY_CT_PATH', plugin_dir_path( __FILE__ ) );
define( 'INFOMETRY_CT_URL', plugin_dir_url( __FILE__ ) );
define( 'INFOMETRY_CT_HOME_TEMPLATE', 'templates/page-home-design-test.php' );
define( 'INFOMETRY_CT_CONVERSA_TEMPLATE', 'templates/page-infofiscus-conversa.php' );

/**
 * Expose the plugin template in the WordPress page-template selector.
 *
 * @param array $templates Available page templates.
 * @return array
 */
function infometry_ct_register_page_template( $templates ) {
	$templates[ INFOMETRY_CT_HOME_TEMPLATE ]     = __( 'Home Design Test', 'infometry-custom-templates' );
	$templates[ INFOMETRY_CT_CONVERSA_TEMPLATE ] = __( 'INFOFISCUS Conversa Product', 'infometry-custom-templates' );
	return $templates;
}
add_filter( 'theme_page_templates', 'infometry_ct_register_page_template' );

/**
 * Return the original page ID for normal, preview, revision, and autosave
 * requests. Builder/theme previews do not always make is_page_template()
 * reliable, so the template slug is resolved directly from the page record.
 *
 * @return int
 */
function infometry_ct_get_current_page_id() {
	$page_id = get_queried_object_id();

	if ( is_preview() && isset( $_GET['preview_id'] ) ) {
		$preview_id = absint( wp_unslash( $_GET['preview_id'] ) );
		if ( $preview_id ) {
			$page_id = $preview_id;
		}
	}

	if ( ! $page_id && isset( $GLOBALS['post']->ID ) ) {
		$page_id = absint( $GLOBALS['post']->ID );
	}

	$revision_parent = $page_id ? wp_is_post_revision( $page_id ) : false;
	if ( $revision_parent ) {
		$page_id = (int) $revision_parent;
	}

	$autosave_parent = $page_id ? wp_is_post_autosave( $page_id ) : false;
	if ( $autosave_parent ) {
		$page_id = (int) $autosave_parent;
	}

	return (int) $page_id;
}

/**
 * Decide whether the current page has selected this plugin template.
 *
 * @return bool
 */
function infometry_ct_should_use_home_template() {
	$page_id = infometry_ct_get_current_page_id();

	if ( ! $page_id || 'page' !== get_post_type( $page_id ) ) {
		return false;
	}

	return INFOMETRY_CT_HOME_TEMPLATE === get_page_template_slug( $page_id );
}

/**
 * Decide whether the current page has selected the Conversa product template.
 *
 * @return bool
 */
function infometry_ct_should_use_conversa_template() {
	$page_id = infometry_ct_get_current_page_id();

	if ( ! $page_id || 'page' !== get_post_type( $page_id ) ) {
		return false;
	}

	return INFOMETRY_CT_CONVERSA_TEMPLATE === get_page_template_slug( $page_id );
}

/**
 * Load the template from this plugin without modifying BeTheme.
 *
 * @param string $template Resolved template path.
 * @return string
 */
function infometry_ct_load_page_template( $template ) {
	if ( infometry_ct_should_use_home_template() ) {
		$plugin_template = INFOMETRY_CT_PATH . INFOMETRY_CT_HOME_TEMPLATE;
		if ( is_readable( $plugin_template ) ) {
			return $plugin_template;
		}
	}

	if ( infometry_ct_should_use_conversa_template() ) {
		$plugin_template = INFOMETRY_CT_PATH . INFOMETRY_CT_CONVERSA_TEMPLATE;
		if ( is_readable( $plugin_template ) ) {
			return $plugin_template;
		}
	}
	return $template;
}
add_filter( 'page_template', 'infometry_ct_load_page_template', PHP_INT_MAX );
add_filter( 'template_include', 'infometry_ct_load_page_template', PHP_INT_MAX );

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

	if ( infometry_ct_should_use_conversa_template() ) {
		$classes[] = 'infometry-conversa-product-page';
	}

	return array_unique( $classes );
}
add_filter( 'body_class', 'infometry_ct_body_classes' );

/**
 * Enqueue isolated assets only when “Home Design Test” is selected.
 */
function infometry_ct_enqueue_assets() {
	$use_home     = infometry_ct_should_use_home_template();
	$use_conversa = infometry_ct_should_use_conversa_template();

	if ( ! $use_home && ! $use_conversa ) {
		return;
	}

	if ( $use_home ) {
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

	if ( $use_conversa ) {
		$css_path    = INFOMETRY_CT_PATH . 'assets/css/infofiscus-conversa.css';
		$js_path     = INFOMETRY_CT_PATH . 'assets/js/infofiscus-conversa.js';
		$css_version = is_readable( $css_path ) ? (string) filemtime( $css_path ) : INFOMETRY_CT_VERSION;
		$js_version  = is_readable( $js_path ) ? (string) filemtime( $js_path ) : INFOMETRY_CT_VERSION;

		wp_enqueue_style(
			'infometry-infofiscus-conversa',
			INFOMETRY_CT_URL . 'assets/css/infofiscus-conversa.css',
			array(),
			$css_version
		);

		wp_enqueue_script(
			'infometry-infofiscus-conversa',
			INFOMETRY_CT_URL . 'assets/js/infofiscus-conversa.js',
			array(),
			$js_version,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'infometry_ct_enqueue_assets', 20 );
