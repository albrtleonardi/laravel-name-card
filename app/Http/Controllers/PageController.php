<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function index(Request $request)
    {
        // Set default language if not set
        if (!$request->session()->has('lang')) {
            $request->session()->put('lang', 'en');
        }

        // Change language if requested
        if ($request->has('lang')) {
            $lang = $request->get('lang');
            App::setLocale($lang);
            $request->session()->put('lang', $lang);
        }

        return view('welcome');
    }
}
