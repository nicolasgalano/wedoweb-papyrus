<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

add_action('wp_ajax_vincent_ajax_query_posts', 'vincent_ajax_query_posts');
add_action('wp_ajax_nopriv_vincent_ajax_query_posts', 'vincent_ajax_query_posts');
function vincent_ajax_query_posts()
{
    $args = vincent_objectToArray(json_decode(stripslashes(sanitize_text_field($_POST['vincent_ajax_query_posts']))));

    query_posts($args);

    if (have_posts()) {
        while (have_posts()) {
            the_post();

            # Template 1
            if ($args['output_template'] == 'template1') {
                the_title();
            }

        }
        wp_reset_query();
    }

    die();
}

# Element Product Listing
add_action('wp_ajax_vincent_ajax_product_listing', 'vincent_ajax_product_listing');
add_action('wp_ajax_nopriv_vincent_ajax_product_listing', 'vincent_ajax_product_listing');
function vincent_ajax_product_listing()
{
    $args = vincent_objectToArray(json_decode(stripslashes(sanitize_text_field($_POST['vincent_ajax_query_posts']))));

    $new_args = array(
        'post_type' => $args['post_type'],
        'post_status' => $args['post_status'],
        'posts_per_page' => $args['posts_per_page'],
        'offset' => $args['offset'],
        'order' => $args['order']
    );

    $new_args['tax_query'] = array(
        array(
            'taxonomy' => $args['taxonomy'],
            'field' => $args['field'],
            'terms' => $args['terms']
        )
    );

    $vincent_wp_query = new WP_Query();

    $vincent_wp_query->query($new_args);

    while ($vincent_wp_query->have_posts()) {
        $vincent_wp_query->the_post();
        
        $html = '
            <div class="vincent_prod_list_item">
                <div class="vincent_prod_item_wrapper">
                    <div class="vincent_prod_list_image_cont">
                        <div class="vincent_prod_list_image_wrapper">
                            
                            ';
	
							if (vincent_get_featured_image_url() !== false) {
								$html .= '
									<a href="' . (($args['remove_links_mode'] == 'disabled') ? '' . esc_url(get_permalink(get_the_ID())) . '' : '' . esc_url(vincent_get_featured_image_url()) . '') . '" class="vincent_prod_image_link ' . (($args['remove_links_mode'] == 'disabled') ? '' : 'swipebox') . '">
										<span class="vincent_prod_list_overlay"></span>
										<img src="' . aq_resize(esc_url(vincent_get_featured_image_url()), 600, 600, true, true, true) . '" alt="" />
									</a>
								';
							} else {
								$html .= '
									<a href="' . (($args['remove_links_mode'] == 'disabled') ? '' . esc_url(get_permalink(get_the_ID())) . '' : '' . WP_PLUGIN_URL . '/woocommerce/assets/images/placeholder.png' . '') . '" class="vincent_prod_image_link ' . (($args['remove_links_mode'] == 'disabled') ? '' : 'swipebox') . '">
										<span class="vincent_prod_list_overlay"></span>
										<img src="' . WP_PLUGIN_URL . '/woocommerce/assets/images/placeholder.png' . '" alt="" />
									</a>
								';
							}
							
		                    $html .= '
                            ' . do_shortcode('[add_to_cart id="' . get_the_ID() . '" style="border: none;"]') . '
                        </div>
                    </div>

                    <h5><a href="' . (($args['remove_links_mode'] == 'disabled') ? '' . esc_url(get_permalink(get_the_ID())) . '' : 'javascript:void(0)') . '">' . get_the_title(get_the_ID()) . '</a></h5>

                    <p class="vincent_prod_list_excerpt">
                        ' . substr(get_the_excerpt(get_the_ID()), 0, $args['excerpt_length']) . '
                        
                    </p>

                    <div class="vincent_prod_list_price">
                        ' . do_shortcode('[add_to_cart id="' . get_the_ID() . '" style="border: none;"]') . '
                    </div>
                </div>
            </div>
        ';
	
        echo $html;
    }

    wp_reset_postdata();

    die();
}

# Reset All Settings
add_action('wp_ajax_vincent_reset_all_settings', 'vincent_reset_all_settings');
function vincent_reset_all_settings()
{
	if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permissions to access this page.', 'vincent'));
    }
    
	remove_theme_mods();
	
	die(esc_html__('Done!', 'vincent'));
}