<?php $current_panel = $GLOBALS['current_panel_admin']; ?>

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
            <li class="nav-item start <?php echo ($current_panel == 'admin-dashboard') ? 'active open' : '' ?>">
                <a href="<?php echo home_url() . '/admin-panel/admin-dashboard'; ?>" class="nav-link nav-toggle">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="title"><?php _e('داشبورد', 'tiva'); ?></span>
                    <span class="<?php echo ($current_panel == 'admin-dashboard') ? 'selected' : '' ?>"></span>
                </a>
            </li>
            <li class="nav-item <?php echo ($current_panel == 'edit-user-wallet' ||  $current_panel == 'update-vip-user' || $current_panel == 'user-vip-handel' || $current_panel == 'user-wallet-handel' || $current_panel == 'show-deactive-users' || $current_panel == 'show-author-users' || $current_panel == 'show-admin-users' || $current_panel == 'show-blocked-user') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title"><?php _e('مدیریت کاربران', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'edit-user-wallet' ||  $current_panel == 'update-vip-user' || $current_panel == 'user-vip-handel' || $current_panel == 'user-wallet-handel' || $current_panel == 'show-deactive-users' || $current_panel == 'show-author-users' || $current_panel == 'show-admin-users' || $current_panel == 'show-blocked-user') ? 'open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'edit-user-wallet' ||  $current_panel == 'update-vip-user' || $current_panel == 'user-vip-handel' || $current_panel == 'user-wallet-handel' || $current_panel == 'show-deactive-users' || $current_panel == 'show-author-users' || $current_panel == 'show-admin-users' || $current_panel == 'show-blocked-user') ? 'selected' : '' ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'show-author-users') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/show-author-users'; ?>" class="nav-link  ">
                            <span class="title"><?php _e('کاربران نویسنده', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'show-admin-users') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/show-admin-users'; ?>" class="nav-link  ">
                            <span class="title"><?php _e('کاربران مدیر', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'show-blocked-user') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/show-blocked-user'; ?>" class="nav-link">
                            <span class="title"><?php _e('کاربران بلاک شده', 'tiva'); ?></span>
                        </a>
                    </li>
<!--/********************************* BEGIN ADD IN TIVA V5.8  ****************************/-->
                    <li class="nav-item <?php echo ($current_panel == 'user-wallet-handel' || $current_panel == 'edit-user-wallet' ) ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/user-wallet-handel'; ?>" class="nav-link">
                            <span class="title"><?php _e(' کیف پول', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'user-vip-handel' || $current_panel == 'update-vip-user') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/user-vip-handel'; ?>" class="nav-link">
                            <span class="title"><?php _e(' کاربران ویژه', 'tiva'); ?></span>
                        </a>
                    </li>
<!--/********************************* END ADD IN TIVA V5.8 ******************************/-->
                </ul>
            </li>
            <li class="nav-item <?php echo ($current_panel == 'user-group-list' || $current_panel == 'send-msg' || $current_panel == 'all-msg-sender' || $current_panel == 'single-show-msg' || $current_panel == 'all-msg-sender-admin' || $current_panel == 'show_users_group_view' || $current_panel == 'show_users_group' || $current_panel == 'create-user-group') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <span class="title"><?php _e('مدیریت پیام ها', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'user-group-list' || $current_panel == 'send-msg' || $current_panel == 'all-msg-sender' || $current_panel == 'single-show-msg' || $current_panel == 'all-msg-sender-admin' || $current_panel == 'show_users_group_view' || $current_panel == 'show_users_group' || $current_panel == 'create-user-group') ? 'open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'user-group-list' || $current_panel == 'send-msg' || $current_panel == 'all-msg-sender' || $current_panel == 'single-show-msg' || $current_panel == 'all-msg-sender-admin' || $current_panel == 'show_users_group_view' || $current_panel == 'show_users_group' || $current_panel == 'create-user-group') ? 'selected' : '' ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'send-msg') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/send-msg'; ?>" class="nav-link  ">
                            <span class="title"><?php _e('ارسال پیام', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'user-group-list' || $current_panel == 'show_users_group_view' || $current_panel == 'show_users_group' || $current_panel == 'create-user-group') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/user-group-list'; ?>" class="nav-link">
                            <span class="title"><?php _e('لیست گروه های کاربری', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'all-msg-sender') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/all-msg-sender'; ?>" class="nav-link  ">
                            <span class="title"><?php _e('پیام های ارسالی شما', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'all-msg-sender-admin') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/all-msg-sender-admin'; ?>" class="nav-link  ">
                            <span class="title"><?php _e('پیام های ارسالی مدیران', 'tiva'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo ($current_panel == 'admin-wallet-report' || $current_panel == 'admin-pay-report' || $current_panel == 'admin-course-report') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    <span class="title"><?php _e('مدیریت گزارش ها', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'admin-wallet-report' || $current_panel == 'admin-pay-report') ? 'open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'admin-wallet-report' || $current_panel == 'admin-pay-report') ? 'selected' : '' ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'admin-wallet-report') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/admin-wallet-report'; ?>" class="nav-link  ">
                            <span class="title"><?php _e('تراکنش های کیف پول کاربران', 'tiva'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($current_panel == 'admin-pay-report') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/admin-pay-report'; ?>" class="nav-link">
                            <span class="title"><?php _e('تراکنش های بانکی کاربران', 'tiva'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <?php echo ($current_panel == 'tickets' || $current_panel == 'send-ticket' || $current_panel == 'show-ticket') ? 'active open' : '' ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <span class="title"><?php _e('پشتیبانی', 'tiva'); ?></span>
                    <span class="arrow <?php echo ($current_panel == 'tickets' || $current_panel == 'show-ticket') ? ' open' : '' ?>"></span>
                    <span class="<?php echo ($current_panel == 'tickets' || $current_panel == 'show-ticket') ? 'selected' : '' ?> "></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($current_panel == 'tickets') ? 'active open' : '' ?>">
                        <a href="<?php echo home_url() . '/admin-panel/tickets'; ?>" class="nav-link ">
                            <span class="title"><?php _e('همه تیکت ها', 'tiva'); ?></span>
                        </a>
                    </li>
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