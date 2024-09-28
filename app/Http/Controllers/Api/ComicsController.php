<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Category;
use App\Models\Comic;
use App\Models\Booking;

class ComicsController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return [
            new Middleware('auth:sanctum', only:[
                'getAllCategories',
                'getAllComics',
                'getComicById',
                'bookingComic'
            ])
        ];
    }

    public function getAllCategories(){
        $categories = Category::all();
        return response()->json($categories); 
    }
        
    public function getAllComics(?string $comic = null){
        $comics = Comic::where('title', 'like', '%'.$comic.'%')->get();
        return response()->json($comics);
    }


    public function getComicById($id) {
       $comic = Comic::with(['author','category','reviews'])->findOrFail($id);
       return response()->json($comic); 
    }

    public function bookingComic(Request $request){
        $user = $request->user();
        $request->validate([
            'booking_date'=>['required'],
            'user_id'=> ['required', 'exists:App\Models\User,id'],
            'comic_id'=>['required', 'exists:App\Models\Users,id'],
        ]);
        Booking::create([
            'booking_date'=>$request->booking_date,
            'user_id'=>$user->id,
            'comic_id'=>$request->comic_id
        ]);
        $data = [
            'message'=>'booking created success'
        ];
        return response()->json($data);
    }
}