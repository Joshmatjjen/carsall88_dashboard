<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{

    public function register (Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'type' => 'required|string',
            'address' => 'required|string',
            'mobileNumber' => 'required',
            'bio' => 'required|string',
            'photo' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            // 'lat' => 'required|decimal',
            // 'lng' => 'required|decimal'


        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()], 422);
        }

        $currentPhoto = $request->photo;

        // Code to take only the extension of the files
        $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

        \Image::make($request->photo)->save(public_path('img/profile/').$name);

        $request->merge(['photo' => $name]);

        $userPhoto = public_path('img/profile/').$currentPhoto;
        if(file_exists($userPhoto)){
            @unlink($userPhoto);
        }
        $request['password']=Hash::make($request['password']);
        $user = User::create($request->toArray());

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
                // if ($request->remember_me) {
                //     $token->expires_at = Carbon::now()->addWeeks(1);
                // }
        $token->save();
        Auth::login($user, true);
        return response()->json([
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'type' => Auth::user()->type,
            'photo' => Auth::user()->photo,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);


    }


    public function login (Request $request) {

        $user = User::where('email', $request->email)->first();

        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                $credentials = request(['email', 'password']);
                if(Auth::attempt($credentials))
                    $theUser =  $request->user();
                // $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                // $response = ['token' => $token];
                // $users = $request->user();
                $tokenResult = $theUser->createToken('Personal Access Token');
                $token = $tokenResult->token;
                if ($request->remember_me) {
                    $token->expires_at = Carbon::now()->addWeeks(1);
                }
                $token->save();
                return response()->json([
                    'id' => Auth::user()->id,
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'type' => Auth::user()->type,
                    'photo' => Auth::user()->photo,
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);

                // return response($response, 200);
            } else {
                $response = "Password is incorrect";
                return response()->json([
                    'message' => $response
                ], 402);
            }

        } else {
            $response = 'User does not exist';
            return response()->json([
                'message' => $response
            ], 401);
        }

        /*
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'type' => Auth::user()->type,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
        */

    }

    // public function login(Request $request) {
    //     // $request->validate([
    //     //     'email' => 'required|string|email',
    //     //     'password' => 'required|string',
    //     //     //'remember_me' => 'boolean'
    //     // ]);


    //     // $credentials = request(['email', 'password']);
    //     // $email = request(['email']);
    //     // $password = request(['password']);

    //     // $credentials = request(['email', 'password']);
    //     // if(!Auth::attempt($credentials))
    //     //     return response()->json([
    //     //         'message' => 'Unauthorized'
    //     //     ], 401);

    //     //Error messages
    //     $messages = [
    //         "email.required" => "Email is required",
    //         "email.email" => "Email is not valid",
    //         "email.exists" => "Email doesn't exists",
    //         "password.required" => "Password is required",
    //         "password.min" => "Password must be at least 6 characters"
    //     ];

    //     // validate the form data
    //     $validator = Validator::make($request->all(), [
    //             'email' => 'required|email|exists:users,email',
    //             'password' => 'required|min:6'
    //         ], $messages);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator).response()->json;
    //     } else {
    //         // attempt to log
    //         if (!Auth::attempt(['email' => $request->email, 'password' => $request->password ], $request->remember)) {
    //             // if successful -> redirect forward
    //             return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
    //                 'approve' => 'Wrong password or this account not approved yet.',
    //             ]);
    //         }

    //         // if unsuccessful -> redirect back



    //     $user = $request->user();
    //     $tokenResult = $user->createToken('Personal Access Token');
    //     $token = $tokenResult->token;
    //     if ($request->remember_me)
    //         $token->expires_at = Carbon::now()->addWeeks(1);
    //     $token->save();
    //     return response()->json([
    //         'id' => Auth::user()->id,
    //         'name' => Auth::user()->name,
    //         'email' => Auth::user()->email,
    //         'type' => Auth::user()->type,
    //         'access_token' => $tokenResult->accessToken,
    //         'token_type' => 'Bearer',
    //         'expires_at' => Carbon::parse(
    //             $tokenResult->token->expires_at
    //         )->toDateTimeString()
    //     ]);
    //     }
    // }


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
