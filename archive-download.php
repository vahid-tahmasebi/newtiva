<?php
get_header();
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu');
?>
    <div class="mask">
        <div class="breadcrumbs">
            <div class="container">
                <!--- Main Header Of Arshive -->
                <div class="row">
                    <div class="col-lg-10">
                        <div class="head-in-arshive">
                            <h1>آرشیو مطالب <?php echo get_the_archive_title(); ?> </h1>
                            <p><?php echo category_description(); ?></p>
                        </div>
                        <div class="butten-head-arshive">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="image-box-arshive">
                            <img width="200px" height="200px" src="<?php print apply_filters( 'taxonomy-images-queried-term-image', '' );?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>>
    <section class="main-content hamyar-home ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-xs col-sm-12">
                    <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="card-wrapper dars-tiket-page">
                        <!--                        /********************************* BEGIN EDITED IN TIVA V5.8  ****************************/-->
                        <header class="box-header main-content-filter">
                            <span class="box-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><?php echo get_the_archive_title(); ?></span>
                        </header>
                        <!--                        /********************************* END EDITED IN TIVA V5.8 ******************************/-->
                        <div id="main-post-container" class="main-content-inner">
                            <?php get_template_part('loops/loop', 'all-default') ?>
                        </div>
                        <div class="tiva-pagination-wrraper">
                            <div class="box tiva-pagination">
                                <?php get_template_part('template-parts/pagination'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar" id="sidebar" >
                    <div class="inner-sidebar" >
                        <?php dynamic_sidebar('home_page_sidebar'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_template_part('template-parts/footer');
get_footer();
