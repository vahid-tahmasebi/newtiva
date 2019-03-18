<?php

// post filter action and function
add_action('wp_ajax_post_filter', 'tiva_post_filter_function');
add_action('wp_ajax_nopriv_post_filter', 'tiva_post_filter_function');
function tiva_post_filter_function()
{
    global $user_list;
    $users = get_users(array('fields' => array('ID')));
    foreach ($users as $user_id) {
        $user_list = get_user_meta($user_id->ID);
    }
//    print_r($user_list);
    $args = array(

        'post_type' => array('post', 'download'),
        'posts_per_page' => -1,
        'post_status' => 'publish',
        's' => '',
        'author' => $user_list

    );

//    var_dump($args);
    // for taxonomies / categories

    if (isset($_POST['category_filter'])) {

        if (isset($_POST['category_filter']) && $_POST['category_filter'] === 'all_post') {

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => 'ok'
                )
            );

            unset($args['tax_query']);

        } else

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $_POST['category_filter']
                )
            );
    }

    // for DESC and ASC filter in meta_key name select box
    if (isset($_POST['meta_key'])) {

        $test_filter = $_POST['meta_key'];
        $args ['orderby'] = 'date';
        $args['order'] = $test_filter;
    }

    // for top view post filters in  meta_key name select box
    if (isset($_POST['meta_key']) && $_POST['meta_key'] === 'filter_view') {

        $args['meta_key'] = 'views';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';

    }

    // for filter date in name date_filter select box
    if (isset($_POST['date_filter']) && $_POST['date_filter'] === 'year') {

        // year
        $args['date_query']['year'] = date('Y');

    }

    if (isset($_POST['date_filter']) && $_POST['date_filter'] === 'month') {

        // month
        $args['date_query']['year'] = date('Y');
        $args['date_query']['month'] = date('m');

    }

    if (isset($_POST['date_filter']) && $_POST['date_filter'] === 'week') {

        // month
        $args['date_query']['year'] = date('Y');
        $args['date_query']['week'] = date('W');

    }

    // for filter with post likes
    if (isset($_POST['meta_key']) && $_POST['meta_key'] === 'filter_like') {

        $args['meta_key'] = '_post_like_count';
//              $args['orderby'] = 'meta_value_num';
        $args['orderby'] = 'meta_value meta_value_num';
        $args['order'] = 'DESC';

        // filter post top view array code hear ...
    }

    // for filter with post comments count
    if (isset($_POST['meta_key']) && $_POST['meta_key'] === 'filter_comment') {

        $args['orderby'] = 'comment_count';
        $args['order'] = 'DESC';
    }

    // search with text char
    if (isset($_POST['text_search'])) {
        $args ['s'] = $_POST['text_search'];
    }


    $all_post = new WP_Query($args);

    if ($all_post->have_posts()) :
        while ($all_post->have_posts()): $all_post->the_post();
            ob_start(); // start buffering because we do not need to print the posts now
            ?>
            <?php get_template_part('template-parts/post-content'); ?>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <div class="no-post">
            <p><?php _e(' متاسفانه مقاله ای در این خصوص در سایت منتشر نشده است ):  ', 'tiva'); ?></p>
        </div>
    <?php endif; ?>


    <?php wp_die();
}

