<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_custom_products',
        'name' => esc_html__('Custom Products', 'vincent'),
        'description' => esc_html__('Display selected products', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'vincent_vc_elements_icon vincent_custom_products',
        'content_element' => true,
        'show_settings_on_create' => true,
        'params' => array(
            array(
                'param_name' => 'prod_list',
                'heading' => esc_html__('Product Listing', 'vincent'),
                'description' => esc_html__('Enter the ids of products separated by commas', 'vincent'),
                'type' => 'textfield',
                'value' => ''
            ),

            array(
                'param_name' => 'group_image_status',
                'heading' => esc_html__('Add Image', 'vincent'),
                'type' => 'checkbox'
            ),

            array(
                'param_name' => 'group_image',
                'heading' => esc_html__('Image', 'vincent'),
                'description' => esc_html__('Upload the custom image', 'vincent'),
                'type' => 'attach_image',
                'value' => '',
                'dependency' => array(
                    'element' => 'group_image_status',
                    'value' => 'true'
                )
            ),

            array(
                'param_name' => 'image_position',
                'heading' => esc_html__('Image Position', 'vincent'),
                'description' => esc_html__('Select image position', 'vincent'),
                'type' => 'dropdown',
                'std' => 'left',
                'value' => array(
                    esc_html__('Left', 'vincent') => 'left',
                    esc_html__('Right', 'vincent') => 'right'
                ),
                'dependency' => array(
                    'element' => 'group_image_status',
                    'value' => 'true'
                )
            ),

            array(
                'param_name' => 'list_bg_color',
                'heading' => esc_html__('Background Color', 'vincent'),
                'description' => esc_html__('Select background color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#121618',
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'custom_class',
                'heading' => esc_html__('Custom Class', 'vincent'),
                'description' => '',
                'type' => 'textfield',
                'value' => '',
                'admin_label' => false,
                'weight' => 0,
            ),

            array(
                'param_name' => 'custom_css',
                'heading' => esc_html__('CSS', 'vincent'),
                'type' => 'css_editor',
                'group' => esc_html__('Design Options', 'vincent'),
            )
        )
    ));
}

if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_PM_VC_Custom_Products extends WPBakeryShortCode
    {
    }
}
