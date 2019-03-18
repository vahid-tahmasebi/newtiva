<?php
$tiva_options = get_option('tiva_options');
if (empty($tiva_options['index-page']['video_show_count']) || !isset($tiva_options['index-page']['video_show_count']) || is_null($tiva_options['index-page']['video_show_count'])) {
    $posts_per_page = 6;
} else {
    $posts_per_page = $tiva_options['index-page']['video_show_count'];
}
$all_post_args = array(
    'post_type' => array('video'),
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status'=>'publish',
    'posts_per_page' => $posts_per_page
);
//var_dump($all_post_args);
$all_post = new WP_Query($all_post_args);

if ($all_post->have_posts()): ?>

    <?php while ($all_post->have_posts()):$all_post->the_post() ?>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 wow fadeInUp video-box-wrapper">
            <article class="video-box">
                <header class="video-header">
                    <div class="clearfix"></div>
                    <figure class="video-thumbnail">
                        <a title="<?php echo the_title(); ?>" href="<?php the_permalink(get_the_ID()); ?>">
                            <?php if (!empty(get_post_meta(get_the_ID(),'tiva_vip_post',true))): ?>
                                <div class="vip-lable-wrapper">
                                    <img alt="مخصوص کاربران ویژه" title="مخصوص کاربران ویژه"  class="vip-lable" src="<?php echo get_template_directory_uri().'/images/diamond.png' ?>">
                                </div>
                            <?php endif; ?>
                            <img class="tiva-video-thum" title="<?php echo the_title() ; ?>" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'tiva-video-thum'); ?> "   alt="<?php echo the_title() ; ?>">
                            <span class="video-time"><?php echo tiva_change_number(get_post_meta($post->ID,'tiva-video-time',true))?></span>
                            <div class="palybtnicon"></div>
                        </a>
                    </figure>
                    <div class="clearfix"></div>
                    <h3 class="video-h2">
                        <a title="<?php echo the_title(); ?>" href="<?php the_permalink(get_the_ID()); ?>"><?php echo the_title(); ?></a>
                    </h3>
                    <div class="clearfix"></div>
                </header><!-- .entry-header -->
                <div class="clearfix"></div>
            </article>
        </div>

    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <div class="no-post">
        <p><?php _e(' متاسفانه ویدیویی در این خصوص در سایت منتشر نشده است ):  ', 'tiva'); ?></p>
    </div>

<?php endif; ?>




