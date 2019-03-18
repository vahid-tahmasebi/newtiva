<?php
// edited by mohammad reza shirnejad
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
defined( 'ABSPATH' ) || exit;


if (!defined('ABSPATH')) {
    exit;
}

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
$tiva_options = get_option('tiva_options');
global $product;
global $post;
remove_product_description_add_cart_button($post->ID);

?>

<div class="product-summary-wrapper card-wrapper <?php echo (intval(get_post_meta($post->ID, 'stopped_product', true)) === 1) ? 'product-stopped' : ''; ?>">
    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action('woocommerce_before_single_product_summary');
    ?>
    <div class="col-md-7">
        <div class="summary entry-summary">
            <div class="product-info">
                <div class="product-title">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </div>
                <div class="product_meta">

                    <?php do_action('woocommerce_product_meta_start'); ?>

                    <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

                        <span class="sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span
                                    class="sku"><?php echo ($sku = tiva_change_number($product->get_sku())) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>

                    <?php endif; ?>

                    <?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); ?>

                    <?php do_action('woocommerce_product_meta_end'); ?>

                </div>
            </div>
            <div class="product-config-right">
                <div class="product-config-details">
                    <div class="option-seller">
                        <div class="option-seller-item">
                            <img src="<?php echo get_template_directory_uri() . '/images/man-min.png' ?>">
                            <span class="garanti"><?php echo get_post_meta($post->ID, 'product_garanti', true) ?></span>
                        </div>

                        <div class="option-seller-details">

                            <div class="option-seller-item">
                                <img src="<?php echo get_template_directory_uri() . '/images/certification-min.png' ?>">
                                <span><?php echo get_post_meta($post->ID, 'shoper_input', true) ?></span>
                            </div>

                            <div class="option-seller-item">
                                <img src="<?php echo get_template_directory_uri() . '/images/calendar-min.png' ?>">
                                <span><?php echo get_post_meta($post->ID, 'bastebandi_input', true) ?></span>
                            </div>

                            <div class="option-seller-item">
                                <img src="<?php echo get_template_directory_uri() . '/images/presentation-min.png' ?>">
                                <span><?php echo get_post_meta($post->ID, 'haml_input', true) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-config-left">

            </div>
            <div class="clearfix"></div>
            <?php
            /**
             * Hook: Woocommerce_single_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             * @hooked WC_Structured_Data::generate_product_data() - 60
             */
            do_action('woocommerce_single_product_summary');
            ?>
            <?php if (!empty( $tiva_options['store-index-page']['store-service-disable']) &&  $tiva_options['store-index-page']['store-service-disable'] === 'true'): ?>
                <div class="store-Service-Wrapper-single-product hidden-xs">
                    <ul class="storeServiceUl">
                        <li class="storeServiceLi">
                            <a href="<?php echo (isset($tiva_options['store-index-page']['shipping-express-page'])) ? get_page_link((int)$tiva_options['store-index-page']['shipping-express-page']) : '#' ?>"
                               target="_blank">
                                <img src="<?php echo site_url() . '/wp-content/themes/tiva/images/shipping-express.png' ?>"
                                     title="تحویل اکسپرس" alt="تحویل اکسپرس">
                                <span>تحویل اکسپرس</span>
                            </a>
                        </li>
                        <li class="storeServiceLi">
                            <a href="<?php echo (isset($tiva_options['store-index-page']['day-guarantee-page'])) ? get_page_link((int)$tiva_options['store-index-page']['day-guarantee-page']) : '#' ?>"
                               target="_blank">
                                <img src="<?php echo site_url() . '/wp-content/themes/tiva/images/day-guarantee.png' ?>"
                                     title=" ٧ روز ضمانت بازگشت" alt=" ٧ روز ضمانت بازگشت">
                                <span> ٧ روز ضمانت بازگشت</span>
                            </a>
                        </li>
                        <li class="storeServiceLi">
                            <a href="<?php echo (isset($tiva_options['store-index-page']['cod-page'])) ? get_page_link((int)$tiva_options['store-index-page']['cod-page']) : '#' ?>"
                               target="_blank">
                                <img src="<?php echo site_url() . '/wp-content/themes/tiva/images/cod.png' ?>"
                                     title="پرداخت در محل" alt="پرداخت در محل">
                                <span>پرداخت در محل</span>
                            </a>
                        </li>
                        <li class="storeServiceLi">
                            <a href="<?php echo (isset($tiva_options['store-index-page']['best-price'])) ? get_page_link((int)$tiva_options['store-index-page']['best-price']) : '#' ?>"
                               target="_blank">
                                <img src="<?php echo site_url() . '/wp-content/themes/tiva/images/best-price.png' ?>"
                                     title="تضمین بهترین قیمت" alt="تضمین بهترین قیمت">
                                <span>تضمین بهترین قیمت</span>
                            </a>
                        </li>
                        <li class="storeServiceLi">
                            <a href="<?php echo (isset($tiva_options['store-index-page']['certificate'])) ? get_page_link((int)$tiva_options['store-index-page']['certificate']) : '#' ?>"
                               target="_blank">
                                <img src="<?php echo site_url() . '/wp-content/themes/tiva/images/certificate.png' ?>"
                                     title="ضمانت اصل بودن کالا" alt="ضمانت اصل بودن کالا">
                                <span>ضمانت اصل بودن کالا</span>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div class=" card-wrapper product-excerpt-wrapper">
    <div class="product-excerpt">
        <h2>
            <span> معرفی کوتاه :<?php the_title() ?></span>

        </h2>
        <p>
            <?php echo get_the_excerpt(get_the_ID()) ?>
        </p>
    </div>
</div>
<div class="clearfix"></div>

<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
do_action('woocommerce_after_single_product_summary');
?>

<?php do_action('woocommerce_after_single_product'); ?>
