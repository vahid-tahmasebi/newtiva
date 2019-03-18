<?php
/**
 * Template Name: ویژه صفحات ووکامرس
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

global $post;
$post_id = $post->ID;
get_header();
get_template_part('template-parts/woocommerce/store-header');
get_template_part('template-parts/woocommerce/store-top-menu');

?>
    <div class="container" id="single">
        <div class="main-content-wrapper ">
            <div class="breadcrumbs-page hidden-xs" style="margin-top: 15px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 main-content woo-page-main-content">
                    <header class="box-header">
                        <span class="post-title"><?php the_title() ?></span>
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
            </div>
        </div>
    </div>
    <div>
    </div>
<?php

get_template_part('template-parts/footer');
get_footer();