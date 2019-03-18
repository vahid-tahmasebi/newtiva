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
            <span><?php _e('دانلودها', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('دانلودها', 'tiva'); ?>
    <small><?php _e('نمایش و بررسی کلیه محصولات دانلودی در دسترس شما ', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<br>
<div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-download font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('کلیه دانلودهای در دسترس شما', 'tiva') ?></span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th class="text-center">محصول</th>
                        <th class="text-center">باقیمانده دانلودها</th>
                        <th class="text-center">تاریخ انقضا</th>
                        <th class="text-center">دانلود</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $downloads = WC()->customer->get_downloadable_products();
                    //                    var_dump($downloads);
                    $has_downloads = (bool)$downloads;
                    if ($has_downloads) {

                        foreach ($downloads as $download_item) {
//                            var_dump($download_item)
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $download_item['product_name'] ?></td>
                                <td class="text-center"><?php echo (!empty($download_item['downloads_remaining'])) ? tiva_change_number($download_item['downloads_remaining']) : 'بدون محدودیت'; ?></td>
                                <td class="text-center"><?php echo (!is_null($download_item['access_expires'])) ? tiva_change_number(jdate('H:i | Y-m-d', $download_item['access_expires'])) : 'هرگز'; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo $download_item['download_url'] ?>"
                                       class="btn btn-outline btn-circle red btn-sm blue"><i
                                                class="fa fa-download"></i> <?php echo $download_item['file']['name'] ?>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
