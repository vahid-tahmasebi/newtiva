<?php

function tiva_admin_styles($hook)
{
    global $typenow, $hook;
    if ($typenow == 'post' || $typenow == 'download' || $typenow == 'video' || $hook == 'widgets.php') {


        wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap-rtl.min.js', array('jquery'), false, true);
        wp_enqueue_script('bootstrap-js');

        wp_enqueue_style('tiva_meta_box_styles', get_template_directory_uri() . '/css/tiva-meta-box.css');
        wp_register_script('tiva-admin-js', get_template_directory_uri() . '/js/tiva-admin.js', array('jquery'), false, true);
        wp_enqueue_script('tiva-admin-js');


    }
}


function tiva_post_meta_box()
{
    add_meta_box('tiva_post_meta_box', __('تنظیمات نوشته', 'tiva'), 'tiva_post_meta_box_callback', 'post', 'side', 'high',
        array(
            '__block_editor_compatible_meta_box' => true,
        )
        );
    // add in tiva v 4 video post met bax
    add_meta_box('tiva_page_disable_meta_box', __('تنظیمات برگه', 'tiva'), 'tiva_page_disable_meta_box_callback', 'page', 'side', 'high');
    add_meta_box('tiva_download_meta_box', __('تنظیمات دانلودها', 'tiva'), 'tiva_download_meta_box_callback', 'download', 'side', 'high');
    add_meta_box('tiva_download_box_meta_box', __('تنظیمات جعبه دانلود', 'tiva'), 'tiva_download_box_meta_box_callback', 'download', 'normal', 'high');
    // add to tiva in v3
    add_meta_box('tiva_product_meta_box', __('تنظیمات اختصاصی محصول', 'tiva'), 'tiva_product_meta_box_callback', 'product', 'side', 'high');
    add_meta_box('tiva_product_custom_data_meta_box', __('تنظیمات اطلاعات اختصاصی محصول', 'tiva'), 'tiva_product_custom_data_meta_box_callback', 'product', 'normal', 'high');

    // add in tiva v 4 video post met bax
    add_meta_box('tiva_video_post_meta_box', __('تنظیمات ویدیو', 'tiva'), 'tiva_video_post_meta_box_callback', 'video', 'normal', 'high');

}

