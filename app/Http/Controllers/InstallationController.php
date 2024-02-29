<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class InstallationController extends Controller
{
    public function installation(Request $request)
    {
        return view('installation.index');
    }

    public function install(Request $request)
    {
        // Set the app name
        $app_name = trim($request->app_name);
        $app_name = strlen($app_name) > 0 ? $app_name : null;

        if (is_null($app_name)) {
            return redirect()->back()->with([
                'message' => 'Application name field can not be empty.'
            ]);
        }

        settings('w', 'general.name', $app_name);

        // Create the database
        $fp = fopen(database_path('database.sqlite'), 'a');
        fclose($fp);

        // Create the /public/my_exports dir and inner dirs
        mkUriDir(public_path('/my_exports'));
        mkUriDir(public_path('/my_exports/assets'));
        mkUriDir(public_path('/my_exports/pages'));
        mkUriDir(public_path('/my_exports/posts'));
        mkUriDir(public_path('/my_exports/uploads'));
        mkUriDir(public_path('/my_exports/uploads/images'));
        mkUriDir(public_path('/my_exports/uploads/audios'));
        mkUriDir(public_path('/my_exports/uploads/videos'));

        // SoftLink the /public/my_exports/uploads to /public/uploads
        Artisan::call('uploads:link');
        // $path = public_path('my_exports/uploads');
        // file_put_contents(
        //     public_path('/uploads'), str_replace('\\', '/', $path)
        // );

        // SoftLink the /public/my_exports/assets to /public/assets
        // 

        // Migrate the tables
        Artisan::call('migrate:fresh');

        // Remove install flag
        if (file_exists(base_path('/install'))) {
            unlink(base_path('/install'));
        }

        // Generate unique key
        // Artisan::call('key:generate');

        return redirect('/register');
    }
}
