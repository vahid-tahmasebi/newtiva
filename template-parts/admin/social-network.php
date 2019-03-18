<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات شبکه های اجتماعی', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;margin-right: 657px;">
        <button type="submit" class="btn btn-success"
                name="op-panel-submit"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
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
        <br>
        <div class="input-group">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['social-network']['telegram-url'])) ? $tiva_options['social-network']['telegram-url'] : ''; ?>"
                   style="direction: ltr;" class="form-control" placeholder="تلگرام" name="telegram-url"
                   aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-telegram"></i></span>
            <span class="input-group-addon" id="basic-addon1">
                <input value="false" type="hidden" name="telegram-show">
                <input value="true" <?php echo (!empty($tiva_options['social-network']['telegram-show']) && $tiva_options['social-network']['telegram-show'] === 'true') ? 'checked' : ''; ?>
                       type="checkbox" name="telegram-show">
            </span>
        </div>
        <br>
        <div class="input-group">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['social-network']['inst-url'])) ? $tiva_options['social-network']['inst-url'] : ''; ?>"
                   style="direction: ltr;" class="form-control" placeholder="اینستاگرام" name="inst-url"
                   aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-instagram"></i></span>
            <span class="input-group-addon" id="basic-addon1">
                <input value="false" type="hidden" name="instagram-show">
                <input value="true" <?php echo (!empty($tiva_options['social-network']['instagram-show']) && $tiva_options['social-network']['instagram-show'] === 'true') ? 'checked' : ''; ?>
                       type="checkbox" name="instagram-show">
            </span>
        </div>
        <br>
        <div class="input-group">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['social-network']['linkedin-url'])) ? $tiva_options['social-network']['linkedin-url'] : ''; ?>"
                   style="direction: ltr;" class="form-control" placeholder="لینکدین" name="linkedin-url"
                   aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-linkedin"></i></span>
            <span class="input-group-addon" id="basic-addon1">
                <input value="false" type="hidden" name="linkedin-show">
                <input value="true" <?php echo (!empty($tiva_options['social-network']['linkedin-show']) && $tiva_options['social-network']['linkedin-show'] === 'true') ? 'checked' : ''; ?>
                       type="checkbox" name="linkedin-show">
            </span>
        </div>
        <br>
        <div class="input-group">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['social-network']['facebook-url'])) ? $tiva_options['social-network']['facebook-url'] : ''; ?>"
                   style="direction: ltr;" class="form-control" placeholder="فیسبوک" name="facebook-url"
                   aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-facebook"></i></span>
            <span class="input-group-addon" id="basic-addon1">
                <input value="false" type="hidden" name="facebook-show">
                <input value="true" <?php echo (!empty($tiva_options['social-network']['facebook-show']) && $tiva_options['social-network']['facebook-show'] === 'true') ? 'checked' : ''; ?>
                       type="checkbox" name="facebook-show">
            </span>
        </div>
        <br>
        <div class="input-group">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['social-network']['twitter-url'])) ? $tiva_options['social-network']['twitter-url'] : ''; ?>"
                   style="direction: ltr;" class="form-control" placeholder="توییتر" name="twitter-url"
                   aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-twitter"></i></span>
            <span class="input-group-addon" id="basic-addon1">
                <input value="false" type="hidden" name="twitter-show">
                <input value="true" <?php echo (!empty($tiva_options['social-network']['twitter-show']) && $tiva_options['social-network']['twitter-show'] === 'true') ? 'checked' : ''; ?>
                       type="checkbox" name="twitter-show">
            </span>
        </div>
        <br>
        <div class="input-group">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['social-network']['google-plus-url'])) ? $tiva_options['social-network']['google-plus-url'] : ''; ?>"
                   style="direction: ltr;" class="form-control" placeholder="گوگل پلاس" name="google-plus-url"
                   aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><i class=" fa fa-google-plus"></i></span>
            <span class="input-group-addon" id="basic-addon1">
                <input value="false" type="hidden" name="google-plus-show">
                <input value="true" <?php echo (!empty($tiva_options['social-network']['google-plus-show']) && $tiva_options['social-network']['google-plus-show'] === 'true') ? 'checked' : ''; ?>
                       type="checkbox" name="google-plus-show">
            </span>
        </div>

        <!-- /********************************* BEGIN ADD IN TIVA V5.8  ***************************/-->
        <br>
        <div class="input-group">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['social-network']['whatsapp-url'])) ? $tiva_options['social-network']['whatsapp-url'] : ''; ?>"
                   style="direction: ltr;" class="form-control" placeholder="واتساپ" name="whatsapp-url"
                   aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
            <span class="input-group-addon" id="basic-addon1">
                <input value="false" type="hidden" name="whatsapp-show">
                <input value="true" <?php echo (!empty($tiva_options['social-network']['whatsapp-show']) && $tiva_options['social-network']['whatsapp-show'] === 'true') ? 'checked' : ''; ?> type="checkbox" name="whatsapp-show">
            </span>
        </div>

        <br>
        <div class="input-group">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['social-network']['aparat-url'])) ? $tiva_options['social-network']['aparat-url'] : ''; ?>"
                   style="direction: ltr;" class="form-control" placeholder="آپارات" name="aparat-url"
                   aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-video-camera" aria-hidden="true"></i></span>
            <span class="input-group-addon" id="basic-addon2">
                <input value="false" type="hidden" name="aparat-show">
                <input value="true" <?php echo (!empty($tiva_options['social-network']['aparat-show']) && $tiva_options['social-network']['aparat-show'] === 'true') ? 'checked' : ''; ?> type="checkbox" name="aparat-show">
            </span>
        </div>

        <!-- /********************************* END ADD IN TIVA V5.8 ******************************/-->
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>