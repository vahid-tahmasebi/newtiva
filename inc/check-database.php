<?php
add_action('after_switch_theme', 'tiva_check_table_comments_like_logs');
function tiva_check_table_comments_like_logs()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_comment_likes_log';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              id INT (11) NOT NULL AUTO_INCREMENT,
              user_id VARCHAR(50) NOT NULL,
              comment_id INT(11) NOT NULL,
              created_at DATE NOT NULL,
              tiva_comment_status VARCHAR(1) NOT NULL,
              UNIQUE KEY id (id)
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
        echo '';
    }

}


add_action('after_switch_theme', 'tiva_check_table_posts_like_logs');
function tiva_check_table_posts_like_logs()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_likes_log';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              id INT (11) NOT NULL AUTO_INCREMENT,
              post_id INT (11) NOT NULL,
              user_id VARCHAR(50) NOT NULL,
              created_at DATE NOT NULL,
              UNIQUE KEY id (id)
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
        echo '';
    }

}

add_action('after_switch_theme', 'tiva_check_table_tiva_msg');
function tiva_check_table_tiva_msg()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_msg';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              id INT (11) NOT NULL,
              code_g_u INT (11) NOT NULL,
              status VARCHAR(1) NOT NULL,
              msg text NOT NULL,
              send_at_date text NOT NULL,
              send_at_time text NOT NULL,
              subject VARCHAR(100) NOT NULL,
              admin_id INT(11) NOT NULL,
              msg_att VARCHAR(100) NOT NULL, 
              PRIMARY KEY (id)
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
        echo '';
    }
}

add_action('after_switch_theme', 'tiva_check_table_tiva_user_msg_handel');
function tiva_check_table_tiva_user_msg_handel()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_user_msg_handel';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              id INT (11) NOT NULL,
              user_id INT (11) NOT NULL,
              read_msg VARCHAR (1) NOT NULL,
              PRIMARY KEY (id,user_id)
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
        echo '';
    }

}


add_action('after_switch_theme', 'tiva_check_table_tiva_favorite_post');
function tiva_check_table_tiva_favorite_post()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_favorite_post';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              id INT (11) NOT NULL AUTO_INCREMENT,
              post_id INT (11) NOT NULL,
              user_id VARCHAR(50) NOT NULL,
              created_at DATE NOT NULL,
              UNIQUE KEY id (id)
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
        echo '';
    }

}

add_action('after_switch_theme', 'tiva_activation_admin_account');
function tiva_activation_admin_account()
{
    global $table_prefix, $wpdb;
    $table = $table_prefix . 'users';
    $wpdb->update(
        $table,
        array('user_status' => 1,),
        array('ID' => '1',),
        array('%d',)
    );
}

// begin set in tiva v2.5
add_action('after_switch_theme', 'tiva_check_table_tiva_users_group_msg');
function tiva_check_table_tiva_users_group_msg()
{
    global $wpdb;
    $date = new jDateTime(true, true, 'Asia/Tehran');
    $create_at = $date->date('Y-m-d', current_time('timestamp', 1));
    $table_name = $wpdb->prefix . 'tiva_users_group_msg';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              group_id INT (20) NOT NULL,
              group_name CHAR(100) NOT NULL,
              create_at	 CHAR(25) NOT NULL,
              create_by_admin INT (20) NOT NULL,
               PRIMARY KEY (group_id)               
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        $data = array(
            'group_id' => 1,
            'group_name' => 'کل کاربران سایت',
            'create_at' => $create_at,
            'create_by_admin' => 1
        );
        $wpdb->insert($table_name, $data);
    } else {
    }

}

add_action('after_switch_theme', 'tiva_check_table_tiva_users_group_msg_handel');
function tiva_check_table_tiva_users_group_msg_handel()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_users_group_msg_handel';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              group_id INT (20) NOT NULL,
              user_id INT (20) NOT NULL,
               PRIMARY KEY (group_id,user_id)               
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
    }

}

