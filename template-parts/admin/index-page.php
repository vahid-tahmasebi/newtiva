<?php
$tiva_options = get_option('tiva_options');

//dd($_POST['fl1_script'])
?>

<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات صفحه اصلی', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;  margin-right: 695px;">
        <button type="submit" name="op-panel-submit"
                class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' فعال یا غیرفعال کردن فیلتر پیشرفته مطالب', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید فرم جستجو را فعال یا غیر فعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1"><?php _e('فعال کن', 'tiva'); ?></label><input id="l1"
                                                                                                           value="true"
                                                                                                           type="radio"
                                                                                                           name="index_search_show" <?php echo (!empty($tiva_options['index-page']['index_search_show']) && $tiva_options['index-page']['index_search_show'] === 'true' || !isset($tiva_options['index-page']['index_search_show'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2"><?php _e('غیرفعال کن', 'tiva'); ?></label><input id="l2"
                                                                                                              value="false"
                                                                                                              type="radio"
                                                                                                              name="index_search_show" <?php echo (!empty($tiva_options['index-page']['index_search_show']) && $tiva_options['index-page']['index_search_show'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--ADD IN TIVA V5.5.2-->
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' فعال یا غیرفعال کردن عضویت ویژه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید پلن های عضویت ویژه در سایت را غیر فعال کنید', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1vip"><?php _e('فعال کن', 'tiva'); ?></label><input id="l1vip"
                                                                                                              value="true"
                                                                                                              type="radio"
                                                                                                              name="vip_plan" <?php echo (!empty($tiva_options['index-page']['vip_plan']) && $tiva_options['index-page']['vip_plan'] === 'true' || !isset($tiva_options['index-page']['vip_plan'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2vip"><?php _e('غیرفعال کن', 'tiva'); ?></label><input
                                id="l2vip"
                                value="false"
                                type="radio"
                                name="vip_plan" <?php echo (!empty($tiva_options['index-page']['vip_plan']) && $tiva_options['index-page']['vip_plan'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--ADD IN TIVA V5.5.2-->
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' فعال یا غیرفعال کردن باکس آخرین ویدیوها', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید باکس آخرین ویدیوها را فعال یا غیر فعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="lv1"><?php _e('فعال کن', 'tiva'); ?></label><input id="lv1"
                                                                                                            value="true"
                                                                                                            type="radio"
                                                                                                            name="index_videobox_show" <?php echo (!empty($tiva_options['index-page']['index_videobox_show']) && $tiva_options['index-page']['index_videobox_show'] === 'true' || !isset($tiva_options['index-page']['index_videobox_show'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="lv2"><?php _e('غیرفعال کن', 'tiva'); ?></label><input id="lv2"
                                                                                                               value="false"
                                                                                                               type="radio"
                                                                                                               name="index_videobox_show" <?php echo (!empty($tiva_options['index-page']['index_videobox_show']) && $tiva_options['index-page']['index_videobox_show'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/********************************* BEGIN ADD IN TIVA V5.8  ****************************/-->
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تعداد نمایش ویدیوهای باکس ویدیو', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید تعداد نمایش ویدیوهای باکس آخرین ویدیوها را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">


                <div class="form-group">
                    <label for="tel-box-title"><?php _e('تعداد ویدیوها :', 'tiva'); ?></label>
                    <input style="width:100% ;" type="number"
                           value="<?php echo (!empty($tiva_options['index-page']['video_show_count'])) ? $tiva_options['index-page']['video_show_count'] : ''; ?>"
                           min="0" class="form-control" id="tel-box-title" name="video_show_count">

                </div>

            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیر فعال سازی لوگوی بارکد در قسمت کپی رایت فوتر', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید لوگوی بارکد در قسمت کپی رایت فوتر را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1s">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1s" value="true" type="radio"
                               name="qrcode_show" <?php echo (!empty($tiva_options['single-page']['qrcode_show']) && $tiva_options['single-page']['qrcode_show'] === 'true' || !isset($tiva_options['single-page']['qrcode_show'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2s">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2s" value="false" type="radio"
                               name="qrcode_show" <?php echo (!empty($tiva_options['single-page']['qrcode_show']) && $tiva_options['single-page']['qrcode_show'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن ستون نماد ها', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی !</strong> <?php _e('از این طرق می توانید ستون نماد ها در فوتر فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="alert alert-danger" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>نکته بسیار مهم :</strong> <?php _e('کاربر عزیز توجه داشته باشید با غیر فعال کردن این ستون به صورت اتوماتیک بخش برنامه های ما نمایش داده خواهد شد', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l11"><?php _e('فعال کن', 'tiva'); ?></label><input id="l11"
                                                                                                            value="true"
                                                                                                            type="radio"
                                                                                                            name="show_nemad_logo" <?php echo (!empty($tiva_options['index-page']['show_nemad_logo']) && $tiva_options['index-page']['show_nemad_logo'] === 'true' || !isset($tiva_options['index-page']['show_nemad_logo'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l22"><?php _e('غیرفعال کن', 'tiva'); ?></label><input id="l22"
                                                                                                               value="false"
                                                                                                               type="radio"
                                                                                                               name="show_nemad_logo" <?php echo (!empty($tiva_options['index-page']['show_nemad_logo']) && $tiva_options['index-page']['show_nemad_logo'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات متن برنامه های ما', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید متن برنامه های ما در فوتر سایت ویرایش کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="inputl2"><?php _e('متن برنامه های ما :', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="inputl2"
                      name="our_plans"><?php echo (!empty($tiva_options['index-page']['our_plans'])) ? $tiva_options['index-page']['our_plans'] : ''; ?></textarea>
        </div>
    </div>
</div>
<!--/********************************* END ADD IN TIVA V5.8 ******************************/-->
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن لوگوی سایت', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی !</strong> <?php _e('از این طرق می توانید لوگوی سایت را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l11"><?php _e('فعال کن', 'tiva'); ?></label><input id="l11"
                                                                                                            value="true"
                                                                                                            type="radio"
                                                                                                            name="show_site_logo" <?php echo (!empty($tiva_options['index-page']['show_site_logo']) && $tiva_options['index-page']['show_site_logo'] === 'true' || !isset($tiva_options['index-page']['show_site_logo'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l22"><?php _e('غیرفعال کن', 'tiva'); ?></label><input id="l22"
                                                                                                               value="false"
                                                                                                               type="radio"
                                                                                                               name="show_site_logo" <?php echo (!empty($tiva_options['index-page']['show_site_logo']) && $tiva_options['index-page']['show_site_logo'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات لوگوی سایت', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق میتوانید لوگوی دلخواه خود را به سایت اضافه کنید.', 'tiva'); ?>
        </div>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['index-page']['site-logo'])) ? $tiva_options['index-page']['site-logo'] : ''; ?>"
                   class="form-control favicon" placeholder="بارگزاری لوگوی سایت" name="site-logo" id="tiva-favicon">
            <div class="input-group-btn">
                <a class="btn btn-default favicon-up"><i class="fa fa-upload"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات لوگوی ستاد ساماندهی', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید لوگوی ستاد ساماندهی در فوتر سایت ویرایش کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="inputl1"><?php _e('کد لوگوی ستاد ساماندهی :', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="inputl1"
                      name="fl1_script"><?php echo (!empty($tiva_options['index-page']['fl1_script'])) ? base64_decode($tiva_options['index-page']['fl1_script']) : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات لوگوی ای نماد', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید لوگوی ای نماد در فوتر سایت ویرایش کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="inputl2"><?php _e('کد لوگوی ای نماد :', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="inputl2"
                      name="fl2_script"><?php echo (!empty($tiva_options['index-page']['fl2_script'])) ? base64_decode($tiva_options['index-page']['fl2_script']) : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات متن درباره ما', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید متن درباره ما در فوتر سایت ویرایش کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="inputl2"><?php _e('متن درباره ما :', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="inputl2"
                      name="footer_about"><?php echo (!empty($tiva_options['index-page']['footer_about'])) ? $tiva_options['index-page']['footer_about'] : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات متن کپی رایت', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید متن درج شده در فوتر سایت و قسمت کپی رایت را ویرایش کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('متن کپی رایت :', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="input3"
                      name="tiva_copy_right_op"><?php echo (!empty($tiva_options['index-page']['tiva_copy_right_op'])) ? $tiva_options['index-page']['tiva_copy_right_op'] : ''; ?></textarea>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات QR کد فوتر', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق میتوانید QR کد خود را به سایت اضافه کنید.', 'tiva'); ?>
        </div>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['index-page']['qrcode'])) ? $tiva_options['index-page']['qrcode'] : ''; ?>"
                   class="form-control" placeholder="بارگزاری QR کد" name="qrcode" id="qrcode_input">
            <div class="input-group-btn">
                <a class="btn btn-default qrcode-up"><i class="fa fa-upload"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>

