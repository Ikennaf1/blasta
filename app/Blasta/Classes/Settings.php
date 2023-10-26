<?php

class Settings
{
    private static $instance = null;

    private static array $settings = [];

    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new Settings;
        }

        static::$instance->refreshSettings();

        return static::$instance;
    }

    public function add(string $key, array $settings)
    {
        foreach ($settings as $setting => $value) {
            static::$settings[$key][$setting] = $value;
        }        

        $this->write();
        $this->refreshSettings();
    }

    public function update(string $key, string $setting, $value)
    {
        if (isset(static::$settings[$key][$setting])) {
            static::$settings[$key][$setting] = $value;
        }

        $this->write();
        $this->refreshSettings();
    }

    public function remove(string $key, string ...$settings)
    {
        foreach ($settings as $setting) {
            unset(static::$settings[$key][$setting]);
        }

        $this->write();
        $this->refreshSettings();
    }

    public function get(string $key, string $setting)
    {
        return static::$settings[$key][$setting];
    }

    public function list(string $key): array
    {
        return static::$settings[$key];
    }

    public function all(): array
    {
        return static::$settings;
    }

    public function clear(string $key)
    {
        unset(static::$settings[$key]);

        $this->write();
        $this->refreshSettings();
    }

    private function write()
    {
        file_put_contents("app/Blasta/settings.json", json_encode(static::$settings));
    }

    private function refreshSettings()
    {
        $json = file_get_contents("app/Blasta/settings.json");
        static::$settings = json_decode($json, true);
    }
}
