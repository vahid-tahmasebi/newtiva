<?php

// begin tiva post like system
add_action('wp_ajax_tiva_do_like', 'tiva_do_like');
add_action('wp_ajax_nopriv_tiva_do_like', 'tiva_do_like');

function tiva_do_like()
{

    $post_id = $_POST['post_id'];
    $new_count = tiva_update_post_likes($post_id);
    wp_send_json([
        'success' => TRUE,
        'new_count' => tiva_change_number($new_count)
    ], 200);

}

function tiva_update_post_likes($post_id, $count = 1)
{

    $current_count = tiva_get_post_likes($post_id);
    $new_count = $current_count + $count;
    update_post_meta($post_id, '_post_like_count', $new_count);
    tiva_set_post_like($post_id);

    return $new_count;
}

function tiva_which_user_liked_post($post_id)
{

    if (is_user_liked_post($post_id)) {
        $post_liked = 'post-liked';
        return $post_liked;
    }

}

function tiva_set_post_like($post_id, $user_id = NULL)
{
    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);
    $wpdb->insert($table_prefix . 'tiva_likes_log', array(
        'user_id' => $user_id,
        'post_id' => $post_id,
        'created_at' => date('Y-m-d H:i:s')
    ), array('%s', '%d', '%s'));

    return $wpdb->insert_id;
}

add_action('wp_ajax_tiva_do_dislike', 'tiva_do_dislike');
add_action('wp_ajax_nopriv_tiva_do_dislike', 'tiva_do_dislike');

function tiva_do_dislike(){
    $post_id = $_POST['post_id'];
    $new_count = tiva_update_post_dislikes($post_id);
    wp_send_json([
        'success' => TRUE,
        'new_count' => tiva_change_number($new_count)
    ], 200);
}

function tiva_update_post_dislikes($post_id, $count = 1)
{

    $current_count = tiva_get_post_likes($post_id);
    $new_count = $current_count - $count;
    update_post_meta($post_id, '_post_like_count', $new_count);
    tiva_set_post_dislike($post_id);

    return $new_count;
}

function tiva_which_user_disliked_post($post_id)
{

    if (is_user_liked_post($post_id)) {
        $post_liked = 'unlike';
        return $post_liked;
    } else {
        $post_liked = 'like';
        return $post_liked;
    }

}

function tiva_set_post_dislike($post_id, $user_id = NULL)
{
    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);
    $wpdb->delete($table_prefix . 'tiva_likes_log', array(
        'user_id' => $user_id,
        'post_id' => $post_id,
//      'created_at' => date('Y-m-d H:i:s')
    ), array('%s', '%d'));

//    return $wpdb->insert_id;
}


function tiva_get_post_likes($post_id)
{
    return (int)get_post_meta($post_id, '_post_like_count', TRUE);
}

function is_user_liked_post($post_id, $user_id = NULL)
{

    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);
    $result = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table_prefix}tiva_likes_log WHERE post_id=%d AND user_id=%s", $post_id, $user_id));

    return intval($result) > 0;


}

function tiva_get_current_user($user_id = NULL)
{

    $user_info = new Users_info;

    if (!is_null($user_id)) {
        return $user_id;
    }
    if (is_user_logged_in()) {
        return get_current_user_id();
    } else {
        return $user_info->c_ip();
    }

} // for post like system and comment like system

// end tiva post like system