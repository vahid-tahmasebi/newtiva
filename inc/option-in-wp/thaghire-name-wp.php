<?php
add_filter('gettext', 'mw_translate_words_array');
add_filter('ngettext', 'mw_translate_words_array');
function mw_translate_words_array( $translated ) {
    $words = array(
        'دیدگاه‌ها' => 'نظرات سایت',
        'ووکامرس' => 'تنظیمات فروشگاه',
        'نوشته‌ها' => 'مقالات سایت',
        'افزودن نوشته' => 'مقاله جدید',
        'پیشخوان' => 'پنل مدیریت',
        ''=>''
    );
    $translated = str_ireplace(  array_keys($words),  $words,  $translated );
    return $translated;
}