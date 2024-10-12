<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller implements HasMiddleware
{

    public static function middleware() : array {
        return [
            new Middleware('auth:sanctum', only:[
                'user',
                'logout'
            ])
        ];
    }

    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:8']
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'message' => 'Estas credenciales no coinciden con nuestros registros'
            ]);
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'accessToken' => $token,
            'token_type'=>'Bearer'
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    public function register(Request $request){
        $request->validate([
            'name'=>['required', 'string'],
            'email'=>['required', 'email', 'unique:users'],
            'password'=>['required','string','min:8','confirmed']
        ]);  
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        $data = [
            'accessToken'=>$token,
            'token_type'=>'Bearer'
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    public function user(Request $request){
        return $request->user();
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}
