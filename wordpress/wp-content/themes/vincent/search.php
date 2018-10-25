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
            <div class="col-md-<?php echo (($vincent_sidebar_position !== 'vincent_no_sidebar') ? '8' : '12'); ?> vincent_content">
                <div class="vincent_tiny">
                    <div class="vincent_search_results vincent_element_blog blog_type_standard colunms_1">
                        <div class="vincent_blog_wrapper">
                            <?php
                            if (have_posts()) {
                                while (have_posts()) : the_post();
                                    ?>
                                    <div class="stand_post vincent_search_result_item">
                                        <div class="vincent_title vincent_search_result_title">
                                            <h3 class="innertitle entry-title">
                                                <a class="notextdecor" href="<?php echo esc_url(get_permalink()); ?>">
                                                    <?php echo esc_html(get_the_title()); ?>
                                                </a>
                                            </h3>
                                        </div>

                                        <div class="vincent_meta">
                                            <div>
                                                <?php echo esc_html(get_the_date()); ?>
                                            </div>

                                            <div>
                                                <?php
                                                echo esc_html__('by ', 'vincent');
                                                echo get_the_author_posts_link();
                                                ?>
                                            </div>
                                        </div>

                                        <div class="vincent_excerpt">
                                            <?php echo get_the_excerpt(); ?>
                                        </div>

                                        <div class="read_more_cont">
                                            <a class="vincent_button" href="<?php echo esc_url(get_permalink()) ?>">
                                                <?php echo esc_html__('Read More', 'vincent'); ?>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;

                                echo get_the_posts_pagination(array(
                                    'prev_text' => __('<i class="fa fa-angle-double-left" aria-hidden="true"></i>', 'vincent'),
                                    'next_text' => __('<i class="fa fa-angle-double-right" aria-hidden="true"></i>', 'vincent')
                                ));
                            } else {
                                ?>
                                <h1 class="vincent_no_search_result">
                                    <?php echo esc_html__('Oops! Nothing Found!', 'vincent'); ?>
                                </h1>

                                <div class="vincent_no_result_search_form">
                                    <?php echo get_search_form(true); ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
    <?php
get_footer();