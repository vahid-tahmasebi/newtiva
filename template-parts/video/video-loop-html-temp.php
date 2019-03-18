<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 wow fadeInUp video-box-wrapper">
    <article class="video-box">
        <header class="video-header">
            <div class="clearfix"></div>
            <figure class="video-thumbnail">
                <a title="<?php echo the_title(); ?>" href="<?php the_permalink(get_the_ID()); ?>">
                    <?php if (!empty(get_post_meta(get_the_ID(),'tiva_vip_post',true))): ?>
                        <div class="vip-lable-wrapper">
                            <img alt="مخصوص کاربران ویژه" title="مخصوص کاربران ویژه"  class="vip-lable" src="<?php echo get_template_directory_uri().'/images/diamond.png' ?>">
                        </div>
                    <?php endif; ?>
                    <img title="<?php echo the_title() ; ?>"  src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'tiva-video-thum'); ?> "   alt="<?php echo the_title() ; ?>">
                    <span class="video-time"><?php echo tiva_change_number(get_post_meta($post->ID,'tiva-video-time',true))?></span>
                    <div class="palybtnicon"></div>
                </a>
            </figure>
            <div class="clearfix"></div>
            <h3 class="video-h2">
                <a title="<?php echo the_title(); ?>" href="<?php the_permalink(get_the_ID()); ?>"><?php echo the_title(); ?></a>
            </h3>
            <div class="clearfix"></div>
        </header><!-- .entry-header -->
        <div class="clearfix"></div>
    </article>
</div>