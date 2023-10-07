<?php

function front_path(string $resource = '', bool $trailingSlash = false) : string
{
    $path = base_path() . '/resources/views/front' . $resource;
    $path .= $trailingSlash === true ? '/' : '';
    $path = str_replace('\\', '/', $path);
    return $path;
}
