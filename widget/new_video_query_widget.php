<?php

class tiva_new_video_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'tiva_new_video_widget', // Base ID
            'ابزارک جدیدترین ویدیوهای تیوا', // Name
            array('description' => __('نمایش جدیدترین  ویدیو های منتشر شده در سایت', 'text_domain'),) // Args
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

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
        $widget_posts = new WP_Query(array(
            'posts_per_page' => $post_num,
            'order' => 'DESC',
            'post_type' => 'video'
        ));
        if ($widget_posts->have_posts()) {


            while ($widget_posts->have_posts()):
                $widget_posts->the_post();

        get_template_part('template-parts/video-content');

                //                echo '<div class="widget-post">';
//                echo '<a  style="text-decoration: none ; color: black" href="' . get_permalink($widget_posts->post->ID) . '">';
//                echo '<div class="widget-post-inner">';
//                echo '<div class="widget-post-img">';
//                echo get_the_post_thumbnail($widget_posts->post->ID, array(70, 60), array('class' => 'widget-post-tum'));
//                echo '</div>';
//                echo '<div class="widget-post-details">';
//                echo '<span class="widget-post-title">';
//                echo $widget_posts->post->post_title;
//                echo '</span>';
//                echo '<span class="widget-post-date">';
//                echo '<i class="fa fa-calendar" aria-hidden="true" style="margin-left: 3px"></i>';
//                echo get_the_date();
//                echo '</span>';
//                echo '<span class="widget-post-aut">';
//                echo '<i class="fa fa-user" aria-hidden="true" style="margin-left: 3px"></i>';
//                echo get_the_author();
//                echo '</span>';
//                echo '</div>';
//                echo '</div>';
//                echo '</a>';
//                echo '</div>';

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
            $title = __('جدیدترین  مقاله ها', 'text_domain');
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
    register_widget('tiva_new_video_widget');
});