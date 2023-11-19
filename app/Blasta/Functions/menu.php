<?php

require_once base_path('/app/Blasta/Classes/Settings.php');
// require_once '../Classes/Settings.php';

function addMenu(string $title, string $url, ?string $target = null)
{
    $settings = Settings::getInstance();
    $settings->add('menu', [
        $title => [
            'url'       => $url,
            'target'    => $target
        ]
    ]);
}

function getMenu()
{
    $settings = Settings::getInstance();
    return $settings->list('menu');
}

function removeMenu(string $title)
{
    $settings = Settings::getInstance();
    $settings->remove('menu', $title);
}

function menu()
{
    $newMenu = [];
    $menu = getMenu();

    foreach ($menu as $title => $props) {
        $newMenu[] = $props['target'] == null
            ? '<a href="'.exportLink($props['url']).'">'.ucfirst($title).'</a>'
            : '<a href="'.exportLink($props['url']).'" target="'.$props['target'].'">'.ucfirst($title).'</a>';
    }

    return $newMenu;
}
