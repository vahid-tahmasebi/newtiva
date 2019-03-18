<?php $tiva_options = get_option('tiva_options'); ?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات سئو', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;  margin-right: 742px;">
        <button type="submit" name="op-panel-submit"
                class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات فاوآیکن', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق میتوانید فاوآیکن دلخواه را به سایت اضافه کنید.', 'tiva'); ?>
        </div>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['seo-page']['tiva-favicon'])) ? $tiva_options['seo-page']['tiva-favicon'] : ''; ?>"
                   class="form-control favicon" placeholder="بارگزاری فاو آیکون" name="tiva-favicon" id="tiva-favicon">
            <div class="input-group-btn">
                <a class="btn btn-default favicon-up"><i class="fa fa-upload"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>

