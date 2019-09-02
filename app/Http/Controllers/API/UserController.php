<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\Gate;
use Trexology\ReviewRateable\Models\Rating;
use PhpParser\Error;
use Error as GlobalError;

class UserController extends Controller
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
        // $this->authorize('isAdmin');
        if(\Gate::allows('isAdmin') || \Gate::allows('isDeveloper')){
            return User::latest()->paginate(20);
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
            'email' => 'required|string|max:191|unique:users',
            'password' => 'required|string|min:6',
        ]);

        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'bio' => $request['bio'],
            'address' => $request['address'],
            'photo' => $request['photo'],
            'password' => Hash::make($request['password'])
        ]);
    }

    public function mechanic(){
        return User::where('type', 'Mechanic')->latest()->paginate(20);
    }
    public function allMechanics(){
        return User::where('type', 'Mechanic')->latest()->get();
    }
    public function rateMechanic($id,Request $request){
        $user = auth('api')->user();
        $mechanic = User::find($id);

        $rating = $mechanic -> rating([
            // 'title' => 'Some title',
            // 'body' => 'Some body', //optional
            'anonymous' => 1, //optional
            'rating' => $request['rate'],
        ], $user);
        // $average = $mechanic->averageRating();
        $request->merge(['averageRating' => $mechanic->averageRating()]);
        $request->merge(['reviews' => $mechanic->countRating()]);
        $mechanic->update($request->all());

        dd($rating);
    }
    public function updateRateMechanic($id, $rating_id){
        $mechanic = User::find($id);
        $rating = $mechanic->updateRating(20, [
            'title' => '',
            'body' => '', //optional
            'anonymous' => 1, //optional
            'rating' => 2,
        ]);
        dd($rating);

    }
    public function mechanicRatings(){
        // $mechanic = User::where('type', 'mechanic')->all();
        if(\Gate::allows('isAdmin') || \Gate::allows('isDeveloper')){
            return Rating::latest()->get();
        }
    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();

        $currentPhoto = $user->photo;

        if($request->photo  != $currentPhoto){

            // Code to take only the extension of the files
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('img/profile/').$name);

            $request->merge(['photo' => $name]);

            $userPhoto = public_path('img/profile/').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }

        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $user->update($request->all());
        return ['message' => "Success"];
    }

    public function profile()
    {
        return auth('api')->user();
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
        $user = User::findOrFail($id);

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6',
        ]);

        $user->update($request->all());

        return ['message' => 'Updated the user info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');

        $user = User::findOrFail($id);

        // delete the user

        $user->delete();


        return ['message' => 'User Deleted'];
    }

    public function search(){

        if($search = \Request::get('q')){
            $users = User::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                ->orWhere('email','LIKE',"%$search%")
                ->orWhere('type','LIKE',"%$search%");
            })->paginate(10);
        }else {
            $users = User::latest()->paginate(10);
        }

        return $users;
    }
}
