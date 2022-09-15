<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function show(){
        $title  = "wassup my G";
        return view('home', compact('title'));
    }
}
