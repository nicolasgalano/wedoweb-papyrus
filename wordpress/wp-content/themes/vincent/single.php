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
        <div class="row <?php echo esc_attr($vincent_sidebar_position); ?>">
            <div class="col-md-<?php echo((is_active_sidebar('sidebar') && $vincent_sidebar_position !== 'vincent_no_sidebar') ? '8' : '12'); ?> vincent_content">
                <div class="vincent_meta">
                    <div><?php echo esc_attr__('in', 'vincent'); echo ' '; the_category(', '); ?></div>
                    <div><?php echo get_the_date(); ?></div>
                    <div><?php echo esc_attr__('by', 'vincent'); echo ' '; the_author_posts_link(); ?></div>
                    <div><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></div>
                </div>
                <?php echo vincent_get_post_formats(); ?>
                <div class="vincent_tiny">
                    <?php the_content(); ?>
                </div>
                <div class="vincent_subtiny">
                    <?php wp_link_pages(array('before' => '<div class="page-link">' . esc_html__('Pages', 'vincent') . ': ', 'after' => '</div>')); ?>
                </div>

                <?php
                if (vincent_get_prefered_option('post_tags_status') == 'show') {
                    ?>
                    <div class="vincent_post_tags">
                        <span><?php echo esc_html__('Tags: ', 'vincent'); ?></span>
                        <?php the_tags('<div>', ', ', '</div>'); ?>
                    </div>
                    <?php
                }

                if (vincent_get_prefered_option('share_buttons_status') == 'show') {
                    ?>
                    <div class="vincent_sharing">
                        <span><?php echo esc_html__('Share this Post', 'vincent'); ?></span>
                        <a target="_blank"
                           class="vincent_share_facebook"
                           href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>">
                            <?php echo esc_html__('Facebook', 'vincent'); ?>
                        </a>
                        <a target="_blank"
                           class="vincent_share_twitter"
                           href="https://twitter.com/intent/tweet?text=<?php echo str_replace(' ', '%20', get_the_title()); ?>&amp;url=<?php echo get_permalink(); ?>">
                            <?php echo esc_html__('Twitter', 'vincent'); ?>
                        </a>
                        <a target="_blank"
                           class="vincent_share_google_plus"
                           href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>">
                            <?php echo esc_html__('Google +', 'vincent'); ?>
                        </a>
                        <a target="_blank"
                           class="vincent_share_pinterest"
                           href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo (strlen(vincent_get_featured_image_url()) > 0 ? vincent_get_featured_image_url() : vincent_get_theme_mod('logo_image')); ?>">
                            <?php echo esc_html__('Pinterest', 'vincent'); ?>
                        </a>
                    </div>
                    <?php
                }

                if (vincent_get_prefered_option('about_author_status') == 'show') {
                    if (strlen(get_the_author_meta('description')) > 0) {
                        ?>
                        <div class="vincent_about_author">
                            <div class="vincent_about_author_wrapper">
                                <div class="vincent_author_ava">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                                </div>
                                <div class="vincent_author_cont">
                                    <h6><?php the_author_posts_link(); ?></h6>
                                    <p><?php the_author_meta('description'); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }

                if (vincent_get_prefered_option('post_navigation_status') == 'show') {
                    if (strlen(get_previous_post_link()) > 0 || strlen(get_next_post_link()) > 0) {
                        ?>
                        <div class="vincent_posts_navigation">
                            <?php
                            if (strlen(get_previous_post_link()) > 0) {
                                ?>
                                <span class="vincent_prev_post_button vincent_post_nav_button">
                                    <?php echo get_previous_post_link('%link', esc_html('Previous Post', 'vincent')); ?>
                                </span>
                                <?php
                            }

                            if (strlen(get_next_post_link()) > 0) {
                                ?>
                                <span class="vincent_next_post_button vincent_post_nav_button">
                                    <?php echo get_next_post_link('%link', esc_html('Next Post', 'vincent')); ?>
                                </span>
                                <?php
                            }
                            ?>

                            <div class="clear"></div>
                        </div>
                    <?php
                    }
                }
                ?>

                <?php
                vincent_featured_posts(array(
                    'orderby' => vincent_get_prefered_option('featured_posts_orderby'),
                    'numberposts' => vincent_get_prefered_option('featured_posts_numberposts'),
                    'featured_image' => vincent_get_prefered_option('featured_posts_fimage_status'),
                    'excerpt' => vincent_get_prefered_option('featured_posts_excerpt_status'),
                    'post_meta' => vincent_get_prefered_option('featured_posts_meta_status')
                ));
                ?>

                <?php comments_template(); ?>
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