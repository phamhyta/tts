<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;   

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
    protected $fillable = [
        'username',
        'password',
        'full_name',
        'email',
    ];
    protected $table = 'admin';
    protected $hidden = [
        'password',
        'remember_token'
    ];
    protected $dates = ['created_at', 'updated_at'];
}
