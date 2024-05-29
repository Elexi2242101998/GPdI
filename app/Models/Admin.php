<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as  Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'Admin';
    protected $appends = ['age'];
    protected $hidden = ['password'];

    protected $fillable = ['name_admin', 'email', 'password'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }
    public function users()
    {
        return $this->hasMany(User::class, 'id_admin', 'id');
    }
}