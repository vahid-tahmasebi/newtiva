<?php $tiva_options = get_option('tiva_options');
$noti_cookie = isset($_COOKIE['tiva_noti_close']);
$noti_disable = $tiva_options['noti-bar-sitting']['noti-disable'];
?>
<?php if ($noti_disable == 'true' || $noti_disable == ''): ?>
    <?php if ($noti_cookie == false): ?>
        <div class=""
             style="background-color:<?php echo (!empty($tiva_options['noti-bar-sitting']['noti-wrapper-color'])) ? $tiva_options['noti-bar-sitting']['noti-wrapper-color'] : '#fada01'; ?>">
            <div class="noti-wrapper hidden-noti"
                 style="background-image:url( <?php echo (!empty($tiva_options['noti-bar-sitting']['noti-background'])) ? $tiva_options['noti-bar-sitting']['noti-background'] : home_url() . '/wp-content/themes/tiva/images/hero.png'; ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="noti-inner card-wrapper">
                                <a class="noti-close">
                                    <svg class="dismiss_icon" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.245 4.015c.313.313.313.826 0 1.14l-6.276 6.27c-.314.31-.314.825 0 1.14l6.272 6.27c.313.314.313.827 0 1.14l-2.285 2.278c-.314.312-.828.312-1.142 0l-6.27-6.27c-.314-.314-.83-.314-1.142 0l-6.276 6.266c-.313.312-.828.312-1.14 0l-2.283-2.28c-.313-.314-.313-.827 0-1.14l6.278-6.27c.313-.312.313-.826 0-1.14L1.71 5.147c-.315-.313-.315-.827 0-1.14L3.992 1.73c.315-.313.828-.313 1.142 0L11.405 8c.314.314.828.314 1.14 0l6.277-6.266c.312-.312.826-.312 1.14 0l2.283 2.28z"></path>
                                    </svg>
                                </a>
                                <p class="noti-text"><?php echo (!empty($tiva_options['noti-bar-sitting']['noti-text'])) ? $tiva_options['noti-bar-sitting']['noti-text'] : 'لطفا از طریق پنل تنظیمات قالب قسمت تنظیمات نوار اطلاعیه تنظمیات مربوطه را تنظیم کنید. با تشکر کارینو'; ?></p>
                                <a href="<?php echo (!empty($tiva_options['noti-bar-sitting']['noti-btn-link'])) ? $tiva_options['noti-bar-sitting']['noti-btn-link'] : '#'; ?>"
                                   class="noti-btn"
                                   style="background:<?php echo (!empty($tiva_options['noti-bar-sitting']['noti-btn-color'])) ? $tiva_options['noti-bar-sitting']['noti-btn-color'] : '#29b87e'; ?>;"><?php echo (!empty($tiva_options['noti-bar-sitting']['noti-btn-text'])) ? $tiva_options['noti-bar-sitting']['noti-btn-text'] : 'کلیک کنید'; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; endif; ?>
<!--/********************************* BEGIN ADD IN TIVA V5.8.1  ****************************/-->
<?php
/**
 * Check if WooCommerce is active
 * add in tiva v3.1
 **/
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    ?>
    <div class="hidden-lg hidden-md mobile-cart-wrapper">
        <a href="<?php echo wc_get_cart_url() ?>" class="mobile-cart">
            <i class="button-icon-cart fa fa-shopping-cart"></i>
            <span><?php echo tiva_change_number(WC()->cart->get_cart_contents_count()) ?></span>
        </a>
        <div class="clearfix"></div>
    </div>
<?php } ?>
<div class=" hidden-lg hidden-md mobile-header text-center">
    <?php if (!empty($tiva_options['index-page']['show_site_logo']) && $tiva_options['index-page']['show_site_logo'] === 'true' || !isset($tiva_options['index-page']['show_site_logo'])): ; ?>
        <a class="index-tiva-logo" href="<?php echo home_url() .'/' ; ?>"> <img class="tiva-logo" src="<?php echo (!empty($tiva_options['index-page']['site-logo'])) ? $tiva_options['index-page']['site-logo'] : ''; ?>" alt="لوگوی سایت خود را انتخاب کنید" title=" <?php bloginfo('name'); ?>"></a>
        <a  title="<?php bloginfo('name'); ?>" style="display: none" href="<?php echo home_url().'/'; ?>">
            <?php if (is_home()): ?>
                <h1 class="blog-title"> <?php bloginfo('name'); ?></h1>
            <?php else: ?>
                <h1 class="blog-title"> <?php bloginfo('name'); ?></h1>
            <?php endif; ?>
            <h2 class="blog-description"><?php bloginfo('description'); ?></h2>
        </a>
    <?php endif; ?></div>
