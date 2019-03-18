<?php
$tiva_options = get_option('tiva_options');

define('SL_THEME_USER_PANEL_DIR',trailingslashit(get_template_directory().'/panel'));
define('SL_THEME_USER_PANEL_VIEWS',trailingslashit(SL_THEME_USER_PANEL_DIR.'views'));
define('SL_THEME_USER_PANEL_URL',trailingslashit(get_template_directory_uri().'/panel'));

// BEGIN TIVA USER WALLET ACTION TYPE CONSTANTS
define( 'TIVA_WALLET_UP', 1 );
define( 'TIVA_WALLET_DOWN', 2 );
define( 'TIVA_WALLET_GIFT_UP', 3 );
/********************************* BEGIN ADD IN TIVA V5.8  ****************************/
define( 'TIVA_ADMIN_WALLET_UP', 4 );
define( 'TIVA_ADMIN_WALLET_DOWN', 5 );
/********************************* END ADD IN TIVA V5.8 ******************************/
// END TIVA USER WALLET ACTION TYPE CONSTANTS

// BEGIN TIVA ZARINPAL GATEWAY
define( 'TIVA_ZARINPAL_MERCHANTID', ''. (!empty($tiva_options['zarinpal']['merchant_code'])) ? $tiva_options['zarinpal']['merchant_code'] : ''.'' ); //shirnejad zarinpal
// END TIVA ZARINPAL GATEWAY

//dd(TIVA_ZARINPAL_MERCHANTID);

// BEGIN TIVA USER WALLET LOGS CONSTANT
define( 'TIVA_PAY_FOR_WALLET_CHARGE', 1 );
define( 'TIVA_PAY_FOR_WALLET_PANEL', 2 );
define( 'TIVA_PAY_FOR_WALLET_GIFT', 3 );
define( 'TIVA_PAY_FOR_VIP_PLAN', 4 );
// END TIVA USER WALLET LOGS CONSTANT

// BEGIN TIVA TICKET SYSTEM ACTION TYPE
define( 'TIVA_TICKET_STATUS_OPEN', 0 );
define( 'TIVA_TICKET_STATUS_DOING', 1 );
define( 'TIVA_TICKET_STATUS_ANSWERED', 2 );
define( 'TIVA_TICKET_STATUS_CLOSED', 3 );
define( 'TIVA_TICKET_STATUS_SYSTEM_CLOSED', 4 );
// END TIVA TICKET SYSTEM ACTION TYPE


// BEGIN USER WALLET META KEY CONSTANT
define( 'TIVA_USER_WALLET', '_uw_balance' );
// END USER WALLET META KEY CONSTANT