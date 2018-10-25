<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

require_once get_template_directory() . '/core/tgm/class-tgm-plugin-activation.php';


add_action('tgmpa_register', 'vincent_register_required_plugins');
function vincent_register_required_plugins()
{

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */

    $plugins = array(
        array(
            'name' => esc_html__('Contact Form 7', 'vincent'),
            'slug' => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name'               => esc_html__('Meta Box', 'vincent'),
            'slug'               => 'meta-box',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('One Click Demo Import', 'vincent'),
            'slug'               => 'one-click-demo-import',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name' => esc_html__('WP Instagram Widget', 'vincent'),
            'slug' => 'wp-instagram-widget',
            'required' => false,
            'version' => '1.9.8'
        ),
        array(
            'name' => esc_html__('WPBakery Visual Composer', 'vincent'),
            'slug' => 'js_composer',
            'source' => get_template_directory() . '/core/tgm/src/js_composer.zip',
            'required' => true,
            'version' => '5.5.2',
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        array(
            'name' => esc_html__('Revolution Slider', 'vincent'),
            'slug' => 'revslider',
            'source' => get_template_directory() . '/core/tgm/src/revslider.zip',
            'required' => true,
            'version' => '5.4.8',
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        array(
            'name' => esc_html__('Envato Market', 'vincent'),
            'slug' => 'envato-market',
            'source' => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
            'required' => false,
            'version' => '2.0.0',
            'force_activation' => false,
            'force_deactivation' => false
        ),
        array(
            'name' => esc_html__('WooCommerce', 'vincent'),
            'slug' => 'woocommerce',
            'required' => false,
        )
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                       // Default absolute path to pre-packaged plugins.
        'menu' => 'tgmpa-install-plugins',  // Menu slug.
        'has_notices' => true,                     // Show admin notices or not.
        'dismissable' => false,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '',                       // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                     // Automatically activate plugins after installation or not.
        'message' => '',                       // Message to output right before the plugins table.
        'strings' => array(
            'page_title' => esc_html__('Install Required Plugins', 'vincent'),
            'menu_title' => esc_html__('Install Plugins', 'vincent'),
            'installing' => esc_html__('Installing Plugin: %s', 'vincent'), // %s = plugin name.
            'oops' => esc_html__('Something went wrong with the plugin API.', 'vincent'),
            'notice_can_install_required' => esc_html__('This theme requires the following plugins: %1$s.', 'vincent'), // %1$s = plugin name(s).
            'notice_can_install_recommended' => esc_html__('This theme recommends the following plugins: %1$s.', 'vincent'), // %1$s = plugin name(s).
            'notice_cannot_install' => esc_html__('Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'vincent'), // %1$s = plugin name(s).
            'notice_can_activate_required' => esc_html__('The following required plugins are currently inactive: %1$s.', 'vincent'), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => esc_html__('The following recommended plugins are currently inactive: %1$s.', 'vincent'), // %1$s = plugin name(s).
            'notice_cannot_activate' => esc_html__('Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'vincent'), // %1$s = plugin name(s).
            'notice_ask_to_update' => esc_html__('The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'vincent'), // %1$s = plugin name(s).
            'notice_cannot_update' => esc_html__('Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'vincent'), // %1$s = plugin name(s).
            'install_link' => esc_html__('Begin installing plugins', 'vincent'),
            'activate_link' => esc_html__('Begin activating plugins', 'vincent'),
            'return' => esc_html__('Return to Required Plugins Installer', 'vincent'),
            'plugin_activated' => esc_html__('Plugin activated successfully.', 'vincent'),
            'complete' => esc_html__('All plugins installed and activated successfully. %s', 'vincent'), // %s = dashboard link.
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa($plugins, $config);
}