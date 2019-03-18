<?php
ob_start();
global $wp_query;
date_default_timezone_set("Asia/Tehran");
function register_my_session()
{
    if (!session_id()) {
        session_start();
    }
}

add_action('init', 'register_my_session');

if (!function_exists('dd')) {

    function dd($data)
    {

        echo '<pre>';
        var_dump($data);
        die();
        echo '</pre>';

    }

}
// **** BEGIN CONTANTS DEFINE ****
define('THEME_PATH', get_template_directory());
define('THEME_URI', get_template_directory_uri());
// **** END CONTANTS DEFINE ****

// **** Begin Theme Filter ****

add_filter('comment_form_defaults', 'tiva_comment_placeholder');
function tiva_comment_placeholder($fields)
{

    $fields['comment_field'] = str_replace(
        '<textarea',
        '<textarea placeholder="متن دیدگاه شما ..."',
        $fields['comment_field']
    );


    return $fields;
}

// load css file to tiva option panel
// add post and download and widget style & js in tiva v4
function load_custom_wp_admin_style($hook)
{
    global $theme_panel_option_page, $user_panel_option_page, $about_panel_option_page;
    if ($hook == $theme_panel_option_page || $hook == $user_panel_option_page || $hook == $about_panel_option_page) {
        wp_register_style('tiva_admin_css', get_template_directory_uri() . '/css/admin.css', false);
        wp_enqueue_style('tiva_admin_css');
        wp_register_style('tiva_admin_bootstrap', get_template_directory_uri() . '/css/bootstrap-rtl.min.css', false);
        wp_enqueue_style('tiva_admin_bootstrap');

        wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap-rtl.min.js', array('jquery'), false, true);
        wp_enqueue_script('bootstrap-js');
        wp_register_script('tiva-admin-js', get_template_directory_uri() . '/js/tiva-admin.js', array('jquery'), false, true);
        wp_enqueue_script('tiva-admin-js');

    } else {
        return;
    }
}

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');
// remove pages in result if search


$tiva_current_user = wp_get_current_user();
if (!user_can($tiva_current_user, 'administrator')) {
    add_filter('show_admin_bar', '__return_false');
}

add_filter('excerpt_length', 'custom_excerpt_length');
function custom_excerpt_length()
{
    return 120;
}

// **** BEGIN TIVA THEME ACTION ****
add_action('after_setup_theme', 'tiva_setup');
function tiva_setup()
{

    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    //register nav menu
    $tiva_menu = array(
        'tiva_header_top_main_menu' => __('منوی  صفحه اصلی (اول) ', 'tiva'),
        'tiva_header_main_menu' => __('منوی  صفحه اصلی (دوم) ', 'tiva'),
        'tiva_store_header_main_menu' => __('منوی صفحات فروشگاه (بالا) ', 'tiva'),
        'tiva_footer_main_menu' => __('منوی دسترسی سریع فوتر(یک سطحی) ', 'tiva'),
    );
    register_nav_menus($tiva_menu);

    //add theme support thumbnails
    add_theme_support('post-thumbnails');


    //ADD THEME CUSTOM IMAGE SIZE FOR POST THUMBNAILS
    if (function_exists('add_image_size')) {
//        add_image_size('tiva-post-thumbnails', 340, 9999, false);
        add_image_size('tiva-product-single-thum', 388, 388, true);
        add_image_size('tiva-product-thum', 174, 174, true);
        add_image_size('tiva-post-thum', 253, 253, true);
        add_image_size('tiva-post-widget-thum', 65, 65, true);
        add_image_size('tiva-related-post-thum', 75, 75, true);
        add_image_size('tiva-video-thum', 253, 142, true);
    }

    //ADD THEME TEXT DOMAIN TRANSLATED
    load_theme_textdomain('tiva', get_template_directory() . '/languages');
} // v3

add_action('wp_enqueue_scripts', 'tiva_add_assets_scripts');
function tiva_add_assets_scripts()
{

    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false);
        wp_enqueue_script('jquery');
    }


    wp_register_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);
    wp_enqueue_script('main-js');

    wp_localize_script('main-js', 'data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'current_user_id' => wp_get_current_user()->ID,
        'total_post_count' => 10,
        'temp_patch' => get_template_directory_uri()
    ));

    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
//         Load comment-reply.js (into footer)
        wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
    }

    // ADD IN TIVA V5.5.2
    $currentUrl = $_SERVER['REQUEST_URI'];
    if (strpos($currentUrl, 'send-ticket') !== false || strpos($currentUrl, 'supporter-show-ticket') !== false ||
        strpos($currentUrl, 'show-ticket') !== false
    ) {
        wp_enqueue_media();
    }
}

// **** END TIVA THEME  ACTION ****

remove_action('admin_enqueue_scripts', 'wp_auth_check_load');
// **** BEGIN TIVA THEME FUNCTION ****
// cheek user activation email for get status
function get_tiva_user_email_activation_status()
{
    global $wpdb, $table_prefix;
    $html = '';
    if (isset($_GET['key']) && isset($_GET['user'])) {
        $table = $table_prefix . 'users';
        $result = $wpdb->update(
            $table,
            array('user_status' => 1,),
            array('ID' => $_GET['user'],
                'user_activation_key' => $_GET['key']
            ),
            array('%d',)
        );
        if ($result === 1) {
            $html = '<div class=" alert-box  alert  alert-success">
                    <strong> تبریک ! </strong><span class="msg-box">حساب کاربری شما فعال شد لطفا وارد شوید</span>
                    </div>';
            $tiva_options = get_option('tiva_options');
            if ($tiva_options['send-msg-user']['send_msg_on'] == 'true') {
                global $wpdb;
                $date = new jDateTime(true, true, 'Asia/Tehran');
                $db_prefix = $wpdb->prefix;
                $tiva_msg_table = $db_prefix . 'tiva_msg';
                $tiva_user_msg_table = $db_prefix . 'tiva_user_msg_handel';
                $result = $wpdb->query("SELECT MAX(id) FROM {$db_prefix}tiva_msg GROUP BY id");
                $id = $result + 1;
                $code_g_u = $_GET['user'];
                $status = 'u';
                $msg = $tiva_options['send-msg-user']['msg_text'];
                $msg_url_att = $tiva_options['send-msg-user']['msg_att'];
                $current_date = $date->date('Y-m-d', current_time('timestamp', 1));
                $current_time = $date->date('h:i:s', current_time('timestamp', 1));
                $subject = $tiva_options['send-msg-user']['msg_subject'];
                $admin_id = $tiva_options['send-msg-user']['msg_sender_admin'];
                $msg_data = array(
                    'id' => $id,
                    'code_g_u' => $code_g_u,
                    'status' => $status,
                    'msg' => $msg,
                    'send_at_date' => $current_date,
                    'send_at_time' => $current_time,
                    'subject' => $subject,
                    'admin_id' => $admin_id,
                    'msg_att' => $msg_url_att
                );
//                var_dump($msg_data);
                $result_insert = $wpdb->insert($tiva_msg_table, $msg_data, array('%d', '%d', '%s', '%s', '%s', '%s', '%s', '%d', '%s'));
//                var_dump($result_insert);
                if ($result_insert == 1) {
                    $msg_data_user = array(
                        'id' => $id,
                        'user_id' => $_GET['user'],
                        'read_msg' => 'n'
                    );
                    $wpdb->insert($tiva_user_msg_table, $msg_data_user);
                }
            }
        } elseif ($result === 0) {
            $html =
                '
                    <div class=" alert-box  alert  alert-warning">
                    <strong> هشدار ! </strong><span class="msg-box">حساب کاربری شما قبلا فعال شده است لطفا وارد شوید</span>
                    </div>
                ';
        } elseif ($result === false) {
            $html =
                '
                    <div class=" alert-box  alert  alert-error">
                    <strong> خطا ! </strong><span class="msg-box">مشکلی پیش آمده است با مدیر سایت تماس بگیرید</span>
                    </div>
                ';
        }

        return $html;
    }
}

