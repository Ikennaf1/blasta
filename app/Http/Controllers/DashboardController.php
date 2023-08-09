<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'posts' => Post::all()
            ]
        );
    }

    /**
     * Renders a route's content on the content section
     * of the dashboard page.
     */
    static function RenderContent($route)
    {
        if (empty(request()->query('token'))) {
            $token = base64_encode(Hash::make($route));
            request()->query->add(['token' => $token]);
        }

        $port = env('APP_ENV') == 'production'
            ? ''
            : ':8001';
        
        $options = array(
            CURLOPT_URL             => env('APP_URL') . $port . '/' . $route,
            CURLOPT_ENCODING        => 'gzip',
            CURLOPT_RETURNTRANSFER  => true
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $contents = curl_exec($ch);
        curl_close($ch);

        return $contents;
    }
}
