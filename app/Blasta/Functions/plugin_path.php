<?php

function plugin_path(string $resource = '', bool $trailingSlash = false) : string
{
    $path = base_path() . '/app/plugins' . $resource;
    $path .= $trailingSlash === true ? '/' : '';
    $path = str_replace('\\', '/', $path);
    return $path;
}