// EDITED IN TIVA V 5.5.2
function get_tiva_user_status_login($user_emil)
{
    global $wpdb, $table_prefix;
    if (is_email($user_emil)) {
        $result = $wpdb->get_var($wpdb->prepare("SELECT user_status FROM {$table_prefix}users WHERE user_email=%s", $user_emil));
        return intval($result);
    } else {
        $result = $wpdb->get_var($wpdb->prepare("SELECT user_status FROM {$table_prefix}users WHERE user_login=%s", $user_emil));
        return intval($result);
    }


}

function get_tiva_user_status_login_admin($user_login)
{
    global $wpdb, $table_prefix;
    $result = $wpdb->get_var("SELECT ID FROM {$table_prefix}users WHERE user_login=%s", $user_login);
    $user_meta = get_userdata($result);

    $user_roles = implode(', ', $user_meta->roles);
    return $user_roles;

}

// is home page or author page to echo form filter title

function is_home_or_is_author()
{

    if (is_home()) {
        return 'جست و جوی پیشرفته مطالب';
    } else {
        return 'جست و جو در همه مطالب نویسنده ';
    }
}

function get_post_filter_id()
{

    if (is_home()) {
        return 'post-filter';
    } else {
        return 'author_post_filter';
    }
}

function get_form_action()
{
    if (is_home()) {
        return 'post_filter';
    } else {
        return 'author_post_filter';
    }
}

// CHANGE NUMBER EN TO FA
function tiva_change_number($num)
{
    $eng = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $per = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    return str_replace($eng, $per, $num);
}


// BEGIN SET POST META VIEW
function tiva_get_post_view($post_id)
{

    if (intval($post_id)) {

        $post_view = get_post_meta($post_id, 'views', true);
        return intval($post_view);

    }

    return 0;


}

function tiva_set_post_view($post_id)
{

    if (intval($post_id)) {

        $views = tiva_get_post_view($post_id);
        $views++;
        update_post_meta($post_id, 'views', $views);

    }

}

//begin tiva score user function
function tiva_get_user_mata_data_count($user_id, $posts_count = false, $comments_count = false, $like_count = false)
{
    global $wpdb, $table_prefix;
    if ($posts_count === true) {
        $result = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$table_prefix}posts WHERE post_author=%s and post_status='publish' and post_type='post'", $user_id));
        return $result;
    } elseif ($comments_count === true) {
        $result = $wpdb->get_var($wpdb->prepare("SELECT COUNT(comment_count) FROM {$table_prefix}posts WHERE post_author=%s and post_status='publish' and post_type='post'", $user_id));
        return $result;
    } elseif ($like_count === true) {
        /// یادت باشه
        $result = $wpdb->get_var($wpdb->prepare("SELECT sum(meta_value) FROM {$table_prefix}posts INNER join {$table_prefix}postmeta on {$table_prefix}postmeta.post_id={$table_prefix}posts.id WHERE  meta_key='_post_like_count' and post_status='publish' and post_type='post' and post_author=%s", $user_id));
        return $result;
    }

}

function tiva_get_user_score($user_id)
{
    $post_count = tiva_get_user_mata_data_count($user_id, true, false, false);
    $comments_count = tiva_get_user_mata_data_count($user_id, false, true, false);
    $likes_count = tiva_get_user_mata_data_count($user_id, false, false, true);
    $result = $post_count + ($comments_count + $likes_count) / 10;
//    var_dump($result);
    return $result;
}

