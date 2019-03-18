<?php

add_action('init', 'tiva_theme_setup_user_reset_password_url');
add_filter('query_vars', 'tiva_theme_add_query_vars');
add_action('parse_request', 'tiva_theme_check_request');

function tiva_theme_setup_user_reset_password_url()
{
    add_rewrite_rule('reset-password', 'index.php?reset-password', 'top');
    add_rewrite_rule('verify-payment', 'index.php?verify-payment', 'top'); // add in tiva v5
    add_rewrite_rule('plan', 'index.php?plan', 'top'); // add in tiva v4
    add_rewrite_rule('login-user', 'index.php?login-user', 'top');
    add_rewrite_rule('register-user', 'index.php?register-user', 'top');
    add_rewrite_rule('user-panel/?([a-z_-]+)?', 'index.php?user-panel=$matches[1]', 'top');
    add_rewrite_rule('admin-panel/?([a-z_-]+)?', 'index.php?admin-panel=$matches[1]', 'top');
    flush_rewrite_rules();
}

function tiva_theme_add_query_vars($vars)
{
    $vars[] = 'reset-password';
    $vars[] = 'verify-payment';
    $vars[] = 'login-user';
    $vars[] = 'register-user';
    $vars[] = 'user-panel';
    $vars[] = 'admin-panel';
    $vars[] = 'plan'; // add in tiva v4
    return $vars;

}

function tiva_theme_check_request($query)
{
//    dd($query);
    if (isset($query->query_vars['reset-password'])) {
        include SL_THEME_USER_PANEL_VIEWS . '/public/rest-password.php';
        exit();
    }
    // add in tiva v5
    if (isset($query->query_vars['verify-payment'])) {
        include SL_THEME_USER_PANEL_VIEWS . '/public/verify-payment.php';
        exit();
    } elseif (isset($query->query_vars['login-user'])) {

        include SL_THEME_USER_PANEL_VIEWS . '/public/login-user.php';
        exit();
    } elseif (isset($query->query_vars['register-user'])) {
        include SL_THEME_USER_PANEL_VIEWS . '/public/register-user.php';
        exit();
    } elseif (isset($query->query_vars['plan'])) {
        include SL_THEME_USER_PANEL_VIEWS . '/public/plan.php';
        exit();
    } elseif (isset($query->query_vars['user-panel'])) {
        if (!is_user_logged_in()) {
            wp_redirect('/');
            exit();
        }
        $GLOBALS['current_panel'] = $query->query_vars['user-panel'];
        include SL_THEME_USER_PANEL_VIEWS . '/user/user-panel.php';
        exit();

    } elseif (isset($query->query_vars['admin-panel'])) {
        if (!is_user_logged_in() || !current_user_can('administrator')) {
            wp_redirect('/');
        }
        $GLOBALS['current_panel_admin'] = $query->query_vars['admin-panel'];
//        dd($query->query_vars['admin-panel']);
        include SL_THEME_USER_PANEL_VIEWS . '/admin/admin-panel.php';
        exit();
    }
}

function tiva_get_panels_white_list()
{
    return array(
        'dashboard',
        'comments-approve',
        'comments-hold',
        'user-comments-trash',
        'admin-comments-trash',
        'favorite-posts',
        'tickets',
        'send-ticket',
        'send-post',
        'posts',
        'posts-hold',
        'edit-account',
        'favorite-download',
        'all-msg-received',
        'single-show-msg',
        'favorite-video',// add in tiva v4
        'admin-wallet-report',// add in tiva v5
        'admin-pay-report', // add in tiva v5
        'show-ticket',// add in tiva v5


        // admin panel
        'admin-dashboard',
        'show-author-users',
        'show-admin-users',
        'show-blocked-user',
        'send-msg',
        'all-msg-sender',
        'single-show-msg',
        'all-msg-sender-admin',
        'create-user-group',
        'user-group-list',
        'show_users_group', // ok
        'show_users_group_view',
        'show-deactive-users', // add in tiva v3.1
        'wallet-transaction', // add in tiva v5
        'wallet-charge', // add in tiva v5
        'wallet-bank-transaction',  // add in tiva v5
        'plan-bank-transaction',  // add in tiva v5
        'admin-wallet-report', // add in tiva v5
        'admin-pay-report', // add in tiva v5
        'supporter-tickets', // add in tiva v5
        'supporter-show-ticket', // add in tiva v5

        // user store profile add in tiva v5
        'billing-address',
        'shipping-address',
        'orders',
        'downloads',
        'view-order',
        'order-tracking',
        'vip-plan',
        'buy-plan',
        /********************************* BEGIN ADD IN TIVA V5.8  ****************************/
        'user-wallet-handel',
        'edit-user-wallet',
        'user-vip-handel',
        'update-vip-user'
        /********************************* END ADD IN TIVA V5.8 ******************************/
    );
}

//dd(get_user_meta(1,'billing_postcode',true));