<?php
/**
 * Holds the html template for the shopping cart tagging.
 *
 * Used in the main plugin file.
 *
 * @package WooCommerce Nosto Tagging
 * @since   1.0.0
 * @var array $line_items List of items that include product_id, quantity, name, unit_price and price_currency_code
 */
?>

<?php if ( isset( $line_items ) && is_array( $line_items ) ): ?>
	<div class="nosto_cart" style="display:none">
		<?php foreach ( $line_items as $line_item ): ?>
			<div class="line_item">
				<span class="product_id"><?php echo esc_html( $line_item['product_id'] ); ?></span>
				<span class="quantity"><?php echo esc_html( $line_item['quantity'] ); ?></span>
				<span class="name"><?php echo esc_html( $line_item['name'] ); ?></span>
				<span class="unit_price"><?php echo esc_html( $line_item['unit_price'] ); ?></span>
				<span class="price_currency_code"><?php echo esc_html( $line_item['price_currency_code'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
