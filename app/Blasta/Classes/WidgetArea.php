<?php

require_once base_path('/app/Blasta/Classes/Set.php');

class WidgetArea
{
    private static $instance = null;
    private static $json;
    private static Set $widgetAreas;

    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new WidgetArea;
            static::$widgetAreas = new Set();
            static::$json = base_path("/app/Blasta/widget_areas.json");
            static::$instance->refresh();
        }
        
        return static::$instance;
    }

    /**
     * Returns all widget areas
     */
    public function all()
    {
        $this->refresh();

        return static::$widgetAreas->getItems();
    }

    /**
     * Adds widget area(s) to the widget areas
     */
    public function register(string ...$widgetAreas)
    {
        static::$widgetAreas->add(...$widgetAreas);
        $this->write();
        $this->refresh();
    }

    /**
     * Removes widget area(s) from the widget areas
     */
    public function remove(string ...$widgetAreas)
    {
        static::$widgetAreas->remove(...$widgetAreas);
        $this->write();
        $this->refresh();
    }

    /**
     * Deletes every widget area
     */
    public function clear()
    {
        static::$widgetAreas->clear();
        $this->write();
        $this->refresh();
    }

    /**
     * Stores the widget areas to file
     */
    private function write()
    {
        file_put_contents(static::$json, json_encode(static::$widgetAreas->getItems()));
    }

    /**
     * Refreshes the widget areas variable
     */
    private function refresh()
    {
        $json = file_get_contents(static::$json);
        $widgetAreas = json_decode($json, true);
        static::$widgetAreas->clear();
        static::$widgetAreas->add(...$widgetAreas);
    }
}

$widgetArea = WidgetArea:: getInstance();
$widgetArea->register('sidebar');
