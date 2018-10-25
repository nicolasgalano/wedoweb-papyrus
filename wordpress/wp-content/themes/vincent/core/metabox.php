<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (!class_exists('RWMB_Loader')) {
    return;
}

add_filter('rwmb_meta_boxes', 'vincent_meta_boxes');
function vincent_meta_boxes($meta_boxes)
{
    # Image Post Format
    $meta_boxes[] = array(
        'title' => esc_attr__('Image Post Format Settings', 'vincent'),
        'post_types' => 'post',
        'fields' => array(
            array(
                'id' => 'vincent_pf_images',
                'name' => esc_attr__('Select Images', 'vincent'),
                'type' => 'image_advanced',
            ),
            array(
                'id' => 'vincent_pf_images_crop_status',
                'name' => esc_attr__('Crop Images', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'yes' => esc_attr__('Yes', 'vincent'),
                    'no' => esc_attr__('No', 'vincent'),
                ),
            ),
            array(
                'id' => 'vincent_pf_images_width',
                'name' => esc_attr__('Image Width', 'vincent'),
                'type' => 'text',
                'desc' => esc_attr__('In pixels.', 'vincent'),
                'std' => '1600',
                'attributes' => array(
                    'data-dependency-id' => 'vincent_pf_images_crop_status',
                    'data-dependency-val' => 'yes'
                ),
            ),
            array(
                'id' => 'vincent_pf_images_height',
                'name' => esc_attr__('Image Height', 'vincent'),
                'type' => 'text',
                'desc' => esc_attr__('In pixels.', 'vincent'),
                'std' => '900',
                'attributes' => array(
                    'data-dependency-id' => 'vincent_pf_images_crop_status',
                    'data-dependency-val' => 'yes'
                ),
            ),
        ),
    );

    # Video Post Format
    $meta_boxes[] = array(
        'title' => esc_attr__('Video Post Format Settings', 'vincent'),
        'post_types' => 'post',
        'fields' => array(
            array(
                'id' => 'vincent_pf_video_url',
                'name' => esc_attr__('Video URL', 'vincent'),
                'type' => 'oembed',
                'desc' => esc_attr__('Copy link to the video from YouTube or other video-sharing website.', 'vincent'),
            ),
            array(
                'id' => 'vincent_pf_video_height',
                'name' => esc_attr__('Video Height', 'vincent'),
                'type' => 'text',
                'desc' => esc_attr__('In pixels.', 'vincent'),
                'std' => '500',
            ),
        ),
    );

    # Audio Post Format
    $meta_boxes[] = array(
        'title' => esc_html__('Audio Past Format Settings', 'vincent'),
        'post_types' => 'post',
        'fields' => array(
            array(
                'id' => 'vincent_pf_audio_url',
                'name' => esc_attr__('Audio URL', 'vincent'),
                'type' => 'oembed',
                'desc' => esc_attr__('Copy link to the audio from SoundCloud or other audio-sharing website.', 'vincent'),
            ),
        )
    );

    # Quote Post Format
    $meta_boxes[] = array(
        'title' => esc_html__('Quote Post Format Settings', 'vincent'),
        'post_types' => 'post',
        'fields' => array(
            array(
                'id' => 'vincent_pf_quote_text',
                'name' => esc_html__('Quote Text', 'vincent'),
                'type' => 'textarea'
            ),
            array(
                'id' => 'vincent_pf_quote_author',
                'name' => esc_html__('Quote Author', 'vincent'),
                'type' => 'text'
            ),
            array(
                'id' => 'vincent_pf_quote_author_position',
                'name' => esc_html__('Quote Author Position', 'vincent'),
                'type' => 'text'
            )
        )
    );

    # Link Post Format
    $meta_boxes[] = array(
        'title' => esc_html__('Link Post Format Settings', 'vincent'),
        'post_types' => 'post',
        'fields' => array(
            array(
                'id' => 'vincent_pf_link_url',
                'name' => esc_html__('Link URL', 'vincent'),
                'type' => 'text'
            ),
            array(
                'id' => 'vincent_pf_link_text',
                'name' => esc_html__('Link Text', 'vincent'),
                'type' => 'text'
            )
        )
    );

    # Featured Posts Settings
    $meta_boxes[] = array(
        'title' => esc_attr__('Featured Posts Settings', 'vincent'),
        'post_types' => 'post',
        'fields' => array(
            array(
                'id' => 'featured_posts_status',
                'name' => esc_attr__('Featured Posts', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'enabled' => esc_attr__('Enabled', 'vincent'),
                    'disabled' => esc_attr__('Disabled', 'vincent'),
                ),
            ),
            array(
                'id' => 'featured_posts_orderby',
                'name' => esc_attr__('Order By', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'rand' => esc_attr__('Random', 'vincent'),
                    'date' => esc_attr__('Date', 'vincent'),
                ),
                'attributes' => array(
                    'data-dependency-id' => 'featured_posts_status',
                    'data-dependency-val' => 'enabled'
                ),
            ),
            array(
                'id' => 'featured_posts_numberposts',
                'name' => esc_attr__('Number of Posts', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ),
                'attributes' => array(
                    'data-dependency-id' => 'featured_posts_status',
                    'data-dependency-val' => 'enabled'
                ),
            ),
            array(
                'id' => 'featured_posts_fimage_status',
                'name' => esc_attr__('Featured Image', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'show' => 'Show',
                    'hide' => 'Hide',
                ),
                'attributes' => array(
                    'data-dependency-id' => 'featured_posts_status',
                    'data-dependency-val' => 'enabled'
                ),
            ),
            array(
                'id' => 'featured_posts_meta_status',
                'name' => esc_attr__('Meta', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'show' => 'Show',
                    'hide' => 'Hide',
                ),
                'attributes' => array(
                    'data-dependency-id' => 'featured_posts_status',
                    'data-dependency-val' => 'enabled'
                ),
            ),
            array(
                'id' => 'featured_posts_excerpt_status',
                'name' => esc_attr__('Excerpt', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'show' => 'Show',
                    'hide' => 'Hide',
                ),
                'attributes' => array(
                    'data-dependency-id' => 'featured_posts_status',
                    'data-dependency-val' => 'enabled'
                ),
            ),
        ),
    );

    # Post Settings
    $meta_boxes[] = array(
        'title' => esc_attr__('Post Settings', 'vincent'),
        'post_types' => 'post',
        'fields' => array(
            array(
                'id' => 'post_tags_status',
                'name' => esc_attr__('Post Tags', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'show' => esc_attr__('Show', 'vincent'),
                    'hide' => esc_attr__('Hide', 'vincent'),
                ),
            ),
            array(
                'id' => 'share_buttons_status',
                'name' => esc_attr__('Share Buttons', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'show' => esc_attr__('Show', 'vincent'),
                    'hide' => esc_attr__('Hide', 'vincent'),
                ),
            ),
            array(
                'id' => 'about_author_status',
                'name' => esc_attr__('About Author', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'show' => esc_attr__('Show', 'vincent'),
                    'hide' => esc_attr__('Hide', 'vincent'),
                ),
            ),
            array(
                'id' => 'post_navigation_status',
                'name' => esc_attr__('Posts Navigation', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'show' => esc_attr__('Show', 'vincent'),
                    'hide' => esc_attr__('Hide', 'vincent'),
                ),
            ),
        )
    );

    # Page & Post Settings
    $meta_boxes[] = array(
        'title' => esc_attr__('Page Settings', 'vincent'),
        'post_types' => array('post', 'page', 'product'),
        'fields' => array(
            array(
                'id' => 'header_transparent',
                'name' => esc_attr__('Transparent Header', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'enabled' => esc_attr__('Enabled', 'vincent'),
                    'disabled' => esc_attr__('Disabled', 'vincent'),
                ),
/*
                'attributes' => array(
                    'data-hide-on-template-file' => 'page-coming-soon.php',
                ),
*/
            ),
            array(
                'id' => 'single_page_title',
                'name' => esc_attr__('Page Title', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'show' => esc_attr__('Show', 'vincent'),
                    'hide' => esc_attr__('Hide', 'vincent'),
                ),
            ),
            array(
                'id' => 'sidebar_position',
                'name' => esc_html__('Sidebar Position', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'vincent_left_sidebar' => esc_attr__('Left', 'vincent'),
                    'vincent_right_sidebar' => esc_attr__('Right', 'vincent'),
                    'vincent_no_sidebar' => esc_attr__('None', 'vincent')
                )
            ),
            array(
                'id' => 'footer_status',
                'name' => esc_html__('Footer', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'show' => esc_attr('Show', 'vincent'),
                    'hide' => esc_attr__('Hide', 'vincent')
                )
            )
        ),
    );

    # Products Settings
    $meta_boxes[] = array(
        'title' => esc_attr__('Page Settings', 'vincent'),
        'post_types' => 'product',
        'fields' => array(
            array(
                'id' => 'header_transparent',
                'name' => esc_attr__('Transparent Header', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'enabled' => esc_attr__('Enabled', 'vincent'),
                    'disabled' => esc_attr__('Disabled', 'vincent'),
                ),
                /*
                    'attributes' => array(
                        'data-hide-on-template-file' => 'page-coming-soon.php',
                    ),
                */
            ),
            array(
                'id' => 'single_page_title',
                'name' => esc_attr__('Page Title', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'show' => esc_attr__('Show', 'vincent'),
                    'hide' => esc_attr__('Hide', 'vincent'),
                ),
            ),
            array(
                'id' => 'shop_sidebar_position',
                'name' => esc_html__('Sidebar Position', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'vincent_left_sidebar' => esc_attr__('Left', 'vincent'),
                    'vincent_right_sidebar' => esc_attr__('Right', 'vincent'),
                    'vincent_no_sidebar' => esc_attr__('None', 'vincent')
                )
            ),
            array(
                'id' => 'footer_status',
                'name' => esc_html__('Footer', 'vincent'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_attr__('Default', 'vincent'),
                    'show' => esc_attr('Show', 'vincent'),
                    'hide' => esc_attr__('Hide', 'vincent')
                )
            )
        ),
    );

    return $meta_boxes;
}