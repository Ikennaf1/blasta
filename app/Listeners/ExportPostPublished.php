<?php

namespace App\Listeners;

use App\Events\PostPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\ExportController;

class ExportPostPublished
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostPublished $event): void
    {
        // dd($event->post->id);
        // $port = config('app.env') == 'production'
        //     ? ''
        //     : ':8001';

        // $options = array(
        //     CURLOPT_URL     => env('APP_URL') . $port . '/exports/post/' . $event->post->id,
        //     CURLOPT_POST    => true
        // );
        // $ch = curl_init();
        // curl_setopt_array($ch, $options);
        // curl_exec($ch);
        // curl_close($ch);
        $exportController = new ExportController();
        $exportController->exportPost($event->post);
    }
}
