<?php

class tiva_ads_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'tiva_ads_widget', // Base ID
            'ابزارک تبلیغات بنر اختصاصی', // Name
            array('description' => __('نمایش بنر های تبلیغاتی با فرمت Gif و jpge , ...', 'text_domain'),) // Args
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
        $ads_url = $instance['ads_url'];
        $ads_link = $instance['ads_link'];

        $html.='<div class="cat-img_wrapper sidebar-wrapper">';
        $html.='<a href="'.$ads_link.'" >';
        $html.='<img src="'.$ads_url.'" class="img-cat-widget" title="تبلیغات" alt="تبلیغات">';
        $html.='</a>';
        $html.='</div>';
        echo $html;
    }

    public function form($instance)
    {
//        var_dump($instance);
        if (isset($instance['ads_link'])) {
            $ads_link = $instance['ads_link'];
        } else {
            $ads_link = '';
        }
        if (isset($instance['ads_url'])) {
            $ads_url = $instance['ads_url'];
        } else {
            $ads_url = '';
        }
        ?>
        <br>
        <br>
        <p>
            <label for="sel2"></label>
            <input style="width: 320px" type="url" name="<?php echo $this->get_field_name('ads_link'); ?>" value="<?php echo $ads_link; ?>" placeholder="آدرس تبلیغات">
        </p>
        <br>
        <p>
            <input  value="<?php echo $ads_url; ?>" type="url"
                   name="<?php echo $this->get_field_name('ads_url'); ?>" class="img_cat_url" style="width: 239px;">
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
        $instance['ads_url'] = (!empty($new_instance['ads_url'])) ? strip_tags($new_instance['ads_url']) : '';
        $instance['ads_link'] = (!empty($new_instance['ads_link'])) ? strip_tags($new_instance['ads_link']) : '';
        return $instance;
    }

} // class tiva_post_slider_widget widget

// Register tiva_post_slider_widget widget
add_action('widgets_init', function () {
    register_widget('tiva_ads_widget');
});



