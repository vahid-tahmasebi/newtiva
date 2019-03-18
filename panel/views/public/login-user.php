<?php get_header(); ?>
<div class="logino">
    <div class="container login-wrapper v3-login-user">
        <div class="login-user">
            <div class="form-title-inner">
                <?php echo get_tiva_user_email_activation_status(); ?>
                <div class=" alert-box alert-box-error alert hidden alert-danger">
                    <strong> خطا ! </strong><span class="msg-box"></span>
                </div>
                <div class=" alert-box alert-box-suc alert hidden alert-success">
                    <strong> تبریک ! </strong><span class="msg-box"></span>
                </div>
                <?php echo tiva_user_login($_POST) ?>
            </div>
            <div class="row">
                <div class="col-sm-6 dis-login-section">
                    <strong>کاربر عزیز، سلام</strong>
                    <p class="login-user-dis">
                        <?php echo(isset($tiva_options['login-register-page']['login-page-text']) ? $tiva_options['login-register-page']['login-page-text'] : 'کاربر عزیز شما می توانید این متن را از طریق پنل تنظیمات قالب ویرایش کنید ...') ?>
                    </p>
                </div>
                <div class="col-sm-6 login-form-section">
                    <div class="login-form">
                        <h2>ورود به سایت <?php bloginfo('name') ?></h2>
                        <form method="post" class="login-form" action="login-user.php">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="userEmail"
                                       placeholder="ایمیل یا نام کاربری خود را وارد کنید">
                            </div>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="userPassword" class="form-control"
                                       placeholder="رمز عبور خود را وارد کنید">
                            </div>
                            <div class="form-group control-group">
                                <label class="control control-checkbox">
                                    <span class="remember-me"><?php _e('مرا به خاطر بسپار', 'tiva'); ?></span>
                                    <input type="checkbox"/>
                                    <div class="control_indicator"></div>
                                </label>
                                <a href="<?php echo site_url() . '/reset-password'; ?>"
                                   class="forget-me"><?php _e('رمز عبور خود را فراموش کرده اید ؟', 'tiva'); ?></a>
                            </div>
                            <?php wp_nonce_field('user_login', 'user_login_nonce'); ?>

                            <div class="btn-login-wrapper text-center">
                                <input type="submit" name="login_form" value="ورود به سایت" class="tiva_login-form">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <span> در <?php bloginfo('name') ?> عضو نیستید ؟ </span> <a href="<?php echo site_url() . '/register-user'; ?>" class="span-in-buttom-register"><?php _e('عضویت در ', 'tiva');
                bloginfo('name'); ?></a>
        </div>
    </div>
</div>
<?php get_footer(); ?>


