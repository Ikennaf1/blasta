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

    public function export(Post $post)
    {
        // return request()->post->id;
        $id = request()->post->id;

        $fp = fopen($id . '.html', 'w');

        $port = env('APP_ENV') == 'production'
            ? ''
            : ':8001';
        
        $options = array(
            CURLOPT_URL             => env('APP_URL') . $port . '/posts/1',
            CURLOPT_ENCODIN         => 'gzip',
            CURLOPT_RETURNTRANSFER  => true
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $res = curl_exec($ch);
        curl_close($ch);

        fwrite($fp, $res);
        fclose($fp);
    }
}
