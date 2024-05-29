<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbadahRayon extends Model
{
    use HasFactory;
    protected $table = 'table_ibadah_rayon';
    protected $fillable = ['id','gambar','deskripsi','jadwal_ibadah'];
}
