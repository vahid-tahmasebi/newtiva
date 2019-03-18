<?php
/**
 * add in tiva v3.1
 * Created by PhpStorm.
 * User: Mohammad Reza
 * Date: 24/03/2018
 * Time: 07:16 PM
 */

/*$tiva_users = get_users();
foreach ($tiva_users as $user) {
    if ($user->user_status == '0') {
        var_dump($user);
    }

}*/

$date = new jDateTime(true, true, 'Asia/Tehran');; ?>
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
            <span><?php _e('کاربران غیر فعال', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e(' کاربران غیر فعال', 'tiva'); ?>
    <small><?php _e('نمایش کاربرانی که به نحوی هنوز حساب کاربری شان توسط لینک فعال سازی ارسال شده فعال نکردن و فعال سازی حساب آن ها  ', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users user-card-icon"></i>
                    <span class="caption-subject font-green bold uppercase">لیست کاربران غیر فعال</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="mt-element-card mt-element-overlay">
                    <div class="row">
                        <?php
                        $user_per_page = 8;
                        $all_user = count(get_users(array(
                            'orderby' => 'registered',
                            'order' => 'ASC',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'karino_user_block',
                                    'compare' => 'NOT EXISTS'),
                                array(
                                    'key' => 'karino_user_block',
                                    'value' => 'false',
                                    'compare' => '='),
                            ),
                            'fields' => array('ID'),
                            'role' => 'author'
                        )));
                        //                        dd($all_user);
                        $paged = tiva_get_current_page();
                        $offset = ($paged - 1) * $user_per_page;
                        //var_dump($offset);
                        $max_num_pages = ceil($all_user / $user_per_page);
                        //var_dump($max_num_pages);

                        $tiva_users = get_users();

                        foreach ($tiva_users as $user) :?>
                            <?php if ($user->user_status == '0') { ?>
                                <div class="user-card col-lg-3 col-md-4 col-sm-6 col-xs-12 admin_user_card_wrraper"
                                     data-id="<?php echo $user->ID; ?>">
                                    <div class="mt-card-item">
                                        <div class="user-block-ribbon  mt-element-ribbon">
                                            <div class="ribbon ribbon-border-hor ribbon-clip ribbon-color-danger ribbon-border-dash-hor uppercase">
                                                <div class="ribbon-sub ribbon-clip"></div>
                                                <?php _e('حساب غیر فعال', 'tiva'); ?>
                                            </div>
                                        </div>
                                        <div class="user-block-ribbon  user-block-ribbon-role mt-element-ribbon ">
                                            <div class="ribbon ribbon-border-hor ribbon-clip ribbon-color-info ribbon-border-dash-hor uppercase">
                                                <div class="ribbon-sub ribbon-clip"></div>
                                                <?php
                                                echo karino_get_user_role($user->ID);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="mt-card-avatar mt-overlay-1 ">
                                            <img src="<?php echo esc_url(tiva_get_user_avatar($user->ID)); ?>"/>
                                            <div class="mt-overlay">
                                                <ul class="mt-info">
                                                    <li>
                                                        <a class="btn default btn-outline karino_user_block"
                                                           data-id="<?php echo $user->ID; ?>" data-toggle="tooltip"
                                                           title="بلاک کن">
                                                            <i class="fa fa-lock user-icon-overlay"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn default btn-outline karino_active_user"  data-id="<?php echo $user->ID; ?>" data-toggle="tooltip" title="فعال سازی حساب"><i class="fa fa-shield user-icon-overlay"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn default btn-outline karino-user-remove"
                                                           data-toggle="tooltip" title="حذف کن"
                                                           data-id="<?php echo $user->ID; ?>">
                                                            <i class="fa fa-trash-o user-icon-overlay"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-card-content">
                                            <h3 class="mt-card-name"><?php echo $user->display_name; ?></h3>
                                            <p class="mt-card-desc font-grey-mint"><?php echo (get_user_meta($user->ID, 'tiva_user_expertise', true) !== '') ? get_user_meta($user->ID, 'tiva_user_expertise', true) : 'بدون تخصص'; ?></p>
                                            <div class="mt-card-social">
                                                <ul>
                                                    <li>
                                                        <?php echo karino_get_user_social_network_icon_for_admin_panel('web', $user) ?>
                                                    </li>
                                                    <li>
                                                        <?php echo karino_get_user_social_network_icon_for_admin_panel('telegram', $user) ?>
                                                    </li>
                                                    <li>
                                                        <?php echo karino_get_user_social_network_icon_for_admin_panel('instagram', $user) ?>
                                                    </li>
                                                    <li>
                                                        <?php echo karino_get_user_social_network_icon_for_admin_panel('linkedin', $user) ?>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        <?php endforeach; ?>
                        <?php if ((int)tiva_get_deactive_user_count() <= 0): ?>
                            <div class="note note-danger">
                                <h4 class="block">متاسفیم !</h4>
                                <p>
                                    مدیر محترم ! کاربر غیر فعالی در سایت یافت نشد.
                                </p>
                            </div>
                        <?php endif; ?>
                        <div class="tiva-pagination-wrapper">
                            <div class="box tiva-pagination">
                                <?php
                                /*Set current page for pagination*/
                                $current_page = max(1, get_query_var('paged'));
                                /*Echo paginate links*/
                                echo paginate_links(array(
                                    'base' => tiva_clean_page_arg(),
                                    'format' => '&page=%#%',
                                    'current' => max(1, tiva_get_current_page()),
                                    'total' => $max_num_pages,
                                    'prev_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                                    'next_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>