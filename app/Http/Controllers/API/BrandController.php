<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Brand;

class BrandController extends Controller
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
        if(\Gate::allows('isAdmin') || \Gate::allows('isDeveloper')){
            return Brand::orderBy('id')->paginate(20);
        }
    }

    public function allBrands(){
        return Brand::all();
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
            'logo' => 'required|string|max:20',
        ]);

        return Brand::create([
            'name' => $request['name'],
            'logo' => $request['logo'],
            'type' => $request['type'],
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
            $brands = Brand::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%");
                // ->orWhere('','LIKE',"%$search%");
                // ->orWhere('type','LIKE',"%$search%");
            })->paginate(10);
        }else {
            $brands = Brand::latest()->paginate(10);
        }

        return $brands;
    }
}
