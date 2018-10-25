<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
			'fullscreen_layout' => 'on',
            'custom_css' => '',
            'custom_class' => ''
        ),
        $atts
    )
);
wp_enqueue_script('vincent-stripes', get_template_directory_uri() . '/js/stripes.js', true, false, true);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);

$compile = '';
$html = '';

$html .= '<div class="vincent_stripes stripes_fullscreen_'. $fullscreen_layout .' ' . esc_attr($custom_class) . esc_attr($css_class) . '">' .
    do_shortcode($content)
    . '</div>';
echo $html;