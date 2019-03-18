<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      type="text/css">
<div class="wi">

</div>
<div class="container">
    <div class="op-panel-wrapper">
        <div class="op-panel-header">
            <div class="header-title">
                <h4><?php _e('پنل تنظیمات کارسازشو', 'tiva'); ?></h4>
                <small><?php $tiva = wp_get_theme();
                    echo 'V' . $tiva->get('Version') ?></small>
            </div>
            <div class="header-team-name">
                <a href="http://www.kari-no.com"
                   target="_blank"><?php _e('آموزش راه اندازی کسب و کار اینترنتی به صورت حرفه ای با کارسازشو', 'tiva'); ?></a>
            </div>
        </div>
        <div class="op-panel-inner">
            <div class="op-panel-sidebar">
                <ul>
                    <li>
                        <a data-toggle="collapse" href="#collapseExample"><i class="fa fa-cogs" aria-hidden="true"></i><?php _e('تنظیمات عمومی سایت', 'tiva'); ?>
                            <i class="fa fa-chevron-down" style="margin-right: 5px;" aria-hidden="true"></i></a>
                        <ul class=" <?php echo ($default_tab === 'vip-register' || $default_tab === 'zarinpal' || $default_tab === 'ads-setting' || $default_tab === 'login-register-page' || $default_tab === 'index-page' || $default_tab === 'main-slider' || $default_tab === 'author-page' || $default_tab === 'single-page' || $default_tab === 'social-network' || $default_tab === 'single-post') ? 'collapse in' : 'collapse'; ?> op-panel-sub-menu"
                            id="collapseExample">
                            <li class="<?php echo ($default_tab === 'index-page') ? 'menu-active' : ''; ?> "><a href="<?php echo add_query_arg('tab', 'index-page'); ?>"><?php _e(' صفحه اصلی', 'tiva'); ?></a></li>
                            <li class="<?php echo ($default_tab === 'author-page') ? 'menu-active' : ''; ?> "><a href="<?php echo add_query_arg('tab', 'author-page'); ?>"><?php _e(' صفحه نویسنده', 'tiva'); ?></a></li>
                            <li class="<?php echo ($default_tab === 'single-page') ? 'menu-active' : ''; ?> "><a href="<?php echo add_query_arg('tab', 'single-page'); ?>"><?php _e('صفحه مقالات سایت', 'tiva'); ?></a></li>
                            <li class="<?php echo ($default_tab === 'social-network') ? 'menu-active' : ''; ?> "><a href="<?php echo add_query_arg('tab', 'social-network'); ?>"><?php _e('شبکه های اجتماعی', 'tiva'); ?></a></li>
                            <li class="<?php echo ($default_tab === 'ads-setting') ? 'menu-active' : ''; ?> "><a href="<?php echo add_query_arg('tab', 'ads-setting'); ?>"><?php _e('درخواست تبلیغ در سایت', 'tiva'); ?></a></li>
                            <li class="<?php echo ($default_tab === 'main-slider') ? 'menu-active' : ''; ?> "><a href="<?php echo add_query_arg('tab', 'main-slider'); ?>"><?php _e('تنظیمات اسلایدر اصلی', 'tiva'); ?></a></li>
                            <li class="<?php echo ($default_tab === 'login-register-page') ? 'menu-active' : ''; ?> "><a href="<?php echo add_query_arg('tab', 'login-register-page'); ?>"><?php _e(' لاگین،عضویت،بازیابی رمز عبور', 'tiva'); ?></a></li>
                            <li class="<?php echo ($default_tab === 'zarinpal') ? 'menu-active' : ''; ?> "><a href="<?php echo add_query_arg('tab', 'zarinpal'); ?>"><?php _e('تنظیمات درگاه زرین پال', 'tiva'); ?></a></li>
                            <li class="<?php echo ($default_tab === 'vip-register') ? 'menu-active' : ''; ?> "><a href="<?php echo add_query_arg('tab', 'vip-register'); ?>"><?php _e('تنظیمات عضویت ویژه', 'tiva'); ?></a></li>
                        </ul>
                    </li>
                    <li class="<?php echo ($default_tab === 'post-like') ? 'menu-active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'post-like'); ?>">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <?php _e('تنظیمات لایک مقاله', 'tiva'); ?>
                        </a>
                    </li>
                    <li class="<?php echo ($default_tab === 'comment-like') ? 'menu-active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'comment-like'); ?>">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <?php _e('تنظیمات لایک دیدگاه', 'tiva'); ?>
                        </a>
                    </li>
                    <li class="<?php echo ($default_tab === 'seo-page') ? 'menu-active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'seo-page'); ?>">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <?php _e('تنظیمات سئو', 'tiva'); ?>
                        </a>
                    </li>
                    <li class="<?php echo ($default_tab === 'install-license') ? 'menu-active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'install-license'); ?>">
                            <i class="fa fa-shield" aria-hidden="true"></i>
                            <?php _e('نصب لایسنس', 'tiva'); ?>
                        </a>
                    </li>
                    <li class="<?php echo ($default_tab === 'send-user-msg') ? 'menu-active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'send-user-msg'); ?>">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <?php _e('ارسال پیام به کاربر', 'tiva'); ?>
                        </a>
                    </li>
                    <li class="<?php echo ($default_tab === 'noti-bar-sitting') ? 'menu-active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'noti-bar-sitting'); ?>">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <?php _e('نوار اطلاعیه', 'tiva'); ?>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#store"><i class="fa fa-shopping-cart"
                                                                   aria-hidden="true"></i><?php _e('تنظیمات فروشگاه', 'tiva'); ?>
                            <i class="fa fa-chevron-down" style="margin-right: 5px;" aria-hidden="true"></i></a>
                        <ul class=" <?php echo ($default_tab === 'store-index-page' || $default_tab === 'store-main-slider') ? 'collapse in' : 'collapse'; ?> op-panel-sub-menu"
                            id="store">
                            <li class="<?php echo ($default_tab === 'store-index-page') ? 'menu-active' : ''; ?> "><a
                                        href="<?php echo add_query_arg('tab', 'store-index-page'); ?>"><?php _e(' صفحه اختصاصی فروشگاه', 'tiva'); ?></a>
                            </li>
                            <li class="<?php echo ($default_tab === 'store-main-slider') ? 'menu-active' : ''; ?> "><a
                                        href="<?php echo add_query_arg('tab', 'store-main-slider'); ?>"><?php _e('تنظیمات اسلایدر فروشگاه', 'tiva'); ?></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="op-panel-content">
                <form action="" method="post">
                    <?php include get_template_directory() . '/template-parts/admin/' . $default_tab . '.php'; ?>
                </form>
            </div>
        </div>
    </div>
</div>

