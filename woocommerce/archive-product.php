<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');
get_header();
get_template_part('template-parts/woocommerce/store-header');
get_template_part('template-parts/woocommerce/store-top-menu');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action('woocommerce_before_main_content');

?>
<?php
//
//if ( have_posts() ) {
//
//	/**
//	 * Hook: woocommerce_before_shop_loop.
//	 *
//	 * @hooked wc_print_notices - 10
//	 * @hooked woocommerce_result_count - 20
//	 * @hooked woocommerce_catalog_ordering - 30
//	 */
//	do_action( 'woocommerce_before_shop_loop' );
//
//	woocommerce_product_loop_start();
//
//	if ( wc_get_loop_prop( 'total' ) ) {
//		while ( have_posts() ) {
//			the_post();
//
//			/**
//			 * Hook: woocommerce_shop_loop.
//			 *
//			 * @hooked WC_Structured_Data::generate_product_data() - 10
//			 */
//			do_action( 'woocommerce_shop_loop' );
//
////			wc_get_template_part( 'content', 'product' );
//		}
//	}
//
//	woocommerce_product_loop_end();
//
//	/**
//	 * Hook: woocommerce_after_shop_loop.
//	 *
//	 * @hooked woocommerce_pagination - 10
//	 */
//	do_action( 'woocommerce_after_shop_loop' );
//} else {
//	/**
//	 * Hook: woocommerce_no_products_found.
//	 *
//	 * @hooked wc_no_products_found - 10
//	 */
//	do_action( 'woocommerce_no_products_found' );
//}
//
///**
// * Hook: woocommerce_after_main_content.
// *
// * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
// */
//do_action( 'woocommerce_after_main_content' );
//
///**
// * Hook: woocommerce_sidebar.
// *
// * @hooked woocommerce_get_sidebar - 10
// */
////do_action( 'woocommerce_sidebar' );
global $post;

?>
    <div class="container" id="single">
        <div class="main-content-wrapper hamyar-home ">
            <div class="row">
                <div class="col-xs-12 hidden-xs col-sm-12">
                    <div class="wc-breadcrumbs card-wrapper">
                        <?php woocommerce_breadcrumb(); ?>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-content">
                    <header class="box-header">
                        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                            <span class="post-title"><?php woocommerce_page_title(); ?></span>
                        <?php endif; ?>
                        <?php
                        /**
                         * Hook: woocommerce_archive_description.
                         *
                         * @hooked woocommerce_taxonomy_archive_description - 10
                         * @hooked woocommerce_product_archive_description - 10
                         */
                        do_action('woocommerce_archive_description');
                        ?>
                    </header>
                    <div class="archive-page card-wrapper main-content-inner product-archive-main-content">
                        <?php
                        $args = array('taxonomy' => 'product_cat',);
                        $terms = wp_get_post_terms($post->ID, 'product_cat', $args);

                        $count = count($terms);
                        if ($count > 0) {

                            foreach ($terms as $term) {
                                if (!empty($term->description)) {
                                    echo '<div class="term-description">';
                                    echo '<p>';
                                    echo $term->description;
                                    echo '</p>';
                                    echo '</div>';
                                }
                            }
                        }

                        if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) { // Only run on shop archive pages, not single products or other pages
                            // Products per page
                            $per_page = 12;
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                            if (get_query_var('taxonomy')) { // If on a product taxonomy archive (category or tag)
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => $per_page,
                                    'paged' => get_query_var('paged'),
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => get_query_var('taxonomy'),
                                            'field' => 'slug',
                                            'terms' => get_query_var('term'),
                                        ),
                                    ),

                                );
                            } else { // On main shop page
                                $args = array(
                                    'post_type' => 'product',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => $per_page,
                                    'paged' => get_query_var('paged'),
                                );
                            }
                            // Set the query
                            $products = new WP_Query($args);
                            // Standard loop
                            if ($products->have_posts()) :
                                global $post;
                                while ($products->have_posts()) : $products->the_post();
                                    ?>
                                    <div class="product-item-wrapper col-xs-12 col-md-3 <?php echo (intval(get_post_meta($post->ID, 'stopped_product', true)) === 1) ? 'product-stopped' : ''; ?> text-center">
                                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">
                                            <img class="tiva-product-thum"
                                                 src="<?php echo get_the_post_thumbnail_url($post->ID,'tiva-product-thum'); ?>"
                                                 alt="<?php the_title(); ?>">
                                            <h3 class="product-slid-title"><?php the_title(); ?></h3>
                                        </a>
                                        <?php
                                        global $product;
                                        if (intval(get_post_meta($post->ID, 'stopped_product', true)) !== 1):
                                            if ($product->is_in_stock() !== false):
                                            if ($product->is_on_sale()): {
                                            } ?>
                                                <div class="off-percent-label">
                                                    <span class="onsale-title">حراج</span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($price_html = $product->get_price_html()) : ?>
                                                <div class="product-options"><?php echo $product->get_price_html(); ?></div>
                                            <?php endif; ?>
                                            <div class="product-buy-wrapper-archive-page">
                                                <a title="خرید" class="product-buy" href="<?php the_permalink(); ?>"><span>خرید آنلاین<i
                                                                class="fa fa-shopping-cart"></i></span></a>
                                            </div>
                                            <?php else:; ?>
                                                <span class="is-not-stock">نا موجود</span>
                                            <?php endif; ?>
                                        <?php else:; ?>
                                            <span class="is-not-stock">توقف تولید</span>
                                        <?php endif; ?>
                                    </div>
                                <?php
                                endwhile;
                                ?>
                                <br>
                                <div class="tiva-pagination-wrraper">
                                    <div class="box tiva-pagination">
                                        <?php
                                        $big = 999999999; // need an unlikely integer

                                        echo paginate_links(array(
                                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                            'format' => '?paged=%#%',
                                            'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
                                            'next_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                                            'current' => max(1, get_query_var('paged')),
                                            'total' => $products->max_num_pages,
                                            'before_page_number'
                                        ));
                                        ?>
                                    </div>
                                </div>
                                <?php
                                wp_reset_query();
                                ?>
                            <?php else: ?>
                                <div class="no-post">
                                    <p><?php _e(' متاسفانه محصولی در این دسته بندی در فروشگاه ما موجود نمی باشد ):  ', 'tiva'); ?></p>
                                </div>
                            <?php
                            endif;

                        } else { // If not on archive page (cart, checkout, etc), do normal operations
                            woocommerce_content();
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar" id="sidebar">
                    <div class="inner-sidebar">
                        <?php dynamic_sidebar('archive_page_woocommerce_sidebar'); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php


get_footer('shop');
get_template_part('template-parts/footer');
get_footer();

// added in tiva v3.1 fixed css style term description