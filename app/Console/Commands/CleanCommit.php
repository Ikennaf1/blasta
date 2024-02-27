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
    protected $signature = 'app:clean-commit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        fwrite($fp, '{}');
        fclose($fp);

        // Remove the /public/assets symbolic directory
        rrmdir(public_path('/assets'));
    }
}
