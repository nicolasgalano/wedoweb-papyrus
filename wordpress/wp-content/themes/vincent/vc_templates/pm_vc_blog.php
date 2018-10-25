<?php
extract(
    shortcode_atts(
        array(
            'posts_per_page' => 5,
            'blog_view_type' => 'standard',
            'custom_css' => '',
            'custom_class' => '',
            'columns' => '3',
            'title_status' => 'show',
            'meta_status' => 'show',
            'fimage_status' => 'show',
            'excerpt_status' => 'show',
            'more_button_status' => 'show',
            'pagination_status' => 'show',
            'blog_text_color' => '#dce4e8',
            'blog_title_color' => '#ffffff',
            'button_text_color' => '#ffffff',
            'button_hover_color' => '#121618',
            'button_bg_color' => 'transparent',
            'button_bg_hover' => '#ffffff',
            'button_border_color' => '#ffffff',
            'button_border_hover' => '#ffffff'
        ),
        $atts
    )
);

if ($button_text_color == '') {
    $button_text_color = 'transparent';
}

if ($button_hover_color == '') {
    $button_hover_color = 'transparent';
}

if ($button_bg_color == '') {
    $button_bg_color = 'transparent';
}

if ($button_bg_hover == '') {
    $button_bg_hover = 'transparent';
}

if ($button_border_color == '') {
    $button_border_color = 'transparent';
}

if ($button_border_hover == '') {
    $button_border_hover = 'transparent';
}

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);

$html = '<div class="vincent_element_wrap vincent_element_blog blog_type_' . $blog_view_type . '  ' . esc_attr($custom_class) . esc_attr($css_class) . ' ' . (($blog_view_type == 'grid' || $blog_view_type == 'simple') ? 'columns_' . $columns . '' : 'colunms_1') . '">
<div class="vincent_blog_wrapper ' . (($blog_view_type == 'grid') ? 'vincent_isotope' : '') . '">';

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => absint($posts_per_page),
    'paged' => $paged,
);

query_posts($args);

