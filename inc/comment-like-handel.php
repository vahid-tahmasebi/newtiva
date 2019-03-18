<?php

//************************************COMMENT LIKE UP**************************************

// begin tiva comment like up system
add_action('wp_ajax_tiva_comment_do_like_up', 'tiva_comment_do_like_up');
add_action('wp_ajax_nopriv_tiva_comment_do_like_up', 'tiva_comment_do_like_up');


function tiva_comment_do_like_up()
{

    $comment_id = $_POST['comment_id'];
    $new_count = tiva_update_comment_likes_up($comment_id);
    wp_send_json([
        'success' => TRUE,
        'new_count' => $new_count,
        'debug_test' => is_user_liked_up_comment($comment_id, $user_id)
    ], 200);

}

function tiva_update_comment_likes_up($comment_id, $count = 1)
{

    $current_count = tiva_get_comment_likes_up($comment_id);
    $new_count = $current_count + $count;
    update_comment_meta($comment_id, '_comment_like_count', $new_count);
    tiva_set_comment_like_up($comment_id);
    return $new_count;
}

function tiva_set_comment_like_up($comment_id, $user_id = NULL)
{
    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);
    $check_record_find = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table_prefix}tiva_comment_likes_log WHERE comment_id=%d AND user_id=%s", $comment_id, $user_id));

    if (!intval($check_record_find) > 0) {
        $wpdb->insert($table_prefix . 'tiva_comment_likes_log', array(
            'user_id' => $user_id,
            'comment_id' => $comment_id,
            'created_at' => date('Y-m-d H:i:s'),
            'tiva_comment_status' => 'l'
        ), array('%s', '%d', '%s'));

//        return $wpdb->insert_id;
    } else {
        $wpdb->update($table_prefix . 'tiva_comment_likes_log', array(
            'user_id' => $user_id,
            'comment_id' => $comment_id,
            'created_at' => date('Y-m-d H:i:s'),
            'tiva_comment_status' => 'l'
        ), array(
            'user_id' => $user_id,
            'comment_id' => $comment_id
        ), array('%s', '%d', '%s'));
    }


}

function tiva_get_comment_likes_up($comment_id, $css_action = false)
{
    $likes_count = (int)get_comment_meta($comment_id, '_comment_like_count', TRUE);
    if (!$css_action === false) {
        if ($likes_count === 0 || $likes_count = null) {
            return '';
        } else {
            return '+';
        }
    }

    return (int)get_comment_meta($comment_id, '_comment_like_count', TRUE);


}

function tiva_get_user_id_for_comment_like_up($comment_id)
{

    global $wpdb, $table_prefix;
    $result = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM {$table_prefix}tiva_comment_likes_log WHERE comment_id=%d ", $comment_id));

    return $result;

}

function is_user_liked_up_comment($comment_id, $user_id = NULL)
{

    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);
    $result = $wpdb->get_var($wpdb->prepare("SELECT tiva_comment_status FROM {$table_prefix}tiva_comment_likes_log WHERE comment_id=%d AND user_id=%s", $comment_id, $user_id));

    if ($result === 'l') {
        return 'comment-liked-up';
    } else {
        return 'no-comment-liked-up';
    }

}

//end tiva comment like up system


// begin tiva comment dislike up system
add_action('wp_ajax_tiva_comment_do_dislike_up', 'tiva_comment_do_dislike_up');
add_action('wp_ajax_nopriv_tiva_comment_do_dislike_up', 'tiva_comment_do_dislike_up');

function tiva_comment_do_dislike_up()
{
    $comment_id = $_POST['comment_id'];
    $new_count = tiva_update_comment_dislikes_up($comment_id);
    wp_send_json([
        'success' => TRUE,
        'new_count' => $new_count,
        'debug_test' => is_user_liked_up_comment($comment_id, $user_id)
    ], 200);
}

function tiva_update_comment_dislikes_up($comment_id, $count = 1)
{

    $current_count = tiva_get_comment_dislikes_up($comment_id);
    $new_count = $current_count - $count;
    update_comment_meta($comment_id, '_comment_like_count', $new_count);
    tiva_set_comment_dislike_up($comment_id);
    return $new_count;
}

function tiva_set_comment_dislike_up($comment_id, $user_id = NULL)
{
    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);

    $wpdb->update($table_prefix . 'tiva_comment_likes_log', array(
        'user_id' => $user_id,
        'comment_id' => $comment_id,
        'created_at' => date('Y-m-d H:i:s'),
        'tiva_comment_status' => 'n'
    ), array(
        'user_id' => $user_id,
        'comment_id' => $comment_id
    ), array('%s', '%d', '%s'));


//    return $wpdb->insert_id;
}

function tiva_get_comment_dislikes_up($comment_id)
{
    return (int)get_comment_meta($comment_id, '_comment_like_count', TRUE);
}

function tiva_get_user_id_for_comment_dislike_up($comment_id)
{

    global $wpdb, $table_prefix;
    $result = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM {$table_prefix}tiva_comment_likes_log WHERE comment_id=%d ", $comment_id));

    return $result;

}

