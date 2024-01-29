<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Metadata\Uses;


class AuthController extends Controller
{
    public function register(Request $request){
        $fileds = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'tel' => 'required|string',
            'address' => 'required|string',
            'role' => 'required|integer',
            
        ]);

        $user = user::create([
            'name' => $fileds['name'],
            'email' => $fileds['email'],
            'password' => bcrypt($fileds['password']),
            'tel' => $fileds['tel'] ,
            'address' => $fileds['address'] ,
            'role' => $fileds['role'] ,
        ]);

        $token = $user-> createToken($request->userAgent(),[$fileds['role']])->plainTextToken; 
        
        $reponse =[
            'user'=> $user,
            'token'=> $token
        ];
        
        return response($reponse,201);
    }
    public function login(Request $request){ 
        $fields =$request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = User::where('email',$fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Invalid Login',
            ],401);
        } else { 
            $user->tokens()->delete();
            $token = $user->createtoken($request->userAgent(),["$user->role"])->plainTextToken;
            
            $response = [
                'user' =>$user,
                'token' =>$token,
            ];

            return response($response, 200);
        }
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response([
            'massage' => 'Logged Out'
        ], 200);
    }









}
