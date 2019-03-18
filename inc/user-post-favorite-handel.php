<?php
add_action('wp_ajax_tiva_user_post_favorite', 'tiva_user_post_favorite');
function tiva_user_post_favorite()
{
    $user_id = intval($_POST['user_id']);
    $post_id = intval($_POST['post_id']);
    global $msg, $error;
    $result = tiva_get_user_favorite_post($post_id, $user_id);
    if ($result === false) {
        global $wpdb, $table_prefix;
        $wpdb->insert($table_prefix . 'tiva_favorite_post', array(
            'user_id' => $user_id,
            'post_id' => $post_id,
            'created_at' => date('Y-m-d H:i:s')
        ), array('%s', '%d', '%s'));
        $error = false;
        $msg = __('این مطلب در پروفایل کاربری شما ذخیره شد و از طریق پروفایل شما در دسترس است', 'tiva');
    } else {
        $error = true;
        $msg = __('شما این مطلب را قبلا به علاقه مندی ها اضافه کرده اید', 'tiva');
    }

    wp_send_json(array(
        'msg' => $msg,
        'error' => $error
    ));
}

function tiva_get_user_favorite_post($post_id, $user_id)
{
    global $wpdb, $table_prefix;
    $result = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table_prefix}tiva_favorite_post WHERE post_id=%d AND user_id=%s", $post_id, $user_id));
    return intval($result) > 0;
}

function tiva_get_user_favorite_post_css_class($post_id, $user_id)
{
    global $wpdb, $table_prefix;
    $result = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table_prefix}tiva_favorite_post WHERE post_id=%d AND user_id=%s", $post_id, $user_id));
    if(intval($result) > 0){
        return 'starred';
    }else{
        return '';
    }
}

function tiva_get_user_favorite_post_title($post_id, $user_id)
{
    global $wpdb, $table_prefix;
    $result = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table_prefix}tiva_favorite_post WHERE post_id=%d AND user_id=%s", $post_id, $user_id));
    if(intval($result) > 0){
        return 'ذخیره شده در علاقمندی ها';
    }else{
        return 'افزودن به علاقمندی ها ';
    }
}

function tiva_get_user_favorite_post_home($post_id, $user_id)
{
    global $wpdb, $table_prefix;
    $result = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table_prefix}tiva_favorite_post WHERE post_id=%d AND user_id=%s", $post_id, $user_id));
    if(intval($result) > 0) {
        return 'true';
    }

}