<?php

function render_pagination($pages_count = 0, $current_page = 0, $slug = "")
{
    echo '<div class="pagination">';
    for ($i = 1; $i <= $pages_count; $i++) {
        echo '<a href="' . APP_CONTROLLER_PATH . '/store/' . $slug . '?page=' . $i . '" class="' . ($current_page == $i ? "active" : "") . '">' . $i . '</a>';
    }
    echo '</div>';
}
