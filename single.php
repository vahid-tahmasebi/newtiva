<?php
$tiva_options = get_option('tiva_options');
global $post;
$post_id = $post->ID;
$current_user_id = wp_get_current_user()->ID;
tiva_set_post_view($post->ID);
$post_thumbnail_mata = get_post_meta($post_id, 'tiva_show_post_thumbnail');
$date = new jDateTime(true, true, 'Asia/Tehran');
get_header();
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu');
?>
    <div class="l-header">
        <div class="container">
            <div class="row v3-flex-center ">
                <div class="col-xl-9 col-lg-9 col-md-9 d-none d-sm-block">
                    <span style="color: #ffffff;font-size: 20px;">موضوع این مقاله:</span>
                    <h2 class="mb-4"><?php the_title() ?></h2>
                    <p class="ex-content"><?php echo get_the_excerpt(); ?></p>
                    <p class="details">
                        <a class="btn btn-primary btn-lg" href="<?php the_field('Link_article'); ?>" target="_blank">با یک کلیک مقاله های مرتبط به این مقاله را مطالعه کن</a>
                    </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="sing-post-thumbnail <?php echo tiva_get_css_class_post_format(get_the_ID()); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'tiva-post-thum'); ?>"
                                 class="single-post-img  img-thumbnail" alt="<?php echo the_title(); ?>"
                                 title="<?php echo the_title(); ?>">
                        </div>
                </div>
            </div>
        </div>
    </div>
<div class="svgbox">
        <svg class="round svg" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0 100 C40 0 60 0 100 100 Z"></path></svg>
 </div>

