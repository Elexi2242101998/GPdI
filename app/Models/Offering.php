<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    use HasFactory;
    protected $table = 'table_offering';
    protected $fillable = ['id','ayat','persembahan','janji_iman','qris'];
}
