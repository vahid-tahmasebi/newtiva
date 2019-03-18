<div class=" h-box-w">
    <article class="h-box video-box">
        <header class="entry-header video-header">
            <div class="clearfix"></div>
            <figure class="h-thumbnail">
                <a href="<?php the_permalink(get_the_ID()); ?>">
                    <img title="<?php echo the_title() ; ?>" width="300" height="300" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?> "   alt="<?php echo the_title() ; ?>">
                </a>
            </figure>
            <div class="clearfix"></div>
            <h3 class="video-h2">
                <a href="<?php the_permalink(get_the_ID()); ?>"><?php echo the_title(); ?></a>
            </h3>
            <div class="clearfix"></div>
        </header><!-- .entry-header -->
        <div class="clearfix"></div>
    </article>
</div>
