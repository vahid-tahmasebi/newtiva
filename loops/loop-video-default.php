<!--/////////////ok//////////////-->
<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
$current_date = $date->date('Y/m/d', false, false);
$current_user_id = wp_get_current_user()->ID;
$tiva_options = get_option('tiva_options');
global $post;
?>

<?php if (have_posts()): ?>
    <?php while (have_posts()):the_post(); ?>
        <?php get_template_part('template-parts/video/video-loop-html-temp') ?>
    <?php endwhile; ?>
<?php else: ?>
    <div class="no-post">
        <p><?php _e(' متاسفانه ویدیویی در این خصوص در سایت منتشر نشده است ):  ', 'tiva'); ?></p>
    </div>
<?php endif; ?>