add_action('after_switch_theme', 'tiva_check_column_table_tiva_msg_msg_att');
function tiva_check_column_table_tiva_msg_msg_att()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_msg';

    $row = $wpdb->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
    WHERE table_name = {$table_name} AND column_name = 'msg_att'");

    if (empty($row)) {
        $wpdb->query("ALTER TABLE {$table_name} ADD msg_att VARCHAR (100) NOT NULL ");
    }
}

// end set in tiva v2.5

add_action('after_switch_theme', 'tiva_get_heleye');
function tiva_get_heleye()
{
    $tiva_options = get_option('tiva_options');
    if (empty($tiva_options['tiva-heleye']['heleye-value']) || !isset($tiva_options['tiva-heleye']['heleye-value'])) {
        $tiva_options['tiva-heleye']['heleye-value'] = 'هللللیههههه';
    }
    update_option('tiva_options', $tiva_options);

}

// begin add in tiva v5
add_action('after_switch_theme', 'tiva_check_table_tiva_user_wallet_logs');
function tiva_check_table_tiva_user_wallet_logs()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_user_wallet_logs';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              id INT (11) NOT NULL AUTO_INCREMENT,
              user_id int (11) NOT NULL,
              amount int (11) NOT NULL,
              	type int (2) NOT NULL,
              	date DATETIME DEFAULT CURRENT_TIMESTAMP,
              	agent int (11) not null,
              	pay_refid varchar (20) not null,
              	wallet_description VARCHAR (500) not null,
      
               PRIMARY KEY (id) , UNIQUE KEY (user_id,type,date,agent)             
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
    }

}

add_action('after_switch_theme', 'tiva_check_table_tiva_tickets');
function tiva_check_table_tiva_tickets()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_tickets';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              ticket_id INT (11) NOT NULL AUTO_INCREMENT,
              ticket_user_id int (11) NOT NULL,
              ticket_supporter_id int (11) NOT NULL,
              	ticket_title varchar(250) NOT NULL,
              	ticket_content	text NOT NULL,
              	ticket_create_at DATETIME not null,
              	ticket_update_at DATETIME not null,
              	ticket_attachment varchar (500) not null,
              	ticket_status 	smallint(6) not null,
      
               PRIMARY KEY (ticket_id) , UNIQUE KEY (ticket_user_id,ticket_create_at,ticket_update_at)             
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
    }

}

add_action('after_switch_theme', 'tiva_check_table_tiva_ticket_replies');
function tiva_check_table_tiva_ticket_replies()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_ticket_replies';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              ticket_reply_id INT (11) NOT NULL AUTO_INCREMENT,
              ticket_reply_ticket_id int (11) NOT NULL,
              ticket_reply_user_id int (11) NOT NULL,
              	ticket_reply_content text NOT NULL,
              	ticket_reply_create_at DATETIME not null,
              	ticket_reply_attachment varchar (500) not null,
      
               PRIMARY KEY (ticket_reply_id,ticket_reply_ticket_id,ticket_reply_user_id)             
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
    }

}

add_action('after_switch_theme', 'tiva_check_table_tiva_pay_handel');
function tiva_check_table_tiva_pay_handel()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tiva_pay_handel';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        //table not in database. Create new table
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
              id INT (11) NOT NULL AUTO_INCREMENT,
              user_id int (11) NOT NULL,
              pay_amount int (11) NOT NULL,
              	pay_authority varchar (100) NOT NULL,
              	pay_refid varchar (20) NOT NULL,
              	pay_mobile varchar (11) NOT NULL,
              	pay_email varchar (50) NOT NULL,
              	pay_date DATETIME DEFAULT CURRENT_TIMESTAMP,
              	type int (2) not null,
              	description text not null,
      
               PRIMARY KEY (id)           
         ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    } else {
    }

}

// end add in tiva v5

