<?php

class Plugin
{
    private static $instance = null;
    private static $plugins;

    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance   = new Plugin;
            static::$plugins    = [];
        }
        
        return static::$instance;
    }

    /**
     * Returns the names of all installed plugins
     */
    public function getPlugins()
    {
        return getDirectories(plugin_path());
    }

    /**
     * Returns the details of an installed plugin
     */
    public function getPluginDetails()
    {
        // 
    }
}
