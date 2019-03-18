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
        <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInUp h-box-w">
            <article class="h-box">
                <header class="entry-header">
                    <div class="clearfix"></div>
                    <figure class="h-thumbnail">
                        <a title="<?php echo the_title() ; ?>" href="<?php the_permalink(get_the_ID()); ?>">
                            <?php if (!empty(get_post_meta(get_the_ID(),'tiva_vip_post',true))): ?>
                            <div class="vip-lable-wrapper">
                                <img alt="مخصوص کاربران ویژه" title="مخصوص کاربران ویژه"  class="vip-lable" src="<?php echo get_template_directory_uri().'/images/diamond.png' ?>">
                            </div>
                            <?php endif; ?>
                            <img title="<?php echo the_title() ; ?>" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'tiva-post-thum'); ?> "   alt="<?php echo the_title() ; ?>">
                            <div class="h-post-meta">
                                <?php if (get_post_type(get_the_ID()) === 'download'): ; ?>
                                    <span class="post-status"><i class="fa fa-download" aria-hidden="true"></i><?php echo tiva_change_number(get_post_download_count(get_the_ID())); ?></span>
                                <?php endif; ?>
                                <span class="post-status"><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo tiva_change_number(get_comments_number(get_the_ID())); ?></span>
                                <span class="post-status like-meta" data-rel="<?php echo get_the_ID() ?>"><i class="fa fa-heart" aria-hidden="true"></i><?php echo tiva_change_number(tiva_get_post_likes(get_the_ID())); ?></span>
                                <span class="post-status"><i class="fa fa-eye" aria-hidden="true"></i><?php echo tiva_change_number(tiva_change_number(tiva_get_post_view(get_the_ID()))); ?></span>
                            </div>
                        </a><!-- mask -->
                    </figure>
                    <div class="clearfix"></div>
                    <h3>
                        <a title="<?php echo the_title() ; ?>" href="<?php the_permalink(get_the_ID()); ?>"><?php echo the_title(); ?></a>
                    </h3>
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
                            <a title="توضیحات بیشتر و دانلود" href="<?php the_permalink(get_the_ID()); ?>"><?php _e('توضیحات بیشتر و دانلود', 'tiva') ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (get_post_type() == 'post'): ?>
                        <div class="download">
                            <a title="بیشتر بخوانید" href="<?php the_permalink(get_the_ID()); ?>"><?php _e('بیشتر بخوانید', 'tiva') ?></a>
                        </div>
                    <?php endif; ?>
                </div><!-- .entry-content -->
            </article>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <div class="no-post">
        <p><?php _e(' متاسفانه مقاله ای در این خصوص در سایت منتشر نشده است ):  ', 'tiva'); ?></p>
    </div>
<?php endif; ?>
