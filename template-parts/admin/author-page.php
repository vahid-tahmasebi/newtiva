<?php $tiva_options = get_option('tiva_options'); ?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات صفحه نویسنده','tiva') ; ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;margin-right: 680px;">
        <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن جستجو پیشرفته', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی !</strong> <?php _e('از این طریق می توانید فرم جستجو را فعال یا غیر فعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1" value="true" type="radio" name="author_search_show" <?php echo (!empty($tiva_options['author-page']['author_search_show']) && $tiva_options['author-page']['author_search_show'] === 'true' || !isset($tiva_options['author-page']['author_search_show'] ))? 'checked' : '' ; ?> >
                        <label class="radio-inline" for="l2">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2" value="false" type="radio" name="author_search_show" <?php echo (!empty($tiva_options['author-page']['author_search_show']) && $tiva_options['author-page']['author_search_show'] === 'false')? 'checked' : '' ; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن باکس بیوگرافی نویسنده', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی !</strong> <?php _e('از این طریق می توانید باکس بیوگرافی نویسنده را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1" value="true" type="radio" name="author_box_bio_show" <?php echo (!empty($tiva_options['author-page']['author_box_bio_show']) && $tiva_options['author-page']['author_box_bio_show'] === 'true' || !isset($tiva_options['author-page']['author_box_bio_show'] ))? 'checked' : '' ; ?> >
                        <label class="radio-inline" for="l2">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2" value="false" type="radio" name="author_box_bio_show" <?php echo (!empty($tiva_options['author-page']['author_box_bio_show']) && $tiva_options['author-page']['author_box_bio_show'] === 'false')? 'checked' : '' ; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن باکس اطلاعات نویسنده (امتیاز ، مقاله و ...)', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی !</strong> <?php _e('از این طریق می توانید باکس اطلاعات نویسنده (امتیاز ، مقاله و ...) را فعال یا غیرفعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1">
                            <?php _e('فعال کن', 'tiva'); ?>
                        </label>
                        <input id="l1" value="true" type="radio" name="author_box_info_show" <?php echo (!empty($tiva_options['author-page']['author_box_info_show']) && $tiva_options['author-page']['author_box_info_show'] === 'true' || !isset($tiva_options['author-page']['author_box_info_show'] ))? 'checked' : '' ; ?> >
                        <label class="radio-inline" for="l2">
                            <?php _e('غیرفعال کن', 'tiva'); ?></label>
                        <input id="l2" value="false" type="radio" name="author_box_info_show" <?php echo (!empty($tiva_options['author-page']['author_box_info_show']) && $tiva_options['author-page']['author_box_info_show'] === 'false')? 'checked' : '' ; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>