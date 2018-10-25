<?php

/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/
if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_testimonials',
        'name' => esc_html__('Testimonials', 'vincent'),
        'description' => esc_html__('Display Testimonials slider', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'as_parent' => array('only' => 'pm_vc_testimonials_item'),
        'content_element' => true,
        'is_container' => true,
        'icon' => 'pm_vc_elements_icon pm_testimonials',
        'show_settings_on_create' => false,
        'params' => array(
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Autoplay', 'vincent'),
				'param_name' => 'autoplay',
				'description' => esc_html__( 'Enable slider autoplay.', 'vincent' ),
				'value' => esc_html__('Yes', 'vincent'),
                'group' => esc_html__('General', 'vincent')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Autoplay Speed", "vincent"),
				"param_name" => "autoplay_speed",
				"value" => '5000',
                'group' => esc_html__('General', 'vincent'),
                'dependency' => array(
                    'element' => 'autoplay',
                    'value' => 'true'
                )
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
                'group' => esc_html__('Design options', 'vincent')
            )
        ),
        'js_view' => 'VcColumnView'
    ));
}

if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_PM_VC_Testimonials extends WPBakeryShortCodesContainer
    {
    }
}


# Testimonials Item
if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_testimonials_item',
        'name' => esc_html__('Testimonials Item', 'vincent'),
        "description" => esc_html__("Create testimonial item", "vincent"),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'pm_vc_elements_icon pm_testimonials_item',
        "as_child" => array('only' => 'pm_vc_testimonials'),
        'is_container' => false,
        'show_settings_on_create' => true,
        'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Featured Image', 'vincent'),
				'param_name' => 'testimonial_image',
				'description' => esc_html__('Select featured image from media library.', 'vincent'),
				'value' => ''
			),		
            array(
                "type" => "textarea",
                "heading" => esc_html__("Testimonial Text", "vincent"),
                "param_name" => "testimonial_text",
                'value' => ''
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Author", "vincent"),
                "param_name" => "testimonial_author",
                'value' => '',
                'admin_label' => true
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__('Author Position', 'vincent'),
                'param_name' => 'testimonial_author_position',
                'value' => ''
            ),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Text Color", "vincent"),
				"param_name" => "text_color",
				"value" => "#121618",
				"description" => esc_html__("Select text color for testimonial text.", "vincent"),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Author Color", "vincent"),
				"param_name" => "author_color",
				"value" => "#121618",
				"description" => esc_html__("Select text color for testimonial author.", "vincent"),
				'edit_field_class' => 'vc_col-sm-6',
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
    class WPBakeryShortCode_PM_VC_Testimonials_Item extends WPBakeryShortCode
    {
    }
}
?>