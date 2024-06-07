<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use function Symfony\Component\Translation\t;

class QrCodeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(){

        $content = utf8_encode('你要编码的内容');
        $time =time();


        $path = DIRECTORY_SEPARATOR.'qc'.DIRECTORY_SEPARATOR.$time.'_qrcode.png';
        var_dump($path);
        exit();
        // 或者保存为图片到服务器
        QrCode::size(200)->generate($content, public_path(DIRECTORY_SEPARATOR.'qc'.DIRECTORY_SEPARATOR.$time.'_qrcode.png'));

    }


    public function show()
    {
        // 生成二维码的内容，可以是随机字符串或其他信息
        $content = time();

        // 生成二维码的URL
        $qrcode = QrCode::size(200)->generate($content);

        if (request()->ajax()) {
        return response()->json([
            'qrcode' =>$qrcode,
                'content' =>$content,
            'ja'=>'aj'
            ]);
        }

        return view('qr/show', compact('qrcode', 'content'));
    }


}
