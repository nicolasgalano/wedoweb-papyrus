<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'prod_list' => '',
            'group_image_status' => 'false',
            'group_image' => '',
            'image_position' => 'left',
            'list_bg_color' => '#121618',
            'custom_class' => '',
            'custom_css' => ''
        ), $atts
    )
);

$group_image_url = wp_get_attachment_image_url($group_image, 'full');
if ($list_bg_color == '') {
    $list_bg_color = 'transparent';
}

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);
$html = '';

$html .= '
    <div class="vincent_vc_custom_products ' . esc_attr($custom_class) . esc_attr($css_class) . '" data-bgcolor="' . esc_attr($list_bg_color) . '">
        <div class="vincent_prod_wrapper vincent_js_bg_color ' . (($group_image_status == 'true') ? 'with_image image_on_' . esc_attr($image_position) . '' : 'no_image') . '" data-bgcolor="' . esc_attr($list_bg_color) . '">
            ';

            if ($group_image_status == 'true' && $image_position == 'left') {
                $html .= '
                    <div class="vincent_custom_prod_image_cont">
                        <div class="vincent_custom_prod_image  vincent_js_bg_image"  data-src="' . esc_url($group_image_url) . '"></div>
                    </div>
                ';
            }

            $html .= '
                <div class="vincent_custom_prod_listing_box">
                    ' . do_shortcode('[products ids="' . esc_attr($prod_list) . '" orderby="date" order="asc"]') . '
                </div>
            ';

            if ($group_image_status == 'true' && $image_position == 'right') {
                $html .= '
                    <div class="vincent_custom_prod_image_cont">
                        <div class="vincent_custom_prod_image  vincent_js_bg_image"  data-src="' . esc_url($group_image_url) . '"></div>
                    </div>
                ';
            }

            $html .= '
            <div class="clear"></div>
        </div>
    </div>
';

echo $html;