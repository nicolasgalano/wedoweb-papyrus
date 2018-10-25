<?php
extract(
	shortcode_atts(
		array(
			'date_d' => '01',
			'date_m' => '01',
			'date_y' => '2018',
            'countdown_align' => 'center',
            'digits_color' => '#ffffff',
            'text_color' => '#dce4e8',
            'countdown_bg_color' => '#121618',
			'custom_css' => '',
			'custom_class' => '',
		),
		$atts
	)
);

if ($digits_color == '') {
    $digits_color = 'transparent';
}

if ($text_color == '') {
    $text_color = 'transparent';
}

if ($countdown_bg_color == '') {
    $countdown_bg_color = 'transparent';
}

wp_enqueue_script('jquery-countdown', get_template_directory_uri() . '/js/jquery.countdown.js', true, false, true);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);

vincentHelper::getInstance()->addJSToFooter("countdown", "
jQuery('time').countDown({
	with_separators: false
});
");

$html = '
<div class="vincent_element_wrap vincent_element_countdown ' . esc_attr($custom_class) . esc_attr($css_class) . ' align_' . esc_attr($countdown_align) . '" data-dig-color="' . esc_attr($digits_color) . '" data-lab-color="' . esc_attr($text_color) . '" data-bg-color="' . esc_attr($countdown_bg_color) . '">
 
<time>' . esc_attr($date_y) . '-' . esc_attr($date_m) . '-' . esc_attr($date_d) . 'T00:00:00+0000</time>
 
</div>';

echo $html;
?>