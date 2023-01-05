<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Berita;
use illuminate\Database\Eloquent\Model;
use DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'roles'
    ];
    protected $table = 'users';
    public $incrementing = false;
    protected $primaryKey = 'id';

    public static function kode() {

        $kode = DB::table('users')->max('id');
        $addNol = '';
        $kode = str_replace("ADM", "", $kode);
        $kode = (int) $kode+1;
        $incrementKode = $kode;

        if($kode){
            $addNol ="000";
        }

        $kodeBaru = "ADM".$addNol.$incrementKode;
        return $kodeBaru;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function berita()
    {
        
        return $this->hasMany(Berita::class, 'users_id', 'id');
    }
}