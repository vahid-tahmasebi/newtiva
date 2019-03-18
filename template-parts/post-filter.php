<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="h_post_filter">
    <input type="hidden" value="<?php
    if (is_home()) {
        global $post;
        echo $author_id = $post->post_author;
    } else {
        $author = get_queried_object();
        echo $author->ID;
    }
    ?>" name="author-id">
    <div id="filter-post" class="h-post-filter">
        <ul>
            <li>
                <div class="form-group">
                    <?php
                    if ($terms = get_terms('category', 'order_by=name')) : // to make it simple I use default categories
                        echo ' <select class="form-control" name="category_filter"><option id="all_post" value="all_post" > همه مطالب </option>';
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
                        <option value="DESC">جدیدترین مطالب</option>
                        <option value="ASC">قدیمی ترین مطالب</option>
                        <option value="filter_view"  >محبوب ترین مطالب : بر اساس
                            میزان
                            بازید
                        </option>
                        <option value="filter_like"  >محبوب ترین مطالب : بر اساس
                            میزان
                            لایک
                        </option>
                        <option value="filter_comment" id="filter_comment" >محبوب ترین مطالب : بر
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
                        <option value="all_time" id="asc" >همه زمان</option>
                        <option value="year" id="desc" >سال</option>
                        <option value="month" id="filter_view" >ماه</option>
                        <option value="week" id="filter_like" >هغته</option>
                    </select>
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
        <input class="" type="hidden" name="action" value="h_post_filter">
    </div>
</form>