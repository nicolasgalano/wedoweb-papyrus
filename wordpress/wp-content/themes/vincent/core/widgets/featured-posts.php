<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

class vincentFeaturedPosts extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'vincentFeaturedPosts',
            'Featured Posts (PM)',
            array('description' => '')
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = esc_attr($new_instance['title']);
        $instance['number_of_posts'] = absint($new_instance['number_of_posts']);
        $instance['featured_images'] = esc_attr($new_instance['featured_images']);
        $instance['post_meta'] = esc_attr($new_instance['post_meta']);
        $instance['orderby'] = esc_attr($new_instance['orderby']);

        return $instance;
    }

    public function form($instance)
    {
        $default_values = array(
            'title' => esc_html__('Featured Posts', 'vincent'),
            'number_of_posts' => '2',
            'featured_images' => 'enabled',
            'post_meta' => 'enabled',
            'orderby' => 'date'
        );

        $instance = wp_parse_args((array)$instance, $default_values);

        ?>
        <p class="vincent_widget">
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php echo esc_html__('Title', 'vincent'); ?>:
            </label>
            <input class="widefat"
                   type="text"
                   id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                   value="<?php echo esc_html($instance['title']); ?>"
            />
            <label for="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>">
                <?php echo esc_html__('Number of Posts', 'vincent'); ?>:
            </label>
            <select name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>"
                    id="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>">
                <option value="2" <?php selected(absint($instance['number_of_posts']), 2); ?>>2</option>
                <option value="3" <?php selected(absint($instance['number_of_posts']), 3); ?>>3</option>
                <option value="4" <?php selected(absint($instance['number_of_posts']), 4); ?>>4</option>
                <option value="5" <?php selected(absint($instance['number_of_posts']), 5); ?>>5</option>
                <option value="6" <?php selected(absint($instance['number_of_posts']), 6); ?>>6</option>
            </select>
            <label for="<?php echo esc_attr($this->get_field_id('featured_images')); ?>">
                <?php echo esc_html__('Featured Images', 'vincent'); ?>:
            </label>
            <select name="<?php echo esc_attr($this->get_field_name('featured_images')); ?>"
                    id="<?php echo esc_attr($this->get_field_id('featured_images')); ?>">
                <option value="enabled" <?php selected($instance['featured_images'], 'enabled'); ?>>Enabled</option>
                <option value="disabled" <?php selected($instance['featured_images'], 'disabled'); ?>>Disabled</option>
            </select>
            <label for="<?php echo esc_attr($this->get_field_id('post_meta')); ?>">
                <?php echo esc_html__('Post Meta', 'vincent'); ?>:
            </label>
            <select name="<?php echo esc_attr($this->get_field_name('post_meta')); ?>"
                    id="<?php echo esc_attr($this->get_field_id('post_meta')); ?>">
                <option value="enabled" <?php selected($instance['post_meta'], 'enabled'); ?>>Enabled</option>
                <option value="disabled" <?php selected($instance['post_meta'], 'disabled'); ?>>Disabled</option>
            </select>
            <label for="<?php echo esc_attr($this->get_field_id('orderby')); ?>">
                <?php echo esc_html__('Order By', 'vincent'); ?>:
            </label>
            <select name="<?php echo esc_attr($this->get_field_name('orderby')); ?>"
                    id="<?php echo esc_attr($this->get_field_id('orderby')); ?>">
                <option value="date" <?php selected($instance['orderby'], 'date'); ?>>Date</option>
                <option value="rand" <?php selected($instance['orderby'], 'rand'); ?>>Random</option>
            </select>
        </p>
        <?php
    }

    public function widget($args, $instance)
    {
        extract($args);

        echo $before_widget;
        if ($instance['title']) {
            echo $before_title;
            echo apply_filters('widget_title', $instance['title']);
            echo $after_title;
        }

        $args = array(
            'post_type' => 'post',
            'orderby' => esc_attr($instance['orderby']),
            'post_status' => 'publish',
            'posts_per_page' => absint($instance['number_of_posts']),
        );

        query_posts($args);

        if (have_posts()) {
            echo '<div class="vincent_recent_posts vincent_items_' . absint($instance['number_of_posts']) . '">';
            while (have_posts()) {
                the_post();

                echo '
                    <div class="vincent_posts_item ' . ((vincent_get_featured_image_url() && esc_attr($instance['featured_images']) == 'enabled') ? 'vincent_block_with_fi' : 'vincent_block_without_fi') . ' ' . (($instance['featured_images'] == 'disabled' && $instance['post_meta'] == 'disabled') ? 'vincent_simple_list' : '') . '">
                        ' . ((vincent_get_featured_image_url() && esc_attr($instance['featured_images']) == 'enabled') ? '<a href="' . get_permalink() . '"><img class="vincent_fimage" src="' . aq_resize(vincent_get_featured_image_url(), 80, 80, true, true, true) . '" alt="" /></a>' : '') . '
                        <a class="vincent_featured_post_widget_title" href="' . get_permalink() . '">' . get_the_title() . '</a>';
                        if (esc_attr($instance['post_meta']) == 'enabled') {
                            ?>
                            <div class="vincent_widget_meta">
                                <div><?php echo get_the_date(); ?></div>
                            </div>
                            <?php
                        }
                         echo '
                    </div>
                ';

            }
            wp_reset_query();
            echo '</div>';
        }
        echo $after_widget;
    }
}

add_action('widgets_init', function () {
    register_widget('vincentFeaturedPosts');
});