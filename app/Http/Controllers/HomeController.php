<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\alumni;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $guru = Guru::all();
        $alumni = alumni::all();
        $data = Berita::with(['category'])->orderBy('created_at', 'DESC')->paginate(3);

        $kalimat = "Alhamdulillah, puji syukur kehadirat Allah SWT yang telah melimpahkan rahmat, hidayah, serta inayahNya.Sholawat serta salam senantiasa kita senandungkan bagi Rasulullah akhir zaman yaitu Baginda Rasulullah Muhammad SAW beserta sahabat-sahabatnya yang telah membawa kita dari zaman gelap gulita, menuju zaman terang benderang/berilmu

        Selamat datang di web kami “SMA IT FADHILAH PEKANBARU”. merupakan website resmi dari SMA IT FADHILAH PEKANBARU. Dengan perkembangan jaman dan kemajuan teknologi IT yang cepat kami mengharapkan masukan dari berbagai pihak untuk website ini agar kami terus belajar dan mengupdate informasi, tampilan, isi dan mutu website yang dapat dimanfaatkan oleh siswa dan guru pada khususnya sebagai sumber informasi dan sumber belajar, serta stacholder lain baik orang tua, dunia usaha/industri atau masyarakat pada umumnya .

        Seperti sebuah ungkapan “Uthlubul ‘ilma walaw bishshiin”, tuntutlah ilmu sampai ke negeri Cina. Terlepas dari shahih tidaknya hadits ini, para Ulama banyak menyitirnya dalam khutbah-khutbah alasannya secara maknawi kalimat Tuntulah Ilmu sampai ke Negeri Cina adalah baik. Cina itu hanya kiasan untuk mengingatkan umat tentang pentingnya menuntut ilmu walau sampai ke tempat yang jauh, sampai ke negeri-negeri seberang.Jadi website ini berusaha selalu kami kembangkan sesuai kemajuan tehnologi dan sekolah dalam menyelaraskan kebijakan nasional tentang revitalisasi maupun kebijakan regional tentang Masyarkat Ekonomi Asean (MEA).

        Akhir kata, tak lupa kami ucapkan terima kasih kepada seluruh guru dan karyawan SMA IT FADHILAH PEKANBARU yang bersama-sama membangun generasi penerus bangsa yang memiliki daya saing global dan berkarakter mulia.


        Wassalamu’alaikum wr.wb.";

        return view('pages.home', compact('data', 'guru', 'alumni', 'kalimat'));
    }

    

    
}