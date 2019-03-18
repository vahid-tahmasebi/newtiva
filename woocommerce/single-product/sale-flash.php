<?php
/**
 * edited by mohammad reza shirnejad
 * Single Product Sale Flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post, $product;
?>
<?php if (intval(get_post_meta($post->ID, 'stopped_product', true)) === 1):
    echo apply_filters('woocommerce_sale_flash', '<img class="product-on-sale" src="' . site_url() . '/wp-content/themes/tiva/images/stop-product.png">', $post, $product); ?>

<?php endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
