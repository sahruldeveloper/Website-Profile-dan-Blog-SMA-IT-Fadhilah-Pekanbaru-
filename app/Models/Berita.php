<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\User;
use DB;

class Berita extends Model
{

    protected $fillable = ['id', 'judul', 'slug', 'kategori_id', 'isi', 'gambar', 'users_id'];
    protected $table = 'berita';
    public $incrementing = false;
    protected $primaryKey = 'id';

    public static function kodeBerita()
    {

        $kode = DB::table('berita')->max('id');
        $addNol = '';
        $kode = str_replace("BRT", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if ($kode) {
            $addNol = "000";
        }

        $kodeBaru = "BRT" . $addNol . $incrementKode;
        return $kodeBaru;
    }

    public function category()
    {
        // return $this->belongsTo('App\Models\Category');
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}