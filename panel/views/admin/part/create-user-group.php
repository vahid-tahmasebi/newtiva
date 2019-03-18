<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
if (isset($_POST['send_msg'])) {
    do_action('karino_send_msg_for_user');
}
if (isset($_POST['create_users_group_submit'])) {
    do_action('karino_create_users_group');
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
                        <i class="fa  fa-pencil-square-o   font-red-sunglo" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase"><?php _e('انتخاب نام برای گروه کاربری', 'tiva') ?></span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-group">
                        <label class="control-label"><?php _e('نام گروه کاربری', 'tiva'); ?></label>
                        <input type="text"
                               name="users_group_name"
                               placeholder="<?php _e('لطفا نام گروه کاربری را وراد کنید', 'tiva'); ?>                                            "
                               class="form-control"/></div>
                </div>
            </div>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-users font-red-sunglo" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase"><?php _e('لیست تمام کاربران سایت شما', 'tiva') ?></span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                           id="sample_3">
                        <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                                    <span></span>
                                </label>
                            </th>
                            <th class="text-center"><?php _e('تصویر کاربر', 'tiva') ?></th>
                            <th> <?php _e('نام کاربری', 'tiva') ?> </th>
                            <th> <?php _e('ایمیل', 'tiva') ?>  </th>
                            <th> <?php _e('نقش کاربری', 'tiva') ?>  </th>
                            <th>  <?php _e('تاریخ عضویت ', 'tiva') ?> </th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $args = array(
                            'orderby' => 'registered',
                            'order' => 'ASC',
                        );

                        // The Query
                        $user_query = new WP_User_Query($args);

                        // User Loop
                        if (!empty($user_query->results)) {
                            foreach ($user_query->results as $user) :?>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="<?php echo $user->ID; ?>"
                                                   name="user_id[]"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <img width="50" height="50"
                                             src="<?php echo esc_url(tiva_get_user_avatar($user->ID)); ?>"/>
                                    </td>
                                    <td> <?php echo $user->display_name; ?></td>
                                    <td>
                                        <a href="mailto:<?php echo $user->user_email; ?>"> <?php echo $user->user_email; ?> </a>
                                    </td>
                                    <td>
                                        <span> <?php echo karino_get_user_role($user->ID); ?></span>
                                    </td>
                                    <td>                                         <?php
                                        $user_data = get_userdata($user->ID);
                                        $registered = $user_data->user_registered;
                                        echo $date->date('Y/m/d', strtotime($registered));
                                        ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn green"
                        name="create_users_group_submit"><?php _e('ایجاد گروه کاربری', 'tiva') ?></button>
            </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
