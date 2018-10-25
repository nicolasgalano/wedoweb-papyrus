<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

# General
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support('post-formats', array('image', 'video', 'audio', 'quote', 'link', 'aside', 'status', 'chat'));

if (!isset($content_width)) {
    $content_width = 1130;
}

# Custom get_theme_mod
function vincent_get_theme_mod($name) {
	if (func_num_args() > 1) {
		die ('The vincent_get_theme_mod("'.$name.'") function takes only one argument. Define default values in core/customizer.php.');
	}
	
	global $vincent_customizer_default_values;
	
	if (!isset($vincent_customizer_default_values[$name])) {
		die ('Error! You did not add the default value for the "'.$name.'" option! core/customizer.php.');
	}
	return get_theme_mod($name, $vincent_customizer_default_values[$name]);
}

# ADD Localization Folder
add_action('after_setup_theme', 'vincent_pomo');
function vincent_pomo()
{
    load_theme_textdomain('vincent', get_template_directory() . '/languages');
}

require_once(get_template_directory() . "/core/init.php");

# Admin Ajax
add_action('admin_head', 'vincent_admin_ajax_url');
function vincent_admin_ajax_url() {
    echo "
    <script>
        var vincent_admin_ajax_url = '" . admin_url("admin-ajax.php") . "';
    </script>
    ";
}

# ADD Theme Settings Page
add_action('admin_menu', 'vincent_add_menu');
function vincent_add_menu()
{
    add_theme_page('Vincent', 'Vincent', 'administrator', 'vincent_settings_page', 'vincent_theme_settings_page' );
}

# Show Admin Settings Page
function vincent_theme_settings_page()
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have permissions to access this page.', 'vincent'));
    }
	echo '
    <div class="vincent_admin_wrapper">
    	<h1>'.esc_attr__('Hey!', 'vincent').'</h1>
	    <p>'.esc_attr__('All settings of our theme are made through a standard Customizer. Click', 'vincent').' <a href="'.get_admin_url(null, 'customize.php').'">'.esc_attr__('here', 'vincent').'</a> '.esc_attr__('to go to the settings', 'vincent').'.</p>
	
		<p>'.esc_attr__('If you want to reset all settings, feel free to click on', 'vincent').' <a href="#" class="vincent_reset_all_settings">'.esc_attr__('this link', 'vincent').'</a>. '.esc_attr__('But remember that there is no turning back ;)', 'vincent').'</p>
	
		<p>'.esc_attr__('If you have any questions, problems or want to talk - email us via the form on', 'vincent').' <a href="http://themeforest.net/user/pixel-mafia" target="_blank">'.esc_attr__('this', 'vincent').'</a> '.esc_attr__('page', 'vincent').'.</p>
    </div>
    ';
}

# Register CSS/JS
add_action('wp_enqueue_scripts', 'vincent_css_js');
if (!function_exists('vincent_css_js')) {
    function vincent_css_js()
    {
        # CSS
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
        wp_enqueue_style('vincent-theme', get_template_directory_uri() . '/css/theme.css');
        # JS
        wp_enqueue_script('vincent-theme', get_template_directory_uri() . '/js/theme.js', array('jquery'), false, true);
        
      	global $vincent_custom_css;
      	wp_add_inline_style('vincent-theme', $vincent_custom_css);
    }
}

# Register CSS/JS for Admin Settings
add_action('admin_enqueue_scripts', 'vincent_admin_css_js');
if (!function_exists('vincent_admin_css_js')) {
    function vincent_admin_css_js()
    {
        # CSS
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
        wp_enqueue_style('vincent-admin', get_template_directory_uri() . '/css/admin.css');
        # JS
        wp_enqueue_script('vincent-admin', get_template_directory_uri() . '/js/admin.js', array('jquery', 'jquery-ui-core', 'jquery-ui-sortable'), false, true);
    }
}

# Register CSS/JS for WooCommerce
if (class_exists('WooCommerce')) {
    add_action('wp_print_styles', 'vincent_woocommerce_files');
    if (!function_exists('vincent_woocommerce_files')) {
        function vincent_woocommerce_files()
        {
            # CSS
            wp_enqueue_style('pm-woocommerce', get_template_directory_uri() . '/css/pm-woocommerce.css');

            # JS
            wp_enqueue_script('pm-woocommerce', get_template_directory_uri() . '/js/pm-woocommerce.js', array('jquery'), false, true);
        }
    }
}

# WP Footer
add_action('wp_footer', 'vincent_wp_footer');
function vincent_wp_footer()
{
    vincentHelper::getInstance()->echoFooter();
}

# Register Menu
add_action('init', 'vincent_register_menu');
function vincent_register_menu()
{
    register_nav_menus(
        array(
            'main' => esc_attr__('Main menu', 'vincent'),
            'footer' => esc_attr__('Footer', 'vincent'),
        )
    );
}

# Logo
function vincent_the_logo($position = 'header')
{
    if ($position == 'header') {
        $prefix = '';
    }
    if ($position == 'footer') {
        $prefix = 'footer_';
    }
    if (vincent_get_theme_mod($prefix . 'logo_type') == 'image_logo') {
        echo '<a href="' . esc_url(home_url('/')) . '" class="vincent_image_logo ' . (vincent_get_theme_mod($prefix . 'logo_retina') == true ? 'vincent_retina' : '') . '"></a>';
    } else {
        echo '<div class="vincent_text_logo"><a href="' . esc_url(home_url('/')) . '">' . vincent_get_theme_mod($prefix . 'logo_text_caption') . '</a></div>';
    }
}

