<?php
$current_user_id = wp_get_current_user()->ID;
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
            <span><?php _e('علاقمندی ها', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('مقاله ها', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('مقاله ها', 'tiva'); ?>
    <small><?php _e('نمایش مقاله های ذخیره شده در علاقه مندی ها شما ', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="main-content">
        <?php include SL_THEME_USER_PANEL_VIEWS . '/user/all_post_favorite_loop_query.php'; ?>
    </div>
</div>


