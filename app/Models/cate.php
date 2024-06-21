<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cate extends Model
{
    use HasFactory;

    public $table = 'zhubao_cate';
    public $fillable = [
        'name',
    ];


    public function getcate(){
        return self::query()->pluck('name','id')->toArray();
    }
}
