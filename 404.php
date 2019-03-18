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
                <div class="col-xs-12 col-sm-12">
                    <div class="card-wrapper dars-tiket-page">
                        <header class="box-header main-content-filter">
                            <span class="box-title"><i class="fa fa-frown-o" aria-hidden="true"></i><?php echo 'خطای ۴۰۴ : صفحه مورد نظر یافت نشد .' . esc_html(get_search_query(false)); ?></span>
                        </header>
                        <div id="main-post-container" class="text-error">
                            <div class="text-404">
                                <h1 class="text-center"> <?php _e('متاسفانه صفحه مورد نظر یافت نشد ):', 'tiva'); ?></h1>
                                <h4 class="text-center"><a href="<?php echo home_url(); ?>"><?php _e('برای انتقال شما به صفحه اصلی سایت کلیک کنید', 'tiva');; ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_template_part('template-parts/footer');
get_footer();
