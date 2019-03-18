<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
if (isset($_POST['send_msg'])) {
    do_action('karino_send_msg_for_user');
}

//$all_users = karino_get_users_with_group_id_msg_system('3');
//foreach ($all_users as $user) {
//
//    var_dump($user->user_id);
//}
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
            <span><?php _e('ارسال پیام', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('ارسال پیام', 'tiva'); ?>
    <small><?php _e('ارسال پیام به تمام کاربران عضو سایت شما', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-envelope-open-o font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('ارسال پیام به کاربران', 'tiva') ?></span>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="post" role="form" action="" id="send_msg" name="send_msg">
                    <div class="form-group">
                        <label class="control-label"><?php _e('موضوع پیام ', 'tiva'); ?></label>
                        <input type="text" name="msg_subject"
                               placeholder="<?php _e('موضوع پیام را وارد کنید', 'tiva'); ?> " class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php _e('گروه کاربران', 'tiva'); ?></label>
                        <select name="code_g_u" class="form-control">
                            <?php
                            global $table_name, $wpdb;
                            $table_name = $wpdb->prefix . 'tiva_users_group_msg';
                            $result = $wpdb->get_results("SELECT * FROM {$table_name} WHERE 1");
                            foreach ($result as $print) {
                                echo '<option value="' . $print->group_id . '">' . $print->group_name . '</option> ';
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php _e('متن پیام', 'tiva'); ?></label>
                        <textarea name="msg_content" class="form-control" rows="10"
                                  placeholder="متن پیام را وارد کنید"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php _e('بارگزاری فایل مورد نظر برای ارسال', 'tiva') ?></label>
                        <input type="url" style="direction: ltr" name="msg_url_att" class="form-control"
                               placeholder="لینک فایل پیوست پیام را وارد کنید ...">
                        <!-- /input-group -->
                    </div>
                    <div class="margiv-top-10">
                        <button type="submit" class="btn green"
                                name="send_msg"><?php _e('ارسال پیام', 'tiva'); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>