<br>

    <div class="container" id="single">
        <div class="main-content-wrapper">
            <?php if (!empty($tiva_options['single-page']['share_btn_show']) && $tiva_options['single-page']['share_btn_show'] === 'true' || !isset($tiva_options['single-page']['share_btn_show'])) :
                ?>
                <div class="post-share-btn" data-spy="affix">
                    <ul>
                        <li class="pinterest">
                            <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                            echo $url; ?>">
                                <i class="fa fa-pinterest"></i>
                            </a>
                        </li>
                        <li class="telegram">
                            <a href="https://telegram.me/share/url?url=<?php the_permalink() ?>&text=<?php the_title(); ?>">
                                <i class="fa fa-telegram"></i>
                            </a>
                        </li>
                        <li class="linkedin">
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li class="twitter">
                            <a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="facebook">
                            <a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="plus">
                            <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
                                                               '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <i class="fa fa-google-plus-square"></i>
                            </a>

                        </li>
                    </ul>
                </div>
            <?php
            endif; ?>
            <div class="row">
                <div class="
                       <?php
                // Retrieves the stored value from the database
                $meta_value = get_post_meta($post_id, 'tiva_show_sidebar_box', true);
                // Checks and displays the retrieved value
                if (intval($meta_value) === 1) {
                    echo 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                } else {
                    echo 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
                }
                ?>
                main-content">
                    <div class="hidden-xs"> <?php echo get_hansel_and_gretel_breadcrumbs(); ?></div>
                    <header class="singlepost-box-header">
                        <h2 class="post-title"><?php the_title() ?></h2>
                        <div class="favorite-star-btn" data-toggle="favorite-star-btn" data-placement="top"
                             title="<?php echo tiva_get_user_favorite_post_title($post_id, $current_user_id); ?>"><span
                                    class="star <?php echo tiva_get_user_favorite_post_css_class($post_id, $current_user_id); ?>" <?php echo tiva_get_modal_user_login(); ?>
                                    data-id="<?php echo $post->ID; ?>"
                                    data-user="<?php echo wp_get_current_user()->ID; ?>"><span
                                        class="star-icon fa fa-star"></span></span></div>
                    </header>
                    <div class="card-wrapper main-content-inner ">
                        <?php if (have_posts()): ?>
                            <?php while (have_posts()):the_post(); ?>
                                <div class="post-meta hidden-xs hidden-sm">
                                    <span><i class="fa fa-calendar"
                                             aria-hidden="true"></i><?php echo get_the_date('H:i, Y-m-d '); ?></span>
                                    <span><i class="fa fa-eye"
                                             aria-hidden="true"></i><?php echo tiva_change_number(tiva_get_post_view(get_the_ID())); ?></span>
                                    <span><i class="fa fa-heart"
                                             aria-hidden="true"></i><?php echo tiva_change_number(tiva_get_post_likes(get_the_ID())); ?></span>
                                    <span><i class="fa fa-comments"
                                             aria-hidden="true"></i> <?php echo tiva_change_number(get_comments_number(get_the_ID())); // add in tiva v4 ?>
                                        دیدگاه </span>

                                </div>
                                <?php if (empty(get_post_meta(get_the_ID(), 'tiva_private_post', true)) && empty(get_post_meta(get_the_ID(), 'tiva_vip_post', true))): ?>

                                    <!--  BEGIN EDITED IN tiva V5.5.2-->
                                    <?php if (intval($post_thumbnail_mata) !== 1): ?>
                                        <div class="sing-post-thumbnail <?php echo tiva_get_css_class_post_format(get_the_ID()); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'tiva-post-thum'); ?>"
                                                 class="single-post-img  img-thumbnail" alt="<?php echo the_title(); ?>"
                                                 title="<?php echo the_title(); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <!--  END EDITED IN tiva V5.5.2-->

                                    <article class="single-post-content">
                                        <?php the_content(); ?>
                                    </article>
                                    <div class="darsam-postlike-wrapper">
                                        <div data-toggle="like-btn" data-placement="right" title="پسندیدن این مطلب"
                                             class="heart post-like-btn <?php echo tiva_which_user_liked_post(get_the_ID()); ?>"
                                             rel="<?php echo tiva_which_user_disliked_post(get_the_ID()); ?>"
                                             data-id="<?php echo get_the_ID(); ?>"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php
                                    if (isset($tiva_options['ads_setting']['custom_banner_url']) && !empty($tiva_options['ads_setting']['custom_banner_url'])):?>
                                        <div class="post-ads-wrapper">
                                            <a href="<?php echo (isset($tiva_options['ads_setting']['custom_banner_link'])) ? $tiva_options['ads_setting']['custom_banner_link'] : ''; ?>">
                                                <img src="<?php echo (isset($tiva_options['ads_setting']['custom_banner_url'])) ? $tiva_options['ads_setting']['custom_banner_url'] : ''; ?>"
                                                     alt="<?php echo (isset($tiva_options['ads_setting']['custom_banner_alt'])) ? $tiva_options['ads_setting']['custom_banner_alt'] : ''; ?>">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    if (isset($tiva_options['ads_setting']['custom_banner_script']) && !empty($tiva_options['ads_setting']['custom_banner_script'])):?>
                                        <div class="post-ads-wrapper hidden-sm hidden-xs">
                                            <?php echo (isset($tiva_options['ads_setting']['custom_banner_script'])) ? base64_decode($tiva_options['ads_setting']['custom_banner_script']) : ''; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if (is_user_logged_in()): ?>

                                        <?php if (get_user_meta($current_user_id, 'is_user_vip', true) === 'true'): ?>
                                            <?php if (intval($post_thumbnail_mata) !== 1): ?>
                                                <div class="sing-post-thumbnail <?php echo tiva_get_css_class_post_format(get_the_ID()); ?>">
                                                    <img src="<?php the_post_thumbnail_url('large'); ?>"
                                                         class="single-post-img  img-thumbnail"
                                                         alt="<?php echo the_title(); ?>"
                                                         title="<?php echo the_title(); ?>">
                                                </div>
                                            <?php endif; ?>
                                            <article class="single-post-content">
                                                <?php the_content(); ?>
                                            </article>
                                            <div class="darsam-postlike-wrapper">
                                                <div data-toggle="like-btn" data-placement="right"
                                                     title="پسندیدن این مطلب"
                                                     class="heart post-like-btn <?php echo tiva_which_user_liked_post(get_the_ID()); ?>"
                                                     rel="<?php echo tiva_which_user_disliked_post(get_the_ID()); ?>"
                                                     data-id="<?php echo get_the_ID(); ?>"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <?php
                                            $post_ads_link = get_post_meta(get_the_ID(), 'tiva_post_ads_banner_link', true);
                                            $post_ads_link_target = get_post_meta(get_the_ID(), 'tiva_post_ads_target_link', true);
                                            if ($post_ads_link !== ''):?>
                                                <div class="post-ads-wrapper">
                                                    <a href="<?php echo $post_ads_link_target; ?>">
                                                        <img src="<?php echo $post_ads_link; ?>" alt="">
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php elseif (!empty(get_post_meta($post_id, 'tiva_private_post', true))): ?>
                                            <?php if (intval($post_thumbnail_mata) !== 1): ?>
                                                <div class="sing-post-thumbnail <?php echo tiva_get_css_class_post_format(get_the_ID()); ?>">
                                                    <img src="<?php the_post_thumbnail_url('large'); ?>"
                                                         class="single-post-img  img-thumbnail"
                                                         alt="<?php echo the_title(); ?>"
                                                         title="<?php echo the_title(); ?>">
                                                </div>
                                            <?php endif; ?>
                                            <article class="single-post-content">
                                                <?php the_content(); ?>
                                            </article>
                                            <div class="darsam-postlike-wrapper">
                                                <div data-toggle="like-btn" data-placement="right"
                                                     title="پسندیدن این مطلب"
                                                     class="heart post-like-btn <?php echo tiva_which_user_liked_post(get_the_ID()); ?>"
                                                     rel="<?php echo tiva_which_user_disliked_post(get_the_ID()); ?>"
                                                     data-id="<?php echo get_the_ID(); ?>"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <?php
                                            $post_ads_link = get_post_meta(get_the_ID(), 'tiva_post_ads_banner_link', true);
                                            $post_ads_link_target = get_post_meta(get_the_ID(), 'tiva_post_ads_target_link', true);
                                            if ($post_ads_link !== ''):?>
                                                <div class="post-ads-wrapper">
                                                    <a href="<?php echo $post_ads_link_target; ?>">
                                                        <img src="<?php echo $post_ads_link; ?>" alt="">
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <article class="single-post-content">
                                                <?php the_excerpt(); ?>
                                            </article>
                                            <?php
                                            $html = '<div class="tiva-vip-content-wrapper post_vip-metabox">';
                                            $html .= '<div class="vip-text-wrraper">';
                                            $html .= '<i class="fa fa-diamond text-vip-icon" aria-hidden="true"></i>';
                                            $html .= '<span class="text-vip-error">';
                                            $html .= 'این مقاله مخصوص کاربران ویژه است. برای مشاهده ، شما باید کاربر ویژه سایت باشید. و وارد حساب کاربری خود شوید ! ';
                                            $html .= '</span>';
                                            $html .= '</div>';
                                            $html .= '</div>';
                                            echo $html;
                                            ?>
                                        <?php endif; ?>

                                    <?php else: ?>
                                        <?php
                                        if (!empty(get_post_meta($post_id, 'tiva_private_post', true))) {
                                            $html = '<div class="tiva-private-content-wrapper post_private-metabox">';
                                            $html .= '<div class="error-text-wrraper">';
                                            $html .= '<i class="fa fa-lock text-error-icon" aria-hidden="true"></i>';
                                            $html .= '<span class="text-error">';
                                            $html .= ' این مقاله مخصوص کاربران عضو سایت است. برای مشاهده مقاله باید در سایت عضو شوید یا وارد حساب کاربری خود شوید ! ';
                                            $html .= '</span>';
                                            $html .= '</div>';
                                            $html .= '</div>';
                                            echo $html;
                                        } else {
                                            ?>
                                            <article class="single-post-content">
                                                <?php the_excerpt(); ?>
                                            </article>
                                            <?php
                                            $html = '<div class="tiva-vip-content-wrapper post_vip-metabox">';
                                            $html .= '<div class="vip-text-wrraper">';
                                            $html .= '<i class="fa fa-diamond text-vip-icon" aria-hidden="true"></i>';
                                            $html .= '<span class="text-vip-error">';
                                            $html .= 'این مقاله مخصوص کاربران ویژه است. برای مشاهده ، شما باید کاربر ویژه سایت باشید. و وارد حساب کاربری خود شوید ! ';
                                            $html .= '</span>';
                                            $html .= '</div>';
                                            $html .= '</div>';
                                            echo $html;
                                        }
                                        ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <footer class="single-post-footer">
                                    <div class="tiva-border"></div>
                                    <div class="single-post-categorise">
                                        <div class="hidden-xs">
                                            <i class="fa fa-link single-post-short-url-icon"></i>
                                            <div class="single-post-short-url">
                                                <input id="post-short-link-copy" type="text"
                                                       value=" <?php echo wp_get_shortlink(); ?> "
                                                       data-toggle="post-short-link" data-placement="top"
                                                       title="لینک کوتاه این مقاله">
                                                <button data-clipboard-target="#post-short-link-copy"
                                                        class="copy-post-short-link"
                                                        data-toggle="copy-post-short-link-btn"
                                                        data-placement="left" title=""><i
                                                            class="fa fa-clipboard"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                        <span><?php _e('دسته بندی ها:', 'tiva'); ?> </span>
                                        <?php the_category(' '); ?>
                                    </div>
                                    <div class="single-post-tags">
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <span><?php _e('برچسب ها:', 'tiva'); ?> </span>
                                        <span><?php the_tags('', ' '); ?></span>
                                    </div>
                                </footer>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php
                    // Retrieves the stored value from the database
                    $meta_value = get_post_meta($post_id, 'tiva_show_author_box', true);
                    // Checks and displays the retrieved value
                    if (empty($meta_value)) {
                        get_template_part('template-parts/author-about-wrapper-post');
                    }
                    ?>
                    <div class="clearfix"></div>
                    <!-- /********************************* BEGIN ADD IN tiva V5.8  ****************************/-->
                    <?php if (!empty($tiva_options['single-page']['rrs_show']) && $tiva_options['single-page']['rrs_show'] === 'true'): ?>
                        <div class="h-rss-wrapper card-wrapper">
                            <?php get_template_part('template-parts/tiva-rss') ?>
                        </div>
                    <?php endif; ?>
                    <!-- /********************************* END ADD IN tiva V5.8 ******************************/-->
                    <?php
                    if (!empty($tiva_options['single-page']['post_related_show']) && $tiva_options['single-page']['post_related_show'] === 'true' || !isset($tiva_options['single-page']['post_related_show'])) :
                        ?>
                        <div class="related-post-wrapper card-wrapper">
                            <span class="related-post-title"> <?php _e('مقاله های مرتبط : ', 'tiva'); ?></span>
                            <?php get_template_part('template-parts/single-page-related-posts'); ?>
                        </div>
                    <?php
                    endif;
                    ?>
                    <?php
                    /**
                     * Check if WooCommerce is active
                     * add in tiva v3.1
                     **/
                    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                        <?php get_template_part('template-parts/woocommerce/new-woocommerce-product'); ?>
                    <?php } ?>

                    <div class="clearfix"></div>
                    <div class="comments-area-wrapper card-wrapper">
                        <?php
                        // Retrieves the stored value from the database
                        $meta_value = get_post_meta($post_id, 'tiva_show_comments_box', true);
                        // Checks and displays the retrieved value
                        if (empty($meta_value)) {
                            comments_template(null, true);
                        }
                        ?>
                    </div>
                </div>
                <?php
                // Retrieves the stored value from the database
                $show_sidebar = get_post_meta($post_id, 'tiva_show_sidebar_box', true);
                //                var_dump($show_sidebar);
                // Checks and displays the retrieved value
                if (empty($show_sidebar)) {
                    get_sidebar();
                }
                ?>

            </div>
        </div>
    </div>
<?php
get_template_part('template-parts/footer');
get_footer();
