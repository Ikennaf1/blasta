<?php

function toSnakeCase(string $delimiter, string $str): string
{
    return str_replace($delimiter, '_', $str);
}

function spaceToDash(string $str, bool $trimSpaces = true) : string
{
    if ($trimSpaces === true) {
        $str = trim($str);
    }

    $str = str_replace(' ', '-', $str);

    return $str;
}

function dashToSpace(string $str, bool $trimSpaces = true) : string
{
    if ($trimSpaces === true) {
        $str = trim($str);
    }

    $str = str_replace('-', ' ', $str);

    return $str;
}
