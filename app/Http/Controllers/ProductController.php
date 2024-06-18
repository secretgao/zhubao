<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){

        $search = $request->input('certificate_number');
        $query = products::query();

        if ($search){
            $query->where('certificate_number',$search);
        }
        $query->orderby('id','desc');
        $products = $query->paginate(5);
        return view('product/index', compact('products'));
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
        return view('product/edit', compact('info','imagePath'));
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
}
