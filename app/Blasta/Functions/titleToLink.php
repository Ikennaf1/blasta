<?php

function titleToLink(string $str) : string
{
    $str = stripPunctuations($str);
    $str = stripIgnoredWords($str);
    $str = spaceToDash($str);
    $str = strtolower($str);

    return $str;
}
