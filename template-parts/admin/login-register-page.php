<?php $tiva_options = get_option('tiva_options'); ?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات صفحه لاگین ، عضویت ، بازیابی رمز عبور', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;  margin-right: 548px;">
        <button type="submit" name="op-panel-submit"
                class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات متن صفحه عضویت', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید متن درج شده در صفحه عضویت را ویرایش کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input1"><?php _e('متن صفحه عضویت :', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="input1"
                      name="register-page-text"><?php echo (!empty($tiva_options['login-register-page']['register-page-text'])) ? $tiva_options['login-register-page']['register-page-text'] : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات متن صفحه لاگین', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید متن درج شده در صفحه لاگین را ویرایش کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input2"><?php _e('متن صفحه لاگین :', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="input2"
                      name="login-page-text"><?php echo (!empty($tiva_options['login-register-page']['login-page-text'])) ? $tiva_options['login-register-page']['login-page-text'] : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات متن صفحه بازیابی رمز عبور', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید متن درج شده در صفحه بازیابی رمز عبور را ویرایش کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('متن صفحه بازیابی رمز عبور :', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="input3" name="reset-page-text"><?php echo (!empty($tiva_options['login-register-page']['reset-page-text'])) ? $tiva_options['login-register-page']['reset-page-text'] : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' تنظیمات برگه قوانین و مقرارت بخش عضویت ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید برگه لینک قوانین و مقرارت بخش عضویت را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="">
            <label for="pageSelect"> انتخاب برگه قوانین و مقرارت بخش عضویت</label>
            <select name='loginpage-term-link' id="pageSelect" class="form-control">
                <option> برگه مورد نظر خود را انتخاب کنید</option>
                <?php
                $pages = get_pages();
                foreach ($pages as $page):
                    ?>
                    <option <?php selected((isset($tiva_options['login-register-page']['loginpage-term-link'])) ? $tiva_options['login-register-page']['loginpage-term-link'] : '', $page->ID); ?> value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>
</div>

<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>

