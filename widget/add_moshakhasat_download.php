<?php // Creating the widget
class yourid_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
            'yourid_widget',

// Widget name will appear in UI
            __('اسم', 'yourid_widget_domain'),

// Widget description
            array( 'description' => __( 'توضیح', 'yourid_widget_domain' ), )
        );
    }

// Creating widget front-end
// This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
        echo __( '
            <div class="box status-box-download box-moshakhasat">
                        <ul>
                            <li>
                                <span class="title">تاریخ انتشار:</span>
                                <span class="value">' . the_field('Release_date') . '</span>
                            </li>
                            <li>
                                <span class="title">تاریخ بروزرسانی:</span>
                                <span class="value">۲ دی ۱۳۹۷</span>
                            </li>
                            <li>
                                <span class="title">نسخه:</span>
                                <span class="value">۹.۲.۲</span>
                            </li>
                            <li>
                                <span class="title">دیدگاه‌ها:</span>
                                <span class="value">۲۳۱ دیدگاه</span>
                            </li>

                        </ul>
                    </div>
        
        ', 'yourid_widget_domain' );
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'تیتر', 'yourid_widget_domain' );
        }
// Widget admin form
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php _e( 'Title:' ); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class yourid_widget ends here

// Register and youridad the widget
function yourid_youridad_widget() {
    register_widget( 'yourid_widget' );
}
add_action( 'widgets_init', 'yourid_youridad_widget' );?>