// tiva comments callback
function comments_callback($comment, $args, $depth)
{

    $GLOBALS['comment'] = $comment;

    switch ($comment->comment_type) :

        case 'pingback' :

        case 'trackback' :

            // Display trackbacks differently than normal comments.

            ?>

            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

            <p>
                pingback <?php comment_author_link(); ?> <?php edit_comment_link(__('ویرایش'), '<p>', '</p>'); ?>
            </p>

            <?php

            break;

        default :

            // Proceed with normal comments.

            global $post;

            ?>

            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div class="comment comment_container">
                <div class="comment-avatar" <?php echo $comment->user_id; ?>>
                    <img src=" <?php echo esc_url(tiva_get_user_avatar($comment->user_id)); ?>" alt="" height="70"
                         width="70" class="avatar">
                </div>
                <div class="comment-content" id="comment-<?php comment_ID(); ?>">
                    <?php
                    if (is_user_logged_in()) {

                        if ($comment->comment_approved == '0') {
                            echo '<p class="bg-danger comment-awaiting-moderation">دیدگاه شما در انتظار بررسی و تایید است شما می توانید از طریق دکمه زیر دیدگاه خود را ویرایش کنید.  </p>';
                        };

                        if ($comment->comment_approved == '0') {
                            echo '<p class="edit-link"><a class="comment-edit-link" href="/user-panel/comments-hold"><span>ویرایش دیدگاه شما</span></a></p>';
                        };
                    } else {
                        if ($comment->comment_approved == '0') {
                            echo '<p class="bg-danger comment-awaiting-moderation">دیدگاه شما در انتظار بررسی و تایید است. </p>';
                        };
                    }
                    ?>

                    <div class="comment-author">
                        <?php printf('<cite class="fn %2$s">%1$s</cite>', get_comment_author_link(), ($comment->user_id === $post->post_author) ? 'author' : ''); ?>
                        <div class="commentmeta"><?php echo get_comment_date('g:i Y/m/d   '); ?></div>
                    </div>

                    <?php
                    $tiva_options = get_option('tiva_options');
                    comment_text();
                    ?>

                    <?php if (!empty($tiva_options['comment-like']['comment_like_show']) && $tiva_options['comment-like']['comment_like_show'] === 'true' || !isset($tiva_options['comment-like']['comment_like_show'])) : ?>
                        <div class="comment-action-bn">
                            <div class="comment-link comment-link-btn" data-id="<?php echo get_comment_ID();; ?>"
                                 data-toggle="tooltip-copy-comment<?php echo get_comment_ID();; ?>"
                                 data-placement="left"
                                 title="لینک دیدگاه شما ">
                                <a class="comment-link-btn" data-clipboard-text="<?php echo get_comment_link(); ?>">
                                    <i data-clipboard-target="#comment-link" class="fa fa-link " aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="tiva-comment-like">

                                <a data-toggle="tiva-comment-like-down-tooltip" title="مخالفم" data-placement="top"
                                   href="#"
                                   class="tiva-comment-like-down <?php echo is_user_liked_down_comment(get_comment_ID(), tiva_get_current_user()); ?>"
                                   data-id="<?php comment_ID(); ?>" data-rel="<?php echo get_comment_ID(); ?>">
                                    <span class="comment-like-down-cunt"
                                          data-rel="<?php echo get_comment_ID(); ?>"><?php echo tiva_change_number(tiva_get_comment_likes_down(get_comment_ID())) ?></span><span
                                            class="like-down-plus"
                                            data-rel="<?php echo get_comment_ID(); ?>"><?php echo tiva_change_number(tiva_get_comment_likes_down(get_comment_ID(), true)) ?></span>
                                    <img src="<?php echo get_template_directory_uri() . '/images/ajax-loader.gif'; ?>"
                                         alt="ajax-loader" height="13" width="13"
                                         class="ajax-loader-comment-like-down hidden"
                                         data-rel="<?php echo get_comment_ID(); ?>">
                                    <i class="fa  fa-thumbs-down" aria-hidden="true"></i>
                                </a>

                                <a data-toggle="tiva-comment-like-down-tooltip" title="موافقم" data-placement="top"
                                   href="#"
                                   class="tiva-comment-like-up <?php echo is_user_liked_up_comment(get_comment_ID(), tiva_get_current_user()); ?>"
                                   data-id="<?php echo get_comment_ID() ?>"
                                   data-rel="<?php echo get_comment_ID(); ?>"><span
                                            class="comment-like-up-cunt"
                                            data-rel="<?php echo get_comment_ID(); ?>"><?php echo tiva_change_number(tiva_get_comment_likes_up(get_comment_ID())) ?></span><span
                                            class="like-up-plus"
                                            data-rel="<?php echo get_comment_ID(); ?>"><?php echo tiva_change_number(tiva_get_comment_likes_up(get_comment_ID(), true)) ?></span>
                                    <img src="<?php echo get_template_directory_uri() . '/images/ajax-loader.gif'; ?>"
                                         alt="ajax-loader" height="13" width="13"
                                         class="ajax-loader-comment-like-up hidden"
                                         data-rel="<?php echo get_comment_ID(); ?>">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                </a>

                            </div>
                        </div>
                    <?php endif; ?>

                </div><!-- #comment-## -->
                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array('reply_text' => '<span class="reply">پاسخ دادن</span>', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>

            </div>
            <?php

            break;

    endswitch; // end comment_type check


}

function tiva_comments_popup_link($zero = false, $one = false, $more = false, $css_class = '', $none = false)
{
    $id = get_the_ID();
    $title = get_the_title();
    $number = get_comments_number($id);

    if (false === $zero) {
        /* translators: %s: post title */
        $zero = sprintf(__('No Comments<span class="screen-reader-text"> on %s</span>'), $title);
    }

    if (false === $one) {
        /* translators: %s: post title */
        $one = sprintf(__('1 Comment<span class="screen-reader-text"> on %s</span>'), $title);
    }

    if (false === $more) {
        /* translators: 1: Number of comments 2: post title */
        $more = _n('%1$s Comment<span class="screen-reader-text"> on %2$s</span>', '%1$s Comments<span class="screen-reader-text"> on %2$s</span>', $number);
        $more = sprintf($more, number_format_i18n($number), $title);
    }

    if (false === $none) {
        /* translators: %s: post title */
        $none = sprintf(__('Comments Off<span class="screen-reader-text"> on %s</span>'), $title);
    }

    if (0 == $number && !comments_open() && !pings_open()) {
        echo '<span' . ((!empty($css_class)) ? ' class="' . esc_attr($css_class) . '"' : '') . '>' . $none . '</span>';
        return;
    }

    if (post_password_required()) {
        _e('Enter your password to view comments.');
        return;
    }

    echo '<a href="#comments';

    echo '"';

    if (!empty($css_class)) {
        echo ' class="' . $css_class . '" ';
    }

    $attributes = '';
    /**
     * Filters the comments link attributes for display.
     *
     * @since 2.5.0
     *
     * @param string $attributes The comments link attributes. Default empty.
     */
    echo apply_filters('comments_popup_link_attributes', $attributes);

    echo '>';
    comments_number($zero, $one, $more);
    echo '</a>';
}

add_action('admin_bar_menu', 'tiva_add_admin_menu_in_admin_toolbar', 999);
function tiva_add_admin_menu_in_admin_toolbar($wp_admin_bar)
{
    $admin_panel_url = site_url() . '/admin-panel/admin-dashboard';
    $args = array(
        'id' => 'tiva_admin_panel',
        'title' => 'پنل مدیریت وب مستر سایت',
        'href' => $admin_panel_url,
        'meta' => array('class' => 'my-toolbar-page')
    );
    $wp_admin_bar->add_node($args);
}

add_action('init', 'blockusers_init');
function blockusers_init()
{
    if (is_admin() && !current_user_can('administrator') && !(defined('DOING_AJAX') && DOING_AJAX) && !current_user_can('editor')) {
        wp_redirect(home_url());
        exit;
    }
}

// tiva add post format
function tiva_add_post_formats()
{

    add_theme_support('post-formats', array(
        'gallery',
        'video',
        'audio',
    ));
}

add_action('after_setup_theme', 'tiva_add_post_formats');
// tiva get post format icon function
function tiva_get_post_format_icon($post_id)
{
    if (get_post_type($post_id) === 'download') {
        return 'fa fa-download';
    } elseif (has_post_format('gallery', $post_id)) {
        return 'fa fa-picture-o';
    } elseif (has_post_format('video', $post_id)) {
        return 'fa fa-video-camera';
    } elseif (has_post_format('audio', $post_id)) {
        return 'fa fa-volume-up';
    } else {
        return 'fa fa-file-text-o';
    }

}

function tiva_get_css_class_post_format($post_id)
{
    if (has_post_format('video', $post_id)) {
        return 'hidden';
    } elseif (has_post_format('gallery', $post_id)) {
        return 'hidden';
    } elseif (has_post_format('audio', $post_id)) {
        return 'hidden';
    } else {
        return '';
    }
}

function send_welcome_email_user($email)
{
    $to = $email;
    $subject = 'به وب سایت ما خوش آمدید ';
    $sender = get_option('name');

    $message = "<span style='color:red ; font-size: 50px'>" . 'تبریک به وب سایت ما خوش آمدید' . "</span>";

    $headers[] = 'MIME-Version: 1.0' . "\r\n";
    $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers[] = "X-Mailer: PHP \r\n";
    $headers[] = 'From: ' . $sender . ' < ' . $email . '>' . "\r\n";

    $mail = wp_mail($to, $subject, $message, $headers);
    if ($mail) {
        return $has_success = true;
        return $message[] = 'لفا ایمیل خود را چک کنید ';
    } else {
        return $has_error = true;
        return $message[] = 'مشکلی با ارسال ایمیل رخ داده است ';
    }
}

add_filter('use_default_gallery_style', '__return_false');

// tiva get status for show modal login user
function tiva_get_modal_user_login()
{

    if (!is_user_logged_in()) {
        return 'data-toggle="modal" data-target="#myModal"';
    } else {
        return '';
    }

}

// **** END TIVA THEME FUNCTION ****

// tiva get and set download count
function get_post_download_count($post_id)
{

    if (intval($post_id)) {

        $post_download_count = get_post_meta($post_id, 'download_count', true);
        return intval($post_download_count);

    }

    return 0;

}

function set_post_download_count($post_id)
{

    if (intval($post_id)) {

        $downloads = get_post_download_count($post_id);
        $downloads++;
        update_post_meta($post_id, 'download_count', $downloads);

        return $downloads;
    }
    return 0;

}

// tiva set script to widget page in admin panel
function tiva_widget_enqueue($hook)
{
    if ('widgets.php' == $hook) {
        wp_enqueue_style('tiva_meta_box_styles', get_template_directory_uri() . '/css/admin.css');
        wp_register_script('tiva-admin-js', get_template_directory_uri() . '/js/tiva-admin.js', array('jquery'), false, true);
        wp_enqueue_script('tiva-admin-js');
    }
}

add_action('admin_enqueue_scripts', 'tiva_widget_enqueue');

// sample code foe show custom post type in archive page , home page , tag page

add_filter('pre_get_posts', 'my_get_posts');
function my_get_posts($query)
{

    if (is_home() && $query->is_main_query())
        $query->set('post_type', array('post', 'download'));
    return $query;
}

function tiva_add_custom_type_download($query)
{
    if (($query->is_category() || $query->is_tag()) && $query->is_archive() || $query->is_author() && empty($query->query_vars['suppress_filters'])) {
        $query->set('post_type', array('post', 'download'));
    }
    return $query;
}

add_filter('pre_get_posts', 'tiva_add_custom_type_download');

/// function for show inbox msg icon
function karino_get_msg_no_read_count_home_page($user_id)
{
    global $wpdb;
    $db_prefix = $wpdb->prefix;
    $tiva_user_msg_table = $db_prefix . 'tiva_user_msg_handel';
    $result = $wpdb->get_var("SELECT COUNT(*) FROM $tiva_user_msg_table WHERE user_id={$user_id} and read_msg='n'");
    return $result;
}

function darsam_rss_count_subscribers()
{
    global $wpdb, $table_prefix;
    $status = 'subscribed';
    $result = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$table_prefix}mailpoet_subscribers WHERE status=%s ", $status));
    return $result;
}