//end tiva comment dislike up system

//************************************COMMENT LIKE UP**************************************


//************************************COMMENT LIKE DOWN**************************************

// begin tiva comment like up system
add_action('wp_ajax_tiva_comment_do_like_down', 'tiva_comment_do_like_down');
add_action('wp_ajax_nopriv_tiva_comment_do_like_down', 'tiva_comment_do_like_down');

function tiva_comment_do_like_down()
{
    $comment_id = $_POST['comment_id'];
    $new_count = tiva_update_comment_likes_down($comment_id);
    wp_send_json([
        'success' => TRUE,
        'new_count' => $new_count
    ], 200);
}

function tiva_update_comment_likes_down($comment_id, $count = 1)
{

    $current_count = tiva_get_comment_likes_down($comment_id);
    $new_count = $current_count + $count;
    update_comment_meta($comment_id, '_comment_like_down_count', $new_count);
    tiva_set_comment_like_down($comment_id);
    return $new_count;
}

function tiva_set_comment_like_down($comment_id, $user_id = NULL)
{
    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);
    $check_record_find = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table_prefix}tiva_comment_likes_log WHERE comment_id=%d AND user_id=%s", $comment_id, $user_id));

    if (!intval($check_record_find) > 0) {
        $wpdb->insert($table_prefix . 'tiva_comment_likes_log', array(
            'user_id' => $user_id,
            'comment_id' => $comment_id,
            'created_at' => date('Y-m-d H:i:s'),
            'tiva_comment_status' => 'd'
        ), array('%s', '%d', '%s'));

//        return $wpdb->insert_id;
    } else {
        $wpdb->update($table_prefix . 'tiva_comment_likes_log', array(
            'user_id' => $user_id,
            'comment_id' => $comment_id,
            'created_at' => date('Y-m-d H:i:s'),
            'tiva_comment_status' => 'd'
        ), array(
            'user_id' => $user_id,
            'comment_id' => $comment_id
        ), array('%s', '%d', '%s'));
    }

}

function tiva_get_comment_likes_down($comment_id, $css_action = false)
{
    $likes_count = (int)get_comment_meta($comment_id, '_comment_like_down_count', TRUE);
    if (!$css_action === false) {
        if ($likes_count === 0 || $likes_count = null) {
            return '';
        } else {
            return '-';
        }
    }
    return (int)get_comment_meta($comment_id, '_comment_like_down_count', TRUE);
}

function tiva_get_user_id_for_comment_like_down($comment_id)
{

    global $wpdb, $table_prefix;
    $result = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM {$table_prefix}tiva_comment_likes_log WHERE comment_id=%d ", $comment_id));

    return $result;

}

function is_user_liked_down_comment($comment_id, $user_id = NULL)
{

    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);
    $result = $wpdb->get_var($wpdb->prepare("SELECT tiva_comment_status FROM {$table_prefix}tiva_comment_likes_log WHERE comment_id=%d AND user_id=%s", $comment_id, $user_id));

    if ($result === 'd') {
        return 'comment-liked-down';
    } else {
        return 'no-comment-liked-down';
    }

}

//end tiva comment like up system


// begin tiva comment dislike up system
add_action('wp_ajax_tiva_comment_do_dislike_down', 'tiva_comment_do_dislike_down');
add_action('wp_ajax_nopriv_tiva_comment_do_dislike_down', 'tiva_comment_do_dislike_down');

function tiva_comment_do_dislike_down()
{
    $comment_id = $_POST['comment_id'];
    $new_count = tiva_update_comment_dislikes_down($comment_id);
    wp_send_json([
        'success' => TRUE,
        'new_count' => $new_count
    ], 200);
}

function tiva_update_comment_dislikes_down($comment_id, $count = 1)
{

    $current_count = tiva_get_comment_dislikes_down($comment_id);
    $new_count = $current_count - $count;
    update_comment_meta($comment_id, '_comment_like_down_count', $new_count);
    tiva_set_comment_dislike_down($comment_id);
    return $new_count;
}

function tiva_set_comment_dislike_down($comment_id, $user_id = NULL)
{
    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);

    $wpdb->update($table_prefix . 'tiva_comment_likes_log', array(
        'user_id' => $user_id,
        'comment_id' => $comment_id,
        'created_at' => date('Y-m-d H:i:s'),
        'tiva_comment_status' => 'n'
    ), array(
        'user_id' => $user_id,
        'comment_id' => $comment_id
    ), array('%s', '%d', '%s'));

//    return $wpdb->insert_id;

}

function tiva_get_comment_dislikes_down($comment_id)
{
    return (int)get_comment_meta($comment_id, '_comment_like_down_count', TRUE);
}

function tiva_get_user_id_for_comment_dislike_down($comment_id)
{

    global $wpdb, $table_prefix;
    $result = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM {$table_prefix}tiva_comment_likes_log WHERE comment_id=%d ", $comment_id));

    return $result;

}