// add to tiva in v4 for save video post function callback
function tiva_video_post_meta_box_callback($post)
{
    global $post;
    $tiva_video_poster = get_post_meta($post->ID, 'tiva_video_poster', true);
    $tiva_up_video = get_post_meta($post->ID, 'tiva_up_video', true);
    $aparat_video_script = get_post_meta($post->ID, 'aparat_video_script', true);
    $tiva_video_select = get_post_meta($post->ID, 'tiva-video-select', true);
    $tiva_video_time = get_post_meta($post->ID, 'tiva-video-time', true);
    $tiva_vip_post = get_post_meta($post->ID, 'tiva_vip_post', true);
//    var_dump($tiva_video_select);
    ?>
    <div class="video-metabox-wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">تنظیمات ویدیو</div>
            <div class="panel-body">
                <div class="alert alert-warning">
                    <strong> سوال ! </strong> آیا ویدیوی شما به صورت اختصاصی هست ؟
                </div>
                <div class="meta-box-wrapper">
                    <div class="show-sidebar-box video-vip-metabox">
                        <input id="tiva_vip_post" class="" type="checkbox"
                               name="tiva_vip_post" <?php checked(1, intval($tiva_vip_post)); ?>>
                        <label for="tiva_vip_post"><?php _e('ویدیو مخصوص کاربران ویژه', 'tiva'); ?></label>
                    </div>
                </div>
                <div class="checkbox">
                    <label> <input type="radio"
                                   name="tiva-video-select" <?php echo ($tiva_video_select === 'no') ? 'checked' : '' ?>
                                   id="aparat" value="no"> خیر ویدیوی من
                        به صورت اسکریپت از سایت آپارات است </label>
                </div>
                <div class="checkbox">
                    <label> <input type="radio"
                                   name="tiva-video-select" <?php echo ($tiva_video_select === 'yes') ? 'checked' : '' ?>
                                   id="custom-video" value="yes"> بله ویدیوی من به
                        صورت اختصاصی است </label>
                </div>
                <div class="aparat-form"
                     style="display: none <?php echo ($tiva_video_select === 'no') ? 'display: block !important' : '' ?>">
                    <div class="panel panel-success">
                        <div class="panel-heading">تنظیمات اسکریپت ویدیو آپارات</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="aparat-video-script"> اسکریپت ویدیو آپارات :</label>
                                <textarea class="form-control" name="aparat-video-script" rows="5"
                                          id="aparat-video-script"><?php echo $aparat_video_script ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-video"
                     style="display: none <?php echo ($tiva_video_select === 'yes') ? 'display: block !important' : '' ?>">
                    <div class="panel panel-success">
                        <div class="panel-heading">تنظیمات ویدیو اختصاصی</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="url" value="<?php echo $tiva_video_poster ?>" name="video-poster"
                                               id="video-poster" class="form-control"
                                               placeholder="از این طریق می توانید پوستر اختصاصی ویدیو را بارگذاری کنید ...">
                                        <span class="input-group-btn"><a id="video-poster" class="btn btn-primary">بارگذاری پوستر</a></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="url" value="<?php echo $tiva_up_video ?>" name="up-video"
                                               id="up-video" class="form-control"
                                               placeholder="از این طریق می توانید ویدیو اختصاصی خود را بارگذاری کنید ...">
                                        <span class="input-group-btn"><a id="up-video" class="btn btn-primary">بارگذاری ویدیو اختصاصی</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="video-time">تایم ویدیو را وارد کنید : </label>
                    <input type="text" id="video-time" value="<?php echo $tiva_video_time ?>" name="video-time"
                           class="form-control"
                           placeholder="از این طریق می توانید زمان ویدیو را تنظیم کنید به طور مثال (12:05)">
                </div>

            </div>
        </div>
    </div>
    <?php
}

function tiva_post_meta_box_callback($post)
{
    global $post;
    $author_box_checked = get_post_meta($post->ID, 'tiva_show_author_box', true);
    $comments_box_checked = get_post_meta($post->ID, 'tiva_show_comments_box', true);
    $sidebar_box_checked = get_post_meta($post->ID, 'tiva_show_sidebar_box', true);
    $post_thumbnail_checked = get_post_meta($post->ID, 'tiva_show_post_thumbnail', true);
    $tiva_private_post = get_post_meta($post->ID, 'tiva_private_post', true);
    $tiva_vip_post = get_post_meta($post->ID, 'tiva_vip_post', true);
//    var_dump($sidebar_box_checked);

    ?>
    <div class="meta-box-wrapper">
        <div class="show-author-box">
            <input id="show-author-box" class="" type="checkbox"
                   name="tiva_show_author_box" <?php checked(1, intval($author_box_checked)); ?>>
            <label for="show-author-box"><?php _e('غیرفعال سازی باکس نویسنده ', 'tiva'); ?></label>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-comments-box">
                <input id="show-comments-box" class="" type="checkbox"
                       name="tiva_show_comments_box" <?php checked(1, intval($comments_box_checked)); ?>>
                <label for="show-comments-box"><?php _e('غیرفعال سازی کامنت ها ', 'tiva'); ?></label>
            </div>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-sidebar-box">
                <input id="show-sidebar-box" class="" type="checkbox"
                       name="tiva_show_sidebar_box" <?php checked(1, intval($sidebar_box_checked)); ?>>
                <label for="show-sidebar-box"><?php _e('غیرفعال سازی سایدبار ', 'tiva'); ?></label>
            </div>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-sidebar-box">
                <input id="show-post_thumbnail" class="" type="checkbox"
                       name="tiva_show_post_thumbnail" <?php checked(1, intval($post_thumbnail_checked)); ?>>
                <label for="show-post_thumbnail"><?php _e('غیرفعال سازی تصویر شاخص ', 'tiva'); ?></label>
            </div>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-sidebar-box">
                <input id="tiva_private_post" class="" type="checkbox"
                       name="tiva_private_post" <?php checked(1, intval($tiva_private_post)); ?>>
                <label for="tiva_private_post"><?php _e('مقاله مخصوص اعضا', 'tiva'); ?></label>
            </div>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-sidebar-box">
                <input id="tiva_vip_post" class="" type="checkbox"
                       name="tiva_vip_post" <?php checked(1, intval($tiva_vip_post)); ?>>
                <label for="tiva_vip_post"><?php _e('مقاله مخصوص کاربران ویژه', 'tiva'); ?></label>
            </div>
        </div>
    </div>
    <?php
}

