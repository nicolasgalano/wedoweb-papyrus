<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

get_header();

?>
    <div class="vincent_404_content_wrapper vincent_corners">
        <div class="vincent_404_content_inner">
            <p class="vincent_404"><?php echo esc_html__('404', 'vincent'); ?></p>
            <h1><?php echo esc_html__('Oops, Page Not Found!', 'vincent'); ?></h1>
            <div class="clear"></div>
            <a class="vincent_404_home_btn" href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo esc_html__('Back Home', 'vincent'); ?>
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
<?php
get_footer('empty');