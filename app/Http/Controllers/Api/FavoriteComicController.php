<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FavoriteComicController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', only: [
                'getAllComicsFavorites',
                'storeOrChoiseComicFavorite',
            ])
        ];
    }   

    public function getAllComicsFavorites(Request $request){
        $user = $request->user();
        $comicsFavorites = $user->favorites()->with(['author'])->get()->makeHidden('pivot');
        return response()->json($comicsFavorites);
    }

    public function storeOrChoiseComicFavorite(Request $request){
        $user = $request->user(); 
        $comicId = $request->comic_id;
        $isComicFavorite = $user->favorites()->where('comic_id',$comicId)->exists();
        if ($isComicFavorite) {
            $user->favorites()->detach($comicId);
            $message = "Comic eliminado de favoritos";
        } else {
            $user->favorites()->attach($comicId);
            $message = "Comic agregado a favoritos";
        }
        
        return response()->json([
            "message"=>$message,
            "status"=>200
        ]);
    }
}
