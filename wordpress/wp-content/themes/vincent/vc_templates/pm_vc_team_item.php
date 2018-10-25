<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'team_image' => '',
            'team_name' => '',
            'team_position' => '',
            'social_buttons_status' => 'false',
            'social_buttons' => ''
        ), $atts
    )
);

$social_buttons = (array) vc_param_group_parse_atts( $social_buttons );
$buttons_html = '';

foreach ($social_buttons as $key => $value) {
    if (isset($value['team_button_link']) && $value['team_button_link'] !== '') {
        $link = vc_build_link($value['team_button_link']);

        if (isset($link['url']) && $link['url'] !== '') {
            $team_button_link = $link['url'];
        } else {
            $team_button_link = '#';
        }

        if (isset($link['target']) && $link['target'] !== '') {
            $team_button_target = $link['target'];
        } else {
            $team_button_target = '';
        }

        if (isset($link['rel']) && $link['rel'] !== '') {
            $team_button_rel = $link['rel'];
        } else {
            $team_button_rel = '';
        }

        if (isset($link['title']) && $link['title'] !== '') {
            $team_button_title = $link['title'];
        } else {
            $team_button_title = '';
        }
    } else {
        $team_button_link = '#';
        $team_button_target = '';
        $team_button_rel = '';
        $team_button_title = '';
    }

    $buttons_html .= '
        <a class="vincent_team_social_button" href="' . esc_url($team_button_link) . '" ' . (($team_button_target !== '') ? 'target="' . esc_attr($team_button_target) . '"' : '') . (($team_button_rel !== '') ? 'rel="' . esc_attr($team_button_rel) . '"' : '') . ' data-color="' . esc_attr($value['team_button_color']) . '" data-hover="' . esc_attr($value['team_button_hover']) . '">
            <i class="' . esc_attr($value['team_button_icon_fontawesome']) . '"></i>
            ';
            if ($team_button_title !== '') {
                $buttons_html .= esc_html($team_button_title);
            }
            $buttons_html .= '
        </a>
    ';
}

if ($team_image !== '') {
    $team_image_url = wp_get_attachment_image_url($team_image, 'full');
}

$html = '';

//$html .= print_r($social_buttons);
//$html .= $buttons_html;

$html .= '
    <div class="vincent_team_item">
        <div class="vincent_team_item_wrapper">
            <div class="vincent_team_image">
                ';

                if ($social_buttons_status == 'true') {
                    $html .= '
                        <div class="vincent_team_overlay"></div>
                        <div class="vincent_team_socials">
                            ' . $buttons_html . '
                        </div>
                    ';
                }

                if ($team_image !== '') {
                    $html .= '
                        <img src="' . aq_resize(esc_url($team_image_url), 1600, 1600, true, true, true) . '" alt="" />
                    ';
                }

                $html .= '
            </div>
            <div class="vincent_team_description">
                ';

                if ($team_name !== '') {
                    $html .= '
                        <h5>' . esc_html($team_name) . '</h5>
                    ';
                }

                if ($team_position !== '') {
                    $html .= '
                        <p>' . esc_html($team_position) . '</p>
                    ';
                }

                $html .= '
            </div>
        </div>
    </div>
';

echo $html;