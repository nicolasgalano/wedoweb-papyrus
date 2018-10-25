<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
    $prod_categories = get_terms('product_cat');
    $dropdown = array();
    foreach ($prod_categories as $prod_category) {
        $dropdown[$prod_category->name] = $prod_category->term_taxonomy_id;
    }
    
    vc_map(
        array(
            'base' => 'pm_vc_product_listing',
            'name' => esc_html__('Product Listing', 'vincent'),
            'description' => esc_html__('List all products in style of Pixel-Mafia', 'vincent'),
            'category' => esc_html__('Pixel-Mafia', 'vincent'),
            'icon' => 'vincent_vc_elements_icon vincent_product_listing',
            'content_element' => true,
            'show_settings_on_create' => true,
            'params' => array(
                array(
                    'param_name' => 'product_listing_view_type',
                    'heading' => esc_html__('View Type', 'vincent'),
                    'description' => esc_html__('Select element view type', 'vincent'),
                    'type' => 'dropdown',
                    'std' => 'type_1',
                    'value' => array(
                        esc_html__('Type 1', 'vincent') => 'type_1',
                        esc_html__('Type 2', 'vincent') => 'type_2'
                    )
                ),

                array(
                    'param_name' => 'product_listing_items',
                    'heading' => esc_html__('Products Per Page', 'vincent'),
                    'description' => esc_html__('Enter the number of products displayed on page', 'vincent'),
                    'type' => 'textfield',
                    'value' => '12'
                ),

                array(
                    'param_name' => 'product_listing_columns',
                    'heading' => esc_html__('Columns', 'vincent'),
                    'description' => esc_html__('Select the number of columns', 'vincent'),
                    'type' => 'dropdown',
                    'std' => '4',
                    'value' => array(
                        esc_html__('2', 'vincent') => '2',
                        esc_html__('3', 'vincent') => '3',
                        esc_html__('4', 'vincent') => '4',
                        esc_html__('5', 'vincent') => '5'
                    ),
                    'dependency' => array(
                        'element' => 'product_listing_view_type',
                        'value' => 'type_1'
                    )
                ),

                array(
                    'param_name' => 'product_listing_order',
                    'heading' => esc_html__('Sort Order', 'vincent'),
                    'description' => esc_html__('Select ordering type', 'vincent'),
                    'type' => 'dropdown',
                    'std' => 'asc',
                    'value' => array(
                        esc_html__('Ascending', 'vincent') => 'asc',
                        esc_html__('Descending', 'vincent') => 'desc'
                    )
                ),
                
                array(
                	'param_name' => 'show_product_categories',
	                'heading' => esc_html__('Displayed Product Categories', 'vincent'),
	                'description' => esc_html__('Select the categories to be displayed', 'vincent'),
	                'type' => 'dropdown',
	                'std' => 'all',
	                'value' => array(
	                	esc_html__('All Categories', 'vincent') => 'all',
		                esc_html__('Custom Categories', 'vincent') => 'custom'
	                )
                ),
                
                array(
                	'param_name' => 'product_categories_listing',
	                'heading' => esc_html__('Custom Product Categories Listing', 'vincent'),
	                'description' => esc_html__('Enter the ids of product categories separated by commas', 'vincent'),
	                'type' => 'textfield',
	                'value' => '',
	                'dependency' => array(
	                	'element' => 'show_product_categories',
		                'value' => 'custom'
	                )
                ),

                array(
                    'param_name' => 'product_first_category',
                    'heading' => esc_html__('First Displayed Product Category', 'vincent'),
                    'description' => esc_html__('Select the first of the displayed category', 'vincent'),
                    'type' => 'dropdown',
                    'value' => $dropdown
                ),

                array(
                    'param_name' => 'excerpt_length',
                    'heading' => esc_html__('Length of Excerpt', 'vincent'),
                    'description' => esc_html__('Enter the number of character of the excerpt', 'vincent'),
                    'type' => 'textfield',
                    'value' => '70',
                ),

                array(
                    'param_name' => 'custom_css',
                    'heading' => esc_html__('CSS', 'vincent'),
                    'type' => 'css_editor',
                    'group' => esc_html__('Design options', 'vincent'),
                ),

                array(
                    'param_name' => 'custom_class',
                    'heading' => esc_html__('Custom Class', 'vincent'),
                    'description' => '',
                    'type' => 'textfield',
                    'value' => '',
                    'admin_label' => false,
                    'weight' => 0,
                )
            )
        )
    );
}

if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_PM_VC_Product_Listing extends WPBakeryShortCode
    {
    }
}
