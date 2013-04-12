<?php
/**
 * Holds the html template for the shopping cart tagging.
 *
 * Used in the Nosto Tagging widget class.
 *
 * @package WooCommerce Nosto Tagging
 * @since   1.0.0
 * @var string $nosto_id_field_id   The field id for the nosto id input field
 * @var string $nosto_id_field_name The field name for the nosto id input field
 * @var string $nosto_id            The nosto id
 */
?>

<p>
	<label for="<?php echo esc_attr( $nosto_id_field_id ); ?>"><?php esc_html_e( 'Nosto ID:' ); ?></label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $nosto_id_field_id ); ?>"
		   name="<?php echo esc_attr( $nosto_id_field_name ); ?>" value="<?php echo esc_attr( $nosto_id ); ?>" />
	<span class="description">
		<?php esc_html_e( 'Must begin with a letter (a-z), and may be followed by any number of letters (a-z),
				digits (0-9), hyphens ("-"), underscores ("_"), colons (":"), and periods (".")' ); ?>
	</span>
</p>
