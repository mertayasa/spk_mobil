<?php

namespace App\Http\Middleware;

use App\Models\Booking;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $booking = Booking::where('status', 'booking_baru')->get();
            $now = Carbon::now();
            
            foreach($booking as $book){
                if($now >= $book->created_at && $now->diffInMinutes($book->created_at) >= 1440){
                    $book->status = 'expired';
                    $book->save();
                }
            }
                
        }
        
        return $next($request);
    }
}
