<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Prestasi extends Model
{
    use HasFactory;
    protected $fillable = ['id','judul', 'deskripsi', 'foto', 'slug'];
    protected $table = 'prestasi';
    public $incrementing = false;
    protected $primaryKey = 'id';

    public static function kode() {

        $kode = DB::table('prestasi')->max('id');
        $addNol = '';
        $kode = str_replace("PTS", "", $kode);
        $kode = (int) $kode+1;
        $incrementKode = $kode;

        if($kode){
            $addNol ="000";
        }

        $kodeBaru = "PTS".$addNol.$incrementKode;
        return $kodeBaru;
    }
}