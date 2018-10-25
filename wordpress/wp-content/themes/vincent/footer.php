<?php
    $footer_status = vincent_get_prefered_option('footer_status');
    $vincent_menu_locations = get_nav_menu_locations();
    
?>

<div class="vincent_back_to_top"></div>

<?php
if ($footer_status !== 'hide') {
    ?>

    <footer>
        <div class="container copyright_area">
            <div class="row">
                <div class="col-md-12">
                    <div class="vincent_copyright">
                        <div class="vincent_logo_cont">
                            <?php vincent_the_logo('footer'); ?>
                        </div>
                        <div class="vincent_ftext">
                            <?php echo vincent_get_theme_mod('footer_sublogo_text'); ?>
                        </div>
                        <?php
                        if (isset($vincent_menu_locations['footer']) && $vincent_menu_locations['footer'] !== 0) {
                            ?>
                            <div class="vincent_footer_menu_cont">
                                <div class="vincent_footer_menu_inner">
                                    <?php
                                    wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'vincent_footer_menu', 'depth' => '1'));
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
						
						<div class="vincent_footer_socials_cont">
							<?php echo vincent_social_buttons_in_footer(); ?>
						</div>
						
                        <div class="vincent_copy_text">
                            <?php echo vincent_get_theme_mod('footer_copyright_text'); ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php
}

vincent_transparent_header_check(); vincent_page_title_check(); wp_footer(); ?>
</body>
</html>