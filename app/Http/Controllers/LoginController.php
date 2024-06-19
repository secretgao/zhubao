<?php

namespace App\Http\Controllers;


use App\Models\products;
use App\Models\users;
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
class LoginController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loginshow(){
        return view('login/login');
    }


    public function login(Request $request){

        $requestData = request()->all();
        $validator = Validator::make(
            $requestData,
            [
                'username' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'username.required' => '用户名是必填项。',
                'password.required' => '密码是必填项。',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' =>500,'msg'=> $validator->errors()->first()]);
        }

        $info =  users::query()->where('username',$requestData['username'])->first();
        if (empty($info)){
            return response()->json(['status' =>500,'msg'=> '用户不存在']);
        }

        if ($requestData['password'] != $info->password){
            return response()->json(['status' =>500,'msg'=> '密码错误']);
        }

        $request->session()->regenerate();
        return response()->json(['status' =>200,'msg'=> '登录成功']);

    }

}