function tiva_download_meta_box_callback($post)
{
    global $post;
    $author_box_checked = get_post_meta($post->ID, 'tiva_show_author_box', true);
    $comments_box_checked = get_post_meta($post->ID, 'tiva_show_comments_box', true);
    $sidebar_box_checked = get_post_meta($post->ID, 'tiva_show_sidebar_box', true);
    $post_thumbnail_checked = get_post_meta($post->ID, 'tiva_show_post_thumbnail', true);
    $tiva_private_download = get_post_meta($post->ID, 'tiva_private_download', true);
    $tiva_show_related_product = get_post_meta($post->ID, 'tiva_show_related_product', true);
    $tiva_vip_post = get_post_meta($post->ID, 'tiva_vip_post', true);
    ?>
    <div class="meta-box-wrapper">
        <div class="show-author-box">
            <input id="show-author-box" class="" type="checkbox"
                   name="tiva_show_author_box" <?php checked(1, intval($author_box_checked)); ?>>
            <label for="show-author-box"><?php _e('غیرفعال سازی باکس نویسنده ', 'tiva'); ?></label>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-comments-box">
                <input id="show-comments-box" class="" type="checkbox"
                       name="tiva_show_comments_box" <?php checked(1, intval($comments_box_checked)); ?>>
                <label for="show-comments-box"><?php _e('غیرفعال سازی کامنت ها ', 'tiva'); ?></label>
            </div>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-sidebar-box">
                <input id="show-sidebar-box" class="" type="checkbox"
                       name="tiva_show_sidebar_box" <?php checked(1, intval($sidebar_box_checked)); ?>>
                <label for="show-sidebar-box"><?php _e('غیرفعال سازی سایدبار ', 'tiva'); ?></label>
            </div>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-sidebar-box">
                <input id="show-post_thumbnail" class="" type="checkbox"
                       name="tiva_show_post_thumbnail" <?php checked(1, intval($post_thumbnail_checked)); ?>>
                <label for="show-post_thumbnail"><?php _e('غیرفعال سازی تصویر شاخص ', 'tiva'); ?></label>
            </div>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-sidebar-box">
                <input id="tiva_private_post" class="" type="checkbox"
                       name="tiva_private_download" <?php checked(1, intval($tiva_private_download)); ?>>
                <label for="tiva_private_post"><?php _e('دانلود مخصوص اعضا', 'tiva'); ?></label>
            </div>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-sidebar-box">
                <input id="tiva_show_related_product" class="" type="checkbox"
                       name="tiva_show_related_product" <?php checked(1, intval($tiva_show_related_product)); ?>>
                <label for="tiva_show_related_product"><?php _e('فعال سازی محصولات مرتبط', 'tiva'); ?></label>
            </div>
        </div>
        <div class="meta-box-wrapper">
            <div class="show-sidebar-box">
                <input id="tiva_vip_post" class="" type="checkbox"
                       name="tiva_vip_post" <?php checked(1, intval($tiva_vip_post)); ?>>
                <label for="tiva_vip_post"><?php _e('مقاله مخصوص کاربران ویژه', 'tiva'); ?></label>
            </div>
        </div>
    </div>
    <?php
}

