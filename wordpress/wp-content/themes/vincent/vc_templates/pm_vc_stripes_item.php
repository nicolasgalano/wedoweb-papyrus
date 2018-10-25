<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
			'item_image' => '',
			'item_title' => '',
            'link_type' => 'none',
            'item_link' => '',
			'title_color' => '#ffffff',
			'overlay_color' => 'rgba(0, 0, 0, .6)',
            'custom_class' => '',
        ),
        $atts
    )
);

$html = '';
$attach_meta = vincent_get_attachment($item_image);
$photoAlt = $attach_meta['alt'];
$featured_image = esc_url(wp_get_attachment_url($item_image));

if ($link_type !== 'none') {
    $btn_link_temp = vc_build_link($item_link);
    $url = $btn_link_temp['url'];
    $link_title = $btn_link_temp['title'];
    $target = $btn_link_temp['target'];

    if ($url !== '') {
        $url = esc_url($url);
    } else {
        $url = '#';
    }
    if ($link_title !== '') {
        $link_title_part = 'title="' . esc_attr($link_title) . '"';
    } else {
        $link_title_part = '';
    }
    if ($target !== '') {
        $link_title_target = 'target="' . esc_attr($target) . '"';
    } else {
        $link_title_target = '';
    }	
}

$html .= '
	<div class="vincent_stripes_item ' . esc_attr($custom_class) . '">
		<div class="vincent_stripes_item_inner vincent_js_bg_image" data-src="'. $featured_image .'">
	        ' . (($link_type == 'link_all_item') ? '<a href="' . $url . '" ' . $link_title_part . ' ' . $link_title_target . ' class="stripe_link">' : '') . '
                <div class="vincent_stripe_overlay vincent_js_bg_color" data-bgcolor="' . esc_attr($overlay_color) . '"></div>
                <div class="vincent_stripe_content">
                    <h2 class="stripes_title vincent_js_color" data-color="'. esc_attr($title_color) .'">
                        ' . (($link_type == 'link_by_title') ? '<a href="' . $url . '" ' . $link_title_part . ' ' . $link_title_target . ' class="stripe_link vincent_js_color" data-color="'. esc_attr($title_color) .'">' : '') . '
                            '. esc_attr($item_title) .'
                        ' . (($link_type == 'link_by_title') ? '</a>' : '') . '
                    </h2>
                </div>
            ' . (($link_type == 'link_all_item') ? '</a>' : '') . '
		</div>
	</div>
';

echo $html;