<?php

function dirPath(string $file = __FILE__) : string
{
    return dirname($file);
}
