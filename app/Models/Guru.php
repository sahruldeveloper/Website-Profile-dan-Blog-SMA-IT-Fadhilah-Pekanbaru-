<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Guru extends Model
{
    protected $fillable = ['id','nama_guru','slug','jabatan','alamat', 'tempat_lahir', 'tanggal_lahir','agama','jk', 'foto'];
    protected $table = 'guru';

    public $incrementing = false;
    protected $primaryKey = 'id';

    public static function kode() {

        $kode = DB::table('guru')->max('id');
        $addNol = '';
        $kode = str_replace("GRU", "", $kode);
        $kode = (int) $kode+1;
        $incrementKode = $kode;

        if($kode){
            $addNol ="000";

        }
        $kodeBaru = "GRU".$addNol.$incrementKode;
        return $kodeBaru;
    }
}