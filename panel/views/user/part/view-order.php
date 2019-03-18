<?php
$date = new jDateTime(true, true, 'Asia/Tehran');


$order = new WC_Order($_GET['order_id']);

$order_data = $order->get_data();


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
            <span><?php _e('جزییات سفارش', 'tiva'); ?></span>
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

        <?php if ($order_data['customer_id'] == get_current_user_id()): ?>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-cart-arrow-down font-red-sunglo" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase"><?php _e('جزییات سفارش شما', 'tiva') ?></span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <div class="alert alert-info text-center">
                        سفارش <strong><?php echo '#' . tiva_change_number($order_data['id']) ?></strong> در تاریخ
                        <strong> <?php echo tiva_change_number(jdate('H:i | d-m-Y', $order_data['date_created'])) ?> </strong>
                        ثبت شده و هم اکنون
                        <strong> <?php echo '' . tiva_user_order_status_to_persian_translate($order_data['status']) . '' ?> </strong>
                        است.
                    </div>
                    <br>
                    <div class="order-view-wrapper">
                        <?php
                        tiva_woocommerce_view_order($_GET['order_id']);
                        ?>
                    </div>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        <?php else:; ?>
            <div class="alert alert-danger text-center">
                <strong>کاربر محترم دسترسی شما مجاز نیست.</strong>
            </div>
        <?php endif; ?>
    </div>
</div>
