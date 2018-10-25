<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/
	global $vincent_custom_css;
    $vincent_custom_css = '
    body,
    .vincent_blockquote:after,
    .vincent_comment_text:after,
    .vincent_transparent_header .vincent_menu_mobile,
    .vincent_transparent_header .vincent_menu_mobile .vincent_menu li .sub-menu {
        background-color: ' . esc_attr(vincent_get_theme_mod('color_body')) .  ';
    }
    ';

    # Main Theme Color
    $vincent_custom_css .= '
    a,
    .vincent_dropcaps,
    .vincent_footer_menu a:hover, 
    .vincent_tiny a,
    .vincent_tiny ol li:before,
    .vincent_tiny ul li:before,
    .vincent_sidebar .widget a:hover,
    .vincent_sidebar .widget.widget_calendar a,
    .vincent_sidebar ul li.vincent_link_hover:before,
    .vincent_about_author h6 a:hover,
    .vincent_post_nav_button a:hover,
    .vincent_post_nav_button a:hover:before,
    .vincent_post_nav_button a:hover:after,
    .vincent_comment_reply a:hover,
    .vincent_content a.comment-edit-link:hover,
    .logged-in-as a:hover,
    .form-submit input:hover,
    .vincent_featured_posts .vincent_post_title:hover,
    .vincent_meta a:hover,
    .vincent_post_tags a:hover,
    .vincent_comments_title span,
    .vincent_link a:hover,
    .grid_post .vincent_title h4 a:hover,
    .grid_post .vincent_meta a:hover,
    body .nav-links a:hover,
    .vincent_element_blog .entry-title a:hover,
    .vincent_element_blog .vincent_meta a:hover,
    .vincent_element_blog .read_more_cont .vincent_button:hover,
    body .vc_grid-container-wrapper .vc_gitem-zone:after,
    .form-submit input[type="submit"]:hover,
    input[type="submit"]:hover,
    .vincent_shopping_cart .vincent_total_items a:hover,
    body .vc_custom_heading a:hover,
    .vincent_404_home_btn:hover,
    .vincent_footer_socials_cont a:hover {
        color: ' . esc_attr(vincent_get_theme_mod('color_main')) . ';
    }

    body .vc_tta.vc_general.vc_tta-style-pixel_mafia .vc_tta-panel-heading:hover a,
    body .vc_tta.vc_general.vc_tta-style-pixel_mafia .vc_active .vc_tta-panel-heading a,
    .vincent_stripes .stripes_title a:hover {
        color: ' . esc_attr(vincent_get_theme_mod('color_main')) . ' !important;
    }

    .form-submit input:hover,
    body .nav-links a:hover,
    .vincent_element_blog .read_more_cont .vincent_button:hover,
    input[type="submit"]:hover,
    body .vc_tta.vc_general.vc_tta-style-pixel_mafia .vc_tta-panel-heading:hover,
    body .vc_tta.vc_general.vc_tta-style-pixel_mafia .vc_active .vc_tta-panel-heading,
    .vincent_404_home_btn,
    .widget_tag_cloud a:hover {
        border-color: ' . esc_attr(vincent_get_theme_mod('color_main')) . ';
    }

    .vincent_team_image .vincent_team_overlay,
    .vincent_shopping_cart .vincent_cart_item_counter,
    body .vc_grid-container-wrapper .vc_gitem-zone:before,
    .vincent_subscribe_form input[type="submit"]:hover,
    .vincent_404_home_btn,
    .vincent_back_to_top,
    .null-instagram-feed .instagram-pics li a:after {
        background: ' . esc_attr(vincent_get_theme_mod('color_main')) . ';
    }

    .vincent_corners:after,
    .vincent_corners_bottom:after,
    .vincent_corners_both:before,
    .vincent_corners_both:after {
        background-image:
            linear-gradient(rgba('.vincent_hex2rgb(vincent_get_theme_mod('color_body')).',1), rgba('.vincent_hex2rgb(vincent_get_theme_mod('color_body')).',1)),
            linear-gradient(-45deg, transparent 75%, rgba('.vincent_hex2rgb(vincent_get_theme_mod('color_body')).',1) 75%),
            linear-gradient(45deg, transparent 75%, rgba('.vincent_hex2rgb(vincent_get_theme_mod('color_body')).',1) 75%);
    }

    .vincent_title_block:before {
        background-color: rgba(' . vincent_hex2rgb(vincent_get_theme_mod('color_main')) . ', 0.9);
    }

    .vincent_title_block h1,
    .vincent_shopping_cart .vincent_cart_item_counter,
    .vincent_404_home_btn {
        color: ' . esc_attr(vincent_get_theme_mod('title_text_color')) . ';
    }

    h1, h2, h3, h4, h5, h6 {
        color: ' . vincent_get_theme_mod('color_headings') . ';
        font-family: "' . esc_attr(vincent_get_theme_mod('alternate_font_family')) . '";
    }

    .vincent_sidebar .widget_search input {
        font-family: "' . esc_attr(vincent_get_theme_mod('alternate_font_family')) . '";
    }

    .vincent_ftext, .vincent_footer_menu, .vincent_blockquote_author, .vincent_dropcap {
        font-family: "' . esc_attr(vincent_get_theme_mod('alternate_font_family')) . '";
    }

    body {
        font-family: "' . esc_attr(vincent_get_theme_mod('main_font_family')) . '";
        font-size: ' . absint(vincent_get_theme_mod('main_font_size')) . 'px;
        line-height: ' . absint(vincent_get_theme_mod('main_line_height')) . 'px;
        font-weight: ' . absint(vincent_get_theme_mod('main_font_weight')) . ';
        color: ' . esc_attr(vincent_get_theme_mod('color_content')) . ';
    }

    .vincent_blockquote_author span {
        font-family: "' . esc_attr(vincent_get_theme_mod('main_font_family')) . '";
    }

    .vincent_tiny a:hover,
    .vincent_sidebar .widget .widgettitle,
    .vincent_sidebar .widget a,
    .vincent_sidebar .widget.widget_calendar a:hover,
    .vincent_shopping_cart .vincent_total_items a {
        color: ' . esc_attr(vincent_get_theme_mod('color_content')) . ';
    }

    header .vincent_logo_cont {
        padding-top: ' . absint(vincent_get_theme_mod('logo_padding_top')) . 'px;
        padding-bottom: ' . absint(vincent_get_theme_mod('logo_padding_bottom')) . 'px;
    }
    ';

    # Image Logo
    if (vincent_get_theme_mod('logo_type') == 'image_logo') {
        $vincent_logo_metadata = wp_get_attachment_metadata(attachment_url_to_postid(vincent_get_theme_mod('logo_image')));
        $vincent_logo_width = (isset($vincent_logo_metadata['width']) ? $vincent_logo_metadata['width'] : '352');
        $vincent_logo_height = (isset($vincent_logo_metadata['height']) ? $vincent_logo_metadata['height'] : '198');

        $vincent_custom_css .= '
        header .vincent_image_logo {
            width: ' . absint($vincent_logo_width) . 'px;
            height: ' . absint($vincent_logo_height) . 'px;
            background: url("' . esc_url(vincent_get_theme_mod('logo_image')) . '") 0 0 no-repeat transparent;
        }
        ';

        # Retina
        if (vincent_get_theme_mod('logo_retina') == true) {
            $vincent_logo_width = $vincent_logo_width / 2;
            $vincent_logo_height = $vincent_logo_height / 2;
            $vincent_custom_css .= '
            header .vincent_image_logo.vincent_retina {
                width: ' . absint($vincent_logo_width) . 'px;
                height: ' . absint($vincent_logo_height) . 'px;
                background-size: ' . absint($vincent_logo_width) . 'px ' . absint($vincent_logo_height) . 'px;
            }
            ';
        }
        $vincent_menu_lh_fix = 3;
    }

    # Text Logo
    if (vincent_get_theme_mod('logo_type') == 'text_logo') {
        $vincent_logo_height = absint(vincent_get_theme_mod('logo_text_size'));
        $vincent_menu_lh_fix = 6;
        $vincent_custom_css .= '
        header .vincent_text_logo a {
            font-size: ' . absint(vincent_get_theme_mod('logo_text_size')) . 'px;
            line-height: ' . absint(vincent_get_theme_mod('logo_text_size')) . 'px;
            color: ' . esc_attr(vincent_get_theme_mod('logo_text_color')) . ';
            font-weight: ' . esc_attr(vincent_get_theme_mod('logo_text_weight')) . ';
            font-style: ' . (vincent_get_theme_mod('logo_text_style_italic') == true ? 'italic' : 'normal') . ';
            font-family:"' . esc_attr(vincent_get_theme_mod('logo_text_font')) . '";
            text-transform:' . (vincent_get_theme_mod('logo_text_style_uppercase') == true ? 'uppercase' : 'none') . ';
        }

        .vincent_transparent_header header .vincent_text_logo a {
            color: ' . esc_attr(vincent_get_theme_mod('logo_text_color_transparent_header')) . ';
        }

        header .vincent_text_logo a:hover {
            color: ' . esc_attr(vincent_get_theme_mod('logo_text_hover')) . ';
        }

        .vincent_transparent_header header .vincent_text_logo a:hover {
            color: ' . esc_attr(vincent_get_theme_mod('logo_text_hover_transparent_header')) . ';
        }
        ';
    }

    # Footer Image Logo
    if (vincent_get_theme_mod('footer_logo_type') == 'image_logo') {
        $vincent_footer_logo_metadata = wp_get_attachment_metadata(attachment_url_to_postid(vincent_get_theme_mod('footer_logo_image')));
        $vincent_footer_logo_width = (isset($vincent_footer_logo_metadata['width']) ? $vincent_footer_logo_metadata['width'] : '280');
        $vincent_footer_logo_height = (isset($vincent_footer_logo_metadata['height']) ? $vincent_footer_logo_metadata['height'] : '158');

        $vincent_custom_css .= '
        footer .vincent_image_logo {
            width: ' . absint($vincent_footer_logo_width) . 'px;
            height: ' . absint($vincent_footer_logo_height) . 'px;
            background: url("' . esc_url(vincent_get_theme_mod('footer_logo_image')) . '") 0 0 no-repeat transparent;
        }
        ';

        # Footer Logo Retina
        if (vincent_get_theme_mod('footer_logo_retina') == true) {
            $vincent_footer_logo_width = $vincent_footer_logo_width / 2;
            $vincent_footer_logo_height = $vincent_footer_logo_height / 2;
            $vincent_custom_css .= '
            footer .vincent_image_logo.vincent_retina {
                width: ' . absint($vincent_footer_logo_width) . 'px;
                height: ' . absint($vincent_footer_logo_height) . 'px;
                background-size: ' . absint($vincent_footer_logo_width) . 'px ' . absint($vincent_footer_logo_height) . 'px;
            }
            ';
        }
    }

    # Footer Text Logo
    if (vincent_get_theme_mod('footer_logo_type') == 'text_logo') {
        $vincent_footer_logo_height = absint(vincent_get_theme_mod('footer_logo_text_size'));
        $vincent_custom_css .= '
        footer .vincent_text_logo a {
            font-size: ' . absint(vincent_get_theme_mod('footer_logo_text_size')) . 'px;
            line-height: ' . absint(vincent_get_theme_mod('footer_logo_text_size')) . 'px;
            color: ' . esc_attr(vincent_get_theme_mod('footer_logo_text_color')) . ';
            font-weight: ' . esc_attr(vincent_get_theme_mod('footer_logo_text_weight')) . ';
            font-style: ' . (vincent_get_theme_mod('footer_logo_text_style_italic') == true ? 'italic' : 'normal') . ';
            font-family:"' . esc_attr(vincent_get_theme_mod('footer_logo_text_font')) . '";
            text-transform:' . (vincent_get_theme_mod('footer_logo_text_style_uppercase') == true ? 'uppercase' : 'none') . ';
        }

        footer .vincent_text_logo a:hover {
            color: ' . esc_attr(vincent_get_theme_mod('footer_logo_text_hover')) . ';
        }
        ';
    }

    # Header Menu & Logo
    $vincent_custom_css .= '
    header {
        color: ' . esc_attr(vincent_get_theme_mod('header_text_color')) . ';
        font-family:"' . esc_attr(vincent_get_theme_mod('header_menu_font_family')) . '";
    }

    header .vincent_menu li a {
        color: ' . esc_attr(vincent_get_theme_mod('header_links_color')) . ';
        text-transform: ' . (vincent_get_theme_mod('header_menu_uppercase') == true ? 'uppercase' : 'none') . ';
        font-style: ' . (vincent_get_theme_mod('header_menu_italic') == true ? 'italic' : 'normal') . ';
        font-weight: ' . esc_attr(vincent_get_theme_mod('header_menu_font_weight')) . ';
        font-size: ' . absint(vincent_get_theme_mod('header_menu_font_size')) . 'px;
        line-height: ' . absint(vincent_get_theme_mod('header_menu_font_size')) . 'px;
    }

    .vincent_title_block {
        background-image: url("' . esc_url(vincent_get_theme_mod('title_bg_image')) . '");
    }

    header .vincent_menu li:hover > a {
        color: ' . esc_attr(vincent_get_theme_mod('header_links_hover_color')) . ';
    }

    .vincent_transparent_header header .vincent_menu li a {
        color: ' . esc_attr(vincent_get_theme_mod('header_links_color_transparent_header')) . ';
    }

    .vincent_transparent_header header .vincent_menu li:hover > a {
        color: ' . esc_attr(vincent_get_theme_mod('header_links_hover_color_transparent_header')) . ';
    }

    .vincent_transparent_header header .vincent_menu > li > a:after {
        background-color: ' . esc_attr(vincent_get_theme_mod('header_links_color_transparent_header')) . ';
    }

    header .vincent_menu li .sub-menu {
        background: ' . esc_attr(vincent_get_theme_mod('header_sub_menu_bg_color')) . ';
    }

    header .vincent_menu > li > .sub-menu:before {
        border-bottom-color: ' . esc_attr(vincent_get_theme_mod('header_sub_menu_bg_color')) . ';
    }

    header .vincent_menu li .sub-menu .sub-menu {
        background: ' . esc_attr(vincent_get_theme_mod('header_sub_menu_3_lvl_bg_color')) . ';
    }

    .vincent_transparent_header header .vincent_menu li .sub-menu {
        background: ' . esc_attr(vincent_get_theme_mod('header_sub_menu_bg_color_transparent_header')) . ';
    }

    .vincent_transparent_header header .vincent_menu li .sub-menu .sub-menu {
        background: ' . esc_attr(vincent_get_theme_mod('header_sub_menu_3_lvl_bg_color_transparent_header')) . ';
    }

    header .vincent_menu li .sub-menu li a {
        font-family: "' . esc_attr(vincent_get_theme_mod('header_sub_menu_font_family')) . '";
        font-size: ' . absint(vincent_get_theme_mod('header_sub_menu_font_size')) . 'px;
        line-height: ' . (absint(vincent_get_theme_mod('header_sub_menu_font_size')) + 1) . 'px;
    }

    header .vincent_menu .sub-menu li.menu-item-has-children:after {
        color: ' . esc_attr(vincent_get_theme_mod('header_links_color')) . ';
    }

    header .vincent_menu li .sub-menu a:after {
        background: ' . esc_attr(vincent_get_theme_mod('header_sub_menu_divider_color')) . ';
    }

    header .vincent_menu li .sub-menu .sub-menu a:after {
        background: ' . esc_attr(vincent_get_theme_mod('header_sub_menu_3_lvl_divider_color')) . ';
    }

    .vincent_menu li.current-menu-item > a,
    header .vincent_menu li:hover li:hover > a,
    header .sub-menu li.current-menu-item > a,
    header .sub-menu li.current-menu-ancestor > a,
    header .vincent_menu .sub-menu li.menu-item-has-children.current-menu-ancestor:after,
    header .vincent_menu .sub-menu li.menu-item-has-children:hover:after {
        color: ' . esc_attr(vincent_get_theme_mod('header_links_hover_color')) . ';
    }

    .error404 h1, .error404 h2, .error404 h3, .error404 h4, .error404 h5, .error404 h6, .error404 p {
        color: ' . esc_attr(vincent_get_theme_mod('404_text_color')) . ';
    }
    ';

    # Footer
    $vincent_custom_css .= '
    footer .vincent_logo_cont {
        padding-top: ' . absint(vincent_get_theme_mod('footer_logo_padding_top')) . 'px;
        padding-bottom: ' . absint(vincent_get_theme_mod('footer_logo_padding_bottom')) . 'px;
    }

    footer, .vincent_footer_menu a {
        color: ' . esc_attr(vincent_get_theme_mod('footer_copyright_color')) . ';
    }
    ';

    # Typography
    $vincent_custom_css .= '
    h1 {
        font-size: ' . absint(vincent_get_theme_mod('h1_font_size')) . 'px;
        line-height: ' . absint(vincent_get_theme_mod('h1_line_height')) . 'px;
    }

    h2 {
        font-size: ' . absint(vincent_get_theme_mod('h2_font_size')) . 'px;
        line-height: ' . absint(vincent_get_theme_mod('h2_line_height')) . 'px;
    }

    h3 {
        font-size: ' . absint(vincent_get_theme_mod('h3_font_size')) . 'px;
        line-height: ' . absint(vincent_get_theme_mod('h3_line_height')) . 'px;
    }

    h4 {
        font-size: ' . absint(vincent_get_theme_mod('h4_font_size')) . 'px;
        line-height: ' . absint(vincent_get_theme_mod('h4_line_height')) . 'px;
    }

    h5 {
        font-size: ' . absint(vincent_get_theme_mod('h5_font_size')) . 'px;
        line-height: ' . absint(vincent_get_theme_mod('h5_line_height')) . 'px;
    }

    h6 {
        font-size: ' . absint(vincent_get_theme_mod('h6_font_size')) . 'px;
        line-height: ' . absint(vincent_get_theme_mod('h6_line_height')) . 'px;
    }
    ';

    # Content Color
    $vincent_custom_css .= '
    .vincent_prev_post_button:before,
    .vincent_next_post_button:after,
    body .nav-links span,
    body .nav-links a,
    .vincent_element_blog .read_more_cont .vincent_button {
        border-color: ' . esc_attr(vincent_get_theme_mod('color_content')) . ';
    }

    body .nav-links a,
    .form-submit input[type="submit"],
    .vincent_reserve_submit:hover:after,
    .vincent_reserve_submit:hover input[type="submit"],
    input[type="submit"],
    body .vc_custom_heading a {
        color: ' . esc_attr(vincent_get_theme_mod('color_content')) . ';
    }
    ';

    # Alternative Font
    $vincent_custom_css .= '
    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="time"],
    input[type="datetime"],
    input[type="url"],
    textarea,
    input[type="submit"],
    .vincent_meta,
    .vincent_post_tags,
    .vincent_sharing,
    .vincent_post_nav_button a,
    .vincent_comment_reply a,
    .vincent_content a.comment-edit-link,
    .comment-form input,
    .comment-form textarea,
    body .nav-links span,
    body .nav-links a,
    .vincent_element_blog .read_more_cont .vincent_button,
    .vincent_testimonial_author,
    .vincent_team_description p,
    .vincent_vc_custom_button,
    .simple_post_item .vincent_post_date,
    .vincent_simple_post_read_more_button,
    .vincent_element_countdown,
    .vincent_404_home_btn,
    .widget_tag_cloud a,
    .widget_vincentfeaturedposts a {
        font-family: "' . esc_attr(vincent_get_theme_mod('alternate_font_family')) . '";
    }
    ';

    # Dividers Color
    $vincent_custom_css .= '
    footer,
    .vincent_tiny hr,
    body .nav-links {
        border-top-color: ' . esc_attr(vincent_get_theme_mod('divider_color')) . ';
    }

    .vincent_about_author,
    .vincent_element_blog .stand_post {
        border-color: ' . esc_attr(vincent_get_theme_mod('divider_color')) . ';
    }
    ';

    # Borders Color
    $vincent_custom_css .= '
    .vincent_comment_text,
    .vincent_comment_text:before,
    .comment-form input,
    .comment-form textarea,
    .vincent_sidebar .widget_search input,
    .vincent_blockquote,
    .vincent_blockquote:before,
    .vincent_link,
    .grid_post .vincent_link_cont,
    .grid_post .vincent_aside_cont,
    body .nav-links span.current,
    body .vc_tta.vc_general.vc_tta-style-pixel_mafia .vc_tta-panel-heading,
    .widget_tag_cloud a,
    .vincent_sidebar .widget select,
    .vincent_sticky_post,
    .stand_post.vincent_sticky_post:after {
        border-color: ' . esc_attr(vincent_get_theme_mod('borders_color')) . ';
    }
    
    .vincent_sidebar .widget.widget_product_search input[type="search"] {
        border-color: ' . esc_attr(vincent_get_theme_mod('borders_color')) . ' !important;
    }

    body .nav-links span.current {
        color: ' . esc_attr(vincent_get_theme_mod('borders_color')) . ';
    }
    ';

    # Form Buttons Color
    $vincent_custom_css .= '
    .vincent_sharing a:hover,
    .form-submit input,
    .vincent_reserve_submit:hover input[type="submit"],
    input[type="submit"] {
        background: ' . esc_attr(vincent_get_theme_mod('form_buttons_color')) . ';
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="time"],
    input[type="datetime"],
    input[type="url"],
    input[type="confirm_email"],
    input[type="number"],
    textarea,
    input[type="submit"],
    .form-submit input,
    .vincent_reserve_submit:hover input[type="submit"],
    .vincent_reserve_form ~ div.wpcf7-mail-sent-ok,
    .vincent_reserve_form ~ div.wpcf7-validation-errors {
        border-color: ' . esc_attr(vincent_get_theme_mod('form_buttons_color')) . ';
    }

    .vincent_reserve_form input[type="text"],
    .vincent_reserve_form input[type="password"],
    .vincent_reserve_form input[type="email"],
    .vincent_reserve_form input[type="tel"],
    .vincent_reserve_form input[type="date"],
    .vincent_reserve_form input[type="time"],
    .vincent_reserve_form input[type="datetime"],
    .vincent_reserve_form input[type="url"],
    .vincent_reserve_form input[type="confirm_email"],
    .vincent_reserve_form input[type="number"],
    .vincent_reserve_submit input[type="submit"],
    .vincent_reserve_form textarea,
    .vincent_reserve_submit:after,
    .vincent_reserve_form span.wpcf7-not-valid-tip,
    .vincent_reserve_form ~ div.wpcf7-mail-sent-ok,
    .vincent_reserve_form ~ div.wpcf7-validation-errors {
        color: ' . esc_attr(vincent_get_theme_mod('form_buttons_color')) . ';
    }

    .vincent_reserve_form input[type="text"]::-webkit-input-placeholder,
    .vincent_reserve_form textarea::-webkit-input-placeholder {
        color: ' . esc_attr(vincent_get_theme_mod('form_buttons_color')) . ';
    }
    ';

    # Element Info Box
    $vincent_custom_css .= '
    .vincent_infobox_content.with_title_tag_h1 {
        margin-top: -' . esc_attr((vincent_get_theme_mod('h1_line_height')) / 2) . 'px;
    }

    .vincent_infobox_content.with_title_tag_h2 {
        margin-top: -' . esc_attr((vincent_get_theme_mod('h2_line_height')) / 2) . 'px;
    }

    .vincent_infobox_content.with_title_tag_h3 {
        margin-top: -' . esc_attr((vincent_get_theme_mod('h3_line_height')) / 2) . 'px;
    }

    .vincent_infobox_content.with_title_tag_h4 {
        margin-top: -' . esc_attr((vincent_get_theme_mod('h4_line_height')) / 2) . 'px;
    }

    .vincent_infobox_content.with_title_tag_h5 {
        margin-top: -' . esc_attr((vincent_get_theme_mod('h5_line_height')) / 2) . 'px;
    }

    .vincent_infobox_content.with_title_tag_h6 {
     margin-top: -' . esc_attr((vincent_get_theme_mod('h6_line_height')) / 2) . 'px;
    }

    .vincent_infobox_content.with_title_tag_p {
        margin-top: -' . esc_attr((vincent_get_theme_mod('main_line_height')) / 2) . 'px;
    }
    ';

    # Other
    $vincent_custom_css .= '
    .owl-theme .owl-controls .owl-page span {
        background-color: ' . esc_attr(vincent_get_theme_mod('color_content')) . ';
    }

    .vincent_subscribe_form input[type="submit"]:hover {
        color: ' . esc_attr(vincent_get_theme_mod('color_body')) . ';
    }

    .stand_post.vincent_sticky_post:after {
        background: ' . esc_attr(vincent_get_theme_mod('color_body')) . ';
    }
    ';

    # Error 404 Page
    $vincent_custom_css .= '
    .vincent_404_content_wrapper {
        background-color: ' . esc_attr(vincent_get_theme_mod('404_bg_color')) . ';
        background-image: url(' . esc_url(vincent_get_theme_mod('404_bg_image')) . ');
    }
    ';

    # WooCommerce Styles
    if (class_exists('WooCommerce')) {
        # Main Color
        $vincent_custom_css .= '
        .vc_column-inner .woocommerce ul.products li.product a:hover h2,
        .vc_column-inner .woocommerce-page ul.products li.product a:hover h2,
        .vincent_shopping_cart a:hover .vincent_total_items,
        .vincent_prod_cat_listing li.active,
        .vincent_prod_cat_listing li:hover,
        .vincent_prod_output_container h5 a:hover,
        .vincent_prod_output_container.view_type_2 .vincent_prod_list_price,
        .vincent_best_offer_output_container.view_type_2 .vincent_prod_list_price,
        .vincent_prod_output_container.view_type_2 .vincent_prod_list_price .woocommerce-Price-amount,
        .vincent_best_offer_output_container h5 a:hover,
        .vincent_best_offer_output_container.view_type_2 .vincent_prod_list_price .woocommerce-Price-amount,
        .woocommerce .vincent_woocommerce_content ul.products li.product .woocommerce-LoopProduct-link:hover h2,
        .woocommerce-page .vincent_woocommerce_content ul.products li.product .woocommerce-LoopProduct-link:hover h2,
        .woocommerce .vincent_woocommerce_content ul.products li.product .add_to_cart_button:hover,
        .woocommerce .vincent_woocommerce_content ul.products li.product .added_to_cart:hover,
        .woocommerce nav.woocommerce-pagination ul li a:hover,
        .woocommerce .widget_shopping_cart .buttons a.checkout:hover,
        .woocommerce.widget_shopping_cart .buttons a.checkout:hover,
        .woocommerce .widget_price_filter .price_slider_amount .button:hover,
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
        .single-product .product_meta span.posted_in a:hover,
        .single-product .product_meta span.tagged_as a:hover,
        .single-product .product_meta span.sku_wrapper:before,
        .single-product .product_meta span.posted_in:before,
        .single-product .product_meta span.tagged_as:before,
        .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
        .woocommerce #reviews #comments .star-rating:before,
        .woocommerce #reviews #comments .star-rating span:before,
        .woocommerce .woocommerce-product-rating .star-rating:before,
        .woocommerce .woocommerce-product-rating .star-rating span:before,
        .woocommerce .woocommerce-product-rating a:hover,
        .woocommerce-cart .shop_table .product-name a:hover,
        .woocommerce-MyAccount-navigation a:hover,
        .woocommerce-MyAccount-navigation .is-active a {
            color: ' . esc_attr(vincent_get_theme_mod('color_main')) . ';
        }

        .woocommerce .widget_shopping_cart .cart_list li a.remove:hover,
        .woocommerce.widget_shopping_cart .cart_list li a.remove:hover,
        .single-product button.single_add_to_cart_button:hover,
        .woocommerce-cart .shop_table a.remove:hover,
        .woocommerce div.product form.cart .variations td.value .reset_variations:hover {
            color: ' . esc_attr(vincent_get_theme_mod('color_main')) . ' !important;
        }

        .vincent_prod_output_container .vincent_prod_list_overlay,
        .vincent_best_offer_output_container .vincent_prod_list_overlay,
        .woocommerce .widget_shopping_cart .buttons a.checkout,
        .woocommerce.widget_shopping_cart .buttons a.checkout,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
        .woocommerce #review_form #respond .form-submit input:hover,
        .woocommerce #respond input#submit:hover,
        .woocommerce a.button:hover,
        .woocommerce button.button:hover,
        .woocommerce input.button:hover,
        .woocommerce-cart table.cart td.actions .button:hover,
        .woocommerce-cart .cart-collaterals .wc-proceed-to-checkout a,
        .woocommerce #payment #place_order,
        .woocommerce-page #payment #place_order,
        .woocommerce div.product div.images .woocommerce-product-gallery__image:nth-child(n+2) a:after,
        .select2-container--default .select2-results__option[aria-selected="true"],
        .select2-container--default .select2-results__option--highlighted[aria-selected],
        .woocommerce div.product form.cart .variations td.value .reset_variations {
            background: ' . esc_attr(vincent_get_theme_mod('color_main')) . ';
        }

        .single-product button.single_add_to_cart_button,
        .woocommerce-product-gallery__trigger {
            background: ' . esc_attr(vincent_get_theme_mod('color_main')) . ' !important;
        }

        .woocommerce .vincent_woocommerce_content ul.products li.product .add_to_cart_button:hover,
        .woocommerce .vincent_woocommerce_content ul.products li.product .added_to_cart:hover,
        .woocommerce nav.woocommerce-pagination ul li a:hover,
        .woocommerce .widget_shopping_cart .buttons a:hover,
        .woocommerce.widget_shopping_cart .buttons a:hover
        .woocommerce .widget_shopping_cart .buttons a.checkout,
        .woocommerce.widget_shopping_cart .buttons a.checkout,
        .woocommerce .widget_price_filter .price_slider_amount .button:hover,
        .widget_product_tag_cloud a:hover {
            border-color: ' . esc_attr(vincent_get_theme_mod('color_main')) . ';
        }

        .single-product button.single_add_to_cart_button,
        .woocommerce div.product form.cart .variations td.value .reset_variations {
            border-color: ' . esc_attr(vincent_get_theme_mod('color_main')) . ' !important;
        }
        ';

        # Content Color
        $vincent_custom_css .= '
        .vc_column-inner .woocommerce ul.products li.product .vincent_prod_excerpt,
        .vc_column-inner .woocommerce-page ul.products li.product .vincent_prod_excerpt,
        .vc_column-inner .woocommerce ul.products li.product .price,
        .vc_column-inner .woocommerce-page ul.products li.product .price,
        .vincent_shopping_cart .vincent_total_items,
        .vc_column-inner .vincent_vc_custom_products .woocommerce ul.products li.product .vincent_ingredients_field,
        .woocommerce ul.products li.product a,
        .woocommerce-page .vincent_woocommerce_content ul.products li.product a,
        .woocommerce .vincent_woocommerce_content ul.products li.product .price,
        .woocommerce nav.woocommerce-pagination ul li a,
        .single-product .product_meta span.posted_in a,
        .single-product .product_meta span.tagged_as a,
        .woocommerce div.product .woocommerce-tabs ul.tabs li a,
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:hover,
        .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta,
        .woocommerce #review_form #respond .form-submit input,
        .woocommerce .woocommerce-product-rating a,
        .woocommerce #respond input#submit,
        .woocommerce a.button,
        .woocommerce button.button,
        .woocommerce input.button,
        .woocommerce-cart .shop_table .product-name a,
        .woocommerce-cart .cart-collaterals .wc-proceed-to-checkout a:hover,
        .woocommerce-error,
        .woocommerce-info,
        .woocommerce-message,
        .woocommerce form .form-row .required,
        .select2-container .select2-choice,
        .woocommerce #payment #place_order:hover,
        .woocommerce-page #payment #place_order:hover,
        .woocommerce-MyAccount-navigation a,
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: ' . esc_attr(vincent_get_theme_mod('color_content')) . ';
        }

        .woocommerce nav.woocommerce-pagination ul li a,
        .widget_product_tag_cloud a {
            border-color: ' . esc_attr(vincent_get_theme_mod('color_content')) . ';
        }

        .woocommerce-cart .shop_table a.remove {
            color: ' . esc_attr(vincent_get_theme_mod('color_content')) . ' !important;
        }
        ';

        # Alternative Font
        $vincent_custom_css .= '
        .vc_column-inner .woocommerce ul.products li.product .price,
        .vc_column-inner .woocommerce-page ul.products li.product .price,
        .vincent_prod_cat_listing li,
        .vincent_prod_output_container .vincent_prod_list_price .woocommerce-Price-amount,
        .vincent_best_offer_output_container .vincent_prod_list_price .woocommerce-Price-amount,
        .woocommerce .woocommerce-ordering select,
        .woocommerce .woocommerce-result-count,
        .woocommerce-page .woocommerce-result-count,
        .woocommerce ul.products li.product .price,
        .woocommerce .vincent_woocommerce_content ul.products li.product .add_to_cart_button,
        .woocommerce .vincent_woocommerce_content ul.products li.product .added_to_cart,
        .woocommerce nav.woocommerce-pagination ul li,
        .woocommerce .widget_shopping_cart .cart_list li a,
        .woocommerce.widget_shopping_cart .cart_list li a,
        .woocommerce .widget_shopping_cart .buttons a,
        .woocommerce.widget_shopping_cart .buttons a,
        .vincent_sidebar .widget.widget_product_search input[type="search"],
        .woocommerce .widget_price_filter .price_slider_amount .button,
        .widget_product_tag_cloud a,
        .woocommerce.widget_products .product_list_widget li a,
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
        .woocommerce .quantity .qty,
        .single-product button.single_add_to_cart_button,
        .woocommerce div.product .woocommerce-tabs ul.tabs li,
        .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong,
        .woocommerce-cart .shop_table .product-name a,
        .woocommerce-cart .cart-collaterals .wc-proceed-to-checkout a,
        .woocommerce #reviews #reply-title {
            font-family: "' . esc_attr(vincent_get_theme_mod('alternate_font_family')) . '";
        }
        ';

        # Headings Color
        $vincent_custom_css .= '
        .vincent_shopping_cart .vincent_total_price,
        .vincent_prod_output_container h5 a,
        .vincent_best_offer_output_container h5 a,
        body.vincent_shop_links_removed .vc_column-inner .woocommerce ul.products li.product a:hover h2,
        body.vincent_shop_links_removed .vc_column-inner .woocommerce-page ul.products li.product a:hover h2,
        body.vincent_shop_links_removed .vincent_prod_output_container h5 a,
        body.vincent_shop_links_removed .vincent_best_offer_output_container h5 a,
        body.vincent_shop_links_removed.woocommerce .vincent_woocommerce_content ul.products li.product .woocommerce-LoopProduct-link:hover h2,
        body.vincent_shop_links_removed.woocommerce-page .vincent_woocommerce_content ul.products li.product .woocommerce-LoopProduct-link:hover h2 {
            color: ' . esc_attr(vincent_get_theme_mod('color_headings')) . ';
        }
        ';

        # Input Borders
        $vincent_custom_css .= '
        .woocommerce nav.woocommerce-pagination ul li span.current {
            color: ' . esc_attr(vincent_get_theme_mod('borders_color')) . ';
        }

        .woocommerce .vincent_woocommerce_content .woocommerce-ordering select,
        .woocommerce nav.woocommerce-pagination ul li span.current,
        .woocommerce .widget_shopping_cart .buttons a,
        .woocommerce.widget_shopping_cart .buttons a,
        .vincent_sidebar .widget.widget_product_search input[type="search"],
        .widget_product_tag_cloud a,
        .woocommerce .quantity .qty,
        .woocommerce div.product .woocommerce-tabs ul.tabs::before,
        .woocommerce div.product .woocommerce-tabs ul.tabs li,
        .woocommerce #reviews #comments ol.commentlist li .comment-text .description,
        .woocommerce-cart table.cart td.actions .coupon .input-text,
        .select2-container .select2-choice,
        .woocommerce-checkout table.shop_table,
        .woocommerce-checkout table.shop_table th,
        .woocommerce-checkout table.shop_table td,
        .woocommerce form.checkout_coupon,
        .woocommerce form.login,
        .woocommerce form.register,
        fieldset,
        .select2-container--default .select2-selection--single .select2-selection__rendered,
        .select2-dropdown,
        .select2-container--default .select2-search--dropdown .select2-search__field {
            border-color: ' . esc_attr(vincent_get_theme_mod('borders_color')) . ';
        }

        .woocommerce .vincent_woocommerce_content .products ul:after,
        .woocommerce .vincent_woocommerce_content ul.products:after,
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
        .woocommerce-cart .shop_table thead th,
        #add_payment_method #payment,
        .woocommerce-cart #payment,
        .woocommerce-checkout #payment,
        .woocommerce-error,
        .woocommerce-info,
        .woocommerce-message {
            background: ' . esc_attr(vincent_get_theme_mod('borders_color')) . ';
        }

        .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
        .woocommerce #reviews #comments ol.commentlist,
        .woocommerce-cart .shop_table tbody .cart_item {
            border-bottom-color: ' . esc_attr(vincent_get_theme_mod('borders_color')) . ';
        }

        .woocommerce #reviews #comments ol.commentlist li .comment-text .description:before {
            border-top-color: ' . esc_attr(vincent_get_theme_mod('borders_color')) . ';
        }
        ';

        #Listing BG Color
        $vincent_custom_css .= '
        .woocommerce .vincent_woocommerce_content ul.products li.product .vincent_product_wrapper,
        .woocommerce-page .vincent_woocommerce_content ul.products li.product .vincent_product_wrapper {
            background: ' . esc_attr(vincent_get_theme_mod('shop_listing_bg_color')) . ';
        }
        ';

        # Title Text Color
        $vincent_custom_css .= '
        .woocommerce .widget_shopping_cart .buttons a.checkout,
        .woocommerce.widget_shopping_cart .buttons a.checkout {
            color: ' . esc_attr(vincent_get_theme_mod('title_text_color')) . ';
        }

        .single-product button.single_add_to_cart_button,
        .woocommerce div.product form.cart .variations td.value .reset_variations {
            color: ' . esc_attr(vincent_get_theme_mod('title_text_color')) . ' !important;
        }
        ';

        # Body Color
        $vincent_custom_css .= '
        .woocommerce #reviews #comments ol.commentlist li .comment-text .description:after {
            border-top-color: ' . esc_attr(vincent_get_theme_mod('color_body')) . ';
        }

        .woocommerce #review_form #respond .form-submit input:hover,
        .woocommerce #respond input#submit:hover,
        .woocommerce a.button:hover,
        .woocommerce button.button:hover,
        .woocommerce input.button:hover,
        .woocommerce-cart table.cart td.actions .button:hover,
        .woocommerce-cart .cart-collaterals .wc-proceed-to-checkout a,
        .woocommerce #payment #place_order,
        .woocommerce-page #payment #place_order,
        .select2-container--default .select2-results__option[aria-selected="true"],
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            color: ' . esc_attr(vincent_get_theme_mod('color_body')) . ';
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered,
        .select2-dropdown,
        .select2-container--default .select2-search--dropdown .select2-search__field {
            background: ' . esc_attr(vincent_get_theme_mod('color_body')) . ';
        }
        ';

        # Form Buttons Color
        $vincent_custom_css .= '
        .woocommerce #review_form #respond .form-submit input,
        .woocommerce #respond input#submit,
        .woocommerce a.button,
        .woocommerce button.button,
        .woocommerce input.button,
        .woocommerce-cart .cart-collaterals .wc-proceed-to-checkout a:hover,
        .woocommerce #payment #place_order:hover,
        .woocommerce-page #payment #place_order:hover {
            background: ' . esc_attr(vincent_get_theme_mod('form_buttons_color')) . ';
        }
        ';
    }