<?php
/*
 * Add in tiva v5 for user wallet gateways in woocommerce
 */
add_filter('woocommerce_payment_gateways', 'init_wpuw_gateway');
function init_wpuw_gateway($methods)
{
    $methods[] = 'WC_Gateway_WPUW';
    return $methods;
}

add_action('init', 'init_user_wallet_gateway_class');
function init_user_wallet_gateway_class()
{
    if (class_exists('WC_Payment_Gateway')):
        class WC_Gateway_WPUW extends WC_Payment_Gateway
        {
            /**
             * Constructor for the gateway.
             */
            public function __construct()
            {
                $this->id = 'wpuw';
                $this->icon = apply_filters('woocommerce_gateway_icon', get_template_directory_uri() . '/images/user-wallet.png');
                $this->method_title = __('کیف پول', 'tiva');
                $this->method_description = __('پرداخت وجه از طریق کیف پول الکترونیکی توسط مشتری و یا کاربر', 'tiva');
                $this->has_fields = false;
                /** load the settings */
                $this->init_form_fields();
                $this->init_settings();
                /** get the settings */
                $this->title = $this->get_option('title');
                $this->description = $this->get_option('description');
                $this->instructions = $this->get_option('instructions', $this->description);
                $this->enable_for_methods = $this->get_option('enable_for_methods', array());
                $this->enable_for_virtual = $this->get_option('enable_for_virtual', 'yes') === 'yes' ? true : false;
                add_action('woocommerce_update_options_payment_gateways_' . $this->id, array(
                    $this,
                    'process_admin_options'
                ));
                add_action('woocommerce_thankyou_wpvw', array($this, 'thankyou_page'));
                add_action('woocommerce_before_checkout_process', array($this, 'check_balance'));
                /** setup custom email */
                add_action('woocommerce_email_before_order_table', array($this, 'email_instructions'), 10, 3);
            }

            /**
             * Initialise Gateway Settings Form Fields
             */
            public function init_form_fields()
            {
                $shipping_methods = array();
                if (is_admin()) {
                    foreach (WC()->shipping->load_shipping_methods() as $method) {
//                        var_dump($method);
                        $shipping_methods[$method->id] = $method->method_title;
                    }
                }
//                var_dump($shipping_methods);
                $this->form_fields = array(
                    'enabled' => array(
                        'title' => __('فعال کردن کیف پول الکترونیکی', 'tiva'),
                        'label' => __('فعال کردن کیف پول الکترونیکی', 'tiva'),
                        'type' => 'checkbox',
                        'description' => '',
                        'default' => 'no'
                    ),
                    'title' => array(
                        'title' => __('عنوان', 'tiva'),
                        'type' => 'text',
                        'description' => __('توضیحات درگاه', 'tiva'),
                        'default' => __('کیف پول الکترونیکی', 'tiva'),
                        'desc_tip' => true,
                    ),
                    'description' => array(
                        'title' => __('توضیحات', 'tiva'),
                        'type' => 'textarea',
                        'description' => __('شرح روش پرداختی که مشتری و کاربر در سایت مشاهده می کند', 'tiva'),
                        'default' => __('پرداخت با استفاده از کیف پول الکترونیکی', 'tiva'),
                        'desc_tip' => true,
                    ),
                    'instructions' => array(
                        'title' => __('دستور العمل ها', 'tiva'),
                        'type' => 'textarea',
                        'description' => __('دستور العمل هایی که به صفحه تشکر بعد از پرداخت اضافه می شود', 'tiva'),
                        'default' => __('پرداخت از کیف پول الکترونیکی', 'tiva'),
                        'desc_tip' => true,
                    ),
                    'enable_for_methods' => array(
                        'title' => __('روشهای حمل و نقل را فعال کنید', 'tiva'),
                        'type' => 'multiselect',
                        'class' => 'chosen_select',
                        'css' => 'width: 450px;',
                        'default' => '',
                        'description' => __('اگر کیف پول کاربر فقط برای روش های حمل و نقل مناسب در دسترس باشد، آن را در اینجا تنظیم کنید. برای فعال کردن تمام روشها، خالی بگذارید', 'tiva'),
                        'options' => $shipping_methods,
                        'desc_tip' => true,
                        'custom_attributes' => array(
                            'data-placeholder' => __('روش های حمل و نقل را انتخاب کنید', 'tiva')
                        )
                    ),
                    'enable_for_virtual' => array(
                        'title' => __('فعال سازی برای محصولات مجازی', 'tiva'),
                        'label' => __('فعال سازی برای محصولات مجازی و دانلودی', 'tiva'),
                        'type' => 'checkbox',
                        'default' => 'yes'
                    )
                );
            }

            /**
             * [is_available description]
             * @return boolean [description]
             */
            public function is_available()
            {
                $order = null;
                if (!$this->enable_for_virtual) {
                    if (WC()->cart && !WC()->cart->needs_shipping()) {
                        return false;
                    }
                    if (is_page(wc_get_page_id('checkout')) && 0 < get_query_var('order-pay')) {
                        $order_id = absint(get_query_var('order-pay'));
                        $order = wc_get_order($order_id);
                        $needs_shipping = false;
                        if (0 < sizeof($order->get_items())) {
                            foreach ($order->get_items() as $item) {
                                $_product = $order->get_product_from_item($item);
                                if ($_product->needs_shipping()) {
                                    $needs_shipping = true;
                                    break;
                                }
                            }
                        }
                        $needs_shipping = apply_filters('woocommerce_cart_needs_shipping', $needs_shipping);
                        if ($needs_shipping) {
                            return false;
                        }
                    }
                }

                if (!empty($this->enable_for_methods)) {
                    $chosen_shipping_methods_session = WC()->session->get('chosen_shipping_methods');
                    if (isset($chosen_shipping_methods_session)) {
                        $chosen_shipping_methods = array_unique($chosen_shipping_methods_session);
                    } else {
                        $chosen_shipping_methods = array();
                    }
                    $check_method = false;
                    if (is_object($order)) {
                        if ($order->shipping_method) {
                            $check_method = $order->shipping_method;
                        }
                    } elseif (empty($chosen_shipping_methods) || sizeof($chosen_shipping_methods) > 1) {
                        $check_method = false;
                    } elseif (sizeof($chosen_shipping_methods) == 1) {
                        $check_method = $chosen_shipping_methods[0];
                    }
                    if (!$check_method) {
                        return false;
                    }
                    $found = false;
                    foreach ($this->enable_for_methods as $method_id) {
                        if (strpos($check_method, $method_id) === 0) {
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        return false;
                    }
                }
                return parent::is_available();
            }

            /**
             * Process the payment and return the result
             *
             * @param int $order_id
             *
             * @return array
             */
            public function process_payment($order_id)
            {
                /** check to make sure there is not credit item in the cart */
                foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
                    if (has_term('credit', 'product_cat', $values['product_id'])) {
                        wc_add_notice(__('<strong> خطای پرداخت : </strong>', 'tiva') . 'شما نمی توانید پول مجازی را با پول مجازی خریداری کنید. لطفا روش پرداخت دیگری را انتخاب کنید', 'error');
                        return;
                    }
                }
                /** get the order informtion */
                $order = wc_get_order($order_id);
                $user_id = $order->user_id;
                /** get the users credit balance */
                $vw_balance = floatval(get_user_meta($user_id, "_uw_balance", true));
                $cart_total = floatval(WC()->cart->total);
                /** check to make sure the user has enough credit to make the purchase */
                if ($cart_total > $vw_balance) {
                    wc_add_notice(__('<strong> خطای پرداخت : </strong>', 'tiva') . 'موجودی کیف پول ناکافی است. لطفا کیف پول خود را شارژ کنید یا از روش دیگری برای پرداخت استفاده کنید.', 'error');
                    return;
                }
                /** deduct funds from user wallet and continue */
                $new_user_vw_balance = $vw_balance - $cart_total;
                update_user_meta($user_id, '_uw_balance', $new_user_vw_balance);
                /** reducdency check */
                if (get_user_meta($user_id, '_uw_balance', true) != $new_user_vw_balance) {
                    wc_add_notice(__('<strong>خطای سیستم : </strong>', 'tiva') . 'خطایی در پردازش پرداخت به وجود آمد لطفا روش دیگری برای پرداخت انتخاب کنید.', 'error');
                    return;
                }
                $update_status = apply_filters('wpuw_update_status', 'completed');
                $order->update_status($update_status, __('پرداخت مشخص شده است' . $update_status . 'با استفاده از کیف پول الکترونیکی', 'tiva'));
                /** reduce stock levels */
                $order->reduce_order_stock();
                /** empty the cart */
                WC()->cart->empty_cart();
                /** send to the thankyou page */
                return array(
                    'result' => 'success',
                    'redirect' => $this->get_return_url($order)
                );
            }

            /**
             * [get_icon description]
             * @return [type] [description]
             */
            public function get_icon()
            {
                $link = null;
                global $woocommerce;
                $vw_balance = wc_price(get_user_meta(get_current_user_id(), '_uw_balance', true));
                return apply_filters('woocommerce_gateway_icon', ' | موجودی شما : <strong>' . tiva_change_number($vw_balance) . '</strong> <img src="' . $this->icon . '" class="tiva-user-wallet-logo">', $this->id);

            }

            /**
             * [thankyou_page description]
             * @return [type] [description]
             */
            public function thankyou_page()
            {
                if ($this->instructions) {
                    echo wpautop(wptexturize($this->instructions));
                }
            }

            /**
             * [email_instructions description]
             *
             * @param  [type]  $order         [description]
             * @param  [type]  $sent_to_admin [description]
             * @param  boolean $plain_text [description]
             *
             * @return [type]                 [description]
             */
            public function email_instructions($order, $sent_to_admin, $plain_text = false)
            {
                if ($this->instructions && !$sent_to_admin && 'vw' === $order->payment_method) {
                    echo wpautop(wptexturize($this->instructions)) . PHP_EOL;
                }
            }
        }
    endif;
}