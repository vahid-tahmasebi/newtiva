<?php
$msg_id = $_GET['msg_id'];
$date = new jDateTime(true, true, 'Asia/Tehran');
?>

<?php
//$args = array(
//    'order' => 'ASC',
//);
//$all_users = get_users($args);
//$admin_info = get_userdata(get_current_user_id());
//global $users_email;
//foreach ($all_users as $user) {
//    $users_email[]=$user->user_email;
//
//    $to = $user->user_email ;//$users_email;
//    $subject = 'دریافت پیام جدید ';
//
//    $message = 'سلام کاربر عزیز !  شما از طرف مدیر یک پیام تازه دریافت کرده اید لطفا پنل کاربری خود را بررسی کنید. ';
//
//    $headers = "MIME-Version: 1.0\r\n";
//    $headers .= "From: =?utf-8?b?" . base64_encode(get_bloginfo('name')) . "?= <" . $admin_info->user_email . ">\r\n";
//    $headers .= "Content-Type: text/plain;charset=utf-8\r\n";
//    $headers .= "Reply-To " . $admin_info->user_email . "\r\n";
//    $headers .= "X-Mailer: PHP/" . phpversion();
//    $result = wp_mail($to, $subject, $message, $headers);
//    var_dump($result);
//}
//
//
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/admin-panel/admin-dashboard"><?php _e('داشبورد', 'tiva'); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('مدیریت پیام ها', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('نمایش پیام', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('مدیریت پیام ها', 'tiva'); ?>
    <small><?php _e('نمایش پیام ارسالی', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-envelope-open-o font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('نمایش پیام', 'tiva') ?></span>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="post" role="form" action="" id="send_msg" name="send_msg">
                    <div class="form-group"><label
                                class="control-label"><?php _e('موضوع پیام ', 'tiva'); ?></label><input disabled
                                                                                                        type="text"
                                                                                                        name="msg_subject"
                                                                                                        value="<?php echo karino_get_msg($msg_id, 'subject'); ?>"
                                                                                                        class="form-control"/>
                    </div>
                    <div class="form-group"><label class="control-label"><?php _e('ارسال شده توسط', 'tiva'); ?></label>
                        <input disabled type="text"
                               value="<?php
                               if (is_numeric(karino_get_msg($msg_id, 'sender'))) {
                                   $user_info = get_userdata(karino_get_msg($msg_id, 'sender'));
                                   echo $user_info->display_name;
                               } ?>
                               " class="form-control"/>
                    </div>
                    <div class="form-group"><label
                                class="control-label"><?php _e('تاریخ و ساعت ارسال پیام', 'tiva'); ?></label><input
                                disabled type="text" value="<?php echo karino_get_msg($msg_id, 'send_at_date');
                        echo ' در ساعت ' . karino_get_msg($msg_id, 'send_at_time'); ?>" class="form-control"/></div>
                    <div class="form-group"><label class="control-label"><?php _e('متن پیام', 'tiva'); ?></label>
                        <textarea disabled name="msg" class="form-control "
                                  rows="10"><?php echo karino_get_msg($msg_id, 'msg'); ?></textarea>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>