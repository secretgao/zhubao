<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;


    public $table = 'zhubao_products';
    public $fillable = [
        'certificate_number',
        'query_code',
        'declaration_name',
        'product_shape',
        'sample_quality',
        'amplification',
        'detection',
        'detection_1',
        'image_path',
        'qc_content',
        'remark',
        'cate_id',
    ];
}
