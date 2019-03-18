<?php
/**
 * edited by mohammad reza shirnejad
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 * @karino-note UPDATE UP TO Commits on Oct 18, 2018 WOO V 3.5.0 ===> IN TIVA V5.5.2
 */
defined('ABSPATH') || exit;
//ADD IN TIVA V5.5.2
// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
}


global $post, $product;
$columns = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes = apply_filters('woocommerce_single_product_image_gallery_classes', array(
    'woocommerce-product-gallery',
    //ADD IN TIVA V5.5.2
    'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
    'woocommerce-product-gallery--columns-' . absint($columns),
    'images',
));
?>
<div class="col-md-5">

    <div class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>"
         data-columns="<?php echo esc_attr($columns); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
        <figure class="woocommerce-product-gallery__wrapper">
            <?php
            //ADD IN TIVA V5.5.2
            if ($product->get_image_id()) {
                $html = tiva_custom_wc_get_gallery_image_html($post_thumbnail_id, true);
            } else {
                $html = '<div class="product-thumbnails gallery-item woocommerce-product-gallery__image--placeholder">';
                //ADD IN TIVA V5.5.2
                $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
                $html .= '</div>';
            }
            //ADD IN TIVA V5.5.2
            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
            do_action('woocommerce_product_thumbnails');
            ?>
        </figure>
    </div>
</div>


