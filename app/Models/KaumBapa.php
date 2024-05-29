<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaumBapa extends Model
{
    use HasFactory;
    protected $table = 'table_ibadah_kaum_bapak';
    protected $fillable = ['id','gambar','deskripsi','jadwal_ibadah'];
}
