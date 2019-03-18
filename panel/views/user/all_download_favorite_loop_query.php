<?php
$current_user_id = wp_get_current_user()->ID;
//
$favorite_post_per_page = 6;

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
if (empty($posts)) {
    $html = '';
    $html .= '<div class="note note-danger">';
    $html .= ' <h4 class="block">';
    $html .= 'متاسفیم !';
    $html .= '</h4>';
    $html .= '<p>';
    $html .= ' کاربر گرامی تا کنون هیچ مطلب دانلودی توسط شما به علاقه مندی ها اضافه نشده است.  ';
    $html .= '</p>';
    $html .= '</div>';
    echo $html;
    return;
}
$all_post_args = array(

    'post_type' => array('download'),
    'post__in' => $posts,
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => $favorite_post_per_page,
    'offset' => $offset
);
$all_post = new WP_Query($all_post_args);
if ($all_post->have_posts()): ?>
    <div class="hamyar-home">
        <div class="main-content-inner">
            <div class="row">
                <?php while ($all_post->have_posts()):$all_post->the_post() ?>
                    <div class="col-xs-12 col-sm-4 col-md-2 wow fadeInUp h-box-w post-wrapper_col " data-id="<?php echo get_the_ID(); ?>" >
                        <article class="h-box">
                            <header class="entry-header">
                                <div class="clearfix"></div>
                                <figure class="h-thumbnail">
                                    <a href="<?php the_permalink(get_the_ID()); ?>">
                                        <?php if (!empty(get_post_meta(get_the_ID(),'tiva_vip_post',true))): ?>
                                            <div class="vip-lable-wrapper">
                                                <img alt="مخصوص کاربران ویژه" width="30" height="30" class="vip-lable" src="<?php echo get_template_directory_uri().'/images/diamond.png' ?>">
                                            </div>
                                        <?php endif; ?>
                                        <img width="300" height="300"
                                             src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?> ">
                                        <div class="h-post-meta">
                                            <?php if (get_post_type(get_the_ID()) === 'download'): ; ?>
                                                <span class="post-status"><i class="fa fa-download"
                                                                             aria-hidden="true"></i><?php echo tiva_change_number(get_post_download_count(get_the_ID())); ?></span>
                                            <?php endif; ?>
                                            <span class="post-status"><i class="fa fa-comments-o"
                                                                         aria-hidden="true"></i><?php echo tiva_change_number(get_comments_number(get_the_ID())); ?></span>
                                            <span class="post-status like-meta" data-rel="<?php echo get_the_ID() ?>"><i
                                                        class="fa fa-heart"
                                                        aria-hidden="true"></i><?php echo tiva_change_number(tiva_get_post_likes(get_the_ID())); ?></span>
                                            <span class="post-status"><i class="fa fa-eye"
                                                                         aria-hidden="true"></i><?php echo tiva_change_number(tiva_change_number(tiva_get_post_view(get_the_ID()))); ?></span>
                                        </div>
                                    </a><!-- mask -->
                                </figure>
                                <div class="clearfix"></div>
                                <h2>
                                    <a href="<?php the_permalink(get_the_ID()); ?>"><?php echo the_title(); ?></a>
                                </h2>
                                <div class="clearfix"></div>
                            </header><!-- .entry-header -->
                            <div class="clearfix"></div>
                            <div class="entry-content">
                                <div class="excerpt">
                                    <?php
                                    the_excerpt();
                                    ?>
                                </div>
                                <div class="clearfix"></div>
                                <?php if (get_post_type() == 'download'): ?>
                                    <div class="download">
                                        <a href="<?php the_permalink(get_the_ID()); ?>"><?php _e('توضیحات بیشتر و دانلود', 'tiva') ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if (get_post_type() == 'post'): ?>
                                    <div class="download">
                                        <a href="<?php the_permalink(get_the_ID()); ?>"><?php _e('بیشتر بخوانید', 'tiva') ?></a>
                                    </div>
                                <?php endif; ?>
                            </div><!-- .entry-content -->
                            <span class="trash-icon hvr-buzz-out" data-id="<?php echo get_the_ID(); ?>">
                                <i class="fa fa-trash trash-icon-id" data-id="<?php echo get_the_ID(); ?>" aria-hidden="true"></i>
                            </span>
                        </article>
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
    $html .= ' کاربر گرامی تا کنون هیچ مطلب دانلودی توسط شما به علاقه مندی ها اضافه نشده است.  ';
    $html .= '</p>';
    $html .= '</div>';
    echo $html;
    ?>
<?php endif; ?>
<div class="tiva-pagination-wrapper">
    <div class="box tiva-pagination">
        <?php
        /*Set current page for pagination*/
        $current_page = max(1, get_query_var('paged'));
        /*Echo paginate links*/
        echo paginate_links(array(
            'base' => tiva_clean_page_arg(),
            'format' => '&page=%#%',
            'current' => max(1, tiva_get_current_page()),
            'total' => $max_num_pages,
            'prev_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            'next_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
        ));
        ?>
    </div>
</div>