function smart_category_top_parent_id($catid)
{
    while ($catid) {
        $cat = get_category($catid); // get the object for the catid
        $catid = $cat->category_parent; // assign parent ID (if exists) to $catid
        // the while loop will continue whilst there is a $catid
        // when there is no longer a parent $catid will be NULL so we can assign our $catParent
        $catParent = $cat->cat_ID;
    }
    return $catParent;
}

//tiva add arrow in sub menu
function be_arrows_in_menus($item_output, $item, $depth, $args)
{
    if (in_array('menu-item-has-children', $item->classes)) {
        $arrow = 0 == $depth ? '' : '<i class="fa fa-angle-left submenu-7host"></i>';
        $item_output = str_replace('</a>', $arrow . '</a>', $item_output);
    }
    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4);

// tiva redirect register to custom url
function tiva_registration_page_redirect()
{
    global $pagenow;

    if ((strtolower($pagenow) == 'wp-login.php') && (strtolower($_GET['action']) == 'register')) {
        wp_redirect(home_url('/register-user'));
    }
}

//add_filter('init', 'tiva_registration_page_redirect');

function enqueue_media_uploader()
{
    wp_enqueue_media();
    wp_enqueue_script("media-upload-demo", plugin_dir_url(__FILE__) . 'index.js', array("jquery"));
}

add_action("admin_enqueue_scripts", "enqueue_media_uploader");

// Begin woocommerce function tiva v3

add_action('after_setup_theme', "tiva_woocommerce_support");
function tiva_woocommerce_support()
{
    add_theme_support('woocommerce');
}

function tiva_change_product_price_display($price)
{
    return tiva_change_number($price);
}

add_filter('woocommerce_get_price_html', 'tiva_change_product_price_display');
add_filter('woocommerce_cart_item_price', 'tiva_change_product_price_display');
//add_action('woocommerce_after_shop_loop_item', 'my_print_stars');

function tiva_woocommerce_breadcrumb($args = array())
{
    $args = wp_parse_args($args, apply_filters('woocommerce_breadcrumb_defaults', array(
        'delimiter' => '<img class="breadcrumbs-arrow" src="' . get_template_directory_uri() . '/images/breadcrumbs.png' . '">',
        'wrap_before' => '<nav class="woocommerce-breadcrumb">',
        'wrap_after' => '</nav>',
        'before' => '',
        'after' => '',
        'home' => _x('Home', 'breadcrumb', 'woocommerce'),
    )));

    $breadcrumbs = new WC_Breadcrumb();

    if (!empty($args['home'])) {
        $breadcrumbs->add_crumb($args['home'], apply_filters('woocommerce_breadcrumb_home_url', home_url()));
    }

    $args['breadcrumb'] = $breadcrumbs->generate();

    /**
     * WooCommerce Breadcrumb hook
     *
     * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
     */
    do_action('woocommerce_breadcrumb', $breadcrumbs, $args);

    wc_get_template('global/breadcrumb.php', $args);
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);


/*
Disable Variable Product Price Range:
*/
add_filter('woocommerce_variable_sale_price_html', 'my_variation_price_format', 10, 2);

add_filter('woocommerce_variable_price_html', 'my_variation_price_format', 10, 2);

function my_variation_price_format($price, $product)
{

// Main Price
    $prices = array($product->get_variation_price('min', true), $product->get_variation_price('max', true));
    $price = $prices[0] !== $prices[1] ? sprintf(__('%1$s', 'woocommerce'), wc_price($prices[0])) : wc_price($prices[0]);

// Sale Price
    $prices = array($product->get_variation_regular_price('min', true), $product->get_variation_regular_price('max', true));
    sort($prices);
    $saleprice = $prices[0] !== $prices[1] ? sprintf(__('%1$s', 'woocommerce'), wc_price($prices[0])) : wc_price($prices[0]);

    if ($price !== $saleprice) {
        $price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
    }
    return $price;
}

function remove_product_description_add_cart_button($post_id)
{

    //Remove Add to Cart button from product description of product with id 1234
    if (intval(get_post_meta($post_id, 'stopped_product', true)) === 1)
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

}

add_action('wp', 'remove_product_description_add_cart_button');

function remove_woo_widgets()
{
    unregister_widget('WC_Widget_Recent_Products');
    unregister_widget('WC_Widget_Featured_Products');
    unregister_widget('WC_Widget_Product_Categories');
    unregister_widget('WC_Widget_Product_Tag_Cloud');
    unregister_widget('WC_Widget_Cart');
    unregister_widget('WC_Widget_Layered_Nav');
    unregister_widget('WC_Widget_Layered_Nav_Filters');
    unregister_widget('WC_Widget_Price_Filter');
    unregister_widget('WC_Widget_Product_Search');
    unregister_widget('WC_Widget_Top_Rated_Products');
    unregister_widget('WC_Widget_Recent_Reviews');
    unregister_widget('WC_Widget_Recently_Viewed');
    unregister_widget('WC_Widget_Best_Sellers');
    unregister_widget('WC_Widget_Onsale');
    unregister_widget('WC_Widget_Random_Products');
}

add_action('widgets_init', 'remove_woo_widgets');

// End woocommerce function tiva v3

// begin custom function for tiva 3

