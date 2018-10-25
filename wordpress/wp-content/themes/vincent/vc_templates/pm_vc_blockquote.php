<?php
extract(
    shortcode_atts(
        array(
            'blockquote_author' => '',
            'blockquote_author_position' => '',
            'blockquote_view_type' => 'type_1',
            'blockquote_author_avatar' => 'false',
            'blockquote_author_image' => '',
            'blockquote_author_color' => '#121618',
            'custom_css' => '',
            'custom_class' => '',
        ),
        $atts
    )
);

$content = wpb_js_remove_wpautop($content, true);

if ($blockquote_view_type == 'type_1') {
    $blockquote_author_position = (strlen($blockquote_author_position) > 0 ? ', ' . $blockquote_author_position : '');
}


if ($blockquote_author_image !== '') {
    $blockquote_author_image_url = wp_get_attachment_image_url($blockquote_author_image);
} else {
    $blockquote_author_image_url = '';
}

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);
$html = '';

$html .= '
    <div class="vincent_element_wrap vincent_element_blockquote ' . esc_attr($custom_class) . esc_attr($css_class) . ' view_' . esc_attr($blockquote_view_type) . '">
        <div class="vincent_blockquote">
            ' . $content . '
        </div>

        <div class="vincent_blockquote_author ' . (($blockquote_view_type == 'type_2') ? 'vincent_js_color' : '') . ' ' . (($blockquote_author_avatar == 'true') ? 'with_avatar' : '') . '" ' . (($blockquote_view_type == 'type_2') ? 'data-color="' . esc_attr($blockquote_author_color) . '"' : '') . '>
            ';

            if ($blockquote_author_image_url !== '') {
                $html .= '
                    <div class="vincent_author_avatar">
                        <img src="' . esc_url($blockquote_author_image_url) . '" alt="" />
                    </div>
                ';
            }

            $html .= '
            ' . $blockquote_author . '
            <span class="vincent_author_position">
                ' . $blockquote_author_position . '
            </span>
        </div>
    </div>
';

echo $html;