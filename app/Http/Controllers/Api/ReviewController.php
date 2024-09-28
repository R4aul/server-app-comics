<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ReviewController extends Controller implements HasMiddleware
{
    /**
     * Controlador que adminstra la creasion y elminasion de la tabla review
     */

    public static function middleware()
    {
        return[
            new Middleware('auth:sanctum', only:[
                'createReview',
                'deleteReview'
            ])
        ];
    }

    public function createReview(Request $request){
        $user = $request->user();
        $request->validate([
            'review_text'=>['required','string'],
            'rating'=>['required'],
            'comic_id'=>['required','exists:App\Models\Comic,id']
        ]);
        Review::create([
            'review_text'=>$request->review_text,
            'rating'=>$request->rating,
            'user_id'=>$user->id,
            'comic_id'=>$request->comic_id
        ]);
        $data = [
            'message'=>'Review created success',
            'staus'=>200
        ];
        return response()->json($data);
    }

    public function deleteReview(Request $request, $id){
        $user = $request->user();
        $review = $user->review()->find($id);
        if (!$review) {
            $data = [
                'message'=>'review not found',
                'status'=>404
            ];
            return response()->json($data,404);
        }
        $review->delete();
        $data = [
            'message'=>'review deleted success',
            'status'=> 204
        ];
        return response()->json($data,204);
    }
}
