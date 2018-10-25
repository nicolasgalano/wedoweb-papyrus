<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
			'autoplay' => '',
			'autoplay_speed' => '5000',
            'custom_css' => '',
            'custom_class' => ''
        ),
        $atts
    )
);

#CSS
wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');

#JS
wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', true, false, true);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);

$compile = '';
$html = '';

$html .= '<div class="vincent_testimonials_slider vincent_owlCarousel owl-carousel owl-theme ' . esc_attr($custom_class) . esc_attr($css_class) . '"
		data-autoplay = "' . esc_attr($autoplay) . '"
		data-speed = "' . esc_attr($autoplay_speed) . '">' .
    do_shortcode($content)
    . '</div>';
echo $html;