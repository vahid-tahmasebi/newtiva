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
            <span><?php _e('پشتیبانی', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('همه تیکت ها', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('تیکت ها', 'tiva'); ?>
    <small><?php _e('نمایش تمام تیکت های ثبت شده توسط شما در سایت', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<br>
<div class="row">
    <div class="note note-info">
        <h4 class="block">راهنمایی !</h4>
        <p>شما می توانید از طریق لیست زیر تیکت های ارسالی خود را مدیریت و بررسی کنید.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-envelope-o font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('تمام تیکت های ارسالی شما', 'tiva') ?></span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>موضوع</th>
                        <th>متن</th>
                        <th>تاریخ ثبت</th>
                        <th>تاریخ آخرین تغییرات</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //                    dd('ok');
                    global $wpdb;
                    $db_prefix = $wpdb->prefix;
                    $tiva_tickets = $db_prefix . 'tiva_tickets';
                    //					dd($tiva_pay_handel);
                    $current_user = get_current_user_id();
                    //					dd($current_user);
                    $result = $wpdb->get_results("SELECT * FROM {$tiva_tickets} where ticket_user_id={$current_user} ORDER BY ticket_create_at DESC");
                    //					dd( $result );
                    foreach ($result as $print) {
//					    var_dump($print);
                        ?>
                        <a href="">

                        </a>
                        <tr>
                            <td><?php echo tiva_change_number($print->ticket_id) . '#' ?></td>
                            <td>
                                <?php karino_custom_msg_table_echo(tiva_change_number($print->ticket_title), '20') ?>
                            </td>
                            <td>
                                <?php karino_custom_msg_table_echo(tiva_change_number(str_replace("<br />", "\n", $print->ticket_content)), '65') ?>
                            </td>
                            <td class="text-center"><?php echo tiva_change_number(tiva_relative_time($print->ticket_create_at)); ?></td>
                            <td class="text-center"><?php echo tiva_change_number(tiva_relative_time($print->ticket_update_at)) ?></td>

                            <td class="text-center">
                                <?php if ($print->ticket_status == 0): ?>
                                    <span class="label label-success"> باز        </span>
                                <?php elseif ($print->ticket_status == 1): ?>
                                    <span class="label label-default"> در حال انجام </span>
                                <?php elseif ($print->ticket_status == 2): ?>
                                    <span class="label label-primary">پاسخ داده شد</span>
                                <?php elseif ($print->ticket_status == 3): ?>
                                    <span class="label label-warning">بسته</span>
                                <?php elseif ($print->ticket_status == 4): ?>
                                    <span class="label label-danger">بسته سیستمی</span>
                                <?php endif; ?>

                            </td>
                            <td class="text-center">
                                <a href="<?php echo wp_nonce_url(add_query_arg(array('ticket_id' => $print->ticket_id), site_url().'/user-panel/show-ticket')) ?>"
                                   class="btn btn-outline btn-circle red btn-sm blue"><i class="fa fa-share"></i> نمایش
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
