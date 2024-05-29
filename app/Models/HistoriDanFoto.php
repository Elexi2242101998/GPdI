<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriDanFoto extends Model
{
    use HasFactory;
    protected $table = 'table_histori_dan_foto';

    protected $fillable = ['id','gambar', 'deskripsi'];
}
