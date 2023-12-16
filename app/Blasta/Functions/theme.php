<?php

/**
 * Loads the active themes index
 * which is the entry point for the theme's functionalities
 */
function loadActiveThemeIndex()
{
    require_once base_path('/resources/views/front/index.php');
}

/**
 * Returns the names of all installed themes
 */
function getInstalledThemes()
{
    return getDirectories(theme_path());
}

/**
 * Check if theme exists
 */
function themeExists(string $themeName): bool
{
    $theme = theme_path("/$themeName");

    if (file_exists($theme)) {
        return true;
    }

    return false;
}

/**
 * Returns the screenshot path of all installed themes
 */
function getThemeScreenshot(string $themeName): ?string
{
    $defaultScreenshot = theme_path('/screenshot.jpg');
    if (!themeExists($themeName)) {
        return null;
    }

    $screenshot = theme_path("/$themeName/screenshot.jpg");

    return file_exists($screenshot) ? $screenshot : $defaultScreenshot;
}

/**
 * Returns the name of the active theme
 */
function getActiveTheme()
{
    $details = json_decode(file_get_contents(front_path('/details.json')));
    return $details->name;
}

/**
 * Fetch available themes online
 */
function fetchThemes()
{
    // 
}
