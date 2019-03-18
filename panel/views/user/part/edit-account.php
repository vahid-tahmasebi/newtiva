<?php
$current_user_id = wp_get_current_user()->ID;
$date = new jDateTime(true, true, 'Asia/Tehran');
$current_user = wp_get_current_user();
$user_fullNameF = $current_user->first_name . ' ' . $current_user->last_name;
$user_fullNameL = $current_user->last_name . ' ' . $current_user->first_name;
if (isset($_POST['change-pass'])) {
    do_action('tiva_user_change_pass_action');
} elseif (isset($_POST['save-profile'])) {
    do_action('tiva_user_save_profile_action');
} elseif (isset($_POST['save_avatar'])) {
    do_action('tiva_user_save_profile_avatar_action');
} elseif (isset($_POST['save_privacy'])) {
    do_action('tiva_user_save_account_save_privacy_action');
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
            <span><?php _e('مشخصات کاربری', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('مشخصات کاربری', 'tiva'); ?>
    <small><?php _e('نمایش مشخصات کاربری شما', 'tiva'); ?></small>
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
                        <div class="uppercase profile-stat-title"><?php echo tiva_change_number(tiva_get_user_comment_count(wp_get_current_user()->ID,'1')); ?></div>
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
                                <span class="caption-subject font-blue-madison bold uppercase"><?php _e('مشخصات کاربری', 'tiva'); ?></span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active" id="tab_li_1">
                                    <a href="#tab_1_1" data-toggle="tab"><?php _e('اطلاعات شخصی', 'tiva'); ?></a>
                                </li>
                                <li class="" id="tab_li_2">
                                    <a href="#tab_1_2" data-toggle="tab"><?php _e('تغییر تصویر پروفایل', 'tiva'); ?></a>
                                </li>
                                <li class="" id="tab_li_3">
                                    <a href="#tab_1_3" data-toggle="tab"><?php _e('تغییر رمز عبور', 'tiva'); ?></a>
                                </li>
                                <li class="" id="tab_li_4">
                                    <a href="#tab_1_4" data-toggle="tab"><?php _e('تنظیمات حریم شخصی', 'tiva'); ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active "
                                     id="tab_1_1">
                                    <form method="post" role="form" action="" id="save_profile" name="account-edit">
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('نام کاربری', 'tiva'); ?><span
                                                        style="color: red">*</span></label>
                                            <input type="text"
                                                   disabled
                                                   value="<?php echo isset($current_user) ? $current_user->nickname : ''; ?>"
                                                   name="user_name"
                                                   placeholder="<?php _e('نام کاربری خود را وارد کنید', 'tiva'); ?>                                            "
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('نام ', 'tiva'); ?></label>
                                            <input type="text"
                                                   value="<?php echo isset($current_user) ? $current_user->first_name : ''; ?>"
                                                   name="first_name"
                                                   placeholder="<?php _e('نام خود را وارد کنید', 'tiva'); ?>                                            "
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('نام خانوادگی ', 'tiva'); ?></label>
                                            <input type="text"
                                                   value="<?php echo isset($current_user) ? $current_user->last_name : ''; ?>"
                                                   name="last_name"
                                                   placeholder="<?php _e('نام خانوادگی  خود را وارد کنید', 'tiva'); ?>                                            "
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('شماره تلفن همراه', 'tiva'); ?></label>
                                            <input type="text"
                                                   name="mobile"
                                                   value="<?php echo isset($current_user) ? tiva_change_number(get_user_meta($current_user->ID, 'tiva_user_mobile', true)) : '' ?>"
                                                   placeholder="<?php _e('شماره تلفن همراه خود را وراد کنید', 'tiva'); ?>"
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('تخصص', 'tiva'); ?></label>
                                            <input type="text"
                                                   value="<?php echo isset($current_user) ? get_user_meta($current_user->ID, 'tiva_user_expertise', true) : '' ?>"
                                                   name="expertise"
                                                   placeholder="<?php _e('مهارت یا حرفه خود را وارد کنید', 'tiva'); ?>"
                                                   class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('نام نمایش داده شده', 'tiva'); ?></label>
                                            <select name="display_name" class="form-control">
                                                <option <?php echo ($current_user->display_name == $current_user->user_nicename) ? 'selected' : '' ?>><?php echo $current_user->nickname; ?></option>
                                                <option <?php echo ($current_user->display_name == $current_user->first_name) ? 'selected' : '' ?>><?php echo $current_user->first_name; ?></option>
                                                <option <?php echo ($current_user->display_name == $current_user->last_name) ? 'selected' : '' ?>><?php echo $current_user->last_name; ?></option>
                                                <option <?php echo ($current_user->display_name == $user_fullNameF) ? 'selected' : '' ?>><?php echo $user_fullNameF ?></option>
                                                <option <?php echo ($current_user->display_name == $user_fullNameL) ? 'selected' : '' ?>><?php echo $user_fullNameL ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('بیوگرافی', 'tiva'); ?></label>
                                            <textarea name="description" class="form-control" rows="3"
                                                      placeholder="درباره خودتان بنویسید"><?php echo isset($current_user) ? $current_user->description : ''; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('آدرس ایمیل شما', 'tiva'); ?> <span
                                                        style="color: red">*</span></label>
                                            <input name="user_email" required maxlength="70" type="text"
                                                   placeholder="آدرس ایمیل خودرا وارد کنید"
                                                   value="<?php echo isset($current_user) ? $current_user->user_email : ''; ?>"
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('وب سایت شما', 'tiva'); ?></label>
                                            <input name="user_url" type="text"
                                                   placeholder="آدرس وب سایت خود را وارد کنید"
                                                   value="<?php echo isset($current_user) ? $current_user->user_url : ''; ?>"
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('آی دی تلگرام', 'tiva'); ?></label>
                                            <input name="tiva_user_telegram" type="text"
                                                   placeholder="آی دی حساب تلگرام را وارد کنید"
                                                   value="<?php echo isset($current_user) ? get_user_meta($current_user->ID, 'tiva_user_telegram', true) : '' ?>"
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('آی دی اینستاگرام', 'tiva'); ?></label>
                                            <input name="tiva_user_instagram" type="text"
                                                   placeholder="آی دی حساب اینستاگرام را وارد کنید"
                                                   value="<?php echo isset($current_user) ? get_user_meta($current_user->ID, 'tiva_user_instagram', true) : '' ?>"
                                                   class="form-control"/></div>
                                        <div class="form-group">
                                            <label class="control-label"><?php _e('آی دی لینکدین', 'tiva'); ?></label>
                                            <input name="tiva_user_linkedin" type="text"
                                                   placeholder="آی دی حساب لینکدین را وارد کنید"
                                                   value="<?php echo isset($current_user) ? get_user_meta($current_user->ID, 'tiva_user_linkedin', true) : '' ?>"
                                                   class="form-control"/></div>
                                        <div class="margiv-top-10">
                                            <button type="submit" class="btn green" name="save-profile"> ذخیره تغییرات
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    <div class="note note-info">
                                        <h4 class="block"><?php _e('راهنمایی !', 'tiva'); ?></h4>
                                        <p><?php _e('کاربر عزیز توجه داشته باشید که شما تنها قادر به انتخاب تصاویری با پسوند gif , jpeg , png هستید!', 'tiva'); ?></p>
                                    </div>
                                    <form action="" method="post" role="form" enctype="multipart/form-data"
                                          style="text-align: center !important;">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 300px; height: 300px;"><img
                                                            src="<?php echo get_template_directory_uri() . '/panel/images/upload.jpg'; ?>"
                                                            alt=""/></div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="width: 300px!important; height: 300px!important; border-radius: 50%!important;"></div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                           <span class="fileinput-new"> <?php _e('انتخاب تصویر', 'tiva'); ?> </span>
                                                           <span class="fileinput-exists"> <?php _e('تغییر تصویر', 'tiva'); ?> </span>
                                                           <input type="file" name="user_avatar_input"
                                                                  id="user_avatar_input"> </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists"
                                                       data-dismiss="fileinput"> <?php _e('حذف تصویر', 'tiva'); ?> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <?php wp_nonce_field('tiva_save_user_avatar_profile', 'tiva_save_user_avatar_profile_nonce'); ?>
                                            <button type="submit" name="save_avatar" class="btn default green"> بارگذاری
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane "
                                     id="tab_1_3">
                                    <form action="" method="post" name="chang-pass">
                                        <div class="note note-info">
                                            <h4 class="block"><?php _e('راهنمایی !', 'tiva'); ?></h4>
                                            <p><?php _e('کاربر عزیز توجه داشته باشید که رمز عبور انتخابی شما باید حداقل ۸ حرف باشد !', 'tiva'); ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="1" class="control-label">پسورد جدید</label>
                                            <span class="required" aria-required="true"> * </span>
                                            <input id="1" type="password" name="new_password" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="2" class="control-label">تکرار پسورد جدید</label>
                                            <span class="required" aria-required="true"> * </span>
                                            <input id="2" type="password" name="retype_new_password"
                                                   class="form-control"/></div>
                                        <div class="margin-top-10">
                                            <button type="submit" name="change-pass" class="btn green"> تغییر رمز عبور
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->
                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_4">
                                    <form action="" method="post">
                                        <table class="table table-light table-hover">
                                            <tr>
                                                <td><?php _e('آیا شما مایل هستید که تصویر پروفایل شما به صورت عمومی در سایت نمایش داده شود ؟ ', 'tiva'); ?></td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <!--                                                            --><?php //var_dump(get_user_meta($current_user_id, 'tiva_user_avatar_privacy', true)) ; ?>
                                                            <input type="radio" name="user_avatar_privacy"
                                                                <?php echo (get_user_meta($current_user_id, 'tiva_user_avatar_privacy', true) == 'true') ? 'checked' : ''; ?>
                                                                   value="true"/><?php _e('بله', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="user_avatar_privacy" value="false"
                                                                <?php echo (get_user_meta($current_user_id, 'tiva_user_avatar_privacy', true) == 'false' || get_user_meta($current_user_id, 'tiva_user_avatar_privacy', true) == null) ? 'checked' : ''; ?>
                                                            /> <?php _e('خیر', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php _e('آیا شما مایل هستید که آیکون شبکه اجتماعی تلگرام شما به صورت عمومی در سایت نمایش داده شود ؟ ', 'tiva'); ?></td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="user_telegram_icon_privacy"
                                                                <?php echo (get_user_meta($current_user_id, 'tiva_user_telegram_icon_privacy', true) == 'true' ) ? 'checked' : ''; ?>
                                                                   value="true"/><?php _e('بله', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="user_telegram_icon_privacy"
                                                                <?php echo (get_user_meta($current_user_id, 'tiva_user_telegram_icon_privacy', true) == 'false' || get_user_meta($current_user_id, 'tiva_user_telegram_icon_privacy', true) == null ) ? 'checked' : ''; ?>
                                                                   value="false"/> <?php _e('خیر', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php _e('آیا شما مایل هستید که آیکون شبکه اجتماعی اینستاگرام شما به صورت عمومی در سایت نمایش داده شود ؟ ', 'tiva'); ?></td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="user_instagram_icon_privacy"
                                                                <?php echo (get_user_meta($current_user_id, 'user_instagram_icon_privacy', true) == 'true') ? 'checked' : ''; ?>
                                                                   value="true"/><?php _e('بله', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="user_instagram_icon_privacy"
                                                                   value="false"
                                                                <?php echo (get_user_meta($current_user_id, 'user_instagram_icon_privacy', true) == 'false' || get_user_meta($current_user_id, 'user_instagram_icon_privacy', true) == null) ? 'checked' : ''; ?>
                                                            /> <?php _e('خیر', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php _e('آیا شما مایل هستید که آیکون شبکه اجتماعی لینکدین شما به صورت عمومی در سایت نمایش داده شود ؟ ', 'tiva'); ?></td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="user_linkedin_icon_privacy"
                                                                <?php echo (get_user_meta($current_user_id, 'user_linkedin_icon_privacy', true) == 'true') ? 'checked' : ''; ?>
                                                                   value="true"/><?php _e('بله', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="user_linkedin_icon_privacy"
                                                                   value="false"
                                                                <?php echo (get_user_meta($current_user_id, 'user_linkedin_icon_privacy', true) == 'false' || get_user_meta($current_user_id, 'user_linkedin_icon_privacy', true) == null) ? 'checked' : ''; ?>
                                                            /> <?php _e('خیر', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php _e('آیا شما مایل هستید که وب سایت شما به صورت عمومی در سایت نمایش داده شود ؟ ', 'tiva'); ?></td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="user_web_icon_privacy"
                                                                <?php echo (get_user_meta($current_user_id, 'user_web_icon_privacy', true) == 'true') ? 'checked' : ''; ?>
                                                                   value="true"/><?php _e('بله', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="user_web_icon_privacy"
                                                                   value="false"
                                                                <?php echo (get_user_meta($current_user_id, 'user_web_icon_privacy', true) == 'false' || get_user_meta($current_user_id, 'user_web_icon_privacy', true) == null) ? 'checked' : ''; ?>
                                                            /> <?php _e('خیر', 'tiva'); ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--end profile-settings-->
                                        <div class="margin-top-10">
                                            <button name="save_privacy"
                                                    class="btn red"><?php _e('ذخیره تنظیمات حریم خصوصی', 'tiva'); ?></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PRIVACY SETTINGS TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
