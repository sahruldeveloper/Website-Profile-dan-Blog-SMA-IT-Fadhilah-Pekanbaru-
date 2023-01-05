<?php

namespace App\Http\Controllers;
use App\Models\Berita;

use Illuminate\Http\Request;

class BeritaLengkapController extends Controller
{
    public function index(Request $request) {
        $data = Berita::with(['category'])->orderBy('created_at', 'DESC')->simplePaginate(5);

        return view('pages.berita', compact('data'));
    }

    public function show(Request $request, $slug) {

        $item = Berita::with(['category'])->where('slug', $slug)->firstOrFail();

        return view('pages.detail_berita', [
            'item' => $item
        ]);
    }
}