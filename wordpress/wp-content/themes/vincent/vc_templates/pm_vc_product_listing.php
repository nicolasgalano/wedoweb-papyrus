<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'product_listing_items' => '12',
            'product_listing_columns' => '4',
            'product_listing_order' => 'asc',
            'show_product_categories' => 'all',
            'product_categories_listing' => '',
            'product_first_category' => '',
            'product_listing_view_type' => 'type_1',
            'excerpt_length' => '70',
            'custom_css' => '',
            'custom_class' => ''
        ), $atts
    )
);

if (isset($show_product_categories) && $show_product_categories == 'custom') {
	$product_categories_listing = str_replace(" ", "", $product_categories_listing);
	$prod_categories = explode(',', $product_categories_listing);
} else {
	$prod_categories = get_terms('product_cat');
}

$saved_product_first_category = get_term_by('id', $product_first_category, 'product_cat');
if (is_object($saved_product_first_category)) {} else {
    $product_first_category = $prod_categories[1]->term_id;
}

if ($excerpt_length == '') {
    $excerpt_length = 70;
}

wp_enqueue_style('swipebox', get_template_directory_uri() . '/css/swipebox.css');
wp_enqueue_script('swipebox', get_template_directory_uri() . '/js/jquery.swipebox.js', true, false, true);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);
$html = '';
$vincent_product_output_container = 'vincent_prod_listing_' . (time() . mt_rand(9000, 9999) . '');

$html .= '
    <div class="pm_vc_product_listing ' . esc_attr($custom_class) . esc_attr($css_class) . '">
        <div class="vincent_prod_cat_container">
            <ul class="vincent_prod_cat_listing">
                ';

				
				foreach ($prod_categories as $prod_category) {
					if (isset($show_product_categories) && $show_product_categories == 'custom') {
						$set_query_args = '{"output_template": "vincent_product_listing_template", "post_type": "product", "post_status": "publish", "posts_first_load": ' . absint($product_listing_items) . ', "posts_per_page": ' . absint($product_listing_items) . ', "offset": 0, "order": "' . esc_attr($product_listing_order) . '", "taxonomy":"product_cat", "field":"id", "terms": ' . absint($prod_category) . ', "remove_links_mode": "' . esc_attr(vincent_get_theme_mod('product_page_remove')) . '", "excerpt_length": ' . esc_attr($excerpt_length) . '}';
						
						$html .= '
		                    <li class="vincent_prod_cat_item ' . (($prod_category == $product_first_category) ? 'vincent_ajax_prod_list active' : '') . '" data-args=\'' . $set_query_args . '\' data-return-to="' . $vincent_product_output_container . '">' . esc_html(get_term($prod_category)->name) . '</li>
		                ';
					} else {
						$set_query_args = '{"output_template": "vincent_product_listing_template", "post_type": "product", "post_status": "publish", "posts_first_load": ' . absint($product_listing_items) . ', "posts_per_page": ' . absint($product_listing_items) . ', "offset": 0, "order": "' . esc_attr($product_listing_order) . '", "taxonomy":"product_cat", "field":"id", "terms": ' . absint($prod_category->term_taxonomy_id) . ', "remove_links_mode": "' . esc_attr(vincent_get_theme_mod('product_page_remove')) . '", "excerpt_length": ' . esc_attr($excerpt_length) . '}';
						
						
						$html .= '
		                    <li class="vincent_prod_cat_item ' . (($prod_category->term_taxonomy_id == $product_first_category) ? 'vincent_ajax_prod_list active' : '') . '" data-args=\'' . $set_query_args . '\' data-return-to="' . $vincent_product_output_container . '">' . esc_html($prod_category->name) . '</li>
		                ';
					}
				}

                $html .= '
            </ul>
        </div>

        <div class="vincent_prod_output_container ' . $vincent_product_output_container . ' ' . (($product_listing_view_type == 'type_1') ? 'columns_' . esc_attr($product_listing_columns) . '' : 'columns_2') . ' view_'  . $product_listing_view_type .' "></div>
    </div>
';

echo $html;