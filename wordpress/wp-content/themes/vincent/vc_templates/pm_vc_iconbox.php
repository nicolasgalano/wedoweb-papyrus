<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'icon_type' => 'image_icon',
            'icon_image_type' => '',
            'icon_font_type' => 'fa fa-adjust',
            'icon_font_type_font_size' => '14px',
            'icon_align' => 'center',
            'iconbox_heading' => '',
            'iconbox_heading_tag' => 'h4',
            'iconbox_heading_align' => 'center',
            'iconbox_text' => '',
            'iconbox_text_align' => 'center',
            'iconbox_heading_color' => '#121618',
            'iconbox_text_color' => '#121618',
            'iconbox_icon_color' => '#121618',
            'iconbox_bg_color' => 'transparent',
            'custom_class' => '',
            'custom_css' => ''
        ), $atts
    )
);

if (isset($icon_image_type) && $icon_image_type !== '') {
    $image_icon_url = wp_get_attachment_image_url($icon_image_type, 'full');
} else {
    $image_icon_url = '';
}

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);
$html = '';

$html .= '
    <div class="vincent_vc_iconbox ' . esc_attr($custom_class) . esc_attr($css_class) . ' vincent_js_bg_color" data-bgcolor="' . $iconbox_bg_color . '">
        <div class="vincent_iconbox_icon_cont icon_align_' . esc_attr($icon_align) . '">
            ';

            if ($icon_type == 'image_icon') {
                if ($image_icon_url !== '') {
                    $html .= '
                        <img src="' . esc_url($image_icon_url) . '" alt="" />
                    ';
                }
            } else {
                $html .= '
                    <i
                        class="' . esc_attr($icon_font_type) . ' vincent_js_color vincent_js_font_size"
                        data-font-size="' . esc_attr($icon_font_type_font_size) . '"
                        data-color="' . esc_attr($iconbox_icon_color) . '"
                    ></i>
                ';
            }

            $html .= '
        </div>

        <div class="vincent_iconbox_heading_cont heading_align_' . esc_attr($iconbox_heading_align) . '">
            <' . esc_attr($iconbox_heading_tag) . ' class="vincent_js_color" data-color="' . esc_attr($iconbox_heading_color) . '">
                ' . esc_html($iconbox_heading) . '
            </' . esc_attr($iconbox_heading_tag) . '>
        </div>

        <div class="vincent_iconbox_text_cont text_heading_' . esc_attr($iconbox_text_align) . '">
            <p class="vincent_js_color" data-color="' . esc_attr($iconbox_text_color) . '">' . esc_html($iconbox_text) . '</p>
        </div>
    </div>
';

echo $html;
