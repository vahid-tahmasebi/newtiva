<?php
$current_user_id = wp_get_current_user()->ID;
$date = new jDateTime(true, true, 'Asia/Tehran');
$current_user = wp_get_current_user();
$user_fullNameF = $current_user->first_name . ' ' . $current_user->last_name;
$user_fullNameL = $current_user->last_name . ' ' . $current_user->first_name;
if (isset($_POST['save_shipping_address'])) {
    do_action('tiva_user_save_shipping_address');
}
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
            <span><?php _e('آدرس حمل و نقل', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('حمل و نقل', 'tiva'); ?>
    <small><?php _e('ویرایش آدرس حمل و نقل های شما', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?php echo esc_url(tiva_get_user_avatar(wp_get_current_user()->ID)); ?>"
                         class="img-responsive"
                         alt=""></div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"><?php echo isset($current_user) ? $current_user->display_name : ''; ?></div>
                    <div class="profile-usertitle-job"><?php echo get_user_meta($current_user->ID, 'tiva_user_expertise', true); ?></div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="/user-panel/edit-account">
                                <i class="icon-settings"></i> <?php _e('تنظیمات حساب کاربری', 'tiva'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet light ">
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="uppercase profile-stat-title"><?php echo tiva_change_number(tiva_get_user_comment_count(wp_get_current_user()->ID, '1')); ?></div>
                        <div class="uppercase profile-stat-text"><?php _e('نظرات ', 'tiva'); ?></div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="uppercase profile-stat-title"><?php echo tiva_change_number(intval(tiva_get_user_score($current_user_id))); ?></div>
                        <div class="uppercase profile-stat-text"> <?php _e('امتیاز', 'tiva'); ?></div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="uppercase profile-stat-title"><?php echo tiva_change_number(count_user_posts($current_user_id)); ?></div>
                        <div class="uppercase profile-stat-text"> <?php _e('مطلب', 'tiva'); ?></div>
                    </div>
                </div>
                <!-- END STAT -->
                <div>
                    <h4 class="profile-desc-title"><?php _e('بیوگرافی', 'tiva');
                        echo "  ";
                        echo wp_get_current_user()->display_name; ?></h4>
                    <span class="profile-desc-text"> <?php echo wp_get_current_user()->description; ?> </span>
                    <div class="margin-top-20 profile-desc-link">
                        <?php echo tiva_get_user_social_network_icon('web'); ?>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <?php echo tiva_get_user_social_network_icon('telegram'); ?>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <?php echo tiva_get_user_social_network_icon('instagram'); ?>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <?php echo tiva_get_user_social_network_icon('linkedin'); ?>
                    </div>
                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase"><?php _e('آدرس حمل و نقل', 'tiva'); ?></span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active "
                                     id="tab_1_1">
                                    <form method="post" role="form" action="" id="save_profile" name="account-edit">
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('نام ', 'tiva'); ?><span
                                                        style="color: red">*</span></label>
                                            <input type="text"
                                                   value="<?php echo get_user_meta($current_user_id, 'shipping_first_name', true); ?>"
                                                   name="shipping_first_name"
                                                   placeholder="<?php _e('نام خود را وارد کنید', 'tiva'); ?>                                            "
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('نام خانوادگی ', 'tiva'); ?><span
                                                        style="color: red">*</span></label>
                                            <input type="text"
                                                   value="<?php echo get_user_meta($current_user_id, 'shipping_last_name', true); ?>"
                                                   name="shipping_last_name"
                                                   placeholder="<?php _e('نام خانوادگی  خود را وارد کنید', 'tiva'); ?>                                            "
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('نام شرکت', 'tiva'); ?></label>
                                            <input type="text"
                                                   name="shipping_company"
                                                   value="<?php echo get_user_meta($current_user_id, 'shipping_company', true) ?>"
                                                   placeholder="<?php _e('نام شرکت خود را وارد کنید', 'tiva'); ?>"
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('کشور', 'tiva'); ?><span style="color: red">*</span></label>
                                            <select name="shipping_country" class="form-control">
                                                <?php
                                                global $woocommerce;
                                                $countries_obj = new WC_Countries();
                                                $countries = $countries_obj->__get('countries');
                                                foreach ($countries as $key => $value):?>
                                                    <option value="<?php echo $key; ?>" <?php echo (get_user_meta($current_user_id, 'shipping_country', true) == $key) ? 'selected' : '' ?>><?php echo $value; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                            <div class="form-group">
                                                <label class="control-label"><?php _e('استان', 'tiva'); ?><span
                                                            style="color: red">*</span></label>
                                                <input name="shipping_state" type="text"
                                                       placeholder="استان مورد نظر خود را وارد کنید"
                                                       value="<?php echo get_user_meta($current_user_id, 'shipping_state', true); ?>"
                                                       class="form-control"/></div>
                                            <div class="form-group">
                                                <label class="control-label"><?php _e('شهر', 'tiva'); ?><span
                                                            style="color: red">*</span></label>
                                                <input name="shipping_city" type="text"
                                                       placeholder="شهر مورد نظر خود را وارد کنید"
                                                       value="<?php echo get_user_meta($current_user_id, 'shipping_city', true); ?>"
                                                       class="form-control"/></div>
                                            <div class="form-group">
                                                <label class="control-label"><?php _e('خیابان', 'tiva'); ?><span
                                                            style="color: red">*</span></label>
                                                <input name="shipping_address_1" type="text"
                                                       placeholder="پلاک خانه و نام خیابان مورد نظر خود را وارد کنید"
                                                       value="<?php echo get_user_meta($current_user_id, 'shipping_address_1', true); ?>"
                                                       class="form-control"/>
                                                <br>
                                                <input name="shipping_address_2" type="text"
                                                       placeholder="شماره واحد ، بلوک مورد نظر خود را وارد کنید"
                                                       value="<?php echo get_user_meta($current_user_id, 'shipping_address_2', true); ?>"
                                                       class="form-control"/>

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><?php _e('کد پستی', 'tiva'); ?><span
                                                            style="color: red">*</span></label>
                                                <input type="number"
                                                       value="<?php echo get_user_meta($current_user_id, 'shipping_postcode', true) ?>"
                                                       name="shipping_postcode"
                                                       placeholder="<?php _e('کد پستی محل مورد نظر خود را وارد کنید', 'tiva'); ?>"
                                                       class="form-control"/>
                                            </div>

                                            <div class="margiv-top-10">
                                                <button type="submit" class="btn green" name="save_shipping_address">
                                                    ذخیره
                                                    تغییرات
                                                </button>
                                            </div>
                                    </form>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
