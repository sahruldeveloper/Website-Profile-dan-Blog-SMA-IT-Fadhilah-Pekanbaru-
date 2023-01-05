<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\alumni;
use App\Models\User;
use App\Models\Prestasi;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [
            'berita' => Berita::count(),
            'guru' => Guru::count(),
            'alumni' => alumni::count(),
            'prestasi' => Prestasi::count(),
            'users' => User::count(),
           

        ]);
       
    }
}