//end tiva comment dislike up system

//************************************COMMENT LIKE UP**************************************


//*******************************COMMENT LIKE UP PLUS LIKE DOWN MINUS************************
add_action('wp_ajax_tiva_comment_like_up_plus_like_down_minus', 'tiva_comment_like_up_plus_like_down_minus');
add_action('wp_ajax_nopriv_tiva_comment_like_up_plus_like_down_minus', 'tiva_comment_like_up_plus_like_down_minus');

function tiva_comment_like_up_plus_like_down_minus()
{
    $comment_id = $_POST['comment_id'];
    $new_count_like_down = tiva_update_comment_dislikes_down($comment_id);
    $new_count_like_up = tiva_update_comment_likes_up($comment_id);
    wp_send_json([
        'success' => TRUE,
        'new_count_like_up' => $new_count_like_up,
        'new_count_like_down' => $new_count_like_down
    ], 200);
}

//function tiva_update_comment_like_up_plus_like_down_minus($comment_id, $count = 1)
//{
//
//    $current_count_like_up = tiva_get_comment_likes_up($comment_id);
//    $new_count_like_up = $current_count_like_up + $count;
//    update_comment_meta($comment_id, '_comment_like_count', $new_count_like_up);
//
//    tiva_set_comment_like_up_plus_like_down_minus($comment_id);
//    return $new_count_like_up;
//
//}
//
//function tiva_update_comment_like_down_plus_like_up_minus($comment_id, $count = 1)
//{
//
//    $current_count_like_down = tiva_get_comment_likes_down($comment_id);
//    $new_count_like_down = $current_count_like_down - $count;
//    update_comment_meta($comment_id, '_comment_like_down_count', $new_count_like_down);
//    tiva_set_comment_like_up_plus_like_down_minus($comment_id);
//    return $new_count_like_down;
//}

function tiva_set_comment_like_up_plus_like_down_minus($comment_id, $user_id = NULL)
{

    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);

    $wpdb->update($table_prefix . 'tiva_comment_likes_log', array(
        'user_id' => $user_id,
        'comment_id' => $comment_id,
        'created_at' => date('Y-m-d H:i:s'),
        'tiva_comment_status' => 'l',
//        'tiva_comment_status' => 'no-liked-up'
    ), array(
        'user_id' => $user_id,
        'comment_id' => $comment_id,
    ), array('%s', '%d', '%s'));


}

//*******************************COMMENT LIKE UP PLUS LIKE DOWN MINUS************************


//*******************************COMMENT LIKE UP PLUS LIKE DOWN MINUS************************
add_action('wp_ajax_tiva_comment_like_down_plus_like_up_minus', 'tiva_comment_like_down_plus_like_up_minus');
add_action('wp_ajax_nopriv_tiva_comment_like_down_plus_like_up_minus', 'tiva_comment_like_down_plus_like_up_minus');

function tiva_comment_like_down_plus_like_up_minus()
{
    $comment_id = $_POST['comment_id'];
    $new_count_like_up = tiva_update_comment_dislikes_up($comment_id);
    $new_count_like_down = tiva_update_comment_likes_down($comment_id);
    wp_send_json([
        'success' => TRUE,
        'new_count_like_up' => $new_count_like_up,
        'new_count_like_down' => $new_count_like_down
    ], 200);
}

//function tiva_update_comment_like_down_plus_like_up_minus_($comment_id, $count = 1)
//{
//
//    $current_count_like_down = tiva_get_comment_likes_down($comment_id);
//    $new_count_like_down = $current_count_like_down + $count;
//    update_comment_meta($comment_id, '_comment_like_down_count', $new_count_like_down);
//
//    tiva_set_comment_like_down_plus_like_up_minus($comment_id);
//    return $new_count_like_down;
//
//}
//
//function tiva_update_comment_like_up_plus_like_down_minus_($comment_id, $count = 1)
//{
//
//    $current_count_like_up = tiva_get_comment_likes_up($comment_id);
//    $new_count_like_up = $current_count_like_up - $count;
//    update_comment_meta($comment_id, '_comment_like_count', $new_count_like_up);
//    tiva_set_comment_like_up_plus_like_down_minus($comment_id);
//    return $new_count_like_up;
//}

function tiva_set_comment_like_down_plus_like_up_minus($comment_id, $user_id = NULL)
{

    global $wpdb, $table_prefix;
    $user_id = tiva_get_current_user($user_id);

    $wpdb->update($table_prefix . 'tiva_comment_likes_log', array(
        'user_id' => $user_id,
        'comment_id' => $comment_id,
        'created_at' => date('Y-m-d H:i:s'),
        'tiva_comment_status' => 'd',
//        'tiva_comment_status' => 'no-liked-up'
    ), array(
        'user_id' => $user_id,
        'comment_id' => $comment_id,
    ), array('%s', '%d', '%s'));


}

//*******************************COMMENT LIKE UP PLUS LIKE DOWN MINUS************************