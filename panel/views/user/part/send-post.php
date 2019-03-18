<?php
$current_user_id = wp_get_current_user()->ID;
$date = new jDateTime(true, true, 'Asia/Tehran');

if (isset($_POST['send_post'])) {
    do_action('tiva_user_send_post_action');
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
            <span><?php _e('مدیریت مقاله های ارسالی', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('ارسال مقاله', 'tiva'); ?></span>
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
<h1 class="page-title"><?php _e('ارسال مطالب', 'tiva'); ?>
    <small><?php _e('ارسال مطلب توسط شما', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->

<div class="row">
    <div class="note note-info">
        <h4 class="block"><?php _e('راهنمایی !', 'tiva'); ?></h4>
        <p><?php _e('کاربر عزیز توجه داشته باشید که شما تنها قادر به انتخاب تصاویری با پسوند gif , jpeg , png هستید!', 'tiva'); ?></p>
    </div>
    <div class="note note-danger">
        <h4 class="block"><?php _e('اخطار !', 'tiva'); ?></h4>
        <p><?php _e(' کاربر عزیز توجه داشته باشید که شما باید تصویر شاخص مقاله خود را در سایز  300 * 300 پیکسل بارگذاری کنید و چنانچه در غیر این صورت باشد ، مقاله شما جهت نمایش در سایت تایید نمی شود', 'tiva'); ?></p>
    </div>

    <form action="" method="post" enctype="multipart/form-data" name="send_post" id="send_post_form">
        <div class="col-md-9">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-text-o"></i>
                        <span class="caption-subject bold uppercase"><?php _e('مقاله: جدید', 'tiva'); ?></span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-group">
                        <label for="post-title" class="control-label"><?php _e('عنوان مقاله:', 'tiva'); ?><span
                                    class="required" aria-required="true"> * </span></label>
                        <input id="post-title" class="form-control post_title" type="text" name="post_title" placeholder="<?php _e('عنوان مقاله: را اینجا وارد کنید', 'tiva'); ?>">
                    </div>
                    <div class="form-group">
                        <div class="send-post-media">
                            <a class="btn blue" id="add_audio">
                                <i class="fa fa-file-audio-o" aria-hidden="true"></i>
                                <?php _e('اضافه کردن فایل صوتی', 'tiva'); ?>
                            </a>
                            <a class="btn green" id="add_video">
                                <i class="fa fa-file-video-o" aria-hidden="true"></i>
                                <?php _e('اضافه کردن فایل ویدویی', 'tiva'); ?>
                            </a>
                            <a class="btn red" id="add_image">
                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                <?php _e('اضافه کردن فایل تصویری', 'tiva'); ?>
                            </a>
                        </div>
                        <label for="post-title" class="control-label"><?php _e('متن مقاله:', 'tiva'); ?></label>
                        <span class="required" aria-required="true"> * </span>
                        <?php wp_editor('', 'post_content', array('tinymce' => true, 'textarea_rows' => 27)) ?>
                    </div>
                </div>
            </div>
            <div class="margiv-top-10">
                <button type="submit" class="btn btn-lg green" style="width: 100%" name="send_post"><?php _e('ارسال', 'tiva'); ?></button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase"><?php _e('تصویر شاخص', 'tiva'); ?></span>
                    </div>
                </div>
                <div class="portlet-body ">
                    <label for="post-title" class="control-label"><?php _e('تصویر شاخص مقاله:', 'tiva'); ?><span class="required" aria-required="true"> * </span></label>
                    <div>
                        <div class="fileinput fileinput-new send-post-thumbnail-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail send-post-thumbnail"
                                 style="width: 100%; height: 300px;"><img
                                        src="<?php echo get_template_directory_uri() . '/panel/images/upload.jpg'; ?>"
                                        alt=""/></div>
                            <div class="fileinput-preview fileinput-exists thumbnail"
                                 style="width: 100% !important; height: 300px!important;"></div>
                            <div class="post-thumbnail-action-btn">
                                <span class="btn default btn-file">
                                           <span class="fileinput-new"> <?php _e('انتخاب تصویر', 'tiva'); ?> </span>
                                           <span class="fileinput-exists"> <?php _e('تغییر تصویر', 'tiva'); ?> </span>
                                           <input type="file" class="post_thumbnail" name="post_thumbnail" id="post_thumbnail" accept="image/*">
                                    </span>
                                <a href="javascript:;" class="btn default fileinput-exists"
                                   data-dismiss="fileinput"> <?php _e('حذف تصویر', 'tiva'); ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"><?php _e(' دسته بندی', 'tiva'); ?></span>
                    </div>
                </div>
                <div class="portlet-body categories-checkbox">
                    <label for="post-title" style="padding-bottom: 15px" class="control-label"><?php _e(' دسته بندی مقاله:', 'tiva'); ?><span class="required" aria-required="true"> * </span></label>
                    <?php
                    require_once(ABSPATH . '/wp-admin/includes/template.php');
                    wp_category_checklist();
                    ?>
                </div>
            </div>
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>
                        <span class="caption-subject bold uppercase"><?php _e('ساختار مقاله: ', 'tiva'); ?></span>
                    </div>
                </div>
                <div class="portlet-body post-structure">
                    <label for="post-title" class="control-label" ><?php _e('ساختار مقاله:', 'tiva'); ?><span class="required" aria-required="true"> * </span></label>
                    <div class="mt-radio-list">
                        <div class="mt-radio-list">
                            <label class="mt-radio mt-radio-outline">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                <strong><?php _e('مقاله: ', 'tiva'); ?></strong>
                                <input type="radio" class="post_format" value="0" name="post_format" checked>
                                <span></span>
                            </label>
                            <label class="mt-radio mt-radio-outline">
                                <i class="fa fa-file-video-o" aria-hidden="true"></i>
                                <strong><?php _e('ویدیو', 'tiva'); ?></strong>
                                <input type="radio" class="post_format" value="video" name="post_format">
                                <span></span>
                            </label>
                            <label class="mt-radio mt-radio-outline">
                                <i class="fa fa-file-audio-o" aria-hidden="true"></i>
                                <strong><?php _e('صوتی', 'tiva'); ?></strong>
                                <input type="radio" class="post_format" value="audio" name="post_format">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


