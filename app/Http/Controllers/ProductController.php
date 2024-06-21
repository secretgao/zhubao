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
class ProductController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){

        $certificate_number = $request->input('certificate_number');
        $cate_id = $request->input('cate_id');
        $query = products::query();

        if ($certificate_number){
            $query->where('certificate_number',$certificate_number);
        }
        if ($cate_id){
            $query->where('cate_id',$cate_id);
        }
        $query->orderby('id','desc');
        $products = $query->paginate(200);
        $user = Auth::user();

        $cate = cate::getcate();
        return view('product/index', compact('products','user','cate'));
    }


    public function detail($certificate_number){
        $query = products::query()->where('certificate_number',$certificate_number);
        $info = $query->first();

        if  (empty($info)){
            return redirect()->route('product.list')->with('detail', '数据未找到');
        }
        $imagePath = Storage::url($info->image_path);
        return view('product/detail', compact('info','imagePath'));
    }


    public function delete(Request $request){
        $certificate_number = $request->input('certificate_number');
        $info = products::query()->where('certificate_number',$certificate_number)->first();
        if (empty($info)){
            return response()->json(['status'=>500,'msg'=>'数据不存在或参数错误']);
        }
        $image_path = $info->image_path;
        $qc_content = $info->qc_content;
        $env_image_path = env('IMAGE_PATH');
        $env_qc_path = env('QC_PATH');
        if ($info->delete()){
            if (file_exists($env_image_path.$image_path)){
                unlink($env_image_path.$image_path);
            }
            if (file_exists($env_qc_path.$qc_content)){
                unlink($env_qc_path.$qc_content);
            }
            return response()->json(['status'=>200,'msg'=>'刪除成功']);
        }
        return response()->json(['status'=>500,'msg'=>'刪除失败']);
    }
    public function deleteall(Request $request){
        $certificate_number = $request->input('certificate_number_str');
        if (empty($certificate_number)){
            return response()->json(['status'=>500,'msg'=>'参数错误']);
        }
        $certificate_number_arr = explode(',',$certificate_number);
        $info = products::query()->whereIn('certificate_number',$certificate_number_arr)->get();

        if (empty($info)){
            return response()->json(['status'=>500,'msg'=>'数据不存在']);
        }

        $image_path_arr = $qc_content_arr = [];
        foreach ($info as $item){
            $image_path_arr[]=$item->image_path;
            $qc_content_arr[]=$item->qc_content;
        }
        if (products::query()->whereIn('certificate_number',$certificate_number_arr)->delete()){
            $env_image_path = env('IMAGE_PATH');
            $env_qc_path = env('QC_PATH');
            foreach ($image_path_arr as $i){
                if (file_exists($env_image_path.$i)){
                    unlink($env_image_path.$i);
                }
            }
            foreach ($qc_content_arr as $q){
                if (file_exists($env_qc_path.$q)){
                    unlink($env_qc_path.$q);
                }
            }
            return response()->json(['status'=>200,'msg'=>'刪除成功']);
        }

        return response()->json(['status'=>500,'msg'=>'刪除失败']);
    }

    public function dataprint($certificate_number){
        $info = products::query()->where('certificate_number',$certificate_number)->first();
        if  (empty($info)){
            return redirect()->route('product.list')->with('detail', '数据未找到');
        }
        $imagePath = Storage::url($info->image_path);
        return view('product/print', compact('info','imagePath'));
    }

    public function editinfo($certificate_number){
        $query = products::query()->where('certificate_number',$certificate_number);
        $info = $query->first();

        if  (empty($info)){
            return redirect()->route('product.list')->with('detail', '数据未找到');
        }
        $imagePath = Storage::url($info->image_path);
        $cate = cate::getcate();
        return view('product/edit', compact('info','imagePath','cate'));
    }

    public function update(Request $request){
        $requestData = request()->all();
        $validator = Validator::make(
            $requestData,
            [
                'certificate_number'=>'required',
               // 'query_code'=>'required',
                'declaration_name'=>'required',
                'product_shape'=>'required',
                'sample_quality'=>'required',
                'amplification'=>'required',
                'detection'=>'required',
                'detection_1'=>'required',
                'image_path'=>'required',
                'remark' =>'nullable',
              //  'qc_content'=>'required',
            ],
            [
                'certificate_number.required' => '证书编号:[:attribute]必传',
              //  'query_code.required' => '查询编码:[:attribute]必传',
                'declaration_name.required' => '申报名称:[:attribute]必传',
                'product_shape.required' => '产品形状:[:attribute]必传',
                'sample_quality.required' => '样品质量:[:attribute]必传',
                'amplification.required' => '放大检测:[:attribute]必传',
                'detection.required' => '检测结果:[:attribute]必传',
                'detection_1.required' => '检测结果:[:attribute]必传',
                'image_path.required' => '上传图片:[:attribute]必传',
              //  'qc_content.required' => 'qc:[:attribute]必传',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['status' =>500,'msg'=> $validator->errors()->first()]);
        }
        try {
            unset($requestData['_token']);
            $result = products::query()->where('certificate_number',$requestData['certificate_number'])->update($requestData);
            return response()->json(['status' =>200,'msg'=> $result]);
        } catch (QueryException $e) {
            return response()->json(['status' =>500,'msg'=> $e->getMessage()]);
        }
    }

    public function dataprintall(Request $request){
        $certificate_number = $request->get('certificate_number');

        $certificate_number_arr = explode(',',$certificate_number);
        $products = products::query()->whereIn('certificate_number',$certificate_number_arr)->get();
        if  (empty($products)){
            return redirect()->route('product.list')->with('detail', '数据未找到');
        }
        foreach ($products as $item){
            $item->image_path = Storage::url($item->image_path);
        }
        return view('product/printall', compact('products'));
    }

    public function admin(){

        $query = users::query();
        $admins = $query->paginate(20);
        $user = Auth::user();
        return view('product/admin', compact('admins','user'));
    }

    public function adminadd(Request $request) : JsonResponse{

        $requestData = request()->all();
        $validator = Validator::make(
            $requestData,
            [
                'username' => 'required|string|max:255|unique:zhubao_users,username',
                'password' => 'required|string|min:5',
                'password_confirmed' => 'required|string',
                'role' => 'required|string',
                'remark'=> 'nullable|string',
            ],
            [
                'username.required' => '用户名是必填项。',
                'username.unique' => '用户名已存在。',
                'password.required' => '密码是必填项。',
                'password_confirmed.required' => '确认密码是必填项。',
                'password.min' => '密码长度至少为 5 个字符。',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' =>500,'msg'=> $validator->errors()->first()]);
        }
        if ($requestData['password'] != $requestData['password_confirmed']){
            return response()->json(['status' =>500,'msg'=> '两次密码不一致']);
        }

        try {
            $result = users::query()->create(
                [
                    'username'=>$requestData['username'],
                    'password'=>Hash::make($requestData['password']),
                    'remark'=>$requestData['remark'],
                    'role'=>$requestData['role'],
                    'show_password'=>$requestData['password'],
                ]
            );
            return response()->json(['status' =>200,'msg'=> $result]);
        } catch (QueryException $e) {
            return response()->json(['status' =>500,'msg'=> $e->getMessage()]);
        }
    }

    public function userdel(Request $request){

        $id = $request->input('id');
        $info = users::query()->where('id',$id)->first();
        if (empty($info)){
            return response()->json(['status'=>500,'msg'=>'数据不存在或参数错误']);
        }
        if ($info->delete()){
            return response()->json(['status'=>200,'msg'=>'刪除成功']);
        }
        return response()->json(['status'=>500,'msg'=>'刪除失败']);
    }

    public function userupdatepassword(Request $request){

        $requestData = request()->all();
        $validator = Validator::make(
            $requestData,
            [
                'update_password_user_id' => 'required|string',
                'old_password' => 'required|string',
                'password' => 'required|string|min:5',
                'password_confirmed' => 'required|string',
            ],
            [
                'update_password_user_id.required' => 'id是必填项。',
                'old_password.required' => '旧密码是必填项。',
                'password.required' => '密码是必填项。',
                'password_confirmed.required' => '确认密码是必填项。',
                'password.min' => '密码长度至少为 5 个字符。',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' =>500,'msg'=> $validator->errors()->first()]);
        }
        if ($requestData['password'] != $requestData['password_confirmed']){
            return response()->json(['status' =>500,'msg'=> '两次密码不一致']);
        }

        $info = users::query()->select(['username','password','show_password'])->where('id',$requestData['update_password_user_id'])->first();
        if (empty($info)){
            return response()->json(['status'=>500,'msg'=>'数据不存在或参数错误']);
        }

        if ($info->show_password != $requestData['old_password']){
            return response()->json(['status'=>500,'msg'=>'原密码错误']);
        }

        $result = users::query()->where('id',$requestData['update_password_user_id'])->update(
            [
                'password'=>Hash::make($requestData['password']),
                'show_password'=>$requestData['password'],
            ]
        );
        if ($result){
            return response()->json(['status' =>200,'msg'=> '修改成功']);
        }
        return response()->json(['status' =>500,'msg'=> '修改失败']);
    }
}
