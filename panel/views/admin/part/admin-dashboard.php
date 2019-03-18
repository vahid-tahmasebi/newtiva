<?php
$count_users = count_users();
$count_posts = wp_count_posts();
$count_comments = wp_count_comments();
$current_user_id = wp_get_current_user()->ID;
$count_author = count(get_users(array('fields' => array('ID'), 'role' => 'administrator')));

$date = new jDateTime(true, true, 'Asia/Tehran');
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/admin-panel/admin-dashboard"><?php _e('پنل اختصاصی مدیریت وب مستر', 'tiva'); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('داشبورد', 'tiva'); ?></span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="pull-right btn-sm" data-container="body" data-placement="bottom">
            <i class="icon-calendar date-icon-dashboard"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <?php _e('  امروز :', 'tiva'); ?><?php echo $date->date("l j F Y "); ?>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title user-welcome-title">
    <small><?php echo 'خوش آمدید';
        echo '  ';
        echo wp_get_current_user()->display_name;
        echo '  ';
        echo 'عزیز'; ?></small>
</h1>
<!-- END PAGE TITLE-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                          data-value="1349"><?php echo tiva_change_number($count_comments->total_comments) ?></span>
                </div>
                <div class="desc"><?php _e('کل دیدگاه های سایت', 'tiva'); ?> </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                          data-value="12,5"><?php $count_posts_download = wp_count_posts('download');
                        echo tiva_change_number($count_posts->publish + $count_posts_download->publish) ?></span>
                </div>
                <div class="desc"><?php _e('کل مطالب سایت', 'tiva'); ?></div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa fa-users" aria-hidden="true"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                          data-value="549"><?php echo tiva_change_number($count_users['total_users']) ?></span>
                </div>
                <div class="desc"><?php _e('کل کاربران سایت', 'tiva'); ?></div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-pencil-square-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                          data-value="89"><?php echo tiva_change_number($count_author); ?></span>
                </div>
                <div class="desc"><?php _e('کل مدیران سایت', 'tiva'); ?></div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->
