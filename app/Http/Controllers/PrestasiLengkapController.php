<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;

class PrestasiLengkapController extends Controller
{
    public function index(Request $request) {
        $prestasi = Prestasi::simplePaginate(6);

        return view('pages.prestasi', compact('prestasi'));
    }

   
}