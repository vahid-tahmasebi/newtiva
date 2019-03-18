<?php $tiva_options = get_option('tiva_options'); ?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات صفحه مطالب', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;margin-right: 685px;">
        <button type="submit" class="btn btn-success"
                name="op-panel-submit"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن باکس اشتراک گذاری مطالب', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید باکس باکس اشتراک گذاری مطالب در شبکه های اجتماعی را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1s">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1s" value="true" type="radio"
                               name="share_btn_show" <?php echo (!empty($tiva_options['single-page']['share_btn_show']) && $tiva_options['single-page']['share_btn_show'] === 'true' || !isset($tiva_options['single-page']['share_btn_show'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2s">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2s" value="false" type="radio"
                               name="share_btn_show" <?php echo (!empty($tiva_options['single-page']['share_btn_show']) && $tiva_options['single-page']['share_btn_show'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/********************************* BEGIN EDITED IN TIVA V5.8  ****************************/-->
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن خبرنامه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید باکس خبرنامه در فوتر و صفحه ها را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1s">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1s" value="true" type="radio"
                               name="rrs_show" <?php echo (!empty($tiva_options['single-page']['rrs_show']) && $tiva_options['single-page']['rrs_show'] === 'true' || !isset($tiva_options['single-page']['rrs_show'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2s">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2s" value="false" type="radio"
                               name="rrs_show" <?php echo (!empty($tiva_options['single-page']['rrs_show']) && $tiva_options['single-page']['rrs_show'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/********************************* END EDITED IN TIVA V5.8 ******************************/-->

<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن باکس کانال تگرام', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید باکس کانال تلگرام را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1" value="true" type="radio"
                               name="post_chanel-box-tel_show" <?php echo (!empty($tiva_options['single-page']['post_chanel-box-tel_show']) && $tiva_options['single-page']['post_chanel-box-tel_show'] === 'true' || !isset($tiva_options['single-page']['post_chanel-box-tel_show'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2" value="false" type="radio"
                               name="post_chanel-box-tel_show" <?php echo (!empty($tiva_options['single-page']['post_chanel-box-tel_show']) && $tiva_options['single-page']['post_chanel-box-tel_show'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات محتوای متنی باکس کانال تگرام  ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی !</strong> <?php _e('از این طریق می توانید متن باکس تلگرام را ویرایش کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="tel-box-title"><?php _e('متن باکس تلگرام :', 'tiva'); ?></label>
                    <input type="text"
                           value="<?php echo (!empty($tiva_options['single-page']['tel-box-title'])) ? $tiva_options['single-page']['tel-box-title'] : ''; ?>"
                           class="form-control" id="tel-box-title" name="tel-box-title">
                </div>
                <div class="form-group">
                    <label for="tel-box-caption"><?php _e('متن دکمه درون باکس تلگرام :', 'tiva'); ?></label>
                    <input type="text"
                           value="<?php echo (!empty($tiva_options['single-page']['tel-box-btn-caption'])) ? $tiva_options['single-page']['tel-box-btn-caption'] : ''; ?>"
                           class="form-control" id="tel-box-caption" name="tel-box-btn-caption">
                </div>
                <div class="form-group">
                    <label for="tel-box-link"><?php _e('لینک کانال تلگرام :', 'tiva'); ?></label>
                    <input style="direction: ltr" type="text"
                           value="<?php echo (!empty($tiva_options['single-page']['tel-box-link'])) ? $tiva_options['single-page']['tel-box-link'] : ''; ?>"
                           class="form-control" id="tel-box-link" name="tel-box-link">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن باکس مطالب های مرتیط', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید باکس مطالب مرتبط را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1" value="true" type="radio"
                               name="post_related_show" <?php echo (!empty($tiva_options['single-page']['post_related_show']) && $tiva_options['single-page']['post_related_show'] === 'true' || !isset($tiva_options['single-page']['post_related_show'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2" value="false" type="radio"
                               name="post_related_show" <?php echo (!empty($tiva_options['single-page']['post_related_show']) && $tiva_options['single-page']['post_related_show'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات نمایش تعداد مطالب مرتبط  ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید تعداد مطالب موجود در باکس مطالب  مرتبط را مشخص کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="tel-box-title"><?php _e('تعداد مطالب  مرتبط :', 'tiva'); ?></label>
                    <input type="number"
                           value="<?php echo (!empty($tiva_options['single-page']['related-post-count'])) ? $tiva_options['single-page']['related-post-count'] : ''; ?>"
                           min="0" class="form-control" id="tel-box-title" name="related-post-count">
                </div>

            </div>
        </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>