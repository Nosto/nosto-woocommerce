<?php
/**
 * Holds the html template for the customer tagging.
 *
 * Used in the main plugin file.
 *
 * @package WooCommerce Nosto Tagging
 * @since   1.0.0
 * @var array $customer Assoc list that includes first_name (optional), last_name, email
 */
?>

<?php if ( isset( $customer ) && is_array( $customer ) ): ?>
	<div class="nosto_customer" style="display:none">
		<span class="email"><?php echo esc_html( $customer['email'] ); ?></span>
		<?php if ( ! empty( $customer['first_name'] ) ): ?>
			<span class="first_name"><?php echo esc_html( $customer['first_name'] ); ?></span>
		<?php endif; ?>
		<span class="last_name"><?php echo esc_html( $customer['last_name'] ); ?></span>
	</div>
<?php endif; ?>
