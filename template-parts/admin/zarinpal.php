<?php $tiva_options = get_option('tiva_options'); ?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('درگاه زرین پال', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;  margin-right: 737px;">
        <button type="submit" name="op-panel-submit"
                class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('مرچنت کد درگاه زرین پال', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این قسمت می توانید مرچنت کد درگاه پرداخت خود را وارد کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('مرچنت کد', 'tiva'); ?></label>
            <input type="text" class="form-control header-script"  id="input3" name="merchant_code" value="<?php echo (!empty($tiva_options['zarinpal']['merchant_code'])) ? $tiva_options['zarinpal']['merchant_code'] : ''; ?>">
        </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>