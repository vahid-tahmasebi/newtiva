<?php $tiva_options = get_option('tiva_options'); ?>
<?php get_template_part('template-parts/option/Box-top-slider'); ?>
<div class="container" id="single">
    <div class="main-content-wrapper hamyar-home ">
        <div class="row">
            <?php
            /**
             * Check if WooCommerce is active
             * add in tiva v3.1
             **/
            if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                <?php if (!isset($tiva_options['store-index-page']['noti-banner-disable']) || $tiva_options['store-index-page']['noti-banner-disable'] === 'true') : ?>
                    <div class="col-xs-12 col-md-12">
                        <?php if (!empty($tiva_options['store-index-page']['noti-banner-img'])): ?>
                            <div class="shopTopBannerWrapper shopBannerShadow">
                                <a title="بنر فروشگاه"
                                   href="<?php (isset($tiva_options['store-index-page']['noti-banner-cat']) && !empty($tiva_options['store-index-page']['noti-banner-cat'])) ? $bannerLink = get_term((int)$tiva_options['store-index-page']['noti-banner-cat']) : $bannerLink = '';
                                   echo !empty($bannerLink) ? get_category_link($bannerLink->term_id) : '' ?>"
                                   class="shopTopBannerLink">
                                    <img class="shopTopBannerImg"
                                         src="<?php echo (!empty($tiva_options['store-index-page']['noti-banner-img'])) ? $tiva_options['store-index-page']['noti-banner-img'] : '#'; ?>"
                                         alt="  محصولات حراج شده در <?php echo get_bloginfo('name') ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php } ?>

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-content">

                <div class="mobile-search hidden-lg hidden-md">
                    <div class="mobile-search-inner">
                        <form name="search-input" class="search-form  mobile-search-form">
                            <input class="search-input keywordd" autocomplete="off" onkeyup="fetch()" type="text"
                                   name="keyword" placeholder="جست و جوی زنده در سایت ...">
                            <button disabled class="search-button" type="submit" name="button"><i
                                    class="fa fa-search"></i>
                            </button>
                            <div class="mobile-showSearchResult datafetch"></div>
                            <div class="mobile-showSearchResultOverly hidden">
                                <img src="<?php echo get_template_directory_uri() . '/images/ajax-loader.gif'; ?>"
                                     title="فیلتر نتایج" alt="فیلتر نتایج" height="20" width="20"
                                     class="mobile-live-ajax-loader">
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="h-slider-wrapper">
                    <?php get_template_part('template-parts/main-slider'); ?>
                </div>
                <div class="clearfix"></div>
                <?php if (!empty($tiva_options['index-page']['index_videobox_show']) && $tiva_options['index-page']['index_videobox_show'] === 'true'): ?>
                    <header class="box-header">
                        <span class="box-title">جدید ترین ویدئو های آموزشی رایگان</span>
                        <span class="video-archive-link">
                        <a title="آرشیو ویدیوها" href="<?php echo get_post_type_archive_link('video'); ?>">+ همه ویدیو ها</a>
                    </span>
                    </header>
                    <div class="card-wrapper show-video-wrapper">
                        <div class="show-video-inner">
                            <?php get_template_part('loops/loop', 'new-video') ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php endif; ?>
                <header class="box-header">
                    <span class="box-title"><?php _e('جدید ترین مقالات آموزشی رایگان', 'tiva'); ?></span>
                </header>
                <div class="card-wrapper main-content-inner">
                    <?php if (!empty($tiva_options['index-page']['index_search_show']) && $tiva_options['index-page']['index_search_show'] === 'true'): ?>
                        <div class="h-post-filter-wrapper">
                            <?php get_template_part('template-parts/post-filter') ?>
                        </div>
                    <?php endif; ?>
                    <div class="" id="main-post-container">
                        <?php get_template_part('loops/loop', 'all-default') ?>
                    </div>
                    <div class="tiva_pagination-wrapper post-pagination">
                        <div class="box tiva-pagination">
                            <?php
                            get_template_part('template-parts/pagination');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php
                /**
                 * Check if WooCommerce is active
                 * add in tiva v3.1
                 **/
                if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                    <?php get_template_part('template-parts/woocommerce/new-woocommerce-product'); ?>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar" id="sidebar">
                <div class="inner-sidebar">
                    <?php dynamic_sidebar('home_page_sidebar'); ?>
                </div>
            </div>
        </div>
        <?php if (!empty($tiva_options['index-page']['vip_plan']) && $tiva_options['index-page']['vip_plan'] === 'true'): ?>
            <?php get_template_part('template-parts/vip-register/vip-plane'); ?>
        <?php endif; ?>
    </div>
</div>