<div class="row">
    <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-dark hide"></i>
                    <span class="caption-subject font-hide bold uppercase"><?php _e('جدیدترین کاربران عضو شده', 'tiva') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <?php
                    $args = array(
                        'orderby' => 'registered',
                        'order' => 'DESC',
                        'number' => 3,
                    );

                    // The Query
                    $user_query = new WP_User_Query($args);

                    // User Loop
                    if (!empty($user_query->results)) {
                        foreach ($user_query->results as $user) :?>
                            <div class="col-md-4 admin-dash-user">
                                <div class="user-block-ribbon admin-widget-ribbon mt-element-ribbon">
                                    <div class="ribbon ribbon-border-hor ribbon-clip ribbon-color-success ribbon-border-dash-hor uppercase">
                                        <div class="ribbon-sub ribbon-clip"></div>
                                        <?php
                                        $user_data = get_userdata($user->ID);
                                        $registered = $user_data->user_registered;
                                        echo 'عضویت در : ' . $date->date('Y/m/d', strtotime($registered));
                                        ?>
                                    </div>
                                </div>
                                <div class="mt-widget-1">
                                    <div class="mt-img">
                                        <img src="<?php echo esc_url(tiva_get_user_avatar($user->ID)); ?>" width="130"
                                             height="130">
                                    </div>
                                    <div class="mt-body">
                                        <h3 class="mt-username"><?php echo $user->display_name; ?></h3>
                                        <p class="mt-user-title"><?php echo (get_user_meta($user->ID, 'tiva_user_expertise', true) !== '') ? get_user_meta($user->ID, 'tiva_user_expertise', true) : 'بدون تخصص'; ?></p>
                                        <div class="mt-stats">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php
                    } else {
                        $html = '';
                        $html .= '<div class="note note-danger">';
                        $html .= ' <h4 class="block">';
                        $html .= 'متاسفیم !';
                        $html .= '</h4>';
                        $html .= '<p>';
                        $html .= ' مدیر محترم ! کاربر فعالی با نقش نویسنده در سایت یافت نشد. ';
                        $html .= '</p>';
                        $html .= '</div>';
                        echo $html;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption">
                    <i class=" icon-social-twitter font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase"><?php _e('تازه ترین پیام های ارسالی ') ?></span>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_actions_pending" data-toggle="tab"> <?php _e('پیام های ارسالی شما') ?> </a>
                    </li>
                    <li>
                        <a href="#tab_actions_completed"
                           data-toggle="tab"> <?php _e('پیام های ارسالی مدیران همکار') ?> </a>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_actions_pending">
                        <!-- BEGIN: Actions -->
                        <div class="mt-actions">
                            <?php
                            global $wpdb;
                            $db_prefix = $wpdb->prefix;
                            $current_admin = get_current_user_id();
                            $tiva_msg_table = $db_prefix . 'tiva_msg';
                            $result = $wpdb->get_results("SELECT * FROM {$tiva_msg_table}  WHERE `admin_id` = {$current_admin} ORDER BY `id` ASC LIMIT 5");
                            foreach ($result as $print) {
                                ?>
                                <div class="mt-action">
                                    <div class="mt-action-img admin-widget-msg-avatar">
                                        <img class="admin-widget-msg-avatar"
                                             src="<?php echo esc_url(tiva_get_user_avatar($print->admin_id)); ?>"
                                             width="50" height="50"/></div>
                                    <div class="mt-action-body">
                                        <div class="mt-action-row">
                                            <div class="mt-action-info ">
                                                <div class="mt-action-icon ">
                                                    <i class="icon-envelope"></i>
                                                </div>
                                                <div class="mt-action-details ">
                                                    <span class="mt-action-author"><?php
                                                        $user_info = get_userdata($print->admin_id);
                                                        echo $user_info->display_name; ?></span>
                                                    <p class="mt-action-desc">
                                                        <?php karino_custom_msg_table_echo($print->subject,20) ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="mt-action-datetime ">
                                                <span class="mt-action-date"><?php echo $print->send_at_time; ?></span>
                                                <span class="mt-action-dot bg-green"></span>
                                                <span class="mt=action-time"><?php echo $print->send_at_date; ?></span>
                                            </div>
                                            <div class="mt-action-buttons ">
                                                <div class="text-center">
                                                    <a href="<?php echo home_url() . '/admin-panel/single-show-msg?msg_id=' . urlencode(base64_encode($print->id)) . '&view=' . urlencode(base64_encode("true")) . '' ?>"
                                                       class="btn btn-outline btn-circle red btn-sm blue">
                                                        <i class="fa fa-eye"></i>
                                                        نمایش پیام
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <!-- END: Actions -->
                    </div>
                    <div class="tab-pane" id="tab_actions_completed">
                        <!-- BEGIN:Completed-->
                        <div class="mt-actions">
                            <?php
                            global $wpdb;
                            $db_prefix = $wpdb->prefix;
                            $current_admin=get_current_user_id();
                            $tiva_msg_table = $db_prefix . 'tiva_msg';
                            $result = $wpdb->get_results("SELECT * FROM {$tiva_msg_table} ORDER BY `id` ASC LIMIT 5");
                            foreach ($result as $print) {
                                ?>
                                <div class="mt-action">
                                    <div class="mt-action-img admin-widget-msg-avatar">
                                        <img class="admin-widget-msg-avatar" src="<?php echo esc_url(tiva_get_user_avatar($print->admin_id)); ?>" width="50" height="50"/></div>
                                    <div class="mt-action-body">
                                        <div class="mt-action-row">
                                            <div class="mt-action-info ">
                                                <div class="mt-action-icon ">
                                                    <i class="icon-envelope"></i>
                                                </div>
                                                <div class="mt-action-details ">
                                                    <span class="mt-action-author"><?php
                                                        $user_info = get_userdata($print->admin_id);
                                                        echo $user_info->display_name ;?></span>
                                                    <p class="mt-action-desc">
                                                        <?php karino_custom_msg_table_echo($print->subject,20) ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="mt-action-datetime ">
                                                <span class="mt-action-date"><?php echo $print->send_at_time ; ?></span>
                                                <span class="mt-action-dot bg-green"></span>
                                                <span class="mt=action-time"><?php echo $print->send_at_date ; ?></span>
                                            </div>
                                            <div class="mt-action-buttons ">
                                                <div class="text-center">
                                                    <a href="<?php echo home_url() . '/admin-panel/single-show-msg?msg_id=' . urlencode(base64_encode($print->id)) . '&view=' . urlencode(base64_encode("true")) . '' ?>"
                                                       class="btn btn-outline btn-circle red btn-sm blue">
                                                        <i class="fa fa-eye"></i>
                                                        نمایش پیام
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

