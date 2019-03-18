<?php
add_action('karino_send_msg_for_user','karino_send_msg_for_user_function');
add_action('karino_create_users_group','karino_create_users_group_function');
add_action('karino_delete_users_group_msg','karino_delete_users_group_msg_function');
add_action('karino_select_users_in_group_with_id','karino_select_users_in_group_with_id_function');
add_action('karino_update_users_group','karino_update_users_group_function');
add_action('karino_delete_users_selected','karino_delete_users_selected_function');
add_action('karino_add_users_selected','karino_add_users_selected_function');
