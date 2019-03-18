<?php
// edited by mohammad reza shirnejad

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
get_header('shop');
get_header();
get_template_part('template-parts/woocommerce/store-header');
get_template_part('template-parts/woocommerce/store-top-menu');

//echo get_hansel_and_gretel_breadcrumbs();
?>
    <div class="container">
        <div class="hidden-xs">
            <div class="col-xs-12 no-padding col-sm-12">
                <div class="wc-breadcrumbs card-wrapper" style="margin-top: 15px">
                    <?php  tiva_woocommerce_breadcrumb(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="single">

        <div class="main-content-wrapper">
            <div class="row">
                <div class="col-xs-12 col-sm-12 main-content" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php
                    /**
                     * woocommerce_before_main_content hook.
                     *
                     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                     * @hooked woocommerce_breadcrumb - 20
                     */
                    //		do_action( 'woocommerce_before_main_content' );
                    ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <?php wc_get_template_part('content', 'single-product'); ?>

                    <?php endwhile; // end of the loop. ?>
                    <?php
                    /**
                     * woocommerce_after_main_content hook.
                     *
                     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                     */
                    do_action('woocommerce_after_main_content');
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!--    <img id="zoom_10" src="small/image1.png" data-zoom-image="large/image1.jpg"/>-->

<?php get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
get_template_part('template-parts/footer');
get_footer();