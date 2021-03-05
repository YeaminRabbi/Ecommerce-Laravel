<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function about()
    {

        $data = "This is about value data";
        return view('pages.about', compact('data'));
    }
}
