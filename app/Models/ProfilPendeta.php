<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPendeta extends Model
{
    use HasFactory;

    protected $table = 'table_profil_pendeta'; // Set the table name

    protected $fillable = [
        'id',
        'nama_pendeta',
        'foto_pendeta',
        'moto',
        'instagram',
        'wa',
        'facebook'
    ]; // Set the fillable fields
}
