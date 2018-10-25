<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_custom_button',
        'name' => esc_html__('Custom Button', 'vincent'),
        'description' => esc_html__('Add Your Button', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'vincent_vc_elements_icon vincent_custom_button',
        'content_element' => true,
        'show_settings_on_create' => true,
        'params' => array(
            array(
                'param_name' => 'button_text',
                'heading' => esc_html__('Button Text', 'vincent'),
                'description' => '',
                'type' => 'textfield',
                'value' => esc_html__('Text on the button', 'vincent'),
                'admin_label' => true,
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'button_link',
                'heading' => esc_html__('URL (Link)', 'vincent'),
                'type' => 'vc_link',
                'description' => esc_html__('Add link to button', 'vincent'),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'button_type',
                'heading' => esc_html__('Button Type', 'vincent'),
                'description' => esc_html__('Select button view type', 'vincent'),
                'type' => 'dropdown',
                'std' => 'bordered',
                'value' => array(
                    esc_html__('Bordered Button', 'vincent') => 'bordered',
                    esc_html__('Colored Button', 'vincent') => 'colored'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'button_size',
                'heading' => esc_html__('Button Size', 'vincent'),
                'description' => esc_html__('Select button size', 'vincent'),
                'type' => 'dropdown',
                'std' => 'normal',
                'value' => array(
                    esc_html__('Mini', 'vincent') => 'mini',
                    esc_html__('Small', 'vincent') => 'small',
                    esc_html__('Normal', 'vincent') => 'normal',
                    esc_html__('Large', 'vincent') => 'large'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'button_align',
                'heading' => esc_html__('Button Alignment', 'vincent'),
                'description' => esc_html__('Select button alignment', 'vincent'),
                'type' => 'dropdown',
                'std' => 'center',
                'value' => array(
                    esc_html__('Left', 'vincent') => 'left',
                    esc_html__('Center', 'vincent') => 'center',
                    esc_html__('Right', 'vincent') => 'right'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'button_icon_status',
                'heading' => esc_html__('Add Icon?', 'vincent'),
                'type' => 'checkbox',
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'icon_align',
                'heading' => esc_html__('Icon Alignment', 'vincent'),
                'description' => esc_html__('Select icon alignment', 'vincent'),
                'type' => 'dropdown',
                'std' => 'right',
                'value' => array(
                    esc_html__('Left', 'vincent') => 'left',
                    esc_html__('Right', 'vincent') => 'right'
                ),
                'dependency' => array(
                    'element' => 'button_icon_status',
                    'value' => 'true'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'button_icon',
                'heading' => esc_html__('Icon', 'vincent'),
                'description' => esc_html__('Select icon from library', 'vincent'),
                'type' => 'iconpicker',
                'value' => 'fa fa-adjust',
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'fontawesome'
                ),
                'dependency' => array(
                    'element' => 'button_icon_status',
                    'value' => 'true'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'text_color',
                'heading' => esc_html__('Button Text Color', 'vincent'),
                'description' => esc_html__('Select button text color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#ffffff',
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'hover_color',
                'heading' => esc_html__('Hover Text Color', 'vincent'),
                'description' => esc_html__('Select hover text color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#ffc851',
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'border_color',
                'heading' => esc_html__('Border Color', 'vincent'),
                'description' => esc_html__('Select border color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#ffffff',
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'button_type',
                    'value' => 'bordered'
                ),
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'border_hover_color',
                'heading' => esc_html__('Hover Border Color', 'vincent'),
                'description' => esc_html__('Select hover border color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#ffc851',
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'button_type',
                    'value' => 'bordered'
                ),
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'button_bg_color',
                'heading' => esc_html__('Background Color', 'vincent'),
                'description' => esc_html__('Select background color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#ffc851',
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'button_type',
                    'value' => 'colored'
                ),
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'hover_bg_color',
                'heading' => esc_html__('Hover Background Color', 'vincent'),
                'description' => esc_html__('Select hover background color', 'vincent'),
                'type' => 'colorpicker',
                'value' => 'transparent',
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'button_type',
                    'value' => 'colored'
                ),
                'group' => esc_html__('Color Options', 'vincent')
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
                'group' => esc_html__('General', 'vincent')
            )
        ),
    ));
}

if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_PM_VC_Custom_Button extends WPBakeryShortCode
    {
    }
}
