<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

$vincent_customizer_default_values = array(
    'header_transparent' => 'disabled',
    'header_type' => 'type_1',
    'logo_type' => 'image_logo',
    'logo_image' => get_template_directory_uri() . '/img/logo.png',
    'logo_retina' => true,
    'logo_text_caption' => 'Text Logo',
    'logo_text_font' => 'Open Sans',
    'logo_text_size' => '24',
    'logo_text_weight' => '700',
    'logo_text_style_uppercase' => true,
    'logo_text_style_italic' => false,
    'logo_padding_top' => '55',
    'logo_padding_bottom' => '45',
    'header_menu_font_family' => 'PT Sans Narrow',
    'header_menu_font_size' => '14',
    'header_menu_font_weight' => '400',
    'header_menu_uppercase' => true,
    'header_menu_italic' => false,
    'header_sub_menu_font_family' => 'Open Sans',
    'header_sub_menu_font_size' => '14',
    'title_bg_image' => get_template_directory_uri() . '/img/null.png',
    'title_text_color' => '#121618',
    'title_border_type' => 'figure',
    'post_tags_status' => 'show',
    'share_buttons_status' => 'show',
    'about_author_status' => 'show',
    'post_navigation_status' => 'show',
    'footer_status' => 'show',
    'footer_logo_type' => 'image_logo',
    'footer_logo_image' => get_template_directory_uri() . '/img/logo_footer.png',
    'footer_logo_retina' => true,
    'footer_logo_text_caption' => 'Text Logo',
    'footer_logo_text_font' => 'Open Sans',
    'footer_logo_text_size' => '24',
    'footer_logo_text_weight' => '700',
    'footer_logo_text_style_uppercase' => true,
    'footer_logo_text_style_italic' => false,
    'footer_logo_padding_top' => '65',
    'footer_logo_padding_bottom' => '55',
    'footer_sublogo_text' => '+1 215 456 15 15. <span>8:00 am – 11:30 pm</span>',
    'footer_copyright_text' => esc_attr__('Copyright &copy; 2017 Vincent. All Rights Reserved.', 'vincent'),
	'footer_twitter' => '',
	'footer_facebook' => '',
	'footer_linkedin' => '',
	'footer_google_plus' => '',
	'footer_youtube' => '',
	'footer_instagram' => '',
	'footer_pinterest' => '',
	'footer_tumbl' => '',
	'footer_flickr' => '',
	'footer_vk' => '',
	'footer_dribbble' => '',
	'footer_vimeo' => '',
    'footer_social_link_target' => 'blank',
    'sidebar_position' => 'vincent_right_sidebar',
    'main_font_family' => 'Open Sans',
    'main_font_size' => '16',
    'main_line_height' => '28',
    'main_font_weight' => '300',
    'alternate_font_family' => 'PT Sans Narrow',
    'content_heading_mb' => '32',
    'h1_font_size' => '40',
    'h1_line_height' => '40',
    'h2_font_size' => '32',
    'h2_line_height' => '32',
    'h3_font_size' => '28',
    'h3_line_height' => '28',
    'h4_font_size' => '24',
    'h4_line_height' => '24',
    'h5_font_size' => '18',
    'h5_line_height' => '18',
    'h6_font_size' => '16',
    'h6_line_height' => '16',
    'color_main' => '#ffc851',
    'color_body' => '#121618',
    'divider_color' => '#1d2326',
    'color_content' => '#dce4e8',
    'color_headings' => '#dce4e8',
    'logo_text_color' => '#ffffff',
    'logo_text_hover' => '#ffc851',
    'logo_text_color_transparent_header' => '#ffffff',
    'logo_text_hover_transparent_header' => '#ffc851',
    'header_text_color' => '#ffffff',
    'header_links_color' => '#ffffff',
    'header_links_hover_color' => '#ffc851',
    'header_links_color_transparent_header' => '#ffffff',
    'header_links_hover_color_transparent_header' => '#ffc851',
    'header_sub_menu_bg_color' => '#1d2326',
    'header_sub_menu_3_lvl_bg_color' => '#262c2f',
    'header_sub_menu_bg_color_transparent_header' => '#1d2326',
    'header_sub_menu_3_lvl_bg_color_transparent_header' => '#262c2f',
    'header_sub_menu_divider_color' => '#2c3235',
    'header_sub_menu_3_lvl_divider_color' => '#34393c',
    'footer_logo_text_color' => '#ffffff',
    'footer_logo_text_hover' => '#ffc851',
    'footer_copyright_color' => '#ffffff',
    'form_buttons_color' => '#1d2326',
    'borders_color' => '#252c30',
    'shop_listing_bg_color' => '#1d2326',
    'featured_posts_status' => 'enabled',
    'featured_posts_orderby' => 'rand',
    'featured_posts_numberposts' => '2',
    'featured_posts_fimage_status' => 'show',
    'featured_posts_meta_status' => 'show',
    'featured_posts_excerpt_status' => 'show',
    '404_bg_image' => get_template_directory_uri() . '/img/null.png',
    '404_text_color' => '#ffffff',
    '404_bg_color' => '#1d2326',
    'vincent_code_before_head_val' => '',
    'products_per_page' => '12',
    'products_in_row' => '2',
    'shop_sidebar_position' => 'vincent_right_sidebar',
    'shop_sorting_status' => 'show',
    'product_image_type' => 'circle',
    'shop_functions' => 'enabled',
    'product_page_remove' => 'disabled'
);