function tiva_download_box_meta_box_callback($post)
{
    global $post;
    $tiva_linke_mostaghim = get_post_meta($post->ID, 'tiva_linke_mostaghim', true);
    $tiva_linke_komaki = get_post_meta($post->ID, 'tiva_linke_komaki', true);
    $tiva_linke_preview = get_post_meta($post->ID, 'tiva_linke_preview', true);
    $tiva_download_format = get_post_meta($post->ID, 'tiva_download_format', true);
    $tiva_download_source = get_post_meta($post->ID, 'tiva_download_source', true);
    $tiva_download_source_link = get_post_meta($post->ID, 'tiva_download_source_link', true);
    $tiva_download_source_size = get_post_meta($post->ID, 'tiva_download_source_size', true);

    ?>
    <div class="tiva-download-box">
        <div class="download-box-input-wrapper">
            <label for="download-box-input-label"
                   class="download-box-input-label"><?php _e('لینک دانلود مستقیم :', 'tiva'); ?></label>
            <input type="url" id="download-box-input-label" value="<?php echo $tiva_linke_mostaghim; ?>"
                   class="download-box-input text-box link-mostaghim" name="tiva_linke_mostaghim">
            <a class="button button-primary button-large upload-link-mostaghim"><?php _e('بارگزاری', 'tiva'); ?></a>
        </div>
        <br>
        <div class="download-box-input-wrapper">
            <label for="download-box-input-label"
                   class="download-box-input-label"><?php _e('لینک دانلود کمکی :', 'tiva'); ?></label>
            <input type="url" id="download-box-input-label" value="<?php echo $tiva_linke_komaki; ?>"
                   class="download-box-input text-box link-komaki" name="tiva_linke_komaki">
            <a class="button button-primary button-large upload-link-komaki"><?php _e('بارگزاری', 'tiva'); ?></a>

        </div>
        <br>
        <div class="download-box-input-wrapper">
            <label for="download-box-input-label"
                   class="download-box-input-label"><?php _e('لینک پیشنمایش:', 'tiva'); ?></label>
            <input type="url" id="download-box-input-label" value="<?php echo $tiva_linke_preview; ?>"
                   class="download-box-input text-box link-preview" name="tiva_linke_preview">

        </div>
        <br>
        <div class="download-box-input-wrapper">
            <label for="download-box-input-label"
                   class="download-box-input-label"><?php _e('فرمت :', 'tiva'); ?></label>
            <input type="text" id="download-box-input-label" value="<?php echo $tiva_download_format; ?>"
                   class="download-box-input text-box download-format" name="tiva_download_format">

        </div>
        <br>
        <div class="download-box-input-wrapper">
            <label for="download-box-input-label"
                   class="download-box-input-label"><?php _e('لینک منبع :', 'tiva'); ?></label>
            <input type="text" id="download-box-input-label" value="<?php echo $tiva_download_source_link; ?>"
                   class="download-box-input text-box download-source-link" name="tiva_download_source_link">

        </div>
        <br>
        <div class="download-box-input-wrapper">
            <label for="download-box-input-label"
                   class="download-box-input-label"><?php _e('نام منبع :', 'tiva'); ?></label>
            <input type="text" id="download-box-input-label" value="<?php echo $tiva_download_source; ?>"
                   class="download-box-input text-box download-source" name="tiva_download_source">

        </div>
        <br>
        <div class="download-box-input-wrapper">
            <label for="download-box-input-label"
                   class="download-box-input-label"><?php _e('حجم :', 'tiva'); ?></label>
            <input type="text" id="download-box-input-label" value="<?php echo $tiva_download_source_size; ?>"
                   class="download-box-input text-box download-size" name="tiva_download_source_size">

        </div>
    </div>
    <?php
}


function tiva_page_disable_meta_box_callback($post)
{
    global $post;
    $disable_page_checked = get_post_meta($post->ID, 'tiva_disable_page_box', true);
    ?>
    <div class="meta-box-wrapper">
        <div class="show-tiva_disable_page_box-box">
            <input id="tiva_disable_page_box" class="" type="checkbox"
                   name="tiva_disable_page_box" <?php checked(1, intval($disable_page_checked)); ?>>
            <label for="tiva_disable_page_box"><?php _e('غیر فعال سازی سایدبار', 'tiva'); ?></label>
        </div>
    </div>
    <?php
}


