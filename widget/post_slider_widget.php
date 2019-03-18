<?php

class tiva_post_slider_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'tiva_post_slider_widget', // Base ID
            ' ابزارک اسلایدر تیوا', // Name
            array('description' => __('نمایش تصاویر به صورت اسلایدر', 'text_domain'),) // Args
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

        $html = '';

        // start slid 1 set var
        $slid1 = $instance['slid1'];
        $slid1_link = $instance['slid1_link'];
        $slid1_alt = $instance['slid1_alt'];
        // end slid 1 set var

        // start slid 2 set var
        $slid2 = $instance['slid2'];
        $slid2_link = $instance['slid2_link'];
        $slid2_alt = $instance['slid2_alt'];
        // end slid 2 set var

        // start slid 3 set var
        $slid3 = $instance['slid3'];
        $slid3_link = $instance['slid3_link'];
        $slid3_alt = $instance['slid3_alt'];
        // end slid 3 set var

        // start slid 4 set var
        $slid4 = $instance['slid4'];
        $slid4_link = $instance['slid4_link'];
        $slid4_alt = $instance['slid4_alt'];
        // end slid 4 set var

        // start slid 5 set var
        $slid5 = $instance['slid5'];
        $slid5_link = $instance['slid5_link'];
        $slid5_alt = $instance['slid5_alt'];
        // end slid 5 set var

        // start slid 6 set var
        $slid6 = $instance['slid6'];
        $slid6_link = $instance['slid6_link'];
        $slid6_alt = $instance['slid6_alt'];
        // end slid 6 set var

        $html .= '<div class="tiva-slider-widget card-wrapper sidebar-wrapper">';

        if ($slid1 !== ''):
            // start slid 1

            $html .= '<div class="slid1">';
            $html .= '<a href="' . $slid1_link . '">';
            $html .= '<img src="' . $slid1 . '" class="swidget-slid h-slide" title="' . $slid1_alt . '" alt="' . $slid1_alt . '">';
            $html .= '</a>';
            $html .= '</div>';
            // end slid 1

        endif;

        if ($slid2 !== ''):
            // start slid 2
            $html .= '<div class="slid2">';
            $html .= '<a href="' . $slid2_link . '">';
            $html .= '<img src="' . $slid2 . '" class="swidget-slid h-slide" title="' . $slid2_alt . '" alt="' . $slid2_alt . '">';
            $html .= '</a>';
            $html .= '</div>';
            // end slid 2
        endif;


        if ($slid3 !== ''):
            // start slid 3
            $html .= '<div class="slid3">';
            $html .= '<a href="' . $slid3_link . '">';
            $html .= '<img src="' . $slid3 . '" class="swidget-slid h-slide" title="' . $slid3_alt . '" alt="' . $slid3_alt . '">';
            $html .= '</a>';
            $html .= '</div>';
            // end slid 3
        endif;


        if ($slid4 !== ''):
            // start slid 4
            $html .= '<div class="slid4">';
            $html .= '<a href="' . $slid4_link . '">';
            $html .= '<img src="' . $slid4 . '" class="swidget-slid h-slide" title="' . $slid4_alt . '" alt="' . $slid4_alt . '">';
            $html .= '</a>';
            $html .= '</div>';
            // end slid 4
        endif;

        if ($slid5 !== ''):
            // start slid 5
            $html .= '<div class="slid5">';
            $html .= '<a href="' . $slid5_link . '">';
            $html .= '<img src="' . $slid5 . '" class="swidget-slid h-slide" title="' . $slid5_alt . '" alt="' . $slid5_alt . '">';
            $html .= '</a>';
            $html .= '</div>';
            // end slid 5
        endif;


        if ($slid6 !== ''):
            // start slid 6
            $html .= '<div class="slid6">';
            $html .= '<a href="' . $slid6_link . '">';
            $html .= '<img src="' . $slid6 . '" class="swidget-slid h-slide" title="' . $slid6_alt . '" alt="' . $slid6_alt . '">';
            $html .= '</a>';
            $html .= '</div>';
            // end slid 6
        endif;


        $html .= '</div>';
        echo $html;

    }

    public function form($instance)
    {
//        var_dump($instance);

        // start slid 1 check
        if (isset($instance['slid1'])) {
            $slid1 = $instance['slid1'];
        } else {
            $slid1 = '';
        }
        if (isset($instance['slid1_link'])) {
            $slid1_link = $instance['slid1_link'];
        } else {
            $slid1_link = '';
        }
        if (isset($instance['slid1_alt'])) {
            $slid1_alt = $instance['slid1_alt'];
        } else {
            $slid1_alt = '';
        }
        // end slid 1 check

        // start slid 2 check
        if (isset($instance['slid2_alt'])) {
            $slid2_alt = $instance['slid2_alt'];
        } else {
            $slid2_alt = '';
        }
        if (isset($instance['slid2'])) {
            $slid2 = $instance['slid2'];
        } else {
            $slid2 = '';
        }
        if (isset($instance['slid2_link'])) {
            $slid2_link = $instance['slid2_link'];
        } else {
            $slid2_link = '';
        }
        // end slid 2 check

        // start slid 3 check
        if (isset($instance['slid3_alt'])) {
            $slid3_alt = $instance['slid3_alt'];
        } else {
            $slid3_alt = '';
        }
        if (isset($instance['slid3'])) {
            $slid3 = $instance['slid3'];
        } else {
            $slid3 = '';
        }
        if (isset($instance['slid3_link'])) {
            $slid3_link = $instance['slid3_link'];
        } else {
            $slid3_link = '';
        }
        // end slid 3 check

        // start slid 4 check
        if (isset($instance['slid4_alt'])) {
            $slid4_alt = $instance['slid4_alt'];
        } else {
            $slid4_alt = '';
        }
        if (isset($instance['slid4'])) {
            $slid4 = $instance['slid4'];
        } else {
            $slid4 = '';
        }
        if (isset($instance['slid4_link'])) {
            $slid4_link = $instance['slid4_link'];
        } else {
            $slid4_link = '';
        }
        // end slid 4 check

        // start slid 5 check
        if (isset($instance['slid5_alt'])) {
            $slid5_alt = $instance['slid5_alt'];
        } else {
            $slid5_alt = '';
        }
        if (isset($instance['slid5'])) {
            $slid5 = $instance['slid5'];
        } else {
            $slid5 = '';
        }
        if (isset($instance['slid5_link'])) {
            $slid5_link = $instance['slid5_link'];
        } else {
            $slid5_link = '';
        }
        // end slid 5 check

        // start slid 6 check
        if (isset($instance['slid6_alt'])) {
            $slid6_alt = $instance['slid6_alt'];
        } else {
            $slid6_alt = '';
        }
        if (isset($instance['slid6'])) {
            $slid6 = $instance['slid6'];
        } else {
            $slid6 = '';
        }
        if (isset($instance['slid6_link'])) {
            $slid6_link = $instance['slid6_link'];
        } else {
            $slid6_link = '';
        }
        // end slid 6 check

        ?>
        <p>
            <input value="<?php echo $slid1 ?>" type="url" placeholder="لینک تصویر اسلاید اول"
                   name="<?php echo $this->get_field_name('slid1'); ?>" class="slid1input" style="width: 280px;">
            <a class="button button-primary slid1btn">آپلود تصویر</a>
        </p>
        <p>
            <input value="<?php echo $slid1_link ?>" placeholder="لینک اسلاید اول" type="url"
                   name="<?php echo $this->get_field_name('slid1_link'); ?>" style="width: 365px;">
        </p>
        <p>
            <input value="<?php echo $slid1_alt ?>" placeholder="Alt اسلاید اول" type="text"
                   name="<?php echo $this->get_field_name('slid1_alt'); ?>" style="width: 363px;">
        </p>

        <br>

        <p>
            <input value="<?php echo $slid2 ?>" type="url" placeholder="لینک تصویر اسلاید دوم"
                   name="<?php echo $this->get_field_name('slid2'); ?>" class="slid2input" style="width: 280px;">
            <a class="button button-primary slid2btn">آپلود تصویر</a>
        </p>
        <p>
            <input value="<?php echo $slid2_link ?>" placeholder="لینک اسلاید دوم" type="url"
                   name="<?php echo $this->get_field_name('slid2_link'); ?>" style="width: 365px;">
        </p>
        <p>
            <input value="<?php echo $slid2_alt ?>" placeholder="Alt اسلاید دوم" type="text"
                   name="<?php echo $this->get_field_name('slid2_alt'); ?>" style="width: 363px;">
        </p>

        <br>

        <p>
            <input value="<?php echo $slid3 ?>" type="url" placeholder="لینک تصویر اسلاید سوم "
                   name="<?php echo $this->get_field_name('slid3'); ?>" class="slid3input" style="width: 280px;">
            <a class="button button-primary slid3btn">آپلود تصویر</a>
        </p>
        <p>
            <input value="<?php echo $slid3_link ?>" placeholder="لینک اسلاید سوم " type="url"
                   name="<?php echo $this->get_field_name('slid3_link'); ?>" style="width: 365px;">
        </p>
        <p>
            <input value="<?php echo $slid3_alt ?>" placeholder="Alt اسلاید سوم " type="text"
                   name="<?php echo $this->get_field_name('slid3_alt'); ?>" style="width: 363px;">
        </p>

        <br>

        <p>
            <input value="<?php echo $slid4 ?>" type="url" placeholder="لینک تصویر اسلاید چهارم"
                   name="<?php echo $this->get_field_name('slid4'); ?>" class="slid4input" style="width: 280px;">
            <a class="button button-primary slid4btn">آپلود تصویر</a>
        </p>
        <p>
            <input value="<?php echo $slid4_link ?>" placeholder="لینک اسلاید چهارم" type="url"
                   name="<?php echo $this->get_field_name('slid4_link'); ?>" style="width: 365px;">
        </p>
        <p>
            <input value="<?php echo $slid4_alt ?>" placeholder="Alt اسلاید چهارم" type="text"
                   name="<?php echo $this->get_field_name('slid4_alt'); ?>" style="width: 363px;">
        </p>

        <br>

        <p>
            <input value="<?php echo $slid5 ?>" type="url" placeholder="لینک تصویر اسلاید پنجم"
                   name="<?php echo $this->get_field_name('slid5'); ?>" class="slid5input" style="width: 280px;">
            <a class="button button-primary slid5btn">آپلود تصویر</a>
        </p>
        <p>
            <input value="<?php echo $slid5_link ?>" placeholder="لینک اسلاید پنجم" type="url"
                   name="<?php echo $this->get_field_name('slid5_link'); ?>" style="width: 365px;">
        </p>
        <p>
            <input value="<?php echo $slid5_alt ?>" placeholder="Alt اسلاید پنجم" type="text"
                   name="<?php echo $this->get_field_name('slid5_alt'); ?>" style="width: 363px;">
        </p>

        <br>

        <p>
            <input value="<?php echo $slid6 ?>" type="url" placeholder="لینک تصویر اسلاید شیشم"
                   name="<?php echo $this->get_field_name('slid6'); ?>" class="slid6input" style="width: 280px;">
            <a class="button button-primary slid6btn">آپلود تصویر</a>
        </p>
        <p>
            <input value="<?php echo $slid6_link ?>" placeholder="لینک اسلاید شیشم" type="url"
                   name="<?php echo $this->get_field_name('slid6_link'); ?>" style="width: 365px;">
        </p>
        <p>
            <input value="<?php echo $slid6_alt ?>" placeholder="Alt اسلاید شیشم" type="text"
                   name="<?php echo $this->get_field_name('slid6_alt'); ?>" style="width: 363px;">
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

        // start slid 1 update
        $instance['slid1'] = (!empty($new_instance['slid1'])) ? strip_tags($new_instance['slid1']) : '';
        $instance['slid1_link'] = (!empty($new_instance['slid1_link'])) ? strip_tags($new_instance['slid1_link']) : '';
        $instance['slid1_alt'] = (!empty($new_instance['slid1_alt'])) ? strip_tags($new_instance['slid1_alt']) : '';
        // end slid 1 update

        // start slid 2 update
        $instance['slid2'] = (!empty($new_instance['slid2'])) ? strip_tags($new_instance['slid2']) : '';
        $instance['slid2_link'] = (!empty($new_instance['slid2_link'])) ? strip_tags($new_instance['slid2_link']) : '';
        $instance['slid2_alt'] = (!empty($new_instance['slid2_alt'])) ? strip_tags($new_instance['slid2_alt']) : '';
        // end slid 2 update

        // start slid 3 update
        $instance['slid3'] = (!empty($new_instance['slid3'])) ? strip_tags($new_instance['slid3']) : '';
        $instance['slid3_link'] = (!empty($new_instance['slid3_link'])) ? strip_tags($new_instance['slid3_link']) : '';
        $instance['slid3_alt'] = (!empty($new_instance['slid3_alt'])) ? strip_tags($new_instance['slid3_alt']) : '';
        // end slid 3 update

        // start slid 4 update
        $instance['slid4'] = (!empty($new_instance['slid4'])) ? strip_tags($new_instance['slid4']) : '';
        $instance['slid4_link'] = (!empty($new_instance['slid4_link'])) ? strip_tags($new_instance['slid4_link']) : '';
        $instance['slid4_alt'] = (!empty($new_instance['slid4_alt'])) ? strip_tags($new_instance['slid4_alt']) : '';
        // end slid 4 update

        // start slid 5 update
        $instance['slid5'] = (!empty($new_instance['slid5'])) ? strip_tags($new_instance['slid5']) : '';
        $instance['slid5_link'] = (!empty($new_instance['slid5_link'])) ? strip_tags($new_instance['slid5_link']) : '';
        $instance['slid5_alt'] = (!empty($new_instance['slid5_alt'])) ? strip_tags($new_instance['slid5_alt']) : '';
        // end slid 5 update

        // start slid 6 update
        $instance['slid6'] = (!empty($new_instance['slid6'])) ? strip_tags($new_instance['slid6']) : '';
        $instance['slid6_link'] = (!empty($new_instance['slid6_link'])) ? strip_tags($new_instance['slid6_link']) : '';
        $instance['slid6_alt'] = (!empty($new_instance['slid6_alt'])) ? strip_tags($new_instance['slid6_alt']) : '';
        // end slid 6 update

        return $instance;
    }

} // class tiva_post_slider_widget widget

// Register tiva_post_slider_widget widget
add_action('widgets_init', function () {
    register_widget('tiva_post_slider_widget');
});