// post filter action and function
add_action('wp_ajax_h_post_filter', 'tiva_h_post_filter_function');
add_action('wp_ajax_nopriv_h_post_filter', 'tiva_h_post_filter_function');
function tiva_h_post_filter_function()
{
    global $user_list;
    $users = get_users(array('fields' => array('ID')));
    foreach ($users as $user_id) {
        $user_list = get_user_meta($user_id->ID);
    }
//    print_r($user_list);
    $args = array(

        'post_type' => array('post', 'download'),
        'posts_per_page' => -1,
        'post_status' => 'publish',
        's' => '',
        'author' => $user_list

    );

//    var_dump($args);
    // for taxonomies / categories

    if (isset($_POST['category_filter'])) {

        if (isset($_POST['category_filter']) && $_POST['category_filter'] === 'all_post') {

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => 'ok'
                )
            );

            unset($args['tax_query']);

        } else

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $_POST['category_filter']
                )
            );
    }

    // for DESC and ASC filter in meta_key name select box
    if (isset($_POST['meta_key'])) {

        $test_filter = $_POST['meta_key'];
        $args ['orderby'] = 'date';
        $args['order'] = $test_filter;
    }

    // for top view post filters in  meta_key name select box
    if (isset($_POST['meta_key']) && $_POST['meta_key'] === 'filter_view') {

        $args['meta_key'] = 'views';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';

    }

    // for filter date in name date_filter select box
    if (isset($_POST['date_filter']) && $_POST['date_filter'] === 'year') {

        // year
        $args['date_query']['year'] = date('Y');

    }

    if (isset($_POST['date_filter']) && $_POST['date_filter'] === 'month') {

        // month
        $args['date_query']['year'] = date('Y');
        $args['date_query']['month'] = date('m');

    }

    if (isset($_POST['date_filter']) && $_POST['date_filter'] === 'week') {

        // month
        $args['date_query']['year'] = date('Y');
        $args['date_query']['week'] = date('W');

    }

    // for filter with post likes
    if (isset($_POST['meta_key']) && $_POST['meta_key'] === 'filter_like') {

        $args['meta_key'] = '_post_like_count';
//              $args['orderby'] = 'meta_value_num';
        $args['orderby'] = 'meta_value meta_value_num';
        $args['order'] = 'DESC';

        // filter post top view array code hear ...
    }

    // for filter with post comments count
    if (isset($_POST['meta_key']) && $_POST['meta_key'] === 'filter_comment') {

        $args['orderby'] = 'comment_count';
        $args['order'] = 'DESC';
    }

    // search with text char
    if (isset($_POST['text_search'])) {
        $args ['s'] = $_POST['text_search'];
    }


    $all_post = new WP_Query($args);

    if ($all_post->have_posts()) :
        while ($all_post->have_posts()): $all_post->the_post();
            ob_start(); // start buffering because we do not need to print the posts now
            ?>
            <?php get_template_part('template-parts/post-content'); ?>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <div class="no-post">
            <p><?php _e(' متاسفانه مقاله ای در این خصوص در سایت منتشر نشده است ):  ', 'tiva'); ?></p>
        </div>
    <?php endif; ?>


    <?php wp_die();
}

//  author post filter action and function
add_action('wp_ajax_author_post_filter', 'tiva_author_post_filter_function');
add_action('wp_ajax_nopriv_author_post_filter', 'tiva_author_post_filter_function');
function tiva_author_post_filter_function()
{

    $args = array(

        'post_type' => array('post', 'download'),
        'posts_per_page' => -1,
        'post_status' => 'publish',
        's' => '',
        'author' => $_POST['author-id']
    );

//    var_dump($args);
    // for taxonomies / categories

    if (isset($_POST['category_filter'])) {

        if (isset($_POST['category_filter']) && $_POST['category_filter'] === 'all_post') {

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => 'ok'
                )
            );

            unset($args['tax_query']);

        } else

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $_POST['category_filter']
                )
            );
    }

    // for DESC and ASC filter in meta_key name select box
    if (isset($_POST['meta_key'])) {

        $test_filter = $_POST['meta_key'];
        $args ['orderby'] = 'date';
        $args['order'] = $test_filter;
    }

    // for top view post filters in  meta_key name select box
    if (isset($_POST['meta_key']) && $_POST['meta_key'] === 'filter_view') {

        $args['meta_key'] = 'views';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';

    }

    // for filter date in name date_filter select box
    if (isset($_POST['date_filter']) && $_POST['date_filter'] === 'year') {

        // year
        $args['date_query']['year'] = date('Y');

    }

    if (isset($_POST['date_filter']) && $_POST['date_filter'] === 'month') {

        // month
        $args['date_query']['year'] = date('Y');
        $args['date_query']['month'] = date('m');

    }

    if (isset($_POST['date_filter']) && $_POST['date_filter'] === 'week') {

        // month
        $args['date_query']['year'] = date('Y');
        $args['date_query']['week'] = date('W');

    }

    // for filter with post likes
    if (isset($_POST['meta_key']) && $_POST['meta_key'] === 'filter_like') {

        $args['meta_key'] = '_post_like_count';
//              $args['orderby'] = 'meta_value_num';
        $args['orderby'] = 'meta_value meta_value_num';
        $args['order'] = 'DESC';

        // filter post top view array code hear ...
    }

    // for filter with post comments count
    if (isset($_POST['meta_key']) && $_POST['meta_key'] === 'filter_comment') {

        $args['orderby'] = 'comment_count';
        $args['order'] = 'DESC';
    }

    // search with text char
    if (isset($_POST['text_search'])) {
        $args ['s'] = $_POST['text_search'];
    }


    $all_post = new WP_Query($args);

    if ($all_post->have_posts()) :
        while ($all_post->have_posts()): $all_post->the_post();
            ob_start(); // start buffering because we do not need to print the posts now
            ?>
            <?php get_template_part('template-parts/post-content'); ?>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <div class="no-post">
            <p><?php _e(' متاسفانه مقاله ای در این خصوص در سایت منتشر نشده است ):  ', 'tiva'); ?></p>
        </div>
    <?php endif; ?>

    <?php wp_die();
}

