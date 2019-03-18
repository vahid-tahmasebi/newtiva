<?php $tiva_options = get_option('tiva_options'); ?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات تبلیغات پست ها', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;  margin-right: 670px;">
        <button type="submit" name="op-panel-submit"
                class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('بنر تبلیغات اسکریپتی', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e(' از این قسمت می توانید بنر تبلیغات اسکریپتی به پایین پست ها اضافه کنید. (728*90) در صورتی نمی خواهید نمایش داده شود خالی بگذارید', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('بنر تبلیغات اسکریپتی', 'tiva'); ?></label>
            <textarea class="form-control header-script" rows="10" id="input3" name="custom_banner_script"><?php echo (!empty($tiva_options['ads_setting']['custom_banner_script'])) ? base64_decode($tiva_options['ads_setting']['custom_banner_script']) : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات بنر تبلیغات اختصاصی ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی!</strong> <?php _e(' از این طریق می توانید بنر تبلیغات اختصاصی خود را در پایین پست ها نمایش دهید. (728*90) در صورتی که نمیخواید نمایش داده شود لینک بنر را خالی بگذارید', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <span class="center">تنظیمات بنر</span>
                        <br>
                        <div class="input-group add-on">
                            <input type="text" value="<?php echo (!empty($tiva_options['ads_setting']['custom_banner_url'])) ? $tiva_options['ads_setting']['custom_banner_url'] : ''; ?>" class="form-control favicon" placeholder="بارگزاری بنر" name="custom_banner_url" id="tiva-favicon" >
                            <div class="input-group-btn">
                                <a class="btn btn-default favicon-up" ><i class="fa fa-upload"></i></a>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="url" value="<?php echo (!empty($tiva_options['ads_setting']['custom_banner_link'])) ? $tiva_options['ads_setting']['custom_banner_link'] : ''; ?>" class="form-control" name="custom_banner_link"  placeholder="لینک تبلیغات بنر را وارد کنید">
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?php echo (!empty($tiva_options['ads_setting']['custom_banner_alt'])) ? $tiva_options['ads_setting']['custom_banner_alt'] : ''; ?>" class="form-control" name="custom_banner_alt" placeholder="عنوان Alt بنر را وارد کنید">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div><?php $tiva_options = get_option('tiva_options'); ?>
