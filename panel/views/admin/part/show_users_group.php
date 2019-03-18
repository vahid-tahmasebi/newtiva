<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
$group_id = base64_decode(urldecode($_GET['group_id']));
if (isset($_POST['update_users_group_submit'])) {
    do_action('karino_update_users_group');
} elseif (isset($_POST['delete_users_selected'])) {
    do_action('karino_delete_users_selected');
} elseif (isset($_POST['add_users_selected'])) {
    do_action('karino_add_users_selected');
}
?>
<div class="modal fade" id="add_user" role="dialog">
    <div class="modal-dialog modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="portlet light bordered">
                <form name="add_users_selected" method="post">


                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="fa fa-users font-red-sunglo" aria-hidden="true"></i>
                            <span class="caption-subject bold uppercase"><?php _e('لیست تمام کاربران سایت شما', 'tiva') ?></span>
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_5">
                            <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable"
                                               data-set="#sample_5 .checkboxes"/>
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
                            global $wpdb;
                            $db_prefix = $wpdb->prefix;
                            $tiva_msg_table = $db_prefix . 'tiva_users_group_msg';
                            $tiva_users = $db_prefix . 'users';
                            $tiva_msg_table_handel = $db_prefix . 'tiva_users_group_msg_handel';
                            $result = $wpdb->get_results("SELECT * FROM {$tiva_users}
                                                                WHERE {$tiva_users}.ID NOT IN (SELECT {$tiva_msg_table_handel}.user_id FROM {$tiva_msg_table_handel} )");
                            foreach ($result as $user) { ?>
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
                                    <td> <?php $user_data = get_userdata($user->ID);
                                        echo $user_data->display_name; ?></td>
                                    <td>
                                        <a href="mailto:<?php ?>">
                                            <?php $user_data = get_userdata($user->ID);
                                            echo $user_data->user_email;
                                            ?> </a>
                                    </td>
                                    <td>
                                        <span> <?php echo karino_get_user_role($user->ID); ?></span>
                                    </td>
                                    <td><?php
                                        $user_data = get_userdata($user->ID);
                                        $registered = $user_data->user_registered;
                                        echo $date->date('Y/m/d', strtotime($registered));
                                        ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                    <button type="submit" class="btn green"
                            name="add_users_selected"><?php _e('اضافه کردن کاربر', 'tiva') ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
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
            <span><?php _e('لیست گروه های کاربردی', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('ویرایش گروه کاربری', 'tiva'); ?>
    <small><?php _e('ویرایش گروه کاربری مورد نظر', 'tiva'); ?></small>
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
                        <span class="caption-subject bold uppercase"><?php _e('ویرایش نام گروه کاربری', 'tiva') ?></span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-group">
                        <?php
                        global $wpdb;
                        $db_prefix = $wpdb->prefix;
                        $tiva_msg_table = $db_prefix . 'tiva_users_group_msg';
                        $tiva_msg_table_handel = $db_prefix . 'tiva_users_group_msg_handel';
                        $result = $wpdb->get_results("SELECT {$tiva_msg_table}.group_name FROM {$tiva_msg_table}
                                                            WHERE {$tiva_msg_table}.group_id={$group_id}");
                        ?>
                        <label class="control-label"><?php _e('نام گروه کاربری', 'tiva'); ?></label>
                        <input type="text" name="users_group_name" value="<?php echo $result[0]->group_name; ?>" class="form-control"/></div>
                </div>
                <button type="submit" class="btn green" name="update_users_group_submit"><?php _e('بروزرسانی نام گروه کاربری', 'tiva') ?></button>
            </div>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-users font-red-sunglo" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase"><?php _e('ویرایش اعضای گروه', 'tiva') ?></span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <div class="edit-users_action">
                        <div class="btn-group">
                            <button type="button" data-toggle="modal" data-target="#add_user" class="btn sbold blue">
                                اضافه کردن کاربر جدید
                                <i class="fa fa-plus"></i>
                            </button>
                            <button id="delete_users_selected" name="delete_users_selected" class="btn sbold red"> حذف
                                کاربران انتخاب شده
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
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
                        global $wpdb;
                        $db_prefix = $wpdb->prefix;
                        $tiva_msg_table = $db_prefix . 'tiva_users_group_msg';
                        $tiva_msg_table_handel = $db_prefix . 'tiva_users_group_msg_handel';
                        $result = $wpdb->get_results("SELECT * FROM {$tiva_msg_table}
                                                            INNER JOIN {$tiva_msg_table_handel}
                                                            ON {$tiva_msg_table}.group_id = {$tiva_msg_table_handel}.group_id
                                                            WHERE {$tiva_msg_table}.group_id={$group_id}");
                        foreach ($result as $user) { ?>
                            <tr class="odd gradeX">
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" value="<?php echo $user->user_id; ?>"
                                               name="user_id[]"/>
                                        <span></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <img width="50" height="50"
                                         src="<?php echo esc_url(tiva_get_user_avatar($user->user_id)); ?>"/>
                                </td>
                                <td> <?php $user_data = get_userdata($user->user_id);
                                    echo $user_data->display_name; ?></td>
                                <td>
                                    <a href="mailto:<?php ?>">
                                        <?php $user_data = get_userdata($user->user_id);
                                        echo $user_data->user_email;
                                        ?> </a>
                                </td>
                                <td>
                                    <span> <?php echo karino_get_user_role($user->user_id); ?></span>
                                </td>
                                <td><?php
                                    $user_data = get_userdata($user->user_id);
                                    $registered = $user_data->user_registered;
                                    echo $date->date('Y/m/d', strtotime($registered));
                                    ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


<!-- Trigger the modal with a button -->
<!-- Modal -->