// begin live search fun
add_action('wp_footer', 'ajax_fetch');
function ajax_fetch()
{
    ?>
    <script type="text/javascript">
        function fetch() {
            var keyword = jQuery('.keyword').val();
            var mobile_keyword = jQuery('.keywordd').val();

            if (keyword.length > 0) {

                if (keyword.length <= 3 || keyword.length === 0) {
                    $('.showSearchResultOverly').addClass("hidden");

                    $('.datafetch').removeClass("showSearchResult-show");
                    return false;
                }

                jQuery('.datafetch').html(' ');
                jQuery('.showSearchResultOverly').removeClass("hidden");
                jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    data: {
                        action: 'data_fetch',
                        keyword: $.trim(keyword)
                    },
                    beforeSend: function () {
                        $('.datafetch').addClass("showSearchResult-show");
                    },
                    success: function (data) {
                        if (data.length !== 0) {
                            jQuery('.datafetch').html(data);
                        } else {
                            $('.datafetch').removeClass("hidden");
                            jQuery('.datafetch').html('<p class="noResult"><i class="fa fa-ban"></i> نتیجه ای یافت نشد</p>');
                        }

                    },
                    complete: function () {
                        $('.showSearchResultOverly').addClass("hidden");
                    }
                });
            } else if (mobile_keyword.length > 0) {

                if (mobile_keyword.length <= 3 || mobile_keyword.length === 0) {
                    $('.showSearchResultOverly').addClass("hidden");

                    $('.datafetch').removeClass("showSearchResult-show");
                    return false;
                }

                jQuery('.datafetch').html(' ');
                jQuery('.showSearchResultOverly').removeClass("hidden");
                jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    data: {
                        action: 'data_fetch',
                        keyword: $.trim(mobile_keyword)
                    },
                    beforeSend: function () {
                        $('.datafetch').addClass("showSearchResult-show");
                    },
                    success: function (data) {
                        if (data.length !== 0) {
                            jQuery('.datafetch').html(data);
                        } else {
                            $('.datafetch').removeClass("hidden");
                            jQuery('.datafetch').html('<p class="noResult"><i class="fa fa-ban"></i> نتیجه ای یافت نشد</p>');
                        }

                    },
                    complete: function () {
                        $('.showSearchResultOverly').addClass("hidden");
                    }
                });
            }


        }
    </script>

    <?php
}

// end live search fun

// end custom function for tiva 3

function tiva_is_ssl()
{
    if (isset($_SERVER['HTTPS'])) {
        if ('on' == strtolower($_SERVER['HTTPS']))
            return true;
        if ('1' == $_SERVER['HTTPS'])
            return true;
    } elseif (isset($_SERVER['SERVER_PORT']) && ('443' == $_SERVER['SERVER_PORT'])) {
        return true;
    }
    return false;
}

remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

function tiva_get_deactive_user_count()
{
    global $wpdb, $table_prefix;

    $user_status = '0';
    $result = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$table_prefix}users WHERE user_status=%s ", $user_status));
    return $result;
}

