<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{

    public function sliderPhoto($name) {
        $path = public_path('img/sliderPhoto/').$name;
        return Response::download($path);
    }
    public function profilePhoto($name){
        $path = public_path('img/profile/').$name;
        return Response::download($path);
    }

    public function productPhoto($name){
        $path = public_path('img/productImage/').$name;
        return Response::download($path);
    }

    public function categoryLogo($name){
        $path = public_path('img/categoryLogo/').$name;
        return Response::download($path);
    }

    public function brandLogo($name){
        $path = public_path('img/BrandLogo/').$name;
        return Response::download($path);
    }

    public function servicePhoto($name){
        $path = public_path('img/Services/').$name;
        return Response::download($path);
    }
}
