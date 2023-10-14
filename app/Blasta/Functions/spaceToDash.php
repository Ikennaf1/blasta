<?php

function spaceToDash(string $str, bool $trimSpaces = true) : string
{
    if ($trimSpaces === true) {
        $str = trim($str);
    }

    $str = str_replace(' ', '-', $str);

    return $str;
}
