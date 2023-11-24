<?php

require_once base_path('/app/Blasta/Classes/WidgetArea.php');

function registerWidgetArea(string $widgetName)
{
    $widgetArea = WidgetArea::getInstance();
    $widgetArea->register($widgetName);
}
