<?php
/**
 * Created by PhpStorm.
 * User: Mohammad Reza
 * Date: 23/02/2018
 * Time: 10:53 PM
 */
/**
 * Template Name: صفحه اصلی فروشگاه
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

$tiva_options = get_option('tiva_options');
get_header();
get_template_part('template-parts/woocommerce/store-header');
get_template_part('template-parts/woocommerce/store-top-menu');
if (isset($tiva_options['store-index-page']['noti-banner-cat'])) {
    $categoryLink = $tiva_options['store-index-page']['noti-banner-cat'];
} else {
    $categoryLink = '';
}
?>
    <div class="container" id="single">
        <div class="main-content-wrapper hamyar-home ">
            <div class="row">
                <?php
                /**
                 * Check if WooCommerce is active
                 * add in tiva v3.1
                 **/
                if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {?>
                    <?php if (!isset($tiva_options['store-index-page']['noti-banner-disable']) || $tiva_options['store-index-page']['noti-banner-disable'] === 'true') : ?>
                        <div class="col-xs-12 col-md-12">
                            <?php if (!empty($tiva_options['store-index-page']['noti-banner-img'])): ?>
                                <div class="shopTopBannerWrapper shopBannerShadow">
                                    <a href="<?php (isset($tiva_options['store-index-page']['noti-banner-cat']) && !empty($tiva_options['store-index-page']['noti-banner-cat'])) ? $bannerLink = get_term((int)$tiva_options['store-index-page']['noti-banner-cat']) : $bannerLink = '';
                                    echo !empty($bannerLink) ? get_category_link($bannerLink->term_id) : '' ?>"
                                       class="shopTopBannerLink">
                                        <img class="shopTopBannerImg"
                                             src="<?php echo (!empty($tiva_options['store-index-page']['noti-banner-img'])) ? $tiva_options['store-index-page']['noti-banner-img'] : '#'; ?>"
                                             alt="  محصولات حراج شده در <?php echo get_bloginfo('name') ?>"
                                             title="  محصولات حراج شده در <?php echo get_bloginfo('name') ?>"

                                        >
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php } ?>
                <div class="col-xs-12 col-md-9 main-content">
                    <div class="h-slider-wrapper">
                        <?php get_template_part('template-parts/woocommerce/store-main-slider'); ?>
                    </div>
                    <div class="clearfix"></div>
                    <?php if (!empty( $tiva_options['store-index-page']['store-service-disable']) &&  $tiva_options['store-index-page']['store-service-disable'] === 'true'): ?>
                        <div class="storeServiceWrapper hidden-xs card-wrapper">
                            <ul class="storeServiceUl">
                                <li class="storeServiceLi">
                                    <a href="<?php echo (isset($tiva_options['store-index-page']['shipping-express-page'])) ? get_page_link((int)$tiva_options['store-index-page']['shipping-express-page']) : '#' ?>"
                                       target="_blank">
                                        <i class="sprite shop-icon sprite-shipping-express"></i>
                                        <span>تحویل اکسپرس</span>
                                    </a>
                                </li>
                                <li class="storeServiceLi">
                                    <a href="<?php echo (isset($tiva_options['store-index-page']['day-guarantee-page'])) ? get_page_link((int)$tiva_options['store-index-page']['day-guarantee-page']) : '#' ?>"
                                       target="_blank">
                                        <i class="sprite shop-icon sprite-day-guarantee"></i>
                                        <span> ٧ روز ضمانت بازگشت</span>
                                    </a>
                                </li>
                                <li class="storeServiceLi">
                                    <a href="<?php echo (isset($tiva_options['store-index-page']['cod-page'])) ? get_page_link((int)$tiva_options['store-index-page']['cod-page']) : '#' ?>"
                                       target="_blank">
                                        <i class="sprite shop-icon sprite-cod"></i>
                                        <span>پرداخت در محل</span>
                                    </a>
                                </li>
                                <li class="storeServiceLi">
                                    <a href="<?php echo (isset($tiva_options['store-index-page']['best-price'])) ? get_page_link((int)$tiva_options['store-index-page']['best-price']) : '#' ?>"
                                       target="_blank">
                                        <i class="sprite shop-icon sprite-best-price"></i>
                                        <span>تضمین بهترین قیمت</span>
                                    </a>
                                </li>
                                <li class="storeServiceLi">
                                    <a href="<?php echo (isset($tiva_options['store-index-page']['certificate'])) ? get_page_link((int)$tiva_options['store-index-page']['certificate']) : '#' ?>"
                                       target="_blank">
                                        <i class="sprite shop-icon sprite-certificate"></i>
                                        <span>ضمانت اصل بودن کالا</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    <?php endif; ?>

                    <div class="catImgWrapper">
                        <div class="row catImgRow">
                            <div class="col-xs-12 col-md-8 col-sm-8 no-padding">
                                <div class="catImgInner">
                                    <a href="<?php (isset($tiva_options['store-index-page']['layer1-cat']) && !empty($tiva_options['store-index-page']['layer1-cat'])) ? $layerCat1 = get_term((int)$tiva_options['store-index-page']['layer1-cat']) : $layerCat1 = '';
                                    echo !empty($layerCat1) ? get_category_link($layerCat1->term_id) : '' ?>"
                                       title="<?php echo (!empty($layerCat1)) ? $layerCat1->name : '' ?>">
                                        <img class="catImg"
                                             src="<?php echo(isset($tiva_options['store-index-page']['layer1-cat-img']) ? $tiva_options['store-index-page']['layer1-cat-img'] : '#') ?>"
                                             alt="<?php echo (!empty($layerCat1)) ? $layerCat1->name : '' ?>"
                                             title="<?php echo (!empty($layerCat1)) ? $layerCat1->name : '' ?>"
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 col-sm-4 no-padding">
                                <div class="catImgInner">
                                    <a href="<?php (isset($tiva_options['store-index-page']['layer2-cat']) && !empty($tiva_options['store-index-page']['layer2-cat'])) ? $layerCat2 = get_term((int)$tiva_options['store-index-page']['layer2-cat']) : $layerCat2 = '';
                                    echo !empty($layerCat2) ? get_category_link($layerCat2->term_id) : '' ?>"
                                       title="<?php echo (!empty($layerCat2)) ? $layerCat2->name : '' ?>">
                                        <img class="catImg"
                                             src="<?php echo(isset($tiva_options['store-index-page']['layer2-cat-img']) ? $tiva_options['store-index-page']['layer2-cat-img'] : '#') ?>"
                                             alt="<?php echo (!empty($layerCat2)) ? $layerCat2->name : '' ?>"
                                             title="<?php echo (!empty($layerCat2)) ? $layerCat2->name : '' ?>"
                                        >
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row catImgRow">
                            <div class="col-xs-12 col-md-4 col-sm-4 no-padding">
                                <div class="catImgInner">
                                    <a href="<?php (isset($tiva_options['store-index-page']['layer3-cat']) && !empty($tiva_options['store-index-page']['layer3-cat'])) ? $layerCat3 = get_term((int)$tiva_options['store-index-page']['layer3-cat']) : $layerCat3 = '';
                                    echo !empty($layerCat3) ? get_category_link($layerCat3->term_id) : '' ?>"
                                       title="<?php echo (!empty($layerCat3)) ? $layerCat3->name : '' ?>">
                                        <img class="catImg"
                                             src="<?php echo(isset($tiva_options['store-index-page']['layer3-cat-img']) ? $tiva_options['store-index-page']['layer3-cat-img'] : '#') ?>"
                                             alt="<?php echo (!empty($layerCat3)) ? $layerCat3->name : '' ?>"
                                             title="<?php echo (!empty($layerCat3)) ? $layerCat3->name : '' ?>"
                                        >
                                    </a>
                                </div>

                            </div>
                            <div class="col-xs-12 col-md-4 col-sm-4 no-padding">
                                <div class="catImgInner">
                                    <a href="<?php (isset($tiva_options['store-index-page']['layer4-cat']) && !empty($tiva_options['store-index-page']['layer4-cat'])) ? $layerCat4 = get_term((int)$tiva_options['store-index-page']['layer4-cat']) : $layerCat4 = '';
                                    echo !empty($layerCat4) ? get_category_link($layerCat4->term_id) : '' ?>"
                                       title="<?php echo (!empty($layerCat4)) ? $layerCat4->name : '' ?>">
                                        <img class="catImg"
                                             src="<?php echo(isset($tiva_options['store-index-page']['layer4-cat-img']) ? $tiva_options['store-index-page']['layer4-cat-img'] : '#') ?>"
                                             alt="<?php echo (!empty($layerCat4)) ? $layerCat4->name : '' ?>"
                                             title="<?php echo (!empty($layerCat4)) ? $layerCat4->name : '' ?>"
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 col-sm-4 no-padding">
                                <div class="catImgInner">
                                    <a href="<?php (isset($tiva_options['store-index-page']['layer5-cat']) && !empty($tiva_options['store-index-page']['layer5-cat'])) ? $layerCat5 = get_term((int)$tiva_options['store-index-page']['layer5-cat']) : $layerCat5 = '';
                                    echo !empty($layerCat5) ? get_category_link($layerCat5->term_id) : '' ?>"
                                       title="<?php echo (!empty($layerCat5)) ? $layerCat5->name : '' ?>">
                                        <img class="catImg"
                                             src="<?php echo(isset($tiva_options['store-index-page']['layer5-cat-img']) ? $tiva_options['store-index-page']['layer5-cat-img'] : '#') ?>"
                                             alt="<?php echo (!empty($layerCat5)) ? $layerCat5->name : '' ?>"
                                             title="<?php echo (!empty($layerCat5)) ? $layerCat5->name : '' ?>"
                                        >
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row catImgRow">
                            <div class="col-xs-12 col-md-4 col-sm-4 no-padding">
                                <div class="catImgInner">
                                    <a href="<?php (isset($tiva_options['store-index-page']['layer6-cat']) && !empty($tiva_options['store-index-page']['layer6-cat'])) ? $layerCat6 = get_term((int)$tiva_options['store-index-page']['layer6-cat']) : $layerCat6 = '';
                                    echo !empty($layerCat6) ? get_category_link($layerCat6->term_id) : '' ?>"
                                       title="<?php echo (!empty($layerCat6)) ? $layerCat6->name : '' ?>">
                                        <img class="catImg"
                                             src="<?php echo(isset($tiva_options['store-index-page']['layer6-cat-img']) ? $tiva_options['store-index-page']['layer6-cat-img'] : '#') ?>"
                                             alt="<?php echo (!empty($layerCat6)) ? $layerCat6->name : '' ?>"
                                             title="<?php echo (!empty($layerCat6)) ? $layerCat6->name : '' ?>"
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-8 col-sm-8 no-padding">
                                <div class="catImgInner">
                                    <a href="<?php (isset($tiva_options['store-index-page']['layer7-cat']) && !empty($tiva_options['store-index-page']['layer7-cat'])) ? $layerCat7 = get_term((int)$tiva_options['store-index-page']['layer7-cat']) : $layerCat7 = '';
                                    echo !empty($layerCat7) ? get_category_link($layerCat7->term_id) : '' ?>"
                                       title="<?php echo (!empty($layerCat7)) ? $layerCat7->name : '' ?>">
                                        <img class="catImg"
                                             src="<?php echo(isset($tiva_options['store-index-page']['layer7-cat-img']) ? $tiva_options['store-index-page']['layer7-cat-img'] : '#') ?>"
                                             alt="<?php echo (!empty($layerCat7)) ? $layerCat7->name : '' ?>"
                                             title="<?php echo (!empty($layerCat7)) ? $layerCat7->name : '' ?>"
                                        >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <?php get_template_part('template-parts/woocommerce/woocommerce-product-sc1'); ?>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>

                    <?php get_template_part('template-parts/woocommerce/woocommerce-product-sc2'); ?>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>

                    <?php get_template_part('template-parts/woocommerce/woocommerce-product-sc3'); ?>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>

                    <?php get_template_part('template-parts/woocommerce/new-woocommerce-product'); ?>
                    <div class="clearfix"></div>

                </div>
                <div class="col-xs-12 col-sm-3 sidebar " id="sidebar">
                    <div class="inner-sidebar">
                        <?php dynamic_sidebar('index_woocommerce_sidebar'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_template_part('template-parts/footer');
get_footer();