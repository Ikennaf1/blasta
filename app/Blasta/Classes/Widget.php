<?php

class Widget
{
    private static $instance = null;
    private static $widgets;

    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance   = new Widget;
            static::$widgets    = [];
        }
        
        return static::$instance;
    }

    /**
     * Returns all widgets
     */
    public function all()
    {
        return static::$widgets;
    }

    /**
     * Adds a widget to the widgets
     */
    public function register(string $name, string $header, string $body, ?array $options = null)
    {
        $widget[$name]  = [
            'header'    => $header,
            'body'      => $body,
            'options'   => $options
        ];

        static::$widgets = [...static::$widgets, ...$widget];
    }

    /**
     * Removes a widget from the widgets
     */
    public function remove(string $widgetName)
    {
        $widgets = $this->all();
        unset($widgets[$widgetName]);
        static::$widgets = $widgets;
    }

    /**
     * Deletes every widget
     */
    public function clear()
    {
        static::$widgets = [];
    }
}
