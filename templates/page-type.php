<?php
/**
 * Holds the html template for page type tagging
 *
 * Used in the main plugin file.
 *
 * @package WooCommerce Nosto Tagging
 * @since   1.1.0
 * @var string $page_type
 */
?>
<?php if ( isset( $page_type ) && !empty( $page_type ) ): ?>
<div class="nosto_page_type" style="display:none"><?php echo $page_type; ?></div>
<?php endif; ?>