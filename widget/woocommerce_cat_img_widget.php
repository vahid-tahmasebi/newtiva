<?php
// FIX BUG IN TIVA V5.8.2

class woocommerce_cat_img_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'woocommerce_cat_img_widget', // Base ID
            ' ابزارک تصویر دسته بندی فروشگاه تیوا', // Name
            array('description' => __('نمایش تصویر شاخص دسته بندی های فروشگاه مشابه دیجی کالا', 'text_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        $html='';
        $img_url = $instance['img_cat_url'];
        $cat_id = $instance['post_cat'];
        if (intval($cat_id)){
            $cat_name=get_term((int) $cat_id, 'product_cat')->name;
        }else{
            $cat_name = 'همه محصولات';
        }
        $html.='<div class="cat-img_wrapper sidebar-wrapper">';
        $html.='<a href="'.get_category_link($cat_id).'" >';
        $html .= '<img title="' . $cat_name . '" alt="' . $cat_name . '" src="' . $img_url . '" class="img-cat-widget">';
        $html.='</a>';
        $html.='</div>';
        echo $html;
    }
    public function form($instance)
    {
//        var_dump($instance);
        if (isset($instance['post_cat'])) {
            $post_cat = $instance['post_cat'];
        } else {
            $post_cat = 'all_post';
        }
        if (isset($instance['img_cat_url'])) {
            $img_cat_url = $instance['img_cat_url'];
        } else {
            $img_cat_url = '';
        }
        ?>
        <p>
            <label for="sel2"></label>
            <select name="<?php echo $this->get_field_name('post_cat'); ?>" class="categories-dropdown"
                    id="<?php echo $this->get_field_id('post_cat'); ?>" style="width: 100%">
                <option value="all_post"><?php _e('همه دسته بندی ها', 'tiva') ?></option>
                <?php
                $args = array( 'type' => 'product', 'taxonomy' => 'product_cat' );
                $categories = get_categories($args);
                foreach ($categories as $category):
                    ?>
                    <option <?php selected($post_cat, $category->term_id); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name . '(' . tiva_change_number($category->category_count) . ')'; ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </p>
        <p>
            <input value="<?php echo $img_cat_url; ?>" type="url"
                   name="<?php echo $this->get_field_name('img_cat_url'); ?>" class="img_cat_url" style="width: 240px;">
            <a class="button button-primary img_cat_url_btn">آپلود تصویر</a>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['img_cat_url'] = (!empty($new_instance['img_cat_url'])) ? strip_tags($new_instance['img_cat_url']) : '';
        $instance['post_cat'] = (!empty($new_instance['post_cat'])) ? strip_tags($new_instance['post_cat']) : '';
        return $instance;
    }

} // class tiva_post_slider_widget widget

// Register tiva_post_slider_widget widget
add_action('widgets_init', function () {
    register_widget('woocommerce_cat_img_widget');
});