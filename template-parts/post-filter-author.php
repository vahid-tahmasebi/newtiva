<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div id="post-filter-wrapper" class="card-wrapper">
                <header class="box-header post-filter-header">
                    <h3><i class="fa fa-search" aria-hidden="true"></i><?php _e(is_home_or_is_author(), 'tiva'); ?></h3>
                </header>
                <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST"
                      id="<?php echo get_post_filter_id() ?>">
                    <input type="hidden" value="<?php
                    if (is_home()) {
                        global $post;
                        echo $author_id = $post->post_author;
                    } else {
                        $author = get_queried_object();
                        echo $author->ID;
                    }
                    ?>" name="author-id">
                    <div id="filter-post">
                        <ul class="author-post-filter-v3">
                            <li>
                                <div class="form-group">
                                    <label for="text-search"></label>
                                    <?php
                                    if ($terms = get_terms('category', 'order_by=name')) : // to make it simple I use default categories
                                        echo ' <select class="form-control" name="category_filter"><option value="all_post" name="all_post"> همه مطالب </option>';
                                        foreach ($terms as $term) :
                                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                                        endforeach;
                                        echo '</select>';
                                    endif;
                                    ?>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label for="t"></label>
                                    <select class="form-control" id="t" name="meta_key">
                                        <option value="DESC" name="asc">جدیدترین مطالب</option>
                                        <option value="ASC" name="desc">قدیمی ترین مطالب</option>
                                        <option value="filter_view" name="filter_view">محبوب ترین مطالب : بر اساس
                                            میزان
                                            بازید
                                        </option>
                                        <option value="filter_like" name="filter_like">محبوب ترین مطالب : بر اساس
                                            میزان
                                            لایک
                                        </option>
                                        <option value="filter_comment" name="filter_comment">محبوب ترین مطالب : بر
                                            اساس
                                            میزان
                                            دیدگاه
                                        </option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label for="d"></label>
                                    <select class="form-control" id="d" name="date_filter">
                                        <option value="all_time" name="asc">همه زمان</option>
                                        <option value="year" name="desc">سال</option>
                                        <option value="month" name="filter_view">ماه</option>
                                        <option value="week" name="filter_like">هغته</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label for="text-search"></label>
                                    <input id="text-search" type="text" class="form-control" name="text_search"
                                           placeholder="<?php _e('عنوان مطلب مورد نظر را وارد کنید ...', 'tiva'); ?>">

                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <button class="post-filter-btn form-control"><i class="fa fa-search" aria-hidden="true"></i> فیلتر نتایج </button>
                                    <img title="فیلتر نتایج" src="<?php echo get_template_directory_uri() . '/images/ajax-loader.gif'; ?>"
                                         alt="فیلتر نتایج" height="20" width="20" class="ajax-loader hidden">
                                </div>
                            </li>
                        </ul>
                        <input class="" type="hidden" name="action" value="<?php echo get_form_action(); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



