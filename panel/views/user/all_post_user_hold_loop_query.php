<?php
$current_user_id = wp_get_current_user()->ID;
//
$post_type=array('post');
$post_status=array('pending');

$user_post_per_page = 6;

$all_user_post = tiva_get_user_hold_post_count($current_user_id);
//dd($all_user_post);
$paged = tiva_get_current_page();
$offset = ($paged - 1) * $user_post_per_page;
//var_dump($offset);
$max_num_pages = ceil($all_user_post / $user_post_per_page);
//var_dump($max_num_pages);

$all_post_args = array(

    'post_type' => array('post'),
    'author' => $current_user_id,
    'post_status' => 'pending',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => $user_post_per_page,
    'offset' => $offset
);

//dd($all_post_args);
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
                            <span class="h-top-cat"><?php
                                $parentscategory = "";
                                foreach ((get_the_category()) as $category) {
                                    if ($category->category_parent == 0) {
                                        $parentscategory .= ' <a class="h-top-cat" " href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
                                    }
                                }
                                echo substr($parentscategory, 0, -2); ?></span>
                                    <a href="<?php the_permalink(get_the_ID()); ?>">
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
    $html .= ' .کاربر گرامی شما هیچ مقاله ای در انتظار بررسی ندارید ';
    $html .= '</p>';
    $html .= '</div>';
    echo $html;
    return;
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




