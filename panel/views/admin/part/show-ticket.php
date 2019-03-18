<?php

//admin show tickets

$date = new jDateTime(true, true, 'Asia/Tehran');

global $wpdb, $table_prefix, $replayOk;
$current_user = wp_get_current_user();
$ticket_item = null;
$ticket_replies = null;

if (isset($_GET['ticket_id']) && intval($_GET['ticket_id']) > 0) {
    wp_verify_nonce($_GET['_wpnonce']) || wp_die('دسترسی شما نامعتبر است.');
    $ticket_id = intval($_GET['ticket_id']);

    if (isset($_POST['ticket_reply_submit'])) {
        if (empty($_POST['ticket_reply_content'])) {
            tiva_show_notification('لطفا متن پاسخ خود را وارد کنید.', 'error');
        } else {
            $ticket_reply_data = array(
                'ticket_reply_ticket_id' => $ticket_id,
                'ticket_reply_user_id' => $current_user->ID,
                'ticket_reply_content' => nl2br(sanitize_textarea_field($_POST['ticket_reply_content'])),
                'ticket_reply_create_at' => date('Y-m-d H:i:s'),
                'ticket_reply_attachment' => $_POST['ticket_reply_attachment']
            );
            $wpdb->insert($table_prefix . 'tiva_ticket_replies', $ticket_reply_data, array(
                '%d',
                '%d',
                '%s',
                '%s',
                '%s',
            ));
            $ticket_reply_id = $wpdb->insert_id;
            if ($ticket_reply_id > 0) {
                // update ticket ...
                $updateResult = $wpdb->update(
                    $table_prefix . 'tiva_tickets',
                    array(
                        'ticket_update_at' => date('Y-m-d H:i:s'),    // string
                        'ticket_status' => (int)$_POST['ticket_reply_status']    // integer (number)
                    ),
                    array('ticket_id' => $ticket_id),
                    array(
                        '%s',    // value1
                        '%d'    // value2
                    ),
                    array('%d')
                );
                if ($updateResult > 0) {
//				    send email for user
                    $replayOk = true;
                } else {
                    tiva_show_notification('ارسال پاسخ شما با مشکل رو به رو شده است بعدا تلاش کنید.', 'error');
                }
            }
        }
    }


    //	begin ticket query
    $ticket_item = $wpdb->get_row($wpdb->prepare("
        SELECT * 
        FROM {$table_prefix}tiva_tickets
        WHERE  ticket_id = %d
    ", $ticket_id));
    if ($ticket_item) {
        $ticket_replies = $wpdb->get_results($wpdb->prepare("
            SELECT * 
            FROM {$table_prefix}tiva_ticket_replies
            WHERE ticket_reply_ticket_id = %d
        ", $ticket_id));
    }


    if ($replayOk == true) {
        $to = get_userdata($ticket_item->ticket_user_id)->user_email;
        $subject = get_bloginfo('name') . ' | پاسخ جدید برای شما ';
        $message = tiva_user_oprator_reply_ticket_email_temp($userDispalyName = get_userdata($ticket_item->ticket_user_id)->display_name, $operatorDispalyName = get_userdata(get_current_user_id())->display_name, $dateTime = jdate('d-m-Y H:i:s'));
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: =?utf-8?b?" . base64_encode(get_bloginfo('name')) . "?= <" . get_bloginfo('admin_email') . ">\r\n";
        $headers .= "Content-Type: text/html;charset=utf-8\r\n";
        $headers .= "Reply-To " . get_bloginfo('admin_email') . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $mail = wp_mail($to, $subject, $message, $headers);
        if ($mail) {
            tiva_show_notification('پاسخ مورد نظر شما با موفقیت ارسال شد.', 'success');
        }
    }
}

if ( isset($ticket_item->ticket_id) != intval( $_GET['ticket_id'] ) || is_null($ticket_item->ticket_id)) {

    die('        <div class="alert alert-danger text-center">
            <strong>کاربر محترم درخواست شما نامعتبر است.</strong>
        </div>');

}

?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/admin-panel/admin-dashboard"><?php _e('داشبورد', 'tiva'); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('تیکت ها', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('نمایش جزییات تیکت', 'tiva'); ?></span>
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
<br>
<br>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?php echo esc_url(tiva_get_user_avatar((int)$ticket_item->ticket_user_id)); ?>"
                         class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"><?php echo get_userdata($ticket_item->ticket_user_id)->display_name ?></div>
                    <div class="profile-usertitle-job"><?php echo get_user_meta($ticket_item->ticket_user_id, 'unit_supporter', true) ?></div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet light ">
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="uppercase profile-stat-title"><?php echo tiva_change_number(tiva_get_user_comment_count($ticket_item->ticket_user_id, '1')); ?></div>
                        <div class="uppercase profile-stat-text"><?php _e('نظرات ', 'tiva'); ?></div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="uppercase profile-stat-title"><?php echo tiva_change_number(intval(tiva_get_user_score($ticket_item->ticket_user_id))); ?></div>
                        <div class="uppercase profile-stat-text"> <?php _e('امتیاز', 'tiva'); ?></div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="uppercase profile-stat-title"><?php echo tiva_change_number(count_user_posts($ticket_item->ticket_user_id)); ?></div>
                        <div class="uppercase profile-stat-text"> <?php _e('مطلب', 'tiva'); ?></div>
                    </div>
                </div>
                <!-- END STAT -->
                <div>
                    <h4 class="profile-desc-title"><?php _e('بیوگرافی', 'tiva');
                        echo "  ";
                        echo get_userdata($ticket_item->ticket_user_id)->display_name; ?></h4>
                    <span class="profile-desc-text"> <?php echo get_userdata($ticket_item->ticket_user_id)->description; ?> </span>
                    <div class="margin-top-20 profile-desc-link">
                        <?php echo tiva_get_supporter_social_network_icon('web', $ticket_item->ticket_user_id); ?>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <?php echo tiva_get_supporter_social_network_icon('telegram', $ticket_item->ticket_user_id); ?>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <?php echo tiva_get_supporter_social_network_icon('instagram', $ticket_item->ticket_user_id); ?>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <?php echo tiva_get_supporter_social_network_icon('linkedin', $ticket_item->ticket_user_id); ?>
                    </div>
                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN TICKET DETAILS CONTENT -->
        <div class="app-ticket app-ticket-details">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <?php if (isset($ticket_item) && !is_null($ticket_item)): ?>
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">جزییات تیکت</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="ticket-id bold font-blue"><?php echo tiva_change_number($ticket_item->ticket_id) . ' # ' ?></div>
                                    <div class="ticket-title bold uppercase font-blue"><?php echo tiva_change_number($ticket_item->ticket_title) ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="ticket-cust">
                                        <span class="bold">ثبت شده توسط :</span>
                                        <span><?php echo get_userdata($ticket_item->ticket_user_id)->display_name ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="ticket-date">
                                        <span class="bold">وضعیت :</span>
                                        <?php if ($ticket_item->ticket_status == 0): ?>
                                            <span class="label label-success"> باز </span>
                                        <?php elseif ($ticket_item->ticket_status == 1): ?>
                                            <span class="label label-default"> در حال انجام </span>
                                        <?php elseif ($ticket_item->ticket_status == 2): ?>
                                            <span class="label label-primary">پاسخ داده شد</span>
                                        <?php elseif ($ticket_item->ticket_status == 3): ?>
                                            <span class="label label-warning">بسته</span>
                                        <?php elseif ($ticket_item->ticket_status == 4): ?>
                                            <span class="label label-danger">بسته سیستمی</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="ticket-date">
                                        <span class="bold">تاریخ و ساعت ثبت :</span> <?php echo jdate("d-m-Y - H:i:s", $ticket_item->ticket_create_at) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="ticket-msg">
                                        <h3>
                                            <i class="icon-note"></i>متن تیکت</h3>
                                        <p class="ticket-content"> <?php echo tiva_change_number($ticket_item->ticket_content) ?></p>
                                        <p>
                                            <?php if (!empty($ticket_item->ticket_attachment)): ?>
                                        <div class="row ticket-replay-att-wrapper">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="alert alert-info text-center">
                                                    <span>این تیکت دارای یک پیوست است برای  <strong><a
                                                                    href="<?php echo $ticket_item->ticket_attachment ?> "> دانلود </a></strong>کلیک کنید.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ticket-line"></div>
                            <?php if ($ticket_replies && is_array($ticket_replies) && count($ticket_replies) > 0): ?>
                                <?php foreach ($ticket_replies as $reply
                                ): ?>
                                    <div class="ticket-reply-wrapper">
                                        <div class="portlet box <?php
                                        if ($reply->ticket_reply_user_id > 0) {
                                            if ($reply->ticket_reply_user_id == $ticket_item->ticket_user_id) {
                                                echo 'green-meadow';
                                            } else {
                                                echo 'red';
                                            }
                                        } else {
                                            echo 'blue-hoki';
                                        }


                                        ?>">
                                            <div class="portlet-title">
                                                <div class="user-name-reply">
                                                    <i class="fa fa-reply"></i> <?php
                                                    if ($reply->ticket_reply_user_id > 0) {
                                                        echo 'پاسخ از : ' . get_userdata($reply->ticket_reply_user_id)->display_name;
                                                    } else {
                                                        echo 'پاسخ از : اتوماسیون سایت ';

                                                    }
                                                    ?>
                                                </div>
                                                <div class="ticket-replay-date">
                                                    <i class="fa fa-calendar"
                                                       aria-hidden="true"></i> <?php echo 'تاریخ و ساعت ثبت : ' . jdate("d-m-Y - H:i:s", $reply->ticket_reply_create_at); ?>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <!--                                                --><?php //var_dump($reply->ticket_reply_attachment) ?>
                                                <p class="ticket-replay-content"><?php echo $reply->ticket_reply_content; ?></p>
                                                <?php if (!empty($reply->ticket_reply_attachment)): ?>
                                                    <div class="row ticket-replay-att-wrapper">
                                                        <div class="col-md-8 col-md-offset-2">
                                                            <div class="alert alert-info text-center">
                                                                <span>این پاسخ دارای یک پیوست است برای  <strong><a
                                                                                href="<?php echo $reply->ticket_reply_attachment ?> "> دانلود </a></strong>کلیک کنید.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-info text-center">
                                    <p>هیچ پاسخی برای تیکت شما ثبت نشده است.</p>
                                </div>
                            <?php endif; ?>
                            <form class="form-group" method="post" action="">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h3>
                                            <i class="icon-action-redo"></i> ارسال پاسخ جدید </h3>
                                        <textarea name="ticket_reply_content" class="ticket-reply-msg"
                                                  row="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3 class="ticket-margin">
                                            <i class="icon-info"></i> وضعیت</h3>
                                        <select name="ticket_reply_status" class="ticket-status">
                                            <option value="0">باز</option>
                                            <option value="1">در حال انجام</option>
                                            <option value="2">پاسخ داده شده</option>
                                            <option value="3">بسته</option>
                                            <option value="4">بسته سیستمی</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="ticket-margin">
                                            <i class="fa fa-paperclip"></i> پیوست </h3>
                                        <div class="input-group">
                                            <input type="url" id="ticket_att"
                                                   name="ticket_reply_attachment" class="ticket-status  form-control">
                                            <span class="input-group-btn"><a id="up_ticket_att" href="#"
                                                                             class="btn red " type="button"> پیوست </a></span>
                                            <!-- /input-group -->
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-square uppercase bold green" type="submit"
                                        name="ticket_reply_submit">ارسال
                                </button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
