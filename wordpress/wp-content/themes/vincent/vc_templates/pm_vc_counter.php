<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'counter_count' => '',
            'counter_title' => '',
            'counter_icon_status' => 'false',
            'counter_icon_align' => 'right',
            'counter_icon' => 'fa fa-adjust',
            'counter_count_color' => '#dce4e8',
            'counter_title_color' => '#dce4e8',
            'custom_css' => '',
            'custom_class' => ''
        ), $atts
    )
);

wp_enqueue_script('vincent_waypoint', get_template_directory_uri() . '/js/waypoint.js', array('jquery'), false, true);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);

$html = '';

$html .= '
    <div class="vincent_vc_counter ' . esc_attr($custom_class) . esc_attr($css_class) . '">
        <div class="vincent_counter_count_cont vincent_js_color icon_align_' . esc_attr($counter_icon_align) . '" data-color="' . esc_attr($counter_count_color) . '">
            ';

            if ($counter_icon_status == 'true' && $counter_icon_align == 'left') {
                $html .= '
                    <i class="' . esc_attr($counter_icon) . '"></i>
                ';
            }

            $html .= '
                <h1 class="vincent_counter_count vincent_js_color" data-color="' . esc_attr($counter_count_color) . '" data-count="' . esc_attr($counter_count) . '">0</h1>
            ';

            if ($counter_icon_status == 'true' && $counter_icon_align == 'right') {
                $html .= '
                    <i class="' . esc_attr($counter_icon) . '"></i>
                ';
            }

            $html .= '
            <div class="vincent_counter_count_temp"></div>
        </div>
        <div class="vincent_counter_description_cont">
            <h4 class="vincent_js_color vincent_js_color" data-color="' . esc_attr($counter_title_color) . '">' . esc_html($counter_title) . '</h4>
        </div>
    </div>
';

vincentHelper::getInstance()->addJSToFooter('pm_vc_counter', '

    if (jQuery(window).width() > 760) {
        jQuery(".vincent_vc_counter").waypoint(function(){
            var vincent_count = jQuery(this).find(".vincent_counter_count").attr("data-count");

            jQuery(this).find(".vincent_counter_count_temp").stop().animate(
                {width: vincent_count},
                {duration: 3000, step: function(now){
                    var data = Math.floor(now);

                    jQuery(this).parent().find(".vincent_counter_count").html(data);
                }}
            );
        },
        {offset: "bottom-in-view", triggerOnce: true});
    } else {
        jQuery(".vincent_vc_counter").each(function(){
            var vincent_count = jQuery(this).find(".vincent_counter_count").attr("data-count");

            jQuery(this).find(".vincent_counter_count_temp").animate(
                {width: vincent_count},
                {duration: 3000, step: function(now){
                    var data = Math.floor(now);

                    jQuery(this).parent().find(".vincent_counter_count").html(data);
                }}
            );
        });
    }

', 'document-ready');

echo $html;