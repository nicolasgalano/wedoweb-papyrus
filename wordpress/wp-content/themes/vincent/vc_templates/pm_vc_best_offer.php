<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'best_offer_list' => '',
            'custom_class' => '',
            'custom_css' => ''
        ), $atts
    )
);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);
$html = '';

$prod_list = explode(', ', $best_offer_list);

$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'order' => 'asc',
    'post__in' => $prod_list
);

query_posts($args);

$html .= '
    <div class="pm_vc_best_offer ' . esc_attr($custom_class) . esc_attr($css_class) . '">
        <div class="vincent_best_offer_output_container view_type_2 columns_2">
            ';

            if (have_posts()) {
                while (have_posts()) {
                    the_post();

                    $best_offer_field = get_post_meta(get_the_ID(), 'best_offer_field', true);
                    $ingredients_field = get_post_meta(get_the_ID(), 'ingredients_field', true);

                    $html .= '
                        <div class="vincent_prod_list_item">
                            <div class="vincent_prod_item_wrapper">
                                <div class="vincent_prod_list_image_cont">
                                    <div class="vincent_prod_list_image_wrapper">
                                        <div class="vincent_prod_list_overlay"></div>
                                        ';
                    
                                        if (vincent_get_featured_image_url() !== false) {
	                                        $html .= '
	                                            <img src="' . aq_resize(esc_url(vincent_get_featured_image_url()), 600, 600, true, true, true) . '" alt="" />
	                                        ';
                                        } else {
	                                        $html .= '
	                                            <img src="' . WP_PLUGIN_URL . '/woocommerce/assets/images/placeholder.png' . '" alt="" />
	                                        ';
                                        }
                    
                                        
	                                    $html .= '
                                        ' . do_shortcode('[add_to_cart id="' . get_the_ID() . '" style="border: none;"]') . '
                                    </div>
                                </div>

                                <h5>
                                    <a href="' . ((vincent_get_theme_mod('product_page_remove') == 'disabled') ? '' . esc_url(get_permalink(get_the_ID())) . '' : 'javascript:void(0)') . '">
                                        ' . get_the_title(get_the_ID()) . '
                                    </a>
                                </h5>

                                <div class="vincent_best_offer_field">
                                    <span>' . esc_html($best_offer_field) . '</span>
                                </div>

                                <div class="vincent_ingredients_field">
                                    <span>' . esc_html($ingredients_field) . '</span>
                                </div>

                                <div class="vincent_prod_list_price">
                                    ' . do_shortcode('[add_to_cart id="' . get_the_ID() . '" style="border: none;"]') . '
                                </div>
                            </div>
                        </div>
                    ';
                }

                wp_reset_query();
            }

            $html .= '
        </div>
    </div>
';

echo $html;