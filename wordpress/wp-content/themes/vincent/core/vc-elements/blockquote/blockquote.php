<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/
if (function_exists('vc_map')) {
	vc_map(
		array(
			'name' => esc_html__('Blockquote', 'vincent'),
			'base' => 'pm_vc_blockquote',
			'description' => 'Display blockquote.',
			'category' => esc_html__('Pixel-Mafia', 'vincent'),
			'icon' => 'vincent_vc_elements_icon vincent_blockquote',
			'params' => array(

                array(
                    "param_name" => "content",
                    "heading" => __( "Blockquote Text", "vincent" ),
                    "type" => "textarea_html",
                    "holder" => "div",
                    "class" => "",
                ),

                array(
                    "param_name" => "blockquote_author",
                    "heading" => __( "Author", "vincent" ),
                    "type" => "textfield",
                    "holder" => "span",
                    "class" => "vincent_delim_comma",
                ),

                array(
                    "param_name" => "blockquote_author_position",
                    "heading" => __( "Author Position", "vincent" ),
                    "type" => "textfield",
                    "holder" => "span",
                    "class" => "",
                ),

                array(
                    'param_name' => 'blockquote_view_type',
                    'heading' => esc_html__('View Type', 'vincent'),
                    'description' => esc_html__('Select the view type', 'vincent'),
                    'type' => 'dropdown',
                    'std' => 'type_1',
                    'value' => array(
                        esc_html__('Type 1', 'vincent') => 'type_1',
                        esc_html__('Type 2', 'vincent') => 'type_2'
                    ),
                ),
                array(
                    'param_name' => 'blockquote_author_avatar',
                    'heading' => esc_html__('Author Avatar', 'vincent'),
                    'type' => 'checkbox'
                ),

                array(
                    'param_name' => 'blockquote_author_image',
                    'heading' => esc_html__('Avatar Image', 'vincent'),
                    'description' => esc_html__('Upload the custom image', 'vincent'),
                    'type' => 'attach_image',
                    'value' => '',
                    'dependency' => array(
                        'element' => 'blockquote_author_avatar',
                        'value' => 'true'
                    )
                ),

                array(
                    'param_name' => 'blockquote_author_color',
                    'heading' => esc_html__('Author Color', 'vincent'),
                    'description' => esc_html__('Select the author color', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#121618',
                    'dependency' => array(
                        'element' => 'blockquote_view_type',
                        'value' => 'type_2'
                    ),
                    'group' => esc_html__('Color Options', 'vincent')
                ),

				array(
					'type' => 'css_editor',
					'heading' => esc_html__('CSS', 'vincent'),
					'param_name' => 'custom_css',
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
				),

			)
		)
	);
}


if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_PM_VC_Blockquote extends WPBakeryShortCode
    {
    }
}
