<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurContact extends Model
{
    use HasFactory;

    protected $table = 'table_our_contact'; // Set the table name

    protected $fillable = [
        'id',
        'gambar',
        'alamat',
        'email',
        'no_telp',
        'web',
        'instagram',
        'twitter',
        'facebook'
    ]; // Set the fillable fields
}