if (!function_exists('vincent_the_header')) {
    function vincent_the_header() {
        echo '
            <div class="container-fluid">
                <div class="row">
                    ';

                    if (vincent_get_theme_mod('header_type') == 'type_1') {
                        echo '
                            <div class="col-md-3 vincent_hleft vincent_header_sidebar">
                                <div class="vincent_inner">
                                    ';
                                    get_sidebar('header-left');
                                    echo '
                                </div>
                            </div>

                            <div class="col-md-6 vincent_hcenter vincent_menu_and_logo">
                                <div class="vincent_logo_cont">
                                    ';
                                    vincent_the_logo();
                                    echo '
                                </div>
                                <div class="row vincent_menu_cont">
                                    <div class="vincent_menu_inner">
                                        ';
                                        vincent_get_main_menu();
                                        echo '
                                    </div>
                                </div>
                                <div class="vincent_menu_mobile_trigger">
                                    <div class="vincent_trigger_container">
                                        <div class="vincent_trigger_inner"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 vincent_hright vincent_header_sidebar">
                                <div class="vincent_inner">
                                    ';
                                    get_sidebar('header-right');
                                    echo '
                                </div>
                            </div>
                        ';
                    }

                    if (vincent_get_theme_mod('header_type') == 'type_2' || vincent_get_theme_mod('header_type') == 'type_3') {
                        echo '
                            <div class="col-md-6 vincent_hleft vincent_header_sidebar">
                                ';
                                get_sidebar('header-left');
                                echo '
                            </div>

                            <div class="col-md-6 vincent_hright vincent_header_sidebar">
                                ';
                                get_sidebar('header-right');
                                echo '
                            </div>

                            <div class="col-md-12">
                                <div class="vincent_logo_cont">
                                    ';
                                    vincent_the_logo();
                                    echo '
                                </div>

                                <div class="vincent_menu_cont">
                                    <div class="vincent_menu_inner">
                                        ';
                                        vincent_get_main_menu();
                                        echo '
                                    </div>
                                </div>
                                <div class="vincent_menu_mobile_trigger">
                                    <div class="vincent_trigger_container">
                                        <div class="vincent_trigger_inner"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        ';
                    }

                    echo '
                </div>

                <div class="vincent_menu_mobile">
                    ';
                    vincent_get_main_menu();
                    echo '
                </div>
            </div>
        ';
    }
}

if (!function_exists('vincent_get_main_menu')) {
    function vincent_get_main_menu(){
        $vincent_menu_locations = get_nav_menu_locations();
        if (isset($vincent_menu_locations['main']) && $vincent_menu_locations['main'] !== 0) {
            echo wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'vincent_menu', 'depth' => '3'));
        } else {
            echo '<div class="vincent_menu_notify">' . esc_html__('Please create and select menu in Appearance (Menus)', 'vincent') . ' <a href="'.get_admin_url(null, 'nav-menus.php').'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>';
        }
    }
}

# Hex 2 RGB
function vincent_hex2rgb($hex)
{
    $hex = str_replace("#", "", $hex);

    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    return $r . "," . $g . "," . $b;
}

