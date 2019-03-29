<?php
global $post;
$post_id = $post->ID;
tiva_set_post_view($post->ID); ?>
<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
get_header();
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu'); ?>

    <div class="l-header">
        <div class="container">
            <div class="row v3-flex-center ">
                <div class="col-xl-9 col-lg-9 col-md-9 d-none d-sm-block">
                    <span class="span-in-top">موضوع این صفحه:</span>
                    <h2 style="margin-right: 60px;" class="mb-4"><?php the_title() ?></h2>
                    <p class="ex-content"><?php echo get_the_excerpt(); ?></p>
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

    <div class="container" id="single">
        <div class="main-content-wrapper ">
            <div class="breadcrumbs-page" style="margin-top: 15px;">
                <div class="row">
                    <div class="col-xs-12 hidden-xs col-sm-12  ">
                        <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="
                <?php
                // Retrieves the stored value from the database
                $meta_value = get_post_meta(get_the_ID(), 'tiva_disable_page_box', true);
                // Checks and displays the retrieved value
                if (intval($meta_value) === 1) {
                    echo 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                } else {
                    echo 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
                }
                ?>
                 main-content woo-page-main-content">

                    <header class="singlepost-box-header">
                        <h2 class="post-title"><?php the_title() ?></h2>
                    </header>
                    <div class="card-wrapper main-content-inner ">
                        <?php if (have_posts()): ?>
                            <?php while (have_posts()):the_post(); ?>
                                <article class="single-post-content no-bottom-padding-page">
                                    <?php the_content(); ?>
                                </article>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <div class="clearfix"></div>
                    <div class="comments-area-wrapper card-wrapper">
                        <?php
                        // Retrieves the stored value from the database
                        $meta_value = get_post_meta($post_id, 'tiva_show_comments_box', true);
                        // Checks and displays the retrieved value
                        if (empty($meta_value)) {
                            comments_template(null, true);
//                            var_dump($meta_value);
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar  woo-page-main-content" id="sidebar">
                    <div class="inner-sidebar">
                        <?php
                        // Retrieves the stored value from the database
                        $meta_value = get_post_meta($post_id, 'tiva_disable_page_box', true);
                        // Checks and displays the retrieved value
                        if (empty($meta_value)) {
                            dynamic_sidebar('home_page_sidebar');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_template_part('template-parts/footer');
get_footer();