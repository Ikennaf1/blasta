<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.widgets.index');
    }
}
