<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Gate::allows('isAdmin') || \Gate::allows('isAuthor')){
            return Product::latest()->paginate(20);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
        ]);

        $photoMain = 'product-main' . time().'.' . explode('/', explode(':', substr($request->photo_main, 0, strpos($request->photo_main, ';')))[1])[1];
        $photoSecond = 'product-second' . time().'.' . explode('/', explode(':', substr($request->photo_second, 0, strpos($request->photo_second, ';')))[1])[1];
        $photoLast = 'product-last' . time().'.' . explode('/', explode(':', substr($request->photo_last, 0, strpos($request->photo_last, ';')))[1])[1];

        \Image::make($request->photo_main)->save(public_path('img/productImage/').$photoMain);
        \Image::make($request->photo_second)->save(public_path('img/productImage/').$photoSecond);
        \Image::make($request->photo_last)->save(public_path('img/productImage/').$photoLast);


        // For updating photo
        // $photomain = $request->merge(['photo_main' => $photoMain]);
        // $photosecond = $request->merge(['photo_second' => $photoSecond]);
        // $photolast = $request->merge(['photo_last' => $photoLast]);

        return Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'size' => $request['size'],
            'category' => $request['category'],
            'category_type' => $request['category_type'],
            'email' => $request['email'],
            'address' => $request['address'],
            'description' => $request['description'],
            'photo_main' => $photoMain,
            'photo_second' => $photoSecond,
            'photo_last' => $photoLast,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(){

        if($search = \Request::get('q')){
            $products = Product::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%");
                // ->orWhere('','LIKE',"%$search%")
                // ->orWhere('type','LIKE',"%$search%");
            })->paginate(10);
        }else {
            $products = Product::latest()->paginate(10);
        }

        return $products;
    }
}
