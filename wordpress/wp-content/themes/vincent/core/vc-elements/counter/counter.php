<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_counter',
        'name' => esc_html__('Counter', 'vincent'),
        'description' => esc_html__('Display counter', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'vincent_vc_elements_icon vincent_counter',
        'content_element' => true,
        'show_settings_on_create' => true,
        'params' => array(
            array(
                'param_name' => 'counter_count',
                'heading' => esc_html__('Counter Count', 'vincent'),
                'description' => esc_html__('Enter counter count', 'vincent'),
                'type' => 'textfield',
                'value' => '',
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'counter_title',
                'heading' => esc_html__('Counter Title', 'vincent'),
                'description' => esc_html__('Enter counter title', 'vincent'),
                'type' => 'textfield',
                'value' => '',
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'counter_icon_status',
                'heading' => esc_html__('Add Icon?', 'vincent'),
                'type' => 'checkbox',
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'counter_icon_align',
                'heading' => esc_html__('Icon Alignment', 'vincent'),
                'description' => esc_html__('Select counter icon alignment', 'vincent'),
                'type' => 'dropdown',
                'std' => 'right',
                'value' => array(
                    esc_html__('Left', 'vincent') => 'left',
                    esc_html__('Right', 'vincent') => 'right'
                ),
                'dependency' => array(
                    'element' => 'counter_icon_status',
                    'value' => 'true'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'counter_icon',
                'heading' => esc_html__('Icon', 'vincent'),
                'description' => esc_html__('Select icon from library', 'vincent'),
                'type' => 'iconpicker',
                'value' => 'fa fa-adjust',
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'fontawesome'
                ),
                'dependency' => array(
                    'element' => 'counter_icon_status',
                    'value' => 'true'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'counter_count_color',
                'heading' => esc_html__('Count Color', 'vincent'),
                'description' => esc_html__('Select counter count color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#dce4e8',
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'counter_title_color',
                'heading' => esc_html__('Title Color', 'vincent'),
                'description' => esc_html__('Select counter title color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#dce4e8',
                'edit_field_class' => 'vc_col-sm-6',
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
    class WPBakeryShortCode_PM_VC_Counter extends WPBakeryShortCode
    {
    }
}
