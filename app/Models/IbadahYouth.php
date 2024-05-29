<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbadahYouth extends Model
{
    use HasFactory;
    protected $table = 'table_ibadah_youth';
    protected $fillable = ['id','gambar','deskripsi','jadwal_ibadah'];
}
