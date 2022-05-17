<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;   

class Customer extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'full_name',
        'email',
    ];
    protected $hidden = [
        'password',
        'token'
    ];
    protected $table = 'cus';
}
