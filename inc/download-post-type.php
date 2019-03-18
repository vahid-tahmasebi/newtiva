<?php
//custom post types
add_action('init', 'tiva_add_download_custom_post_type');
function tiva_add_download_custom_post_type()
{

    $labels = array(
        'name' => 'دانلود',
        'singular_name' => 'دانلود',
        'menu_name' => 'دانلود ها',
        'name_admin_bar' => 'دانلود',
        'add_new' => 'دانلود جدید',
        'add_new_item' => 'آیتم دانلود جدید',
        'new_item' => 'دانلود جدید',
        'edit_item' => 'ویرایش دانلود',
        'view_item' => 'نمایش دانلود',
        'all_items' => 'تمام دانلود ها',
        'search_items' => 'جستجوی دانلود ها',
        'parent_item_colon' => 'دانلود ها مادر :',
        'not_found' => 'دانلودی یافت نشد',
        'not_found_in_trash' => 'دانلود در زباله دان یافت نشد'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'مطالب دانلودی قالب',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'download', 'with_fornt' => true),
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-download',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'taxonomies' => array('post_tag', 'category'),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        /********************************* BEGIN ADD IN TIVA V5.8  ***************************/
        'show_in_rest' => true
        /********************************* END ADD IN TIVA V5.8 ******************************/
    );

    //exclude_from_search

    register_post_type('download', $args);

}

//function tgm_io_cpt_search($query)
//{
//
//    if (is_search()) {
//        $query->set('post_type', array('post', 'download'));
//    }
//    return $query;
//}
//
//add_filter('pre_get_posts', 'tgm_io_cpt_search');
