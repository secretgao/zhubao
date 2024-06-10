<?php
namespace App\Utils;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class Captcha {
    //生成图形验证码
    static public function getCaptcha($codeLength,$width,$height) {
        // 包含哪些字符
        $chars = '0123456789abcefghijklmnopqrstuvwxyz';
        $builder = new PhraseBuilder($codeLength, $chars);
        $captcha = new CaptchaBuilder(null, $builder);

        // 生成验证码
        $captcha->build($width, $height, $font = null);

        // base64 image
        $image = $captcha->inline();
        //uniqid
        $uniqid = uniqid().mt_rand(1000,9999);
        //value
        $value = $captcha->getPhrase();
        //json
        return ['code' => 0, 'image'=>$image,'uniqid'=>$uniqid,'value'=>$value];
    }
}
