<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

class vincentCart extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'vincentCart',
            'Shopping Cart (PM)',
            array('description' => esc_html__('Add shopping cart in style of Pixel-Mafia', 'vincent'))
        );
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = esc_attr($new_instance['title']);

        return $instance;
    }

    public function form($instance)
    {
        $default_values = array(
            'title' => ''
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

        global $woocommerce;

        echo '
            <div class="vincent_shopping_cart">
                <a class="vincent_cart_contents" href="' . esc_url(wc_get_cart_url()) . '">
                    <div class="vincent_shopping_cart_inner">
                        <div class="vincent_cart_item_counter">
                            ' . $woocommerce->cart->cart_contents_count . '
                        </div>
                        <div class="vincent_total_price">' . $woocommerce->cart->get_cart_total() . '</div>
                        <div class="vincent_total_items">
                            ' . sprintf(_n('%s item', '%s items', $woocommerce->cart->cart_contents_count, 'vincent'), $woocommerce->cart->cart_contents_count) . ' - ' . esc_html__('View Cart', 'vincent') . '
                        </div>
                    </div>
                </a>
            </div>
        ';

        echo $after_widget;
    }
}

add_action('widgets_init', function(){
   register_widget('vincentCart');
});