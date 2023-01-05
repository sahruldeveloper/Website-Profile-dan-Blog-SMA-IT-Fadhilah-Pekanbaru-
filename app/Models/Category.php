<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $fillable = ['id','nama_kategori','slug'];
    protected $table = 'kategori-berita';
    public $incrementing = false;
    protected $primaryKey = 'id';

    public static function kodeKategoriBerita() {

        $kode = DB::table('kategori-berita')->max('id');
        $addNol = '';
        $kode = str_replace("CTG", "", $kode);
        $kode = (int) $kode+1;
        $incrementKode = $kode;

        if($kode){
            $addNol ="000";
        }

        $kodeBaru = "CTG".$addNol.$incrementKode;
        return $kodeBaru;
    }

    public function berita()
{
    //MENGGUNAKAN RELASI ONE TO MANY DENGAN FOREIGN KEY parent_id
    return $this->hasMany(Berita::class, 'kategori_id', 'id');
}
}