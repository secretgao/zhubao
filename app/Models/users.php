<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;


    public $table = 'zhubao_users';
    public $fillable = [
        'username',
        'password',
        'role',
        'remark',
    ];
}
