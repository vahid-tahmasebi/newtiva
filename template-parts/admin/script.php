<?php $tiva_options = get_option('tiva_options'); ?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('اسکریپت های سفارشی', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;  margin-right: 695px;">
        <button type="submit" name="op-panel-submit"
                class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('اسکریپت های قسمت هدر', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این قسمت می توانید اسکریپت های اختصاصی به قسمت هدر سایت اضافه کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('اسکریپت های هدر', 'tiva'); ?></label>
            <textarea class="form-control header-script" rows="10" id="input3" name="header-script"><?php echo (!empty($tiva_options['tiva-script']['header-script'])) ? wp_normalize_path($tiva_options['tiva-script']['header-script']) : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('اسکریپت قسمت فوتر', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این قسمت می توانید اسکریپت های اختصاصی به قسمت فوتر اضافه کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('اسکریپت های فوتر', 'tiva'); ?></label>
            <textarea class="form-control footer-script" rows="10" id="input3" name="footer-script"><?php echo (!empty($tiva_options['tiva-script']['footer-script'])) ? $tiva_options['tiva-script']['footer-script'] : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>