<?php
/**
 * Holds the html template for the order tagging.
 *
 * Used in the main plugin file.
 *
 * @package WooCommerce Nosto Tagging
 * @since   1.0.0
 * @var array $order Assoc list that includes order_number, buyer and line_items
 */
?>

<?php if ( isset( $order ) && is_array( $order ) ): ?>
	<div class="nosto_purchase_order" style="display:none">
		<span class="order_number"><?php echo esc_html( $order['order_number'] ); ?></span>
		<?php if ( ! empty( $order['buyer'] ) ): ?>
			<div class="buyer">
				<span class="email"><?php echo esc_html( $order['buyer']['email'] ); ?></span>
				<?php if ( ! empty( $order['buyer']['first_name'] ) ): ?>
					<span class="first_name"><?php echo esc_html( $order['buyer']['first_name'] ); ?></span>
				<?php endif; ?>
				<span class="last_name"><?php echo esc_html( $order['buyer']['last_name'] ); ?></span>
			</div>
		<?php endif; ?>
		<div class="purchased_items">
			<?php foreach ( $order['line_items'] as $line_item ): ?>
				<div class="line_item">
					<span class="product_id"><?php echo esc_html( $line_item['product_id'] ); ?></span>
					<span class="quantity"><?php echo esc_html( $line_item['quantity'] ); ?></span>
					<span class="name"><?php echo esc_html( $line_item['name'] ); ?></span>
					<span class="unit_price"><?php echo esc_html( $line_item['unit_price'] ); ?></span>
					<span class="price_currency_code">
						<?php echo esc_html( $line_item['price_currency_code'] ); ?>
					</span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
