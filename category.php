<?php
get_header();
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu'); ?>

    <div class="mask hidden-xs">
        <div class="breadcrumbs">
            <div class="container">
                <!--- Main Header Of Arshive -->
                <div class="row">
                    <div class="col-lg-9 hidden-xs">
                        <div class="head-in-arshive">
                            <h1>آرشیو مطالب <?php echo get_the_archive_title(); ?> </h1>
                            <p><?php echo category_description(); ?></p>
                        </div>
                        <hr>
                        <div class="butten-head-arshive">
                            <!--   ----------------------     --->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#nadaram">این دسته مورد پسندم نیست !! ..</button>
                            <!-- Modal -->
                            <div class="modal fade" id="nadaram" tabindex="-1" role="dialog" aria-labelledby="nadaramLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 style="color: #28353d;" class="modal-title" id="nadaramLabel">دوست عزیز ممنون از اظهار نظرتون</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p style="color: #28353d;">سلام به شما دوست عزیز و کاربر محترم وب سایت کارسازشو ، ممنون که نظر خودتون رو ارائه کردید
                                                هدف ما ارائه خدمات و آموزش های نوین میباشد در این میان گاهی کوتاهی نیز صورت میگیرد اگر این مطالب برای شما مفید نبود میتوانید از منو به قسمت در خواست آموزش بروید و آموزش مد نظر خود را ثبت کنید تا در اولین فرصت برای شما دوست عزیز آماده شود
                                                باز هم میگیم ممنون از نظرتون</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a><button type="button" class="btn btn-danger" onclick='bastan-in' data-dismiss="modal">بستن این صفحه</button></a>
                                            <a href="https://karsazsho.com" target="_blank"><button type="button" class="btn btn-info" onclick='' data-dismiss="modal">رفتن به صفحه اصلی</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--   ----------------------     --->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#daram">به علاقه مندی هایم اضافه کن</button>
                            <!-- Modal -->
                            <div class="modal fade" id="daram" tabindex="-1" role="dialog" aria-labelledby="daramLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 style="color: #28353d;" class="modal-title" id="daramLabel">ممنون از اینکه این مطلب را پسندید</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p style="color: #28353d">                                            سلام به شما دوست عزیز ، ممنون از اینکه این دسته را پسندید ، برای ذخیره کردن مطالب به عنوان علاقه مندی در پروفایل خود باید در سایت لاگین کنید و سپس در قسمت عنوان یک ستاره سفید رنگ میباشد که با فشردن روی آن به علاقه مندی های شما اضافه خواهد شد</p>
                                        </div>
                                        <div class="modal-footer">
                                           <a href="https://karsazsho.com/login-user"><button type="button" class="btn btn-success" onclick='bazkardaz' data-dismiss="modal">رفتن به پروفایل شخصی</button></a>
                                           <a href="https://karsazsho.com/register-user"><button type="button" class="btn btn-info" onclick='bazkardaz' data-dismiss="modal">پروفایل شخصی ندارم متعاسفانه</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div></div>
                        </div>
                    <div class="col-lg-3">
                        <div class="image-box-arshive">
                            <img width="250px" height="250px" src="<?php echo the_field('pic_categorys');?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="main-content hamyar-home ">
        <div class="container">
            <div class="row ">
                <div class="col-xs-12 hidden-xs col-sm-12">
                    <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="card-wrapper dars-tiket-page">
                        <header class="box-header main-content-filter">
                            <span class="box-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>تمام مطالب دسته بندی: <?php single_cat_title(); ?></span>
                        </header>
                        <div id="main-post-container" class="main-content-inner">
                            <?php get_template_part('loops/loop', 'all-default') ?>
                        </div>
                        <div class="tiva-pagination-wrraper">
                            <div class="box tiva-pagination">
                                <?php get_template_part('template-parts/pagination'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar" id="sidebar">
                    <div class="inner-sidebar">
                        <?php dynamic_sidebar('home_page_sidebar'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_template_part('template-parts/footer'); get_footer(); ?>
