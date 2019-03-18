<div class="navbar-login-section">
    <div class="row">
        <div class="col-xs-12 col-md-9 ">

            <nav class="navbar navbar-default" role="navigation" data-hover="dropdown"
                 data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">

                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <?php
                        if (!is_user_logged_in()) {
                            ?>
                            <!-- FIXED IN TIVA V5.5.2-->
                            <span class="login-navbar">
                                 <a href="/login-user">
                                <i class=" login-nav-icon fa fa-sign-in hidden-sm hidden-lg hidden-md"></i>
                                 </a>
                            </span>
                            <!-- FIXED IN TIVA V5.5.2-->

                            <a href="/register-user"><i class=" login-nav-icon fa fa-user-plus hidden-sm hidden-lg hidden-md"></i></a>
                            <?php
                        } else {
                            ?>
                            <div class="top-menu hidden-sm hidden-lg hidden-md">
                                <ul class="nav navbar-nav pull-right" data-hover="dropdown"
                                    data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
                                    <li class="dropdown dropdown-user">
                                        <a href="javascript:;" class="dropdown-toggle user-name-link"
                                           data-toggle="dropdown"
                                           data-hover="dropdown"
                                           data-close-others="true">
                                            <img alt="<?php echo wp_get_current_user()->display_name;; ?>" class="user_avatar_login_menu"
                                                 title="<?php echo wp_get_current_user()->display_name;; ?>"
                                                 src="<?php echo esc_url(tiva_get_user_avatar(wp_get_current_user()->ID)); ?>"/>
                                            <span class="username"><?php echo wp_get_current_user()->display_name;; ?></span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-default">
                                            <?php
                                            if (current_user_can('administrator')) {
                                                ?>
                                                <li>
                                                    <a href="<?php echo home_url() . '/wp-admin'; ?>">
                                                        <i class="fa fa-tachometer"
                                                           aria-hidden="true"></i><?php _e('داشبورد وردپرس', 'tiva'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo home_url() . '/admin-panel/admin-dashboard'; ?>">
                                                        <i class="fa fa-tachometer"
                                                           aria-hidden="true"></i><?php _e('پنل مدیریت', 'tiva'); ?>
                                                    </a>
                                                </li>
                                                <?php
                                            } else {
                                                echo '';
                                            }
                                            ?>
                                            <?php
                                            if (current_user_can('editor')) {
                                                ?>
                                                <li>
                                                    <a href="<?php echo home_url() . '/wp-admin/edit.php'; ?>">
                                                        <i class="fa fa-edit"
                                                           aria-hidden="true"></i><?php _e('ویرایش مقاله ها', 'tiva'); ?>
                                                    </a>
                                                </li>
                                                <?php
                                            } else {
                                                echo '';
                                            }
                                            ?>
                                            <li>
                                                <a href="<?php echo home_url() . '/user-panel/dashboard'; ?>">
                                                    <i class="fa fa-tachometer"
                                                       aria-hidden="true"></i><?php _e(' پنل کاربری', 'tiva'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo home_url() . '/user-panel/edit-account'; ?>">
                                                    <i class="fa fa-user"
                                                       aria-hidden="true"></i><?php _e('تنظیمات حساب کاربری', 'tiva'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo home_url() . '/user-panel/comments-approve'; ?>">
                                                    <i class="fa fa-comments-o"
                                                       aria-hidden="true"></i><?php _e('مدیریت دیدگاه ها ', 'tiva'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo home_url() . '/user-panel/favorite-posts'; ?>">
                                                    <i class="fa fa-star"
                                                       aria-hidden="true"></i><?php _e('مدیریت علاقمندی ها', 'tiva'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo home_url() . '/user-panel/send-post'; ?>">
                                                    <i class="fa fa-file-text-o"
                                                       aria-hidden="true"></i><?php _e('ارسال مقاله', 'tiva'); ?>
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?php echo wp_logout_url(); ?>">
                                                    <i class="fa fa-power-off"
                                                       aria-hidden="true"></i><?php _e('خروج از سیستم', 'tiva'); ?></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <?php if (has_nav_menu('tiva_header_main_menu')): ?>
                        <?php
                        wp_nav_menu(array(
                                'menu' => 'tiva_header_main_menu',
                                'theme_location' => 'tiva_header_main_menu',
                                'depth' => 5,
                                'container' => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id' => 'bs-example-navbar-collapse-1',
                                'menu_class' => 'nav navbar-nav',
                                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                'walker' => new WP_Bootstrap_Navwalker())
                        );
                        ?>
                    <?php else: ?>
                        <div class="menu-alert">لطفا برای این قسمت یک منو انتخاب کنید</div>
                    <?php endif; ?>

                </div>
            </nav>
        </div>
        <div class="col-xs-12 col-md-3 hidden-xs hidden-sm">
            <?php
            if (karino_get_msg_no_read_count_home_page(get_current_user_id()) > '0'):
                ?>
                <div class="msg-icon-wrraper">
                    <a title="پیام های دریافتی" href="<?php echo home_url() . '/user-panel/all-msg-received'; ?>">
                        <span class="msg-icon-num"><?php echo tiva_change_number(karino_get_msg_no_read_count_home_page(get_current_user_id())); ?></span>
                        <i class="fa fa-envelope-o fa-envelope-ani"></i>
                    </a>
                </div>
            <?php endif; ?>
            <div class="left-login-area hidden-sm">
                <?php
                if (!is_user_logged_in()) {
                    ?>
                    <a title="عضویت در سایت" href="  <?php echo site_url() . '/register-user' ?>" class="register-btn">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> عضویت
                    </a>
                    <a title="ورود به سایت" href="<?php echo site_url().'/login-user' ?>" class="login-btn">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> ورود
                    </a>
                    <?php
                } else {
                    ?>
                    <div class="top-menu user-login-menu-res">
                        <ul class="nav navbar-nav pull-right" data-hover="dropdown"
                            data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle user-name-link" data-toggle="dropdown"
                                   data-hover="dropdown"
                                   data-close-others="true">
                                    <img alt="<?php echo wp_get_current_user()->display_name;; ?>" class="user_avatar_login_menu"
                                         title="<?php echo wp_get_current_user()->display_name;; ?>"
                                         src="<?php echo esc_url(tiva_get_user_avatar(wp_get_current_user()->ID)); ?>"/>
                                    <span class="username "><?php echo wp_get_current_user()->display_name;; ?></span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <?php
                                    if (current_user_can('administrator')) {
                                        ?>
                                        <li>
                                            <a title="داشبورد وردپرس" href="<?php echo home_url() . '/wp-admin'; ?>">
                                                <i class="fa fa-tachometer"
                                                   aria-hidden="true"></i><?php _e('داشبورد وردپرس', 'tiva'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="پنل مدیریت" href="<?php echo home_url() . '/admin-panel/admin-dashboard'; ?>">
                                                <i class="fa fa-tachometer"
                                                   aria-hidden="true"></i><?php _e('پنل مدیریت', 'tiva'); ?>
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                    <?php
                                    if (current_user_can('editor')) {
                                        ?>
                                        <li>
                                            <a title="ویرایش مقاله ها" href="<?php echo home_url() . '/wp-admin/edit.php'; ?>">
                                                <i class="fa fa-edit"
                                                   aria-hidden="true"></i><?php _e('ویرایش مقاله ها', 'tiva'); ?>
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                    <li>
                                        <a title="پنل کاربری" href="<?php echo home_url() . '/user-panel/dashboard'; ?>">
                                            <i class="fa fa-tachometer"
                                               aria-hidden="true"></i><?php _e('پنل کاربری', 'tiva'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="تنظیمات حساب کاربری" href="<?php echo home_url() . '/user-panel/edit-account'; ?>">
                                            <i class="fa fa-user"
                                               aria-hidden="true"></i><?php _e('تنظیمات حساب کاربری', 'tiva'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="مدیریت دیدگاه ها " href="<?php echo home_url() . '/user-panel/comments-approve'; ?>">
                                            <i class="fa fa-comments-o"
                                               aria-hidden="true"></i><?php _e('مدیریت دیدگاه ها ', 'tiva'); ?> </a>
                                    </li>
                                    <li>
                                        <a title="مدیریت علاقمندی ها" href="<?php echo home_url() . '/user-panel/favorite-posts'; ?>">
                                            <i class="fa fa-star"
                                               aria-hidden="true"></i><?php _e('مدیریت علاقمندی ها', 'tiva'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="ارسال مقاله" href="<?php echo home_url() . '/user-panel/send-post'; ?>">
                                            <i class="fa fa-file-text-o"
                                               aria-hidden="true"></i><?php _e('ارسال مقاله', 'tiva'); ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a title="خروج از سیستم" href="<?php echo wp_logout_url(); ?>">
                                            <i class="fa fa-power-off"
                                               aria-hidden="true"></i><?php _e('خروج از سیستم', 'tiva'); ?></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</header>

<?php $tiva_options = get_option('tiva_options'); ?>