function vincent_sanitize_callback($input) {
	return esc_attr(wp_kses_post($input));
}

# Register Customizer
add_action('customize_register', 'vincent_customizer_register');
function vincent_customizer_register($wp_customize)
{
	global $vincent_customizer_default_values;
		
    ###################################################
    ############# Header Settings Section #############
    ###################################################
    $wp_customize->add_section('vincent_header_settings',
        array(
            'title' => esc_attr__('Header Settings', 'vincent')
        )
    );

    # Transparent Header
    $wp_setting_name = 'header_transparent';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Transparent Header', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array(
                'disabled' => esc_html__('Disabled', 'vincent'),
                'enabled' => esc_html__('Enabled', 'vincent')
            ),
        )
    ));

    # Header Type
    $wp_setting_name = 'header_type';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Type of Header', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array(
                'type_1' => esc_html__('Type 1', 'vincent'),
                'type_2' => esc_html__('Type 2', 'vincent'),
                'type_3' => esc_html__('Type 3', 'vincent')
            )
        )
    ));

    # Logo Type (Text or Image)
    $wp_setting_name = 'logo_type';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Type', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array(
                'image_logo' => esc_html__('Image', 'vincent'),
                'text_logo' => esc_html__('Text', 'vincent')
            ),
        )
    ));

    # Logo (Selected Image)
    $wp_setting_name = 'logo_image';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Image', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'description' => '<i class="vincent_dependency_customizer" data-dependency-id="logo_type" data-dependency-val="image_logo"></i>',
        )
    ));

    # Logo Retina
    $wp_setting_name = 'logo_retina';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Retina', 'vincent'),
            'section' => 'vincent_header_settings',
            'description' => '<i class="vincent_dependency_customizer" data-dependency-id="logo_type" data-dependency-val="image_logo"></i>By activating this option you must use an image with 2х size more than you wish to show.',
            'settings' => $wp_setting_name,
            'type' => 'checkbox',
        )
    ));

    # Logo Text Caption
    $wp_setting_name = 'logo_text_caption';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Text', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'description' => '<i class="vincent_dependency_customizer" data-dependency-id="logo_type" data-dependency-val="text_logo"></i>',
        )
    ));

    # Logo Text Font
    $wp_setting_name = 'logo_text_font';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Font', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => vincent_get_all_fonts_name(),
            'description' => '<i class="vincent_dependency_customizer" data-dependency-id="logo_type" data-dependency-val="text_logo"></i>',
        )
    ));

    # Logo Text Size
    $wp_setting_name = 'logo_text_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Size, px', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'description' => '<i class="vincent_dependency_customizer" data-dependency-id="logo_type" data-dependency-val="text_logo"></i>',
        )
    ));

    # Logo Text Weight
    $wp_setting_name = 'logo_text_weight';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Font Weight', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'description' => '<i class="vincent_dependency_customizer" data-dependency-id="logo_type" data-dependency-val="text_logo"></i>Please keep in mind that most fonts do not support such exotic thicknesses as the 100. The most common values: 300, 400, 600, 700.',
            'type' => 'select',
            'choices' => array('100' => '100', '200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700', '800' => '800', '900' => '900'),
        )
    ));

    # Logo Text Style Uppercase
    $wp_setting_name = 'logo_text_style_uppercase';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Uppercase', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'checkbox',
            'description' => '<i class="vincent_dependency_customizer" data-dependency-id="logo_type" data-dependency-val="text_logo"></i>',
        )
    ));

    # Logo Text Style Italic
    $wp_setting_name = 'logo_text_style_italic';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Italic', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'checkbox',
            'description' => '<i class="vincent_dependency_customizer" data-dependency-id="logo_type" data-dependency-val="text_logo"></i>',
        )
    ));

    # Header Padding Top
    $wp_setting_name = 'logo_padding_top';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Padding Top, px', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Padding Bottom
    $wp_setting_name = 'logo_padding_bottom';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Logo Padding Bottom, px', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Menu Font Family
    $wp_setting_name = 'header_menu_font_family';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Menu Font Family', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => vincent_get_all_fonts_name(),
        )
    ));

    # Header Menu Font-Size
    $wp_setting_name = 'header_menu_font_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Menu Font-Size, px', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Menu Weight
    $wp_setting_name = 'header_menu_font_weight';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Menu Font Weight', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'description' => 'Please keep in mind that most fonts do not support such exotic thicknesses as the 100. The most common values: 300, 400, 600, 700.',
            'type' => 'select',
            'choices' => array('100' => '100', '200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700', '800' => '800', '900' => '900'),
        )
    ));

    # Header Menu Uppercase
    $wp_setting_name = 'header_menu_uppercase';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Menu Uppercase', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'checkbox',
        )
    ));

    # Header Menu Italic
    $wp_setting_name = 'header_menu_italic';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Menu Italic', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'checkbox',
        )
    ));

    # Header Sub Menu Font Family
    $wp_setting_name = 'header_sub_menu_font_family';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Sub Menu Font Family', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => vincent_get_all_fonts_name(),
        )
    ));

    # Header Sub Menu Font-Size
    $wp_setting_name = 'header_sub_menu_font_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Sub Menu Font-Size, px', 'vincent'),
            'section' => 'vincent_header_settings',
            'settings' => $wp_setting_name,
        )
    ));

    ###################################################
    ########### Page Title Settings Section ###########
    ###################################################
    $wp_customize->add_section('vincent_page_title_settings',
        array(
            'title' => esc_attr__('Page Title', 'vincent')
        )
    );

    # Background Image
    $wp_setting_name = 'title_bg_image';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Background Image', 'vincent'),
            'section' => 'vincent_page_title_settings',
            'settings' => $wp_setting_name,
            'description' => '',
        )
    ));

    # Title Text Color
    $wp_setting_name = 'title_text_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Text Color', 'vincent'),
            'section' => 'vincent_page_title_settings',
            'settings' => $wp_setting_name,
        )
    ));

    $wp_setting_name = 'title_border_type';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Border Type', 'vincent'),
            'section' => 'vincent_page_title_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array(
                'figure' => esc_html('Figure', 'vincent'),
                'flat' => esc_html__('Flat', 'vincent')
            ),
        )
    ));

    #################################################
    ############## Post Settings Section ############
    #################################################
    $wp_customize->add_section('vincent_post_settings',
        array(
            'title' => esc_attr__('Post Settings', 'vincent')
        )
    );

    # Post Tags
    $wp_setting_name = 'post_tags_status';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Post Tags', 'vincent'),
            'section' => 'vincent_post_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array(
                'show' => esc_html__('Show', 'vincent'),
                'hide' => esc_html__('Hide', 'vincent')
            ),
        )
    ));

    # Share Buttons
    $wp_setting_name = 'share_buttons_status';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Share Buttons', 'vincent'),
            'section' => 'vincent_post_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('show' => 'Show', 'hide' => 'Hide'),
        )
    ));

    # About Author
    $wp_setting_name = 'about_author_status';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('About Author', 'vincent'),
            'section' => 'vincent_post_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('show' => 'Show', 'hide' => 'Hide'),
        )
    ));

    # Posts Navigation
    $wp_setting_name = 'post_navigation_status';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Posts Navigation', 'vincent'),
            'section' => 'vincent_post_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('show' => 'Show', 'hide' => 'Hide'),
        )
    ));


    ###################################################
    ############## Footer Settings Section ############
    ###################################################
    $wp_customize->add_section('vincent_footer_settings',
        array(
            'title' => esc_attr__('Footer Settings', 'vincent')
        )
    );

    # Footer Visibility
    $wp_setting_name = 'footer_status';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Visibility', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('show' => 'Show', 'hide' => 'Hide'),
        )
    ));

    # Footer Logo Type (Text or Image)
    $wp_setting_name = 'footer_logo_type';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Type', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('image_logo' => 'Image', 'text_logo' => 'Text'),
        )
    ));

    # Footer Logo (Selected Image)
    $wp_setting_name = 'footer_logo_image';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Image', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Footer Logo Retina
    $wp_setting_name = 'footer_logo_retina';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Retina', 'vincent'),
            'section' => 'vincent_footer_settings',
            'description' => 'By activating this option you must use an image with 2х size more than you wish to show.',
            'settings' => $wp_setting_name,
            'type' => 'checkbox',
        )
    ));

    # Footer Logo Text Caption
    $wp_setting_name = 'footer_logo_text_caption';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Text', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Footer Logo Text Font
    $wp_setting_name = 'footer_logo_text_font';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Font', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => vincent_get_all_fonts_name(),
        )
    ));

    # Footer Logo Text Size
    $wp_setting_name = 'footer_logo_text_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Size, px', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Footer Logo Text Weight
    $wp_setting_name = 'footer_logo_text_weight';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Font Weight', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
            'description' => 'Please keep in mind that most fonts do not support such exotic thicknesses as the 100. The most common values: 300, 400, 600, 700.',
            'type' => 'select',
            'choices' => array('100' => '100', '200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700', '800' => '800', '900' => '900'),
        )
    ));

    # Footer Logo Text Style Uppercase
    $wp_setting_name = 'footer_logo_text_style_uppercase';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Uppercase', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
            'type' => 'checkbox',
        )
    ));

    # Footer Logo Text Style Italic
    $wp_setting_name = 'footer_logo_text_style_italic';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Italic', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
            'type' => 'checkbox',
        )
    ));

    # Footer Logo Padding Top
    $wp_setting_name = 'footer_logo_padding_top';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Padding Top, px', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Footer Logo Padding Bottom
    $wp_setting_name = 'footer_logo_padding_bottom';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Logo Padding Bottom, px', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Sub-logo Text
    $wp_setting_name = 'footer_sublogo_text';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name]));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Sub-logo Text', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Footer Copyright Text
    $wp_setting_name = 'footer_copyright_text';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name]));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Copyright Text', 'vincent'),
            'section' => 'vincent_footer_settings',
            'settings' => $wp_setting_name,
        )
    ));
	
	############################################
	############## Social Buttons ##############
	############################################
	$wp_customize->add_section('vincent_socials',
		array(
			'title' => esc_attr('Social Buttons', 'vincent')
		)
	);
	
	# Twitter Button
	$wp_setting_name = 'footer_twitter';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Twitter', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# Facebook Button
	$wp_setting_name = 'footer_facebook';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Facebook', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# LinkedIn Button
	$wp_setting_name = 'footer_linkedin';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('LinkedIn', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# Google+ Button
	$wp_setting_name = 'footer_google_plus';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Google +', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# YouTube Button
	$wp_setting_name = 'footer_youtube';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('YouTube', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# Instagram Button
	$wp_setting_name = 'footer_instagram';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Instagram', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# Pinterest Button
	$wp_setting_name = 'footer_pinterest';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Pinterest', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# Tumblr Button
	$wp_setting_name = 'footer_tumbl';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Tumblr', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# Flickr Button
	$wp_setting_name = 'footer_flickr';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Flickr', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# VK Button
	$wp_setting_name = 'footer_vk';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('VK', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# Dribbble Button
	$wp_setting_name = 'footer_dribbble';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Dribbble', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# Vimeo Button
	$wp_setting_name = 'footer_vimeo';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'esc_attr'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Vimeo', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
		)
	));
	
	# Footer Socials Link Target
	$wp_setting_name = 'footer_social_link_target';
	$wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		$wp_setting_name,
		array(
			'label' => esc_attr__('Footer Socials Link Target', 'vincent'),
			'section' => 'vincent_socials',
			'settings' => $wp_setting_name,
			'type' => 'select',
			'choices' => array(
				'blank' => esc_html__('Open in New Window', 'vincent'),
				'self' => esc_html__('Open in Same Window', 'vincent')
			)
		)
	));
	

    ###################################################
    ################# Sidebars Section ################
    ###################################################
    $wp_customize->add_section('vincent_sidebars_settings',
        array(
            'title' => esc_attr__('Sidebars', 'vincent')
        )
    );

    # Sidebar Position
    $wp_setting_name = 'sidebar_position';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Sidebar Position', 'vincent'),
            'section' => 'vincent_sidebars_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('vincent_left_sidebar' => 'Left', 'vincent_right_sidebar' => 'Right', 'vincent_no_sidebar' => 'None'),
        )
    ));

    ###################################################
    ############### Typography Section ################
    ###################################################
    $wp_customize->add_section('vincent_typography_settings',
        array(
            'title' => esc_attr__('Typography', 'vincent')
        )
    );

    # Main Font Family
    $wp_setting_name = 'main_font_family';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Main Font Family', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => vincent_get_all_fonts_name(),
        )
    ));

    # Main Font-Size
    $wp_setting_name = 'main_font_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Main Font-Size, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Main Line-Height
    $wp_setting_name = 'main_line_height';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Main Line-Height, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Main Font Weight
    $wp_setting_name = 'main_font_weight';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Main Font Weight', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
            'description' => 'Please keep in mind that most fonts do not support such exotic thicknesses as the 100. The most common values: 300, 400, 600, 700.',
            'type' => 'select',
            'choices' => array('100' => '100', '200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700', '800' => '800', '900' => '900'),
        )
    ));

    # Alternate Font Family
    $wp_setting_name = 'alternate_font_family';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Alternate Font Family', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => vincent_get_all_fonts_name(),
        )
    ));

    # Content Heading Margin-Bottom
    $wp_setting_name = 'content_heading_mb';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Content Heading Margin-Bottom, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H1 Font Size
    $wp_setting_name = 'h1_font_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H1 Font Size, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H1 Line Height
    $wp_setting_name = 'h1_line_height';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H1 Line Height, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H2 Font Size
    $wp_setting_name = 'h2_font_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H2 Font Size, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H2 Line Height
    $wp_setting_name = 'h2_line_height';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H2 Line Height, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H3 Font Size
    $wp_setting_name = 'h3_font_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H3 Font Size, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H3 Line Height
    $wp_setting_name = 'h3_line_height';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H3 Line Height, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H4 Font Size
    $wp_setting_name = 'h4_font_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H4 Font Size, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H4 Line Height
    $wp_setting_name = 'h4_line_height';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H4 Line Height, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H5 Font Size
    $wp_setting_name = 'h5_font_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H5 Font Size, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H5 Line Height
    $wp_setting_name = 'h5_line_height';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H5 Line Height, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H6 Font Size
    $wp_setting_name = 'h6_font_size';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H6 Font Size, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # H6 Line Height
    $wp_setting_name = 'h6_line_height';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('H6 Line Height, px', 'vincent'),
            'section' => 'vincent_typography_settings',
            'settings' => $wp_setting_name,
        )
    ));

    ###################################################
    ############## Color Settings Section #############
    ###################################################
    $wp_customize->add_section('vincent_color_settings',
        array(
            'title' => esc_attr__('Color Settings', 'vincent')
        )
    );

    # Main Theme Color
    $wp_setting_name = 'color_main';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Theme Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Body Color
    $wp_setting_name = 'color_body';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Body Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Dividers Color
    $wp_setting_name = 'divider_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Dividers Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Content Color
    $wp_setting_name = 'color_content';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Content Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Headings Color
    $wp_setting_name = 'color_headings';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Headings Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Logo Text Color
    $wp_setting_name = 'logo_text_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Text Logo', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Logo Text Hover Color
    $wp_setting_name = 'logo_text_hover';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Text Logo Hover', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Logo Text Color (Transparent Header)
    $wp_setting_name = 'logo_text_color_transparent_header';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Text Logo (Transparent Header)', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Logo Text Hover Color (Transparent Header)
    $wp_setting_name = 'logo_text_hover_transparent_header';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Text Logo Hover (Transparent Header)', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Text Color
    $wp_setting_name = 'header_text_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Text', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Links Color
    $wp_setting_name = 'header_links_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Menu', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Links Hover Color
    $wp_setting_name = 'header_links_hover_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Menu Hover', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Links Color (Transparent Header)
    $wp_setting_name = 'header_links_color_transparent_header';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Menu (Transparent Header)', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Links Hover Color (Transparent Header)
    $wp_setting_name = 'header_links_hover_color_transparent_header';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Menu Hover (Transparent Header)', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Sub Menu Background Color
    $wp_setting_name = 'header_sub_menu_bg_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Sub Menu Background', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Sub Menu 3 Level Background Color
    $wp_setting_name = 'header_sub_menu_3_lvl_bg_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Sub Menu 3rd Level Background', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Sub Menu Background Color (Transparent Header)
    $wp_setting_name = 'header_sub_menu_bg_color_transparent_header';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Sub Menu Background (Transparent Header)', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Sub Menu 3 Level Background Color (Transparent Header)
    $wp_setting_name = 'header_sub_menu_3_lvl_bg_color_transparent_header';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Sub Menu 3rd Level Background (Transparent Header)', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Sub Menu Dividers Color
    $wp_setting_name = 'header_sub_menu_divider_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Sub Menu Divider Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Header Sub Menu 3 Lvl Dividers Color
    $wp_setting_name = 'header_sub_menu_3_lvl_divider_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Header Sub Menu 3rd Level Divider Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Footer Logo Text Color
    $wp_setting_name = 'footer_logo_text_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Text Logo', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Footer Logo Text Hover Color
    $wp_setting_name = 'footer_logo_text_hover';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Text Logo Hover', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Footer Color
    $wp_setting_name = 'footer_copyright_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Footer Text', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Form Buttons Color
    $wp_setting_name = 'form_buttons_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Forms Buttons Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Borders Color
    $wp_setting_name = 'borders_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Borders Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # 404 Page Text Color
    $wp_setting_name = '404_text_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('404 Page Text Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # 404 Page Text Color
    $wp_setting_name = '404_bg_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('404 Page Background Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    # Shop Listing Item Background Color
    $wp_setting_name = 'shop_listing_bg_color';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Shop Listing Item Background Color', 'vincent'),
            'section' => 'vincent_color_settings',
            'settings' => $wp_setting_name,
        )
    ));

    ###################################################
    ########### Blog Featured Posts Section ###########
    ###################################################
    $wp_customize->add_section('vincent_featured_posts',
        array(
            'title' => esc_attr__('Blog Featured Posts', 'vincent')
        )
    );

    # Featured Posts Status
    $wp_setting_name = 'featured_posts_status';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Featured Posts Status', 'vincent'),
            'section' => 'vincent_featured_posts',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('enabled' => 'Enabled', 'disabled' => 'Disabled'),
        )
    ));

    # Featured Posts Order By
    $wp_setting_name = 'featured_posts_orderby';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Featured Posts Order By', 'vincent'),
            'section' => 'vincent_featured_posts',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('rand' => 'Random', 'date' => 'Date'),
        )
    ));

    # Featured Posts Number
    $wp_setting_name = 'featured_posts_numberposts';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Number of Posts', 'vincent'),
            'section' => 'vincent_featured_posts',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('2' => '2', '3' => '3', '4' => '4'),
        )
    ));

    # Featured Posts Feature Image
    $wp_setting_name = 'featured_posts_fimage_status';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Feature Image', 'vincent'),
            'section' => 'vincent_featured_posts',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('show' => 'Show', 'hide' => 'Hide'),
        )
    ));

    # Featured Posts Meta
    $wp_setting_name = 'featured_posts_meta_status';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Post Meta', 'vincent'),
            'section' => 'vincent_featured_posts',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('show' => 'Show', 'hide' => 'Hide'),
        )
    ));

    # Featured Posts Excerpt
    $wp_setting_name = 'featured_posts_excerpt_status';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Excerpt', 'vincent'),
            'section' => 'vincent_featured_posts',
            'settings' => $wp_setting_name,
            'type' => 'select',
            'choices' => array('show' => 'Show', 'hide' => 'Hide'),
        )
    ));

    ###################################################
    ################ Error 404 Section ################
    ###################################################
    $wp_customize->add_section('vincent_error404_page_settings',
        array(
            'title' => esc_attr__('Error 404 Page', 'vincent')
        )
    );

    # 404 Page Backgroung Image
    $wp_setting_name = '404_bg_image';
    $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        $wp_setting_name,
        array(
            'label' => esc_attr__('Background Image', 'vincent'),
            'section' => 'vincent_error404_page_settings',
            'settings' => $wp_setting_name,
        )
    ));

    ###################################################
    ################# Code Before Head ################
    ###################################################
    $wp_customize->add_section('vincent_code_before_head',
        array(
            'title' => esc_attr__('Code Before &lt;/head&gt;', 'vincent')
        )
    );

    ########################################################
    ################# WooCommerce Settings #################
    ########################################################
    if (class_exists('WooCommerce')) {
        $wp_customize->add_section('vincent_woocommerce',
            array(
                'title' => esc_html__('WooCommerce', 'vincent')
            )
        );

        # Products per Page
        $wp_setting_name = 'products_per_page';
        $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label' => esc_html__('Products on Page', 'vincent'),
                'section' => 'vincent_woocommerce',
                'settings' => $wp_setting_name,
            )
        ));

        # Products in Row
        $wp_setting_name = 'products_in_row';
        $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label' => esc_html__('Products in Row', 'vincent'),
                'section' => 'vincent_woocommerce',
                'settings' => $wp_setting_name,
                'type' => 'select',
                'choices' => array(
                    '2' => '2',
                    '3' => '3',
                    '4' => '4'
                )
            )
        ));

        # WooCommerce Sidebar Position
        $wp_setting_name = 'shop_sidebar_position';
        $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label' => esc_html__('WooCommerce Sidebar Position', 'vincent'),
                'section' => 'vincent_woocommerce',
                'settings' => $wp_setting_name,
                'type' => 'select',
                'choices' => array(
                    'vincent_left_sidebar' => esc_attr__('Left', 'vincent'),
                    'vincent_right_sidebar' => esc_attr__('Right', 'vincent'),
                    'vincent_no_sidebar' => esc_attr__('None', 'vincent')
                )
            )
        ));

        # WooCommerce Products Sorting
        $wp_setting_name = 'shop_sorting_status';
        $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label' => esc_html__('Products Sorting', 'vincent'),
                'section' => 'vincent_woocommerce',
                'settings' => $wp_setting_name,
                'type' => 'select',
                'choices' => array(
                    'show' => esc_attr__('Show', 'vincent'),
                    'hide' => esc_attr__('Hide', 'vincent')
                )
            )
        ));

        # WooCommerce Product Image Type
        $wp_setting_name = 'product_image_type';
        $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label' => esc_html__('Product Images Type', 'vincent'),
                'section' => 'vincent_woocommerce',
                'settings' => $wp_setting_name,
                'type' => 'select',
                'choices' => array(
                    'circle' => esc_attr__('Circle', 'vincent'),
                    'square' => esc_attr__('Square', 'vincent')
                )
            )
        ));

        # Shop Functions
        $wp_setting_name = 'shop_functions';
        $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label' => esc_html__('ADD to Cart', 'vincent'),
                'section' => 'vincent_woocommerce',
                'settings' => $wp_setting_name,
                'description' => esc_html__('You can turn off the ability to add products to the cart if you do not plan to sell products on the site.', 'vincent'),
                'type' => 'select',
                'choices' => array(
                    'enabled' => esc_attr__('Enabled', 'vincent'),
                    'disabled' => esc_attr__('Disabled', 'vincent')
                )
            )
        ));

        # Remove Product Page
        $wp_setting_name = 'product_page_remove';
        $wp_customize->add_setting($wp_setting_name, array('default' => $vincent_customizer_default_values[$wp_setting_name], 'sanitize_callback'	=> 'vincent_sanitize_callback'));
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label' => esc_html__('Remove Product Page', 'vincent'),
                'section' => 'vincent_woocommerce',
                'settings' => $wp_setting_name,
                'description' => esc_html__('Remove Links to Product Page', 'vincent'),
                'type' => 'select',
                'choices' => array(
                    'disabled' => esc_attr__('Links Not Removed', 'vincent'),
                    'enabled' => esc_attr__('Links Removed', 'vincent')
                )
            )
        ));
    }
}