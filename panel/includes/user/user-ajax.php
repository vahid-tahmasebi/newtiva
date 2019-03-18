<?php
add_action('wp_ajax_tiva_user_edit_comment', 'tiva_user_edit_comment');
function tiva_user_edit_comment()
{
    global $wpdb, $table_prefix;
    global $has_error, $msg;
    $id = $_POST['comment_id'];
    $comment = $_POST['comment_content'];
    if ($comment === '') {
        $has_error = 'error';
        $msg = 'شما نمی توانید دیدگاه خالی را ارسال کنید ';
        wp_send_json(array(
            'error' => $has_error,
            'msg' => $msg
        ));
        return false;
    } else {
        $wpdb->get_var($wpdb->prepare(" UPDATE {$table_prefix}comments SET comment_content=%s WHERE comment_ID={$id} ", $comment));
        $has_error = 'success';
        $msg = 'دیدگاه شما با موفقیت بروز رسانی شد';
        $update_comment = get_comment($id)->comment_content;//$wpdb->get_var($wpdb->prepare(" SELECT comment_content=%s FROM {$table_prefix}comments WHERE comment_ID={$id} ", $comment));
        wp_send_json(array(
            'error' => $has_error,
            'msg' => $msg,
            'update_comment' => $update_comment
        ));
    }


//    var_dump($_POST);
}

add_action('wp_ajax_tiva_user_edit_comment_trash', 'tiva_user_edit_comment_trash');
function tiva_user_edit_comment_trash()
{
    global $wpdb, $table_prefix;
    global $has_error, $msg;
    $id = $_POST['comment_id'];
    $comment = $_POST['comment_content'];
    if ($comment === '') {
        $has_error = 'error';
        $msg = 'شما نمی توانید دیدگاه خالی را ارسال کنید ';
        wp_send_json(array(
            'error' => $has_error,
            'msg' => $msg
        ));
        return false;
    } else {
        $wpdb->get_var($wpdb->prepare(" UPDATE {$table_prefix}comments SET comment_content=%s , comment_approved='0' WHERE comment_ID={$id} ", $comment));
        $has_error = 'success';
        $msg = 'دیدگاه شما با موفقیت بروز رسانی شد';
        $update_comment = get_comment($id)->comment_content;
        wp_send_json(array(
            'error' => $has_error,
            'msg' => $msg,
            'update_comment' => $update_comment
        ));
    }


//    var_dump($_POST);
}

add_action('wp_ajax_tiva_user_delete_favorite_post', 'tiva_user_delete_favorite_post');
function tiva_user_delete_favorite_post()
{
    global $wpdb, $table_prefix;
    global $msg;
    $post_id = $_POST['post_id'];
//    dd($id);
    if (!isset($post_id)) {
        $msg = 'درخواست شما نامعتبر می باشد لطفا دورباره تلاش کنید';
        wp_send_json(array(
            'notification' => 'error',
            'msg' => $msg
        ));
        return false;
    } else {
        $wpdb->query(" DELETE FROM {$table_prefix}tiva_favorite_post WHERE post_id={$post_id}");
        $msg = 'مطلب مورد علاقه شما  موفقیت حذف شد';
        wp_send_json(array(
            'notification' => 'success',
            'msg' => $msg,
        ));
    }


//    var_dump($_POST);
}

add_action('wp_ajax_tiva_user_delete_hold_post', 'tiva_user_delete_hold_post');
function tiva_user_delete_hold_post()
{

    global $wpdb, $table_prefix;
    global $msg;
    $post_id = $_POST['post_id'];
//    dd($id);
    if (!isset($post_id)) {
        $msg = 'درخواست شما نامعتبر می باشد لطفا دورباره تلاش کنید';
        wp_send_json(array(
            'notification' => 'error',
            'msg' => $msg
        ));
        return false;
    } else {
        $wpdb->query(" DELETE FROM {$table_prefix}posts WHERE ID={$post_id}");
        $msg = 'مقاله مورد علاقه شما  موفقیت حذف شد';
        wp_send_json(array(
            'notification' => 'success',
            'msg' => $msg,
        ));
    }


//    var_dump($_POST);
}

add_action('wp_ajax_tiva_user_send_post', 'tiva_user_send_post');
function tiva_user_send_post()
{

    dd($_POST);
    global $error, $msg;
    $post_title = $_POST['post_title'];
    $post_content = $_POST['post_content'];
    $post_pic = $_POST['file'];
    $post_cat = $_POST['post_cat'];
    $post_format = $_POST['post_format'];
    $current_user = wp_get_current_user();
    $post_data = array(
        'post_title' => $post_title,
        'post_content' => $post_content,
        'post_status' => 'pending',
        'post_author' => $current_user->ID,
        'post_category' => $post_cat

    );
//    dd($post_data);
    $new_post_id = wp_insert_post($post_data);
    set_post_format($new_post_id, $post_format);
    dd($new_post_id);
    if (!is_wp_error($new_post_id)) {
//        if (isset($_FILES['post_thumbnail']) && !empty($_FILES['post_thumbnail']['name'])) {
        if (!empty($post_pic)) {
            include ABSPATH . 'wp-admin/includes/image.php';
            include ABSPATH . 'wp-admin/includes/file.php';
            include ABSPATH . 'wp-admin/includes/media.php';
            $attachment_id = media_handle_upload('post_thumbnail', $new_post_id);
            update_post_meta($new_post_id, '_thumbnail_id', $attachment_id);
            $error = 'success';
            $msg = 'مقاله شما با موفقیت ارسال و در صف بررسی قرار گرفت.';
            wp_send_json(array(
                'error' => $error,
                'mssg' => $msg
            ));
        } else {
            $error = 'error';
            $msg = 'در زمان ارسال مقاله شما مشکلی به وجود آمده است.';
            wp_send_json(array(
                'error' => $error,
                'mssg' => $msg
            ));
        }
    }
}