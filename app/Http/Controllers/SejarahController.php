<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.sejarah');
    }
}