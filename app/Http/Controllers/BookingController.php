<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingControllerStoreRequest;
use App\Http\Requests\BookingControllerUpdateRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('booking.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $bookings = Booking::all();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('booking.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Booking $booking)
    {
        return view('booking.edit', compact('booking'));
    }

    /**
     * @param \App\Http\Requests\BookingControllerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingControllerStoreRequest $request)
    {
        $booking = Booking::create($request->validated());

        return redirect()->route('booking.index');
    }

    /**
     * @param \App\Http\Requests\BookingControllerUpdateRequest $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(BookingControllerUpdateRequest $request, Booking $booking)
    {
        $booking->update($request->validated());

        return redirect()->route('booking.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Booking $booking)
    {
        $booking->delete();
    }
}
