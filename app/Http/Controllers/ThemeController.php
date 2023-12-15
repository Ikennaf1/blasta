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
}
