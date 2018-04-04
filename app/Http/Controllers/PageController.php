<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function about()
    {
        return 'This is an information page about Friend Finder';
    }

    public function contact()
    {
        return 'Any questions? Please contact - ' . Config::get('app.supportEmail');
    }
}
