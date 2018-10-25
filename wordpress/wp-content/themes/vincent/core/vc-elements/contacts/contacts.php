<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_contacts',
        'name' => esc_html__('Contacts', 'vincent'),
        'description' => esc_html__('Display element contacts', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'vincent_vc_elements_icon vincent_contacts',
        'content_element' => true,
        'show_settings_on_create' => true,
        'params' => array(
            array(
                'param_name' => 'map_code',
                'heading' => esc_html__('Map Embed Code', 'vincent'),
                'description' => esc_html__('Enter code of Your map', 'vincent'),
                'type' => 'textarea_raw_html',
                'value' => ''
            ),

            array(
                'param_name' => 'map_position',
                'heading' => esc_html__('Map Position', 'vincent'),
                'description' => esc_html__('Select map position', 'vincent'),
                'type' => 'dropdown',
                'std' => 'left',
                'value' => array(
                    esc_html__('Left', 'vincent') => 'left',
                    esc_html__('Right', 'vincent') => 'right'
                )
            ),

            array(
                'param_name' => 'content',
                'heading' => esc_html__('Text', 'vincent'),
                'description' => esc_html__('Enter Your contact information', 'vincent'),
                'type' => 'textarea_html',
                'value' => '',
            ),

            array(
                'param_name' => 'contact_image',
                'heading' => esc_html__('Image', 'vincent'),
                'description' => esc_html__('Upload the custom image', 'vincent'),
                'type' => 'attach_image',
                'value' => '',
            ),

            array(
                'param_name' => 'contact_bg_color',
                'heading' => esc_html__('Background Color', 'vincent'),
                'description' => esc_html__('Select background color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#1d2326',
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
    class WPBakeryShortCode_PM_VC_Contacts extends WPBakeryShortCode
    {
    }
}
