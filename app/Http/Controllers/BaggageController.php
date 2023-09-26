<?php

namespace App\Http\Controllers;

use App\Models\Baggage;
use App\Models\Booking;
use Illuminate\Http\Request;

class BaggageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baggages = Baggage::join('bookings','baggage.bookings_id','=','bookings.id')
        ->select('baggage.WeightKG', 'baggage.BaggageNumber','bookings.FlightDate', 'bookings.status', 'bookings.BookingClass', 
        'bookings.SeatNumber', 'bookings.BookingPaltform')
        ->paginate(6);
        return response()->json(['Baggage data '=> $baggages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'weight' => 'required', 
            'number' => 'required', 
            'booking' => 'required|string'
        ]);
        $bookingId = Booking::where('bookings.SeatNumber',$request->booking)->first()->id;
        Baggage::create([
            'WeightKG' => $request->weight, 
            'BaggageNumber' => $request->number,
            'bookings_id' => $bookingId
        ]);
        return response()->json('Baggage data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $baggage = Baggage::join('bookings','baggage.bookings_id','=','bookings.id')
        ->select('baggage.WeightKG', 'baggage.BaggageNumber','bookings.FlightDate', 'bookings.status', 'bookings.BookingClass', 
        'bookings.SeatNumber', 'bookings.BookingPaltform')
        ->where('baggage.id',$id)
        ->get();
        return response()->json(['baggage data' => $baggage]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'weight' => 'required', 
            'number' => 'required', 
            'booking' => 'required|string'
        ]);

        $bookingId = Booking::where('bookings.SeatNumber',$request->booking)->first()->id;

        $baggage = Baggage::find($id);
        $baggage->WeightKG = $request->weight;
        $baggage->BaggageNumber = $request->number;
        $baggage->bookings_id = $bookingId;
        $baggage->update();

        return response()->json('Baggage data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baggage = Baggage::find($id);
        $baggage->delete();
        return response()->json('Baggage data deleted');
    }
}
