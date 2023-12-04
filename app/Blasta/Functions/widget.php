<?php

require_once base_path('/app/Blasta/Classes/WidgetArea.php');
require_once base_path('/app/Blasta/Classes/Widget.php');
// require_once '../Classes/Widget.php';

/**
 * Registers a widget area on active theme
 */
function registerWidgetArea(string $widgetAreaName)
{
    $widgetArea = WidgetArea::getInstance();
    $widgetArea->register($widgetAreaName);
}

/**
 * Create a new widget
 */
function registerWidget(string $name, string $title, string $body, ?array $options = null)
{
    $widget = Widget::getInstance();
    $widget->register($name, $title, $body, $options);
}

/**
 * Adds a widget to a widget area
 */
function addToActiveWidgets(string $widgetArea, string $name, string $title, ?array $options = null)
{
    $widgets = Widget::getInstance();
    $widgets = $widgets->all();
    // var_dump($widgets);


    $widget = [
        'name'      => $name,
        'title'     => $title,
        'body'      => $widgets[$name]['body'],
        'options'   => $options
    ];

    $jsonPath = base_path('/app/Blasta/active_widgets.json');
    // $jsonPath = '../active_widgets.json';

    $activeWidgets = json_decode(file_get_contents($jsonPath), true);
    $activeWidgets[$widgetArea][] = $widget;

    file_put_contents($jsonPath, json_encode($activeWidgets));
}

/**
 * Loads selected widgets to designated widget areas
 */
function loadWidgets(string $widgetArea)
{
    // $jsonPath   = '../active_widgets.json';
    $jsonPath   = base_path('/app/Blasta/active_widgets.json');
    $allWidgets = json_decode(file_get_contents($jsonPath), true);
    $widgets    = [];

    if (empty($allWidgets[$widgetArea])) {
        return null;
    }

    $widgets = json_encode($allWidgets[$widgetArea]);

    return json_decode($widgets);
}

/**
 * Gets the widget title
 */
function getWidgetTitle(object $widget)
{
    if (!empty($widget->options->title)) {
        return $widget->options->title;
    }

    return $widget->title;
}

/**
 * Gets the widget title
 */
function getWidgetBody(object $widget)
{
    dd($widget);
    include_once $widget->body;
}

// addToActiveWidgets('right-sidebar', 'Recent posts', 'Recent posts');