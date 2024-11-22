<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Carbon;

class BookingController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return [
            new Middleware('auth:sanctum', only:[
                'index',
                'store',
            ])
        ];
    }

    public function index(Request $request) {
    $user = $request->user();
    $bookings = $user->comics()
                    ->with(['author'])
                     ->wherePivot('returned', false)
                     ->get();

    return response()->json($bookings);
}
    
    public function store(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'comic_id' => 'required',
        ]);
        $isBooking = $user->comics()->where('comic_id',$request->comic_id)->exists();
        if ($isBooking) {
            $user->comics()->detach($request->comic_id);
            $message = "Comic eliminado de las reservas";
        } else {
            // Obtener la fecha final sumando 10 días a booking_date
            $finalDate = Carbon::parse(date('Y-m-d'))->addDays(10);
            // Asociar el usuario con el cómic
            $user->comics()->attach($request->comic_id, [
                'booking_date' => date('Y-m-d'),
                'final_date' => $finalDate,
                'returned' => false,
            ]);
            $message = "Comic agregadi a las reservas";
        }
        return response()->json(['message' => $message], 201);
    }
}
