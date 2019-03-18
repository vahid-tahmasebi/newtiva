<?php $tiva_options = get_option('tiva_options');
?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات صفحه اختصاصی فروشگاه', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;  margin-right: 621px;">
        <button type="submit" name="op-panel-submit"
                class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن بنر تخفیفات ویژه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید بنر تخفیفات ویژه را در صفحه اصلی و در صفجه فروشگاه فعال یا غیر فعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="l1"><?php _e('فعال کن', 'tiva'); ?></label><input id="l1"
                                                                                                           value="true"
                                                                                                           type="radio"
                                                                                                           name="noti-banner-disable" <?php echo (!empty($tiva_options['store-index-page']['noti-banner-disable']) && $tiva_options['store-index-page']['noti-banner-disable'] === 'true' || !isset($tiva_options['store-index-page']['noti-banner-disable'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="l2"><?php _e('غیرفعال کن', 'tiva'); ?></label><input
                                id="l2" value="false" type="radio"
                                name="noti-banner-disable" <?php echo (!empty($tiva_options['store-index-page']['noti-banner-disable']) && $tiva_options['store-index-page']['noti-banner-disable'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('فعال یا غیرفعال کردن بخش سرویس های فروشگاه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید بخش سرویس های فروشگاه را در صفحه اصلی و در صفحه محصول فعال یا غیر فعال کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="radio-inline" for="lps1"><?php _e('فعال کن', 'tiva'); ?></label><input id="lps1"
                                                                                                             value="true"
                                                                                                             type="radio"
                                                                                                             name="store-service-disable" <?php echo (!empty($tiva_options['store-index-page']['store-service-disable']) && $tiva_options['store-index-page']['store-service-disable'] === 'true' || !isset($tiva_options['store-index-page']['store-service-disable'])) ? 'checked' : ''; ?> >
                        <label class="radio-inline" for="lps2"><?php _e('غیرفعال کن', 'tiva'); ?></label><input
                                id="lps2" value="false" type="radio"
                                name="store-service-disable" <?php echo (!empty($tiva_options['store-index-page']['store-service-disable']) && $tiva_options['store-index-page']['store-service-disable'] === 'false') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' تنظیمات بنر تخفیفات ویژه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق میتوانید بنر تخفیفات ویژه دلخواه خود را به سایت اضافه کنید.', 'tiva'); ?>
        </div>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['store-index-page']['noti-banner-img'])) ? $tiva_options['store-index-page']['noti-banner-img'] : ''; ?>"
                   class="form-control favicon" placeholder="بارگزاری لوگوی سایت" name="noti-banner-img"
                   id="tiva-favicon">
            <div class="input-group-btn">
                <a class="btn btn-default favicon-up"><i class="fa fa-upload"></i></a>
            </div>
        </div>
    </div>
</div>
<!--edited in tiva v3.1-->
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' تنظیمات بنر تخفیفات ویژه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید دسته بندی محصولات دارای تخفیفات ویژه و حراج شده مرتبط با بنر را مشخص کنید.', 'tiva'); ?>
        </div>
        <div class="">
            <label for="catSelect"></label>
            <select name='noti-banner-cat' id="catSelect" class="form-control">
                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['noti-banner-cat']) ? $tiva_options['store-index-page']['noti-banner-cat'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' تنظیمات بخش سرویس فروشگاه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توان صفحه های مورد نظر برای هر آیتم از سرویس ها فروشگاه خود را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="">
            <label for="pageSelect"> انتخاب برگه تحویل اکسپرس</label>
            <select name='shipping-express-page' id="pageSelect" class="form-control">
                <option> برگه مورد نظر خود را انتخاب کنید</option>
                <?php
                $pages = get_pages();
                foreach ($pages as $page):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['shipping-express-page'])) ? $tiva_options['store-index-page']['shipping-express-page'] : '', $page->ID); ?>
                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="">
            <label for="pageSelect2"> انتخاب برگه ٧ روز ضمانت بازگشت</label>
            <select name='day-guarantee-page' id="pageSelect2" class="form-control">
                <option> برگه مورد نظر خود را انتخاب کنید</option>
                <?php
                $pages = get_pages();
                foreach ($pages as $page):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['day-guarantee-page'])) ? $tiva_options['store-index-page']['day-guarantee-page'] : '', $page->ID); ?>
                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="">
            <label for="pageSelect3"> انتخاب برگه پرداخت در محل</label>
            <select name='cod-page' id="pageSelect3" class="form-control">
                <option> برگه مورد نظر خود را انتخاب کنید</option>
                <?php
                $pages = get_pages();
                foreach ($pages as $page):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['cod-page'])) ? $tiva_options['store-index-page']['cod-page'] : '', $page->ID); ?>
                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="">
            <label for="pageSelect4"> انتخاب برگه تضمین بهترین قیمت</label>
            <select name='best-price' id="pageSelect4" class="form-control">
                <option> برگه مورد نظر خود را انتخاب کنید</option>
                <?php
                $pages = get_pages();
                foreach ($pages as $page):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['best-price'])) ? $tiva_options['store-index-page']['best-price'] : '', $page->ID); ?>
                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="">
            <label for="pageSelect5"> انتخاب برگه ضمانت اصل بودن کالا</label>
            <select name='certificate' id="pageSelect5" class="form-control">
                <option> برگه مورد نظر خود را انتخاب کنید</option>
                <?php
                $pages = get_pages();
                foreach ($pages as $page):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['certificate'])) ? $tiva_options['store-index-page']['certificate'] : '', $page->ID); ?>
                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' تنظیمات لایه های تصویری دسته بندی های فروشگاه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید تصویر و دسته بندی مورد نظر برای بخش لایه های تصویری  فروشگاه را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="">
            <label for="catSelect1">لایه شماره ۱ ردیف اول سمت راست</label>
            <select name='layer1-cat' id="catSelect1" class="form-control">
                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['layer1-cat']) ? $tiva_options['store-index-page']['layer1-cat'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['store-index-page']['layer1-cat-img'])) ? $tiva_options['store-index-page']['layer1-cat-img'] : ''; ?>"
                   class="form-control layer1-cat-img" placeholder="بارگزاری تصویر دسته بندی لایه ۱"
                   name="layer1-cat-img">
            <div class="input-group-btn"><a class="btn btn-default layer1-cat-img"><i class="fa fa-upload"></i></a>
            </div>
        </div>
        <br>
        <div class="">
            <label for="catSelect2">لایه شماره ۲ ردیف اول سمت چپ</label>
            <select name='layer2-cat' id="catSelect2" class="form-control">
                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['layer2-cat']) ? $tiva_options['store-index-page']['layer2-cat'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['store-index-page']['layer2-cat-img'])) ? $tiva_options['store-index-page']['layer2-cat-img'] : ''; ?>"
                   class="form-control layer2-cat-img" placeholder="بارگزاری تصویر دسته بندی لایه ۲"
                   name="layer2-cat-img">
            <div class="input-group-btn"><a class="btn btn-default layer2-cat-img"><i class="fa fa-upload"></i></a>
            </div>
        </div>
        <br>
        <div class="">
            <label for="catSelect3">لایه شماره ۳ ردیف دوم سمت راست</label>
            <select name='layer3-cat' id="catSelect3" class="form-control">
                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['layer3-cat']) ? $tiva_options['store-index-page']['layer3-cat'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['store-index-page']['layer3-cat-img'])) ? $tiva_options['store-index-page']['layer3-cat-img'] : ''; ?>"
                   class="form-control layer3-cat-img" placeholder="بارگزاری تصویر دسته بندی لایه ۳"
                   name="layer3-cat-img">
            <div class="input-group-btn"><a class="btn btn-default layer3-cat-img"><i class="fa fa-upload"></i></a>
            </div>
        </div>
        <br>
        <div class="">
            <label for="catSelect4">لایه شماره ۴ ردیف دوم وسط</label>
            <select name='layer4-cat' id="catSelect4" class="form-control">
                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['layer4-cat']) ? $tiva_options['store-index-page']['layer4-cat'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['store-index-page']['layer4-cat-img'])) ? $tiva_options['store-index-page']['layer4-cat-img'] : ''; ?>"
                   class="form-control layer4-cat-img" placeholder="بارگزاری تصویر دسته بندی لایه ۴"
                   name="layer4-cat-img">
            <div class="input-group-btn"><a class="btn btn-default layer4-cat-img"><i class="fa fa-upload"></i></a>
            </div>
        </div>
        <br>
        <div class="">
            <label for="catSelect5">لایه شماره ۵ ردیف دوم سمت چپ</label>
            <select name='layer5-cat' id="catSelect5" class="form-control">
                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['layer5-cat']) ? $tiva_options['store-index-page']['layer5-cat'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['store-index-page']['layer5-cat-img'])) ? $tiva_options['store-index-page']['layer5-cat-img'] : ''; ?>"
                   class="form-control layer5-cat-img" placeholder="بارگزاری تصویر دسته بندی لایه ۴"
                   name="layer5-cat-img">
            <div class="input-group-btn"><a class="btn btn-default layer5-cat-img"><i class="fa fa-upload"></i></a>
            </div>
        </div>
        <br>
        <div class="">
            <label for="catSelect6">لایه شماره ۶ ردیف سوم سمت راست</label>
            <select name='layer6-cat' id="catSelect6" class="form-control">
                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['layer6-cat']) ? $tiva_options['store-index-page']['layer6-cat'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['store-index-page']['layer6-cat-img'])) ? $tiva_options['store-index-page']['layer6-cat-img'] : ''; ?>"
                   class="form-control layer6-cat-img" placeholder="بارگزاری تصویر دسته بندی لایه ۴"
                   name="layer6-cat-img">
            <div class="input-group-btn"><a class="btn btn-default layer6-cat-img"><i class="fa fa-upload"></i></a>
            </div>
        </div>
        <br>
        <div class="">
            <label for="catSelect7">لایه شماره ۷ ردیف سوم سمت چپ</label>
            <select name='layer7-cat' id="catSelect7" class="form-control">
                <option value="">دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['layer7-cat']) ? $tiva_options['store-index-page']['layer7-cat'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="input-group add-on">
            <input type="text"
                   value="<?php echo (!empty($tiva_options['store-index-page']['layer7-cat-img'])) ? $tiva_options['store-index-page']['layer7-cat-img'] : ''; ?>"
                   class="form-control layer7-cat-img" placeholder="بارگزاری تصویر دسته بندی لایه ۴"
                   name="layer7-cat-img">
            <div class="input-group-btn"><a class="btn btn-default layer7-cat-img"><i class="fa fa-upload"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' تنظیمات باکس دسته بندی فروشگاه', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید دسته بندی مورد نظر برای نمایش محصولات در باکس های صفحه فروشگاه را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="">
            <label for="catSelect">باکس شماره ۱</label>
            <select name='box-cat-1' id="catSelect" class="form-control">
                <option>دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['box-cat-1']) ? $tiva_options['store-index-page']['box-cat-1'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="">
            <label for="catSelect">باکس شماره ۲</label>
            <select name='box-cat-2' id="catSelect" class="form-control">
                <option>دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['box-cat-2']) ? $tiva_options['store-index-page']['box-cat-2'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br>
        <div class="">
            <label for="catSelect">باکس شماره ۳</label>
            <select name='box-cat-3' id="catSelect" class="form-control">
                <option>دسته بندی مورد نظر خود را انتخاب کنید</option>
                <?php
                $args = array('type' => 'product', 'taxonomy' => 'product_cat');
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected((isset($tiva_options['store-index-page']['box-cat-3']) ? $tiva_options['store-index-page']['box-cat-3'] : ''), $category->term_id); ?>
                            value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>
</div>
<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit"
            class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>
