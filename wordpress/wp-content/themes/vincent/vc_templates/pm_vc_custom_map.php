<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'custom_map_code' => '',
            'custom_map_height_mode' => 'custom',
            'custom_map_height' => '600px',
            'custom_css' => '',
            'custom_class' => ''
        ), $atts
    )
);

$content = rawurldecode(base64_decode(strip_tags($custom_map_code)));

$html = '';
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);

$html .= '
    <div class="vincent_vc_custom_map ' . esc_attr($custom_class) . esc_attr($css_class) . ' ' . (($custom_map_height_mode == 'custom') ? 'vincent_js_height' : 'vincent_vc_image_cover') . '" ' . (($custom_map_height_mode == 'custom') ? 'data-height="' . absint($custom_map_height) . '"' : '') . ' >
        ' . $content . '
    </div>
';

echo $html;