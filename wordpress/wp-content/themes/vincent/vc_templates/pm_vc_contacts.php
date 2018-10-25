<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'map_code' => '',
            'map_position' => 'left',
            'contact_image' => '',
            'contact_bg_color' => '#1d2326',
            'custom_css' => '',
            'custom_class' => ''
        ), $atts
    )
);

$map_code = rawurldecode(base64_decode(strip_tags($map_code)));
$content = wpb_js_remove_wpautop($content, true);
$contact_image_url = wp_get_attachment_url($contact_image, 'full');

if ($map_code !== '' && $content !== '' && $contact_image !== '') {
    $columns = 3;
} else if ($map_code !== '' && $content !== '' && $contact_image == '' || $map_code !== '' && $contact_image !== '' && $content == '' || $content !== '' && $contact_image !== '' && $map_code == '') {
    $columns = 2;
} else if ($map_code !== '' && $content == '' && $contact_image == '' || $content !== '' && $map_code == '' && $contact_image == '' || $contact_image !== '' && $map_code == '' && $content == '') {
    $columns = 1;
} else {
    $columns = 0;
}

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);
$html = '';

$html .= '
    <div class="vincent_vc_contacts ' . esc_attr($custom_class) . esc_attr($css_class) . ' ' . (($map_code !== '') ? 'with_map' : 'no_map') . ' map_on_' . esc_attr($map_position) . '">
        <div class="vincent_vc_contact_wrapper columns_' . esc_attr($columns) . ' vincent_js_bg_color" data-bgcolor="' . esc_attr($contact_bg_color) . '">
            ';

            if ($map_position == 'left') {
                if ($map_code !== '') {
                    $html .= '
                    <div class="vincent_contact_map">
                        <div class="wrapper">
                            ' . $map_code . '
                        </div>
                        <div class="clear"></div>
                    </div>
                ';
                }

                if ($content !== '') {
                    $html .= '
                    <div class="vincent_contact_text">
                        <div class="wrapper">
                            ' . $content . '
                        </div>
                    </div>
                ';
                }

                if ($contact_image !== '') {
                    $html .= '
                    <div class="vincent_contact_image">
                        <div class="wrapper">
                            <img src="' . esc_url($contact_image_url) . '" alt="" />
                        </div>
                    </div>
                ';
                }
            } else {
                if ($contact_image !== '') {
                    $html .= '
                    <div class="vincent_contact_image">
                        <div class="wrapper">
                            <img src="' . esc_url($contact_image_url) . '" alt="" />
                        </div>
                    </div>
                ';
                }

                if ($content !== '') {
                    $html .= '
                    <div class="vincent_contact_text">
                        <div class="wrapper">
                        ' . $content . '
                        </div>
                    </div>
                ';
                }

                if ($map_code !== '') {
                    $html .= '
                    <div class="vincent_contact_map">
                        <div class="wrapper">
                        ' . $map_code . '
                        </div>
                    </div>
                ';
                }
            }

            $html .= '
            <div class="clear"></div>
        </div>
    </div>
';

echo $html;