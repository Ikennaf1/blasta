<?php

function blastaGlobalClasses()
{
    $dir = new DirectoryIterator(dirname(__FILE__));
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot() && $fileinfo->getFilename() != 'blastaGlobalClasses.php') {
            // var_dump($fileinfo->getFilename());
            require_once($fileinfo->getFilename());
        }
    }
}

blastaGlobalClasses();
