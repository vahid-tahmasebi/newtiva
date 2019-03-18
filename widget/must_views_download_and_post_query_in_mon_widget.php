<?php
// ******************* ADD IN TIVA V4 ********************

class tiva_must_views_download_and_post_in_mon_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'tiva_must_views_download_and_post_in_mon_widget', // Base ID
            ' ابزارک برترین مطالب (مقاله ها و دانلود ها) ماه در تیوا', // Name
            array('description' => __('نمایش برترین مطالب (مقاله ها و دانلود ها) ماه منتشر شده در سایت', 'tiva'),) // Args
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
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $post_num = apply_filters('widget_title', $instance['post_num']);
        $today = getdate();

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
        $widget_posts = new WP_Query(array(
            'date_query' => array(
                array(
                    'year' => $today['year'],
                    'month' => $today['mon'],
                ),
            ),
            'posts_per_page' => $post_num,
            'meta_key' => 'views',
            'orderby' => ' meta_value_num',
            'order' => 'DESC',
            'post_type' => array('post','download')
        ));
//        var_dump($widget_posts);
        if ($widget_posts->have_posts()) {


            while ($widget_posts->have_posts()):
                $widget_posts->the_post();
                echo '<div class="widget-post">';
                echo '<a   href="' . get_permalink($widget_posts->post->ID) . '">';
                echo '<div class="widget-post-inner">';
                echo '<div class="widget-post-img">';
                echo '<img class="widget-post-tum" title="' . get_the_title() . '" alt="' . get_the_title() . '" src="' . get_the_post_thumbnail_url(get_the_ID(), 'tiva-post-widget-thum') . '" >';
                echo '</div>';
                echo '<div class="widget-post-details">';
                echo '<h3 class="widget-post-title">';
                echo $widget_posts->post->post_title;
                echo '</h3>';
                echo '<span class="widget-post-date">';
                echo '<i class="fa fa-calendar" aria-hidden="true"></i>';
                echo get_the_date();
                echo '</span>';
                echo '<span class="widget-post-aut">';
                echo '<i class="fa fa-user" aria-hidden="true"></i>';
                echo get_the_author();
                echo '</span>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            endwhile;


        }
        wp_reset_postdata();
        echo $after_widget;
    }

    public function form($instance)
    {
//        var_dump($instance);
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('برترین مطالب ماه ', 'tiva');
        }
        if (isset($instance['post_num'])) {
            $post_num = $instance['post_num'];
        } else {
            $post_num = 6;
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('post_num'); ?>"><?php _e('تعداد پست:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('post_num'); ?>"
                   name="<?php echo $this->get_field_name('post_num'); ?>" type="text"
                   value="<?php echo esc_attr($post_num); ?>"/>
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
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['post_num'] = (!empty($new_instance['post_num'])) ? strip_tags($new_instance['post_num']) : '';

        return $instance;
    }

} // class Foo_Widget

// Register Foo_Widget widget
add_action('widgets_init', function () {
    register_widget('tiva_must_views_download_and_post_in_mon_widget');
});