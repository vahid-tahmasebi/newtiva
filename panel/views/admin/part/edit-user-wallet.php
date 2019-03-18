<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
if (isset($_GET['user_id']) && intval($_GET['user_id']) > 0) {
    wp_verify_nonce($_GET['_wpnonce']) || wp_die('دسترسی شما نامعتبر است.');
    $userid = (int)$_GET['user_id'];

    if (isset($_POST['edit_user_wallet'])) {
        if (empty($_POST['wallet_num']) == false) {
            if ($_POST['wallet_act'] === 'wallet_up') {
                $refidWallet = tiva_user_wallet_update_handler($userid, (int)$_POST['wallet_num'], TIVA_ADMIN_WALLET_UP, '', 'افزایش موجودی توسط مدیر سایت');
                if ($refidWallet > 0) {
                    tiva_show_notification('موجودی کیف پول افزایش یافت', 'success');
                } else {
                    tiva_show_notification('در عملیات مشکلی به وجود آمده است', 'error');
                }
            } elseif ($_POST['wallet_act'] === 'wallet_down') {
                $refidWallet = tiva_user_wallet_update_handler($userid, (int)$_POST['wallet_num'], TIVA_ADMIN_WALLET_DOWN, '', 'کسر از موجودی توسط مدیر سایت');
                if ($refidWallet > 0) {
                    tiva_show_notification('موجودی کیف پول کاهش یافت', 'success');
                } else {
                    tiva_show_notification('در عملیات مشکلی به وجود آمده است', 'error');
                }
            }
        } else {
            tiva_show_notification('لطفا مقدار را وارد کنید', 'error');

        }
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
            <span><?php _e('کیف پول', 'tiva'); ?></span>
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
<br>
<br>
<br>
<div class="row">
    <div class="col-md-10 col-sm-10 col-sm-offset-1">
        <div class="alert alert-info text-center">
            <span>  </span> موجودی فعلی این کاربر
            <strong><?php echo tiva_change_number(number_format(tiva_get_user_wallet_balance($userid))) . ' تومان '; ?></strong>
            می باشد
        </div>
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-google-wallet font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('افزایش یا کاهش موجودی کاربر', 'tiva') ?></span>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="post" role="form" action="" id="send_msg" name="edit_user_wallet">
                    <div class="form-group">
                        <label class="control-label"><?php _e('مقدار ', 'tiva'); ?></label>
                        <input type="number" name="wallet_num"
                               placeholder="<?php _e('مقدار مورد نظر را وارد کنید', 'tiva'); ?> " class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php _e('نوع تراکنش', 'tiva'); ?></label>
                        <select name="wallet_act" class="form-control">
                            <option value="wallet_up">افزایش موجودی</option>
                            <option value="wallet_down">کاهش موجودی</option>
                        </select>
                    </div>
                    <div class="margiv-top-10 text-center">
                        <button type="submit" class="btn green"
                                name="edit_user_wallet"><?php _e('افزایش / کاهش ', 'tiva'); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10 col-sm-offset-1">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-user font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('اطلاعات کاربر', 'tiva') ?></span>
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
                        <th class="text-center"> <?php _e('موجودی', 'tiva') ?>  </th>
                        <th class="text-center">  <?php _e('تاریخ عضویت ', 'tiva') ?> </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="odd gradeX">
                        <td class="text-center">
                            <img width="50" height="50"
                                 src="<?php echo esc_url(tiva_get_user_avatar($userid)); ?>"/>
                        </td>
                        <td class="text-center"> <?php echo get_userdata($userid)->display_name; ?></td>
                        <td class="text-center">
                            <a href="mailto:<?php echo get_userdata($userid)->user_email; ?>"> <?php echo get_userdata($userid)->user_email; ?> </a>
                        </td>
                        <td class="text-center">
                            <span> <?php echo karino_get_user_role($userid); ?></span>
                        </td>
                        <td class="text-center">
                            <span> <?php echo tiva_change_number(number_format((int)get_user_meta($userid, TIVA_USER_WALLET, true))) . ' تومان '; ?></span>
                        </td>
                        <td class="text-center">                                         <?php
                            $user_data = get_userdata($userid);
                            $registered = $user_data->user_registered;
                            echo $date->date('Y/m/d', strtotime($registered));
                            ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10 col-sm-offset-1">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-list font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php echo 'لیست تراکنش های کیف پول کاربر' ?></span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th><?php _e('شماره تراکنش', 'tiva') ?> </th>
                        <th><?php _e('مبلغ', 'tiva') ?> </th>
                        <th><?php _e('تاریخ تراکنش', 'tiva') ?> </th>
                        <th><?php echo 'توضیحات' ?> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    global $wpdb;
                    $db_prefix = $wpdb->prefix;
                    $tiva_wallet_table_handel = $db_prefix . 'tiva_user_wallet_logs';
                    $result = $wpdb->get_results("SELECT * FROM {$tiva_wallet_table_handel} WHERE user_id={$userid}  ORDER BY {$tiva_wallet_table_handel}.date DESC ");
                    foreach ($result as $print) {
                        ?>
                        <?php
                        ?>
                        <tr>
                            <td><?php echo tiva_change_number($print->id) . '#' ?></td>
                            <td>
                                <span class="label label-sm <?php echo ($print->type == 1 || $print->type == 3 || $print->type == 4) ? 'label-success' : 'label-danger' ?> label-mini"><?php echo tiva_change_number(number_format($print->amount)) . ' تومان ' ?></span>
                            </td>
                            <td><?php echo jdate("j F Y - H:i:s", $print->date) ?></td>
                            <?php if ($print->type == 1): ?>
                                <td><?php echo ' شارژ کیف پول به شماره تراکنش خرید ' . tiva_change_number($print->pay_refid); ?></td>
                            <?php endif ?>
                            <?php if ($print->type == 2): ?>
                                <td><?php echo ' کسر از موجودی کیف پول به علت خرید ' . $print->wallet_description ?></td>
                            <?php endif ?>
                            <?php if ($print->type == 3): ?>
                                <td><?php echo ' افزایش موجودی کیف پول به علت هدیه ' . $print->wallet_description; ?></td>
                            <?php endif ?>
                            <?php if ($print->type == 4): ?>
                                <td><?php echo ' افزایش موجودی کیف پول توسط مدیر سایت '; ?></td>
                            <?php endif ?>
                            <?php if ($print->type == 5): ?>
                                <td><?php echo ' کسر از موجودی کیف پول توسط مدیر سایت'; ?></td>
                            <?php endif ?>
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
