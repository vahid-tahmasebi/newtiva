<?php
$tiva_options = get_option('tiva_options');
if (empty($tiva_options['single-page']['related-post-count']) || !isset($tiva_options['single-page']['related-post-count']) || is_null($tiva_options['single-page']['related-post-count'])) {
    $posts_per_page = 4;
} else {
    $posts_per_page = $tiva_options['single-page']['related-post-count'];
}
// Default arguments
$args = array(
    'post_type' => 'download',
    'posts_per_page' => $posts_per_page, // How many items to display
    'post__not_in' => array(get_the_ID()), // Exclude current post
    'no_found_rows' => true, // We don't ned pagination so this speeds up the query
);

//var_dump($args);
// Check for current post category and add tax_query to the query arguments
$cats = wp_get_post_terms(get_the_ID(), 'category');
$cats_ids = array();
foreach ($cats as $tiva_related_cat) {
    $cats_ids[] = $tiva_related_cat->term_id;
}
if (!empty($cats_ids)) {
    $args['category__in'] = $cats_ids;
}

// Query posts
$tiva_query = new wp_query($args);

// Loop through posts
?>
<ul>
    <?php
    foreach ($tiva_query->posts as $related_post) : setup_postdata($related_post); ?>
        <li class="col-xs-12 col-md-6">
            <article>
                <a href="<?php echo get_the_permalink($related_post->ID); ?>"
                   title="<?php echo get_the_title($related_post->ID); ?>">
                    <img class="related-post-pic" src="<?php echo get_the_post_thumbnail_url($related_post->ID, 'tiva-related-post-thum'); ?>"
                         title="<?php echo get_the_title($related_post->ID); ?>" alt="<?php echo get_the_title($related_post->ID); ?>">
                    <!--                    --><?php //var_dump($related_post->ID)   ?>
                    <h3><?php echo get_the_title($related_post->ID); ?></h3>
                    <p>
                        <span>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span>
                                                   <i class="fa fa-eye" aria-hidden="true"></i>
                            <?php echo tiva_change_number(tiva_change_number(tiva_get_post_view($related_post->ID))); ?>
                                               </span>
                        <span>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo get_the_author(); ?>
                        </span>
                    </p>
                </a>
            </article>
        </li>
    <?php
// End loop
    endforeach;
    ?>
</ul>
<?
// Reset post data
wp_reset_postdata(); ?>