if (have_posts()) {
    while (have_posts()) {
        the_post();

        $comments_number = get_comments_number();

        if ($comments_number == 1) {
            $comments_text = esc_html__('Comment', 'vincent');
        } else {
            $comments_text = esc_html__('Comments', 'vincent');
        }

        $vincent_post_format = get_post_format();
        if (empty($vincent_post_format)) {
            $vincent_post_format = 'standard';
        }

        /* Standard View Type */
        if ($blog_view_type == 'standard') {
            $html .= '
            <div class="stand_post vincent_post_format_' . esc_attr($vincent_post_format) . '" id="post-' . esc_attr(get_the_ID()) . '">
                ';

                if ($title_status == 'show') {
                    $html .= '
                        <div class="vincent_title">
                            <h3 class="innertitle entry-title">
                                <a class="notextdecor" href="' . esc_url(get_permalink()) . '">
                                    ' . esc_html(get_the_title()) . '
                                </a>
                            </h3>
                        </div>
                    ';
                }

                if ($meta_status == 'show') {
                    $html .= '
                        <div class="vincent_meta">
                            ';
                            $categories = get_the_category();
                            $separator = ', ';

                            if (!empty($categories)) {
                                $html .= '
                                    <div>
                                        ' . esc_html__('in', 'vincent') . '
                                        ';
                                        foreach ($categories as $category) {
                                            $html .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" title="' . esc_attr(sprintf(__('View all posts in %s', 'vincent'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                                        }
                                        $html = trim($html, $separator);
                                        $html .= '
                                    </div>
                                ';
                            }

                            $html .= '
                            <div>
                                ' . esc_html(get_the_date()) . '
                            </div>

                            <div>
                                ' . esc_html__('by', 'vincent') . '
                                ' . get_the_author_posts_link() . '
                            </div>
                        </div>
                    ';
                }

                if ($fimage_status == 'show') {
                    if ($vincent_post_format == 'link' || $vincent_post_format == 'aside' || $vincent_post_format == 'status' || $vincent_post_format == 'quote') {
                        $html .= vincent_get_post_formats_for_listings();
                    } else {
                        $html .= vincent_get_post_formats();
                    }
                }

                if ($excerpt_status == 'show') {
                    if ($vincent_post_format == 'image' || $vincent_post_format == 'video' || $vincent_post_format == 'chat' || $vincent_post_format == 'standard') {
                        $html .= '
                            <div class="vincent_excerpt">
                                ' . vincent_excerpt_truncate(get_the_excerpt(), 350, '...') . '
                            </div>
                        ';
                    }
                }

                if ($more_button_status == 'show') {
                    if ($vincent_post_format == 'image' || $vincent_post_format == 'video' || $vincent_post_format == 'standard') {
                        $html .= '
                            <div class="read_more_cont">
                                <a class="vincent_button" href="' . get_permalink() . '">
                                    ' . esc_html__('Read More', 'vincent') . '
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        ';
                    }
                }

                $html .= '
            </div>
            ';
        }

        /* Simple View Type */
        else if ($blog_view_type == 'simple') {
            $html .= '
                <div class="simple_post_item">
                    <div class="vincent_post_wrapper vincent_js_color" data-color="' . esc_attr($blog_text_color) . '">';

                        if ($meta_status == 'show') {
                            $html .= '
                                <div class="vincent_post_date">
                                    ' . esc_html(get_the_date()) . '
                                </div>
                            ';
                        }

                        if ($title_status == 'show') {
                            $html .= '
                                <h5 class="vincent_post_title vincent_js_color" data-color="' . esc_attr($blog_title_color) . '">
                                    ' . esc_html(get_the_title()) . '
                                </h5>
                            ';
                        }

                        if ($excerpt_status == 'show') {
                            $html .= '
                                <div class="vincent_post_excerpt">
                                    ' . vincent_excerpt_truncate(get_the_excerpt(), 100, '...') . '
                                </div>
                            ';
                        }

                        $html .= '
                        <a class="vincent_simple_post_read_more_button"
                           href="' . get_permalink() . '"
                           data-color="' . esc_attr($button_text_color) . '"
                           data-hover="' . esc_attr($button_hover_color) . '"
                           data-bg-color="' . esc_attr($button_bg_color) . '"
                           data-bg-hover="' . esc_attr($button_bg_hover) . '"
                           data-border-color="' . esc_attr($button_border_color) . '"
                           data-border-hover="' . esc_attr($button_border_hover) . '"
                           >
                            ' . esc_html__('Read More', 'vincent') . '
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            ';
        }

        /* Grid View Type */
        else {
            wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), false, true);
            wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('isotope'), false, true);

            $html .= '
                <div class="grid_post vincent_post_format_' . esc_attr($vincent_post_format) . '" id="post-' . get_the_ID() . '">
                    <div class="vincent_post_wrapper">
                        <div class="vincent_title">
                            <h4>
                                <a href="' . esc_url(get_permalink()) . '">
                                    ' . esc_html(get_the_title()) . '
                                </a>
                            </h4>
                        </div>
                        ';

                        if ($meta_status == 'show') {
                            $categories = get_the_category();
                            $separator = ', ';

                            $html .= '
                                <div class="vincent_meta">
                                    ';

                                    if (!empty($categories)) {
                                        $html .= '
                                            <div>
                                                ' . esc_html__('in', 'vincent') . '';

                                                foreach ($categories as $category) {
                                                    $html .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" title="' . esc_attr(sprintf(__('View all posts in %s', 'vincent'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                                                }
                                                $html = trim($html, $separator);

                                                $html .= '
                                            </div>
                                        ';
                                    }

                                    $html .= '
                                    <div>
                                        ' . get_the_date() . '
                                    </div>

                                    <div>
                                        ' . esc_html__('by', 'vincent') . '
                                        ' . get_the_author_posts_link() . '
                                    </div>

                                    <div>
                                        <a href="' . esc_url(get_comments_link()) . '">
                                            ' . $comments_number . ' ' . $comments_text . '
                                        </a>
                                    </div>
                                </div><!-- vincent_meta -->
                            ';
                        }

                        if ($fimage_status == 'show') {
                            $html .= '
                                ' . vincent_get_post_formats_for_listings() . '
                            ';
                        }

                        if ($excerpt_status == 'show') {
                            if ($vincent_post_format == 'standard' || $vincent_post_format == 'image' || $vincent_post_format == 'video') {
                                $html .= '
                                    <div class="vincent_excerpt">
                                        ' . vincent_excerpt_truncate(get_the_excerpt(), 130, '...') . '
                                    </div>
                                ';
                            }
                        }

                        $html .= '
                    </div><!-- vincent_post_wrapper -->
                </div><!-- grid_post -->
            ';

            vincentHelper::getInstance()->addJSToFooter('isotop_initialize', '
                var $grid = jQuery(".vincent_isotope").isotope();

                $grid.imagesLoaded().progress( function() {
                    $grid.isotope("layout");
                });
            ', 'window-load');
        }

    }

    $html .= '</div>';

    if ($blog_view_type !== 'simple') {
        if ($pagination_status == 'show') {
            $html .= get_the_posts_pagination(array(
                'prev_text' => __('<i class="fa fa-angle-double-left" aria-hidden="true"></i>', 'vincent'),
                'next_text' => __('<i class="fa fa-angle-double-right" aria-hidden="true"></i>', 'vincent'),
            ));
        }
    }

    wp_reset_query();

}

$html .= '
</div>';

echo $html;
?>