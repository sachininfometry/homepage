<?php
/**
 * Plugin Name: Infometry Custom Templates
 * Description: Provides isolated Infometry homepage and INFOFISCUS Conversa page templates.
 * Version: 2.1.8
 * Author: Infometry
 * Text Domain: infometry-custom-templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'INFOMETRY_CT_VERSION', '2.1.8' );
define( 'INFOMETRY_CT_PATH', plugin_dir_path( __FILE__ ) );
define( 'INFOMETRY_CT_URL', plugin_dir_url( __FILE__ ) );
define( 'INFOMETRY_CT_HOME_TEMPLATE', 'templates/page-home-design-test.php' );
define( 'INFOMETRY_CT_CONVERSA_TEMPLATE', 'templates/page-infofiscus-conversa.php' );
define( 'INFOMETRY_CT_CONVERSA_FORM_ID', 379751 );

/**
 * Expose both plugin templates in the WordPress page-template selector.
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
 * Resolve the original page ID for normal, preview, revision, and autosave requests.
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
 * Check whether a page has selected a particular plugin template.
 *
 * @param string $template_slug Template slug.
 * @return bool
 */
function infometry_ct_should_use_template( $template_slug ) {
	$page_id = infometry_ct_get_current_page_id();

	if ( ! $page_id || 'page' !== get_post_type( $page_id ) ) {
		return false;
	}

	return $template_slug === get_page_template_slug( $page_id );
}

/**
 * Decide whether the homepage template is active.
 *
 * @return bool
 */
function infometry_ct_should_use_home_template() {
	return infometry_ct_should_use_template( INFOMETRY_CT_HOME_TEMPLATE );
}

/**
 * Decide whether the Conversa product template is active.
 *
 * @return bool
 */
function infometry_ct_should_use_conversa_template() {
	return infometry_ct_should_use_template( INFOMETRY_CT_CONVERSA_TEMPLATE );
}

/**
 * Load the selected template from this plugin without modifying BeTheme.
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
 * Add page-specific body classes for safely scoped styling.
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
 * Add the custom scheduling fields inside the existing WPForms form.
 *
 * @param array   $form_data Processed WPForms form data.
 * @param WP_Post $form      WPForms form post.
 */
function infometry_ct_render_conversa_form_fields( $form_data, $form ) {
	if (
		! infometry_ct_should_use_conversa_template()
		|| INFOMETRY_CT_CONVERSA_FORM_ID !== absint( $form_data['id'] )
	) {
		return;
	}
	?>
	<div class="icp-demo-form-head">
		<strong><?php esc_html_e( 'Request your personalized demo', 'infometry-custom-templates' ); ?></strong>
		<p><?php esc_html_e( 'Share your details and our analytics team will connect with you.', 'infometry-custom-templates' ); ?></p>
	</div>
	<div class="icp-form-row icp-demo-preferences">
		<label>
			<?php esc_html_e( 'Preferred Demo Date', 'infometry-custom-templates' ); ?>
			<input type="hidden" name="infometry_conversa[preferred_demo_date]" data-icp-demo-date value="">
			<input type="text" data-icp-demo-date-display readonly required>
		</label>
		<label>
			<?php esc_html_e( 'Preferred Demo Time', 'infometry-custom-templates' ); ?> <span>*</span>
			<input type="time" name="infometry_conversa[preferred_demo_time]" data-icp-demo-time required>
		</label>
	</div>
	<label class="icp-demo-company">
		<?php esc_html_e( 'Company', 'infometry-custom-templates' ); ?>
		<input type="text" name="infometry_conversa[company]" autocomplete="organization">
	</label>
	<?php
}
add_action( 'wpforms_frontend_output', 'infometry_ct_render_conversa_form_fields', 10, 2 );

/**
 * Include the custom schedule fields in the existing WPForms notification.
 *
 * WPForms Lite sends notifications but does not store entries, so appending
 * these values to the normal notification keeps every submitted field together.
 *
 * @param array $email           Notification attributes.
 * @param array $fields          Processed WPForms fields.
 * @param array $entry           Raw entry data.
 * @param array $form_data       Processed form data.
 * @param int   $notification_id Notification ID.
 * @return array
 */
