<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات اسلایدر ', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;margin-right:724px;">
        <button type="submit" class="btn btn-success"
                name="op-panel-submit"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات اسلایدر ', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی!</strong> <?php _e('از این طریق می توانید اسلایدهای اسلایدر  را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <span class="center">اسلاید یک</span>
                        <br>
                        <div class="input-group add-on">
                           <input type="text" value="<?php echo (!empty($tiva_options['main-slider']['shSlide1_img'])) ? $tiva_options['main-slider']['shSlide1_img'] : ''; ?>" class="form-control favicon" placeholder="بارگزاری تصویر اسلاید اول" name="shSlide1_img" id="tiva-favicon" >
                           <div class="input-group-btn">
                             <a class="btn btn-default favicon-up" ><i class="fa fa-upload"></i></a>
                           </div>
                         </div>
                        <br>
                        <div class="form-group">
                            <input type="url" value="<?php echo (!empty($tiva_options['main-slider']['shSlide1_url'])) ? $tiva_options['main-slider']['shSlide1_url'] : ''; ?>" class="form-control" name="shSlide1_url"  placeholder="لینک اسلاید اول را وارد کنید">
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?php echo (!empty($tiva_options['main-slider']['shSlide1_alt'])) ? $tiva_options['main-slider']['shSlide1_alt'] : ''; ?>" class="form-control" name="shSlide1_alt" placeholder="عنوان Alt اسلاید اول را وارد کنید">
                        </div>
                        <span class="center">اسلاید دو</span>
                        <br>
                        <div class="input-group add-on">
                           <input type="text" value="<?php echo (!empty($tiva_options['main-slider']['shSlide2_img'])) ? $tiva_options['main-slider']['shSlide2_img'] : ''; ?>" id="shSlide2" class="form-control " placeholder="بارگزاری تصویر اسلاید دوم" name="shSlide2_img">
                           <div class="input-group-btn">
                             <a class="btn btn-default shSlide2" ><i class="fa fa-upload"></i></a>
                           </div>
                         </div>
                        <br>
                        <div class="form-group">
                            <input type="url" value="<?php echo (!empty($tiva_options['main-slider']['shSlide2_url'])) ? $tiva_options['main-slider']['shSlide2_url'] : ''; ?>" class="form-control" name="shSlide2_url"  placeholder="لینک اسلاید دوم را وارد کنید">
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?php echo (!empty($tiva_options['main-slider']['shSlide2_alt'])) ? $tiva_options['main-slider']['shSlide2_alt'] : ''; ?>" class="form-control" name="shSlide2_alt" placeholder="عنوان Alt اسلاید دوم را وارد کنید">
                        </div>
                        <span class="center">اسلاید سه</span>
                        <br>
                        <div class="input-group add-on">
                           <input type="text" value="<?php echo (!empty($tiva_options['main-slider']['shSlide3_img'])) ? $tiva_options['main-slider']['shSlide3_img'] : ''; ?>" id="shSlide3" class="form-control " placeholder="بارگزاری تصویر اسلاید سوم" name="shSlide3_img">
                           <div class="input-group-btn">
                             <a class="btn btn-default shSlide3" ><i class="fa fa-upload"></i></a>
                           </div>
                         </div>
                        <br>
                        <div class="form-group">
                            <input type="url" value="<?php echo (!empty($tiva_options['main-slider']['shSlide3_url'])) ? $tiva_options['main-slider']['shSlide3_url'] : ''; ?>" class="form-control" name="shSlide3_url"  placeholder="لینک اسلاید سوم را وارد کنید">
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?php echo (!empty($tiva_options['main-slider']['shSlide3_alt'])) ? $tiva_options['main-slider']['shSlide3_alt'] : ''; ?>" class="form-control" name="shSlide3_alt" placeholder="عنوان Alt اسلاید سوم را وارد کنید">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>
