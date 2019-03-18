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
            <span><?php _e(' مدیریت دیدگاه ها', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('حذف شده ها توسط مدیر ', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e(' مدیریت دیدگاه ها', 'tiva'); ?>
    <small><?php _e('نمایش دیدگاه های حذف شده شما در سایت ', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->

<div class="" style="display: block; margin: 0 auto">
    <div class="row">
        <div class="col-lg-3 col-md-1 col-sm-4 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup"
                              data-value="1349"><?php echo tiva_change_number(tiva_get_user_comment_count($current_user_id)); ?></span>
                    </div>
                    <div class="desc"><?php _e('کل دیدگاه های شما', 'tiva'); ?> </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-1 col-sm-4 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="/user-panel/comments-hold">
                <div class="visual">
                    <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup"
                              data-value="12,5"><?php echo tiva_change_number(tiva_user_get_hold_comments($current_user_id)); ?></span>
                    </div>
                    <div class="desc"><?php _e('در انتظار بررسی', 'tiva'); ?></div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-1 col-sm-4 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="/user-panel/comments-approve">
                <div class="visual">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="549"><?php echo tiva_change_number(tiva_user_get_approved_comments($current_user_id)); ?></span>
                    </div>
                    <div class="desc"><?php _e('حذف شده توسط شما', 'tiva'); ?></div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-1 col-sm-4 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="/user-panel/comments-trash">
                <div class="visual">
                    <i class=" fa fa-ban" aria-hidden="true"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="549"><?php echo tiva_change_number(tiva_user_get_trash_comments($current_user_id)); ?></span>
                    </div>
                    <div class="desc"><?php _e('حذف شده توسط مدیر', 'tiva'); ?></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class=" col-lg=12 col-xs-12 col-sm-12 ">
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption">
                    <i class="icon-bubbles font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase"><?php _e('نمایش دیدگاه های حذف شده شما ', 'tiva'); ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="portlet_comments_1">
                        <!-- BEGIN: Comments -->
                        <div class="mt-comments">
                            <?php
                            include SL_THEME_USER_PANEL_VIEWS . '/user/all_comments_query_admin_trash.php';
                            ?>
                        </div>
                        <!-- END: Comments -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
