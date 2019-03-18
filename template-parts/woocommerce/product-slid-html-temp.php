<div class="product-slid-wrapper <?php echo (intval(get_post_meta($post->ID, 'stopped_product', true)) === 1) ? 'product-stopped' : ''; ?>">
    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">
        <img class="product-slid-thumbnail" src="<?php echo get_the_post_thumbnail_url($post->ID,'tiva-product-thum'); ?>" alt="<?php echo the_title(); ?>" title="<?php echo the_title(); ?>">
        <h3 class="product-slid-title"><?php the_title(); ?></h3>
    </a>
    <?php
    global $product;
    if (intval(get_post_meta($post->ID, 'stopped_product', true)) !== 1):
        if ($product->is_in_stock() !== false):
        if ($product->is_on_sale()): {
        } ?>
            <div class="off-percent-label">
                <span class="onsale-title">حراج</span>
            </div>
        <?php endif; ?>
        <?php
        if ($price_html = $product->get_price_html()) : ?>
            <div class="product-options"><?php echo $product->get_price_html(); ?></div>
        <?php endif; ?>
        <div class="product-buy-wrapper">
            <a class="product-buy" title="خرید" href="<?php the_permalink(); ?>"><span>خرید آنلاین<i class="fa fa-shopping-cart"></i></span></a>
        </div>
    <?php else:; ?>
            <span class="is-not-stock">نا موجود</span>
    <?php endif; ?>
    <?php else: ?>
        <span class="is-not-stock">توقف تولید</span>
    <?php endif;?>

</div>
