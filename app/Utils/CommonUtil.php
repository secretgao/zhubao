<?php

declare(strict_types = 1);
/**
 * +---------------------------------------+
 * | 通用工具类
 * +---------------------------------------+
 */

namespace App\Utils;
use App\Models\products;

class CommonUtil
{


    /**
     * @return void
     * 生成证书编号
     */
    public static function generateCertificateNumber(){

        $start = 'S02008';
        $total = products::query()->count();
        return $start.$total;
    }

    /**
     * @return void
     * 生成查询编码
     */
    public static function generateQueryCode(){

        $start = 'A0100';
        $total = products::query()->count();
        return $start.$total;
    }


    public static function generateQcContent($CertificateNumber,$QueryCode){

        return $CertificateNumber.$QueryCode;
    }
}
