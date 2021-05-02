<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'cpf',
        'cellphone',
        'function',
        'password',
        'secret_question',
        'secret_answer',
    ];

    protected $hidden = [
        'password'
    ];
}
