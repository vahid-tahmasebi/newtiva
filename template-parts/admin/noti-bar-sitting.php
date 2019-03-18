<?php $tiva_options = get_option('tiva_options'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css"
      rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/js/bootstrap-colorpicker.js"></script>
<style>
    .dropdown-menu {
        right: auto !important;
    }

</style>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات نوار اطلاعیه', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;  margin-right: 695px;">
        <button type="submit" name="op-panel-submit"
                class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن نوار اطلاعیه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید نوار اطلاعیه را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1" value="true" type="radio"
                               name="noti-disable" <?php echo (!empty($tiva_options['noti-bar-sitting']['noti-disable']) && $tiva_options['noti-bar-sitting']['noti-disable'] === 'true' || !isset($tiva_options['noti-bar-sitting']['noti-disable'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2" value="false" type="radio"
                               name="noti-disable" <?php echo (!empty($tiva_options['noti-bar-sitting']['noti-disable']) && $tiva_options['noti-bar-sitting']['noti-disable'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات متن نوار', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی !</strong> <?php _e('از این طریق می توانید متن نوار اطلاعیه را تغییر دهید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input1"><?php _e('متن نوار:', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="input1"
                      name="noti-text"><?php echo (!empty($tiva_options['noti-bar-sitting']['noti-text'])) ? $tiva_options['noti-bar-sitting']['noti-text'] : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات عنوان دکمه ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید عنوان دکمه نوار را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('عنوان دکمه', 'tiva'); ?></label>
            <input class="form-control"
                   value="<?php echo (!empty($tiva_options['noti-bar-sitting']['noti-btn-text'])) ? $tiva_options['noti-bar-sitting']['noti-btn-text'] : ''; ?>"
                   id="input3" name="noti-btn-text">
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات لینک دکمه ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید لینک دکمه را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('لینک دکمه', 'tiva'); ?></label>
            <input type="url" class="form-control"
                   value="<?php echo (!empty($tiva_options['noti-bar-sitting']['noti-btn-link'])) ? $tiva_options['noti-bar-sitting']['noti-btn-link'] : ''; ?>"
                   id="input3" name="noti-btn-link">
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات رنگ نوار اطلاعیه ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید رنگ نوار اطلاعیه را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div id="cp2" class="input-group colorpicker-component" title="Using input value">
            <span class="input-group-addon"><i></i></span>
            <input type="text" style="direction: ltr" class="form-control input-lg" value="<?php echo (!empty($tiva_options['noti-bar-sitting']['noti-wrapper-color'])) ? $tiva_options['noti-bar-sitting']['noti-wrapper-color'] : '#fada01'; ?>"
                   name="noti-wrapper-color"/>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات رنگ دکمه ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید رنگ رنگ دکمه را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div id="cp3" class="input-group colorpicker-component" title="Using input value">
            <span class="input-group-addon"><i></i></span>
            <input type="text" style="direction: ltr" class="form-control input-lg" value="<?php echo (!empty($tiva_options['noti-bar-sitting']['noti-btn-color'])) ? $tiva_options['noti-bar-sitting']['noti-btn-color'] : '#29b87e'; ?>" name="noti-btn-color"/>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات تصویر بک گراند نوار', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق میتوانید تصویر بک گراند نوار اطلاعیه را تنظیم کنید لطفا تصویر با فرمت png و حداقل سایز 100*100 پکیسل و پشت شفاف آپلود کنید.', 'tiva'); ?>
        </div>
        <div class="input-group add-on">
            <input type="text" value="<?php echo (!empty($tiva_options['noti-bar-sitting']['noti-background'])) ? $tiva_options['noti-bar-sitting']['noti-background'] : ''; ?>" class="form-control favicon" placeholder="بارگزاری تصویر بک گراند نوار اطلاعیه" name="noti-background" id="tiva-favicon" >
            <div class="input-group-btn">
                <a class="btn btn-default favicon-up" ><i class="fa fa-upload"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>
<script type="text/javascript">
    $('#cp2 , #cp3').colorpicker();
</script>