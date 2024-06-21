<?php

namespace App\Http\Controllers;

use App\Models\cate;
use Illuminate\Support\Facades\Auth;
use App\Models\products;
use App\Models\users;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
class cateController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){

        $certificate_number = $request->input('certificate_number');
        $cate_id = $request->input('cate_id');
        $query = cate::query();

        $query->orderby('id','desc');
        $cate = $query->paginate(20);
        $user = Auth::user();
        return view('cate/index', compact('cate','user'));
    }

    public function admin(){

        $query = users::query();
        $admins = $query->paginate(20);
        $user = Auth::user();
        return view('product/admin', compact('admins','user'));
    }

    public function cateadd(Request $request) : JsonResponse{

        $requestData = request()->all();
        $validator = Validator::make(
            $requestData,
            [
                'name' => 'required|string|max:255|unique:cate,name',
            ],
            [
                'name.required' => '分类是必填项。',
                'name.unique' => '分类已存在。',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' =>500,'msg'=> $validator->errors()->first()]);
        }

        try {
            $result = cate::query()->create(
                [
                    'name'=>$requestData['name'],
                ]
            );
            return response()->json(['status' =>200,'msg'=> $result]);
        } catch (QueryException $e) {
            return response()->json(['status' =>500,'msg'=> $e->getMessage()]);
        }
    }

    public function cateupdate(Request $request){

        $requestData = request()->all();
        $validator = Validator::make(
            $requestData,
            [
                'cate_id'=> 'required|string',
                'name' => 'required|string',
            ],
            [
                'id.required' => 'id是必填项。',
                'name.required' => '分类是必填项。',
                'name.unique' => '分类已存在。',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' =>500,'msg'=> $validator->errors()->first()]);
        }


        $info = cate::query()->select(['username','password','show_password'])->where('id',$requestData['update_password_user_id'])->first();
        if (empty($info)){
            return response()->json(['status'=>500,'msg'=>'数据不存在或参数错误']);
        }
        $result = cate::query()->where('id',$requestData['cate_id'])->update(
            [
                'name'=>$requestData['name'],
            ]
        );
        if ($result){
            return response()->json(['status' =>200,'msg'=> '修改成功']);
        }
        return response()->json(['status' =>500,'msg'=> '修改失败']);
    }
}
