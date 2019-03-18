<?php
//************************* BEGIN VIDEO CUSTOM POST TYPE IN TIVA V4 *************************
add_action('init', 'tiva_add_video_custom_post_type');
function tiva_add_video_custom_post_type()
{

    $labels = array(
        'name' => 'ویدیو',
        'singular_name' => 'ویدیو',
        'menu_name' => 'ویدیو ها',
        'name_admin_bar' => 'ویدیو',
        'add_new' => 'ویدیو جدید',
        'add_new_item' => 'آیتم ویدیو جدید',
        'new_item' => 'ویدیو جدید',
        'edit_item' => 'ویرایش ویدیو',
        'view_item' => 'نمایش ویدیو',
        'all_items' => 'تمام ویدیو ها',
        'search_items' => 'جستجوی ویدیو ها',
        'parent_item_colon' => 'ویدیو ها مادر :',
        'not_found' => 'ویدیوی یافت نشد',
        'not_found_in_trash' => 'ویدیو در زباله دان یافت نشد'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'مطالب ویدیویی قالب تیوا',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'video', 'with_fornt' => true),
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-video-alt3',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'taxonomies' => array('video-tags', 'video-categories'),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        /********************************* BEGIN ADD IN TIVA V5.8  ***************************/
        'show_in_rest' => true
        /********************************* END ADD IN TIVA V5.8 ******************************/
    );

    //exclude_from_search

    register_post_type('video', $args);

}

//************************* END VIDEO CUSTOM POST TYPE IN TIVA V4 *************************

//************************* BEGIN VIDEO CUSTOM POST TYPE CUSTOM CATEGORIES IN TIVA V4 *************************

function tiva_add_custom_categories_in_video_post()
{
    register_taxonomy(
        'video-categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'video',        //post type name
        array(
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'video-categories'),
        )
    );
}

add_action('init', 'tiva_add_custom_categories_in_video_post');

//************************* BEGIN VIDEO CUSTOM POST TYPE CUSTOM CATEGORIES IN TIVA V4 *************************


//create two taxonomies, genres and tags for the post type "tag"
function tiva_add_custom_tag_in_video_post()
{
    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name' => _x('هشتگ ویدیو', 'taxonomy general name'),
        'singular_name' => _x('video-Tags', 'taxonomy singular name'),
        'search_items' => __('جست و جوی هشتگ ها'),
        'popular_items' => __('محبوب ترین هشتگ ها'),
        'all_items' => __('همه هشتگ ها'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('ویرایش هشتگ'),
        'update_item' => __('بروزرسانی هشتگ'),
        'add_new_item' => __('اضافه کردن هشتگ جدید'),
        'new_item_name' => __('نام هشتگ جدید'),
        'separate_items_with_commas' => __('جداسازی هشتگ ها با کاما'),
        'add_or_remove_items' => __('اضافه یا حذف کردن هشتگ'),
        'choose_from_most_used' => __('انتخاب هشتگ از پراستفاده ترین هشتگ ها'),
        'menu_name' => __('هشتگ ویدیو'),
    );

    register_taxonomy('video-tags', 'video', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'video-tags'),
    ));
}

add_action('init', 'tiva_add_custom_tag_in_video_post', 0);

?>