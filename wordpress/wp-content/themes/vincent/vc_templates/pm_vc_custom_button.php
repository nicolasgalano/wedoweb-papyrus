<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'button_text' => '',
            'button_link' => '',
            'button_type' => 'bordered',
            'button_size' => 'normal',
            'button_align' => 'center',
            'button_icon_status' => 'false',
            'icon_align' => 'right',
            'button_icon' => 'fa fa-adjust',
            'text_color' => '#ffffff',
            'hover_color' => '#ffc851',
            'border_color' => '#ffffff',
            'border_hover_color' => '#ffc851',
            'button_bg_color' => '#ffc851',
            'hover_bg_color' => 'transparent',
            'custom_css' => '',
            'custom_class' => ''
        ), $atts
    )
);

if (isset($button_link) && $button_link !== '') {
    $button_link = vc_build_link($button_link);

    if (isset($button_link['url']) && $button_link['url'] !== '') {
        $button_url = esc_url($button_link['url']);
    } else {
        $button_url = esc_js('javascript:void(0)');
    }

    if (isset($button_link['title']) && $button_link['title'] !== '') {
        $button_title = $button_link['title'];
    } else {
        $button_title = '';
    }

    if (isset($button_link['target']) && $button_link['target'] !== '') {
        $button_target = $button_link['target'];
    } else {
        $button_target = '';
    }

    if (isset($button_link['rel']) && $button_link['rel'] !== '') {
        $button_rel = $button_link['rel'];
    } else {
        $button_rel = '';
    }
} else {
    $button_url = esc_js('javascript:void(0)');
    $button_title = '';
    $button_target = '';
    $button_rel = '';
}

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);

$html = '';

$html .= '
    <div class="vincent_vc_custom_button_container button_align_' . esc_attr($button_align) . ' ' . esc_attr($custom_class) . esc_attr($css_class) . '">
        <a class="vincent_vc_custom_button button_type_' . esc_attr($button_type) . ' button_size_' . esc_attr($button_size) . ' ' . (($button_icon_status == 'true') ? 'with_icon icon_align_' . esc_attr($icon_align) . '' : '') . '"
           data-color="' . esc_attr($text_color) . '"
           data-hover="' . esc_attr($hover_color) . '"
           ' . (($button_type == 'bordered') ? 'data-border="' . esc_attr($border_color) . '"' : '') . '
           ' . (($button_type == 'bordered') ? 'data-border-hover="' . esc_attr($border_hover_color) . '"' : '') . '
           ' . (($button_type == 'colored') ? 'data-button-bg-color="' . esc_attr($button_bg_color) . '"' : '') . '
           ' . (($button_type == 'colored') ? 'data-hover-bg-color="' . esc_attr($hover_bg_color) . '"' : '') . '
           href="' . $button_url . '"
           ' . (($button_title !== '') ? 'title="' . esc_attr($button_title) . '"' : '') . '
           ' . (($button_target !== '') ? 'target="' . esc_attr($button_target) . '"' : '') . '
           ' . (($button_rel !== '') ? 'rel="' . $button_rel . '"' : '') . '
           >
            ';

            if ($button_icon_status == 'true' && $icon_align == 'left') {
                $html .= '
                    <i class="' . esc_attr($button_icon) . '"></i>
                ';
            }

            $html .= $button_text;

            if ($button_icon_status == 'true' && $icon_align == 'right') {
                $html .= '
                    <i class="' . esc_attr($button_icon) . '"></i>
                ';
            }

            $html .= '
        </a>
    </div>
';

echo $html;