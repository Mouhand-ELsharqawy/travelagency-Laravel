<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\PessengerTwo;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::join('pessenger_twos','bookings.pessenger_twos_id','=','pessenger_twos.id')
        ->select('pessenger_twos.FirstName', 'pessenger_twos.LastName', 'pessenger_twos.DOB', 
        'pessenger_twos.CitizenshipCountry', 'pessenger_twos.ResidenceCountry', 
        'pessenger_twos.PassportNumber','bookings.FlightDate', 'bookings.status', 'bookings.BookingClass', 
        'bookings.SeatNumber', 'bookings.BookingPaltform')
        ->paginate(6);

        return response()->json(['Booking Data' => $bookings]);
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
            'passenger' => 'required|string', 
            'flightdate' => 'required', 
            'status' => 'required|string', 
            'bookingclass' => 'required|string', 
            'seatnumber' => 'required|string', 
            'paltform' => 'required|string' 
        ]);

        $passengerId = PessengerTwo::where('pessenger_twos.PassportNumber',$request->passenger)->first()->id;

        Booking::create([
            'pessenger_twos_id' => $passengerId, 
            'FlightDate' => $request->flightdate, 
            'status' => $request->status, 
            'BookingClass' => $request->bookingclass, 
            'SeatNumber' => $request->seatnumber, 
            'BookingPaltform' => $request->paltform
        ]);

        return response()->json('Booking Data Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::join('pessenger_twos','bookings.pessenger_twos_id','=','pessenger_twos.id')
        ->select('pessenger_twos.FirstName', 'pessenger_twos.LastName', 'pessenger_twos.DOB', 
        'pessenger_twos.CitizenshipCountry', 'pessenger_twos.ResidenceCountry', 
        'pessenger_twos.PassportNumber','bookings.FlightDate', 'bookings.status', 'bookings.BookingClass', 
        'bookings.SeatNumber', 'bookings.BookingPaltform')
        ->where('bookings.id',$id)
        ->get();

        return response()->json(['Booking Data' => $booking]);
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
            'passenger' => 'required|string', 
            'flightdate' => 'required', 
            'status' => 'required|string', 
            'bookingclass' => 'required|string', 
            'seatnumber' => 'required|string', 
            'paltform' => 'required|string' 
        ]);
        
        $passengerId = PessengerTwo::where('pessenger_twos.PassportNumber',$request->passenger)->first()->id;

        $booking = Booking::find($id);
        $booking->pessenger_twos_id = $passengerId ;
        $booking->FlightDate = $request->flightdate;
        $booking->status = $request->status;
        $booking->BookingClass = $request->bookingclass;
        $booking->SeatNumber = $request->seatnumber;
        $booking->BookingPaltform = $request->paltform;
        $booking->update;

        return response()->json('Booking Data Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return response()->json('Booking Data Deleted');
    }
}
