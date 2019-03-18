<?php
// EDITED IN TIVA V5.5.2
$all_product_args = array(
    'post_type' => 'product',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10
);
$all_new_product = new WP_Query($all_product_args);

if ($all_new_product->have_posts()): ?>

    <div class=" product-wrapper related-video-wrapper">
        <header class="box-header">
            <span class="post-title">جدیدترین محصولات آموزشی فروشگاه کارسازشو </span>
            <span class="video-archive-link">
                        <a href="<?php echo get_post_type_archive_link('product'); ?>">+ همه محصولات</a>
                    </span>
        </header>
        <div class="card-wrapper show-video-wrapper">
            <div class="product-slider">
                <?php while ($all_new_product->have_posts()):$all_new_product->the_post() ?>

                    <?php get_template_part('template-parts/woocommerce/product-slid-html-temp') ?>

                <?php endwhile; ?>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
    </div>
<?php else : ?>
    <div class="product-wrapper card-wrapper">

        <header>
            <span class="product-title">جدیدترین محصولات فروشگاه ما </span>
        </header>
        <div class="no-post">
            <p><?php _e(' متاسفانه محصولی در این دسته بندی در فروشگاه ما موجود نمی باشد ):  ', 'tiva'); ?></p>
        </div>
    </div>
<?php endif; ?>

