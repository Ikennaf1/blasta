<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Export;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.themes.index');
    }

    /**
     * Activates a selected theme
     */
    public function activate(Request $request)
    {
        $urlExplode = explode('/', $request->url());
        $theme = $urlExplode[count($urlExplode) - 1];
        activateTheme($theme);

        return redirect()->back();
    }

    /**
     * Fetch all themes from online repository
     */
    public function fetchFree(Request $request)
    {
        $result = fetchFreeThemes();
    
        return view('dashboard.themes.fetch', [
            'themes' => json_decode($result)->data
        ]);
    }
}
