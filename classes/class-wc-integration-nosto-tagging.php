<?php
/**
 * This file contains the class WC_Integration_Nosto_Tagging, that integrates the
 * Nosto Tagging plugin admin settings page into WooCommerce.
 *
 * @package WooCommerce Nosto Tagging
 */

/**
 * Nosto Tagging Integration.
 *
 * This class includes and manages the admin settings page for the plugin.
 * The page is added to "WooCommerce->Settings->Integration->Nosto Tagging".
 *
 * @since 1.0.0
 */
class WC_Integration_Nosto_Tagging extends WC_Integration
{
	/**
	 * Default server address for the Nosto marketing automation service.
	 * Used on plugin config page.
	 *
	 * @since 1.0.0
	 */
	const DEFAULT_SERVER_ADDRESS = 'connect.nosto.com';

	/**
	 * Constructor.
	 *
	 * Init and hook in the integration.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->id                 = 'nosto_tagging';
		$this->method_title       = 'Nosto Tagging';
		$this->method_description = __( 'Implements the required tagging blocks for using Nosto marketing automation service.' );

		$this->init_form_fields();
		$this->init_settings();

		add_action( 'woocommerce_update_options_integration_nosto_tagging', array( $this, 'process_admin_options' ) );
		add_filter( 'plugin_action_links', array( $this, 'register_action_links' ), 10, 2 );
	}

	/**
	 * Initialize settings form fields.
	 *
	 * Adds three settings:
	 * - server address (text)
	 * - account id (text)
	 * - use default Nosto element (radio; yes/no)
	 *
	 * @since 1.0.0
	 */
	function init_form_fields() {
		$this->form_fields = array(
			/*'server_address'       => array(
				'title'       => __( 'Server Address' ),
				'description' => __( 'The server address for the Nosto marketing automation service.' ),
				'type'        => 'text',
				'default'	  => self::DEFAULT_SERVER_ADDRESS,
			),*/
			'account_id'           => array(
				'title'       => __( 'Account ID' ),
				'description' => __( 'Your Nosto marketing automation service account id.' ),
				'type'        => 'text',
				'default'	  => '',
			),
			'use_default_elements' => array(
				'title'       => __( 'Use default Nosto elements' ),
				'description' => __( 'Use default Nosto elements for showing product recommendations.' ),
				'type'        => 'radio',
				'default'	  => 1,
				'options'     => array(
					array(
						'label'        => __( 'Yes' ),
						'html_options' => array(
							'id'    => 'yes',
							'value' => 1,
						),
					),
					array(
						'label'        => __( 'No' ),
						'html_options' => array(
							'id'    => 'no',
							'value' => 0,
						),
					),
				),
			),
		);
	}

	/**
	 * Generate radio button HTML.
	 *
	 * @since 1.0.0
	 * @param string $key  The name for the radio buttons
	 * @param array  $data Data to create the html from
	 * @return string
	 */
	public function generate_radio_html( $key, $data ) {
		$html = '';

		$title       = isset( $data['title'] ) ? $data['title'] : '';
		$description = isset( $data['description'] ) ? $data['description'] : '';
		$options     = isset( $data['options'] ) ? $data['options'] : array();

		$html .= '<tr valign="top">';

		$html .= '<th scope="row" class="titledesc">';
		$html .= esc_html( $title );
		$html .= '</th>';

		$html .= '<td class="forminp">';
		$html .= '<fieldset><legend class="screen-reader-text"><span>';
		$html .= esc_html( $title );
		$html .= '</span></legend>';

		$prefix = $this->plugin_id . $this->id . '_' . $key;
		$default_option = $this->get_option( $key, 0 );

		foreach ( $options as $i => $option ) {
			$label        = isset( $option['label'] ) ? $option['label'] : '';
			$html_options = isset( $option['html_options'] ) ? $option['html_options'] : array();

			$html_options['id']   = $prefix . '_' . ( isset( $html_options['id'] ) ? $html_options['id'] : $i );
			$html_options['name'] = $prefix;

			$html .= '<label for="' . esc_attr( $html_options['id'] ) . '">' . esc_html( $label ) . '</label>';
			$html .= '&nbsp;';
			$html .= '<input type="radio"';
			foreach ( $html_options as $key => $value ) {
				$html .= ' ' . $key . '="' . esc_attr( $value ) . '"';
			}
			if ( isset( $html_options['value'] ) ) {
				$html .= checked( $html_options['value'], $default_option, false );
			}
			$html .= ' />';
			$html .= '&nbsp;';
		}

		if ( ! empty( $description ) ) {
			$html .= '<p class="description">' . esc_html( $description ) . '</p>';
		}

		$html .= '</fieldset>';
		$html .= '</td>';

		$html .= '</tr>';

		return $html;
	}

	/**
	 * Validate Text Fields.
	 *
	 * WooCommerce does not allow us to show an error message to the user
	 * if incorrect data is entered, so we just sanitize the server address
	 * and account id before saving.
	 *
	 * If proper error handling is needed, we need to move the plugin settings page
	 * outside the WooCommerce settings structure. Then we can use the WordPress
	 * Settings API that supports error handling.
	 *
	 * @since 1.0.0
	 * @param string $key The name of the field as defined in init_form_fields()
	 * @return string
	 */
	public function validate_text_field( $key ) {
		$text = parent::validate_text_field( $key );

		switch ( $key ) {
			case 'server_address':
				// Sanitize url, allow only http and https.
				$text = esc_url_raw( $text, array( 'http', 'https' ) );
				if ( empty( $text ) ) {
					// The given url was not valid.
					// Apply the default url.
					$text = self::DEFAULT_SERVER_ADDRESS;
				} else {
					// Remove the protocol, we do not want it in the url.
					$text = preg_replace( '@^https?://@i', '', $text );
				}
				break;

			default;
				// Nothing to do.
		}

		return $text;
	}

	/**
	 * Adds this class as an WooCommerce integration.
	 *
	 * @since 1.0.0
	 * @param array $integrations List of integration class names to add
	 * @return array
	 */
	public static function add_integration( $integrations = array() ) {
		$integrations[] = __CLASS__;
		return $integrations;
	}

	/**
	 * Registers action links for the plugin.
	 *
	 * Add a shortcut link to the settings page.
	 *
	 * @since 1.0.0
	 * @param array  $links       Array of already defined links
	 * @param string $plugin_file The plugin base name
	 * @return array
	 */
	public function register_action_links( $links, $plugin_file ) {
		if ( $plugin_file === WC_Nosto_Tagging::get_instance()->get_plugin_name() ) {
			$url     = admin_url( 'admin.php?page=wc-setting&tab=integration&section=nosto_tagging' );
			$links[] = '<a href="' . esc_attr( $url ) . '">' . esc_html__( 'Settings' ) . '</a>';
		}
		return $links;
	}
}
