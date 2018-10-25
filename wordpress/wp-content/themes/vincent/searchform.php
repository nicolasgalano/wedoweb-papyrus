<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/
$search_rand = mt_rand(0, 999);
?>
<form name="search_form" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="vincent_search_form" id="search-<?php echo esc_attr($search_rand); ?>">
    <span class="vincent_icon_search" onclick="javascript:document.getElementById('search-<?php echo esc_attr($search_rand); ?>').submit();">
        <i class="fa fa-search"></i>
    </span>
    <input type="text" name="s" data-placeholder="<?php esc_html_e('Search', 'vincent'); ?>" value="<?php esc_html_e('Search', 'vincent'); ?>" title="<?php esc_html_e('Search the site...', 'vincent'); ?>" class="vincent_field_search">
    <div class="clear"></div>
</form>