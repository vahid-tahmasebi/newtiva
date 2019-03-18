<?php

$args = array(
    'name' => __('سایدبار صفحه مقاله', 'tiva'),
    'id' => 'tiva_single_post_sidebar',
    'description' => '',
    'class' => '',
    'before_widget' => '<div class="card-wrapper sidebar-wrapper">',
    'after_widget' => '</div>',
    'before_title' => '<header class="box-header"><span class="box-title">',
    'after_title' => ' </span></header>');
register_sidebar($args);

$args = array(
    'name' => __('سایدبار صفحه دانلود', 'tiva'),
    'id' => 'tiva_single_download_sidebar',
    'description' => '',
    'class' => '',
    'before_widget' => '<div class="card-wrapper sidebar-wrapper">',
    'after_widget' => '</div>',
    'before_title' => '<header class="box-header"><span class="box-title">',
    'after_title' => ' </span></header>'
);
register_sidebar($args);



// tiva home page sidebar function
function tiva_home_page_sidebar_function()
{
    register_sidebar(array(
        'name' => __('سایدبار صفحه اصلی', 'tiva'),
        'id' => 'home_page_sidebar',
        'description' => '',
        'before_widget' => '<div class="card-wrapper sidebar-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<header class="box-header"><span class="box-title">',
        'after_title' => ' </span></header>'
    ));
}

add_action('widgets_init', 'tiva_home_page_sidebar_function');

// tiva home page sidebar function
function tiva_index_woocommerce_page_sidebar_function()
{
    register_sidebar(array(
        'name' => __(' سایدبار صفحه اصلی فروشگاه', 'tiva'),
        'id' => 'index_woocommerce_sidebar',
        'description' => '',
        'before_widget' => '<div class="card-wrapper sidebar-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<header class="box-header"><span class="box-title">',
        'after_title' => ' </span></header>'
    ));
}

add_action('widgets_init', 'tiva_index_woocommerce_page_sidebar_function');

// tiva archive page sidebar function
function tiva_archive_woocommerce_page_sidebar_function()
{
    register_sidebar(array(
        'name' => __(' سایدبار صفحه آرشیو فروشگاه', 'tiva'),
        'id' => 'archive_page_woocommerce_sidebar',
        'description' => '',
        'before_widget' => '<div class="card-wrapper sidebar-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<header class="box-header"><span class="box-title">',
        'after_title' => ' </span></header>'
    ));
}

add_action('widgets_init', 'tiva_archive_woocommerce_page_sidebar_function');

// tiva video single page sidebar function add in tiva v4
function tiva_video_single_page_sidebar_function()
{
    register_sidebar(array(
        'name' => __(' سایدبار صفحه ویدیو', 'tiva'),
        'id' => 'video_single_page_sidebar',
        'description' => '',
        'before_widget' => '<div class="card-wrapper sidebar-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<header class="box-header"><span class="box-title">',
        'after_title' => ' </span></header>'
    ));
}

add_action('widgets_init', 'tiva_video_single_page_sidebar_function');