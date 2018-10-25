<?php

/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

class vincentQuickContact extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'vincentQuickContact',
            'Quick Contact (PM)',
            array('description' => '')
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = esc_attr($new_instance['title']);
        $instance['phone'] = $new_instance['phone'];
        $instance['working_hours'] = $new_instance['working_hours'];

        return $instance;
    }

    public function form($instance)
    {
        $default_values = array(
            'title' => '',
            'phone' => '+1 215 456 15 15',
            'working_hours' => '8:00 am – 11:30 pm',
        );

        $instance = wp_parse_args((array)$instance, $default_values);

        ?>
        <p class="vincent_widget">
            <label>
                <?php echo esc_html__('Title', 'vincent'); ?>:
            </label>
            <input class="widefat"
                   type="text"
                   id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                   value="<?php echo esc_attr($instance['title']); ?>"
            />
            <label>
                <?php echo esc_html__('Phone', 'vincent'); ?>:
            </label>
            <input class="widefat"
                   type="text"
                   id="<?php echo esc_attr($this->get_field_id('phone')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('phone')); ?>"
                   value="<?php echo $instance['phone']; ?>"
            />
            <label>
                <?php echo esc_html__('Working Hours', 'vincent'); ?>:
            </label>
            <input class="widefat"
                   type="text"
                   id="<?php echo esc_attr($this->get_field_id('working_hours')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('working_hours')); ?>"
                   value="<?php echo $instance['working_hours']; ?>"
            />
        </p>
        <?php
    }

    public function widget($args, $instance)
    {
        extract($args);

        echo $before_widget;
        if ($instance['title'] !== '') {
            echo $before_title;
            echo apply_filters('widget_title', $instance['title']);
            echo $after_title;
        }

        echo '
        <div class="vincent_quick_contact">
            <div class="vincent_inner_qq">
                <div class="vincent_hphone">' . $instance['phone'] . '</div>
                <div class="vincent_hwh">' . $instance['working_hours'] . '</div>
            </div>
        </div>
        ';

        echo $after_widget;
    }
}

add_action('widgets_init', function () {
    register_widget('vincentQuickContact');
});