<?php
get_header();
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu');

?>
    <section class="main-content hamyar-home ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-xs col-sm-12">
                    <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card-wrapper dars-tiket-page">
                        <header class="box-header main-content-filter">
                            <span class="box-title"><i class="fa fa-pencil-square-o"
                                   aria-hidden="true"></i><?php echo 'نتایج جستجو برای : ' . esc_html(get_search_query(false)); ?>
                            </span>
                        </header>
                        <div id="main-post-container" class="main-content-inner">
                            <?php get_template_part('loops/loop', 'all-default'); ?>
                        </div>
                        <div class="tiva-pagination-wrraper">
                            <div class="box tiva-pagination">
                                <?php get_template_part('template-parts/pagination'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-xs-12 col-sm-3 sidebar " id="sidebar">
                    <div class="inner-sidebar">
                        <?php dynamic_sidebar('home_page_sidebar'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_template_part('template-parts/footer');
get_footer();
