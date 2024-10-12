<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return[
            new Middleware('auth:sanctum', only:[
                'choisePreferences',
                'updatePreferences'
            ])
        ];
    }

    /**
     * en este metodo utlilizar el metodo attach() que recibe un array para relacionar con que preferencias lo quiero relacionar 
     */
    public function choisePreferences(Request $request){
        $user = $request->user();
        $request->validate([
            'preferences'=>['required','array']
        ]);
        $user->categories()->attach($request->preferences);
        $data = [
            'message'=>'choise created succes',
            'status'=>200,
        ];
        return response()->json($data,Response::HTTP_OK);
    }

    /**
     * en esta funcion utilizar el metodo sync() para verifiacar si el que si si se ba actualizar las preferancias o va a agregar otras
     */
    public function updatePreferences(Request $request){
        $user = $request->user();
        $request->validate([
            'preferences'=>['required','array']
        ]);
        $user->categories()->sync($request->preferences);
        $data = [
            'message'=>'preferences updated success'
        ];
        return response()->json($data,Response::HTTP_OK);
    }
    
}
