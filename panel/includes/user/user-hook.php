<?php
add_action('tiva_user_save_profile_action','tiva_user_save_profile_function');
add_action('tiva_user_change_pass_action','tiva_user_change_pass_function');
add_action('tiva_user_save_profile_avatar_action','tiva_user_save_profile_avatar_function');
add_action('tiva_user_save_account_save_privacy_action','tiva_user_save_account_save_privacy_function');
add_action('tiva_user_delete_comment_action','tiva_user_delete_comment_function');
add_action('tiva_user_delete_end_comment_action','tiva_user_delete_end_comment_function');
add_action('tiva_user_recycle_comment_action','tiva_user_recycle_comment_function');
add_action('tiva_user_send_post_action','tiva_user_send_post_function');

// ADD IN TIVA V5

add_action('tiva_user_wallet_charge_action','tiva_user_wallet_charge_function');
add_action('tiva_user_wallet_update','tiva_user_wallet_update_handler',10,5);
add_action('tiva_user_save_billing_address','tiva_user_save_billing_address_function');
add_action('tiva_user_save_shipping_address','tiva_user_save_shipping_address_function');


