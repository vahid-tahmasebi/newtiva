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
                <div class="col-sm-6 dis-login-section">
                    <strong>کاربر عزیز، سلام</strong>
                    <p class="login-user-dis">
                        <?php echo (isset( $tiva_options['login-register-page']['reset-page-text'])?  $tiva_options['login-register-page']['reset-page-text'] : 'کاربر عزیز شما می توانید این متن را از طریق پنل تنظیمات قالب ویرایش کنید ...') ?>

                    </p>
                </div>
                <div class="col-sm-6 login-form-section">
                    <div class="login-form">
                        <h2>بازیابی رمز عبور</h2>
                        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="post">
                            <div class="input-group form-group">
                                <?php $user_login = isset($_POST['user_login']) ? $_POST['user_login'] : ''; ?>
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email"  class="form-control user-email"  placeholder="ایمیل خود را وارد کنید" value="<?php echo $user_login; ?>" required>
                            </div>
                            <div class="form-group text-center ">
                                <input type="hidden" name="action" value="reset"/>
                                <input type="submit" value="دریافت رمز عبور جدید" class="form-rest-btn"  id="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <span> قبلا در <?php bloginfo('name') ?> ثبت نام کرده اید ؟ </span> <a href="<?php echo site_url() . '/login-user'; ?>" class="span-in-buttom-register">وارد شوید</a>
        </div>
    </div>
</div>
<?php get_footer(); ?>