# Register Sidebars
add_action('widgets_init', 'vincent_widgets_init');
function vincent_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_attr__('Sidebar', 'vincent'),
            'id' => 'sidebar',
            'description' => esc_attr__('Widgets in this area will be shown on all posts and pages.', 'vincent'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h6 class="widgettitle">',
            'after_title' => '</h6>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_attr__('Header (Left)', 'vincent'),
            'id' => 'header-left',
            'description' => esc_attr__('Widgets in this area will be shown in the left part of Header.', 'vincent'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h6 class="widgettitle">',
            'after_title' => '</h6>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_attr__('Header (Right)', 'vincent'),
            'id' => 'header-right',
            'description' => esc_attr__('Widgets in this area will be shown in the right part of Header.', 'vincent'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h6 class="widgettitle">',
            'after_title' => '</h6>',
        )
    );

    if (class_exists('WooCommerce')) {
        register_sidebar(
            array(
                'name' => esc_html__('WooCommerce', 'vincent'),
                'id' => 'woocommerce_sidebar',
                'description' => esc_html__('WooCommerce Sidebar. Enabled only when WooCommerce Plugin activate.', 'vincent'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h6 class="widgettitle">',
                'after_title' => '</h6>',
            )
        );
    }
}

# Post Formats
function vincent_get_post_formats($args = array())
{
    if (vincent_post_options()) {
        if (!empty($args)) {
            extract($args);
            #if (isset($output_template) && $output_template == '') {}
        }

        $vincent_post_format = get_post_format();
        if (empty($vincent_post_format)) {
            $vincent_post_format = 'standard';
        }

        $html = '';
        $html .= '<div class="vincent_post_formats vincent_pf_' . $vincent_post_format . '">';

        if ($vincent_post_format == 'image') {
            if (is_array(vincent_get_post_option('vincent_pf_images'))) {
                # CSS
                wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
                # JS
                wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), false, true);

                $html .= '<div class="vincent_owlCarousel owl-carousel owl-theme">';
                foreach (vincent_get_post_option('vincent_pf_images') as $key => $image) {
                    if (vincent_get_post_option('vincent_pf_images_crop_status', 'yes') == 'yes') {
                        $html .= '<div class="item"><img src="' . aq_resize($image['full_url'], vincent_get_post_option('vincent_pf_images_width', '1600'), vincent_get_post_option('vincent_pf_images_height', '900'), true, true, true) . '" alt="' . $image['alt'] . '"></div>';

                    } else {
                        $html .= '<div><img src="' . $image['full_url'] . '" alt="' . $image['alt'] . '"></div>';
                    }
                }
                $html .= '</div>';

                vincentHelper::getInstance()->addJSToFooter('owl_post_formats', '
                    jQuery(".vincent_owlCarousel").on("initialized.owl.carousel", function(e) {
                        jQuery(".vincent_owlCarousel").css("opacity", "1");
                    });
                    jQuery(".vincent_owlCarousel").owlCarousel(
                        {
                            items:1,
                            lazyLoad:true,
                            loop:true,
                            dots:false,
                            nav:true,
                            navText:["", ""],
                            autoplay:true,
                            autoplayTimeout:5000,
                            autoplayHoverPause:true,
                            autoHeight:true
                        }
                    );

                    setTimeout("jQuery(\'.vincent_owlCarousel\').owlCarousel({items:1, lazyLoad:true, loop:true, dots:false, nav:true, navText:[\'\', \'\'], autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true, autoHeight:true});", 1000);
                ', 'window-load');
            } else {
                $html .= '<img class="vincent_stand_fi" src="' . aq_resize(vincent_get_featured_image_url(), 300, 300) . '" alt="">';
            }
        }

        if ($vincent_post_format == 'video') {
            $html .= '<div class="vincent_pf_video_cont" style="height:' . vincent_get_post_option('vincent_pf_video_height', '500') . 'px;">' . vincent_get_post_option('vincent_pf_video_url') . '</div>';
        }

        if ($vincent_post_format == 'audio') {
            $html .= '<div class="vincent_pf_audio_cont">' . vincent_get_post_option('vincent_pf_audio_url') . '</div>';
        }

        if ($vincent_post_format == 'quote') {
            if (strlen(vincent_get_post_option('vincent_pf_quote_text')) > 0) {
                $blockquote_author_position = vincent_get_post_option('vincent_pf_quote_author_position');

                if (strlen(vincent_get_post_option('vincent_pf_quote_author')) > 0) {
                    $blockquote_author_position = (strlen($blockquote_author_position) > 0 ? ', ' . $blockquote_author_position : '');
                }

                $html .= '
                    <div class="vincent_pf_quote_cont">
                        <div class="vincent_blockquote">
                            ' . vincent_get_post_option('vincent_pf_quote_text') . '
                        </div>
                        <div class="vincent_blockquote_author">
                            ' . vincent_get_post_option('vincent_pf_quote_author') . '<span>' . $blockquote_author_position . '</span>
                        </div>
                    </div>
                ';
            }
        }

        if ($vincent_post_format == 'link') {
            if (strlen(vincent_get_post_option('vincent_pf_link_url')) > 0) {
                $html .= '
                    <div class="vincent_pf_link_cont">
                        <div class="vincent_link">
                            ';
                            if (strlen(vincent_get_post_option('vincent_pf_link_text')) > 0) {
                                $html .= '
                                    <a href="' . esc_url(vincent_get_post_option('vincent_pf_link_url')) . '">
                                        <i class="fa fa-link"></i>
                                        ' . esc_html(vincent_get_post_option('vincent_pf_link_text')) . '
                                    </a>
                                ';
                            } else {
                                $html .= '
                                    <a href="' . esc_url(vincent_get_post_option('vincent_pf_link_url')) . '">
                                        <i class="fa fa-link"></i>
                                        ' . esc_html(vincent_get_post_option('vincent_pf_link_url')) . '
                                    </a>
                                ';
                            }
                            $html .= '
                        </div>
                    </div>
                ';
            }
        }

        if ($vincent_post_format == 'standard') {
            $vincent_attachment_ID =get_post_thumbnail_id(get_the_ID());

            if (isset($vincent_attachment_ID) && $vincent_attachment_ID !== '') {
                $vincent_attachment_array = wp_get_attachment_metadata($vincent_attachment_ID);

                $vincent_attachment_width = $vincent_attachment_array['width'];
                $vincent_attachment_height = $vincent_attachment_array['height'];
                $vincent_image_width = 1170;
                $vincent_image_height = 660;

                $html .= '
                    <div class="vincent_pf_standard_cont">
                        ';

                        if ($vincent_attachment_width > 1170) {
                            if (($vincent_attachment_width / $vincent_attachment_height) > 1) {
                                $html .= '
                                    <img src="' . aq_resize(esc_url(vincent_get_featured_image_url()), $vincent_image_width, $vincent_image_height, true, true, true) . '" alt="" />
                                ';
                            } else {
                                $html .= '
                                    <img src="' . aq_resize(esc_url(vincent_get_featured_image_url()), $vincent_image_width, "", true, true, true) . '" alt="" />
                                ';
                            }
                        } else {
                            $html .= '
                                <img src="' . esc_url(vincent_get_featured_image_url()) . '" alt="" />
                            ';
                        }

                        $html .= '
                    </div>
                ';
            }
        }

        $html .= '</div>';
        return $html;
    } else {
        $vincent_attachment_ID =get_post_thumbnail_id(get_the_ID());
        $html = '';

        if (isset($vincent_attachment_ID) && $vincent_attachment_ID !== '') {
            $vincent_attachment_array = wp_get_attachment_metadata($vincent_attachment_ID);

            $vincent_attachment_width = $vincent_attachment_array['width'];
            $vincent_attachment_height = $vincent_attachment_array['height'];
            $vincent_image_width = 1170;
            $vincent_image_height = 660;

            $html .= '
                <div class="vincent_post_formats">
                    <div class="vincent_pf_standard_cont">
                        ';

                        if ($vincent_attachment_width > 1170) {
                            if (($vincent_attachment_width / $vincent_attachment_height) > 1) {
                                $html .= '
                                    <img src="' . aq_resize(esc_url(vincent_get_featured_image_url()), $vincent_image_width, $vincent_image_height, true, true, true) . '" alt="" />
                                ';
                            } else {
                                $html .= '
                                    <img src="' . aq_resize(esc_url(vincent_get_featured_image_url()), $vincent_image_width, "", true, true, true) . '" alt="" />
                                ';
                            }
                        } else {
                            $html .= '
                                <img src="' . esc_url(vincent_get_featured_image_url()) . '" alt="" />
                            ';
                        }

                        $html .= '
                    </div>
                </div>
            ';
        }

        return $html;
    }
}

