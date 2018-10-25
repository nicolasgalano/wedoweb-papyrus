<?php

/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (function_exists('vc_map')) {
	vc_map(
		array(
			'name' => esc_html__('Countdown Timer', 'vincent'),
			'base' => 'pm_vc_countdown',
			'description' => esc_html__('Simple Countdown Timer.', 'vincent'),
			'category' => esc_html__('Pixel-Mafia', 'vincent'),
			'icon' => 'vincent_vc_elements_icon vincent_countdown',
			'params' => array(
				array(
					'param_name' => 'date_d',
					'heading' => esc_html__('Day', 'vincent'),
					'description' => '',
					'type' => 'dropdown',
					'value' => array(
						'01' => '01',
						'02' => '02',
						'03' => '03',
						'04' => '04',
						'05' => '05',
						'06' => '06',
						'07' => '07',
						'08' => '08',
						'09' => '09',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24',
						'25' => '25',
						'26' => '26',
						'27' => '27',
						'28' => '28',
						'29' => '29',
						'30' => '30',
						'31' => '31',
					),
					'holder' => 'span',
					'class' => 'vincent_vc_title_class vincent_delim_dot',
					'admin_label' => false,
					'weight' => 0,
					'group' => esc_html__('General', 'vincent')
				),

				array(
					'param_name' => 'date_m',
					'heading' => esc_html__('Month', 'vincent'),
					'description' => '',
					'type' => 'dropdown',
					'value' => array(
						'01' => '01',
						'02' => '02',
						'03' => '03',
						'04' => '04',
						'05' => '05',
						'06' => '06',
						'07' => '07',
						'08' => '08',
						'09' => '09',
						'10' => '10',
						'11' => '11',
						'12' => '12',
					),
					'holder' => 'span',
					'class' => 'vincent_vc_title_class vincent_delim_dot',
					'admin_label' => false,
					'weight' => 0,
					'group' => esc_html__('General', 'vincent')
				),

				array(
					'param_name' => 'date_y',
					'heading' => esc_html__('Year', 'vincent'),
					'description' => 'For your convenience, we reserve the ability to specify any value here, but please remember that we expect to see here only 4-digit year format, for example 2018',
					'type' => 'textfield',
					'value' => '2018',
					'holder' => 'span',
					'class' => 'vincent_vc_text_class vincent_delim_dot',
					'admin_label' => false,
					'weight' => 0,
					'group' => esc_html__('General', 'vincent')
				),

                array(
                    'param_name' => 'countdown_align',
                    'heading' => esc_html__('Counter Alignment', 'vincent'),
                    'description' => esc_html__('Select countdown alignment', 'vincent'),
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
                    'param_name' => 'digits_color',
                    'heading' => esc_html__('Digits Color', 'vincent'),
                    'description' => esc_html__('Select the color of digits', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#ffffff',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

                array(
                    'param_name' => 'text_color',
                    'heading' => esc_html__('Labels Color', 'vincent'),
                    'description' => esc_html__('Select the color of labels', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#dce4e8',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

                array(
                    'param_name' => 'countdown_bg_color',
                    'heading' => esc_html__('Background Color', 'vincent'),
                    'description' => esc_html__('Select the color of background', 'vincent'),
                    'type' => 'colorpicker',
                    'value' => '#121618',
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__('Color Options', 'vincent')
                ),

				array(
					'type' => 'css_editor',
					'heading' => esc_html__('CSS', 'vincent'),
					'param_name' => 'custom_css',
					'group' => esc_html__('Design options', 'vincent')
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

			)
		)
	);
}

if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_PM_VC_Countdown extends WPBakeryShortCode
    {
    }
}
