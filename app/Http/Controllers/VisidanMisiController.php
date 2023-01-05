<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisidanMisiController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.visidanmisi');
    }
}