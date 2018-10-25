<?php

/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/
if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_stripes',
        'name' => esc_html__('Stripes', 'vincent'),
        'description' => esc_html__('Display stripe slider', 'vincent'),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'as_parent' => array('only' => 'pm_vc_stripes_item'),
        'content_element' => true,
        'is_container' => true,
        'icon' => 'pm_vc_elements_icon pm_stripes',
        'show_settings_on_create' => true,
        'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Select Layout', 'vincent'),
				'param_name' => 'fullscreen_layout',
				'admin_label' => true,
				'std' => 'on',
				'value' => array(
					esc_html__("Fullscreen Layout", "vincent") => 'on',
					esc_html__("Content Layout", "vincent") => 'off'
				)
			),		
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('CSS', 'vincent'),
                'param_name' => 'custom_css',
                'group' => esc_html__('Design Options', 'vincent')
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
        ),
        'js_view' => 'VcColumnView'
    ));
}

if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_PM_VC_Stripes extends WPBakeryShortCodesContainer
    {
    }
}


# Price Table Item
if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'pm_vc_stripes_item',
        'name' => esc_html__('Stripe Item', 'vincent'),
        "description" => esc_html__("Create sprite slide", "vincent"),
        'category' => esc_html__('Pixel-Mafia', 'vincent'),
        'icon' => 'pm_vc_elements_icon pm_stripes_item',
        "as_child" => array('only' => 'pm_vc_stripes'),
        'is_container' => false,
        'show_settings_on_create' => true,
        'params' => array(
			array(
                'param_name' => 'item_image',
                'heading' => esc_html__('Item Background Image', 'vincent'),
                'description' => esc_html__('Select featured image from media library.', 'vincent'),
                'type' => 'attach_image',
                'value' => '',
                'admin_label' => true
			),

            array(
                "param_name" => "item_title",
                "heading" => esc_html__("Title", "vincent"),
                "type" => "textfield",
                'value' => ''
            ),

            array(
                'param_name' => 'link_type',
                'heading' => esc_html__('Link Type', 'vincent'),
                'type' => 'dropdown',
                'std' => 'none',
                'value' => array(
                    esc_html__("None", "vincent") => 'none',
                    esc_html__("Link on whole item", "vincent") => 'link_all_item',
                    esc_html__("Link on title", "vincent") => 'link_by_title'
                ),
                'admin_label' => true
            ),

            array(
                "param_name" => "item_link",
                "heading" => esc_html__("Item Link", "vincent"),
                "type" => "vc_link",
                'value' => '',
                'dependency' => array(
                    'element' => 'link_type',
                    'value' => array('link_all_item','link_by_title')
                )
            ),

			array(
                "param_name" => "title_color",
                "heading" => esc_html__("Title Color", "vincent"),
                "description" => esc_html__("Select Title color.", "vincent"),
                "type" => "colorpicker",
                "value" => "#ffffff",
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__('Color Option', 'vincent')
			),
			array(
                "param_name" => "overlay_color",
                "heading" => esc_html__("Overlay Color", "vincent"),
                "description" => esc_html__("Select overlay color.", "vincent"),
                "type" => "colorpicker",
                "value" => "rgba(0, 0, 0, .6)",
				'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__('Color Option', 'vincent')
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
    class WPBakeryShortCode_PM_VC_Stripes_Item extends WPBakeryShortCode
    {
    }
}
?>