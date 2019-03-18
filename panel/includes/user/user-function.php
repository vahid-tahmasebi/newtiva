<?php
global $current_user;
$current_user = wp_get_current_user();


// BEGIN GLOBAL USER PANEL FUNCTION
function tiva_check_nonce($action = NULL, $nonce)
{
    if (!isset($_REQUEST[$nonce]) || !wp_verify_nonce($_REQUEST[$nonce], $action)) {
        tiva_show_notification('درخواست شما نامعتبر است', 'error');
        wp_die();;
    }
}

function tiva_get_user_avatar($user_id)
{
    global $user_avatar_privacy;
    $user_avatar = get_user_meta($user_id, 'tiva_user_avatar', true);

    $user_avatar_privacy = get_user_meta($user_id, 'tiva_user_avatar_privacy', true);
    if (!intval($user_id)) {
//        return 0;
        return get_template_directory_uri() . '/images/defult-avatar.png';
    }
    if (empty($user_avatar) || is_null($user_avatar) || $user_avatar_privacy == 'false') {
        return get_template_directory_uri() . '/images/defult-avatar.png';
    } else {
        return $user_avatar;
    }
}

// END GLOBAL USER PANEL FUNCTION

// BEGIN USER PROFILE SAVE EDIT ACCOUNT
function tiva_get_user_social_network_icon($social_network)
{
    global $current_user;
    $current_user = wp_get_current_user();
    $web = $current_user->user_url;
    $telegram = get_user_meta($current_user->ID, 'tiva_user_telegram', true);
    $instagram = get_user_meta($current_user->ID, 'tiva_user_instagram', true);
    $linkedin = get_user_meta($current_user->ID, 'tiva_user_linkedin', true);
    $telegram_p = get_user_meta($current_user->ID, 'tiva_user_telegram_icon_privacy', true);
    $instagram_p = get_user_meta($current_user->ID, 'user_instagram_icon_privacy', true);
    $linkedin_p = get_user_meta($current_user->ID, 'user_linkedin_icon_privacy', true);
    $web_p = get_user_meta($current_user->ID, 'user_web_icon_privacy', true);
    if (isset($web) && !$web == '' && $social_network === 'web' && $web_p == 'true') {
        return
            '
            <i class="fa fa-globe"></i>
            <a href="' . $web . '">' . $web . '</a>
        ';
    } elseif (isset($telegram) && !$telegram == '' && $social_network === 'telegram' && $telegram_p == 'true') {
        return
            '
            <i class="fa fa-telegram"></i>
            <a href="https://t.me/' . $telegram . '">@' . $telegram . '</a>
        ';
    } elseif (isset($instagram) && !$instagram == '' && $social_network === 'instagram' && $instagram_p == 'true') {
        return
            '
            <i class="fa fa-instagram"></i>
            <a href="https://www.instagram.com/' . $instagram . '">@' . $instagram . '</a>
        ';
    } elseif (isset($linkedin) && !$linkedin == '' && $social_network === 'linkedin' && $linkedin_p == 'true') {
        return
            '
            <i class="fa fa-linkedin"></i>
            <a href="https://www.linkedin.com/in/' . $linkedin . '">@' . $linkedin . '</a>
        ';
    }
    return '';
}

function tiva_get_user_social_network_icon_frontEnd($social_network, $author_id)
{
    global $current_user;
    $author = $author_id;
    $web = $current_user->user_url;
    $telegram = get_user_meta($author, 'tiva_user_telegram', true);
    $instagram = get_user_meta($author, 'tiva_user_instagram', true);
    $linkedin = get_user_meta($author, 'tiva_user_linkedin', true);
    $telegram_p = get_user_meta($author, 'tiva_user_telegram_icon_privacy', true);
    $instagram_p = get_user_meta($author, 'user_instagram_icon_privacy', true);
    $linkedin_p = get_user_meta($author, 'user_linkedin_icon_privacy', true);
    $web_p = get_user_meta($author, 'user_web_icon_privacy', true);
    if (isset($web) && !$web == '' && $social_network === 'web' && $web_p == 'true') {
        return
            '
            <a href="' . $web . '">
              <i class="fa fa-globe"></i>           
            </a>
        ';
    } elseif (isset($telegram) && !$telegram == '' && $social_network === 'telegram' && $telegram_p == 'true') {
        return
            '
            <a href="https://t.me/' . $telegram . '">
             <i class="fa fa-telegram"></i> 
</a>
        ';
    } elseif (isset($instagram) && !$instagram == '' && $social_network === 'instagram' && $instagram_p == 'true') {
        return
            '
          
            <a href="https://www.instagram.com/' . $instagram . '">
              <i class="fa fa-instagram"></i>
</a>
        ';
    } elseif (isset($linkedin) && !$linkedin == '' && $social_network === 'linkedin' && $linkedin_p == 'true') {
        return
            '
        
            <a href="https://www.linkedin.com/in/' . $linkedin . '">
                <i class="fa fa-linkedin"></i>
</a>
        ';
    }
    return '';
}

function tiva_get_user_comment_count($user_id, $comment_status = '1')
{
    global $wpdb, $table_prefix;
    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(comment_ID) FROM {$table_prefix}comments WHERE comment_approved=%s AND user_id =%s", $comment_status, $user_id));
    return $count;
}

function tiva_get_user_favorite_post_count($user_id)
{
    global $wpdb, $table_prefix;
    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(id) FROM {$table_prefix}tiva_favorite_post WHERE user_id =%s ", $user_id));
    return $count;
}

function tiva_get_user_hold_post_count($user_id)
{
    global $wpdb, $table_prefix;
    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(ID) FROM {$table_prefix}posts WHERE   post_author =%d AND post_status='pending' ", $user_id));
    return $count;
}

function tiva_show_notification($msg, $status)
{
    echo '
    <script type="text/javascript">
    $(document).ready(function() {
       show_alert("' . $msg . '","' . $status . '")
        });
    </script>';
}

