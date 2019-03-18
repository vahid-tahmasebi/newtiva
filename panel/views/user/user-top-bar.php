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
                <?php if (karino_get_msg_no_read_count(get_current_user_id()) > '0'):?>
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-envelope-open user-panel-inbox-icon"></i>
                            <span class="badge badge-danger user-panel-badge"><?php echo tiva_change_number(karino_get_msg_no_read_count_home_page(get_current_user_id())); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3><?php _e('شما ', 'tiva'); ?><span class="bold"><?php echo tiva_change_number(karino_get_msg_no_read_count_home_page(get_current_user_id()));
                                        _e(' پیام جدید', 'tiva'); ?></span> <?php _e(' دارید', 'tiva'); ?></h3>
                                <a href="<?php echo home_url() . '/user-panel/all-msg-received'; ?>"><?php _e('نمایش همه', 'tiva'); ?></a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <?php
                                    global $wpdb;
                                    $db_prefix = $wpdb->prefix;
                                    $tiva_msg_table = $db_prefix . 'tiva_msg';
                                    $tiva_msg_table_handel = $db_prefix . 'tiva_user_msg_handel';
                                    $current_user = get_current_user_id();
                                    $result = $wpdb->get_results("SELECT * FROM {$tiva_msg_table_handel} INNER JOIN {$tiva_msg_table} ON {$tiva_msg_table}.id={$tiva_msg_table_handel}.id WHERE {$tiva_msg_table_handel}.user_id={$current_user} AND {$tiva_msg_table_handel}.read_msg='n'");
                                    foreach ($result as $print) {
                                        ?>
                                        <li>
                                            <a href="<?php echo home_url() . '/user-panel/single-show-msg?msg_id=' . urlencode(base64_encode($print->id)) . '&view=' . urlencode(base64_encode("true")) . '' ?>">
                                                <span class="photo">
                                                  <img src="<?php echo esc_url(tiva_get_user_avatar($print->admin_id)); ?>" class="img-circle" alt="">
                                                </span>
                                                <span class="subject">
                                                    <span class="from"> <?php $user_info = get_userdata($print->admin_id);
                                                        echo $user_info->display_name; ?></span>
                                                    <span class="time"><?php echo $print->send_at_time .' '. $print->send_at_date  ; ?> </span>
                                                </span>
                                                <span class="message"> <?php  karino_custom_msg_table_echo($print->msg,50) ; ?> </span>
                                            </a>
                                        </li>
                                    <?php }
                                    ?>

                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>
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
                            <a href="<?php echo home_url() . '/user-panel/edit-account'; ?>">
                                <i class="icon-user"></i><?php _e('مشخصات کاربری', 'tiva'); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url() . '/user-panel/comments-approve'; ?>">
                                <i class="fa fa-comments-o"></i><?php _e('دیدگاه ها', 'tiva'); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url() . '/user-panel/favorite-posts'; ?>">
                                <i class="fa fa-star"></i> <?php _e('علاقمندی ها', 'tiva'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url() . '/user-panel/send-post'; ?>">
                                <i class="fa fa-file-text"></i> <?php _e('ارسال مقاله', 'tiva'); ?>
                            </a>
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