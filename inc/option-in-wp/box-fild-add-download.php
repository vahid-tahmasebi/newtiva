<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5c8fe673ba42d',
        'title' => 'تنظیمات باکس عکس',
        'fields' => array(
            array(
                'key' => 'field_5c8fe691271ce',
                'label' => 'تصویر اصلی دانلود',
                'name' => 'add_image_download',
                'type' => 'text',
                'instructions' => 'یک عکس در سایز 370 در 730 پیکسل برای قسمت بالای هر دانلود باید انتخاب شود',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'https://karsazsho.poshtiban.io/p/free/OtherPicture/Defalte-Fild/New_Picture%20.png',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5c8fead941b0c',
                'label' => 'لینک پیش نمایش',
                'name' => 'preve_link',
                'type' => 'text',
                'instructions' => 'لینک پیش نمایش در صورتی که وجود داشته باشد به همراه تاییدیه هایی که در صفحه داده شده',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5c908c5b16d7e',
                'label' => 'تصاویر محصول',
                'name' => 'pic_product',
                'type' => 'text',
                'instructions' => 'در صورتی که عکس هایی از این دانلود وجود داشته باشد بهتر است لینک های آن به نمایش گذشته شود',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'download',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5c90dab3a6d49',
        'title' => 'قسمت دسته بندی سایت',
        'fields' => array(
            array(
                'key' => 'field_5c90dac5ff1a2',
                'label' => 'عکس تصویر شاخص دسته بندی',
                'name' => 'pic_categorys',
                'type' => 'text',
                'instructions' => 'یک تصویر به عنوان تصویر شاخص هر دسته بندی باید انتخاب شود ، عکس باید مربعی باشد',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'https://karsazsho.poshtiban.io/p/free/OtherPicture/Defalte-Fild/us-plac.jpg',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'category',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'wordpress-themes',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'wordpress-plugins',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'product_cat',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'video-categories',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;