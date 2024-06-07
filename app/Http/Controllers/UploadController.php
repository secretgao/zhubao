<?php

namespace App\Http\Controllers;


use App\Models\products;
use App\Utils\CommonUtil;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UploadController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(){

        $certificateNumber = CommonUtil::generateCertificateNumber();
        $queryCode = CommonUtil::generateQueryCode();
        // 生成二维码的内容，可以是随机字符串或其他信息
        $content = CommonUtil::generateQcContent($certificateNumber,$queryCode);
        $filename = $content.time().'.png';
        $url = route('product.detail', ['filename' =>$filename,'detail'=>$certificateNumber]);

        // 生成二维码并保存到存储中
        QrCode::format('png')->size(200)->generate($url, storage_path("app/public/{$filename}"));
        $qcurl = Storage::url($filename);
        return view('upload/index', compact('certificateNumber','queryCode','qcurl'));
    }


    public function upload(){


        $requestData = request()->all();

        $validator = Validator::make(
            $requestData,
            [
                'certificate_number'=>'required',
                'query_code'=>'required',
                'declaration_name'=>'required',
                'product_shape'=>'required',
                'sample_quality'=>'required',
                'amplification'=>'required',
                'detection'=>'required',
                'detection_1'=>'required',
                'image_path'=>'required',
                'qc_content'=>'required',
            ],
            [
                'certificate_number.required' => '证书编号:[:attribute]必传',
                'query_code.required' => '查询编码:[:attribute]必传',
                'declaration_name.required' => '申报名称:[:attribute]必传',
                'product_shape.required' => '产品形状:[:attribute]必传',
                'sample_quality.required' => '样品质量:[:attribute]必传',
                'amplification.required' => '放大检测:[:attribute]必传',
                'detection.required' => '检测结果:[:attribute]必传',
                'detection_1.required' => '检测结果:[:attribute]必传',
                'image_path.required' => '上传图片:[:attribute]必传',
                'qc_content.required' => 'qc:[:attribute]必传',
            ],

        );

        if ($validator->fails()) {
            return response()->json(['status' =>500,'msg'=> $validator->errors()->first()]);
        }

        try {
            $result = products::query()->create($requestData);
            return response()->json(['status' =>200,'msg'=> $result]);
        } catch (QueryException $e) {
            return response()->json(['status' =>500,'msg'=> $e->getMessage()]);
        }
    }


    public function file(Request $request){

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // 文件是通过这个方法被存储的，默认存储到 storage/app/public/ 目录
            $path = $file->store('uploads', 'public');
            // 返回文件存储路径
            return response()->json(['path' => $path,'status'=>200]);
        }

        return response()->json(['msg' => 'No file received','status'=>500]);

    }

}
