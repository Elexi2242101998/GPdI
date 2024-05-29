<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as  Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $rememberTokenName = 'remember_token';

    protected $appends = ['age'];

    protected $fillable = ['name', 'email', 'password','remember_token'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }
}
