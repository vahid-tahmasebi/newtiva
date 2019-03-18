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
            </div>
            <div class="row">
                <div class="col-sm-6  dis-login-section">
                    <strong>کاربر عزیز، سلام</strong>
                    <p class="login-user-dis">
                        <?php echo(isset($tiva_options['login-register-page']['register-page-text']) ? $tiva_options['login-register-page']['register-page-text'] : 'کاربر عزیز شما می توانید این متن را از طریق پنل تنظیمات قالب ویرایش کنید ...') ?>
                    </p>
                </div>

                <div class="col-sm-6  login-form-section">
                    <div class="login-form">
                        <h2>عضویت در سایت <?php bloginfo('name') ?></h2>
                        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="post" name="register_form">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="username" class="form-control" id="userName"
                                       placeholder="* نام کاربری   " required>
                            </div>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="user_email" class="form-control user-email" id="user_email"
                                       placeholder=" * ایمیل  " required>
                            </div>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder=" * رمز عبور " required>
                                <!--                            <i class="fa fa-eye pass-show" data-rel="show" aria-hidden="true"></i>-->
                            </div>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password-confirmation" class="form-control"
                                       id="password-confirmation" placeholder=" * تکرار رمز عبور " required>
                                <!--                            <i class="fa fa-eye pass-confirm-show" data-rel="show" aria-hidden="true"></i>-->
                            </div>
                            <div class="form-group control-group">
                                <label class="control control-checkbox">
                                    <span class="remember-me ">حریم خصوصی و شرایط و قوانین استفاده از خدمات و سرویس های سایت را مطالعه نموده و با کلیه موارد آن موافقم.</span>
                                    <input class="term" type="checkbox"/>
                                    <div class="control_indicator"></div>
                                </label><a href="<?php echo (isset($tiva_options['login-register-page']['loginpage-term-link'])) ? get_page_link((int)$tiva_options['login-register-page']['loginpage-term-link']) : '#' ?>">(قوانین و مقررات)</a>
                            </div>
                            <div class="btn-login-wrapper text-center">
                                <input type="hidden" name="action" value="reset"/>
                                <input type="submit" name="register_submit" value="عضویت در سایت"
                                       class="tiva_register-form"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <span> قبلا در <?php bloginfo('name') ?> ثبت نام کرده اید ؟ </span> <a
                href="<?php echo site_url() . '/login-user'; ?>" class="">وارد شوید</a>
        </div>
    </div>
</div>
<?php get_footer(); ?>
