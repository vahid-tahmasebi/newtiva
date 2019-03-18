<?php if (is_active_sidebar('tiva_single_download_sidebar')) : ?>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar" id="sidebar">
        <div class="inner-sidebar">
            <?php get_template_part('template-parts/vip-register/vip-widget'); ?>
            <?php dynamic_sidebar('tiva_single_download_sidebar'); ?>
        </div>
    </div>
<?php endif; ?>