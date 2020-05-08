<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function authFailed(){
        return response('unauthenticated', 401);
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|max:255|min:6|confirmed'
        ]);

        if($validator->fails()){
            return response(['errors' => $validator->errors()], 422);
        }

        $user = new User();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return $this->getResponse($user);
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response(['errors' => $validator->errors()], 422);
        }

        $credentials = \request(['email', 'password']);

        if(Auth::attempt($credentials)){
             $user = $request->user();
             return  $this->getResponse($user);
        }

    }

    public function logout(Request $request){
         $request->user()->token()->revoke();
         return response('Successfully logged out',200);
    }

    public function user(Request $request){
        return $request->user();
    }

    private function getResponse(User $user){

        $tokenResult =   $user->createToken("Personal Access Token");
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();


        return  response([
            'accessToken' => $tokenResult->accessToken,
            'tokenType' => "Bearer",
            'expiresAt' => Carbon::parse($token->expires_at)->toDateTimeString()
        ],200);
    }

}
