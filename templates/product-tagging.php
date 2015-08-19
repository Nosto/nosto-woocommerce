<?php
/**
 * Holds the html template for the product tagging.
 *
 * Used in the main plugin file.
 *
 * @package WooCommerce Nosto Tagging
 * @since   1.0.0
 * @var array $product Assoc list that includes url, product_id, name, image_url (optional), price, list_price,
 *          price_currency_code, availability, categories (optional), description (optional) and
 *          date_published (optional)
 */
?>

<?php if ( isset( $product ) && is_array( $product ) ): ?>
	<div class="nosto_product" style="display:none">
		<span class="url"><?php echo esc_html( $product['url'] ); ?></span>
		<span class="product_id"><?php echo esc_html( $product['product_id'] ); ?></span>
		<span class="name"><?php echo esc_html( $product['name'] ); ?></span>
		<?php if ( ! empty( $product['image_url'] ) ): ?>
			<span class="image_url"><?php echo esc_html( $product['image_url'] ); ?></span>
		<?php endif; ?>
		<span class="price"><?php echo esc_html( $product['price'] ); ?></span>
		<span class="list_price"><?php echo esc_html( $product['list_price'] ); ?></span>
		<span class="price_currency_code"><?php echo esc_html( $product['price_currency_code'] ); ?></span>
		<span class="availability"><?php echo esc_html( $product['availability'] ); ?></span>
		<?php foreach ( $product['categories'] as $category_path ): ?>
			<span class="category"><?php echo esc_html( $category_path ); ?></span>
		<?php endforeach; ?>
		<?php if ( ! empty( $product['description'] ) ): ?>
			<span class="description"><?php echo $product['description']; ?></span>
		<?php endif; ?>
		<?php if ( ! empty( $product['date_published'] ) ): ?>
			<span class="date_published"><?php echo esc_html( $product['date_published'] ); ?></span>
		<?php endif; ?>
	</div>
<?php endif; ?>
