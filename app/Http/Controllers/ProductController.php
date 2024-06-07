<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $products = $query->paginate(3);
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
        return response()->json(['status'=>200,'msg'=>'刪除成功']);
        $info = products::query()->where('certificate_number',$certificate_number)->first();
        if (empty($info)){
            return response()->json(['status'=>500,'msg'=>'数据不存在或参数错误']);
        }
        if ($info->delete()){
            return response()->json(['status'=>200,'msg'=>'刪除成功']);
        }
        return response()->json(['status'=>500,'msg'=>'刪除失败']);
    }


    public function dataprint($certificate_number){
        $query = products::query()->where('certificate_number',$certificate_number);
        $info = $query->first();

        if  (empty($info)){
            return redirect()->route('product.list')->with('detail', '数据未找到');
        }
        $imagePath = Storage::url($info->image_path);
        $qcContent = Storage::url($info->qc_content);
var_dump($info->qc_content);
var_dump($qcContent);
        return view('product/print', compact('info','imagePath','qcContent'));

    }
}
