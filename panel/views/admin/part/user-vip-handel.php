<?php
$date = new jDateTime(true, true, 'Asia/Tehran');

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
            <span><?php _e('کاربران ویژه', 'tiva'); ?></span>
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
    <div class="col-md-12 col-sm-12 ">
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
                            <th class="text-center"> <?php _e('نام کاربری', 'tiva') ?> </th>
                            <th class="text-center"> <?php _e('ایمیل', 'tiva') ?>  </th>
                            <th class="text-center"> <?php _e('نقش کاربری', 'tiva') ?>  </th>
                            <th class="text-center"> <?php _e('وضعیت', 'tiva') ?>  </th>
                            <th class="text-center">  <?php _e('تاریخ عضویت ', 'tiva') ?> </th>
                            <th class="text-center">  <?php _e('اتمام vip', 'tiva') ?> </th>
                            <th class="text-center">  <?php _e('موجودی کیف پول', 'tiva') ?> </th>
                            <th class="text-center">  <?php _e('عملیات', 'tiva') ?> </th>
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
                                    <td class="text-center">
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
                                    <td> <?php echo $user->user_login; ?></td>
                                    <td class="text-center">
                                        <a href="mailto:<?php echo $user->user_email; ?>"> <?php echo $user->user_email; ?> </a>
                                    </td>
                                    <td class="text-center">
                                        <span> <?php echo karino_get_user_role($user->ID); ?></span>
                                    </td>
                                    <td class="text-center">
                                        <span> <?php
                                            if (get_user_meta($user->ID, 'is_user_vip', true) === 'true') {
                                                echo '<span class="label label-warning">کاربر ویژه</span>';

                                            } else {
                                                echo '<span class="label label-info">کاربر عادی</span>';

                                            }
                                            ?></span>
                                    </td>
                                    <td class="text-center"><?php
                                        $user_data = get_userdata($user->ID);
                                        $registered = $user_data->user_registered;
                                        echo $date->date('Y/m/d', strtotime($registered));
                                        ?></td>
                                    <td class="text-center"><?php
                                        if (empty(get_user_meta($user->ID, 'expiration_date_Vip', true))) {
                                            echo '---';
                                        } else {
                                            echo $date->date('Y/m/d', strtotime(get_user_meta($user->ID, 'expiration_date_Vip', true)));
                                        }

                                        ?></td>
                                    <td class="text-center">
                                        <?php echo tiva_change_number(number_format(tiva_get_user_wallet_balance($user->ID))) . ' تومان ' ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo wp_nonce_url(add_query_arg(array('userID' => $user->ID), site_url() . '/admin-panel/update-vip-user')) ?>"
                                           class="btn btn-outline btn-circle red btn-sm blue">
                                            <i class="fa fa-edit"></i>
                                            ویرایش
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
