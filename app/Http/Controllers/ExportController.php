<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Post;
use App\Http\Requests\StoreExportRequest;
use App\Http\Requests\UpdateExportRequest;


class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'All about Exports';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Export $export)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Export $export)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExportRequest $request, Export $export)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Export $export)
    {
        //
    }

    /**
     * Exports a single post
     */
    public function exportPost(Post $post)
    {
        $id = request()->post->id;

        if (!file_exists(public_path() . '/my_exports')) {
            mkdir(public_path() . '/my_exports');
        }

        $fp = fopen("my_exports/$id" . '.html', 'w');

        $port = env('APP_ENV') == 'production'
            ? ''
            : ':8001';
        
        $options = array(
            CURLOPT_URL             => env('APP_URL') . $port . '/posts/' . $id,
            CURLOPT_ENCODING        => 'gzip',
            CURLOPT_RETURNTRANSFER  => true
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $res = curl_exec($ch);
        curl_close($ch);

        fwrite($fp, $res);
        fclose($fp);

        return redirect()->back();
    }

    /**
     * Exports the specified assets
     */
    public function exportAssets()
    {
        $assets = file_get_contents(front_path('/assets.json'));
        $assets = json_decode($assets)->assets;

        foreach ($assets as $asset) {
            $dirs = explode('/', $asset);
            $numDirs = count($dirs);
            if ($numDirs > 1) {
                array_pop($dirs);
                $dirs = implode('/', $dirs);

                if (!is_dir(public_path("/my_exports/$dirs"))) {
                    mkdir(public_path("/my_exports/$dirs"), 0777, true);
                }
            }
            copy(front_path("/$asset"), public_path("/my_exports/$asset"));
        }
    }
}
