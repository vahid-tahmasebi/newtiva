<?php

$date = new jDateTime(true, true, 'Asia/Tehran');
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
?>

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/user-panel/dashboard"><?php _e('داشبورد', 'tiva'); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('عضویت ویژه', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('خرید پلن های عضویت ویژه', 'tiva'); ?></span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="pull-right btn-sm" data-container="body" data-placement="bottom">
            <i class="icon-calendar date-icon-dashboard"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <?php _e('  امروز :', 'tiva'); ?><?php echo $date->date("l j F Y "); ?>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<br>
<br>
<div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-cart-arrow-down font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('تسویه حساب خرید پلن عضویت ویژه', 'tiva') ?></span>
                </div>
            </div>
            <div class="vip-plan-action">
                <?php
                if (isset($_POST['payment_method'])) {
                    $currentUser = get_current_user_id();
                    switch ($_POST['payment_method']) {
                        case 'zarinpal':
                            if ((int)tiva_get_vip_plan_price($type) < 100) {
                                tiva_show_notification('قیمت پلن عضویت ویژه باید بیشتر از 100 تومان باشد', 'error');

                                return false;
                            }
                            if ((int)tiva_get_vip_plan_price($type) == 0) {
                                tiva_show_notification('قیمت پلن عضویت ویژه باید بیشتر از 100 تومان باشد', 'error');

                                return false;

                            } else {

                                $user_info = get_userdata(get_current_user_id());

                                $MerchantID = TIVA_ZARINPAL_MERCHANTID; //Required
                                $Amount = (int)tiva_get_vip_plan_price($type); //Amount will be based on Toman - Required
                                $Description = 'خرید پلن عضویت ویژه ' . tiva_get_vip_plan_name($type); // Required
                                $Email = $user_info->user_email; // Optional
                                $Mobile = get_user_meta(get_current_user_id(), 'tiva_user_mobile', true); // Optional
                                $CallbackURL = site_url() . '/verify-payment?type=buyvipplan&plan-type='.$type.''; // Required

                                $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

                                $result = $client->PaymentRequest(
                                    [
                                        'MerchantID' => $MerchantID,
                                        'Amount' => $Amount,
                                        'Description' => $Description,
                                        'Email' => $Email,
                                        'Mobile' => $Mobile,
                                        'CallbackURL' => $CallbackURL,
                                    ]
                                );
                                tiva_user_wallet_pay_handel(array(
                                    'user_id' => get_current_user_id(),
                                    'pay_amount' => $Amount,
                                    'pay_authority' => 'zarinpal-' . $result->Authority,
                                    'pay_mobile' => $Mobile,
                                    'pay_email' => $Email,
                                    'type' => TIVA_PAY_FOR_VIP_PLAN,
                                    'description' => $Description
                                ));
                                //Redirect to URL You can do it also by creating a form
                                if ($result->Status == 100) {
                                    Header('Location: https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
                                } else {
                                    echo 'ERR: ' . $result->Status;
                                }
                            }
                            break;

                        case 'wallet':

                            $RefidWalletPay = tiva_user_wallet_update_handler($currentUser, tiva_get_vip_plan_price($type), TIVA_WALLET_DOWN, '', ' پلن عضویت ویژه ' . tiva_get_vip_plan_name($type));
                            if ((int)tiva_get_vip_plan_gift_credit($type) > 0) {
                                $RefidWalletGift = tiva_user_wallet_update_handler($currentUser, tiva_get_vip_plan_gift_credit($type), TIVA_WALLET_GIFT_UP, '', ' خرید پلن عضویت ویژه ' . tiva_get_vip_plan_name($type));
                            } else {
                                $RefidWalletGift = '';
                            }
                            if (intval($RefidWalletPay) > 0) {
                                update_user_meta($currentUser, 'is_user_vip', 'true');
                                if (get_user_meta($currentUser, 'expiration_date_Vip', true) === '') {
                                    update_user_meta($currentUser, 'expiration_date_Vip', date('Y-m-d', strtotime('+' . tiva_get_vip_plan_mount_int($type) . ' month', time())));
                                } else {
                                    $old_expiration_date_Vip_get_user_meta = get_user_meta($currentUser, 'expiration_date_Vip', true);
                                    update_user_meta($currentUser, 'expiration_date_Vip', date('Y-m-d', strtotime('+' . tiva_get_vip_plan_mount_int($type) . ' month', strtotime($old_expiration_date_Vip_get_user_meta))));
                                }
                            }

                            echo '<div class="alert alert-success text-center "><strong class="text-center">عضویت ویژه شما با موفقیت انجام شد.</strong></div> ';
                            echo '<br>';
                            header("refresh:5;url=" . site_url() . '/user-panel/wallet-transaction');
                            break;
                    }
                } ?>

            </div>
            <div class="portlet-body">
                <div class="plan-detil">
                    <div class="note note-info">
                        <h5 class="block"><strong>نام پلن انتخابی شما :</strong>
                            <span><?php echo tiva_get_vip_plan_name($type) ?></span></h5>
                        <h5 class="block"><strong>مدت زمان :</strong>
                            <span><?php echo tiva_get_vip_plan_mount($type) ?></span></h5>
                        <h5 class="block"><strong>اعتبار هدیه کیف پول :</strong>
                            <span><?php echo tiva_change_number(number_format(tiva_get_vip_plan_gift_credit($type))) . ' تومان ' ?></span>
                        </h5>
                        <h5 class="block"><strong>قابل پرداخت :</strong>
                            <span><?php echo tiva_change_number(number_format(tiva_get_vip_plan_price($type))) . ' تومان ' ?></span>
                        </h5>
                    </div>
                </div>
                <div class="payment-wrapper">
                    <form action="" method="post">
                        <ul>
                            <li class="wallet-payment">
                                <div class="wallet">
                                    <label><input type="radio"
                                                  value="wallet" <?php echo ((int)tiva_get_vip_plan_price($type) > (int)get_user_meta(get_current_user_id(), TIVA_USER_WALLET, true)) ? 'disabled' : '' ?>
                                                  name="payment_method"> پرداخت از طریق کیف پول
                                    </label>
                                    <div class="payment_method_dis">
                                        <p>پرداخت مستقیم و سریع با استفاده از موجودی کیف پول شما در سایت </p>
                                    </div>
                                    <div class="wallet-info">
                                        <?php
                                        if ((int)tiva_get_vip_plan_price($type) > (int)get_user_meta(get_current_user_id(), TIVA_USER_WALLET, true)) {
                                            echo '
													    <div class="alert alert-warning"> موجودی کیف پول شما کمتر از وجه قابل پرداخت است و شما مجاز به این روش پرداخت نیستید. لطفا کیف پول خود را شارژ کنید <strong> موجودی فعلی شما ' . tiva_change_number(number_format((int)get_user_meta(get_current_user_id(), TIVA_USER_WALLET, true))) . ' تومان است ' . '  </strong></div>
													    ';
                                        }
                                        //                                        var_dump(tiva_get_vip_plan_price($type));
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="zarinpal-payment">
                                <div class="zarinpal">
                                    <label><input value="zarinpal" checked type="radio"
                                                  name="payment_method"> پرداخت امن زرین پال
                                    </label>
                                    <div class="payment_method_dis">
                                        <p>پرداخت امن به وسیله کلیه کارت های عضو شتاب از طریق درگاه
                                            زرین
                                            پال</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="action-wrapper">
                            <input type="submit" class="btn green"
                                   name="buy-vip-plan" value="پرداخت نهایی و ثبت نام">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
