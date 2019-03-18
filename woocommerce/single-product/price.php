<?php
/**
 * edited by mohammad reza shirnejad
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post;
global $product;

?>
<?php if (intval(get_post_meta($post->ID, 'stopped_product', true)) !== 1):?>
<?php if ( ! $product->is_type( 'variable' ) ) : ?>
    <p class="price"> <span class="tiva-price-title">قیمت</span> <?php echo $product->get_price_html(); ?></p>
<?php endif; ?>
<?php else: echo '<div class="stopped-product">تولید این محصول توسط سازنده متوقف شده است</div>'?>
<?php endif; ?>
