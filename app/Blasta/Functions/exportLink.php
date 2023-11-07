<?php

function exportLink($url = '/', $level = 0)
{
    $link = homeUrl($url, $level);

    if ($_SERVER['SERVER_PORT'] == 8001) {
        $link .= '.html';
    }

    return $link;
}
