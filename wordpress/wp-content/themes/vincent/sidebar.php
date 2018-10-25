<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

global $sidebar_name;

if (class_exists('WooCommerce')) {
    if (is_woocommerce()) {
        $vincent_sidebar_position = vincent_get_prefered_option('shop_sidebar_position');
    } else {
        $vincent_sidebar_position = vincent_get_prefered_option('sidebar_position');
    }
} else {
    $vincent_sidebar_position = vincent_get_prefered_option('sidebar_position');
}


if ($vincent_sidebar_position !== 'vincent_no_sidebar') {
    echo "<div class='vincent_sidebar col-md-4'>";
    dynamic_sidebar($sidebar_name);
    echo "</div>";
}