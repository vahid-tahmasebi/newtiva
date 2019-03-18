<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/user-panel/dashboard"><?php _e('داشبورد', 'tiva'); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('فروشگاه', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('سفارش های شما', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('سفارش ها', 'tiva'); ?>
    <small><?php _e('نمایش و بررسی کلیه سفارش های شما در سایت', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<br>
<div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-shopping-cart font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('لیست سفارش های شما', 'tiva') ?></span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th class="text-center">شناسه سفارش</th>
                        <th class="text-center">تاریخ ثبت</th>
                        <th class="text-center">وضعیت</th>
                        <th class="text-center">مجموع</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Get all customer orders
                    $customer_orders = get_posts(array(
                        'numberposts' => -1,
                        'meta_key' => '_customer_user',
                        'meta_value' => get_current_user_id(),
                        'post_type' => wc_get_order_types(),
                        'post_status' => array_keys(wc_get_order_statuses()),  //'post_status' => array('wc-completed', 'wc-processing'),
                    ));


                    foreach ($customer_orders as $order_id) {
                        $order = new WC_Order($order_id);
                        $order_data = $order->get_data();
//                        var_dump($order_data);
                        ?>

                        <tr>
                            <td class="text-center"><?php echo tiva_change_number($order_data['id']) . '#' ?></td>
                            <td class="text-center"><?php echo tiva_change_number(jdate('H:i | Y-m-d', $order_data['date_created'])); ?></td>
                            <td class="text-center"><?php echo tiva_user_order_status_to_persian_translate($order_data['status']); ?></td>
                            <td class="text-center"><?php echo tiva_change_number(number_format($order_data['total'])) . tiva_user_order_woo_currency_to_persian($order_data['currency']); ?></td>
                            <td class="text-center">
                                <a href="<?php

                                echo wp_nonce_url(add_query_arg(array('order_id' => $order_data['id']), site_url().'/user-panel/view-order')) ?>"
                                   class="btn btn-outline btn-circle red btn-sm blue"><i class="fa fa-share"></i> مشاهده
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
