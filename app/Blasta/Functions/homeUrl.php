<?php

function homeUrl(string $url = '/') : string
{
    $url = trim($url, '.');
    $url = trim($url, '/');

    if ($_SERVER['SERVER_PORT'] == 8001) {
        $url = './' . $url;
    } else {
        $url = '/' . $url;
    }

    return $url;
}
