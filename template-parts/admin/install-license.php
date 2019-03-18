<?php
$tiva_options = get_option('tiva_options');
global $license_key;
if (isset($_POST['license_key'])) {
    $license_key = $_POST['license_key'];

    if (!empty($license_key)) {
//        var_dump($license_key);
        $license_token = $license_key; // Your license token
        $produc_token = '655c0885-0884-412d-8554-5b84136c8952'; // Your product token tiva asli token
        $result = install($license_token, $produc_token);
//        $tiva_options['tiva_info']['tiva_ok'] = $license_key;

        if ($result->status == 'successful') {
            echo '<div class="alert alert-success"><strong> تبریک ! </strong>' . $result->message . '</div>';
            $tiva_options['tiva_info']['tiva_ok'] = $license_key;
        } else {
            // License not installed / show message
            if (!is_object($result->message)) {// License is Invalid
                echo '<div class="alert alert-danger">  <strong> خطا ! </strong>' . $result->message . '</div>';
            } else {
                foreach ($result->message as $message) {
                    foreach ($message as $msg) {
                        echo '<div class="alert alert-danger"><strong> خطا ! </strong>' . $msg . '</div>' . '<br>';
                    }
                }
            }
        }
    } else {
        echo '<div class="alert alert-danger">  <strong>خطا !</strong>' . __(' لطفا کلید لایسنس خود را ورد کنید.', 'tiva') . '</div>';
    }
}
update_option('tiva_options', $tiva_options);
?>
<?php if(!empty($tiva_options['tiva_info']['tiva_ok'])): ; ?>
<div class="alert alert-success">
  <strong>لایسنس ثبت شده توسط شما :</strong> <span class="li-alert"><?php echo  $tiva_options['tiva_info']['tiva_ok'] ; ?></span> <strong>این لایسنس معتبر میباشد و قالب برای شما فعال شد.</strong>
</div>
<?php endif; ?>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('نصب لایسنس و فعال سازی قالب تیوا', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('لایسنس قالب تیوا را از پنل کاربری خود در ژاکت کپی کرده و در اینجا قرار داده و بروی دکمه نصب کلیک کنید.', 'tiva'); ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form action="" method="post" name="install_license_form">
                            <input id="lic" type="text" name="license_key" class="lic-input"
                                   placeholder="<?php _e('کلید لایسنس خود را وارد کنید ...', 'tiva'); ?>">
                            <button type="submit" name="install_license"
                                    class="btn btn-success"><?php _e('نصب لایسنس', 'tiva'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
