<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (is_active_sidebar('header-right')) {
    echo "<div class='header_sidebar'>";
    dynamic_sidebar('header-right');
    echo "</div>";
}