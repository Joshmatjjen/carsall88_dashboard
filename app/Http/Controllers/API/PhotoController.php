<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
// Use DB;


class PhotoController extends Controller
{
    public function profilePhoto($name){
        $path = public_path('img/profile/').$name;
        return Response::download($path);
    }

    public function servicePhoto($name){
        $path = public_path('img/Services/').$name;
        // return Response::download($path);
    }
}
