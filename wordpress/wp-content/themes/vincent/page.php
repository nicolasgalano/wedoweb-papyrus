<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

the_post();
get_header();

$vincent_sidebar_position = vincent_get_prefered_option('sidebar_position');
$sidebar_name = 'Sidebar';
?>

    <?php vincent_the_title(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
        <div class="row <?php echo esc_attr($vincent_sidebar_position); ?> vincent_images_<?php echo vincent_get_theme_mod('product_image_type'); ?>">
            <div class="col-md-<?php echo ((is_active_sidebar('sidebar') && $vincent_sidebar_position !== 'vincent_no_sidebar') ? '8' : '12'); ?> vincent_content">
                <div class="vincent_tiny">
                    <?php the_content(); ?>
                </div>
                <div class="vincent_subtiny">
                    <?php wp_link_pages(array('before' => '<div class="page-link">' . esc_html__('Pages', 'vincent') . ': ', 'after' => '</div>')); ?>
                </div>
                <div class="vincent_comments_cont">
                    <?php comments_template(); ?>
                </div>
            </div>
            <?php
            if (is_active_sidebar('sidebar')) {
                get_sidebar();
            }
            ?>
        </div>
    </div>

<?php

get_footer();