# Post Formats for Listings
function vincent_get_post_formats_for_listings()
{
    if (vincent_post_options()) {
        if (!empty($args)) {
            extract($args);
        }

        $vincent_post_format = get_post_format();
        if (empty($vincent_post_format)) {
            $vincent_post_format = 'standard';
        }

        $html = '';

        $html .= '
            <div class="vincent_post_formats vincent_pf_' . get_post_format() . '">
                ';

                if ($vincent_post_format == 'image') {
                    if (is_array(vincent_get_post_option('vincent_pf_images'))) {
                        # CSS
                        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
                        # JS
                        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), false, true);

                        $html .= '
                            <div class="vincent_owlCarousel owl-carousel owl-theme">';
                                foreach (vincent_get_post_option('vincent_pf_images') as $key => $image) {
                                    $html .= '
                                        <div class="item">
                                            <img src="' . aq_resize(esc_url($image['full_url']), 1600, 1600, true, true, true) . '" alt="' . $image['alt'] . '">
                                        </div>
                                    ';
                                }
                                $html .= '
                            </div>
                        ';

                        vincentHelper::getInstance()->addJSToFooter('owl_post_formats', '
                            jQuery(".vincent_owlCarousel").on("initialized.owl.carousel", function(e) {
                                jQuery(".vincent_owlCarousel").css("opacity", "1");
                            });
                            jQuery(".vincent_owlCarousel").owlCarousel(
                                {
                                    items:1,
                                    lazyLoad:true,
                                    loop:true,
                                    dots:false,
                                    nav:false,
                                    autoplay:true,
                                    autoplayTimeout:5000,
                                    autoplayHoverPause:true,
                                    autoHeight:true
                                }
                            );
                        ', 'window-load');
                    } else {
                        $html .= '
                            <img class="vincent_stand_fi" src="' . aq_resize(esc_url(vincent_get_featured_image_url()), 300, 300) . '" alt="">
                        ';
                    }
                }

                if ($vincent_post_format == 'audio') {
                    if (strlen(vincent_get_post_option('vincent_pf_audio_url')) > 0) {
                        $html .= '
                            <div class="vincent_pf_audio_cont">
                                ' . vincent_get_post_option('vincent_pf_audio_url') . '
                            </div>
                        ';
                    } else {
                        $html .= '
                            <div class="vincent_excerpt">
                                ' . substr(get_the_excerpt(), 0, 175) . '
                            </div>
                        ';
                    }
                }

                if ($vincent_post_format == 'video') {
                    $html .= '
                        <div class="vincent_pf_video_cont">
                            ' . vincent_get_post_option('vincent_pf_video_url') . '
                        </div>
                    ';
                }

                if ($vincent_post_format == 'quote') {
                    if (strlen(vincent_get_post_option('vincent_pf_quote_text')) > 0) {
                        $blockquote_author_position = vincent_get_post_option('vincent_pf_quote_author_position');

                        if (strlen(vincent_get_post_option('vincent_pf_quote_author')) > 0) {
                            $blockquote_author_position = (strlen($blockquote_author_position) > 0 ? ', ' . $blockquote_author_position : '');
                        }

                        $html .= '
                            <div class="vincent_pf_quote_cont">
                                <div class="vincent_blockquote">
                                    <h4>' . vincent_get_post_option('vincent_pf_quote_text') . '</h4>
                                </div>
                                <div class="vincent_blockquote_author">
                                    ' . vincent_get_post_option('vincent_pf_quote_author') . '<span>' . $blockquote_author_position . '</span>
                                </div>
                            </div>
                        ';
                    } else {
                        $html .= '
                            <div class="vincent_excerpt">
                                ' . substr(get_the_excerpt(), 0, 175) . '
                            </div>
                        ';
                    }
                }

                if ($vincent_post_format == 'link') {
                    if (strlen(vincent_get_post_option('vincent_pf_link_url')) > 0) {
                        $html .= '
                            <div class="vincent_link_cont">
                                <h4>
                                    ' . esc_html__('Hello!', 'vincent') . '
                                    <a href="' . esc_url(vincent_get_post_option('vincent_pf_link_url')) . '">
                                        ' . esc_html__('Click Here, ', 'vincent') . '
                                    </a>
                                    ' . esc_html__("It's a Link Post!", "vincent") . '
                                </h4>
                            </div>
                        ';
                    } else {
                        $html .= '
                            <div class="vincent_excerpt">
                                ' . substr(get_the_excerpt(), 0, 175) . '
                            </div>
                        ';
                    }
                }

                if ($vincent_post_format == 'aside' || $vincent_post_format == 'status') {
                    $html .= '
                        <div class="vincent_aside_cont">
                            <h4>
                                ' . substr(get_the_excerpt(), 0, 175) . '
                            </h4>
                        </div>
                    ';
                }

                if ($vincent_post_format == 'chat') {
                    $html .= '
                        <div class="vincent_excerpt">
                            ' . substr(get_the_excerpt(), 0, 175) . '
                        </div>
                    ';
                }

                if ($vincent_post_format == 'standard') {
                    if (strlen(vincent_get_featured_image_url()) > 0) {
                        $html .= '
                            <img class="vincent_stand_fi" src="' . aq_resize(esc_url(vincent_get_featured_image_url()), 1600, 1600, true, true, true) . '" alt="" />
                        ';
                    }
                }

                $html .= '
            </div>
        ';

        return $html;
    } else {
        $vincent_attachment_ID =get_post_thumbnail_id(get_the_ID());
        $html = '';

        if (isset($vincent_attachment_ID) && $vincent_attachment_ID !== '') {
            $vincent_attachment_array = wp_get_attachment_metadata($vincent_attachment_ID);

            $vincent_attachment_width = $vincent_attachment_array['width'];
            $vincent_attachment_height = $vincent_attachment_array['height'];
            $vincent_image_width = 1170;
            $vincent_image_height = 660;

            $html .= '
                <div class="vincent_post_formats">
                    <div class="vincent_pf_standard_cont">
                        ';

            if ($vincent_attachment_width > 1170) {
                if (($vincent_attachment_width / $vincent_attachment_height) > 1) {
                    $html .= '
                                    <img src="' . aq_resize(esc_url(vincent_get_featured_image_url()), $vincent_image_width, $vincent_image_height, true, true, true) . '" alt="" />
                                ';
                } else {
                    $html .= '
                                    <img src="' . aq_resize(esc_url(vincent_get_featured_image_url()), $vincent_image_width, "", true, true, true) . '" alt="" />
                                ';
                }
            } else {
                $html .= '
                                <img src="' . esc_url(vincent_get_featured_image_url()) . '" alt="" />
                            ';
            }

            $html .= '
                    </div>
                </div>
            ';
        }

        return $html;
    }
}

# RWMB check
function vincent_post_options()
{
    if (class_exists('RWMB_Loader')) {
        return true;
    } else {
        return false;
    }
}

# RWMB get option
function vincent_get_post_option($name, $default = false)
{
    if (class_exists('RWMB_Loader')) {
        if (rwmb_meta($name)) {
            return rwmb_meta($name);
        } else {
            return $default;
        }
    } else {
        return $default;
    }
}

# Get Preffered Option
function vincent_get_prefered_option($name)
{
	if (func_num_args() > 1) {
		die ('The vincent_get_prefered_option("'.$name.'") function may takes only one argument.');
	}
	
	global $vincent_customizer_default_values;
	
	if (!isset($vincent_customizer_default_values[$name])) {
		die ('Error! You did not add the default value for the "'.$name.'" option! core/customizer.php.');
	}
	
    if (vincent_get_post_option($name) && vincent_get_post_option($name) !== 'default') {
        return vincent_get_post_option($name, $vincent_customizer_default_values[$name]);
    } else {
        return vincent_get_theme_mod($name);
    }
}

