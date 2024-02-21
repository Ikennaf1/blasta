<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $app_name = strlen($app_name) > 1 ? $app_name : null;

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

        // SoftLink the /public/my_exports/uploads to /public/uploads
        exec('php artisan uploads:link');

        // SoftLink the /public/my_exports/assets to /public/assets
        // 

        // Remove install flag
        unlink(base_path('/install'));

        return redirect('/register');
    }
}
