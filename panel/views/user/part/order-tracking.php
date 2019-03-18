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
            <span><?php _e('پیگیری سفارش', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('پیگیری سفارش ها', 'tiva'); ?>
    <small><?php _e('پیگیری و بررسی سفارش های شما در سایت', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<br>

<div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-12">
        <div class="alert alert-info text-center">
            <strong>کاربر محترم شما می توانید با استفاده از شناسه سفارش ، سفارش خود را پیگیری کنید. </strong>
        </div>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-search font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('پیگیری سفارش شما', 'tiva') ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="order-view-wrapper">
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-body text-center">
                            <div class="form-group">
                                <br>
                                <div class="input-inline input-large">
                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-cart-arrow-down"></i>
                                                                </span>
                                        <input type="number" name="order_id" class="form-control"
                                               placeholder="شناسه سفارش خود را وارد کنید."></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-actions text-center">
                            <button type="submit" name="search_order" class="btn green">جستجوی سفارش</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
        <?php
        if (isset($_POST['search_order'])) {
            if (isset($_POST['order_id']) && intval($_POST['order_id'])) {
                $customer_orders = get_posts(array(
                    'numberposts' => -1,
                    'meta_key' => '_customer_user',
                    'meta_value' => get_current_user_id(),
                    'post_type' => wc_get_order_types(),
                    'post_status' => array_keys(wc_get_order_statuses()),  //'post_status' => array('wc-completed', 'wc-processing'),
                ));
                //var_dump($customer_orders);
                foreach ($customer_orders as $order_id) {
                    if ($order_id->ID === intval($_POST['order_id'])) {
                        $result = true;
                        ?>
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-red-sunglo">
                                    <i class="fa fa-cart-arrow-down font-red-sunglo" aria-hidden="true"></i>
                                    <span class="caption-subject bold uppercase"><?php _e('جزییات سفارش شما', 'tiva') ?></span>
                                </div>
                                <div class="tools"></div>
                            </div>
                            <div class="portlet-body">
                                <?php tiva_woocommerce_view_order_in_search_order(intval($_POST['order_id'])); ?>
                            </div>
                        </div>

                        <?php
                    }
                }
                if (!isset($result)) {
                    echo '
        <div class="alert alert-danger text-center">
            <strong>کاربر محترم سفارشی با این شناسه برای شما ثبت نشده است.</strong>
        </div>
';
                }
            } else {
                echo '
        <div class="alert alert-danger text-center">
            <strong>کاربر محترم درخواست شما نامعتبر است.</strong>
        </div>
';            }
        }
        ?>

    </div>
</div>