<?php
$current_panel = $GLOBALS['current_panel'];
$tiva_options = get_option('tiva_options');
?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="nav-item start <?php echo ($current_panel == 'dashboard') ? 'active open' : '' ?>">
                <a href="<?php echo home_url() . '/user-panel/dashboard'; ?>" class="nav-link nav-toggle">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="title"><?php _e('داشبورد', 'tiva'); ?></span>
                    <span class="<?php echo ($current_panel == 'dashboard') ? 'selected' : '' ?>"></span>
                </a>
            </li>
            <li class="nav-item  <?php echo ($current_panel == 'edit-account') ? 'active open' : '' ?>">
                <a href="<?php echo home_url() . '/user-panel/edit-account'; ?>" class="nav-link nav-toggle">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="title"><?php _e('مشخصات کاربری', 'tiva'); ?></span>
                    <span class="<?php echo ($current_panel == 'edit-account') ? 'selected' : '' ?>"></span>
                </a>
            </li>
            <!-- begin store menu-->
            <li class="nav-item <?php echo ($current_panel == 'billing-address' || $current_panel == 'order-tracking' || $current_panel == 'shipping-address' || $current_panel == 'orders' || $current_panel == 'downloads' || $current_panel == 'view-order') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="title"><?php _e('فروشگاه', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'billing-address' || $current_panel == 'order-tracking' || $current_panel == 'shipping-address' || $current_panel == 'orders' || $current_panel == 'downloads' || $current_panel == 'view-order') ? ' open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'billing-address' || $current_panel == 'order-tracking' || $current_panel == 'shipping-address' || $current_panel == 'orders' || $current_panel == 'downloads' || $current_panel == 'view-order') ? 'open' : ''; ?> "></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'billing-address') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/billing-address'; ?>" class="nav-link ">
                            <span class="title"><?php _e('آدرس صورت حساب', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'shipping-address') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/shipping-address'; ?>" class="nav-link ">
                            <span class="title"><?php _e('آدرس حمل و نقل', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'orders') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/orders'; ?>" class="nav-link ">
                            <span class="title"><?php _e('سفارش ها', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'downloads') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/downloads'; ?>" class="nav-link ">
                            <span class="title"><?php _e('دانلود ها', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'order-tracking') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/order-tracking'; ?>" class="nav-link ">
                            <span class="title"><?php _e('پیگیری سفارش', 'tiva'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- begin store menu-->

            <li class="nav-item <?php echo ($current_panel == 'comments-approve' || $current_panel == 'comments-hold' || $current_panel == 'user-comments-trash' || $current_panel == 'admin-comments-trash') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <span class="title"><?php _e('مدیریت دیدگاه ها', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'comments-approve') ? 'open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'comments-approve') ? 'selected' : '' ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'comments-approve') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/comments-approve'; ?>" class="nav-link  ">
                            <span class="title"><?php _e(' تایید شده ها', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'comments-hold') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/comments-hold'; ?>" class="nav-link  ">
                            <span class="title"><?php _e(' در انتظار بررسی ', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'user-comments-trash') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/user-comments-trash'; ?>" class="nav-link  ">
                            <span class="title"><?php _e('حذف شده ها توسط من', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'admin-comments-trash') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/admin-comments-trash'; ?>" class="nav-link  ">
                            <span class="title"><?php _e('حذف شده ها توسط مدیر', 'tiva'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo ($current_panel == 'favorite-video' || $current_panel == 'favorite-posts' || $current_panel == 'favorite-download') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <span class="title"><?php _e('علاقه مندی ها', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'favorite-posts') ? 'open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'favorite-posts') ? 'selected' : '' ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'favorite-posts') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/favorite-posts'; ?>" class="nav-link ">
                            <span class="title"><?php _e('مقاله ها', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'favorite-download') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/favorite-download'; ?>" class="nav-link ">
                            <span class="title"><?php _e('مطالب دانلودی', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'favorite-video') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/favorite-video'; ?>" class="nav-link ">
                            <span class="title"><?php _e('ویدیو ها', 'tiva'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo ($current_panel == 'posts' || $current_panel == 'send-post' || $current_panel == 'posts-hold') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span class="title"><?php _e('مدیریت مقاله های ارسالی', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'posts' || $current_panel == 'send-post' || $current_panel == 'posts-hold') ? ' open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'posts' || $current_panel == 'send-post') ? 'selected' : '' ?> "></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'send-post') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/send-post'; ?>" class="nav-link ">
                            <span class="title"><?php _e('ارسال مقاله', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'posts') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/posts'; ?>" class="nav-link ">
                            <span class="title"><?php _e('نمایش منتشر شده ها ', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'posts-hold') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/posts-hold'; ?>" class="nav-link ">
                            <span class="title"><?php _e('نمایش در انتظار بررسی ها', 'tiva'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo ($current_panel == 'all-msg-received' || $current_panel == 'single-show-msg') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <span class="title"><?php _e('مدیریت پیام ها', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'all-msg-received' || $current_panel == 'single-show-msg') ? ' open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'all-msg-received' || $current_panel == 'single-show-msg') ? 'selected' : '' ?> "></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'all-msg-received') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/all-msg-received'; ?>" class="nav-link ">
                            <span class="title"><?php _e('پیام های دریافتی', 'tiva'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo ($current_panel == 'wallet-transaction' || $current_panel == 'wallet-charge') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-google-wallet" aria-hidden="true"></i>
                    <span class="title"><?php _e('مدیریت کیف پول', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'wallet-transaction' || $current_panel == 'wallet-charge') ? ' open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'wallet-transaction' || $current_panel == 'wallet-charge') ? 'selected' : '' ?> "></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'wallet-charge') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/wallet-charge'; ?>" class="nav-link ">
                            <span class="title"><?php _e('شارژ کیف پول', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'wallet-transaction') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/wallet-transaction'; ?>" class="nav-link ">
                            <span class="title"><?php _e('گزارش گردش مالی کیف پول', 'tiva'); ?></span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item <?php echo ($current_panel == 'wallet-bank-transaction' || $current_panel == 'plan-bank-transaction') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="title"><?php _e('گزارش تراکنشهای بانکی', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'wallet-bank-transaction' || $current_panel == 'plan-bank-transaction') ? ' open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'wallet-bank-transaction' || $current_panel == 'plan-bank-transaction') ? 'selected' : '' ?> "></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'wallet-bank-transaction') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/wallet-bank-transaction'; ?>" class="nav-link ">
                            <span class="title"><?php _e('شارژ آنلاین کیف پول', 'tiva'); ?></span>
                        </a>
                    </li>
                    <!-- ADD IN TIVA V5.5.2-->
                    <?php if (!empty($tiva_options['index-page']['vip_plan']) && $tiva_options['index-page']['vip_plan'] === 'true'): ?>
                        <li class="nav-item <?php echo ($current_panel == 'plan-bank-transaction') ? 'active open' : '' ?>">
                            <a href="<?php echo home_url() . '/user-panel/plan-bank-transaction'; ?>" class="nav-link ">
                                <span class="title"><?php _e('پرداخت آنلاین عضویت ویژه', 'tiva'); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <!-- ADD IN TIVA V5.5.2-->
                </ul>
            </li>
            <!-- ADD IN TIVA V5.5.2-->
            <?php if (!empty($tiva_options['index-page']['vip_plan']) && $tiva_options['index-page']['vip_plan'] === 'true'): ?>
                <li class="nav-item <?php echo ($current_panel == 'vip-plan' || $current_panel == 'buy-plan') ? 'active open' : '' ?> ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-diamond" aria-hidden="true"></i>
                        <span class="title"><?php _e('عضویت ویژه', 'tiva'); ?></span>
                        <span class="arrow <?php echo ($current_panel == 'vip-plan' || $current_panel == 'buy-plan') ? ' open' : '' ?>"></span>
                        <span class="<?php echo ($current_panel == 'vip-plan' || $current_panel == 'buy-plan') ? 'selected' : '' ?> "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item <?php echo ($current_panel == 'vip-plan') ? 'active open' : '' ?>">
                            <a href="<?php echo home_url() . '/user-panel/vip-plan'; ?>" class="nav-link ">
                                <span class="title"><?php _e('خرید / تمدید عضویت ویژه', 'tiva'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <!-- ADD IN TIVA V5.5.2-->
            <li class="nav-item <?php echo ($current_panel == 'supporter-show-ticket' || $current_panel == 'tickets' || $current_panel == 'supporter-tickets' || $current_panel == 'send-ticket' || $current_panel == 'show-ticket') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <span class="title"><?php _e('پشتیبانی', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'supporter-show-ticket' || $current_panel == 'tickets' || $current_panel == 'supporter-tickets' || $current_panel == 'send-ticket' || $current_panel == 'show-ticket') ? ' open' : '' ?>"></span>
                    <span class="<?php echo $current_panel == 'tickets' || $current_panel == 'supporter-tickets' || $current_panel == 'send-ticket' || $current_panel == 'show-ticket' ?> "></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'send-ticket') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/send-ticket'; ?>" class="nav-link ">
                            <span class="title"><?php _e('ثبت تیکت جدید', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'tickets') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/user-panel/tickets'; ?>" class="nav-link ">
                            <span class="title"><?php _e('تیکت های من', 'tiva'); ?></span>
                        </a>
                    </li>
                    <?php if (user_can(get_current_user_id(), 'supporter')): ?>
                        <li class="nav-item <?php echo ($current_panel == 'supporter-tickets') ? 'active open' : '' ?>">
                            <a href="<?php echo home_url() . '/user-panel/supporter-tickets'; ?>" class="nav-link ">
                                <span class="title"><?php _e('تیکت های ارسال شده به من', 'tiva'); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo wp_logout_url(); ?>" class="nav-link nav-toggle">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                    <span class="title"><?php _e('خروج از سیستم', 'tiva'); ?></span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->