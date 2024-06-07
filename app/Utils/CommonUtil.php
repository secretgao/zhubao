<?php

declare(strict_types = 1);
/**
 * +---------------------------------------+
 * | 通用工具类
 * +---------------------------------------+
 */

namespace App\Utils;




class CommonUtil
{


    /**
     * @return void
     * 生成证书编号
     */
    public static function generateCertificateNumber(){

        return 'A'.date('YmdHis');
    }

    /**
     * @return void
     * 生成查询编码
     */
    public static function generateQueryCode(){
        return 'S'.time();
    }


    public static function generateQcContent($CertificateNumber,$QueryCode){

        return $CertificateNumber.$QueryCode;
    }
}
