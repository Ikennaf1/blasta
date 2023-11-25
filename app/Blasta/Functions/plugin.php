<?php

/**
 * Returns the names of all installed plugins
 */
function getPlugins()
{
    return getDirectories(plugin_path());
}

/**
 * Returns the details of an installed plugin
 */
function getPluginDetails(string $pluginName, bool $assoc = false)
{
    $details = file_get_contents(plugin_path("/$pluginName/details.json"));

    return json_decode($details, $assoc);
}

/**
 * Checks if plugin exists
 */
function pluginExists(string $pluginName): bool
{
    $plugin = plugin_path("/$pluginName");

    if (file_exists($plugin)) {
        return true;
    }

    return false;
}

/**
 * Marks a plugin as active
 */
function markActive(string $pluginName)
{
    if (!pluginExists($pluginName)) {
        throw new Exception("Plugin $pluginName does not exist.");
    }

    $plugin = plugin_path("/$pluginName");
    $mark = "$pluginName=ACTIVE";

    $file = fopen("$plugin/ACTIVE", 'w');
    fwrite($file, $mark);
    fclose($file);
}

/**
 * Checks if a plugin is active
 */
function pluginIsActive(string $pluginName): bool
{
    if (!pluginExists($pluginName)) {
        return false;
    }

    $plugin = plugin_path("/$pluginName");

    if (file_exists("$plugin/ACTIVE")) {
        return true;
    }

    return false;
}

/**
 * Unmarks a plugin as active
 */
function unmarkActive(string $pluginName)
{
    if (!pluginIsActive($pluginName)) {
        return;
    }

    $plugin = plugin_path("/$pluginName");

    unlink("$plugin/ACTIVE");
}

