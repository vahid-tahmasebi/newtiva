<?php
get_header();
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu'); ?>
<div class="l-header">
    <div class="container">
        <div class="row v3-flex-center ">
            <div class="col-xl-3 col-lg-3 col-md-2 d-none d-sm-block">
                <div class="image-box-arshive">
                    <img width="250px" height="250px" src="<?php echo the_field('pic_categorys'); ?>">
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-10">
                <h2 class="mb-4"><?php echo the_archive_title(); ?></h2>
                <p class="p-category_description"><?php echo category_description(); ?></p>
                <p class="details">
                    <a class="btn btn-info btn-block" href="">همین حالا شروع کن به خوندن این مقالات </a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="svgbox">
    <svg class="round svg" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
         viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 C40 0 60 0 100 100 Z"></path>
    </svg>
</div>
<div class="container">
    <a href="#"><h3 class="homebox-title"><?php echo the_archive_title(); ?></h3></a>
    <div class="category-desc"><?php echo the_archive_description(); ?></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
                <div class="singlecontent singleblog">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="archiveposts">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('archive-seo'); ?></a>
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <div class="excerpt ex-cont-lop"> <?php the_excerpt(); ?> </div>
                            <!-- ********   Block Shode *************----->
                            <div style="text-align: center; display: none;">
                                <span style="margin-right: 10px;margin-bottom: 10px;" ><b>نویسنده</b> : <?php echo get_the_author(); ?></span>
                                <span style="margin-right: 10px;margin-bottom: 10px;"><b>تاریخ انتشار</b> : <?php echo get_the_date('d-m-y'); ?></span>
                                <span style="margin-right: 10px;margin-bottom: 10px;"><i class="fa fa-eye" aria-hidden="true"></i><?php echo tiva_change_number(tiva_get_post_view(get_the_ID())); ?></span>
                                <span style="margin-right: 10px;margin-bottom: 10px;color: red;"><i class="fa fa-heart" aria-hidden="true"></i><?php echo tiva_change_number(tiva_get_post_likes(get_the_ID())); ?></span>
                            </div>
                            <!-- ********   Block Shode *************----->
                            <a href="<?php the_permalink(); ?>">
                                <button class="btn btn-primary btn-block">میخوام این مقاله رو بخونم...</button>
                            </a>
                        </div>
                    <?php endwhile;
                    else: ?><?php endif; ?>
                </div>
        </div>
    </div>
</div>

<?php get_template_part('template-parts/footer');get_footer(); ?>
