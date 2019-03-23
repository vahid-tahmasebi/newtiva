<?php get_header();get_template_part('template-parts/header');get_template_part('template-parts/top-menu'); ?>
<div class="l-header-article">
    <div class="container">
        <div class="row v3-flex-center ">
            <div class="col-xl-12 col-lg-12 col-md-12 d-none d-sm-block">
                <h1 style="text-align: center;">کارسازشو ، اولین سیستم ارائه قالب و افزونه به صورت اشتراک ویژه</h1><br>
                <h1 style="text-align: center;font-size: 25px;">جدید ترین قالب ها و افزونه های وردپرس</h1><br>
                <img style="margin-right: 70px;margin-left: 70px;margin-top: 0;" height="600" class="hidden-sm" src="<?php echo get_template_directory_uri() . '/images/presence.png' ?>">
            </div>
        </div>
    </div>
</div>
<div class="svgbox">
    <svg class="round svg" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0 100 C40 0 60 0 100 100 Z"></path></svg>
</div>
<div class="container">
    <a href="#"><h3 class="homebox-title">دانلود جدید ترین قالب ها و افزونه های وردپرس</h3></a>
    <div class="category-desc">با سیستم اشتراک ویژه کارسازشو میتوانید با خرید یک اشتراک ویژه به کلیه قالب ها و افزونه های وردپرسی دسترسی داشته باشید و با خیال راحت دانلود کنید.</div>
</div>
<!--- Main Content -->
<div class="container">
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
                                <p>منتشرکننده : <?php the_author() ?> </p>
                                <p>تاریخ انتشار : <?php echo get_the_date('H:i , Y-m-d ') ?></p>
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
</div>
<div style="margin-top: 50px" class="category-desc">کسب و کار اینترنتی خودتو با مشاوره کارسازشو شروع کن ، قول میدیم کنارتون باشیم تا زمانی که درآمد ایده ال تون رو از اینترنت کسب کنید. </div>
<?php get_template_part('template-parts/footer');get_footer(); ?>

