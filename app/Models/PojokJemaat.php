<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PojokJemaat extends Model
{
    use HasFactory;

    protected $table = 'table_pojok_jemaat';

    protected $fillable = [
        'id',
        'gambar',
        'video'
    ];
}
