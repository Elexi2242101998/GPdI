<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbadahSekolahMinggu extends Model
{
    use HasFactory;
    protected $table = 'table_sekolah_minggu';
    protected $fillable = ['id','pelayanan','mdya','pratama'];
}