<!--/********************************* END ADD IN TIVA V5.8.1 ******************************/-->
<header id="header">
    <div class="container">
        <div class="logo-search-section hidden-sm hidden-xs">
            <div class="row logo-row">
                <div class="right-area col-xs-12 col-md-3">

                    <?php if (!empty($tiva_options['index-page']['show_site_logo']) && $tiva_options['index-page']['show_site_logo'] === 'true' || !isset($tiva_options['index-page']['show_site_logo'])): ; ?>
                        <a class="index-tiva-logo" href="<?php echo home_url() .'/'; ?>"> <img class="tiva-logo"
                                                                                          src="<?php echo (!empty($tiva_options['index-page']['site-logo'])) ? $tiva_options['index-page']['site-logo'] : ''; ?>"
                                                                                          alt="لوگوی سایت خود را انتخاب کنید"
                                                                                          title=" <?php bloginfo('name'); ?>"></a>
                        <a style="display: none" href="<?php echo home_url() .'/'; ?>">
                            <?php if (is_home()): ?>
                                <h1 class="blog-title"> <?php bloginfo('name'); ?></h1>
                            <?php else: ?>
                                <h1 class="blog-title"> <?php bloginfo('name'); ?></h1>
                            <?php endif; ?>
                            <h2 class="blog-description"><?php bloginfo('description'); ?></h2>
                        </a>
                    <?php else: ; ?>
                        <a href="<?php echo home_url() .'/'; ?>">
                            <?php if (is_home()): ?>
                                <h1 class="blog-title"> <?php bloginfo('name'); ?></h1>
                            <?php else: ?>
                                <h1 class="blog-title"> <?php bloginfo('name'); ?></h1>
                            <?php endif; ?>
                            <h2 class="blog-description"><?php bloginfo('description'); ?></h2>
                        </a>
                    <?php endif;; ?>
                </div>
                <!--/********************************* BEGIN ADD IN TIVA V5.8.1  ****************************/-->

                <div class="left-area col-xs-12 col-md-5">
                    <form name="search-input" class="search-form">
                        <input class="search-input keyword" autocomplete="off"  onkeyup="fetch()" type="text" name="keyword" placeholder="جست و جوی زنده در سایت ...">
                        <button disabled class="search-button" type="submit" name="button"><i class="fa fa-search"></i>
                        </button>
                        <div  class="datafetch showSearchResult"></div>
                        <div class="showSearchResultOverly hidden">
                            <img src="<?php echo get_template_directory_uri() . '/images/ajax-loader.gif'; ?>"
                                 title="فیلتر نتایج" alt="فیلتر نتایج" height="20" width="20" class="live-ajax-loader">
                        </div>
                    </form>
                </div>
                <!--/********************************* END ADD IN TIVA V5.8.1 ******************************/-->

                <div class=" col-xs-12 col-md-2">
                    <?php
                    /**
                     * Check if WooCommerce is active
                     * add in tiva v3.1
                     **/
                    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                        <div class="cart-box">
                            <a href="<?php echo wc_get_cart_url() ?>" class="cartBtnLink">
                                <div class="cartIconWrapper">
                                <span class="btnCartIcon">
                                    <i class="button-icon-cart fa fa-shopping-cart"></i>
                                </span>
                                </div>
                                <div class="cartBox-button-label">
                                    <div class="cartBox-button-labelname"><span class="lableNameSpan">سبد خرید</span>
                                    </div>
                                    <span class="order-count"><?php echo tiva_change_number(WC()->cart->get_cart_contents_count()) ?></span>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
