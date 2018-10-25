<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'columns' => '3',
            'custom_css' => '',
            'custom_class' => ''
        ), $atts
    )
);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);

$html = '';

$html .= '
    <div class="vincent_vc_team ' . esc_attr($custom_class) . esc_attr($css_class) . ' columns_' . esc_attr($columns) . '">
        <div class="vincent_team_inner_wrapper">
            ' . do_shortcode($content) . '
        </div>
    </div>
';

echo $html;