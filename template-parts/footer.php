<div class="clearfix"></div>
<?php
$tiva_options = get_option('tiva_options'); ?>

<?php
/**
 * Check if WooCommerce is active
 * add in tiva v3.1
 **/
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
    <?php if (isset($_COOKIE['woocommerce_recently_viewed'])): ?>
        <section class="hidden-xs">
            <div class="wrvpproduct-wrapper ">
                <span class="title">محصولات آموزشی که در سایت مشاهده کردید</span>
                <?php echo do_shortcode("[woocommerce_recently_viewed_products per_page='5']"); ?>
            </div>
        </section>
    <?php endif; ?>
<?php } ?>
<div class="clearfix"></div>
<footer id="footer"
        class="footer <?php echo (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) === false) ? 'footerMarginTop' : '' ?> <?php echo (isset($_COOKIE['woocommerce_recently_viewed'])) ? '' : 'footerMarginTop' ?>">
    <?php get_template_part('template-parts/option/footer-top');?>
    <div class="footer-query-wrapper">
        <?php
        $count_users = count_users();
        $count_posts = wp_count_posts();
        // FIX BUG IN TIVA V5.8.2
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            $count_product = wp_count_posts('product')->publish;
        } else {
            $count_product = 0;
        }
        $count_comments = wp_count_comments();
        $count_author = count(get_users(array('fields' => array('ID'), 'role' => 'administrator')))
        ?>
        <div class="container">
            <div class="hidden-xs">
                <ul class="footer-meta">
                    <li>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <strong><?php echo tiva_change_number($count_users['total_users']) ?> کاربر</strong>
                        <span>کاربرانی که در کارسازشو عضو هستند</span>
                    </li>
                    <li>
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <strong> <?php $count_posts_download = wp_count_posts('download');
                            $count_posts_video = wp_count_posts('video');
                            echo tiva_change_number($count_posts->publish + $count_posts_download->publish + $count_posts_video->publish) ?>
                            مطلب</strong>
                        <span>مطالبی که در کارسازشو منتشر شدند</span>
                    </li>
                    <li>
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <strong> <?php echo tiva_change_number($count_comments->total_comments) ?> دیدگاه</strong>
                        <span>تعداد نظرات ثبت شده در مطالب</span>
                    </li>
                    <li>
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <strong>  <?php echo tiva_change_number($count_product); ?> محصول </strong>
                        <span>محصولاتی که در کارسازشو منتشر شده</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-widget-wrapper">
        <div class="footer-widget-inner container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">

                    <?php if (!empty($tiva_options['index-page']['show_nemad_logo']) && $tiva_options['index-page']['show_nemad_logo'] === 'true'): ?>
                        <div class="logo1">
                            <?php echo (isset($tiva_options['index-page']['fl1_script'])) ? base64_decode($tiva_options['index-page']['fl1_script']) : ''; ?>
                        </div>
                        <div class="logo2">
                            <?php echo (isset($tiva_options['index-page']['fl2_script'])) ? base64_decode($tiva_options['index-page']['fl2_script']) : ''; ?>
                        </div>
                    <?php else:; ?>
                        <div class="about-wrapper">
                            <P class="title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> برنامه های ما </P>
                            <p class="about-dis">
                                <?php echo (isset($tiva_options['index-page']['our_plans'])) ? $tiva_options['index-page']['our_plans'] : ''; ?>
                            </p>
                        </div>
                    <?php endif; ?>


                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="footer-social-wrapper">
                        <div class="mobile-footer-social">
                            <p><i class="fa fa-address-card" aria-hidden="true"></i> به ما در شبکه های اجتماعی بپیوندید
                                !
                            </p>
                            <ul class="socials">
                                <?php if (isset($tiva_options['social-network']['facebook-show']) && $tiva_options['social-network']['facebook-show'] === 'true'): ?>
                                    <li class="facebook"><a
                                                href="<?php echo (!empty($tiva_options['social-network']['facebook-url'])) ? $tiva_options['social-network']['facebook-url'] : '#'; ?>"
                                                target="_blank" rel="nofollow"><i
                                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                                <?php if (isset($tiva_options['social-network']['telegram-show']) && $tiva_options['social-network']['telegram-show'] === 'true'): ?>
                                    <li class="telegram"><a
                                                href="<?php echo (!empty($tiva_options['social-network']['telegram-url'])) ? $tiva_options['social-network']['telegram-url'] : '#'; ?>"
                                                target="_blank" rel="nofollow"><i class="fa fa-telegram"
                                                                                  aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                                <?php if (isset($tiva_options['social-network']['instagram-show']) && $tiva_options['social-network']['instagram-show'] === 'true'): ?>
                                    <li class="instagram"><a
                                                href="<?php echo (!empty($tiva_options['social-network']['inst-url'])) ? $tiva_options['social-network']['inst-url'] : '#'; ?>"
                                                target="_blank" rel="nofollow"><i
                                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                                <?php if (isset($tiva_options['social-network']['linkedin-show']) && $tiva_options['social-network']['linkedin-show'] === 'true'): ?>
                                    <li class="linkedin"><a
                                                href="<?php echo (!empty($tiva_options['social-network']['linkedin-url'])) ? $tiva_options['social-network']['linkedin-url'] : '#'; ?>"
                                                target="_blank" rel="nofollow"><i
                                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                                <?php if (isset($tiva_options['social-network']['twitter-show']) && $tiva_options['social-network']['twitter-show'] === 'true'): ?>
                                    <li class="twitter"><a
                                                href="<?php echo (!empty($tiva_options['social-network']['twitter-url'])) ? $tiva_options['social-network']['twitter-url'] : '#'; ?>"
                                                target="_blank" rel="nofollow"><i
                                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                                <?php if (isset($tiva_options['social-network']['google-plus-show']) && $tiva_options['social-network']['google-plus-show'] === 'true'): ?>
                                    <li class="google"><a
                                                href="<?php echo (!empty($tiva_options['social-network']['google-plus-url'])) ? $tiva_options['social-network']['google-plus-url'] : '#'; ?>"
                                                target="_blank" rel="nofollow"><i class="fa fa-google"
                                                                                  aria-hidden="true"></i></a></li>
                                <?php endif; ?>


                                <?php if (isset($tiva_options['social-network']['whatsapp-show']) && $tiva_options['social-network']['whatsapp-show'] === 'true'): ?>
                                    <li class="whatsapp"><a
                                                href="<?php echo (!empty($tiva_options['social-network']['whatsapp-url'])) ? $tiva_options['social-network']['whatsapp-url'] : '#'; ?>"
                                                target="_blank" rel="nofollow"><i class="fa fa-whatsapp"
                                                                                  aria-hidden="true"></i></a></li>
                                <?php endif; ?>

                                <?php if (isset($tiva_options['social-network']['aparat-show']) && $tiva_options['social-network']['aparat-show'] === 'true'): ?>
                                    <li class="aparat"><a
                                                href="<?php echo (!empty($tiva_options['social-network']['aparat-url'])) ? $tiva_options['social-network']['aparat-url'] : '#'; ?>"
                                                target="_blank" rel="nofollow">
                                            <img class="aparat-icon"
                                                 src="<?php echo get_template_directory_uri() . '/images/aparat-icon.png' ?>"
                                                 alt="آپارات" title="آپارات">
                                        </a></li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>

                    <?php if (!empty($tiva_options['single-page']['rrs_show']) && $tiva_options['single-page']['rrs_show'] === 'true'): ?>
                        <div class="footer-rss">
                            <div class="footer-rss-text"><P><i class="fa fa-envelope-o"></i> برای عضویت در خبرنامه و
                                    دریافت
                                    مطالب ایمیل خود را وارد کنید</P>
                                <span>نگران نباشید ما اسپم نیستیم ..</span></div>
                            <?php echo do_shortcode('[mailpoet_form id="1"]'); ?>
                        </div>

                    <?php endif; ?>

                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="about-wrapper">
                        <P class="title"><i class="fa fa-info-circle"></i> درباره ما </P>
                        <p class="about-dis">
                            <?php echo (isset($tiva_options['index-page']['footer_about'])) ? $tiva_options['index-page']['footer_about'] : ''; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-menu-wrapper">
        <div class="footer-menu-inner container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="menu text-center">
                        <?php wp_nav_menu(array('theme_location' => 'tiva_footer_main_menu', 'container_class' => 'tfooter-menu')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright-wrapper">
        <div class="footer-copyright-wrapper-inner container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <?php
                    $tiva_options = get_option('tiva_options');; ?>
                    <div class="copy-right-wrapper">
                        <strong class="copy-right"><?php echo (isset($tiva_options['index-page']['tiva_copy_right_op'])) ? $tiva_options['index-page']['tiva_copy_right_op'] : ''; ?></strong>
                    </div>
                </div>

                <?php if (!empty($tiva_options['index-page']['qrcode_show']) && $tiva_options['index-page']['qrcode_show'] === 'true'): ?>
                    <div class="col-lg-6 col-sm-6  hidden-xs col-xs-12">
                        <img class="qrcode" title="کپی رایت"
                             src="<?php echo (isset($tiva_options['index-page']['qrcode'])) ? $tiva_options['index-page']['qrcode'] : ''; ?>"
                             alt="کپی رایت">
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

</footer>
<a href="#" class="scrollToTop"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
