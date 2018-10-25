<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_iconbox',
        'name' => esc_html__('Iconbox', 'vincent'),
        'description' => esc_html__('Display Iconbox', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'vincent_vc_elements_icon vincent_iconbox',
        'content_element' => true,
        'show_settings_on_create' => true,
        'params' => array(
            array(
                'param_name' => 'icon_type',
                'heading' => esc_html__('Icon Type', 'vincent'),
                'description' => esc_html__('Select type of icon', 'vincent'),
                'type' => 'dropdown',
                'std' => 'image_icon',
                'value' => array(
                    esc_html__('Image Icon', 'vincent') => 'image_icon',
                    esc_html__('Font Icon', 'vincent') => 'font_icon'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'icon_image_type',
                'heading' => esc_html__('Image Icon', 'vincent'),
                'description' => esc_html__('Upload the custom image icon', 'vincent'),
                'type' => 'attach_image',
                'value' => '',
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'image_icon'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'icon_font_type',
                'heading' => esc_html__('Font Icon', 'vincent'),
                'description' => esc_html__('Select icon from library', 'vincent'),
                'type' => 'iconpicker',
                'value' => 'fa fa-adjust',
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'fontawesome'
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font_icon'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'icon_font_type_font_size',
                'heading' => esc_html__('Icon Font Size', 'vincent'),
                'description' => esc_html__('Enter font size', 'vincent'),
                'type' => 'textfield',
                'value' => '',
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font_icon'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'icon_align',
                'heading' => esc_html__('Icon Alignment', 'vincent'),
                'description' => esc_html__('Select icon alignment', 'vincent'),
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
                'param_name' => 'iconbox_heading',
                'heading' => esc_html__('Iconbox Heading', 'vincent'),
                'description' => esc_html__('Enter iconbox heading', 'vincent'),
                'type' => 'textfield',
                'value' => '',
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'iconbox_heading_tag',
                'heading' => esc_html__('Element Tag', 'vincent'),
                'description' => esc_html__('Select element tag', 'vincent'),
                'type' => 'dropdown',
                'std' => 'h4',
                'value' => array(
                    esc_html__('h1', 'vincent') => 'h1',
                    esc_html__('h2', 'vincent') => 'h2',
                    esc_html__('h3', 'vincent') => 'h3',
                    esc_html__('h4', 'vincent') => 'h4',
                    esc_html__('h5', 'vincent') => 'h5',
                    esc_html__('h6', 'vincent') => 'h6',
                    esc_html__('p', 'vincent') => 'p'
                ),
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'iconbox_heading_align',
                'heading' => esc_html__('Iconbox Heading Alignment', 'vincent'),
                'description' => esc_html__('Select heading alignment', 'vincent'),
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
                'param_name' => 'iconbox_text',
                'heading' => esc_html__('Iconbox Text', 'vincent'),
                'description' => esc_html__('Enter iconbox text', 'vincent'),
                'type' => 'textarea',
                'value' => '',
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'iconbox_text_align',
                'heading' => esc_html__('Iconbox Text Alignment', 'vincent'),
                'description' => esc_html__('Select iconbox text alignment', 'vincent'),
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
                'param_name' => 'iconbox_heading_color',
                'heading' => esc_html__('Iconbox Heading Color', 'vincent'),
                'description' => esc_html__('Select iconbox heading color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#121618',
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'iconbox_text_color',
                'heading' => esc_html__('Iconbox Text Color', 'vincent'),
                'description' => esc_html__('Select icondox text color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#121618',
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'iconbox_icon_color',
                'heading' => esc_html__('Icon Color', 'vincent'),
                'description' => esc_html__('Select icon color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#121618',
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font_icon'
                ),
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'iconbox_bg_color',
                'heading' => esc_html__('Background Color', 'vincent'),
                'description' => esc_html__('Select background color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '',
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
    class WPBakeryShortCode_PM_VC_Iconbox extends WPBakeryShortCode
    {
    }
}
