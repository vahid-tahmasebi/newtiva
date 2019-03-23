<?php get_header();get_template_part('template-parts/header');get_template_part('template-parts/top-menu'); ?>
<!--- Main Content -->
<div style="margin-top: 30px;" class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
            <div class="box-download">
                <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="box-in-download">
                        <a style="text-decoration: none;" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <div class="cover-image">
                                <img src="<?php the_field('add_image_download'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                            </div>
                            <h2><?php the_title(); ?></h2>
                            <div class="div-auther">
                                <p><b>منتشرکننده</b> : <?php the_author() ?> </p>
                                <p><b>تاریخ انتشار</b> : <?php echo get_the_date('Y-m-d , H:i') ?></p>
                            </div>
                            <div class="namayesh-but">
                                <button class="btn btn-info butoon-in-download" title="" href="#" >میخواهم دانلود کنم</button>
                            </div>
                        </a>
                    </div>
                <?php endwhile; else: ?><?php endif; ?>
            </div>
        </div>
    </div>
    <div style="margin-top: 50px" class="category-desc">با سیستم اشتراک ویژه کارسازشو میتوانید با خرید یک اشتراک ویژه به کلیه قالب ها و افزونه های وردپرسی دسترسی داشته باشید و با خیال راحت دانلود کنید.</div>
</div>
<?php get_template_part('template-parts/footer');get_footer(); ?>


