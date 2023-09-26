<?php

namespace App\Http\Controllers;

use App\Models\BaggageCheck;
use App\Models\Booking;
use App\Models\PessengerOne;
use Illuminate\Http\Request;

class BaggageCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baggagechecks = BaggageCheck::join('bookings','baggage_checks.bookings_id','=','bookings.id')
        ->join('pessenger_ones','baggage_checks.pessenger_ones_id','=','pessenger_ones.id')
        ->select( 'bookings.FlightDate', 'bookings.status', 'bookings.BookingClass', 
        'bookings.SeatNumber', 'bookings.BookingPaltform','baggage_checks.CheckResult',
        'pessenger_ones.FirstName', 'pessenger_ones.LastName')
        ->paginate(6);
        return response()->json(['Baggage Check' => $baggagechecks]);
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
            'check' => 'required|string', 
            'booking' => 'required|string', 
            'passenger' => 'required|string'
        ]);

        $bookingId = Booking::where('bookings.SeatNumber',$request->booking)->first()->id;
        $passengerId = PessengerOne::where('pessenger_ones.FirstName',$request->passenger)->first()->id;

        BaggageCheck::create([
            'CheckResult' => $request->check, 
            'bookings_id' => $bookingId, 
            'pessenger_ones_id' => $passengerId
        ]);

        return response()->json('Passenger data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $baggagecheck = BaggageCheck::join('bookings','baggage_checks.bookings_id','=','bookings.id')
        ->join('pessenger_ones','baggage_checks.pessenger_ones_id','=','pessenger_ones.id')
        ->select( 'bookings.FlightDate', 'bookings.status', 'bookings.BookingClass', 
        'bookings.SeatNumber', 'bookings.BookingPaltform','baggage_checks.CheckResult',
        'pessenger_ones.FirstName', 'pessenger_ones.LastName')
        ->where('baggage_checks.id',$id)
        ->get();
        return response()->json(['Baggage Check data' => $baggagecheck]);
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
            'check' => 'required|string', 
            'booking' => 'required|string', 
            'passenger' => 'required|string'
        ]);

        $bookingId = Booking::where('bookings.SeatNumber',$request->booking)->first()->id;
        $passengerId = PessengerOne::where('pessenger_ones.FirstName',$request->passenger)->first()->id;

        $baggagecheck = BaggageCheck::find($id);
        $baggagecheck->CheckResult = $request->check;
        $baggagecheck->bookings_id = $bookingId;
        $baggagecheck->pessenger_ones_id = $passengerId;
        $baggagecheck->update();


        return response()->json('Passenger data updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baggagecheck = BaggageCheck::find($id);
        $baggagecheck->delete();
        return response()->json('Passenger data deleted');
    }
}
