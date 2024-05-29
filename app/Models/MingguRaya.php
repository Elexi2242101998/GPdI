<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MingguRaya extends Model
{
    use HasFactory;
    protected $table = 'table_ibadah_minggu_raya';
    protected $fillable = ['id','pelayanan','ibadah_raya1','ibadah_raya2'];
}
