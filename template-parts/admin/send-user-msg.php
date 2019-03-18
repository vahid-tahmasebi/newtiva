<?php $tiva_options = get_option('tiva_options'); ?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات ارسال پیام به کاربر ', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;margin-right: 666px;">
        <button type="submit" class="btn btn-success"
                name="op-panel-submit"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیر فعال کردن ارسال پیام به کاربر ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید سیستم ارسال پیام به کاربر بعد از ثبت نام و وارد شدن به سایت را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1s">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1s" value="true" type="radio"
                               name="send_msg_on_or_off" <?php echo (!empty($tiva_options['send-msg-user']['send_msg_on']) && $tiva_options['send-msg-user']['send_msg_on'] === 'true' || !isset($tiva_options['send-msg-user']['send_msg_on'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2s">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2s" value="false" type="radio"
                               name="send_msg_on_or_off" <?php echo (!empty($tiva_options['send-msg-user']['send_msg_on']) && $tiva_options['send-msg-user']['send_msg_on'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات عنوان پیام ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید عنوان پیام ارسالی به کاربر جدید را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('عنوان پیام', 'tiva'); ?></label>
            <input class="form-control"
                   value="<?php echo (!empty($tiva_options['send-msg-user']['msg_subject'])) ? $tiva_options['send-msg-user']['msg_subject'] : ''; ?>"
                   id="input3" name="msg_subject">
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات ارسال کننده پیام ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید نام مدیر مورد نظر برای ارسال پیام را مشخص کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('نام مدیر', 'tiva'); ?></label>
            <select class="form-control" id="input3" name="msg_sender_admin">
                <?php
                $args = array(
                    'order' => 'ASC',
                    'role' => 'Administrator'
                );
                $all_admin = get_users($args);
                foreach ($all_admin as $user):?>
                    <?php echo '<option '.selected($user->ID, $tiva_options['send-msg-user']['msg_sender_admin'],'selected').' value="' . $user->ID . '">' . $user->display_name . '</option>' ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات متن پیام', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید متن پیام مورد نظر خود را برای ارسال به کاربر تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="form-group">
            <label for="input3"><?php _e('متن پیام', 'tiva'); ?></label>
            <textarea class="form-control" rows="5" id="input3" name="msg_text"><?php echo (!empty($tiva_options['send-msg-user']['msg_text'])) ? $tiva_options['send-msg-user']['msg_text'] : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات پیوست پیام', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید فایل پیوست را بارگزاری کنید.', 'tiva'); ?>
        </div>
        <div class="input-group add-on"

        >
           <input type="text" value="<?php echo (!empty( $tiva_options['send-msg-user']['msg_att'])) ?  $tiva_options['send-msg-user']['msg_att'] : ''; ?>" class="form-control favicon" placeholder="بارگزاری فایل پیوست" name="msg_att" id="tiva-favicon" >
           <div class="input-group-btn">
             <a class="btn btn-default favicon-up" ><i class="fa fa-upload"></i></a>
           </div>
         </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>