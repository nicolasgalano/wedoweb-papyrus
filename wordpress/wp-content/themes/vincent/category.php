<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

get_header();

$vincent_sidebar_position = vincent_get_prefered_option('sidebar_position');
$sidebar_name = 'Sidebar';

vincent_standard_listing_title();
?>
    <div <?php post_class('container') ?>>
        <div class="row <?php echo esc_attr($vincent_sidebar_position); ?>">
            <div class="col-md-<?php echo ((is_active_sidebar('sidebar') && $vincent_sidebar_position !== 'vincent_no_sidebar') ? '8' : '12'); ?> vincent_content">
                <div class="vincent_tiny">
                    <div class="vincent_element_blog blog_type_standard colunms_1">
                        <div class="vincent_blog_wrapper">
                            <?php
                            while (have_posts()) : the_post();
                                get_template_part('standard-listing');
                            endwhile;
                            ?>
                        </div>

                        <?php
                        echo get_the_posts_pagination(array(
                            'prev_text' => __('<i class="fa fa-angle-double-left" aria-hidden="true"></i>', 'vincent'),
                            'next_text' => __('<i class="fa fa-angle-double-right" aria-hidden="true"></i>', 'vincent')
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php
get_footer();