<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

get_header();

$vincent_sidebar_position = vincent_get_prefered_option('shop_sidebar_position');
$sidebar_name = 'WooCommerce';
$shop_sorting = vincent_get_theme_mod('shop_sorting_status');
?>

    <?php vincent_shop_page_title(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
        <div class="row <?php echo esc_attr($vincent_sidebar_position); ?> vincent_images_<?php echo vincent_get_theme_mod('product_image_type'); ?>">
            <div class="col-md-<?php echo (($vincent_sidebar_position !== 'vincent_no_sidebar') ? '8' : '12'); ?> vincent_content vincent_woocommerce_content <?php echo (($vincent_sidebar_position == 'vincent_no_sidebar') ? 'no_sidebar' : ''); ?>">
                <div class="vincent_tiny <?php echo (($shop_sorting == 'hide') ? 'no_shop_sorting' : ''); echo ' columns_' . esc_attr(vincent_get_theme_mod('products_in_row')) . '';?>">
                    <?php woocommerce_content(); ?>
                </div>
                <div class="vincent_subtiny">
                    <?php wp_link_pages(array('before' => '<div class="page-link">' . esc_html__('Pages', 'vincent') . ': ', 'after' => '</div>')); ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>

    <?php
get_footer();