# Get Featured Image Url
function vincent_get_featured_image_url()
{
    $featured_image_full_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
    if (isset($featured_image_full_url[0]) && strlen($featured_image_full_url[0]) > 0) {
        return $featured_image_full_url[0];
    } else {
        return false;
    }
}

# Get Image Meta
function vincent_get_attachment($attachment_id)
{
    $attachment = get_post($attachment_id);
    return array(
        'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink($attachment->ID),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}

# Featured Posts
function vincent_featured_posts($args = array('orderby' => 'rand', 'numberposts' => '2', 'featured_image' => 'show', 'excerpt' => 'show', 'post_meta' => 'show'))
{
    extract($args);

    if (vincent_get_prefered_option('featured_posts_status') == 'enabled') {

        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => esc_attr($orderby),
            'posts_per_page' => absint($numberposts),
            'ignore_sticky_posts' => 1
        );

        query_posts($args);

        if (have_posts()) {

            echo '<div class="row vincent_featured_posts">';

            while (have_posts()) {
                the_post();
                ?>

                <div class="col-md-<?php echo(12 / $numberposts); ?>">
                    <h4 class="innertitle">
                        <a class="notextdecor vincent_post_title" href="<?php esc_url(the_permalink()); ?>">
                            <?php esc_html(the_title()); ?>
                        </a>
                    </h4>

                    <?php if ($post_meta == 'show') { ?>
                        <div class="vincent_meta">
                            <div>
                                <?php
                                echo esc_attr__('in', 'vincent');
                                echo ' ';
                                the_category(', ');
                                ?>
                            </div>

                            <div>
                                <?php echo esc_html(get_the_date()); ?>
                            </div>

                            <div>
                                <?php echo esc_attr__('by', 'vincent');
                                echo ' ';
                                the_author_posts_link();
                                ?>
                            </div>

                            <div>
                                <a href="<?php comments_link(); ?>">
                                    <?php comments_number(); ?>
                                </a>
                            </div>

                        </div>
                    <?php } ?>

                    <?php if (vincent_get_featured_image_url() && $featured_image == 'show') { ?>
                        <a href="<?php esc_url(the_permalink()); ?>" class="vincent_fimage vincent_image_fader">
                            <img src="<?php echo esc_url(aq_resize(vincent_get_featured_image_url(), 700, 700, true, true, true)); ?>"
                                alt="">
                        </a>
                    <?php } ?>

                    <?php if ($excerpt == 'show') { ?>
                        <div class="vincent_excerpt">
                            <?php echo substr(get_the_excerpt(), 0, 175); ?>
                        </div>
                    <?php } ?>
                </div>
                <?php
            }
            wp_reset_query();

            echo '</div>';
        }
    }
}

# Social Buttons in Footer
if (!function_exists('vincent_social_buttons_in_footer')) {
	function vincent_social_buttons_in_footer() {
		
		$html = '';
		
		# Twitter
		if (vincent_get_theme_mod('footer_twitter') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_twitter" href="' . esc_url(vincent_get_theme_mod('footer_twitter')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-twitter"></i>
            </a>
            ';
		}
		
		# Facebook
		if (vincent_get_theme_mod('footer_facebook') !== '') {
			$html .= '
                <a class="vincent_footer_social_button vincent_facebook" href="' . esc_url(vincent_get_theme_mod('footer_facebook')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                    <i class="fa fa-facebook"></i>
                </a>
            ';
		}
		
		# Instagram
		if (vincent_get_theme_mod('footer_instagram') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_instagram" href="' . esc_url(vincent_get_theme_mod('footer_instagram')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-instagram"></i>
            </a>
            ';
		}
		
		# Google+
		if (vincent_get_theme_mod('footer_google_plus') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_google_plus" href=" ' . esc_url(vincent_get_theme_mod('footer_google_plus')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-google-plus"></i>
            </a>
            ';
		}
		
		# Pinterest
		if (vincent_get_theme_mod('footer_pinterest') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_pinterest" href="' . esc_url(vincent_get_theme_mod('footer_pinterest')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-pinterest"></i>
            </a>
            ';
		}
		
		# LinkedIn
		if (vincent_get_theme_mod('footer_linkedin') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_linkedin" href=" ' . esc_url(vincent_get_theme_mod('footer_linkedin')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-linkedin-square"></i>
            </a>
            ';
		}
		
		# YouTube
		if (vincent_get_theme_mod('footer_youtube') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_youtube" href=" ' . esc_url(vincent_get_theme_mod('footer_youtube')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-youtube"></i>
            </a>
            ';
		}
		
		# Tumblr
		if (vincent_get_theme_mod('footer_tumbl') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_tumbl" href="' . esc_url(vincent_get_theme_mod('footer_tumbl')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-tumblr"></i>
            </a>
            ';
		}
		
		# Flickr
		if (vincent_get_theme_mod('footer_flickr') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_flickr" href="' . esc_url(vincent_get_theme_mod('footer_flickr')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-flickr"></i>
            </a>
            ';
		}
		
		# VK
		if (vincent_get_theme_mod('footer_vk') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_vk" href="' . esc_url(vincent_get_theme_mod('footer_vk')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-vk"></i>
            </a>
            ';
		}
		
		# Dribbble
		if (vincent_get_theme_mod('footer_dribbble') !== '') {
			$html .= '
            <a class="vincent_footer_social_button vincent_dribbble" href="' . esc_url(vincent_get_theme_mod('footer_dribbble')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                <i class="fa fa-dribbble"></i>
            </a>
            ';
		}
		
		# Vimeo
		if (vincent_get_theme_mod('footer_vimeo') !== '') {
			$html .= '
                <a class="vincent_footer_social_button vincent_vimeo" href="<' . esc_url(vincent_get_theme_mod('footer_vimeo')) . '" target="_' . esc_attr(vincent_get_theme_mod('footer_social_link_target')) . '">
                    <i class="fa fa-vimeo"></i>
                </a>
            ';
		}
		
		return $html;
	}
}

# Excerpt Truncate
if (!function_exists('vincent_excerpt_truncate')) {
	function vincent_excerpt_truncate($vincent_string, $vincent_length = 80, $vincent_etc = '... ', $vincent_break_words = false, $vincent_middle = false)
	{
		if ($vincent_length == 0)
			return '';
		
		if (mb_strlen($vincent_string, 'utf8') > $vincent_length) {
			$vincent_length -= mb_strlen($vincent_etc, 'utf8');
			if (!$vincent_break_words && !$vincent_middle) {
				$vincent_string = preg_replace('/\s+\S+\s*$/su', '', mb_substr($vincent_string, 0, $vincent_length + 1, 'utf8'));
			}
			if (!$vincent_middle) {
				return mb_substr($vincent_string, 0, $vincent_length, 'utf8') . $vincent_etc;
			} else {
				return mb_substr($vincent_string, 0, $vincent_length / 2, 'utf8') . $vincent_etc . mb_substr($vincent_string, -$vincent_length / 2, utf8);
			}
		} else {
			return $vincent_string;
		}
	}
}

# Transparent Header Check
function vincent_transparent_header_check()
{
    if (!is_404()) {
        if (vincent_get_prefered_option('header_transparent') == 'enabled') {
            vincentHelper::getInstance()->addJSToFooter('transp_head', '
		        jQuery("html").addClass("vincent_transparent_header");
		    ');
        } else {
            vincentHelper::getInstance()->addJSToFooter('non_transp_head', '
		        jQuery("html").addClass("vincent_non_transparent_header");
		    ');
        }
    }
}

# Page Title Check
function vincent_page_title_check()
{
	if (!is_404()) {
		if (vincent_get_post_option('single_page_title', 'show') !== 'show') {
			vincentHelper::getInstance()->addJSToFooter('non_page_title', '
		        jQuery("html").addClass("vincent_non_page_title");
		    ');
		}
	}
}

# VC Init
add_action('vc_before_init', 'vincent_vc_before_init_actions');
function vincent_vc_before_init_actions()
{
    setcookie('vchideactivationmsg', '1', strtotime('+3 years'), '/');
    setcookie('vchideactivationmsg_vc11', (defined('WPB_VC_VERSION') ? WPB_VC_VERSION : '1'), strtotime('+3 years'), '/');
    vc_set_as_theme();

    require_once(get_template_directory() . '/core/vc-elements/blockquote/blockquote.php');
    require_once(get_template_directory() . '/core/vc-elements/blog/blog.php');
    require_once(get_template_directory() . '/core/vc-elements/button/custom_button.php');
    require_once(get_template_directory() . '/core/vc-elements/contacts/contacts.php');
    require_once(get_template_directory() . '/core/vc-elements/countdown/countdown.php');
    require_once(get_template_directory() . '/core/vc-elements/counter/counter.php');
    require_once(get_template_directory() . '/core/vc-elements/iconbox/iconbox.php');
    require_once(get_template_directory() . '/core/vc-elements/infobox/infobox.php');
    require_once(get_template_directory() . '/core/vc-elements/map/custom_map.php');
    require_once(get_template_directory() . '/core/vc-elements/stripes/stripes.php');
    require_once(get_template_directory() . '/core/vc-elements/team/team.php');
    require_once(get_template_directory() . '/core/vc-elements/testimonials/testimonials.php');

    if (class_exists('WooCommerce')) {
        require_once(get_template_directory() . '/core/vc-elements/best_offer/best_offer.php');
        require_once(get_template_directory() . '/core/vc-elements/custom_products/custom_products.php');
        require_once(get_template_directory() . '/core/vc-elements/product_listing/product_listing.php');
    }
}

# PRE
function vincent_pre($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

# Title
function vincent_the_title()
{
    if (vincent_get_post_option('single_page_title', 'show') == 'show') {
        echo '
        <div class="vincent_title_block ' . ((vincent_get_theme_mod('title_border_type') == 'figure') ? 'vincent_corners' : '') . '">
            <div class="vincent_inner_text">
                <h1>' . get_the_title() . '</h1>
            </div>
        </div>
        ';
    }
}

# Standard Listing Title
function vincent_standard_listing_title()
{
    if (!is_home() || !is_front_page()) {
        echo '
        <div class="vincent_title_block ' . ((vincent_get_theme_mod('title_border_type') == 'figure') ? 'vincent_corners' : '') . '">
            <div class="vincent_inner_text">
                ';

                if (is_category()) {
                    echo '<h1>' . esc_html__('Archive by category', 'vincent') . ' "' . single_cat_title('', false) . '"</h1>';
                }

                if (is_tag()) {
                    echo '<h1>' . esc_html__('Archive by tag', 'vincent') . ' "' . single_tag_title('', false) . '"</h1>';
                }

                if (is_author()) {
                    global $author;

                    echo '<h1>' . esc_html__('All posts by', 'vincent') . ' ' . get_userdata($author)->display_name . '</h1>';
                }

                if (is_search()) {
                    echo '<h1>' . esc_html__('Search results by', 'vincent') . '  "' . get_search_query() . '":</h1>';
                }

                echo '
            </div>
        </div>
    ';
    }
}

# Admin Footer
add_filter('admin_footer', 'vincent_admin_footer');
function vincent_admin_footer()
{
	if (strlen(get_page_template_slug())>0) {
	    echo "<input type='hidden' name='' value='" . (get_page_template_slug() ? get_page_template_slug() : '') . "' class='vincent_this_template_file'>";
    }
}

# WP_Head
add_action('wp_enqueue_scripts', 'vincent_ajaxurl');
function vincent_ajaxurl()
{
	wp_add_inline_script( 'vincent-theme', 'var vincent_ajaxurl = \'' . admin_url('admin-ajax.php') . '\';' );
}

# Admin_Head
add_action('admin_head', 'vincent_admin_head');
function vincent_admin_head()
{
    echo "
    <script type='text/javascript'>
    var vincent_themeurl = '" . esc_url(get_template_directory_uri()) . "';
    </script>";
}

# Tiny Dropcap Button
add_editor_style('css/core/pm_tiny.css');
add_action('init', 'vincent_tiny');
function vincent_tiny()
{
    if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
        add_filter('mce_external_plugins', 'vincent_tiny_plugin');
        add_filter('mce_buttons', 'vincent_tiny_register_button');
    }
}

function vincent_tiny_plugin($plugin_array)
{
    $plugin_array['vincent_tiny'] = esc_url(get_template_directory_uri()) . '/js/core/pm_tiny.js';
    return $plugin_array;
}

function vincent_tiny_register_button($buttons)
{
    array_push($buttons, "vincent_dropcap");
    return $buttons;
}

add_filter('mce_buttons_2', 'vincent_mce_buttons_2');
function vincent_mce_buttons_2($buttons)
{
    array_push($buttons, 'backcolor');
    return $buttons;
}

function vincent_remove_post_format_parameter($url) {
    $url = remove_query_arg('post_format', $url);
    return $url;
}
add_filter('preview_post_link', 'vincent_remove_post_format_parameter', 9999);

function vincent_objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('vincent_objectToArray', (array) $object);
}

# Activate Visual Composer for Custom Post Types
$list = array(
    'page',
    'post'
);
if (function_exists('vc_set_default_editor_post_types')) {
    vc_set_default_editor_post_types($list);
}

/* Change Parameters in Standard VC Elements */
if (class_exists('Vc_Manager')) {
    add_action('vc_after_init', function(){
        /* Element Masonry Media Grid */
        $vincent_new_param_data = array(
            'param_name' => 'gap',
            'heading' => esc_html__( 'Gap', 'vincent' ),
            'description' => esc_html__( 'Select gap between grid elements.', 'vincent' ),
            'type' => 'dropdown',
            'std' => '30',
            'value' => array(
                '0px' => '0',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
                '40px' => '40',
                '50px' => '50',
                '55px' => '55',
                '60px' => '60',
            ),
            'edit_field_class' => 'vc_col-sm-6',
        );

        /* Element Row */
        $vincent_new_param_data_2 = array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Columns gap', 'vincent' ),
            'param_name' => 'gap',
            'value' => array(
                '0px' => '0',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
                '40px' => '40',
                '45px' => '45',
                '50px' => '50',
                '55px' => '55',
                '60px' => '60',
            ),
            'std' => '0',
            'description' => esc_html__( 'Select gap between columns in row.', 'vincent' ),
        );

        $vincent_new_param_data_3 = array(
            'param_name' => 'style',
            'heading' => esc_html__( 'Style', 'vincent' ),
            'description' => esc_html__( 'Select accordion display style.', 'vincent' ),
            'type' => 'dropdown',
            'std' => 'pixel_mafia',
            'value' => array(
                esc_html__( 'Classic', 'vincent' ) => 'classic',
                esc_html__( 'Modern', 'vincent' ) => 'classic',
                esc_html__( 'Flat', 'vincent' ) => 'flat',
                esc_html__( 'Outline', 'vincent' ) => 'outline',
                esc_html__('Pixel-Mafia Style', 'vincent') => 'pixel_mafia'
            )
        );

        $vincent_new_param_data_4 = array(
            'param_name' => 'shape',
            'heading' => esc_html__( 'Shape', 'vincent' ),
            'description' => esc_html__( 'Select accordion shape.', 'vincent' ),
            'type' => 'dropdown',
            'value' => array(
                esc_html__( 'Rounded', 'vincent' ) => 'rounded',
                esc_html__( 'Square', 'vincent' ) => 'square',
                esc_html__( 'Round', 'vincent' ) => 'round',
            ),
            'dependency' => array(
                'element' => 'style',
                'value' => array('classic', 'flat', 'outline')
            )
        );

        $vincent_new_param_data_5 = array(
            'param_name' => 'color',
            'heading' => esc_html__( 'Color', 'vincent' ),
            'description' => esc_html__( 'Select accordion color.', 'vincent' ),
            'type' => 'dropdown',
            'std' => 'grey',
            'value' => getVcShared( 'colors-dashed' ),
            'param_holder_class' => 'vc_colored-dropdown',
            'dependency' => array(
                'element' => 'style',
                'value' => array('classic', 'flat', 'outline')
            )
        );

        $vincent_new_param_data_6 = array(
            'param_name' => 'no_fill',
            'heading' => esc_html__( 'Do not fill content area?', 'vincent' ),
            'description' => esc_html__( 'Do not fill content area with color.', 'vincent' ),
            'type' => 'checkbox',
            'dependency' => array(
                'element' => 'style',
                'value' => array('classic', 'flat', 'outline')
            )
        );

        vc_update_shortcode_param('vc_masonry_media_grid', $vincent_new_param_data);
        vc_update_shortcode_param('vc_row', $vincent_new_param_data_2);
        vc_update_shortcode_param('vc_tta_accordion', $vincent_new_param_data_3);
        vc_update_shortcode_param('vc_tta_accordion', $vincent_new_param_data_4);
        vc_update_shortcode_param('vc_tta_accordion', $vincent_new_param_data_5);
        vc_update_shortcode_param('vc_tta_accordion', $vincent_new_param_data_6);

        $vincent_new_params_in_standard_element = array(
            array(
                'param_name' => 'vincent_border_type',
                'heading' => esc_html__('Border Type', 'vincent'),
                'description' => esc_html__('Select the type of border of element', 'vincent'),
                'type' => 'dropdown',
                'std' => 'flat',
                'value' => array(
                    esc_html__('Flat', 'vincent') => 'flat',
                    esc_html__('Figure', 'vincent') => 'figure'
                )
            ),

            array(
                'param_name' => 'vincent_border_location',
                'heading' => esc_html__('Figure Border Location', 'vincent'),
                'description' => esc_html__('Select the location of figure border in the element', 'vincent'),
                'type' => 'dropdown',
                'std' => 'top',
                'dependency' => array(
                    'element' => 'vincent_border_type',
                    'value' => 'figure'
                ),
                'value' => array(
                    esc_html__('Top', 'vincent') => 'top',
                    esc_html__('Bottom', 'vincent') => 'bottom',
                    esc_html__('Both', 'vincent') => 'both'
                )
            )
        );

        vc_add_params('vc_row', $vincent_new_params_in_standard_element);
    });
}

/* Shop Functions Options */
if (!function_exists('vincent_shop_functions_options')) {
    function vincent_shop_functions_options() {
        $vincent_classes = '';

        if (class_exists('WooCommerce')) {
            if (vincent_get_theme_mod('shop_functions') == 'disabled') {
                $vincent_classes .= 'vincent_shop_functions_disabled';
            } else {
                $vincent_classes .= 'vincent_shop_functions_enabled';
            }

            if (vincent_get_theme_mod('product_page_remove') == 'enabled') {
                $vincent_classes .= ' vincent_shop_links_removed';
            }
        }

        return $vincent_classes;
    }
}

/* WooCommerce */
if (class_exists('WooCommerce')) {
    add_theme_support('woocommerce');
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-zoom' );

    /* WooCommerce Page Title */
    function vincent_shop_page_title(){
        if (vincent_get_post_option('single_page_title', 'show') == 'show') {

            if (is_product()) {
                echo '
                <div class="vincent_title_block vincent_corners">
                    <div class="vincent_inner_text">
                        <h1>' . esc_html__('Product Detail', 'vincent') . '</h1>
                    </div>
                </div>
            ';
            } else {
                echo '
                <div class="vincent_title_block vincent_shop_title_block vincent_corners">
                    <div class="vincent_inner_text">
                        <h1></h1>
                    </div>
                </div>
            ';
            }
        }
    }

    /* Number of Columns in Products List */
    add_filter('loop_shop_columns', 'vincent_loop_columns');
    if (!function_exists('vincent_loop_columns')) {
        function vincent_loop_columns(){
            return vincent_get_theme_mod('products_in_row');
        }
    }

    /* Number of Items in Products List */
    add_filter('loop_shop_per_page', 'vincent_products_per_page');
    if (!function_exists('vincent_products_per_page')) {
        function vincent_products_per_page(){
            return vincent_get_theme_mod('products_per_page');
        }
    }

// Custom Fields in Products
    add_action('woocommerce_product_options_pricing', 'vincent_custom_prod_field');
    function vincent_custom_prod_field() {
        woocommerce_wp_text_input(array('id' => 'best_offer_field', 'class' => 'short', 'label' => esc_attr('Best Offer', 'vincent') . ''));
        woocommerce_wp_text_input(array('id' => 'ingredients_field', 'class' => 'short', 'label' => esc_attr('Ingredients', 'vincent') . ''));
    }

    add_action('save_post', 'vincent_save_product_with_custom_field');
    function vincent_save_product_with_custom_field($product_id) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return;
        if ( isset( $_POST['best_offer_field'] ) ) {
            update_post_meta( $product_id, 'best_offer_field', $_POST['best_offer_field'] );
        }
        if (isset( $_POST['ingredients_field'])) {
            update_post_meta( $product_id, 'ingredients_field', $_POST['ingredients_field'] );
        }
    }

    add_action('woocommerce_after_shop_loop_item_title', 'vincent_best_offer_field_display');
    function vincent_best_offer_field_display() {
        $prod_ID = get_the_ID();

        $best_offer_field = get_post_meta($prod_ID, 'best_offer_field', true);

        if (isset($best_offer_field) && $best_offer_field !== '') {
            echo '
            <div class="vincent_best_offer_field">
                <span>' . esc_html($best_offer_field) . '</span>
            </div>
        ';
        }
    }

    add_action('woocommerce_after_shop_loop_item_title', 'vincent_ingredients_field_display', 20);
    function vincent_ingredients_field_display() {
        $prod_ID = get_the_ID();

        $ingredients_field = get_post_meta($prod_ID, 'ingredients_field', true);

        if (isset($ingredients_field) && $ingredients_field !== '') {
            echo '
            <div class="vincent_ingredients_field">
                <span>' . esc_html($ingredients_field) . '</span>
            </div>
        ';
        }
    }

# Product excerpt
    add_action('woocommerce_after_shop_loop_item_title', 'vincent_add_prod_excerpt', 10);
    function vincent_add_prod_excerpt(){
        $prod_ID = get_the_ID();

        $prod_excerpt = get_the_excerpt($prod_ID);

        echo '
        <p class="vincent_prod_excerpt">
            ' . substr($prod_excerpt, 0, 70) . '
        </p>
    ';
    }

    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
    add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 15);

    /* Related Products */
    add_action('woocommerce_output_related_products_args', 'vincent_related_products_args');
    function vincent_related_products_args($args){
        $args['posts_per_page'] = 3;
        $args['columns'] = 3;

        return $args;
    }

    // Change Shipping Title in Order Table
    add_filter( 'woocommerce_shipping_package_name', 'filter_woocommerce_shipping_package_name', 10, 3 );
    function filter_woocommerce_shipping_package_name() {
        return esc_html__('Delivery', 'vincent');
    };
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'vincent_header_add_to_cart_fragment' );
	
	function vincent_header_add_to_cart_fragment ($fragments) {
		global $woocommerce;
		
		ob_start();
		?>

		<a class="vincent_cart_contents" href="<?php echo esc_url(wc_get_cart_url()); ?>">
			<div class="vincent_shopping_cart_inner">
				<div class="vincent_cart_item_counter">
					<?php echo $woocommerce->cart->cart_contents_count; ?>
				</div>
				<div class="vincent_total_price"><?php echo $woocommerce->cart->get_cart_total(); ?></div>
				<div class="vincent_total_items">
					<?php echo sprintf(_n('%s item', '%s items', $woocommerce->cart->cart_contents_count, 'vincent'), $woocommerce->cart->cart_contents_count) . ' - ' . esc_html__('View Cart', 'vincent'); ?>
				</div>
			</div>
		</a>
		
		<?php
		$fragments['a.vincent_cart_contents'] = ob_get_clean();
		
		return $fragments;
	}
}

// Custom Filtering in Products Listing by Date
add_filter( 'woocommerce_get_catalog_ordering_args', 'vincent_custom_woocommerce_get_catalog_ordering_by_date' );
function vincent_custom_woocommerce_get_catalog_ordering_by_date( $args ) {
    $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    if ('date_asc' == $orderby_value) {
        $args['orderby'] = 'date';
        $args['order'] = 'asc';
        $args['meta_key'] = '';
    }
    if ('date_desc' == $orderby_value) {
        $args['orderby'] = 'date';
        $args['order'] = 'desc';
        $args['meta_key'] = '';
    }
    return $args;
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'vincent_custom_woocommerce_catalog_orderby_date' );
add_filter( 'woocommerce_catalog_orderby', 'vincent_custom_woocommerce_catalog_orderby_date' );
function vincent_custom_woocommerce_catalog_orderby_date( $sortby ) {
    $sortby['date_asc'] = 'Date (Ascending)';
    $sortby['date_desc'] = 'Date (Descending)';
    return $sortby;
}

# Demo Class
# update_option('pm_demo', 'true');
if (get_option('pm_demo') == 'true') {
    add_filter( 'body_class', function( $classes ) {
        return array_merge( $classes, array( 'vincent_demo' ) );
    } );
}