function tiva_user_save_profile_function()
{

    $current_user = wp_get_current_user();
    $has_error = null;
    $user_data = array(
        'ID' => $current_user->ID,
        'first_name' => apply_filters('pre_user_first_name', sanitize_text_field($_POST['first_name'])),
        'last_name' => apply_filters('pre_user_last_name', sanitize_text_field($_POST['last_name'])),
        'mobile' => sanitize_text_field($_POST['mobile']),
        'user-telegram' => sanitize_text_field($_POST['tiva_user_telegram']),
        'user-instagram' => sanitize_text_field($_POST['tiva_user_instagram']),
        'user-linkedin' => sanitize_text_field($_POST['tiva_user_linkedin']),
        'expertise' => sanitize_text_field($_POST['expertise']),
        'display_name' => apply_filters('pre_user_display_name', sanitize_text_field($_POST['display_name'])),
        'description' => apply_filters('pre_user_description', sanitize_text_field($_POST['description'])),
        'user_url' => apply_filters('pre_user_url', sanitize_text_field($_POST['user_url'])),
        'user_email' => apply_filters('pre_user_email', sanitize_text_field($_POST['user_email'])),
    );
//    dd($user_data);
    if (empty($user_data['user_email'])) {
        tiva_show_notification('لطفا فیلد های اجباری را پر کنید', 'error');
        return;
    } elseif (!is_email($user_data['user_email'])) {
        tiva_show_notification('لطفا آدرس ایمیل معتبری را وارد کنید', 'error');
        return;
    }

    if (!isset($has_error)) {
        tiva_show_notification('مشخصات کاربری شما با موفقیت بروزرسانی شد', 'success');
        $updated_user_id = wp_update_user($user_data);
        if (is_wp_error($updated_user_id)) {
            tiva_show_notification('به روز رسانی اطلاعات با مشکل مواجه شد.لطفا بعدا امتحان کنید', 'error');
        } else {
            update_user_meta($updated_user_id, 'tiva_user_mobile', $user_data['mobile']);
            update_user_meta($updated_user_id, 'tiva_user_expertise', $user_data['expertise']);
            update_user_meta($updated_user_id, 'tiva_user_telegram', $user_data['user-telegram']);
            update_user_meta($updated_user_id, 'tiva_user_instagram', $user_data['user-instagram']);
            update_user_meta($updated_user_id, 'tiva_user_linkedin', $user_data['user-linkedin']);
        }
    }
//    dd($user_data);
}

function tiva_user_change_pass_function()
{
    $current_user = wp_get_current_user();
    $has_error = null;
    $new_password = $_POST['new_password'];
    $retype_new_password = $_POST['retype_new_password'];

    $user_data = array(
        'ID' => $current_user->ID,
        'user_pass' => apply_filters('pre_user_first_pass', sanitize_text_field($_POST['new_password'])),
    );

    if (empty($new_password) || empty($retype_new_password)) {
        tiva_show_notification('لطفا فیلد های اجاری را پر کنید', 'error');
        return;
    } elseif (!($new_password === $retype_new_password)) {
        tiva_show_notification('رمزهای عبور وارد شده باهم تطابق ندارد لطفا دقت کنید', 'error');
        return;
    } elseif (strlen($new_password) <= 8) {
        tiva_show_notification('حداقل رمز عبور انتخابی باید بیشتر از ۸ حرف باشد!', 'error');
        return;
    }
    if (!isset($has_error)) {
        tiva_show_notification('رمز عبور شما با موفقیت بروزرسانی شد', 'success');
        $updated_user_id = wp_update_user($user_data);
        if (is_wp_error($updated_user_id)) {
            tiva_show_notification('به روز رسانی اطلاعات با مشکل مواجه شد.لطفا بعدا امتحان کنید', 'error');
        }
    }
}

function tiva_get_css_class_for_pag_tab_edit_account($default, $arg)
{
//    $css_class = 'active';
    if ($default != false && !isset($_POST['save-profile']) && !isset($_POST['change-pass']) && !isset($_POST['change_avatar'])) {
        return 'active';
    } elseif ($default == false) {
        if (isset($_POST['save-profile']) && $arg == 'tab1') {
            return 'active';
        } elseif (isset($_POST['change-pass']) && $arg == 'tab2') {
            return 'active';
        } elseif (isset($_POST['change_avatar']) && $arg == 'tab3') {
            return 'active';
        }
    }
    return '';
}

function tiva_user_save_profile_avatar_function()
{
    tiva_check_nonce('tiva_save_user_avatar_profile', 'tiva_save_user_avatar_profile_nonce');
    $current_user = wp_get_current_user();
    if (isset($_FILES['user_avatar_input']) && !empty($_FILES['user_avatar_input']['name'])) {
        $file = $_FILES['user_avatar_input'];
//        $resize_image = tiva_resize_user_avatar($file, 500, 500);
        $avatar_upload_result = tiva_upload_user_avatar($current_user->ID, $current_user->user_email, $file);
        if (!empty($avatar_upload_result)) {
            update_user_meta($current_user->ID, 'tiva_user_avatar', $avatar_upload_result);
            tiva_show_notification('تصویر پروفایل شما با موفقیت بروز شد.', 'success');;
        }
    } else {
        tiva_show_notification('لطفا عکس پروفایل خود را انتخاب کنید.', 'error');
    }
}

function tiva_upload_user_avatar($user_id, $user_email, $file)
{
    $allowed_files = tiva_get_avatar_white_list_extension();
    if (!in_array($file['type'], $allowed_files)) {
        tiva_show_notification('فایل ارسال شده معتبر نمی باشد.', 'error');
        return FALSE;
    }
    $upload_path = tiva_get_user_avatars_upload_path();
    if (!file_exists($upload_path)) {
        @mkdir($upload_path);
    }
    tiva_delete_user_avatar_file($user_id);
    $upload_url = tiva_get_user_avatars_upload_url();
    $file_exploded = explode('.', $file['name']);
    $extension = end($file_exploded);
    $new_avatar_name = md5($user_email . $file['name']) . '.' . $extension;
    $upload_result = move_uploaded_file($file['tmp_name'], $upload_path . $new_avatar_name);
    if (!$upload_result) {
        return FALSE;
    }
    return $upload_url . $new_avatar_name;
}

function tiva_get_user_avatars_upload_path()
{
    $upload_data = wp_upload_dir();

    return $upload_data['basedir'] . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR;
}

function tiva_get_user_avatars_upload_url()
{
    $upload_data = wp_upload_dir();

    return $upload_data['baseurl'] . '/' . 'avatars' . '/';
}

function tiva_delete_user_avatar_file($user_id)
{
    $user_avatar = tiva_get_user_avatar($user_id);
    if (empty($user_avatar)) {
        return FALSE;
    }
    $user_avatar_parts = explode('/', $user_avatar);
    $user_avatar_file_name = end($user_avatar_parts);
    $file_path = tiva_get_user_avatars_upload_path() . $user_avatar_file_name;
    @unlink($file_path);
}

function tiva_get_avatar_white_list_extension()
{
    return array(
        'image/gif',
        'image/jpeg',
        'image/png'
    );
}

