<?php
//var_dump(get_the_ID());
// Default arguments
$args = array(
    'post_type' => 'video',
    'posts_per_page' => 6, // How many items to display
    'post__not_in' => array(get_the_ID()), // Exclude current post
    'no_found_rows' => true, // We don't ned pagination so this speeds up the query
);

//var_dump($args);
// Check for current post category and add tax_query to the query arguments
$cats = wp_get_post_terms(get_the_ID(), 'video-categories');
//dd($cats);
$cats_ids = array();
foreach ($cats as $tiva_related_cat) {
    $cats_ids[] = $tiva_related_cat->term_id;
}
if (!empty($cats_ids)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'video-categories',
            'field'    => 'term_id',
            'terms'    => $cats_ids,
        ),
    );
}

//dd($args);
// Query posts
$related_video_query = new wp_query($args);

// Loop through posts
?>

<?php
//dd($related_video_query->posts);
foreach ($related_video_query->posts as $related_video) : setup_postdata($related_video); ?>
<!--    --><?php //dd($related_video->ID)?>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 wow fadeInUp video-box-wrapper">
        <article class="video-box">
            <header class="video-header">
                <div class="clearfix"></div>
                <figure class="video-thumbnail">
                    <a href="<?php the_permalink($related_video->ID); ?>">
                        <?php if (!empty(get_post_meta($related_video->ID,'tiva_vip_post',true))): ?>
                            <div class="vip-lable-wrapper">
                                <img alt="مخصوص کاربران ویژه"  class="vip-lable" src="<?php echo get_template_directory_uri().'/images/diamond.png' ?>">
                            </div>
                        <?php endif; ?>
                        <img title="<?php echo get_the_title($related_video->ID); ?>"  src="<?php echo get_the_post_thumbnail_url($related_video->ID, 'tiva-video-thum'); ?> "   alt="<?php  echo get_the_title($related_video->ID); ; ?>">
                        <span class="video-time"><?php echo tiva_change_number(get_post_meta($related_video->ID,'tiva-video-time',true))?></span>
                        <div class="palybtnicon"></div>
                    </a>
                </figure>
                <div class="clearfix"></div>
                <h2 class="video-h2">
                    <a href="<?php the_permalink($related_video->ID); ?>"><?php echo get_the_title($related_video->ID); ?></a>
                </h2>
                <div class="clearfix"></div>
            </header><!-- .entry-header -->
            <div class="clearfix"></div>
        </article>
    </div>
<?php
// End loop
endforeach;
?>

<?
// Reset post data
wp_reset_postdata(); ?>
