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
class HomeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){

        return view('home/index');
    }


    public function detail($certificate_number){

        return view('product/detail', compact('info','imagePath'));
    }


    public function delete(Request $request){

    }
    public function deleteall(Request $request){

    }

    public function dataprint($certificate_number){

    }


}