function tiva_product_meta_box_callback($post)
{
    global $post;
    $stopped_product = get_post_meta($post->ID, 'stopped_product', true);
//    var_dump($sidebar_box_checked);

    ?>
    <div class="meta-box-wrapper">
        <div class="stopped-product-box">
            <input id="stopped-product-box" class="" type="checkbox"
                   name="stopped_product" <?php checked(1, intval($stopped_product)); ?>>
            <label for="stopped-product-box"><?php _e('عدم تولید محصول', 'tiva'); ?></label>
        </div>
    </div>
    <?php
} // add to tiva in v3

function tiva_product_custom_data_meta_box_callback($post)
{
    global $post;
    $product_garanti = get_post_meta($post->ID, 'product_garanti', true);
    $shoper_input = get_post_meta($post->ID, 'shoper_input', true);
    $bastebandi_input = get_post_meta($post->ID, 'bastebandi_input', true);
    $haml_input = get_post_meta($post->ID, 'haml_input', true);
    ?>

    <div class="product-custom-data-metabox">
        <br>
        <div class="box-input-wrapper" style="font-family: IRANSans!important; font-weight: 900;">
            <label for="garanti-input">مدرس دوره مد نظر</label>
            <br>
            <input type="text" style="width: 100%;" id="garanti-input" value="<?php echo $product_garanti ?>"
                   placeholder="متن مربوط به مدرس دوره مد نظر را وارد کنید" name="product_garanti">
        </div>
        <br>
        <div class="box-input-wrapper" style="font-family: IRANSans!important; font-weight: 900;">
            <label for="shoper-input">گارانتی محصول آموزشی</label>
            <br>
            <input type="text" style="width: 100%;" id="shoper-input" value="<?php echo $shoper_input; ?>"
                   placeholder="متن مربوط به گارانتی محصول آموزشی را وارد کنید" name="shoper_input">
        </div>
        <br>
        <div class="box-input-wrapper" style="font-family: IRANSans!important; font-weight: 900;">
            <label for="bastebandi-input">زمان آموزشی و حجم فایل</label>
            <br>
            <input type="text" style="width: 100%;" id="bastebandi-input" value="<?php echo $bastebandi_input; ?>"
                   placeholder="متن مربوط به زمان آموزشی و حجم فایل را وارد کنید" name="bastebandi_input">
        </div>
        <br>
        <div class="box-input-wrapper" style="font-family: IRANSans!important; font-weight: 900;">
            <label for="haml-input">این محصول مناسب چه کسانی است؟</label>
            <br>
            <input type="text" style="width: 100%;" id="haml-input" value="<?php echo $haml_input; ?>"
                   placeholder="مثال : این محصول برای مدیران وب سایت ها مناسب است" name="haml_input">
        </div>
    </div>
    <?php
}  // add to tiva in v3

///////////////////////////////////////////////////////////////////////


function tiva_post_meta_box_save($post_id)
{
    if (defined('DOING_AJAX')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['tiva_show_author_box'])) {

        update_post_meta($post_id, 'tiva_show_author_box', 1);

    } else {

        //update_post_meta($post_id,'sl_show_sidebar',0);
        delete_post_meta($post_id, 'tiva_show_author_box');
    }

    if (isset($_POST['tiva_show_comments_box'])) {

        update_post_meta($post_id, 'tiva_show_comments_box', 1);

    } else {

        //update_post_meta($post_id,'sl_show_sidebar',0);
        delete_post_meta($post_id, 'tiva_show_comments_box');
    }

    if (isset($_POST['tiva_show_sidebar_box'])) {

        update_post_meta($post_id, 'tiva_show_sidebar_box', '1');

    } else {
        delete_post_meta($post_id, 'tiva_show_sidebar_box');
    }

    if (isset($_POST['tiva_show_post_thumbnail'])) {

        update_post_meta($post_id, 'tiva_show_post_thumbnail', 1);

    } else {

        //update_post_meta($post_id,'sl_show_sidebar',0);
        delete_post_meta($post_id, 'tiva_show_post_thumbnail');
    }

    if (isset($_POST['tiva_private_post'])) {

        update_post_meta($post_id, 'tiva_private_post', 1);

    } else {

        //update_post_meta($post_id,'sl_show_sidebar',0);
        delete_post_meta($post_id, 'tiva_private_post');
    }

    if (isset($_POST['tiva_vip_post'])) {

        update_post_meta($post_id, 'tiva_vip_post', 1);

    } else {

        delete_post_meta($post_id, 'tiva_vip_post');
    }
}

