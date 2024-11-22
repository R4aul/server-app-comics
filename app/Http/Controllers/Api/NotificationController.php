<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Booking;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class NotificationController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return [
            new Middleware('auth:sanctum', only:[
                'notifications',
            ])
        ];
    }
    public function notifications(Request $request)
    {
        $user = $request->user();
        $today = Carbon::now();
        $comicsExpiring = Booking::with('comic')
            ->where('user_id', $user->id)
            ->where('returned', false) // Solo reservas activas
            ->whereBetween('final_date', [$today, $today->copy()->addDays(3)])
            ->get();

        // Notificaciones: Cómics reservados recientemente
        $recentBookings = Booking::with('comic')
            ->where('user_id', $user->id)
            ->whereDate('booking_date', '>=', $today->copy()->subWeek()) // Reservados la última semana
            ->get();

        return response()->json([
            'expiring_comics' => $comicsExpiring,
            'recent_bookings' => $recentBookings,
        ]);
    }
}
