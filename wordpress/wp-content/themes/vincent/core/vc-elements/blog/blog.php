<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/
if (function_exists('vc_map')) {
	vc_map(
		array(
			'name' => esc_html__('Blog', 'vincent'),
			'base' => 'pm_vc_blog',
			'description' => 'Display blog posts.',
			'category' => esc_html__('Pixel-Mafia', 'vincent'),
			'icon' => 'vincent_vc_elements_icon vincent_blog',
			'params' => array(

				array(
					'param_name' => 'posts_per_page',
					'heading' => esc_html__('Posts per Page', 'vincent'),
					'description' => '',
					'std' => '5',
					'type' => 'dropdown',
					'value' => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
					),
                    'class' => 'vincent_vc_title_class vincent_delim_dot',
					'admin_label' => true,
                    'weight' => 0,
					'group' => esc_html__('General', 'vincent'),
				),

                array(
                    'param_name' => 'blog_view_type',
                    'heading' => esc_html__('View Type', 'vincent'),
                    'description' => '',
                    'std' => 'standard',
                    'type' => 'dropdown',
                    'value' => array(
                        esc_html__('Standard', 'vincent') => 'standard',
                        esc_html__('Simple', 'vincent') => 'simple',
                        esc_html__('Grid', 'vincent') => 'grid'
                    ),
                    'class' => 'vincent_vc_title_class vincent_delim_dot',
                    'admin_label' => true,
                    'weight' => 0,
                    'group' => esc_html__('General', 'vincent')
                ),

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
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => esc_html__('General', 'vincent'),
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => array('simple', 'grid')
                    )
                ),

                array(
                    'param_name' => 'title_status',
                    'heading' => esc_html__('Post Title', 'vincent'),
                    'description' => esc_html__('Select to show or hide post titles', 'vincent'),
                    'type' => 'dropdown',
                    'std' => 'show',
                    'value' => array(
                        esc_html__('Show', 'vincent') => 'show',
                        esc_html__('Hide', 'vincent') => 'hide'
                    ),
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => array('standard', 'simple')
                    ),
                    'group' => esc_html__('General', 'vincent')
                ),

                array(
                    'param_name' => 'meta_status',
                    'heading' => esc_html__('Post Meta', 'vincent'),
                    'description' => esc_html__('Select to show or hide post meta', 'vincent'),
                    'type' => 'dropdown',
                    'std' => 'show',
                    'value' => array(
                        esc_html__('Show', 'vincent') => 'show',
                        esc_html__('Hide', 'vincent') => 'hide'
                    ),
                    'group' => esc_html__('General', 'vincent')
                ),

                array(
                    'param_name' => 'fimage_status',
                    'heading' => esc_html__('Featured Image', 'vincent'),
                    'description' => esc_html__('Select to show or hide featured images', 'vincent'),
                    'type' => 'dropdown',
                    'std' => 'show',
                    'value' => array(
                        esc_html__('Show', 'vincent') => 'show',
                        esc_html__('Hide', 'vincent') => 'hide'
                    ),
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => array('standard', 'grid')
                    ),
                    'group' => esc_html__('General', 'vincent')
                ),

                array(
                    'param_name' => 'excerpt_status',
                    'heading' => esc_html__('Post Excerpt', 'vincent'),
                    'description' => esc_html__('Select to show or hide post meta', 'vincent'),
                    'type' => 'dropdown',
                    'std' => 'show',
                    'value' => array(
                        esc_html__('Show', 'vincent') => 'show',
                        esc_html__('Hide', 'vincent') => 'hide'
                    ),
                    'group' => esc_html__('General', 'vincent')
                ),

                array(
                    'param_name' => 'more_button_status',
                    'heading' => esc_html__('Read More Button', 'vincent'),
                    'description' => esc_html__('Select to show or hide read more buttons', 'vincent'),
                    'type' => 'dropdown',
                    'std' => 'show',
                    'value' => array(
                        esc_html__('Show', 'vincent') => 'show',
                        esc_html__('Hide', 'vincent') => 'hide'
                    ),
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => 'standard'
                    ),
                    'group' => esc_html__('General', 'vincent')
                ),

                array(
                    'param_name' => 'pagination_status',
                    'heading' => esc_html__('Pagination', 'vincent'),
                    'description' => esc_html__('Select to show or hide pagination', 'vincent'),
                    'type' => 'dropdown',
                    'std' => 'show',
                    'value' => array(
                        esc_html__('Show', 'vincent') => 'show',
                        esc_html__('Hide', 'vincent') => 'hide'
                    ),
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => array('standard', 'grid')
                    ),
                    'group' => esc_html__('General', 'vincent')
                ),

                array(
                    'param_name' => 'blog_text_color',
                    'heading' => esc_html__('Text Color', 'vincent'),
                    'description' => esc_html__('Select text color', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#dce4e8',
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => 'simple'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

                array(
                    'param_name' => 'blog_title_color',
                    'heading' => esc_html__('Title Color', 'vincent'),
                    'description' => esc_html__('Select titles color', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#ffffff',
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => 'simple'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

                array(
                    'param_name' => 'button_text_color',
                    'heading' => esc_html__('Button Text Color', 'vincent'),
                    'description' => esc_html__('Select color of Read More button', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#ffffff',
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => 'simple'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

                array(
                    'param_name' => 'button_hover_color',
                    'heading' => esc_html__('Button Hover Color', 'vincent'),
                    'description' => esc_html__('Select hover color of Read More button', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#121618',
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => 'simple'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

                array(
                    'param_name' => 'button_bg_color',
                    'heading' => esc_html__('Button Background Color', 'vincent'),
                    'description' => esc_html__('Select background color of Read More button', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '',
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => 'simple'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

                array(
                    'param_name' => 'button_bg_hover',
                    'heading' => esc_html__('Button Background Hover', 'vincent'),
                    'description' => esc_html__('Select background hover color of Read More button', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#ffffff',
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => 'simple'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

                array(
                    'param_name' => 'button_border_color',
                    'heading' => esc_html__('Button Border Color', 'vincent'),
                    'description' => esc_html__('Select border color of Read More button', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#ffffff',
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => 'simple'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

                array(
                    'param_name' => 'button_border_hover',
                    'heading' => esc_html__('Button Border Hover', 'vincent'),
                    'description' => esc_html__('Select border hover color of Read More button', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#ffffff',
                    'dependency' => array(
                        'element' => 'blog_view_type',
                        'value' => 'simple'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
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
					'group' => esc_html__('General', 'vincent'),
				),

			)
		)
	);
}


if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_PM_VC_Blog extends WPBakeryShortCode
    {
    }
}