function tiva_download_meta_box_save($post_id)
{

    if (defined('DOING_AJAX')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['tiva_show_author_box'])) {

        update_post_meta($post_id, 'tiva_show_author_box', 1);

    } else {

        //update_post_meta($post_id,'sl_show_sidebar',0);
        delete_post_meta($post_id, 'tiva_show_author_box');
    }

    if (isset($_POST['tiva_show_comments_box'])) {

        update_post_meta($post_id, 'tiva_show_comments_box', 1);

    } else {

        //update_post_meta($post_id,'sl_show_sidebar',0);
        delete_post_meta($post_id, 'tiva_show_comments_box');
    }

    if (isset($_POST['tiva_show_sidebar_box'])) {

        update_post_meta($post_id, 'tiva_show_sidebar_box', 1);

    } else {
        delete_post_meta($post_id, 'tiva_show_sidebar_box');
    }

    if (isset($_POST['tiva_show_post_thumbnail'])) {

        update_post_meta($post_id, 'tiva_show_post_thumbnail', 1);

    } else {

        //update_post_meta($post_id,'sl_show_sidebar',0);
        delete_post_meta($post_id, 'tiva_show_post_thumbnail');
    }

    if (isset($_POST['tiva_private_download'])) {

        update_post_meta($post_id, 'tiva_private_download', 1);

    } else {

        //update_post_meta($post_id,'sl_show_sidebar',0);
        delete_post_meta($post_id, 'tiva_private_download');
    }
    if (isset($_POST['tiva_vip_post'])) {

        update_post_meta($post_id, 'tiva_vip_post', 1);

    } else {

        delete_post_meta($post_id, 'tiva_vip_post');
    }


}

function tiva_download_box_meta_box_save($post_id)
{

    if (defined('DOING_AJAX')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['tiva_linke_mostaghim'])) {

        update_post_meta($post_id, 'tiva_linke_mostaghim', $_POST['tiva_linke_mostaghim']);

    } else {

        delete_post_meta($post_id, 'tiva_linke_mostaghim');
    }
    if (isset($_POST['tiva_linke_komaki'])) {

        update_post_meta($post_id, 'tiva_linke_komaki', $_POST['tiva_linke_komaki']);

    } else {
        delete_post_meta($post_id, 'tiva_linke_komaki');
    }
    if (isset($_POST['tiva_linke_preview'])) {

        update_post_meta($post_id, 'tiva_linke_preview', $_POST['tiva_linke_preview']);

    } else {
        delete_post_meta($post_id, 'tiva_linke_preview');
    }
    if (isset($_POST['tiva_download_format'])) {

        update_post_meta($post_id, 'tiva_download_format', $_POST['tiva_download_format']);

    } else {
        delete_post_meta($post_id, 'tiva_download_format');
    }
    if (isset($_POST['tiva_download_source'])) {

        update_post_meta($post_id, 'tiva_download_source', $_POST['tiva_download_source']);

    } else {
        delete_post_meta($post_id, 'tiva_download_source');
    }
    if (isset($_POST['tiva_download_source_link'])) {

        update_post_meta($post_id, 'tiva_download_source_link', $_POST['tiva_download_source_link']);

    } else {
        delete_post_meta($post_id, 'tiva_download_source_link');
    }
    if (isset($_POST['tiva_download_source_size'])) {

        update_post_meta($post_id, 'tiva_download_source_size', $_POST['tiva_download_source_size']);

    } else {
        delete_post_meta($post_id, 'tiva_download_source_size');
    }
}

