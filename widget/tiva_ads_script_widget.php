<?php

class tiva_ads_script_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'tiva_ads_script_widget', // Base ID
            'ابزارک تبلیغات اسکریپتی', // Name
            array('description' => __('نمایش تبیلغات کلیکی و اسکریپت بنرهای آی نتورک در سایز 250*250 ', 'text_domain'),) // Args
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
        $ads_script = $instance['ads_script'];
//        var_dump($ads_script);
        $html.='<div class="cat-img_wrapper card-wrapper sidebar-wrapper">';
        $html.='<div class="ads_script_wrapper text-center ">';
        $html.= base64_decode($ads_script);
        $html.='</div>';
        $html.='</div>';
        echo $html;
    }

    public function form($instance)
    {
//        var_dump($instance);
        if (isset($instance['ads_script'])) {
            $ads_script = base64_decode($instance['ads_script']);
        } else {
            $ads_script = '';
        }
        ?>
        <br>
        <br>
        <p>
            <label for="sel2"></label>
            <textarea class="form-control" rows="5" id="sel2" name="<?php echo $this->get_field_name('ads_script'); ?>"><?php echo $ads_script; ?></textarea>

        </p>
        <br>
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
        $instance['ads_script'] = (!empty($new_instance['ads_script'])) ? base64_encode(str_replace('\\','',$new_instance['ads_script'])) : '';
        return $instance;
    }

} // class tiva_post_slider_widget widget

// Register tiva_post_slider_widget widget
add_action('widgets_init', function () {
    register_widget('tiva_ads_script_widget');
});



