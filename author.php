<?php
get_header();
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu');
$author = get_queried_object();
$author_id = $author->ID;
$tiva_options = get_option('tiva_options');
?>
    <div class="container main-content" id="author-page">
        <div class="row">
            <div class="col-xs-12 hidden-xs col-sm-12">
                <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
            </div>
        </div>

        <div class="author-about-page">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <?php
                    if (!empty($tiva_options['author-page']['author_box_bio_show']) && $tiva_options['author-page']['author_box_bio_show'] === 'true' || !isset($tiva_options['author-page']['author_box_bio_show'])) {
                        get_template_part('template-parts/author-about-wrapper-page');
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="author-meta">
            <ul class="author-meta-ul">
                <?php if (!empty($tiva_options['author-page']['author_box_info_show']) && $tiva_options['author-page']['author_box_info_show'] === 'true' || !isset($tiva_options['author-page']['author_box_info_show'])) : ?>
                    <li>
                        <div class="meta-wrapper " style="background-color:#26C6DA;">
                            <span class="meta-icon"><i class="fa fa-gift" aria-hidden="true"></i></span>
                            <span class="meta-num"><?php echo tiva_change_number(intval(tiva_get_user_score($author_id))); ?></span>
                            <span class="meta-title">امتیاز</span>
                        </div>
                    </li>
                    <li>
                        <div class="meta-wrapper" style="background-color:#EC407A;">
                            <span class="meta-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                            <span class="meta-num"><?php echo tiva_change_number(count_user_posts(get_the_author_meta('ID'))); ?></span>
                            <span class="meta-title">تعداد مقاله</span>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <section class="main-content hamyar-home">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="card-wrapper dars-tiket-page">
                            <header class="box-header main-content-filter">
                                <span class="box-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><?php echo get_the_archive_title(); ?></span>
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
    </div>
<?php
get_template_part('template-parts/footer');
get_footer();

