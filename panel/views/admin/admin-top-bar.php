<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo home_url(); ?>">
                <h3 class="logo-default"><?php bloginfo('name'); ?></h3>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <img alt="" class="img-circle top-bar-avatar"
                             src="<?php echo esc_url(tiva_get_user_avatar(wp_get_current_user()->ID)); ?>"/>
                        <span class="username hidden-xs"><?php echo wp_get_current_user()->display_name; ?></span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo home_url() . '/user-panel/dashboard'; ?>">
                                <i class="icon-user"></i><?php _e('پنل کاربری', 'tiva'); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url() . '/wp-admin'; ?>">
                                <i class="fa fa-dashboard"></i><?php _e('داشبورد وردپرس', 'tiva'); ?> </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo wp_logout_url(); ?>">
                                <i class="icon-key"></i><?php _e('خروج از سیستم', 'tiva'); ?></a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->