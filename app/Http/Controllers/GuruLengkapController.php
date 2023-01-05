<?php

namespace App\Http\Controllers;
use App\Models\Guru;

use Illuminate\Http\Request;

class GuruLengkapController extends Controller
{
    public function index(Request $request) {
        $guru = Guru::simplePaginate(8);

        return view('pages.guru', compact('guru'));
    }
}