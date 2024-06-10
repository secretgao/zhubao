<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){

        return view('home/index');
    }


    public function intro(){
        return view('home/intro');
    }

    public function service(){
        return view('home/service');
    }

    public function jew(){
        return view('home/jew');
    }
    public function job(Request $request){
        return view('home/job');
    }

    public function advice(){
        return view('home/advice');
    }
    public function about(){
        return view('home/about');
    }

    function generateCaptcha() {
        $captchaChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $captchaLength = 6;
        $captchaCode = '';
        for ($i = 0; $i < $captchaLength; $i++) {
            $captchaCode .= $captchaChars[rand(0, strlen($captchaChars) - 1)];
        }

        $captchaImage = imagecreatetruecolor(120, 50);
        $bgColor = imagecolorallocate($captchaImage, 255, 255, 255);
        imagefilledrectangle($captchaImage, 0, 0, 120, 50, $bgColor);
        $textColor = imagecolorallocate($captchaImage, 0, 0, 0);
        imagestring($captchaImage, 5, 40, 15, $captchaCode, $textColor);

        ob_start();
        imagepng($captchaImage);
        $captchaImageContent = ob_get_contents();
        ob_end_clean();

        return Response::make($captchaImageContent)->header('Content-Type', 'image/png');
    }

}
