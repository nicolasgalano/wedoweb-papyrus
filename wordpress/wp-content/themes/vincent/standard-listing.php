<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

$vincent_post_format = get_post_format();
if (empty($vincent_post_format)) {
    $vincent_post_format = 'standard';
}
?>

<div class="stand_post vincent_post_format_<?php echo esc_attr($vincent_post_format); ?> <?php echo ((is_sticky()) ? 'vincent_sticky_post' : ''); ?>" id="post-<?php echo esc_attr(get_the_ID()); ?>">
    <div class="vincent_title">
        <h3 class="innertitle entry-title">
            <a class="notextdecor" href="<?php echo esc_url(get_permalink()); ?>">
                <?php echo esc_html(get_the_title()); ?>
            </a>
        </h3>
    </div>

    <div class="vincent_meta">
        <?php
        $categories = get_the_category();
        $separator = ', ';

        if (!empty($categories)) {
            ?>
            <div>
                <?php
                echo esc_html__('in ', 'vincent');
                foreach ($categories as $category) {
                    ?>
                    <a href="<?php echo esc_url(get_category_link($category->term_id)) ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                    <?php
                    echo esc_attr($separator);
                }
                ?>
            </div>
            <?php
        }
        ?>
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

    <?php
    if ($vincent_post_format == 'link' || $vincent_post_format == 'aside' || $vincent_post_format == 'status' || $vincent_post_format == 'quote') {
        echo vincent_get_post_formats_for_listings();
    } else {
        echo vincent_get_post_formats();
    }

    if ($vincent_post_format == 'image' || $vincent_post_format == 'video' || $vincent_post_format == 'chat' || $vincent_post_format == 'standard') {
        ?>
        <div class="vincent_excerpt">
            <?php echo get_the_excerpt(); ?>
        </div>
        <?php
    }

    if ($vincent_post_format == 'image' || $vincent_post_format == 'video' || $vincent_post_format == 'standard') {
        ?>
        <div class="read_more_cont">
            <a class="vincent_button" href="<?php echo esc_url(get_permalink()) ?>">
                <?php echo esc_html__('Read More', 'vincent'); ?>
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
        <?php
    }
    ?>
</div>