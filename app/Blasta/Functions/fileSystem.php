<?php

/**
 * Returns a list of directory contents in a directory
 */
function getContents(string $dir)
{
    $contents = [];
    $dir = new DirectoryIterator($dir);
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()) {
            $contents[] = $fileinfo->getFileName();
        }
    }

    return $contents;
}

/**
 * Returns a list of directory names in a directory
 */
function getDirectories(string $dir)
{
    $dirs = [];
    $dir = new DirectoryIterator($dir);
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot() && $fileinfo->isDir()) {
            $dirs[] = $fileinfo->getFileName();
        }
    }

    return $dirs;
}

/**
 * Returns a list of file names in a directory
 */
function getFiles(string $dir)
{
    $files = [];
    $dir = new DirectoryIterator($dir);
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot() && $fileinfo->isFile()) {
            $files[] = $fileinfo->getFileName();
        }
    }

    return $files;
}
