<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
if (isset($_POST['send_msg'])) {
    do_action('karino_send_msg_for_user');
} elseif (isset($_POST['create_users_group_submit'])) {
    do_action('karino_create_users_group');
} elseif (isset($_GET['delete_group'])) {
    do_action('karino_delete_users_group_msg');
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
            <span><?php _e('ایجاد گروه کاربری', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('ایجاد گروه کاربری', 'tiva'); ?>
    <small><?php _e('ایجاد گروه های کاربری دلخواه برای ارسال پیام به اعضای گروه کاربری مورد نظر', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-10 col-sm-10 col-sm-offset-1">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <form method="post" name="create_users_group" role="form">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-users font-red-sunglo" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase"><?php _e('لیست تمام کاربران سایت شما', 'tiva') ?></span>
                    </div>
                    <div class="tools"></div>
                </div>
                <a class="btn green" href="<?php echo home_url() . '/admin-panel/create-user-group'; ?>">
                    <?php _e('ایجاد گروه کاربری جدید', 'tiva') ?>
                    <i class="fa fa-plus"></i>
                </a>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th><?php _e('شناسه گروه', 'tiva') ?></th>
                            <th> <?php _e('نام گروه', 'tiva') ?> </th>
                            <th> <?php _e('تاریخ ایجاد', 'tiva') ?>  </th>
                            <th> <?php _e('سازنده گروه', 'tiva') ?>  </th>
                            <th> <?php _e('عملیات', 'tiva') ?>  </th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        global $wpdb;
                        $db_prefix = $wpdb->prefix;
                        $tiva_msg_table = $db_prefix . 'tiva_users_group_msg';
                        $current_admin = get_current_user_id();
                        $result = $wpdb->get_results("SELECT * FROM {$tiva_msg_table} WHERE 1");
                        foreach ($result as $print) {
                            ?>
                            <tr>
                            <td><?php echo tiva_change_number($print->group_id) . '#'; ?></td>
                            <td><?php echo $print->group_name; ?></td>
                            <td><?php echo $print->create_at; ?></td>
                            <td><?php $user_info = get_userdata($print->create_by_admin);
                                echo $user_info->display_name; ?></td>
                            <td class="text-center">
                            <?php if ($print->group_id != '1'): ?>
                                <a href="<?php echo home_url() . '/admin-panel/user-group-list?group_id=' . urlencode(base64_encode($print->group_id)) . '&delete_group=' . urlencode(base64_encode("true")) . '' ?>" class="btn btn-outline btn-circle dark btn-sm red"><i class="fa fa-trash-o"></i> حذف گروه </a>
                                <a href="<?php echo home_url() . '/admin-panel/show_users_group?group_id=' . urlencode(base64_encode($print->group_id)) . '&edit_group=' . urlencode(base64_encode("true")) . '' ?>" class="btn btn-outline btn-circle green btn-sm blue"><i class="fa fa-edit"></i> ویرایش گروه</a>
                                <a href="<?php echo home_url() . '/admin-panel/show_users_group_view?group_id=' . urlencode(base64_encode($print->group_id)) . '&view_group=' . urlencode(base64_encode("true")) . '' ?>" class="btn btn-outline btn-circle dark btn-sm black"><i class="fa fa-eye"></i> نمایش </a>
                                <?php endif; ?>
                                </td>
                                </tr>
                            <?php }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