function tiva_custom_wc_get_gallery_image_html($attachment_id, $main_image = false)
{
    $flexslider = (bool)apply_filters('woocommerce_single_product_flexslider_enabled', get_theme_support('wc-product-gallery-slider'));
    $gallery_thumbnail = wc_get_image_size('gallery_thumbnail');
    $thumbnail_size = apply_filters('woocommerce_gallery_thumbnail_size', array($gallery_thumbnail['width'], $gallery_thumbnail['height']));
    $image_size = apply_filters('woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size);
    $full_size = apply_filters('woocommerce_gallery_full_size', apply_filters('woocommerce_product_thumbnails_large_size', 'full'));
    $thumbnail_src = wp_get_attachment_image_src($attachment_id, $thumbnail_size);
    $full_src = wp_get_attachment_image_src($attachment_id, $full_size);
    $image = wp_get_attachment_image($attachment_id, $image_size, false, array(
        'title' => get_post_field('post_title', $attachment_id),
        'data-caption' => get_post_field('post_excerpt', $attachment_id),
        'data-src' => $full_src[0],
        'data-large_image' => $full_src[0],
        'data-large_image_width' => $full_src[1],
        'data-large_image_height' => $full_src[2],
        'class' => $main_image ? 'wp-post-image ' : '',
    ));

    return '<div data-thumb="' . esc_url($thumbnail_src[0]) . '" class="product-thumbnails gallery-item woocommerce-product-gallery__image"><a href="' . esc_url($full_src[0]) . '">' . $image . '</a></div>';
}

// end custom function add in tiva v 3.1

// begin function add in tiva 4.3
function tiva_remove_mata_box_save_action_for_future_to_published_product($new, $old)
{
    if ($new == 'publish' && $old == 'future') {
        remove_action('save_post', 'tiva_post_meta_box_save');
        remove_action('save_post', 'tiva_download_meta_box_save');
        remove_action('save_post', 'tiva_download_box_meta_box_save');
        remove_action('save_post', 'tiva_page_disable_meta_box_save');
        remove_action('save_post', 'tiva_product_meta_box_save');  // add to tiva in v3
        remove_action('save_post', 'tiva_product_custom_data_meta_box_save');  // add to tiva in v3
        remove_action('save_post', 'tiva_video_post_meta_box_save');  // add to tiva in v4 for save video post save
    }
}

add_action('transition_post_status', 'tiva_remove_mata_box_save_action_for_future_to_published_product', 10, 2);
// end function add in tiva 4.3


// ****************** BEGIN TIVA V5 FUNCTION *******************

// begin add supporter role and section name meta in tiva v5
add_role('supporter', __('پشتیبان'), get_role('author')->capabilities
);
$argc = array(
    'role' => 'administrator',
);
$all_admin = get_users($argc);
foreach ($all_admin as $admin) {
    if (user_can($admin->ID, 'supporter') !== true) {
        $user = get_user_by('ID', $admin->ID);
        $user->add_role('supporter');
    }
}

add_action('show_user_profile', 'tiva_extra_user_profile_fields');
add_action('edit_user_profile', 'tiva_extra_user_profile_fields');
function tiva_extra_user_profile_fields($user)
{
    if (user_can($user->ID, 'supporter')):
        ?>
        <h3><?php _e("ثبت اطلاعات واحد پشتیبان :", "blank"); ?></h3>
        <table class="form-table">
            <tr>
                <th><label for="job"><?php _e("نام واحد پشتیبان"); ?></label></th>
                <td>
                    <input type="text" name="unit_supporter" id="job" class="regular-text"
                           value="<?php echo esc_attr(get_the_author_meta('unit_supporter', $user->ID)); ?>"/><br/>
                </td>
            </tr>

        </table>
    <?php endif; ?>
    <?php
}

add_action('personal_options_update', 'tiva_user_register_user_dashboard');
add_action('edit_user_profile_update', 'tiva_user_register_user_dashboard');
function tiva_user_register_user_dashboard($user_id)
{
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    if (isset($_POST['unit_supporter'])) {
        update_user_meta($user_id, 'unit_supporter', $_POST['unit_supporter']);
    }
}

// end add supporter role and section name meta in tiva v5

// begin tiva user reply comment send email
add_action('comment_post', 'tiva_comment_notify_comment_post', 10, 1);
function tiva_comment_notify_comment_post($comment_ID)
{
    $comment = get_comment($comment_ID);
    if (intval($comment->comment_parent)) {
        $comment_parent = get_comment($comment->comment_parent);
        if ($comment_parent->user_id) {
            $comment_parent_user = new WP_User($comment_parent->user_id);


            $to = $comment_parent_user->user_email;
            $subject = get_bloginfo('name') . ' | پاسخ جدید برای دیدگاه شما  ';
            $message = tiva_comment_reply_email_template($comment_parent->comment_content, get_comment_link($comment_parent->comment_ID));
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "From: =?utf-8?b?" . base64_encode(get_bloginfo('name')) . "?= <" . get_bloginfo('admin_email') . ">\r\n";
            $headers .= "Content-Type: text/html;charset=utf-8\r\n";
            $headers .= "Reply-To " . get_bloginfo('admin_email') . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            wp_mail($to, $subject, $message, $headers);

        } else {
            $comment_parent_email = $comment_parent->comment_author_email;
//			var_dump($comment_parent_email);
            $to = $comment_parent_email;
            $subject = get_bloginfo('name') . ' | پاسخ جدید برای دیدگاه شما  ';
            $message = tiva_comment_reply_email_template($comment_parent->comment_content, get_comment_link($comment_parent->comment_ID));
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "From: =?utf-8?b?" . base64_encode(get_bloginfo('name')) . "?= <" . get_bloginfo('admin_email') . ">\r\n";
            $headers .= "Content-Type: text/html;charset=utf-8\r\n";
            $headers .= "Reply-To " . get_bloginfo('admin_email') . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            wp_mail($to, $subject, $message, $headers);
        }
    }
}

// end tiva user reply comment send email


// begin woocommerce checkout fields remove add in tiva v5
add_filter('woocommerce_checkout_fields', 'custom_remove_woo_checkout_fields');
function custom_remove_woo_checkout_fields($fields)
{

    // remove billing fields
//    unset($fields['billing']['billing_first_name']);
//    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_address_1']);
//    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
//    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);

//    unset($fields['billing']['billing_phone']);
//    unset($fields['billing']['billing_email']);

    // remove shipping fields
//    unset($fields['shipping']['shipping_first_name']);
//    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_company']);
//    unset($fields['shipping']['shipping_address_1']);
//    unset($fields['shipping']['shipping_address_2']);
//    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);
    return $fields;
}

// end woocommerce checkout fields remove add in tiva v5

// begin tiva robot ticket
function tiva_robot_system_reply_ticket_email_temp($userDispalyName, $operatorDispalyName, $dateTime)
{
    return
        '
    
<html lang="fa">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <style type="text/css">
          @import url("' . site_url() . '/blog/wp-content/themes/tiva/css/email-temp-fonts.css"); 

        *{
    font-family: IRANSans !important;
        }
</style>
    </head>
    <body>
    <table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%">
        <tbody>
        <tr>
            <td style="padding:0 20px" valign="top">
                <table style="border-collapse:collapse;border-radius:3px;color:#545454;border-bottom:1px solid #ddd;font-size:13px;line-height:20px;margin:0 auto;width:100%"
                       align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td valign="top">
                            <table style="border:none;border-collapse:separate;font-size:1px;height:50px;line-height:3px;width:100%"
                                   border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td style="background:#03a9f4;border-radius: 10px 10px 0 0;border:none;width:100%;font-weight:700;color:#fff;text-align:center;font-size:24px;height: 70px;" bgcolor="#fff">' . get_bloginfo('name') . '</td>
                                </tr>
                                </tbody>
                            </table>

                            <table style="border-collapse:collapse;border-color:#dddddd;border-radius:0 0 3px 3px;border-style:solid solid none;border-width:0 1px 1px;width:100%"
                                   border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td  style="background:white;border-radius:0 0 3px 3px;color:#242323;font-size:15px;line-height:22px;overflow:hidden;padding:20px 40px 30px"
                                        bgcolor="white">
                                        <div style="margin-top:0;padding:10px;text-align:right;font-family:shabnam">
                                            <p style="direction:rtl;font-size:13px;line-height:26px;text-align:right">
                                                <b style="font-size:14px"> سلام</b> ' . $operatorDispalyName . '
                                                <br>
 یک پاسخ جدید از طرف  ' . $userDispalyName . '  در تاریخ ' . tiva_change_number($dateTime) . ' برای شما ارسال شده است . لطفاً در اسرع وقت به تیکت مورد نظر پاسخ دهید. 
                                               <br>
                                               <br>

                                            </p>
                                            <p style="direction:rtl;font-size:13px;line-height:26px;text-align:center;">
نگران پشتیبانی نباشید، ما سعیمون بر اینه که همیشه در دسترس باشیم.
                                            </p>
                                            <br>
                                            <p style="text-align:center;direction:rtl;font-weight:bold;color: #525252">' . get_bloginfo('description') . '</p>
                                            <div style="width:100%;text-align:center;margin-top:40px;margin-bottom:10px">
                                                <a href="' . site_url() . '/admin-panel/tickets"
                                                    style="padding: 6px;
    border: 3px solid #03A9F4;
    border-radius: 3px;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    background-color: #03a9f4;"
                                                   target="_blank"
                                                   >
                                                   مشاهده تیکت و ارسال پاسخ جدید
                                                   </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    </body>
    </html> 

    ';
}

function tiva_ticket_robot()
{
    global $wpdb;
    $db_prefix = $wpdb->prefix;
    $tiva_tickets = $db_prefix . 'tiva_tickets';
    $result = $wpdb->get_results("SELECT * FROM {$tiva_tickets} where ticket_status=0 or ticket_status=1 or ticket_status=2 or ticket_status=3");
//	dd($result);
    foreach ($result as $print) {

        $ticket_update_at = new DateTime($print->ticket_update_at);
        $currentTime = new DateTime(date('Y-m-d H:i:s'));
        $diffNow = $ticket_update_at->diff($currentTime);
        if ($diffNow->days >= 7) {
            $ticket_reply_data = array(
                'ticket_reply_ticket_id' => $print->ticket_id,
                'ticket_reply_user_id' => 0,
                'ticket_reply_content' => 'باتوجه به عدم ثبت پاسخ جدید برای این تیکت، اتوماسیون سایت وضعیت تیکت را به بسته تغییر داده است.

برای باز کردن مجدد تیکت می توانید پاسخ جدیدی روی تیکت ارسال کنید.',
                'ticket_reply_create_at' => date('Y-m-d H:i:s'),
            );
            $wpdb->insert($db_prefix . 'tiva_ticket_replies', $ticket_reply_data, array(
                '%d',
                '%d',
                '%s',
                '%s',
            ));
            $ticket_reply_id = $wpdb->insert_id;
            if ($ticket_reply_id > 0) {
                // update ticket ...
                $updateResult = $wpdb->update(
                    $db_prefix . 'tiva_tickets',
                    array(
                        'ticket_update_at' => date('Y-m-d H:i:s'),    // string
                        'ticket_status' => 4    // integer (number)
                    ),
                    array('ticket_id' => $print->ticket_id),
                    array(
                        '%s',    // value1
                        '%d'    // value2
                    ),
                    array('%d')
                );
                if ($updateResult > 0) {
//				    send email for user
//					var_dump( $print->ticket_id );
                    $to = get_userdata(intval($print->ticket_user_id))->user_email;
                    $subject = get_bloginfo('name') . ' | پاسخ جدید برای شما ';

//				dd($to);
                    $message = tiva_robot_system_reply_ticket_email_temp($operatorDispalyName = 'اتوماسیون سایت', $userDispalyName = get_userdata($print->ticket_user_id)->display_name, $dateTime = jdate('d-m-Y H:i:s'));
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "From: =?utf-8?b?" . base64_encode(get_bloginfo('name')) . "?= <" . get_bloginfo('admin_email') . ">\r\n";
                    $headers .= "Content-Type: text/html;charset=utf-8\r\n";
                    $headers .= "Reply-To " . get_bloginfo('admin_email') . "\r\n";
                    $headers .= "X-Mailer: PHP/" . phpversion();
                    $mail = wp_mail($to, $subject, $message, $headers);
                }

            }
        }
    }
}

tiva_ticket_robot();
// end tiva robot ticket

// begin tiva get name post type
function tiva_get_post_type_name($post_id)
{
    switch (get_post_type($post_id)) {
        case 'post':
            return 'مقاله';
            break;
        case 'download':
            return 'مطلب دانلودی';
            break;
        case 'video':
            return 'ویدیو';
            break;
    }
}

// end tiva get name post type

// begin vip plan mount
function tiva_get_vip_plan_mount($type)
{
    $tiva_options = get_option('tiva_options');
    switch ($type) {

        case 'gold':
            if (isset($tiva_options['vip-register']['gold-plan-month'])) {
                if (intval($tiva_options['vip-register']['gold-plan-month']) < 12) {
                    return tiva_change_number($tiva_options['vip-register']['gold-plan-month']) . ' ماهه ';
                } else {
                    return tiva_change_number(1) . ' ساله ';
                }
            } else {
                return '';
            }
            break;
        case 'silver':
            if (isset($tiva_options['vip-register']['silver-plan-month'])) {
                if (intval($tiva_options['vip-register']['silver-plan-month']) < 12) {
                    return tiva_change_number($tiva_options['vip-register']['silver-plan-month']) . ' ماهه ';
                } else {
                    return tiva_change_number(1) . ' ساله ';
                }
            } else {
                return '';
            }
            break;
        case 'bronze':
            if (isset($tiva_options['vip-register']['bronze-plan-month'])) {
                if (intval($tiva_options['vip-register']['bronze-plan-month']) < 12) {
                    return tiva_change_number($tiva_options['vip-register']['bronze-plan-month']) . ' ماهه ';
                } else {
                    return tiva_change_number(1) . ' ساله ';
                }
            } else {
                return '';
            }
            break;
    }

}

// end vip plan mount

// begin vip plan price
function tiva_get_vip_plan_price($type)
{
    $tiva_options = get_option('tiva_options');
    switch ($type) {

        case 'gold':
            if (isset($tiva_options['vip-register']['gold-plan-price'])) {
                return $tiva_options['vip-register']['gold-plan-price'];
            } else {
                return '';
            }
            break;
        case 'silver':
            if (isset($tiva_options['vip-register']['silver-plan-price'])) {
                return $tiva_options['vip-register']['silver-plan-price'];
            } else {
                return '';
            }
            break;
        case 'bronze':
            if (isset($tiva_options['vip-register']['bronze-plan-price'])) {
                return $tiva_options['vip-register']['bronze-plan-price'];
            } else {
                return '';
            }
            break;
    }

}

// end vip plan price

// begin vip plan price
function tiva_get_vip_plan_gift_credit($type)
{
    $tiva_options = get_option('tiva_options');
    switch ($type) {

        case 'gold':
            if (isset($tiva_options['vip-register']['gold-plan-gift-credit'])) {
                return $tiva_options['vip-register']['gold-plan-gift-credit'];
            } else {
                return '';
            }
            break;
        case 'silver':
            if (isset($tiva_options['vip-register']['silver-plan-gift-credit'])) {
                return $tiva_options['vip-register']['silver-plan-gift-credit'];
            } else {
                return '';
            }
            break;
        case 'bronze':
            if (isset($tiva_options['vip-register']['bronze-plan-gift-credit'])) {
                return $tiva_options['vip-register']['bronze-plan-gift-credit'];
            } else {
                return '';
            }
            break;
    }

}

// end vip plan price

function tiva_get_vip_plan_name($type)
{
    switch ($type) {
        case 'gold':
            return 'طلایی';
            break;
        case 'silver':
            return 'نقره ای';
            break;
        case 'bronze':
            return 'برنزی';
            break;
    }
}

function tiva_get_vip_plan_mount_int($type)
{
    $tiva_options = get_option('tiva_options');
    switch ($type) {

        case 'gold':
            if (isset($tiva_options['vip-register']['gold-plan-month'])) {
                if (intval($tiva_options['vip-register']['gold-plan-month']) < 12) {
                    return $tiva_options['vip-register']['gold-plan-month'];
                } else {
                    return 12;
                }
            } else {
                return '';
            }
            break;
        case 'silver':
            if (isset($tiva_options['vip-register']['silver-plan-month'])) {
                if (intval($tiva_options['vip-register']['silver-plan-month']) < 12) {
                    return $tiva_options['vip-register']['silver-plan-month'];
                } else {
                    return 12;
                }
            } else {
                return '';
            }
            break;
        case 'bronze':
            if (isset($tiva_options['vip-register']['bronze-plan-month'])) {
                if (intval($tiva_options['vip-register']['bronze-plan-month']) < 12) {
                    return $tiva_options['vip-register']['bronze-plan-month'];
                } else {
                    return 12;
                }
            } else {
                return '';
            }
            break;
    }

}

// begin product archive pagetion add in tiva v5.5
if (!is_admin()) {
    add_action('pre_get_posts', 'tiva_set_per_page_product');
}
function tiva_set_per_page_product($query)
{
    global $wp_the_query;
    if ($query->is_post_type_archive('product') && ($query === $wp_the_query)) {
        $query->set('posts_per_page', 12);
    }
    return $query;
}

function tiva_modify_product_cat_query($query)
{
    // ADD IN TIVA V5.8.2
    // FIX BUG IN TIVA V5.8.2
    if (!is_admin() && $query->is_tax("product_cat") || $query->is_tax("product_tag") || $query->is_tax(get_query_var('taxonomy'))) {
        $query->set('posts_per_page', 12);
    }
}

add_action('pre_get_posts', 'tiva_modify_product_cat_query');

// ****************** END TIVA V5 FUNCTION *********************


// ****************** BEGIN TIVA V5.5 FUNCTION *******************
function tiva_remove_script_version($src)
{
    $parts = explode('?', $src);
    return $parts[0];
}

add_filter('script_loader_src', 'tiva_remove_script_version', 15, 1);
add_filter('style_loader_src', 'tiva_remove_script_version', 15, 1);

// BEGIN EDITED IN TIVA V5.5.2
function tiva_check_login($email, $password)
{
    $is_email = is_email($email);
    if ($is_email) {
        $user = wp_authenticate_email_password(null, $email, $password);
        if (is_wp_error($user)) {
            if (array_key_exists('invalid_email', $user->errors)) {
                return 'Eemail';
            } elseif (array_key_exists('incorrect_password', $user->errors)) {
                return 'Epass';
            }
        }
        return $user;
    } elseif (!$is_email) {
        $user = wp_authenticate_username_password(null, $email, $password);
        if (is_wp_error($user)) {
            if (array_key_exists('invalid_username', $user->errors)) {
                return 'Uusername';
            } elseif (array_key_exists('incorrect_password', $user->errors)) {
                return 'Upass';
            }
        }
        return $user;
    }
}

function tiva_user_login($post)
{
    global $login_result;


    if (isset($_POST['login_form'])) {

        $userEmail = strip_tags($_POST['userEmail']);// sanitize
        $userPassword = $_POST['userPassword'];

        if (empty($userEmail) || empty($userPassword)) {
            return '<div class=" alert-box alert-box-suc alert alert-danger"> <strong> خطا ! </strong><span class="msg-box">لطفا فرم را به صورت صحیح تکمیل کنید</span></div>';
        }

        $user = tiva_check_login($userEmail, $userPassword);
        if ($user === 'Eemail') {
            return '<div class=" alert-box alert-box-suc alert alert-danger"> <strong> خطا ! </strong><span class="msg-box">ایمیل نامعتبر می باشد</span></div>';
        } elseif ($user === 'Epass') {
            return '<div class=" alert-box alert-box-suc alert alert-danger"> <strong> خطا ! </strong><span class="msg-box">رمز عبور شما برای این ایمیل نامعتبر هست</span></div>';
        } elseif ($user === 'Uusername') {
            return '<div class=" alert-box alert-box-suc alert alert-danger"> <strong> خطا ! </strong><span class="msg-box">نام کاربری نامعتبر می باشد</span></div>';
        } elseif ($user === 'Upass') {
            return '<div class=" alert-box alert-box-suc alert alert-danger"> <strong> خطا ! </strong><span class="msg-box">رمز عبور شما برای این نام کاربری نامعتبر هست</span></div>';
        }

        if ($user == true) {
            $userLoginData = [
                'user_login' => $user->user_login,
                'user_password' => $userPassword
            ];
//            dd($userLoginData);
            if (get_user_meta($user->ID, 'karino_user_block', 'true') == 'true') {
                return '<div class=" alert-box alert-box-suc alert alert-danger"> <strong> خطا ! </strong><span class="msg-box">حساب کاربری شما بلاک شده است لطفا با مدیر سایت تماس بگیرید.</span></div>';
            }
            if (tiva_is_ssl() === false) {
                $login_result = wp_signon($userLoginData, false);
            } elseif (tiva_is_ssl() === true) {
                $login_result = wp_signon($userLoginData, true);
            }  // fixed ssl bug in tiva v3.1
            if (is_wp_error($login_result)) {
                return '<div class=" alert-box alert-box-suc alert alert-danger"> <strong> خطا ! </strong><span class="msg-box">خطایی در عملیات لاگین اتفاق افتاده است . بعدا امتحان کنید</span></div>';
            } else {
                wp_redirect(home_url());
            }
        }

    }
}

add_action('init', 'tiva_user_login');
// END EDITED IN TIVA V5.5.2

add_filter('login_redirect', 'tiva_login_redirect', 10);
function tiva_login_redirect()
{
    wp_redirect(home_url());
}

// ****************** END TIVA V5.5 FUNCTION *********************

// ****************** BEGIN TIVA V5.5.2 FUNCTION *********************
add_filter('jpeg_quality', function ($arg) {
    return 100;
});
add_filter('wp_editor_set_quality', function ($arg) {
    return 100;
});
// ****************** END TIVA V5.5.2 FUNCTION *********************

// ****************** BEGIN TIVA V5.8.2 FUNCTION ********************
add_action('user_register', 'tiva_registration_account_for_all_form_func', 10, 1);
function tiva_registration_account_for_all_form_func($user_id)
{

    $tiva_options = get_option('tiva_options');
    if ($tiva_options['send-msg-user']['send_msg_on'] == 'true') {
        global $wpdb;
        $date = new jDateTime(true, true, 'Asia/Tehran');
        $db_prefix = $wpdb->prefix;
        $tiva_msg_table = $db_prefix . 'tiva_msg';
        $tiva_user_msg_table = $db_prefix . 'tiva_user_msg_handel';
        $result = $wpdb->query("SELECT MAX(id) FROM {$db_prefix}tiva_msg GROUP BY id");
        $id = $result + 1;
        $code_g_u = $user_id;
        $status = 'u';
        $msg = $tiva_options['send-msg-user']['msg_text'];
        $msg_url_att = $tiva_options['send-msg-user']['msg_att'];
        $current_date = $date->date('Y-m-d', current_time('timestamp', 1));
        $current_time = $date->date('h:i:s', current_time('timestamp', 1));
        $subject = $tiva_options['send-msg-user']['msg_subject'];
        $admin_id = $tiva_options['send-msg-user']['msg_sender_admin'];
        $msg_data = array(
            'id' => $id,
            'code_g_u' => $code_g_u,
            'status' => $status,
            'msg' => $msg,
            'send_at_date' => $current_date,
            'send_at_time' => $current_time,
            'subject' => $subject,
            'admin_id' => $admin_id,
            'msg_att' => $msg_url_att
        );
        $result_insert = $wpdb->insert($tiva_msg_table, $msg_data, array('%d', '%d', '%s', '%s', '%s', '%s', '%s', '%d', '%s'));
        if ($result_insert == 1) {
            $msg_data_user = array(
                'id' => $id,
                'user_id' => $user_id,
                'read_msg' => 'n'
            );
            $wpdb->insert($tiva_user_msg_table, $msg_data_user);
        }
    }

}

// ****************** ADD TIVA V5.8.2 FUNCTION *********************

// **** BEGIN TIVA THEME INCLUDE ****
require_once 'inc/jdatetime.class.php'; // EDITED IN TIVA V5.8
include get_template_directory() . '/inc/tiva_info.php';
include get_template_directory() . '/inc/ajax.php';
include get_template_directory() . '/inc/user_info.php';
include get_template_directory() . '/inc/meta-box.php';
include get_template_directory() . '/inc/check-database.php';
include get_template_directory() . '/inc/Breadcrumbs.php';
include get_template_directory() . '/inc/shortcodes.php';
include get_template_directory() . '/inc/sidebar.php';
include get_template_directory() . '/inc/download-post-type.php';
include get_template_directory() . '/inc/video-post-type.php'; // add in tiva v4
include get_template_directory() . '/widget/new_post_query_widget.php';
include get_template_directory() . '/widget/must_views_download_query_in_mon_widget.php'; // add in tiva v4
include get_template_directory() . '/widget/must_views_query_in_mon_widget.php'; // add in tiva v4
include get_template_directory() . '/widget/must_views_download_and_post_query_in_mon_widget.php'; // add in tiva v4
include get_template_directory() . '/widget/hot_post_query_widget.php';
include get_template_directory() . '/widget/tiva_ads_widget.php'; // add in tiva v4
include get_template_directory() . '/widget/tiva_ads_script_widget.php'; // add in tiva v4
include get_template_directory() . '/widget/must_views_query_widget.php';
include get_template_directory() . '/widget/hot_download_query_widget.php';
include get_template_directory() . '/widget/woocommerce_cat_img_widget.php'; /// add tiva img woocommerce cat img widget at v3
include get_template_directory() . '/widget/must_views_download_query_widget.php';
include get_template_directory() . '/widget/new_download_query_widget.php';
include get_template_directory() . '/widget/img_cat_widget.php';
include get_template_directory() . '/widget/must_count_download_query_widget.php';
include get_template_directory() . '/widget/post_slider_widget.php';
include get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
include get_template_directory() . '/inc/user-waller-credit-system.php'; // add in tiva v5
include get_template_directory() . '/inc/email-template-generator.php'; // add in tiva v5
include get_template_directory() . '/admin/admin.php';
include get_template_directory() . '/editor_plugins/plugins.php';
include get_template_directory() . '/panel/panel.php';

/*******************************************************************************/
include get_template_directory() . '/inc/option-in-wp/style-add-in-dashbord.php';
include get_template_directory() . '/inc/option-in-wp/thaghire-name-wp.php';