function tiva_resize_user_avatar($file, $w, $h, $crop = FALSE)
{
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width - ($width * abs($r - $w / $h)));
        } else {
            $height = ceil($height - ($height * abs($r - $w / $h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w / $h > $r) {
            $newwidth = $h * $r;
            $newheight = $h;
        } else {
            $newheight = $w / $r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

// END USER PROFILE SAVE EDIT ACCOUNT

function tiva_user_save_account_save_privacy_function()
{
    $current_user = wp_get_current_user();

    $user_privacy_setting = array(
        'tiva_user_avatar_privacy' => $_POST['user_avatar_privacy'],
        'tiva_user_telegram_icon_privacy' => $_POST['user_telegram_icon_privacy'],
        'user_instagram_icon_privacy' => $_POST['user_instagram_icon_privacy'],
        'user_linkedin_icon_privacy' => $_POST['user_linkedin_icon_privacy'],
        'user_web_icon_privacy' => $_POST['user_web_icon_privacy']
    );
    update_user_meta($current_user->ID, 'tiva_user_avatar_privacy', $user_privacy_setting['tiva_user_avatar_privacy']);
    update_user_meta($current_user->ID, 'tiva_user_telegram_icon_privacy', $user_privacy_setting['tiva_user_telegram_icon_privacy']);
    update_user_meta($current_user->ID, 'user_instagram_icon_privacy', $user_privacy_setting['user_instagram_icon_privacy']);
    update_user_meta($current_user->ID, 'user_linkedin_icon_privacy', $user_privacy_setting['user_linkedin_icon_privacy']);
    update_user_meta($current_user->ID, 'user_web_icon_privacy', $user_privacy_setting['user_web_icon_privacy']);
    tiva_show_notification('تنظیمات حریم شخصی با موفقیت بروزرسانی شد', 'success');

}

function tiva_get_current_page()
{
    return isset($_GET['page']) && ctype_digit($_GET['page']) ? intval($_GET['page']) : 1;
}

function tiva_clean_page_arg()
{
    $result = remove_query_arg('page');

    return add_query_arg(array('page' => '%#%'), $result);
}

function tiva_user_delete_comment_function()
{
    $user_id = wp_get_current_user()->ID;
    $comment_id = base64_decode(urldecode($_GET['delete_comment']));
    global $wpdb, $table_prefix;
    if (!is_numeric($comment_id)) {
        tiva_show_notification('کاربر گرامی درخواست شما نامعتبر می باشد.', 'error');
    } else {
        $wpdb->query(" UPDATE {$table_prefix}comments SET  comment_approved='user-trash' WHERE comment_ID={$comment_id} AND user_id={$user_id}");
        tiva_show_notification('دیدگاه شما با موفقیت حذف شد.', 'success');
    }


}

function tiva_user_delete_end_comment_function()
{
    $comment_id = base64_decode(urldecode($_GET['delete_comment']));
    global $wpdb, $table_prefix;
    if (!is_numeric($comment_id)) {
        tiva_show_notification('کاربر گرامی درخواست شما نامعتبر می باشد.', 'error');
        return;
    } else {
        $wpdb->query(" DELETE FROM {$table_prefix}comments WHERE comment_ID={$comment_id}");
        tiva_show_notification('دیدگاه شما با موفقیت به کلی از وب سایت حذف شد.', 'success');
    }

}

function tiva_user_get_hold_comments($user_id)
{
    global $wpdb, $table_prefix;
    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(comment_ID) FROM {$table_prefix}comments WHERE user_id =%s AND comment_approved='0'", $user_id));
    return $count;
}

function tiva_user_get_approved_comments($user_id)
{
    global $wpdb, $table_prefix;
    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(comment_ID) FROM {$table_prefix}comments WHERE user_id =%s AND comment_approved='1'", $user_id));
    return $count;
}

function tiva_user_get_trash_comments($user_id)
{
    global $wpdb, $table_prefix;
    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(comment_ID) FROM {$table_prefix}comments WHERE user_id =%s AND comment_approved='trash'", $user_id));
    return $count;
}

function tiva_user_recycle_comment_function()
{
    $comment_id = base64_decode(urldecode($_GET['recycle-comment']));
    $user_id = wp_get_current_user()->ID;
    global $wpdb, $table_prefix;
    if (!is_numeric($comment_id)) {
        tiva_show_notification('کاربر گرامی درخواست شما نامعتبر می باشد.', 'error');
    } else {
        $wpdb->query(" UPDATE {$table_prefix}comments SET  comment_approved='1' WHERE comment_ID={$comment_id} AND user_id={$user_id}");
        tiva_show_notification('دیدگاه شما یا موفقیت بازگردانی شد.', 'success');
    }

}

function tiva_user_get_favorite_post_id($user_id)
{
//    $result = array();
    global $wpdb, $table_prefix;
    $result = $wpdb->get_results("SELECT post_id FROM {$table_prefix}tiva_favorite_post WHERE user_id={$user_id}", 'ARRAY_A');
    return $result;

}

function restrict_mime($mimes)
{

    if (is_user_logged_in()) {
        $mimes = array(
            // image type
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif' => 'image/gif',
            'png' => 'image/png',
            'bmp' => 'image/bmp',
            'tif|tiff' => 'image/tiff',
            'ico' => 'image/x-icon',

            // Video formats
            'asf|asx' => 'video/x-ms-asf',
            'wmv' => 'video/x-ms-wmv',
            'wmx' => 'video/x-ms-wmx',
            'wm' => 'video/x-ms-wm',
            'avi' => 'video/avi',
            'divx' => 'video/divx',
            'flv' => 'video/x-flv',
            'mov|qt' => 'video/quicktime',
            'mpeg|mpg|mpe' => 'video/mpeg',
            'mp4|m4v' => 'video/mp4',
            'ogv' => 'video/ogg',
            'webm' => 'video/webm',
            'mkv' => 'video/x-matroska',

            // Audio formats
            'mp3|m4a|m4b' => 'audio/mpeg',
            'ra|ram' => 'audio/x-realaudio',
            'wav' => 'audio/wav',
            'ogg|oga' => 'audio/ogg',
            'mid|midi' => 'audio/midi',
            'wma' => 'audio/x-ms-wma',
            'wax' => 'audio/x-ms-wax',
            'mka' => 'audio/x-matroska',
        );
        return $mimes;
    }
}

if (current_user_can('author')) {
    add_filter('upload_mimes', 'restrict_mime');
}

function tiva_user_send_post_function()
{
    global $allowed_files;
    $allowed_files = tiva_get_avatar_white_list_extension();
//    dd($allowed_files);
//    dd($_FILES['post_thumbnail']);
    if (empty($_FILES['post_thumbnail']['name']) || empty($_POST['post_category'])) {
        tiva_show_notification('کاربر عزیز لطفا فیلد های اجباری را پر کنید', 'error');
        return false;
    } elseif (empty($_FILES['post_thumbnail']['name'])) {
        tiva_show_notification('لطفا برای مقاله خود تصویر شاخص مرتبط را انتخاب کنید', 'error');
        return false;
    } elseif (!in_array($_FILES['post_thumbnail']['type'], $allowed_files)) {
        tiva_show_notification('فایل ارسال شده برای تصویر شاخص معتبر نمی باشد.', 'error');
        return false;
    } elseif (empty($_POST['post_category'])) {
        tiva_show_notification('لطفا برای مقاله خود دسته بندی مرتبط را انتخاب کنید', 'error');
        return false;
    }
//dd($_POST);
    $current_user = wp_get_current_user();
    $post_data = array(
        'post_title' => wp_strip_all_tags($_POST['post_title']),
        'post_content' => $_POST['post_content'],
        'post_status' => 'pending',
        'post_author' => $current_user->ID,
        'post_category' => $_POST['post_category']
    );
//    dd($post_data);
    $new_post_id = wp_insert_post($post_data);
    set_post_format($new_post_id, $_POST['post_format']);
    if (!is_wp_error($new_post_id)) {
        if (isset($_FILES['post_thumbnail']) && !empty($_FILES['post_thumbnail']['name'])) {
            include ABSPATH . 'wp-admin/includes/image.php';
            include ABSPATH . 'wp-admin/includes/file.php';
            include ABSPATH . 'wp-admin/includes/media.php';
            $attachment_id = media_handle_upload('post_thumbnail', $new_post_id);
//            dd($attachment_id);
            update_post_meta($new_post_id, '_thumbnail_id', $attachment_id);
        }
    }
    tiva_show_notification('مقاله شما با موفقیت ارسال و در صف بررسی قرار گرفت.', 'success');
}

add_shortcode('frontend-category-checklist', 'frontend_category_checklist');
function frontend_category_checklist($atts)
{
// process passed arguments or assign WP defaults
    $atts = shortcode_atts(array(
        'post_id' => 0,
        'descendants_and_self' => 0,
        'selected_cats' => false,
        'popular_cats' => false,
        'checked_ontop' => true
    ), $atts, 'frontend-category-checklist');

// string to bool conversion, so the bool params work as expected
    $atts['selected_cats'] = to_bool($atts['selected_cats']);
    $atts['popular_cats'] = to_bool($atts['popular_cats']);
    $atts['checked_ontop'] = to_bool($atts['checked_ontop']);

// load template.php from admin, where wp_category_checklist() is defined
    require_once(ABSPATH . '/wp-admin/includes/template.php');

// generate the checklist
    ob_start(); ?>
    <div class="categorydiv">
        <ul class="category-tabs">
            <div id="taxonomy-category" class="categorydiv">
                <div id="category-all" class="tabs-panel">
                    <ul id="categorychecklist" data-wp-lists="list:category" class="categorychecklist form-no-clear">
                        <?php wp_category_checklist(
                            $atts['post_id'],
                            $atts['descendants_and_self'],
                            $atts['selected_cats'],
                            $atts['popular_cats'],
                            null,
                            $atts['checked_ontop']
                        ); ?>
                    </ul>
                </div>
            </div>
        </ul>
    </div>

    <?php
    return ob_get_clean();
}

function to_bool($bool)
{
    return (is_bool($bool) ? $bool :
        (is_numeric($bool) ? ((bool)intval($bool)) : $bool !== 'false'));
}

function tiva_count_posts_by_user($post_author = null, $post_type = array(), $post_status = array())
{
    global $wpdb;

    if (empty($post_author))
        return 0;

    $post_status = (array)$post_status;
    $post_type = (array)$post_type;

    $sql = $wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_author = %d AND ", $post_author);

    //Post status
    if (!empty($post_status)) {
        $argtype = array_fill(0, count($post_status), '%s');
        $where = "(post_status=" . implode(" OR post_status=", $argtype) . ') AND ';
        $sql .= $wpdb->prepare($where, $post_status);
    }

    //Post type
    if (!empty($post_type)) {
        $argtype = array_fill(0, count($post_type), '%s');
        $where = "(post_type=" . implode(" OR post_type=", $argtype) . ') AND ';
        $sql .= $wpdb->prepare($where, $post_type);
    }

    $sql .= '1=1';
    $count = $wpdb->get_var($sql);
    return $count;
}

// ***********************  BEGIN TIVA USER FUNCTION ADD IN V5 **********************
function tiva_get_user_wallet_balance($user_id)
{
    if (intval($user_id) === 0) {
        return false;
    } else {
        return (int)get_user_meta($user_id, TIVA_USER_WALLET, true);
    }
}

function tiva_user_wallet_charge_function()
{
    $amount = isset($_POST['wallet_amount']) && ctype_digit($_POST['wallet_amount']) ? intval($_POST['wallet_amount']) : 0;

    if ($amount < 100) {
        tiva_show_notification('مبلغ شارز کیف پول باید بیشتر از 100 تومان باشد', 'error');

        return false;
    }
    if ($amount == 0) {
        tiva_show_notification('مبلغ وارد شده توسط شما نامعتبر است', 'error');

        return false;

    } else {

        $user_info = get_userdata(get_current_user_id());

        $MerchantID = TIVA_ZARINPAL_MERCHANTID; //Required
        $Amount = $amount; //Amount will be based on Toman - Required
        $Description = 'شارژ کیف پول ' . $user_info->display_name . ' در ' . get_bloginfo('name') . ''; // Required
        $Email = $user_info->user_email; // Optional
        $Mobile = get_user_meta(get_current_user_id(), 'tiva_user_mobile', true); // Optional
        $CallbackURL = home_url() . '/verify-payment?type=walletcharge'; // Required

        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );

        tiva_user_wallet_pay_handel(array(
            'user_id' => get_current_user_id(),
            'pay_amount' => $Amount,
            'pay_authority' => 'zarinpal-' . $result->Authority,
            'pay_mobile' => $Mobile,
            'pay_email' => $Email,
            'type' => TIVA_PAY_FOR_WALLET_CHARGE,
            'description' => $Description
        ));


//Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            Header('Location: https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
        } else {
            echo 'ERR: ' . $result->Status;
        }

    }

}

/********************************* BEGIN EDITED IN TIVA V5.8  ****************************/
function tiva_user_wallet_update_handler($user_id, $amount, $type, $refid, $dis)
{
    switch ($type) {
        case TIVA_WALLET_UP:
            tiva_user_wallet_increase($user_id, $amount);
            break;
        case TIVA_ADMIN_WALLET_UP:
            tiva_user_wallet_increase($user_id, $amount);
            break;
        case TIVA_WALLET_DOWN:
            tiva_user_wallet_decrease($user_id, $amount);
            break;
        case TIVA_ADMIN_WALLET_DOWN:
            tiva_user_wallet_decrease($user_id, $amount);
            break;
        case TIVA_WALLET_GIFT_UP:
            tiva_user_wallet_increase($user_id, $amount);
            break;

    }
    $nweRecordId = tiva_user_wallet_logger(
        array(
            'user_id' => $user_id,
            'amount' => $amount,
            'type' => $type,
            'agent' => $user_id,
            'pay_refid' => $refid,
            'wallet_description' => $dis
        )
    );

    return $nweRecordId;
}

/********************************* END EDITED IN TIVA V5.8 ******************************/

function tiva_user_wallet_increase($user_id, $amount)
{
    $user_wallet_balance = tiva_get_user_wallet_balance($user_id);
    $new_user_wallet_balance = intval($user_wallet_balance) + intval($amount);
    update_user_meta($user_id, TIVA_USER_WALLET, $new_user_wallet_balance);
}

function tiva_user_wallet_decrease($user_id, $amount)
{
    $user_wallet_balance = tiva_get_user_wallet_balance($user_id);
    $new_user_wallet_balance = intval($user_wallet_balance) - intval($amount);
    if ($new_user_wallet_balance < 0) {
        $new_user_wallet_balance = 0;
    }
    update_user_meta($user_id, TIVA_USER_WALLET, $new_user_wallet_balance);
}

function tiva_user_wallet_logger($args)
{
    global $wpdb, $table_prefix;
    $table_name = $table_prefix . 'tiva_user_wallet_logs';
    $wpdb->insert($table_name, $args, array(
        '%d',
        '%d',
        '%d',
        '%d',
        '%s',
        '%s',
    ));

    return $wpdb->insert_id;
}

function tiva_user_wallet_pay_handel($args)
{
    global $wpdb, $table_prefix;
    $table_name = $table_prefix . 'tiva_pay_handel';
    $wpdb->insert($table_name, $args, array(
        '%d',
        '%d',
        '%s',
        '%s',
        '%s',
        '%d',
        '%s',
    ));
}

function tiva_get_supporter_social_network_icon($social_network, $user_id)
{
    $user_id = intval($user_id);
    $web = get_userdata($user_id)->user_url;
//    var_dump($web);
    $telegram = get_user_meta($user_id, 'tiva_user_telegram', true);
    $instagram = get_user_meta($user_id, 'tiva_user_instagram', true);
    $linkedin = get_user_meta($user_id, 'tiva_user_linkedin', true);
    $telegram_p = get_user_meta($user_id, 'tiva_user_telegram_icon_privacy', true);
    $instagram_p = get_user_meta($user_id, 'user_instagram_icon_privacy', true);
    $linkedin_p = get_user_meta($user_id, 'user_linkedin_icon_privacy', true);
    $web_p = get_user_meta($user_id, 'user_web_icon_privacy', true);
    if (isset($web) && !$web == '' && $social_network === 'web' && $web_p == 'true') {
        return
            '
            <i class="fa fa-globe"></i>
            <a href="' . $web . '">' . $web . '</a>
        ';
    } elseif (isset($telegram) && !$telegram == '' && $social_network === 'telegram' && $telegram_p == 'true') {
        return
            '
            <i class="fa fa-telegram"></i>
            <a href="https://t.me/' . $telegram . '">@' . $telegram . '</a>
        ';
    } elseif (isset($instagram) && !$instagram == '' && $social_network === 'instagram' && $instagram_p == 'true') {
        return
            '
            <i class="fa fa-instagram"></i>
            <a href="https://www.instagram.com/' . $instagram . '">@' . $instagram . '</a>
        ';
    } elseif (isset($linkedin) && !$linkedin == '' && $social_network === 'linkedin' && $linkedin_p == 'true') {
        return
            '
            <i class="fa fa-linkedin"></i>
            <a href="https://www.linkedin.com/in/' . $linkedin . '">@' . $linkedin . '</a>
        ';
    }

    return '';
}

function tiva_user_send_ticket()
{

    if (isset($_POST['send_ticket'])) {
//        dd(nl2br($_POST['ticket_content']));

        if (empty($_POST['ticket_subject'] || $_POST['ticket_content'])) {

            tiva_show_notification('عنوان و متن تیکت را وارد کنید.', 'error');

            return false;
        } else {
            global $wpdb, $table_prefix;
            $table_name = $table_prefix . 'tiva_tickets';
            $args = array(
                'ticket_user_id' => get_current_user_id(),
                'ticket_supporter_id' => intval($_POST['supporter_id']),
                'ticket_title' => sanitize_text_field($_POST['ticket_subject']),
                'ticket_content' => nl2br(sanitize_textarea_field($_POST['ticket_content'])),
                'ticket_create_at' => date('Y-m-d H:i:s'),
                'ticket_update_at' => date('Y-m-d H:i:s'),
                'ticket_attachment' => sanitize_text_field($_POST['ticket_url_att']),
                'ticket_status' => TIVA_TICKET_STATUS_OPEN,
            );
            $result = $wpdb->insert($table_name, $args, array(
                '%d',
                '%d',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%d',
            ));
            if (intval($result) == 1) {
                $to = get_userdata(intval($_POST['supporter_id']))->user_email;
                $subject = get_bloginfo('name') . ' | تیکت جدید برای شما ';

                $message = tiva_user_send_ticket_for_operator_email_temp($operatorDispalyName = get_userdata(intval($_POST['supporter_id']))->display_name, $userDispalyName = get_userdata(get_current_user_id())->display_name, $dateTime = jdate('d-m-Y H:i:s'));
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "From: =?utf-8?b?" . base64_encode(get_bloginfo('name')) . "?= <" . get_bloginfo('admin_email') . ">\r\n";
                $headers .= "Content-Type: text/html;charset=utf-8\r\n";
                $headers .= "Reply-To " . get_bloginfo('admin_email') . "\r\n";
                $headers .= "X-Mailer: PHP/" . phpversion();
                $mail = wp_mail($to, $subject, $message, $headers);
                if ($mail) {
                    tiva_show_notification('تیکت مورد نظر شما با موفقیت ثبت شد.', 'success');
                    header("refresh:4;url=" . site_url() . '/user-panel/tickets');
                }
            } else {
                tiva_show_notification('مشکلی به وجود آمده است لطفا بعدا تلاش کنید.', 'error');
            }
        }

    }
}

function tiva_relative_time($ts)
{
    if (!ctype_digit($ts)) {
        $ts = strtotime($ts);
    }
    $diff = time() - $ts;
    if ($diff == 0) {
        return 'اکنون';
    } elseif ($diff > 0) {
        $day_diff = floor($diff / 86400);
        if ($day_diff == 0) {
            if ($diff < 60) {
                return 'همین الان';
            }
            if ($diff < 120) {
                return '۱ دقیقه قبل';
            }
            if ($diff < 3600) {
                return floor($diff / 60) . ' دقیقه قبل ';
            }
            if ($diff < 7200) {
                return '۱ ساعت قبل';
            }
            if ($diff < 86400) {
                return floor($diff / 3600) . ' ساعت قبل ';
            }
        }
        if ($day_diff == 1) {
            return 'دیروز';
        }
        if ($day_diff < 7) {
            return $day_diff . ' روز قبل ';
        }
        if ($day_diff < 31) {
            return ceil($day_diff / 7) . ' هفته قبل ';
        }
        if ($day_diff < 60) {
            return 'ماه قبل';
        }

        return date('F Y', $ts);
    } else {
        $diff = abs($diff);
        $day_diff = floor($diff / 86400);
        if ($day_diff == 0) {
            if ($diff < 120) {
                return '1 دقیقه قبل';
            }
            if ($diff < 3600) {
                return floor($diff / 60) . ' دقیقه قبل ';
            }
            if ($diff < 7200) {
                return '1 ساعت قبل';
            }
            if ($diff < 86400) {
                return floor($diff / 3600) . ' ساعت قبل ';
            }
        }
        if ($day_diff == 1) {
            return 'فردا';
        }
        if ($day_diff < 4) {
            return date('l', $ts);
        }
        if ($day_diff < 7 + (7 - date('w'))) {
            return 'هفته بعد';
        }
        if (ceil($day_diff / 7) < 4) {
            return ceil($day_diff / 7) . ' هفته بعد ';
        }
        if (date('n', $ts) == date('n') + 1) {
            return 'ماه بعد';
        }

        return date('F Y', $ts);
    }
}

// begin user billing address save and edit
function tiva_user_save_billing_address_function()
{
//    dd($_POST);

    $current_user_id = get_current_user_id();

    $billing_first_name = sanitize_text_field($_POST['billing_first_name']);
    $billing_last_name = sanitize_text_field($_POST['billing_last_name']);
    $billing_company = sanitize_text_field($_POST['billing_company']); // not primary
    $billing_phone = sanitize_text_field($_POST['billing_phone']);
    $billing_email = sanitize_text_field($_POST['billing_email']);
    $billing_country = sanitize_text_field($_POST['billing_country']);
    $billing_state = sanitize_text_field($_POST['billing_state']);
    $billing_city = sanitize_text_field($_POST['billing_city']);
    $billing_address_1 = sanitize_text_field($_POST['billing_address_1']);
    $billing_address_2 = sanitize_text_field($_POST['billing_address_2']);
    $billing_postcode = sanitize_text_field($_POST['billing_postcode']);

    if (empty($billing_first_name) || empty($billing_last_name) || empty($billing_phone) || empty($billing_email) || empty($billing_country) ||
        empty($billing_state) || empty($billing_city) || empty($billing_address_1) || empty($billing_address_2) || empty($billing_postcode)) {
        tiva_show_notification('لطفا فیلد های اجباری را پر کنید', 'error');
        return;
    } elseif (!is_email($billing_email)) {
        tiva_show_notification('لطفا آدرس ایمیل معتبری را وارد کنید', 'error');
        return;
    } elseif (!is_numeric($billing_phone)) {
        tiva_show_notification('شماره تلفن وارد شده متعبر نیست', 'error');

    } elseif (!is_numeric($billing_postcode)) {
        tiva_show_notification('کد پستی وارد شده متعبر نیست', 'error');
    }

    update_user_meta($current_user_id, 'billing_first_name', $billing_first_name);
    update_user_meta($current_user_id, 'billing_last_name', $billing_last_name);
    update_user_meta($current_user_id, 'billing_company', $billing_company);
    update_user_meta($current_user_id, 'billing_phone', $billing_phone);
    update_user_meta($current_user_id, 'billing_email', $billing_email);
    update_user_meta($current_user_id, 'billing_country', $billing_country);
    update_user_meta($current_user_id, 'billing_state', $billing_state);
    update_user_meta($current_user_id, 'billing_city', $billing_city);
    update_user_meta($current_user_id, 'billing_address_1', $billing_address_1);
    update_user_meta($current_user_id, 'billing_address_2', $billing_address_2);
    update_user_meta($current_user_id, 'billing_postcode', $billing_postcode);
    tiva_show_notification('آدرس صورت حساب شما با موفقیت بروزرسانی شد', 'success');
}

// end user billing address save and edit

// begin user shipping address save and edit
function tiva_user_save_shipping_address_function()
{
//    dd($_POST);
    $current_user_id = get_current_user_id();
    $shipping_first_name = sanitize_text_field($_POST['shipping_first_name']);
    $shipping_last_name = sanitize_text_field($_POST['shipping_last_name']);
    $shipping_company = sanitize_text_field($_POST['shipping_company']); // not primary
    $shipping_country = sanitize_text_field($_POST['shipping_country']);
    $shipping_state = sanitize_text_field($_POST['shipping_state']);
    $shipping_city = sanitize_text_field($_POST['shipping_city']);
    $shipping_address_1 = sanitize_text_field($_POST['shipping_address_1']);
    $shipping_address_2 = sanitize_text_field($_POST['shipping_address_2']);
    $shipping_postcode = sanitize_text_field($_POST['shipping_postcode']);

    if (empty($shipping_first_name) || empty($shipping_last_name) || empty($shipping_country) ||
        empty($shipping_state) || empty($shipping_city) || empty($shipping_address_1) || empty($shipping_address_2) || empty($shipping_postcode)) {
        tiva_show_notification('لطفا فیلد های اجباری را پر کنید', 'error');
        return;
    } elseif (!is_numeric($shipping_postcode)) {
        tiva_show_notification('کد پستی وارد شده متعبر نیست', 'error');
    }

    update_user_meta($current_user_id, 'shipping_first_name', $shipping_first_name);
    update_user_meta($current_user_id, 'shipping_last_name', $shipping_last_name);
    update_user_meta($current_user_id, 'shipping_company', $shipping_company);
    update_user_meta($current_user_id, 'shipping_country', $shipping_country);
    update_user_meta($current_user_id, 'shipping_state', $shipping_state);
    update_user_meta($current_user_id, 'shipping_city', $shipping_city);
    update_user_meta($current_user_id, 'shipping_address_1', $shipping_address_1);
    update_user_meta($current_user_id, 'shipping_address_2', $shipping_address_2);
    update_user_meta($current_user_id, 'shipping_postcode', $shipping_postcode);
    tiva_show_notification('آدرس حمل و نقل شما با موفقیت بروزرسانی شد', 'success');
}

// end user shipping address save and edit

// begin get user orders status persian
function tiva_user_order_status_to_persian_translate($status)
{

//    var_dump($status);
    switch ($status) {
        case 'cancelled':
            return ' <span class="label label-default" style="margin-left: 3px ; margin-right: 2px"> لغو شده </span> ';
            break;
        case 'completed':
            return ' <span class="label label-primary" style="margin-left: 3px ; margin-right: 2px">تکمیل شده</span> ';
            break;
        case 'failed':
            return ' <span class="label label-danger" style="margin-left: 3px ; margin-right: 2px">ناموفق </span> ';
            break;
        case 'processing':
            return ' <span class="label label-success" style="margin-left: 3px ; margin-right: 2px">در حال پردازش </span> ';
            break;
        case 'refunded':
            return ' <span class="label label-default" style="margin-left: 3px ; margin-right: 2px">مسترد شده</span> ';
            break;
        case 'on-hold':
            return ' <span class="label label-warning" style="margin-left: 3px ; margin-right: 2px">در انتظار بررسی</span> ';
            break;
        case 'pending':
            return ' <span class="label label-default" style="margin-left: 3px ; margin-right: 2px">در انتظار پرداخت</span> ';
            break;

    }

}

// end get user orders status persian

//begin tiva user currency to persian
function tiva_user_order_woo_currency_to_persian($currency)
{
    switch ($currency) {
        case 'IRR';
            return ' ریال ';
            break;
        case 'IRT';
            return ' تومان ';
            break;
    }
}

//end tiva user currency to persian

//begin tiva woo view order
function tiva_woocommerce_view_order($order_id)
{

    if (isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'])) {
        $order = wc_get_order(intval($order_id));
    } else {
        die('دسترسی شما نامعتبر است.');
    }
//    var_dump($order);
    ?>
    <div class="table-wrapper">
        <table class="table">
            <thead>
            <tr>
                <th class="product-name"><?php _e('Product', 'woocommerce'); ?></th>
                <th></th>
                <th class="product-quantity"><?php _e('Quantity', 'woocommerce'); ?></th>
                <th class="product-total"><?php _e('Total', 'woocommerce'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (sizeof($order->get_items()) > 0) {

                foreach ($order->get_items() as $item) {
                    $_product = apply_filters('woocommerce_order_item_product', $order->get_product_from_item($item), $item);
                    $product = apply_filters('woocommerce_order_item_product', $item->get_product(), $item);
                    ?>
                    <tr class="<?php echo esc_attr(apply_filters('woocommerce_order_item_class', 'order_item', $item, $order)); ?>">
                        <td class="product-name">
                                <span class="product-thumbnail">
                                    <?php
                                    $cart_item = '';
                                    $cart_item_key = '';
                                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                    if (!$_product->is_visible())
                                        echo $thumbnail;
                                    else
                                        printf('<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail);
                                    ?>
                                </span>
                        </td>
                        <td class="product-link">
                            <div class="product-info">
                                <?php
                                if ($_product && !$_product->is_visible())
                                    echo apply_filters('woocommerce_order_item_name', $item['name'], $item);
                                else
                                    echo apply_filters('woocommerce_order_item_name', sprintf('<a href="%s">%s</a>', get_permalink($item['product_id']), $item['name']), $item);

                                wc_display_item_meta($item);
                                ?>
                            </div>
                        </td>
                        <td class="product-quantity">
                            <?php echo apply_filters('woocommerce_order_item_quantity_html', tiva_change_number($item['qty']), $item); ?>
                        </td>
                        <td class="product-total">
                            <?php echo tiva_change_number($order->get_formatted_line_subtotal($item)); ?>
                        </td>
                    </tr>
                    <?php
                    $show_purchase_note = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
                    $purchase_note = $product ? $product->get_purchase_note() : '';
                    if ($show_purchase_note && $purchase_note) {
                        ?>
                        <tr class="product-purchase-note">
                            <td colspan="3"><?php echo wpautop(do_shortcode(wp_kses_post($purchase_note))); ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            do_action('woocommerce_order_items_table', $order);
            ?>
            </tbody>
        </table>
        <div class="clearfix"></div>
        <div class="order-total">
            <table class="table">
                <tbody>
                <?php
                if ($totals = $order->get_order_item_totals())
                    foreach ($totals as $total) :
                        ?>
                        <tr>
                            <th scope="row"><?php echo $total['label']; ?></th>
                            <td class="product-total"><?php echo tiva_change_number($total['value']); ?></td>
                        </tr>
                    <?php
                    endforeach;
                ?>
                </tbody>

            </table>
        </div>
        <?php do_action('woocommerce_order_details_after_order_table', $order); ?>
    </div>
    <div class="clearfix"></div>
    <br>
    <div class="tiva-customer-details">

        <div class="order-cus-detil">
            <div class="col-md-4">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-address-card font-red-flamingo"></i>
                            <span class="caption-subject bold font-red-flamingo uppercase"> آدرس صورتحساب </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <?php if (get_option('woocommerce_ship_to_billing_address_only') === 'no' && get_option('woocommerce_calc_shipping') !== 'no') : ?>
                        <div class="col2-set addresses">
                            <div class="col-1">
                                <?php endif; ?>
                                <address><p>
                                        <?php
                                        if (!$order->get_formatted_billing_address())
                                            _e('N/A', 'woocommerce');
                                        else
                                            echo tiva_change_number($order->get_formatted_billing_address());
                                        ?>
                                    </p></address>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
            <div class="col-md-4">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user-circle-o font-red-flamingo"></i>
                            <span class="caption-subject bold font-red-flamingo uppercase">مشخصات سفارش دهنده</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <dl class="customer_details">
                            <?php
                            if ($order->get_customer_note())
                                echo '<dt>' . 'یاداشت سفارش :' . '</dt> <dd>' . tiva_change_number($order->get_customer_note()) . '</dd>';
                            if ($order->get_billing_email())
                                echo '<dt>' . 'ایمیل :' . '</dt> <dd>' . tiva_change_number($order->get_billing_email()) . '</dd>';
                            if ($order->get_billing_phone())
                                echo '<dt>' . 'شماره تماس :' . '</dt> <dd>' . tiva_change_number($order->get_billing_phone()) . '</dd>';

                            // Additional customer details hook
                            do_action('woocommerce_order_details_after_customer_details', $order);
                            ?>
                        </dl>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
            <div class="col-md-4">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-truck font-red-flamingo"></i>
                            <span class="caption-subject bold font-red-flamingo uppercase"> آدرس حمل و نقل </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <address><p>
                                <?php
                                if (!$order->get_formatted_shipping_address())
                                    _e('N/A', 'woocommerce');
                                else
                                    echo tiva_change_number($order->get_formatted_shipping_address());
                                ?>
                            </p></address>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <?php
}

//end tiva woo view order

//begin tiva woo view order in search order
function tiva_woocommerce_view_order_in_search_order($order_id)
{
    $order_top = new WC_Order(intval($order_id));

    $order_data = $order_top->get_data();
    $order = wc_get_order(intval($order_id));
    ?>

    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="alert alert-info text-center">
        سفارش <strong><?php echo '#' . tiva_change_number($order_data['id']) ?></strong> در تاریخ
        <strong> <?php echo tiva_change_number(jdate('H:i | d-m-Y', $order_data['date_created'])) ?> </strong>
        ثبت شده و هم اکنون
        <strong> <?php echo '' . tiva_user_order_status_to_persian_translate($order_data['status']) . '' ?> </strong>
        است.
    </div>
    <br>
    <div class="order-view-wrapper">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                <tr>
                    <th class="product-name"><?php _e('Product', 'woocommerce'); ?></th>
                    <th></th>
                    <th class="product-quantity"><?php _e('Quantity', 'woocommerce'); ?></th>
                    <th class="product-total"><?php _e('Total', 'woocommerce'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (sizeof($order->get_items()) > 0) {

                    foreach ($order->get_items() as $item) {
                        $_product = apply_filters('woocommerce_order_item_product', $order->get_product_from_item($item), $item);
                        $product = apply_filters('woocommerce_order_item_product', $item->get_product(), $item);
                        ?>
                        <tr class="<?php echo esc_attr(apply_filters('woocommerce_order_item_class', 'order_item', $item, $order)); ?>">
                            <td class="product-name">
                                <span class="product-thumbnail">
                                    <?php
                                    $cart_item = '';
                                    $cart_item_key = '';
                                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                    if (!$_product->is_visible())
                                        echo $thumbnail;
                                    else
                                        printf('<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail);
                                    ?>
                                </span>
                            </td>
                            <td class="product-link">
                                <div class="product-info">
                                    <?php
                                    if ($_product && !$_product->is_visible())
                                        echo apply_filters('woocommerce_order_item_name', $item['name'], $item);
                                    else
                                        echo apply_filters('woocommerce_order_item_name', sprintf('<a href="%s">%s</a>', get_permalink($item['product_id']), $item['name']), $item);

                                    wc_display_item_meta($item);
                                    ?>
                                </div>
                            </td>
                            <td class="product-quantity">
                                <?php echo apply_filters('woocommerce_order_item_quantity_html', tiva_change_number($item['qty']), $item); ?>
                            </td>
                            <td class="product-total">
                                <?php echo tiva_change_number($order->get_formatted_line_subtotal($item)); ?>
                            </td>
                        </tr>
                        <?php
                        $show_purchase_note = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
                        $purchase_note = $product ? $product->get_purchase_note() : '';
                        if ($show_purchase_note && $purchase_note) {
                            ?>
                            <tr class="product-purchase-note">
                                <td colspan="3"><?php echo wpautop(do_shortcode(wp_kses_post($purchase_note))); ?></td>
                            </tr>
                            <?php
                        }
                    }
                }
                do_action('woocommerce_order_items_table', $order);
                ?>
                </tbody>
            </table>
            <div class="clearfix"></div>
            <div class="order-total">
                <table class="table">
                    <tbody>
                    <?php
                    if ($totals = $order->get_order_item_totals())
                        foreach ($totals as $total) :
                            ?>
                            <tr>
                                <th scope="row"><?php echo $total['label']; ?></th>
                                <td class="product-total"><?php echo tiva_change_number($total['value']); ?></td>
                            </tr>
                        <?php
                        endforeach;
                    ?>
                    </tbody>

                </table>
            </div>
            <?php do_action('woocommerce_order_details_after_order_table', $order); ?>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="tiva-customer-details">

            <div class="order-cus-detil">
                <div class="col-md-4">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet light bg-inverse">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-address-card font-red-flamingo"></i>
                                <span class="caption-subject bold font-red-flamingo uppercase"> آدرس صورتحساب </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php if (get_option('woocommerce_ship_to_billing_address_only') === 'no' && get_option('woocommerce_calc_shipping') !== 'no') : ?>
                            <div class="col2-set addresses">
                                <div class="col-1">
                                    <?php endif; ?>
                                    <address><p>
                                            <?php
                                            if (!$order->get_formatted_billing_address())
                                                _e('N/A', 'woocommerce');
                                            else
                                                echo tiva_change_number($order->get_formatted_billing_address());
                                            ?>
                                        </p></address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
                <div class="col-md-4">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet light bg-inverse">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user-circle-o font-red-flamingo"></i>
                                <span class="caption-subject bold font-red-flamingo uppercase">مشخصات سفارش دهنده</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <dl class="customer_details">
                                <?php
                                if ($order->get_customer_note())
                                    echo '<dt>' . 'یاداشت سفارش :' . '</dt> <dd>' . tiva_change_number($order->get_customer_note()) . '</dd>';
                                if ($order->get_billing_email())
                                    echo '<dt>' . 'ایمیل :' . '</dt> <dd>' . tiva_change_number($order->get_billing_email()) . '</dd>';
                                if ($order->get_billing_phone())
                                    echo '<dt>' . 'شماره تماس :' . '</dt> <dd>' . tiva_change_number($order->get_billing_phone()) . '</dd>';

                                // Additional customer details hook
                                do_action('woocommerce_order_details_after_customer_details', $order);
                                ?>
                            </dl>
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
                <div class="col-md-4">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet light bg-inverse">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-truck font-red-flamingo"></i>
                                <span class="caption-subject bold font-red-flamingo uppercase"> آدرس حمل و نقل </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <address><p>
                                    <?php
                                    if (!$order->get_formatted_shipping_address())
                                        _e('N/A', 'woocommerce');
                                    else
                                        echo tiva_change_number($order->get_formatted_shipping_address());
                                    ?>
                                </p></address>
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->

    <?php
}

//end tiva woo view order in search order

// ***********************  END TIVA USER FUNCTION ADD IN V5 ************************

include get_template_directory() . '/panel/includes/user/user-ajax.php';
include get_template_directory() . '/panel/includes/user/user-action.php';

