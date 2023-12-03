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

/**
 * Deletes a directory
 */
function deleteDir(string $path, bool $force = false)
{
    if ($force === false) {
        return rmdir($path);
    }

    return rrmdir($path);
}

/**
 * Recursively deletes a directory
 */
function rrmdir($path) {
    $dir = opendir($path);

    while(( $file = readdir($dir)) !== false) {
        if (( $file != '.' ) && ( $file != '..' )) {
            $full = $path . '/' . $file;
            if ( is_dir($full) ) {
                rrmdir($full);
            }
            else {
                unlink($full);
            }
        }
    }

    closedir($dir);

    return rmdir($path);
}
