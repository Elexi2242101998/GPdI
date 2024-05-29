<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaumWanita extends Model
{
    use HasFactory;

    protected $table = 'table_ibadah_kaum_wanita';
    protected $fillable = ['id','gambar','deskripsi','jadwal_ibadah'];
}
