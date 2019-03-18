<?php
$current_user_id = wp_get_current_user()->ID;
$date = new jDateTime(true, true, 'Asia/Tehran');
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/user-panel/dashboard"><?php _e('پنل کاربری', 'tiva'); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('داشبورد', 'tiva'); ?></span>
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
<br>
<div class="col-md-8 col-md-offset-2">
    <?php if (get_user_meta(get_current_user_id(), 'is_user_vip', true) != 'true'): ?>
        <div class="alert alert-info text-center">
            <?php echo 'خوش آمدید';
            echo '  ';
            echo wp_get_current_user()->display_name;
            echo '  ';
            echo 'عزیز'; ?>
            شما یک کاربری <strong>عادی</strong> هستید برای کاربر ویژه شدن <a
                    href="<?php echo site_url() . '/user-panel/vip-plan' ?>">کلیک</a> کنید.
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            <?php echo 'خوش آمدید';
            echo '  ';
            echo wp_get_current_user()->display_name;
            echo '  ';
            echo ' عزیز '; ?>
            شما یک کاربر <strong>ویژه</strong> هستید مدت زمان عضویت ویژه شما تا
            تاریخ <?php echo '<strong>' . jdate('d-m-Y', strtotime(get_user_meta(get_current_user_id(), 'expiration_date_Vip', true))) . '</strong>' ?>
            است.
        </div>
    <?php endif ?>


</div>
<!-- END PAGE TITLE-->
<?php
//var_dump(get_user_meta(get_current_user_id(),'expiration_date_Vip',true));
//var_dump(get_user_meta(get_current_user_id(),'is_user_vip',true));
//update_user_meta(get_current_user_id(),TIVA_USER_WALLET,1000000);
//    delete_user_meta(get_current_user_id(),'expiration_date_Vip','');
//    delete_user_meta(get_current_user_id(),'is_user_vip','');
?>
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo site_url().'/user-panel/comments-approve' ?>">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                          data-value="1349"><?php echo tiva_change_number(tiva_get_user_comment_count($current_user_id, '1')); ?></span>
                </div>
                <div class="desc"><?php _e('دیدگاه های شما', 'tiva'); ?> </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo site_url().'/user-panel/posts'?>">
            <div class="visual">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                          data-value="12,5"><?php echo tiva_change_number(count_user_posts($current_user_id)); ?></span>
                </div>
                <div class="desc"><?php _e('مقاله های شما', 'tiva'); ?></div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa fa-gift" aria-hidden="true"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                          data-value="549"><?php echo tiva_change_number(intval(tiva_get_user_score($current_user_id))); ?></span>
                </div>
                <div class="desc"><?php _e('امتیاز شما', 'tiva'); ?></div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple"
           href="<?php echo site_url() . '/user-panel/wallet-charge' ?>">
            <div class="visual">
                <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                          data-value="89"><?php echo tiva_change_number(number_format(tiva_get_user_wallet_balance(get_current_user_id()))); ?></span>
                </div>
                <div class="desc"><?php _e('موجودی کیف پول شما', 'tiva'); ?></div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->

<div class="row">
    <div class="col-lg-5 col-xs-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption">
                    <i class="icon-bubbles font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase"><?php _e('جدید ترین دیدگاه های شما ', 'tiva'); ?></span>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#portlet_comments_1" data-toggle="tab"> <?php _e('تایید شده ها', 'tiva'); ?></a>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="portlet_comments_1">
                        <!-- BEGIN: Comments -->
                        <div class="mt-comments">
                            <?php include SL_THEME_USER_PANEL_VIEWS . '/user/dashboard_widget_user_approve_comments.php'; ?>
                        </div>
                        <!-- END: Comments -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-xs-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption">
                    <i class=" icon-social-twitter font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase"><?php _e('جدیدترین علاقه مندی های شما', 'tiva'); ?></span>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_actions_pending" data-toggle="tab"> <?php _e('مقاله ها', 'tiva'); ?></a>
                    </li>
                    <li>
                        <a href="#tab_actions_pending_download"
                           data-toggle="tab"> <?php _e('مطالب دانلودی', 'tiva'); ?></a>
                    </li>
                    <li>
                        <a href="#tab_actions_pending_video" data-toggle="tab"> <?php _e('ویدیو ها', 'tiva'); ?></a>
                    </li>

                </ul>
            </div>
            <div class="portlet-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_actions_pending">
                        <!-- BEGIN: Actions -->
                        <div class="main-content">
                            <?php include SL_THEME_USER_PANEL_VIEWS . '/user/dashboard_widget_user_favorite_post.php'; ?>
                        </div>
                        <!-- END: Actions -->
                    </div>
                    <div class="tab-pane" id="tab_actions_pending_download">
                        <!-- BEGIN: Actions -->
                        <div class="main-content">
                            <?php include SL_THEME_USER_PANEL_VIEWS . '/user/dashboard_widget_user_favorite_download.php'; ?>
                        </div>
                        <!-- END: Actions -->
                    </div>
                    <div class="tab-pane" id="tab_actions_pending_video">
                        <!-- BEGIN: Actions -->
                        <div class="main-content">
                            <?php include SL_THEME_USER_PANEL_VIEWS . '/user/dashboard_widget_user_favorite_video.php'; ?>
                        </div>
                        <!-- END: Actions -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

