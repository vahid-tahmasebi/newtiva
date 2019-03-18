<?php
//custom post types
add_action('init', 'tiva_add_related_products_custom_post_type');
function tiva_add_related_products_custom_post_type()
{

    $labels = array(
        'name' => 'محصولات',
        'singular_name' => 'محصول',
        'menu_name' => 'محصول ها',
        'name_admin_bar' => 'محصول',
        'add_new' => 'محصول جدید',
        'add_new_item' => 'آیتم محصول جدید',
        'new_item' => 'محصول جدید',
        'edit_item' => 'ویرایش محصول',
        'view_item' => 'نمایش محصول',
        'all_items' => 'تمام محصول ها',
        'search_items' => 'جستجوی محصول ها',
        'parent_item_colon' => 'محصول ها مادر :',
        'not_found' => 'محصول یافت نشد',
        'not_found_in_trash' => 'محصول در زباله دان یافت نشد'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'محصولات مرتبط در وبلاگ',
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => false,
        'rewrite' => false,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-cart',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'taxonomies' => array('category'),
        'supports' => array('title', 'thumbnail')
    );

    //exclude_from_search

    register_post_type('related_products', $args);

}

add_filter( 'post_row_actions', 'tiva_remove_row_actions', 10, 1 );

function tiva_remove_row_actions( $actions )
{
    if( get_post_type() === 'related_products' )
        unset( $actions['view'] );
    return $actions;
}