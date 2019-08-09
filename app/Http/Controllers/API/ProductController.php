<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\Http\Controllers\API\BrandController;
use Laravel\Passport\Bridge\User;

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
        if(\Gate::allows('isAdmin') || \Gate::allows('isDeveloper') || \Gate::allows('isMechanic') || \Gate::allows('isUser')){
            return Product::with('user', 'category', 'subcategory', 'brand')->latest()->paginate(20);
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
            'price' => 'required'
        ]);



        if($request->photo1 != ''){
            $photo1 = 'photo1-' . time().'.' . explode('/', explode(':', substr($request->photo1, 0, strpos($request->photo1, ';')))[1])[1];
            \Image::make($request->photo1)->save(public_path('img/productImage/').$photo1);
        }else{
            $request->photo1 = 'product-placeholder.jpg';
            $photo1 = $request->photo1;
        }

        if($request->photo2 != ''){
            $photo2 = 'photo2-' . time().'.' . explode('/', explode(':', substr($request->photo2, 0, strpos($request->photo2, ';')))[1])[1];
            \Image::make($request->photo2)->save(public_path('img/productImage/').$photo2);
        }else{
            $request->photo2 = 'product-placeholder.jpg';
            $photo2 = $request->photo2;
        }

        if($request->photo3 != ''){
            $photo3 = 'photo3-' . time().'.' . explode('/', explode(':', substr($request->photo3, 0, strpos($request->photo3, ';')))[1])[1];
            \Image::make($request->photo3)->save(public_path('img/productImage/').$photo3);
        }else{
            $request->photo3 = 'product-placeholder.jpg';
            $photo3 = $request->photo3;
        }

        if($request->photo4 != ''){
        $photo4 = 'photo4-' . time().'.' . explode('/', explode(':', substr($request->photo4, 0, strpos($request->photo4, ';')))[1])[1];
        \Image::make($request->photo4)->save(public_path('img/productImage/').$photo4);
        }else{
            $request->photo4 = 'product-placeholder.jpg';
            $photo4= $request->photo4;
        }







        // $userId = auth('api')->user()->id;

        // $photo1 = $request->photo1;
        // $photo2 = $request->photo2;
        // $photo3 = $request->photo3;
        // $photo4 = $request->photo4;

        // For updating photo
        // $photo1 = $request->merge(['photo_main' => $photo1]);
        // $photosecond = $request->merge(['photo_second' => $photoSecond]);
        // $photolast = $request->merge(['photo3' => $photo3]);

        return Product::create([
            'user_id' => auth('api')->user()->id,
            'category_id' => $request['category_id'],
            'sub_category_id' => $request['sub_category_id'],
            'brand_id' => $request['brand_id'],
            'name' => $request['name'],
            'price' => $request['price'],
            'model' => $request['model'],
            'colour' => $request['colour'],
            'transmission' => $request['transmission'],
            'fuel_type' => $request['fuel_type'],
            'year' => $request['year'],
            'size' => $request['size'],
            'email' => $request['email'],
            'address' => $request['address'],
            'description' => $request['description'],
            'photo1' => $photo1,
            'photo2' => $photo2,
            'photo3' => $photo3,
            'photo4' => $photo4,

        ]);
        // return User::create([

        // ]);
    }

    public function allProducts() {
        if(\Gate::allows('isAdmin') || \Gate::allows('isDeveloper') || \Gate::allows('isMechanic') || \Gate::allows('isUser')){
            return Product::with('user', 'category', 'subcategory', 'brand')->latest();
        }
    }

    public function myProducts(){
        $user = auth('api')->user()->id;
        if(auth('api')->user()){
            return Product::where('user_id', $user)->latest()->paginate(20);
        }
        // return auth('api')->user();
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
        $product = Product::findOrFail($id);

        $this->validate($request,[
            'name' => 'required|string|max:191',
        ]);

        $product->update($request->all());

        return ['message' => 'Updated the product info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth('api')->user();

        if($user){
            $this->authorize('isAdminORDeveloper');

            $product = Product::findOrFail($id);

            // delete the user

            $product->delete();
        }
        // Product::get()

        return ['message' => 'User Deleted'];
    }

    public function search(){

        if($search = \Request::get('q')){
            $products = Product::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                ->orWhere('category_id','LIKE',"%$search%")
                ->orWhere('sub_category_id','LIKE',"%$search%");
            })->paginate(10);
        }else {
            $products = Product::latest()->paginate(10);
        }

        return $products;
    }

    // public function brandsItem(Request $name){
    //     $brand = BrandControllers($name);
    //     // $brandName = Brand::fildORFail($name);

    //     return $brand;
    // }
}
