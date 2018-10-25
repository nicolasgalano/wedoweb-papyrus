<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_custom_map',
        'name' => esc_html__('Custom Map', 'vincent'),
        'description' => esc_html__('Display Your custom map', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'vincent_vc_elements_icon vincent_custom_map',
        'content_element' => true,
        'show_settings_on_create' => true,
        'params' => array(
            array(
                'param_name' => 'custom_map_code',
                'heading' => esc_html__('Map Embed Code', 'vincent'),
                'description' => esc_html__('Enter code of Your map', 'vincent'),
                'type' => 'textarea_raw_html',
                'value' => '',
                'group' => esc_html__('General', 'vincent'),
            ),

            array(
                'param_name' => 'custom_map_height_mode',
                'heading' => esc_html__('Map Height Mode', 'vincent'),
                'description' => esc_html__('Select map height mode', 'vincent'),
                'type' => 'dropdown',
                'std' => 'custom',
                'value' => array(
                    esc_html__('The map have full height of the parent element', 'vincent') => 'full',
                    esc_html__('Custom height of the map (in pixels)', 'vincent') => 'custom'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'custom_map_height',
                'heading' => esc_html__('Map Height', 'vincent'),
                'description' => esc_html__('Enter map heading (in pixels)', 'vincent'),
                'type' => 'textfield',
                'value' => '600px',
                'dependency' => array(
                    'element' => 'custom_map_height_mode',
                    'value' => 'custom'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'custom_class',
                'heading' => esc_html__('Custom Class', 'vincent'),
                'description' => '',
                'type' => 'textfield',
                'value' => '',
                'admin_label' => false,
                'weight' => 0,
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'custom_css',
                'heading' => esc_html__('CSS', 'vincent'),
                'type' => 'css_editor',
                'group' => esc_html__('Design options', 'vincent'),
            )
        )
    ));
}

if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_PM_VC_Custom_Map extends WPBakeryShortCode
    {
    }
}
