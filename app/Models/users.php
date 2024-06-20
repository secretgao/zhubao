<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'zhubao_users';
    public $fillable = [
        'username',
        'password',
        'role',
        'remark',
        'show_password',
    ];
}
