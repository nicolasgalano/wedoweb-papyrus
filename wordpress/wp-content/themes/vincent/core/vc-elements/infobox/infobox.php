<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_infobox',
        'name' => esc_html__('Info Box', 'vincent'),
        'description' => esc_html__('Display Your info box', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'vincent_vc_elements_icon vincent_infobox',
        'content_element' => true,
        'show_settings_on_create' => true,
        'params' => array(
            array(
                'param_name' => 'infobox_title',
                'heading' => esc_html__('Title', 'vincent'),
                'description' => esc_html__('Enter info box title', 'vincent'),
                'type' => 'textfield',
                'value' => '',
                'admin_panel' => true,
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'infobox_title_tag',
                'heading' => esc_html__('Element Tag', 'vincent'),
                'description' => esc_html__('Select element tag', 'vincent'),
                'type' => 'dropdown',
                'std' => 'h5',
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
                'param_name' => 'infobox_title_align',
                'heading' => esc_html__('Title Alignment', 'vincent'),
                'description' => esc_html__('Select title alignment', 'vincent'),
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
                'param_name' => 'infobox_text',
                'heading' => esc_html__('Info Box Text', 'vincent'),
                'description' => esc_html__('Enter Your information', 'vincent'),
                'type' => 'textarea',
                'value' => '',
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'infobox_text_align',
                'heading' => esc_html__('Text Alignment', 'vincent'),
                'description' => esc_html__('Select text alignment', 'vincent'),
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
                'param_name' => 'infobox_height',
                'heading' => esc_attr__('Info Box Height', 'vincent'),
                'description' => esc_html__('Enter height of info box (in pixels)', 'vincent'),
                'type' => 'textfield',
                'value' => '200px',
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'infobox_bg_image_status',
                'heading' => esc_html__('Background Image?', 'vincent'),
                'type' => 'checkbox',
                'group' => esc_html__('General', 'vincent')
            ),

            array(
                'param_name' => 'infobox_bg_image',
                'heading' => esc_html__('Background Image', 'vincent'),
                'description' => esc_html__('Upload the background image', 'vincent'),
                'type' => 'attach_image',
                'value' => '',
                'dependency' => array(
                    'element' => 'infobox_bg_image_status',
                    'value' => 'true'
                ),
                'group' => esc_html__('General', 'vincent')
            ),
	
	        array(
		        'param_name' => 'infobox_link_status',
		        'heading' => esc_html__('Linked Element?', 'vincent'),
		        'type' => 'checkbox',
		        'group' => esc_html__('General', 'vincent')
	        ),
	
	        array(
		        'param_name' => 'infobox_link',
		        'heading' => esc_html__('URL (Link)', 'vincent'),
		        'type' => 'vc_link',
		        'description' => esc_html__('Add element link', 'vincent'),
		        'dependency' => array(
		        	'element' => 'infobox_link_status',
			        'value' => 'true'
		        ),
		        'group' => esc_html__('General', 'vincent')
	        ),

            array(
                'param_name' => 'infobox_title_color',
                'heading' => esc_html__('Title Color', 'vincent'),
                'description' => esc_html__('Select title color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#ffffff',
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'infobox_text_color',
                'heading' => esc_html__('Text Color', 'vincent'),
                'description' => esc_html__('Select text color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#dce4e8',
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__('Color Options', 'vincent')
            ),

            array(
                'param_name' => 'infobox_bg_color',
                'heading' => esc_html__('Background Color', 'vincent'),
                'description' => esc_html__('Select background color', 'vincent'),
                'type' => 'colorpicker',
                'value' => '#1d2326',
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
    class WPBakeryShortCode_PM_VC_Infobox extends WPBakeryShortCode
    {
    }
}
