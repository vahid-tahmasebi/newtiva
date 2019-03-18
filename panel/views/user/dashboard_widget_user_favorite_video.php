<?php
$current_user_id = wp_get_current_user()->ID;
//
$favorite_post_per_page = 3;

$all_user_post_favorite = tiva_get_user_favorite_post_count($current_user_id);
//dd($all_user_post_favorite);
$paged = tiva_get_current_page();
$offset = ($paged - 1) * $favorite_post_per_page;
//var_dump($offset);
$max_num_pages = ceil($all_user_post_favorite / $favorite_post_per_page);
//var_dump($max_num_pages);

//
$current_user_id = wp_get_current_user()->ID;
$favorite_post = tiva_user_get_favorite_post_id($current_user_id);
$posts = array();
foreach ($favorite_post as $post) {
    $posts[] = $post['post_id'];
}
//var_dump($posts);

if (empty($posts)) {
    $html = '';
    $html .= '<div class="note note-danger">';
    $html .= ' <h4 class="block">';
    $html .= 'متاسفیم !';
    $html .= '</h4>';
    $html .= '<p>';
    $html .= ' کاربر گرامی تا کنون هیچ مقاله ای توسط شما به علاقه مندی ها اضافه نشده است.  ';
    $html .= '</p>';
    $html .= '</div>';
    echo $html;
    return;
}
$all_post_args = array(

    'post_type' => array('video'),
    'post__in' => $posts,
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => $favorite_post_per_page,
    'offset' => $offset
);
$all_post = new WP_Query($all_post_args);
if ($all_post->have_posts()): ?>
    <div class=" show-video-wrapper">
        <div class="show-video-inner">
            <div class="row">
                <?php while ($all_post->have_posts()):$all_post->the_post() ?>
                    <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 wow fadeInUp video-box-wrapper post-wrapper_col" data-id="<?php echo get_the_ID(); ?>">
                        <article class="video-box">
                            <header class="video-header">
                                <div class="clearfix"></div>
                                <figure class="video-thumbnail">
                                    <a href="<?php the_permalink(get_the_ID()); ?>">
                                        <?php if (!empty(get_post_meta(get_the_ID(),'tiva_vip_post',true))): ?>
                                            <div class="vip-lable-wrapper">
                                                <img alt="مخصوص کاربران ویژه" width="30" height="30" class="vip-lable" src="<?php echo get_template_directory_uri().'/images/diamond.png' ?>">
                                            </div>
                                        <?php endif; ?>
                                        <img title="<?php echo the_title(); ?>" width="250" height="141"
                                             src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?> "
                                             alt="<?php echo the_title(); ?>">
                                        <span class="video-time"><?php echo tiva_change_number(get_post_meta(get_the_ID(), 'tiva-video-time', true)) ?></span>
                                        <div class="palybtnicon"></div>
                                    </a>
                                </figure>
                                <div class="clearfix"></div>
                                <h2 class="video-h2">
                                    <a href="<?php the_permalink(get_the_ID()); ?>"><?php echo the_title(); ?></a>
                                </h2>
                                <div class="clearfix"></div>
                            </header><!-- .entry-header -->
                            <div class="clearfix"></div>
                        </article>
                        <span class="trash-icon hvr-buzz-out fvide-remove" data-id="<?php echo get_the_ID(); ?>">
                                <i class="fa fa-trash trash-icon-id" data-id="<?php echo get_the_ID(); ?>" aria-hidden="true"></i>
                            </span>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <?php
    $html = '';
    $html .= '<div class="note note-danger">';
    $html .= ' <h4 class="block">';
    $html .= 'متاسفیم !';
    $html .= '</h4>';
    $html .= '<p>';
    $html .= ' کاربر گرامی تا کنون هیچ ویدیویی توسط شما به علاقه مندی ها اضافه نشده است.  ';
    $html .= '</p>';
    $html .= '</div>';
    echo $html;
    ?>
<?php endif; ?>





