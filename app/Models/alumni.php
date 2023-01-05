<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class alumni extends Model
{
    use SoftDeletes;
    protected $fillable = ['nama', 'deskripsi', 'foto', 'slug'];
    protected $table = 'alumni';
}