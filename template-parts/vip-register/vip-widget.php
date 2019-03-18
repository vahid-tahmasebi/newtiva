<?php
global $post_id;
if (!empty(get_post_meta($post_id, 'tiva_vip_post', true))): ?>
    <?php if (get_user_meta(get_current_user_id(), 'is_user_vip', true )!== 'true'): ?>
        <div class="vip-register-widget-wrapper">
            <div class="vip-register-widget-inner">
                <header class="header-section">
                    <h2>مخصوص کاربران ویژه</h2>
                    <span><i class="fa fa-diamond" aria-hidden="true"></i></span>
                </header>
                <a href="<?php echo(is_user_logged_in())? site_url().'/user-panel/vip-plan' : '#' ?>" class="vip-logo" <?php echo tiva_get_modal_user_login(); ?>></a>
                <p class="vip-register-dis">
                    کاربر عزیز توجه داشته باشید این  <?php echo tiva_get_post_type_name($post_id)?> مخصوص کاربران ویژه می باشد.
                </p>
                <a href="<?php echo(is_user_logged_in())? site_url().'/user-panel/vip-plan' : site_url().'/login-user' ?>"  class="vip-register-link">
                    جهت عضویت ویژه کلیک کنید
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php endif ?>
