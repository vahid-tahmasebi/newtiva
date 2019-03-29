<?php
//custom post types Download
function tiva_add_download_custom_post_type(){

    $labels = array(
        'name' => 'دانلود',
        'singular_name' => 'دانلود',
        'menu_name' => 'دانلود های سایت',
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
        'description' => 'وب سایت کارسازشو برای اولین بار قصد دارد سیستم اشتراکی افزونه و قالب های وردپرس را در وب فارسی راه اندازی کند.',
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
        'show_in_rest' => true

    );

    //exclude_from_search
    register_post_type('download', $args);
}
add_action('init', 'tiva_add_download_custom_post_type');

// Register Custom Taxonomy Themes
function add_custom_taxonomy_themes() {

    $labels = array(
        'name'                       => _x( 'دسته قالب ها', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'دسته قالب ها', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'دسته قالب ها', 'text_domain' ),
        'all_items'                  => __( 'کلیه قالب ها', 'text_domain' ),
        'parent_item'                => __( 'دسته مادر', 'text_domain' ),
        'parent_item_colon'          => __( 'دسته مادر:', 'text_domain' ),
        'new_item_name'              => __( 'اضافه کردن قالب جدید', 'text_domain' ),
        'add_new_item'               => __( 'قالب جدید', 'text_domain' ),
        'edit_item'                  => __( 'تغییر در دسته', 'text_domain' ),
        'update_item'                => __( 'بروز رسانی قالب', 'text_domain' ),
        'view_item'                  => __( 'دیدن قالب', 'text_domain' ),
        'separate_items_with_commas' => __( 'موارد را با کاما جدا کنید', 'text_domain' ),
        'add_or_remove_items'        => __( 'موارد را اضافه یا حذف کنید', 'text_domain' ),
        'choose_from_most_used'      => __( 'از بیشترین استفاده را انتخاب کنید', 'text_domain' ),
        'popular_items'              => __( 'آیتم های محبوب', 'text_domain' ),
        'search_items'               => __( 'جستجو قالب', 'text_domain' ),
        'not_found'                  => __( 'چیزی پیدا نشد...', 'text_domain' ),
        'no_terms'                   => __( 'قالبی نیست', 'text_domain' ),
        'items_list'                 => __( 'لیست قالب ها', 'text_domain' ),
        'items_list_navigation'      => __( 'فهرست ناوبری لیست', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                       => 'wordpress-themes',
        'with_front'                 => true,
        'hierarchical'               => true,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'wordpress-themes', array( 'download' ), $args );

//******************************************************************************************
    // Add Tag To ThemesWordpress Taxonomy , NOT hierarchical (like tags)

    $labels = array(
        'name' => 'هشتگ قالب ها',
        'singular_name' => 'هشتگ ها',
        'menu_name' => 'هشتگ قالب ها',
        'all_items' => 'همه هشتگ ها',
        'edit_item' => 'ویرایش هشتگ ها',
        'view_item' => 'مشاهده هشتگ ها',
        'update_item' => 'بروزرسانی هشتگ ها',
        'add_new_item' => 'افزودن هشتگ جدید',
        'new_item_name' => 'عنوان هشتگ جدید',
        'parent_item' => null,
        'parent_item_colon' => null,
        'search_items' => 'جستجو هشتگ ',
        'popular_items' => 'هشتگ های محبوب',
        'separate_items_with_commas' => 'هشتگ ها را با ویرگول جدا کنید',
        'add_or_remove_items' => 'افزودن و یا حذف هشتگ',
        'choose_from_most_used' => 'انتخاب برچسب ها و یا بیشتر',
        'not_found' => 'هیچ هشتگی پیدا نشد',

    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'rewrite' => array('slug' => 'themes_tag'),
    );
    register_taxonomy('themes_tag', 'download', $args);
}
add_action( 'init', 'add_custom_taxonomy_themes', 0 );


// Register Custom Taxonomy Plugins
function add_custom_taxonomy_plugins() {
    $labels = array(
        'name'                       => _x( 'دسته افزونه ها', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'دسته افزونه ها', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'دسته افزونه ها', 'text_domain' ),
        'all_items'                  => __( 'کلیه افزونه ها', 'text_domain' ),
        'parent_item'                => __( 'دسته مادر', 'text_domain' ),
        'parent_item_colon'          => __( 'دسته مادر:', 'text_domain' ),
        'new_item_name'              => __( 'اضافه کردن افزونه جدید', 'text_domain' ),
        'add_new_item'               => __( 'افزونه جدید', 'text_domain' ),
        'edit_item'                  => __( 'تغییر در دسته', 'text_domain' ),
        'update_item'                => __( 'بروز رسانی پلاگین', 'text_domain' ),
        'view_item'                  => __( 'دیدن پلاگین', 'text_domain' ),
        'separate_items_with_commas' => __( 'موارد را با کاما جدا کنید', 'text_domain' ),
        'add_or_remove_items'        => __( 'موارد را اضافه یا حذف کنید', 'text_domain' ),
        'choose_from_most_used'      => __( 'از بیشترین استفاده را انتخاب کنید', 'text_domain' ),
        'popular_items'              => __( 'آیتم های محبوب', 'text_domain' ),
        'search_items'               => __( 'جستجو پلاگین', 'text_domain' ),
        'not_found'                  => __( 'چیزی پیدا نشد...', 'text_domain' ),
        'no_terms'                   => __( 'پلاگینی نیست', 'text_domain' ),
        'items_list'                 => __( 'لیست پلاگین', 'text_domain' ),
        'items_list_navigation'      => __( 'فهرست ناوبری لیست', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                       => 'wordpress-plugins',
        'with_front'                 => true,
        'hierarchical'               => true,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'wordpress-plugins', array( 'download' ), $args );
    //******************************************************************************************
    // Add Tag To ThemesWordpress Taxonomy , NOT hierarchical (like tags)
    $labels = array(
        'name' => 'هشتگ افزونه ها',
        'singular_name' => 'هشتگ افزونه ها',
        'menu_name' => 'هشتگ افزونه ها',
        'all_items' => 'همه هشتگ ها',
        'edit_item' => 'ویرایش هشتگ ها',
        'view_item' => 'مشاهده هشتگ ها',
        'update_item' => 'بروزرسانی هشتگ ها',
        'add_new_item' => 'افزودن هشتگ جدید',
        'new_item_name' => 'عنوان هشتگ جدید',
        'parent_item' => null,
        'parent_item_colon' => null,
        'search_items' => 'جستجو هشتگ ',
        'popular_items' => 'هشتگ های محبوب',
        'separate_items_with_commas' => 'هشتگ ها را با ویرگول جدا کنید',
        'add_or_remove_items' => 'افزودن و یا حذف هشتگ',
        'choose_from_most_used' => 'انتخاب برچسب ها و یا بیشتر',
        'not_found' => 'هیچ هشتگی پیدا نشد',

    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'rewrite' => array('slug' => 'plugins_tag'),
    );
    register_taxonomy('plugins_tag', 'download', $args);

}
add_action( 'init', 'add_custom_taxonomy_plugins', 0 );