// tiva reset password ajax
add_action('wp_ajax_nopriv_tiva_user_pass_rest', 'tiva_user_pass_rest');
function tiva_user_pass_rest()
{

//    sleep(2);

    $error = '';
    $success = '';

    // check if we're in reset form
//    if (isset($_POST['action']) && 'reset' == $_POST['action']) {

    $email = trim($_POST['user_email']);


    if (empty($email)) {
        $error = 'لطفا ایمیل خود را وارد کنید';
    } else if (!is_email($email)) {
        $error = 'آدرس ایمیل معتبر نیست';
    } else if (!email_exists($email)) {
        $error = 'کاربری با این ایمیل در سایت ثبت نشده است';
    } else {

        $random_password = wp_generate_password(24, true);
        $user = get_user_by('email', $email);

        $update_user = wp_update_user(array(
                'ID' => $user->ID,
                'user_pass' => $random_password
            )
        );

        // if  update user return true then lets send user an email containing the new password
        if ($update_user) {

            $to = $email;
            $subject = get_bloginfo('name') . ' |  رمز عبور جدید شما ';

            $message = tiva_user_recovery_pass_email_template($random_password);
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "From: =?utf-8?b?" . base64_encode(get_bloginfo('name')) . "?= <" . get_bloginfo('admin_email') . ">\r\n";
            $headers .= "Content-Type: text/html;charset=utf-8\r\n";
            $headers .= "Reply-To " . get_bloginfo('admin_email') . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            $mail = wp_mail($to, $subject, $message, $headers);

            if ($mail)
                $success = 'رمز عبور جدید ارسال شد لطفا ایمیل خود را چک کنید';

        } else {
            $error = 'اوو ! مشکلی در بروزرسانی حساب شما به وجود امده است';
        }

    }

    if (!empty($error))
        wp_send_json(
            array(
                'error' => $error
            )
        );

    if (!empty($success))
        wp_send_json(
            array(
                'success' => $success
            )
        );
}


