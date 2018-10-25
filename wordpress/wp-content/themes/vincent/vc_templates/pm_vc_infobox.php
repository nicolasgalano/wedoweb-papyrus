<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'infobox_title' => '',
            'infobox_title_tag' => 'h5',
            'infobox_title_align' => 'center',
            'infobox_text' => '',
            'infobox_text_align' => 'center',
            'infobox_height' => '200px',
            'infobox_bg_image_status' => 'false',
            'infobox_bg_image' => '',
            'infobox_link_status' => 'false',
            'infobox_link' => '',
            'infobox_title_color' => '#ffffff',
            'infobox_text_color' => '#dce4e8',
            'infobox_bg_color' => '#1d2326',
            'custom_class' => '',
            'custom_css' => ''
        ), $atts
    )
);

if ($infobox_bg_image_status == 'true') {
    $infobox_bg_image_url = wp_get_attachment_url($infobox_bg_image, 'full');
}

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);
$html = '';

if (isset($infobox_link_status) && $infobox_link_status !== 'false') {
	if (isset($infobox_link) && $infobox_link !== '') {
		$infobox_link = vc_build_link($infobox_link);
		
		if (isset($infobox_link['url']) && $infobox_link['url'] !== '') {
			$infobox_link_url = esc_url($infobox_link['url']);
		} else {
			$infobox_link_url = esc_js('javascript:void(0)');
		}
		
		if (isset($infobox_link['title']) && $infobox_link['title'] !== '') {
			$infobox_link_title = $infobox_link['title'];
		} else {
			$infobox_link_title = '';
		}
		
		if (isset($infobox_link['target']) && $infobox_link['target'] !== '') {
			$infobox_link_target = $infobox_link['target'];
		} else {
			$infobox_link_target = '';
		}
		
		if (isset($infobox_link['rel']) && $infobox_link['rel'] !== '') {
			$infobox_link_rel = $infobox_link['rel'];
		} else {
			$infobox_link_rel = '';
		}
	} else {
		$infobox_link_url = esc_js('javascript:void(0)');
		$infobox_link_title = '';
		$infobox_link_target = '';
		$infobox_link_rel = '';
	}
	
	$html .= '
		<a href="' . $infobox_link_url . '" title="' . $infobox_link_title . '" target="' . $infobox_link_target . '" rel="' . $infobox_link_rel . '">
	';
}

			$html .= '
			    <div class="vincent_vc_infobox ' . (($infobox_bg_image_status == 'true') ? 'vincent_js_bg_image' : '') . ' ' . esc_attr($custom_class) . esc_attr($css_class) . '" data-height="' . esc_attr($infobox_height) . '" ' . (($infobox_bg_image_status == 'true') ? 'data-src="' . esc_url($infobox_bg_image_url) . '"' : '') . '>
			        <div class="vincent_infobox_wrapper">
			            <div class="vincent_infobox_overlay vincent_js_bg_color" data-bgcolor="' . esc_attr($infobox_bg_color) . '"></div>
			            <div class="vincent_infobox_content with_title_tag_' . esc_attr($infobox_title_tag) . '">
			                <div class="vincent_infobox_title_cont title_align_' . esc_attr($infobox_title_align) . '">
			                    <' . esc_attr($infobox_title_tag) . ' class="vincent_js_color" data-color="' . esc_attr($infobox_title_color) . '">
			                        ' . esc_html($infobox_title) . '
			                    </' . esc_attr($infobox_title_tag) . '>
			                </div>
			
			                <div class="vincent_infobox_text_cont text_align_' . esc_attr($infobox_text_align) . '">
			                    <p class="vincent_js_color" data-color="' . esc_attr($infobox_text_color) . '">
			                        ' . esc_html($infobox_text) . '
			                    </p>
			                </div>
			            </div>
			        </div>
			    </div>
			';

if (isset($infobox_link_status) && $infobox_link_status !== 'false') {
	$html .= '
		</a>
	';
}

echo $html;