function infometry_ct_add_conversa_fields_to_notification( $email, $fields, $entry, $form_data, $notification_id ) {
	if ( INFOMETRY_CT_CONVERSA_FORM_ID !== absint( $form_data['id'] ) ) {
		return $email;
	}

	$details = isset( $_POST['infometry_conversa'] ) && is_array( $_POST['infometry_conversa'] )
		? wp_unslash( $_POST['infometry_conversa'] )
		: array();

	$date    = isset( $details['preferred_demo_date'] ) ? sanitize_text_field( $details['preferred_demo_date'] ) : '';
	$time    = isset( $details['preferred_demo_time'] ) ? sanitize_text_field( $details['preferred_demo_time'] ) : '';
	$company = isset( $details['company'] ) ? sanitize_text_field( $details['company'] ) : '';

	$extra = '<h3>' . esc_html__( 'Demo preferences', 'infometry-custom-templates' ) . '</h3>';
	$extra .= '<p><strong>' . esc_html__( 'Preferred Demo Date:', 'infometry-custom-templates' ) . '</strong> ' . esc_html( $date ?: 'Not provided' ) . '<br>';
	$extra .= '<strong>' . esc_html__( 'Preferred Demo Time:', 'infometry-custom-templates' ) . '</strong> ' . esc_html( $time ?: 'Not provided' ) . '<br>';
	$extra .= '<strong>' . esc_html__( 'Company:', 'infometry-custom-templates' ) . '</strong> ' . esc_html( $company ?: 'Not provided' ) . '</p>';

	$email['message'] .= $extra;

	return $email;
}
add_filter( 'wpforms_entry_email_atts', 'infometry_ct_add_conversa_fields_to_notification', 10, 5 );

/**
 * Print critical Conversa overrides before cached/minified assets load.
 */
function infometry_ct_print_conversa_critical_css() {
	if ( ! infometry_ct_should_use_conversa_template() ) {
		return;
	}
	?>
	<style id="infometry-conversa-critical-css">
		body.infometry-conversa-product-page #Footer,
		body.infometry-conversa-product-page #Footer_wrapper,
		body.infometry-conversa-product-page .mfn-footer,
		body.infometry-conversa-product-page footer#Footer,
		body.infometry-conversa-product-page #mfn-rev-slider,
		body.infometry-conversa-product-page .mfn-rev-slider,
		body.infometry-conversa-product-page rs-module-wrap,
		body.infometry-conversa-product-page .forcefullwidth_wrapper_tp_banner,
		body.infometry-conversa-product-page .rev_slider_wrapper,
		body.infometry-conversa-product-page [id^="rev_slider_"][id$="_wrapper"],
		body.infometry-conversa-product-page [id^="rev_slider_"][id$="_forcefullwidth"] {
			display: none !important;
			height: 0 !important;
			min-height: 0 !important;
			padding: 0 !important;
			margin: 0 !important;
			overflow: hidden !important;
		}
		body.infometry-conversa-product-page .infometry-conversa-product .icp-product-footer {
			display: block !important;
			height: auto !important;
			min-height: 0 !important;
			overflow: hidden;
		}
		body.infometry-conversa-product-page .infometry-conversa-product .icp-shell {
			width: min(100% - 64px, 1400px);
		}
		body.infometry-conversa-product-page .infometry-conversa-product .icp-hero-grid {
			grid-template-columns: minmax(520px, .82fr) minmax(660px, 1.18fr);
			gap: 72px;
			padding-top: 126px;
		}
		body.infometry-conversa-product-page .infometry-conversa-product .icp-hero h1 {
			max-width: 640px;
		}
		@media (max-width: 1280px) {
			body.infometry-conversa-product-page .infometry-conversa-product .icp-hero-grid {
				grid-template-columns: 1fr;
			}
		}
		@media (max-width: 860px) {
			body.infometry-conversa-product-page .infometry-conversa-product .icp-shell {
				width: min(100% - 32px, 1180px);
			}
			body.infometry-conversa-product-page .infometry-conversa-product .icp-hero-grid {
				gap: 34px;
				padding-top: 118px;
			}
		}
	</style>
	<?php
}
add_action( 'wp_head', 'infometry_ct_print_conversa_critical_css', 1 );

/**
 * Enqueue isolated assets only for the currently selected plugin template.
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
