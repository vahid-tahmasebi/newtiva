<?php

add_action('wp_ajax_karino_admin_panel_user_block', 'karino_admin_panel_user_block');
function karino_admin_panel_user_block()
{
    global $msg;
    $user_id = $_POST['user_id'];
    $result = update_user_meta($user_id, 'karino_user_block', 'true');
    if ($result !== false) {
        $msg = 'مدیر محترم کاربر مورد نظر با موفقیت بلاک شد.';
        wp_send_json(array(
            'notification' => 'success',
            'msg' => $msg
        ));
    } else {
        $msg = 'مدیر محترم مشکلی رخ داده است مجددا تلاش کنید.';
        wp_send_json(array(
            'notification' => 'error',
            'msg' => $msg
        ));
    }
}

add_action('wp_ajax_karino_admin_panel_user_unblock', 'karino_admin_panel_user_unblock');
function karino_admin_panel_user_unblock()
{
    global $msg;
    $user_id = $_POST['user_id'];
    $result = update_user_meta($user_id, 'karino_user_block', 'false');
    //    var_dump($result);
    if ($result !== false) {
        $msg = 'مدیر محترم کاربر مورد نظر با موفقیت فعال شد.';
        wp_send_json(array(
            'notification' => 'success',
            'msg' => $msg
        ));
    } else {
        $msg = 'مدیر محترم مشکلی رخ داده است مجددا تلاش کنید.';
        wp_send_json(array(
            'notification' => 'error',
            'msg' => $msg
        ));
    }
}

add_action('wp_ajax_karino_admin_panel_user_remove', 'karino_admin_panel_user_remove');
function karino_admin_panel_user_remove()
{
    global $msg;
    $user_id = $_POST['user_id'];
    $result = wp_delete_user($user_id);
//    var_dump($result);
    if ($result !== false) {
        $msg = 'مدیر محترم کاربر مورد نظر با موفقیت حذف شد.';
        wp_send_json(array(
            'notification' => 'success',
            'msg' => $msg
        ));
    } else {
        $msg = 'مدیر محترم مشکلی رخ داده است مجددا تلاش کنید.';
        wp_send_json(array(
            'notification' => 'error',
            'msg' => $msg
        ));
    }
}

// add in tiva v3.1
add_action('wp_ajax_karino_admin_panel_user_active_account', 'karino_admin_panel_user_active_account');
function karino_admin_panel_user_active_account()
{
    global $msg, $table_prefix, $wpdb;
    $user_id = $_POST['user_id'];

    $table = $table_prefix . 'users';

    $result = $wpdb->query($wpdb->prepare("UPDATE {$table} SET user_status='1' WHERE ID={$user_id}"));

    if ($result === 1) {
        $msg = 'مدیر محترم حساب کاربری کاربر مورد نظر با موفقیت فعال شد.';
        wp_send_json(array(
            'notification' => 'success',
            'msg' => $msg
        ));
    } else {
        $msg = 'مدیر محترم مشکلی رخ داده است مجددا تلاش کنید.';
        wp_send_json(array(
            'notification' => 'error',
            'msg' => $msg
        ));
    }
}