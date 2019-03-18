<?php
$date = new jDateTime(true, true, 'Asia/Tehran');

if (isset($_GET['userID']) && intval($_GET['userID']) > 0) {
    wp_verify_nonce($_GET['_wpnonce']) || wp_die('دسترسی شما نامعتبر است.');
    $user_id = $_GET['userID'];
    if (isset($_POST['vip_user_update'])) {
        if (empty($_POST['wallet_inventory']) && $_POST['vip_plan_time'] === 'empty') {
            tiva_show_notification('لطفا اطلاعات مورد نظر را وارد کنید.', 'error');
        } else {

            if ($_POST['vip_plan_time'] != 'empty') {
                update_user_meta($user_id, 'is_user_vip', 'true');
                if (get_user_meta($user_id, 'expiration_date_Vip', true) === '') {
                    update_user_meta($user_id, 'expiration_date_Vip', date('Y-m-d', strtotime('+' . (int)$_POST['vip_plan_time'] . ' month', time())));
                } else {
                    $old_expiration_date_Vip_get_user_meta = get_user_meta($user_id, 'expiration_date_Vip', true);
                    update_user_meta($user_id, 'expiration_date_Vip', date('Y-m-d', strtotime('+' . (int)$_POST['vip_plan_time'] . ' month', strtotime($old_expiration_date_Vip_get_user_meta))));
                }
//        $alert='موجودی کاربر مورد نظر با موفقیت بروز شد.';
                tiva_show_notification('عضویت ویژه کاربر با موفقیت بروز شد.', 'success');
            }
        }
    }
    if (isset($_POST['vip_user_remove'])) {
        delete_user_meta($user_id, 'is_user_vip');
        delete_user_meta($user_id, 'expiration_date_Vip');
        tiva_show_notification('عضویت ویژه این کاربر با موفقیت حذف شد', 'success');
    }
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
            <span><?php _e('مدیریت کاربران', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('ویرایش کاربر', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('کاربران ویژه', 'tiva'); ?>
    <small><?php _e('مدیریت کاربران ویژه سایت (فعال کردن یا غیرفعال کردن عضویت ویژه)', 'tiva'); ?></small>
</h1>
<br>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-edit font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('ویرایش اطلاعات', 'tiva') ?></span>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="post" role="form">
                    <div class="form-group">
                        <label class="control-label"><?php _e('مدت زمان', 'tiva'); ?></label>
                        <select name='vip_plan_time' id="catSelect" class="form-control">
                            <option value="empty">مدت زمان مد نظر خود را تنظیم کنید</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++):
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo tiva_change_number($i) . ' ماهه ' ?></option>
                            <?php
                            endfor;
                            ?>
                        </select>
                    </div>
                    <div class=" margiv-top-10">
                        <button type="submit" class="btn green"
                                name="vip_user_update"><?php _e('بروزرسانی اطلاعات کاربر', 'tiva'); ?></button>
                    </div>
                </form>
                <br>
                <div class="alert alert-info text-center">
                    <strong>مدیر محترم چنانچه تمایل به حذف ویژه بودن این کاربر دارید کلیک کنید</strong>
                </div>

                <br>
                <form method="post" action="">
                    <div class="text-center">
                        <button type="submit" class="btn red"
                                name="vip_user_remove"><?php _e(' حذف ویژه بودن', 'tiva'); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
    <br>
    <div class="col-md-12 col-sm-12 ">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <form method="post" name="create_users_group" role="form">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-user font-red-sunglo" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase"><?php _e('جزییات اطلاعات کاربر', 'tiva') ?></span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                           id="sample_3">
                        <thead>
                        <tr>
                            <th class="text-center"><?php _e('تصویر کاربر', 'tiva') ?></th>
                            <th class="text-center"> <?php _e('نام کاربری', 'tiva') ?> </th>
                            <th class="text-center"> <?php _e('ایمیل', 'tiva') ?>  </th>
                            <th class="text-center"> <?php _e('نقش کاربری', 'tiva') ?>  </th>
                            <th class="text-center"> <?php _e('وضعیت', 'tiva') ?>  </th>
                            <th class="text-center">  <?php _e('تاریخ عضویت ', 'tiva') ?> </th>
                            <th class="text-center">  <?php _e('اتمام vip', 'tiva') ?> </th>
                            <th class="text-center">  <?php _e('موجودی کیف پول', 'tiva') ?> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">
                            <td class="text-center">
                                <img width="50" height="50"
                                     src="<?php echo esc_url(tiva_get_user_avatar((int)$user_id)); ?>"/>
                            </td>
                            <td> <?php echo get_userdata((int)$user_id)->user_login ?></td>
                            <td class="text-center">
                                <a href="mailto:<?php echo get_userdata((int)$user_id)->user_email; ?>"> <?php echo get_userdata((int)$user_id)->user_email; ?> </a>
                            </td>
                            <td class="text-center">
                                <span> <?php echo karino_get_user_role((int)$user_id); ?></span>
                            </td>
                            <td class="text-center">
                                        <span> <?php
                                            if (get_user_meta((int)$user_id, 'is_user_vip', true) === 'true') {
                                                echo '<span class="label label-warning">کاربر ویژه</span>';

                                            } else {
                                                echo '<span class="label label-info">کاربر عادی</span>';

                                            }
                                            ?></span>
                            </td>
                            <td class="text-center"><?php
                                $user_data = get_userdata((int)$user_id);
                                $registered = $user_data->user_registered;
                                echo $date->date('Y/m/d', strtotime($registered));
                                ?></td>
                            <td class="text-center"><?php
                                if (empty(get_user_meta((int)$user_id, 'expiration_date_Vip', true))) {
                                    echo '---';
                                } else {
                                    echo $date->date('Y/m/d', strtotime(get_user_meta($user_id, 'expiration_date_Vip', true)));
                                }

                                ?></td>
                            <td class="text-center">
                                <?php echo tiva_change_number(number_format(tiva_get_user_wallet_balance((int)$user_id))) . ' تومان ' ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
