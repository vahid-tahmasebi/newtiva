<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات سیستم لایک دیدگاه ها', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;margin-right: 637px;">
        <button type="submit" class="btn btn-success" name="op-panel-submit"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن سیستم لایک دیدگاه ها', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی !</strong> <?php _e('از این طریق می توانید سیستم لایک دیدگاه را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1" value="true" type="radio" name="comment_like_show" <?php echo (!empty($tiva_options['comment-like']['comment_like_show']) && $tiva_options['comment-like']['comment_like_show'] === 'true' || !isset($tiva_options['comment-like']['comment_like_show']))? 'checked' : '' ; ?> >
                        <label class="radio-inline" for="l2">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2" value="false" type="radio" name="comment_like_show" <?php echo (!empty($tiva_options['comment-like']['comment_like_show']) && $tiva_options['comment-like']['comment_like_show'] === 'false')? 'checked' : '' ; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>