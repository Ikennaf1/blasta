<?php

require_once base_path('/app/Blasta/Classes/Settings.php');

function getSettings()
{
    return Settings::getInstance();
}
