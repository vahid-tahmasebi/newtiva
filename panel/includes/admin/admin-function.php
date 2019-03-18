<?php

function karino_get_user_social_network_icon_for_admin_panel($social_network, $user_id)
{

    $web = $user_id->user_url;
    $telegram = get_user_meta($user_id->ID, 'tiva_user_telegram', true);
    $instagram = get_user_meta($user_id->ID, 'tiva_user_instagram', true);
    $linkedin = get_user_meta($user_id->ID, 'tiva_user_linkedin', true);
    $telegram_p = get_user_meta($user_id->ID, 'tiva_user_telegram_icon_privacy', true);
    $instagram_p = get_user_meta($user_id->ID, 'user_instagram_icon_privacy', true);
    $linkedin_p = get_user_meta($user_id->ID, 'user_linkedin_icon_privacy', true);
    $web_p = get_user_meta($user_id->ID, 'user_web_icon_privacy', true);
//    var_dump($web);
//    var_dump($web_p);
    if (isset($web) && !$web == '' && $social_network === 'web' && $web_p == 'true') {
        return
            ' 
              <a href="' . $web . '">
                <i class="fa fa fa-globe"></i>
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
    return false;
}

function karino_get_user_role($user_id)
{
    $user_meta = get_userdata($user_id);
    $role = $user_meta->roles[0];
    if ($role == 'administrator') {
        return 'مدیر';
    } elseif ($role == 'editor') {
        return 'ویرایشگر';
    } elseif ($role == 'author') {
        return 'نویسنده';
    } elseif ($role == 'contributor') {
        return 'مشارکت کننده';
    } elseif ($role == 'subscriber') {
        return 'مشترک';
    }

}

function karino_custom_msg_table_echo($msg, $length)
{
    if (strlen($msg) <= $length) {
        echo mb_substr($msg, 0, $length, 'UTF-8');
    } else {
        echo mb_substr($msg, 0, $length, 'UTF-8') . ' ...';
    }
}

karino_get_msg_i();

karino_read_msg_set_data_i();

karino_send_msg_for_user_function_i();

function karino_get_msg_no_read_count($user_id)
{
    global $wpdb;
    $db_prefix = $wpdb->prefix;
    $tiva_user_msg_table = $db_prefix . 'tiva_user_msg_handel';
    return $wpdb->get_var("SELECT COUNT(*) FROM $tiva_user_msg_table WHERE user_id={$user_id} and read_msg='n'");

}

karino_get_users_with_group_id_msg_system_i();

karino_create_users_group_function_i();

karino_delete_users_group_msg_function_i();

karino_update_users_group_function_i();


function karino_delete_users_selected_function()
{
    if (!isset($_POST['user_id'])) {
        tiva_show_notification('لطفا کاربران مورد نظر خود را انتخاب کنید', 'error');
        return;
    }
    $users = $_POST['user_id'];
    $ids = implode(',', $users);
    global $wpdb;
    $db_prefix = $wpdb->prefix;
    $tiva_users_group_msg_handel_table = $db_prefix . 'tiva_users_group_msg_handel';
    $group_id = base64_decode(urldecode($_GET['group_id']));
    $result = $wpdb->query("
            DELETE 
         FROM {$tiva_users_group_msg_handel_table} 
         WHERE {$tiva_users_group_msg_handel_table}.group_id={$group_id} AND {$tiva_users_group_msg_handel_table}.user_id IN ({$ids});
    ");
    if (intval($result)) {
        tiva_show_notification('کاربران مورد نظر شما با موفقیت حذف شدن.', 'success');
    } else {
        tiva_show_notification('متاسفانه مشکلي رخ داده است و کاربران مورد نظر شما حذف نشدن.', 'error');
    }

}

karino_add_users_selected_function_i();

include get_template_directory() . '/panel/includes/admin/admin-ajax.php';
include get_template_directory() . '/panel/includes/admin/admin-action.php';
