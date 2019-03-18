<?php

get_header();
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu');
if (isset($_GET['plan-type'])) {
    $type = $_GET['plan-type'];
}
?>
    <div class="container" id="single">
        <div class="main-content-wrapper verify-payment-page">
            <div class="row">
                <div class="col-xs-12 col-sm-12 main-content woo-page-main-content">
                    <header class="singlepost-box-header">
                        <h2 class="post-title">تایید پرداخت</h2>
                    </header>
                    <div class="card-wrapper main-content-inner ">
                        <div class="pay-verify-inner">
                            <?php if ($_GET['type'] === 'walletcharge'): ?>
                                <?php
                                global $Amount;
                                $MerchantID = TIVA_ZARINPAL_MERCHANTID;
                                $Authority = $_GET['Authority'];

                                $select_authority = 'zarinpal-' . $_GET['Authority'];
                                global $wpdb;
                                $db_prefix = $wpdb->prefix;
                                $tiva_pay_handel = $db_prefix . 'tiva_pay_handel';
                                $result = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tiva_pay_handel} WHERE pay_authority=%s", $select_authority));
                                foreach ($result as $row) {
                                    $Amount = $row->pay_amount;
                                }
                                if ($_GET['Status'] == 'OK') {
                                    // URL also can be ir.zarinpal.com or de.zarinpal.com
                                    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

                                    $result = $client->PaymentVerification([
                                        'MerchantID' => $MerchantID,
                                        'Authority' => $Authority,
                                        'Amount' => $Amount,
                                    ]);

                                    if ($result->Status == 100) {
                                        $wpdb->update(
                                            $tiva_pay_handel,
                                            array(
                                                'pay_authority' => $select_authority,
                                                'pay_refid' => $result->RefID
                                            ),
                                            array(
                                                'pay_authority' => $select_authority
                                            ),

                                            array('%s', '%s')
                                        );
                                        $user_id = get_current_user_id();
                                        do_action('tiva_user_wallet_update', $user_id, $Amount, TIVA_WALLET_UP, $result->RefID, 'شارژ کیف پول شما در سایت ');
                                        echo '<div class="alert alert-success text-center">کیف پول شما با مبلغ ' . tiva_change_number(number_format($Amount)) . ' تومان با موفقیت شارژ شد. شماره  تراکنش خرید شما به این شرح است : ' . tiva_change_number($result->RefID) . '</div>';
                                        echo '<br>';
                                        echo '<div class="alert alert-info text-center"><strong>توجه !</strong>  شما بعد از چند ثانیه به صفحه تراکنش های بانکی منتقل می شوید لطفا صبور باشید ... </div>';
                                        header("refresh:5;url=" . site_url() . '/user-panel/wallet-bank-transaction');
                                    } else {

                                        switch ($result->Status) {
                                            case 101:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>عملیات پرداخت با موفقیت انجام شده ولی قبلا عملیات روی این تراکنش انجام شده است.</div>';
                                                break;
                                            case -54:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>درخواست مورد نظر آرشیو شده .</div>';
                                                break;
                                            case -33:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>رقم تراکنش با رقم پرداخت شده مطابقت ندارد.</div>';
                                                break;
                                            case -22:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>تراکنش ناموفق می باشد.</div>';
                                                break;
                                            case -21:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>هیچ نوع عملیات مالی برای این تراکنش یافت نشد.</div>';
                                                break;
                                            case -11:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>درخواست مورد نظر یافت نشد.</div>';
                                                break;
                                        }

                                    }
                                } else {
                                    echo '<div class="alert alert-danger text-center"><strong>خطا !</strong> عملیات تراکنش توسط شما کنسل شد.</div>';
                                }
                                ?>
                            <?php else: ?>
                                <?php
                                global $Amount;
                                $MerchantID = TIVA_ZARINPAL_MERCHANTID;
                                $Authority = $_GET['Authority'];

                                $select_authority = 'zarinpal-' . $_GET['Authority'];
                                global $wpdb;
                                $db_prefix = $wpdb->prefix;
                                $tiva_pay_handel = $db_prefix . 'tiva_pay_handel';
                                $result = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tiva_pay_handel} WHERE pay_authority=%s", $select_authority));
                                foreach ($result as $row) {
                                    $Amount = $row->pay_amount;
                                }
                                if ($_GET['Status'] == 'OK') {
                                    // URL also can be ir.zarinpal.com or de.zarinpal.com
                                    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

                                    $result = $client->PaymentVerification([
                                        'MerchantID' => $MerchantID,
                                        'Authority' => $Authority,
                                        'Amount' => $Amount,
                                    ]);

                                    if ($result->Status == 100) {
                                        $wpdb->update(
                                            $tiva_pay_handel,
                                            array(
                                                'pay_authority' => $select_authority,
                                                'pay_refid' => $result->RefID
                                            ),
                                            array(
                                                'pay_authority' => $select_authority
                                            ),

                                            array('%s', '%s')
                                        );
                                        $user_id = get_current_user_id();

                                        if ((int)tiva_get_vip_plan_gift_credit($type) > 0) {
                                            $RefidWalletGift = tiva_user_wallet_update_handler($user_id, tiva_get_vip_plan_gift_credit($type), TIVA_WALLET_GIFT_UP, '', ' خرید پلن عضویت ویژه ' . tiva_get_vip_plan_name($type));
                                        } else {
                                            $RefidWalletGift = '';
                                        }

                                        update_user_meta($user_id, 'is_user_vip', 'true');
                                        if (get_user_meta($user_id, 'expiration_date_Vip', true) === '') {
                                            update_user_meta($user_id, 'expiration_date_Vip', date('Y-m-d', strtotime('+' . tiva_get_vip_plan_mount_int($type) . ' month', time())));
                                        } else {
                                            $old_expiration_date_Vip_get_user_meta = get_user_meta($user_id, 'expiration_date_Vip', true);
                                            update_user_meta($user_id, 'expiration_date_Vip', date('Y-m-d', strtotime('+' . tiva_get_vip_plan_mount_int($type) . ' month', strtotime($old_expiration_date_Vip_get_user_meta))));
                                        }

                                        echo '<div class="alert alert-success text-center"> عضویت ویژه  ' . tiva_get_vip_plan_name($type) . ' برای شما با موفقیت ثبت شد شماره تراکنش برای پیگیری :  ' . tiva_change_number($result->RefID) . ' </div>';
                                        echo '<br>';
                                        echo '<div class="alert alert-info text-center"><strong>توجه !</strong>  شما بعد از چند ثانیه به صفحه تراکنش های بانکی خرید عضویت ویژه منتقل می شوید لطفا صبور باشید ... </div>';
                                        header("refresh:5;url=" . site_url() . '/user-panel/plan-bank-transaction');
                                    } else {

                                        switch ($result->Status) {
                                            case 101:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>عملیات پرداخت با موفقیت انجام شده ولی قبلا عملیات روی این تراکنش انجام شده است.</div>';
                                                break;
                                            case -54:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>درخواست مورد نظر آرشیو شده .</div>';
                                                break;
                                            case -33:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>رقم تراکنش با رقم پرداخت شده مطابقت ندارد.</div>';
                                                break;
                                            case -22:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>تراکنش ناموفق می باشد.</div>';
                                                break;
                                            case -21:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>هیچ نوع عملیات مالی برای این تراکنش یافت نشد.</div>';
                                                break;
                                            case -11:
                                                echo '<div class="alert alert-danger text-center"><strong>خطا !</strong>درخواست مورد نظر یافت نشد.</div>';
                                                break;
                                        }

                                    }
                                } else {
                                    echo '<div class="alert alert-danger text-center"><strong>خطا !</strong> عملیات تراکنش توسط شما کنسل شد.</div>';
                                }
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

get_template_part('template-parts/footer');
get_footer();