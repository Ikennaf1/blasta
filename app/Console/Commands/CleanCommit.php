<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanCommit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nidavel:clean-commit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepares the repo for git commit by removing and resetting files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Creates the installation flag
        $fp = fopen(base_path('/installation'), 'w');
        fclose($fp);

        // Resets the tags file
        $fp = fopen(base_path('/Blasta/tags.json'), 'w');
        fwrite($fp, '[]');
        fclose($fp);

        // Resets the active widgets file
        $fp = fopen(base_path('/Blasta/active_widgets.json'), 'w');
        fwrite($fp, '{}');
        fclose($fp);

        // Resets the settingss file
        $fp = fopen(base_path('/Blasta/settings.json'), 'w');
        fwrite($fp, '{"general":{"name":"Nidavel","homepage":"default","query_limit":10}}');
        fclose($fp);

        // Remove the /public/assets symbolic directory
        rrmdir(public_path('/assets'));

        // Remove the /public/uploads symbolic directory
        rrmdir(public_path('/uploads'));

        // Copy .env file to the .env.sample file
        $fp = fopen(base_path('/.env.example'), 'w');
        fwrite($fp, file_get_contents(base_path('/.env')));
        fclose($fp);
    }
}
