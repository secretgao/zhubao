<?php

namespace App\Http\Controllers;


use App\Models\products;
use Facade\FlareClient\Http\Response;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
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
    public function job(){
        return view('home/job');
    }

    public function advice(){
        return view('home/advice');
    }
    public function about(){
        return view('home/about');
    }

    public function generateCaptcha() {
        $builder = new CaptchaBuilder;
        $builder->build();
        // 将字符串保存到session中
        Session::put('captcha', $builder->getPhrase());

        // 将生成的图片输出到浏览器
        return response($builder->output())->header('Content-type','image/jpeg');
    }

    public function search(Request $request){

        if (empty($request->input('verify_code'))){
            return response()->json(['status' =>500,'msg'=> '请输入验证码']);
        }
        if (Session::get('captcha') != $request->input('verify_code')) {
            return response()->json(['status' =>500,'msg'=> '验证码输入错误']);
        }
        if (empty($request->input('certificate_number'))){
            return response()->json(['status' =>500,'msg'=> '请输入证书编号']);
        }
        $info = products::query()->where('certificate_number',$request->input('certificate_number'))->first();

        if (empty($info)){
            return response()->json(['status' =>500,'msg'=> '证书编号不存在']);
        }
        return response()->json(['status' =>200,'msg'=> '请输入证书编号','data'=>$request->input('certificate_number')]);
    }
}
