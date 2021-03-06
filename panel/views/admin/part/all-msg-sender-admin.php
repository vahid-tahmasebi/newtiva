<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
if (isset($_POST['send_msg'])) {
    do_action('karino_send_msg_for_user');
}

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
            <span><?php _e('پیام های ارسالی مدیران', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('پیام های ارسالی مدیران', 'tiva'); ?>
    <small><?php _e('نمایش تمام پیام های ارسال شده توسط همکاران شما ', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-envelope-o font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('لیست پیام های ارسالی مدیران همکار', 'tiva') ?></span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th><?php _e('شناسه پیام', 'tiva') ?> </th>
                        <th><?php _e('موضوع', 'tiva') ?> </th>
                        <th><?php _e('متن پیام', 'tiva') ?> </th>
                        <th><?php _e('تاریخ', 'tiva') ?> </th>
                        <th><?php _e('ساعت', 'tiva') ?> </th>
                        <th><?php _e('نام مدیر', 'tiva') ?> </th>
                        <th><?php _e('عملیات', 'tiva') ?> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    global $wpdb;
                    $db_prefix = $wpdb->prefix;
                    $tiva_msg_table = $db_prefix . 'tiva_msg';
                    $result = $wpdb->get_results("SELECT * FROM {$tiva_msg_table} WHERE 1");
                    foreach ($result as $print) {
                        ?>
                        <tr>
                            <td><?php echo tiva_change_number($print->id) . '#' ?></td>
                            <td><?php karino_custom_msg_table_echo($print->subject,20) ; ?></td>
                            <td><?php karino_custom_msg_table_echo($print->msg,75); ?></td>
                            <td>
                                <?php
                                echo $print->send_at_date;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $print->send_at_time;
                                ?>
                            </td>
                            <td><?php
                                $user_info = get_userdata($print->admin_id);
                                echo $user_info->display_name ;
                                ?></td>
                            <td class="text-center">
                                <a href="<?php echo home_url() . '/admin-panel/single-show-msg?msg_id=' . urlencode(base64_encode($print->id)) . '&view=' . urlencode(base64_encode("true")) . '' ?>" class="btn btn-outline btn-circle red btn-sm blue">
                                    <i class="fa fa-eye"></i>
                                    <?php _e('نمایش پیام', 'tiva') ?>
                                </a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
