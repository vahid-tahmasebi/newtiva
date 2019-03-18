<?php
function tiva_theme_options_panel()
{
    global $theme_panel_option_page;
    $theme_panel_option_page = add_menu_page('پنل تنظیمات سایت', 'پنل تنظیمات سایت', 'manage_options', 'tiva-theme-options', 'tiva_theme_option_panel_function', 'dashicons-welcome-widgets-menus');
}

add_action('admin_menu', 'tiva_theme_options_panel');
function tiva_theme_option_panel_function()
{
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
                <h2>پنل تنظیمات سایت کارسازشو</h2></div>';
    $withe_list = array(
        'index-page',
        'author-page',
        'single-page',
        'comment-like',
        'post-like',
        'main-slider',
        'login-register-page',
        'ads-setting',
        'social-network',
        'seo-page',
        'script',
        'install-license',
        'send-user-msg',
        'noti-bar-sitting',
        'store-index-page', // begin store option panel
        'store-main-slider',
        'zarinpal',
        'vip-register'
    );
    $tiva_options = get_option('tiva_options');
//    var_dump($_POST);
//    var_dump($tiva_options['store-index-page']);
    $default_tab = isset($_GET['tab']) && in_array($_GET['tab'], $withe_list) ? $_GET['tab'] : 'index-page';
    if (isset($_POST['op-panel-submit'])) {
        switch ($default_tab) {
            case 'index-page':
                $tiva_options['index-page']['tiva_copy_right_op'] = sanitize_text_field($_POST['tiva_copy_right_op']);
                $tiva_options['index-page']['index_search_show'] = $_POST['index_search_show'];
                $tiva_options['index-page']['show_site_logo'] = $_POST['show_site_logo'];
                $tiva_options['index-page']['site-logo'] = $_POST['site-logo'];
                // add in tiva v4
                $tiva_options['index-page']['index_videobox_show'] = $_POST['index_videobox_show'];
//                $tiva_options['index-page']['fl1_script'] = base64_encode(esc_html($_POST['fl1_script']));
                $tiva_options['index-page']['fl1_script'] = base64_encode(str_replace('\\', '', $_POST['fl1_script']));
                $tiva_options['index-page']['fl2_script'] = base64_encode(str_replace('\\', '', $_POST['fl2_script']));
                $tiva_options['index-page']['footer_about'] = $_POST['footer_about'];
                $tiva_options['index-page']['qrcode'] = $_POST['qrcode'];
//                ADD IN TIVA V5.5.2
                $tiva_options['index-page']['vip_plan'] = $_POST['vip_plan'];

                // ADD IN TIVA V8.5
                $tiva_options['index-page']['video_show_count'] = $_POST['video_show_count'];
                $tiva_options['index-page']['qrcode_show'] = $_POST['qrcode_show'];
                $tiva_options['index-page']['our_plans'] = nl2br($_POST['our_plans']);
                $tiva_options['index-page']['show_nemad_logo'] = $_POST['show_nemad_logo'];
                break;
            case 'author-page':
                $tiva_options['author-page']['author_search_show'] = $_POST['author_search_show'];
                $tiva_options['author-page']['author_box_bio_show'] = $_POST['author_box_bio_show'];
                $tiva_options['author-page']['author_box_info_show'] = $_POST['author_box_info_show'];
                break;
            case 'social-network':
//                dd($_POST);
                $tiva_options['social-network']['telegram-url'] = sanitize_text_field($_POST['telegram-url']);
                $tiva_options['social-network']['telegram-show'] = $_POST['telegram-show'];
                $tiva_options['social-network']['inst-url'] = sanitize_text_field($_POST['inst-url']);
                $tiva_options['social-network']['instagram-show'] = $_POST['instagram-show'];
                $tiva_options['social-network']['linkedin-url'] = sanitize_text_field($_POST['linkedin-url']);
                $tiva_options['social-network']['linkedin-show'] = $_POST['linkedin-show'];
                $tiva_options['social-network']['facebook-url'] = sanitize_text_field($_POST['facebook-url']);
                $tiva_options['social-network']['facebook-show'] = $_POST['facebook-show'];
                $tiva_options['social-network']['twitter-url'] = sanitize_text_field($_POST['twitter-url']);
                $tiva_options['social-network']['twitter-show'] = $_POST['twitter-show'];
                $tiva_options['social-network']['google-plus-url'] = sanitize_text_field($_POST['google-plus-url']);
                $tiva_options['social-network']['google-plus-show'] = $_POST['google-plus-show'];
                /********************************* BEGIN ADD IN  ***************************/
                $tiva_options['social-network']['whatsapp-url'] = sanitize_text_field($_POST['whatsapp-url']);
                $tiva_options['social-network']['whatsapp-show'] = $_POST['whatsapp-show'];

                $tiva_options['social-network']['aparat-url'] = sanitize_text_field($_POST['aparat-url']);
                $tiva_options['social-network']['aparat-show'] = $_POST['aparat-show'];
                /********************************* END ADD IN  ******************************/
                break;
            case 'post-like':
                $tiva_options['post-like']['post_like_show'] = $_POST['post_like_show'];
                break;
            case 'comment-like':
                $tiva_options['comment-like']['comment_like_show'] = $_POST['comment_like_show'];
                break;
            case 'single-page':
                $tiva_options['single-page']['post_chanel-box-tel_show'] = $_POST['post_chanel-box-tel_show'];
                $tiva_options['single-page']['tel-box-title'] = $_POST['tel-box-title'];
                $tiva_options['single-page']['tel-box-btn-caption'] = $_POST['tel-box-btn-caption'];
                $tiva_options['single-page']['tel-box-link'] = $_POST['tel-box-link'];
                $tiva_options['single-page']['post_related_show'] = $_POST['post_related_show'];
                $tiva_options['single-page']['related-post-count'] = $_POST['related-post-count'];
                $tiva_options['single-page']['share_btn_show'] = $_POST['share_btn_show'];

                /********************************* BEGIN EDITED IN   ****************************/
                $tiva_options['single-page']['rrs_show'] = $_POST['rrs_show'];

                /********************************* END EDITED IN  ******************************/

                break;
            case 'main-slider':
                // begin seven host slide option
                // slide 1
                $tiva_options['main-slider']['shSlide1_img'] = $_POST['shSlide1_img'];
                $tiva_options['main-slider']['shSlide1_url'] = $_POST['shSlide1_url'];
                $tiva_options['main-slider']['shSlide1_alt'] = $_POST['shSlide1_alt'];
                // slide 2
                $tiva_options['main-slider']['shSlide2_img'] = $_POST['shSlide2_img'];
                $tiva_options['main-slider']['shSlide2_url'] = $_POST['shSlide2_url'];
                $tiva_options['main-slider']['shSlide2_alt'] = $_POST['shSlide2_alt'];
                // slide 3
                $tiva_options['main-slider']['shSlide3_img'] = $_POST['shSlide3_img'];
                $tiva_options['main-slider']['shSlide3_url'] = $_POST['shSlide3_url'];
                $tiva_options['main-slider']['shSlide3_alt'] = $_POST['shSlide3_alt'];

                // end seven host slide option
                break;
            case 'login-register-page': // add in tiva v3
                $tiva_options['login-register-page']['register-page-text'] = $_POST['register-page-text'];
                $tiva_options['login-register-page']['login-page-text'] = $_POST['login-page-text'];
                $tiva_options['login-register-page']['reset-page-text'] = $_POST['reset-page-text'];
                $tiva_options['login-register-page']['loginpage-term-link'] = $_POST['loginpage-term-link'];

                break;
            case 'seo-page':
                $tiva_options['seo-page']['keyword-seo'] = $_POST['keyword-seo'];
                $tiva_options['seo-page']['description-seo'] = $_POST['description-seo'];
                $tiva_options['seo-page']['tiva-favicon'] = $_POST['tiva-favicon'];
                break;
            case 'script':
                $tiva_options['tiva-script']['header-script'] = $_POST['header-script'];
                $tiva_options['tiva-script']['footer-script'] = wp_normalize_path($_POST['footer-script']);
                break;
            case 'send-user-msg':
                $tiva_options['send-msg-user']['send_msg_on'] = $_POST['send_msg_on_or_off'];
                $tiva_options['send-msg-user']['msg_subject'] = $_POST['msg_subject'];
                $tiva_options['send-msg-user']['msg_sender_admin'] = $_POST['msg_sender_admin'];
                $tiva_options['send-msg-user']['msg_text'] = $_POST['msg_text'];
                $tiva_options['send-msg-user']['msg_att'] = $_POST['msg_att'];
                break;
            case 'noti-bar-sitting':
                $tiva_options['noti-bar-sitting']['noti-text'] = $_POST['noti-text'];
                $tiva_options['noti-bar-sitting']['noti-disable'] = $_POST['noti-disable'];
                $tiva_options['noti-bar-sitting']['noti-btn-text'] = $_POST['noti-btn-text'];
                $tiva_options['noti-bar-sitting']['noti-wrapper-color'] = $_POST['noti-wrapper-color'];
                $tiva_options['noti-bar-sitting']['noti-btn-color'] = $_POST['noti-btn-color'];
                $tiva_options['noti-bar-sitting']['noti-btn-link'] = $_POST['noti-btn-link'];
                $tiva_options['noti-bar-sitting']['noti-background'] = $_POST['noti-background'];
                break;
            case 'store-index-page':
                $tiva_options['store-index-page']['noti-banner-disable'] = $_POST['noti-banner-disable'];
                $tiva_options['store-index-page']['noti-banner-img'] = $_POST['noti-banner-img'];
                $tiva_options['store-index-page']['noti-banner-cat'] = $_POST['noti-banner-cat'];
                $tiva_options['store-index-page']['shipping-express-page'] = $_POST['shipping-express-page']; // begin store service section
                $tiva_options['store-index-page']['day-guarantee-page'] = $_POST['day-guarantee-page'];
                $tiva_options['store-index-page']['cod-page'] = $_POST['cod-page'];
                $tiva_options['store-index-page']['best-price'] = $_POST['best-price'];
                $tiva_options['store-index-page']['certificate'] = $_POST['certificate'];
                $tiva_options['store-index-page']['box-cat-1'] = $_POST['box-cat-1']; // begin store box category option
                $tiva_options['store-index-page']['box-cat-2'] = $_POST['box-cat-2'];
                $tiva_options['store-index-page']['box-cat-3'] = $_POST['box-cat-3'];

                $tiva_options['store-index-page']['layer1-cat'] = $_POST['layer1-cat'];  // begin store layer cat and pic
                $tiva_options['store-index-page']['layer1-cat-img'] = $_POST['layer1-cat-img'];

                $tiva_options['store-index-page']['layer2-cat'] = $_POST['layer2-cat'];
                $tiva_options['store-index-page']['layer2-cat-img'] = $_POST['layer2-cat-img'];

                $tiva_options['store-index-page']['layer3-cat'] = $_POST['layer3-cat'];
                $tiva_options['store-index-page']['layer3-cat-img'] = $_POST['layer3-cat-img'];

                $tiva_options['store-index-page']['layer4-cat'] = $_POST['layer4-cat'];
                $tiva_options['store-index-page']['layer4-cat-img'] = $_POST['layer4-cat-img'];

                $tiva_options['store-index-page']['layer5-cat'] = $_POST['layer5-cat'];
                $tiva_options['store-index-page']['layer5-cat-img'] = $_POST['layer5-cat-img'];

                $tiva_options['store-index-page']['layer6-cat'] = $_POST['layer6-cat'];
                $tiva_options['store-index-page']['layer6-cat-img'] = $_POST['layer6-cat-img'];

                $tiva_options['store-index-page']['layer7-cat'] = $_POST['layer7-cat'];
                $tiva_options['store-index-page']['layer7-cat-img'] = $_POST['layer7-cat-img'];


                // add in tiva v4
                $tiva_options['store-index-page']['store-service-disable'] = $_POST['store-service-disable'];


                break;
            case 'store-main-slider':
                // begin store slider slide option
                // slide 1
                $tiva_options['store-main-slider']['shSlide1_img'] = $_POST['shSlide1_img'];
                $tiva_options['store-main-slider']['shSlide1_url'] = $_POST['shSlide1_url'];
                $tiva_options['store-main-slider']['shSlide1_alt'] = $_POST['shSlide1_alt'];
                // slide 2
                $tiva_options['store-main-slider']['shSlide2_img'] = $_POST['shSlide2_img'];
                $tiva_options['store-main-slider']['shSlide2_url'] = $_POST['shSlide2_url'];
                $tiva_options['store-main-slider']['shSlide2_alt'] = $_POST['shSlide2_alt'];
                // slide 3
                $tiva_options['store-main-slider']['shSlide3_img'] = $_POST['shSlide3_img'];
                $tiva_options['store-main-slider']['shSlide3_url'] = $_POST['shSlide3_url'];
                $tiva_options['store-main-slider']['shSlide3_alt'] = $_POST['shSlide3_alt'];

                // end store slider slide option
                break;
            // add in tiva v4
            case 'ads-setting':
                $tiva_options['ads_setting']['custom_banner_url'] = $_POST['custom_banner_url'];
                $tiva_options['ads_setting']['custom_banner_link'] = $_POST['custom_banner_link'];
                $tiva_options['ads_setting']['custom_banner_alt'] = $_POST['custom_banner_alt'];

                $tiva_options['ads_setting']['custom_banner_script'] = base64_encode(str_replace('\\', '', $_POST['custom_banner_script']));
                break;
            // add in tiva v5
            case 'vip-register':
                // begin gold plan option save
                $tiva_options['vip-register']['gold-plan-month'] = $_POST['gold_plan_month'];
                $tiva_options['vip-register']['gold-plan-price'] = $_POST['gold_plan_price'];
                $tiva_options['vip-register']['gold-plan-gift-credit'] = $_POST['gold-plan-gift-credit'];
                // begin gold plan option save

                // begin silver plan option save
                $tiva_options['vip-register']['silver-plan-month'] = $_POST['silver_plan_month'];
                $tiva_options['vip-register']['silver-plan-price'] = $_POST['silver_plan_price'];
                $tiva_options['vip-register']['silver-plan-gift-credit'] = $_POST['silver-plan-gift-credit'];
                // begin silver plan option save

                // begin bronze plan option save
                $tiva_options['vip-register']['bronze-plan-month'] = $_POST['bronze_plan_month'];
                $tiva_options['vip-register']['bronze-plan-price'] = $_POST['bronze_plan_price'];
                $tiva_options['vip-register']['bronze-plan-gift-credit'] = $_POST['bronze-plan-gift-credit'];
                // begin bronze plan option save

                $tiva_options['vip-register']['vip-register-term'] = $_POST['vip_register_term'];

                break;
            case 'zarinpal':
                $tiva_options['zarinpal']['merchant_code'] = $_POST['merchant_code'];
                break;

        }
        update_option('tiva_options', $tiva_options);

    }
    include get_template_directory() . '/template-parts/admin/theme-option-panel.php';
}