// tiva register page ajax request
add_action('wp_ajax_tiva_user_register', 'tiva_user_register');
add_action('wp_ajax_nopriv_tiva_user_register', 'tiva_user_register');
function tiva_user_register()
{


    $has_error = false;
    $has_success = false;
    $message = [];
//    $redirect_url = home_url() . '/login-user';
    check_ajax_referer('login-ajax', '_nonce', true);

    $userName = sanitize_text_field($_POST['username']);
    $email = sanitize_text_field($_POST['user_email']);
    $password = sanitize_text_field($_POST['password']);
    $password_confirmation = sanitize_text_field($_POST['password_confirmation']);
    $mobile = sanitize_text_field($_POST['tel']);
    $name = sanitize_text_field($_POST['name']);
    $family = sanitize_text_field($_POST['family']);
    $web_site = sanitize_text_field($_POST['webSite']);

//    dd($_POST);

    if (empty($userName) || empty($email) || empty($password) || empty($password_confirmation)) {

        $has_error = true;
        $message[] = "لطفا تمامی فیلد ها رو تکمیل نمایید";

    }
    if (username_exists($userName)) {
        $has_error = true;
        $message[] = "نام کاربری انتخاب شده در دسترس نمی باشد";

    }
    if (email_exists($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $has_error = true;
        $message[] = "ایمیل وارد شده در دسترس نمی باشد";

    }

    if (strlen($password) < 8) {
        $has_error = true;
        $message[] = "رمز عبور انتخابی باید حداقل ۸ کارکتر باشد";
    } else if (!preg_match("#[0-9]+#", $password)) {
        $has_error = true;
        $message[] = "رمز عبور باید حداقل دارای یک عدد باشد";
    } else if (!preg_match("#[a-zA-Z]+#", $password)) {
        $has_error = true;
        $message[] = "رمز عبور باید حداقل دارای یک حرف باشد";
    } else if ($password != $password_confirmation) {
        $has_error = true;
        $message[] = "کلمات عبور با هم دیگر تطبیق ندارند";

    }

    if (!$has_error) {
        $newUserData = array(
            'user_login' => $userName,
            'user_email' => $email,
            'user_pass' => $password,
            'first_name' => $name,
            'last_name' => $family,
            'role' => 'author',
            'user_url' => $web_site,
        );
        $newUserID = wp_insert_user($newUserData);
        if (is_wp_error($newUserID)) {
            $has_error = true;
            $message[] = "در ثبت نام شما خطایی رخ داده است لطفا بعدا امتحان کنید";

        } else {
            update_user_meta($newUserID, 'tiva_user_mobile', $mobile);
            $has_success = true;
            $message[] = "ثبت نام شما با موفقیت انجام شد ، شما می توانید وارد سایت شوید";
        }
    }
//    }
    $result = array(
        'error' => $has_error,
        'success' => $has_success,
        'message' => $message,
//        'redirect_url' => $redirect_url

    );
    wp_send_json($result);
}


// tiva file download counter ajax request
add_action('wp_ajax_sl_download_file_counter', 'sl_download_file_counter');
add_action('wp_ajax_nopriv_sl_download_file_counter', 'sl_download_file_counter');
function sl_download_file_counter()
{
    intval($_POST['pid']) || wp_die('no access');
    $post_id = $_POST['pid'];
    $count = set_post_download_count($post_id);
    wp_die("$count");

}

// the tiva live ajax search index page function
/********************************* BEGIN EDITED IN TIVA V5.8  ****************************/
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch()
{


    $keyword = esc_attr($_POST['keyword']);
    $arg = array(
        'post_type' => array('post', 'download', 'video', 'product'),
        'posts_per_page' => -1,
        'post_status' => 'publish',
        's' => trim($keyword),
        'order' => 'ASC',
    );
    $the_query = new WP_Query($arg);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()): $the_query->the_post(); ?>
            <div class="widget-post">
                <a style="text-decoration: none ; color: black" href="<?php the_permalink(get_the_ID()); ?>">
                    <div class="widget-post-inner">
                        <div class="widget-post-img"><img width="60" height="60"
                                                          src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                                                          class="widget-post-tum wp-post-image"
                                                          alt="<?php the_title(); ?>"></div>
                        <div class="widget-post-details">
                            <h3 class="widget-post-title"><?php the_title(); ?></h3>
                            <?php if (get_post_type(get_the_ID()) !== 'product'): ?>
                            <span class="widget-post-date">
                                <i class="fa fa-calendar" aria-hidden="true"
                                   style="margin-left: 3px"></i><?php echo get_the_date() ?></span>
                            <span class="widget-post-aut">
                                <i class="fa fa-user" aria-hidden="true"
                                   style="margin-left: 3px"></i><?php echo get_the_author(); ?>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    endif;
    die();
}

/********************************* END EDITED IN TIVA V5.8 ******************************/

include get_template_directory() . '/inc/comment-like-handel.php';
include get_template_directory() . '/inc/post-like-handel.php';
include get_template_directory() . '/inc/user-post-favorite-handel.php';




