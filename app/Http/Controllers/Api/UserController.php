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
        return [
            new Middleware('auth:sanctum', only: [
                'choisePreferences',
                'updatePreferences',
                'checkFavoriteStatus',
                'getAllFavorites'
            ])
        ];
    }

    /**
     * en este metodo utlilizar el metodo attach() que recibe un array para relacionar con que preferencias lo quiero relacionar 
     */
    public function choisePreferences(Request $request)
    {
        $user = $request->user();
        
        $categoryId = $request[0]; // Supone que solo se envía una categoría en el array
        $isFavorite = $user->categories()->where('category_id', $categoryId)->exists();
        if ($isFavorite) {
            // Si ya es favorita, eliminar la relación
            $user->categories()->detach($categoryId);
            $message = 'Categoría eliminada de favoritos';
        } else {
            // Si no es favorita, agregar la relación
            $user->categories()->attach($categoryId);
            $message = 'Categoría añadida a favoritos';
        }

        return response()->json([
            'message' => $message,
            'status' => 200,
        ], Response::HTTP_OK);
    }

    /**
     * en esta funcion utilizar el metodo sync() para verifiacar si el que si si se ba actualizar las preferancias o va a agregar otras
     */
    public function updatePreferences(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'preferences' => ['required', 'array']
        ]);
        $user->categories()->sync($request->preferences);
        $data = [
            'message' => 'preferences updated success'
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    public function checkFavoriteStatus(Request $request, $id)
    {
        $user = $request->user();
        $isFavorite = $user->categories()->where('category_id', $id)->exists();
        $data = [
            'isFavorite' => $isFavorite,
            'status' => 200,
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    public function getAllFavorites(Request $request){
        $user = $request->user();
        $favorites = $user->categories()->get(); 
        return response()->json($favorites, Response::HTTP_OK);
    }
}
