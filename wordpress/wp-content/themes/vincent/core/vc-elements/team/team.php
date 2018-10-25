<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_team',
        'name' => esc_html__('Team', 'vincent'),
        'description' => esc_html__('Display Team', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'vincent_vc_elements_icon vincent_team',
        'as_parent' => array('only' => 'pm_vc_team_item'),
        'content_element' => true,
        'is_container' => true,
        'show_settings_on_create' => false,
        'params' => array(
            array(
                'param_name' => 'columns',
                'heading' => esc_html__('Columns', 'vincent'),
                'description' => '',
                'std' => '3',
                'type' => 'dropdown',
                'value' => array(
                    '2' => '2',
                    '3' => '3',
                    '4' => '4'
                ),
                'class' => 'vincent_vc_title_class vincent_delim_dot',
                'admin_label' => true,
                'weight' => 0,
                'group' => esc_html__('General', 'vincent')
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
                'group' => esc_html__('Design options', 'vincent'),
            ),
        ),
        'js_view' => 'VcColumnView'
    ));
}

if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_PM_VC_Team extends WPBakeryShortCodesContainer
    {
    }
}

# Team Item
if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_team_item',
        'name' => esc_html__('Team Item', 'vincent'),
        'description' => esc_html__('Create the team item', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'vincent_vc_elements_icon vincent_team_item',
        'as_child' => array('only' => 'pm_vc_team'),
        'is_container' => false,
        'show_settings_on_create' => true,
        'params' => array(
            array(
                'param_name' => 'team_image',
                'heading' => esc_html__('Featured Image', 'vincent'),
                'type' => 'attach_image',
                'description' => esc_html__('Select featured image from media library.', 'vincent'),
                'value' => '',
            ),

            array(
                'param_name' => 'team_name',
                'heading' => esc_html__('Name', 'vincent'),
                'type' => 'textfield',
                'description' => esc_html__('Enter the name of the worker', 'vincent'),
                'value' => '',
                'admin_label' => true
            ),

            array(
                'param_name' => 'team_position',
                'heading' => esc_html__('Position', 'vincent'),
                'type' => 'textfield',
                'description' => esc_html__('Enter the position of the worker', 'vincent'),
                'value' => ''
            ),

            array(
                'param_name' => 'social_buttons_status',
                'heading' => esc_html__('Add Social Buttons?', 'vincent'),
                'type' => 'checkbox'
            ),

            array(
                'param_name' => 'social_buttons',
                'heading' => esc_html__('Social Buttons', 'vincent'),
                'type' => 'param_group',
                'value' => '',
                'dependency' => array(
                    'element' => 'social_buttons_status',
                    'value' => 'true'
                ),
                'params' => array(
                    array(
                        'param_name' => 'team_button_link',
                        'heading' => esc_html__('URL (link)', 'vincent'),
                        'type' => 'vc_link',
                        'description' => esc_html__('Add link to button', 'vincent')
                    ),

                    array(
                        'param_name' => 'team_button_icon_fontawesome',
                        'heading' => esc_html__( 'Icon', 'vincent' ),
                        'type' => 'iconpicker',
                        'value' => 'fa fa-adjust',
                        'description' => esc_html__( 'Select icon from library.', 'vincent' ),
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'fontawesome',
                        )
                    ),

                    array(
                        'param_name' => 'team_button_color',
                        'heading' => esc_html__('Color', 'vincent'),
                        'type' => 'colorpicker',
                        'description' => esc_html__('Button color', 'vincent'),
                        'value' => '#1d2326',
                        'edit_field_class' => 'vc_col-sm-6'
                    ),

                    array(
                        'param_name' => 'team_button_hover',
                        'heading' => esc_html__('Hover Color', 'vincent'),
                        'type' => 'colorpicker',
                        'description' => esc_html__('Button hover color', 'vincent'),
                        'value' => '#dce4e8',
                        'edit_field_class' => 'vc_col-sm-6'
                    )
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback',
                )
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
    ));
}

if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_PM_VC_Team_Item extends WPBakeryShortCode
    {
    }
}