function tiva_page_disable_meta_box_save($post_id)
{
    if (defined('DOING_AJAX')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['tiva_disable_page_box'])) {

        update_post_meta($post_id, 'tiva_disable_page_box', 1);

    } else {
        delete_post_meta($post_id, 'tiva_disable_page_box');
    }
}


function tiva_product_meta_box_save($post_id)
{

    if (defined('DOING_AJAX')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }


    if (isset($_POST['stopped_product'])) {

        update_post_meta($post_id, 'stopped_product', 1);

    } else {

        delete_post_meta($post_id, 'stopped_product');
    }

} // add to tiva in v3

function tiva_product_custom_data_meta_box_save($post_id)
{
    if (defined('DOING_AJAX')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['product_garanti'])) {

        update_post_meta($post_id, 'product_garanti', $_POST['product_garanti']);

    } else {

        delete_post_meta($post_id, 'product_garanti');
    }

    if (isset($_POST['shoper_input'])) {

        update_post_meta($post_id, 'shoper_input', $_POST['shoper_input']);

    } else {
        delete_post_meta($post_id, 'shoper_input');
    }

    if (isset($_POST['bastebandi_input'])) {

        update_post_meta($post_id, 'bastebandi_input', $_POST['bastebandi_input']);

    } else {
        delete_post_meta($post_id, 'bastebandi_input');
    }


    if (isset($_POST['haml_input'])) {

        update_post_meta($post_id, 'haml_input', $_POST['haml_input']);

    } else {
        delete_post_meta($post_id, 'haml_input');
    }

}  // add to tiva in v3

function tiva_video_post_meta_box_save($post_id)
{

    if (defined('DOING_AJAX')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['video-poster'])) {

        update_post_meta($post_id, 'tiva_video_poster', $_POST['video-poster']);

    } else {

        delete_post_meta($post_id, 'tiva_video_poster');
    }

    if (isset($_POST['up-video'])) {

        update_post_meta($post_id, 'tiva_up_video', $_POST['up-video']);

    } else {
        delete_post_meta($post_id, 'tiva_up_video');
    }

    if (isset($_POST['aparat-video-script'])) {

        update_post_meta($post_id, 'aparat_video_script', $_POST['aparat-video-script']);

    } else {
        delete_post_meta($post_id, 'aparat_video_script');
    }

    if (isset($_POST['tiva-video-select'])) {

        update_post_meta($post_id, 'tiva-video-select', $_POST['tiva-video-select']);

    } else {
        delete_post_meta($post_id, 'tiva-video-select');
    }

    if (isset($_POST['video-time'])) {

        update_post_meta($post_id, 'tiva-video-time', $_POST['video-time']);

    } else {
        delete_post_meta($post_id, 'tiva-video-time');
    }

    if (isset($_POST['tiva_vip_post'])) {

        update_post_meta($post_id, 'tiva_vip_post', 1);

    } else {

        delete_post_meta($post_id, 'tiva_vip_post');
    }


}  //add to tiva in v4 for save video post save


add_action('save_post', 'tiva_post_meta_box_save');
add_action('save_post', 'tiva_download_meta_box_save');
add_action('save_post', 'tiva_download_box_meta_box_save');
add_action('save_post', 'tiva_page_disable_meta_box_save');
add_action('save_post', 'tiva_product_meta_box_save');  // add to tiva in v3
add_action('save_post', 'tiva_product_custom_data_meta_box_save');  // add to tiva in v3
add_action('save_post', 'tiva_video_post_meta_box_save');  // add to tiva in v4 for save video post save

add_action('add_meta_boxes', 'tiva_post_meta_box');
add_action('admin_print_styles', 'tiva_admin_styles');


