<?php
global $post;
$post_id = $post->ID;
tiva_set_post_view($post->ID); ?>
<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
get_header();
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu');

?>
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
                    <!--EDITED IN TIVA V5.5.2-->
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
                    <!--  // FIX BUG IN TIVA V5.8.2 -->
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