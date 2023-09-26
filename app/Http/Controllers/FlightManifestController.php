<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flight;
use App\Models\FlightManifest;
use Illuminate\Http\Request;

class FlightManifestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flightmanifests = FlightManifest::join('flights','flight_manifests.flights_id','=','flights.id')
        ->join('bookings','flight_manifests.bookings_id','=','bookings.id')
        ->select('flights.DepartGate', 'flights.ArriveGate', 'bookings.FlightDate', 
        'bookings.status', 'bookings.BookingClass', 'bookings.SeatNumber', 
        'bookings.BookingPaltform')
        ->paginate(6);
        return response()->json(['Flight Manifest Data' => $flightmanifests]);
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
            'booking' => 'required|string', 
            'flight' => 'required|string'
        ]);

        $bookingId = Booking::where('bookings.SeatNumber',$request->booking)->first()->id;
        $flightId = Flight::where('flights.ArriveGate',$request->flight)->first()->id;

        FlightManifest::create([
            'bookings_id' => $bookingId, 
            'flights_id' => $flightId
        ]);

        return response()->json('Flight Manifest Data Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flightmanifest = FlightManifest::join('flights','flight_manifests.flights_id','=','flights.id')
        ->join('bookings','flight_manifests.bookings_id','=','bookings.id')
        ->select('flights.DepartGate', 'flights.ArriveGate', 'bookings.FlightDate', 
        'bookings.status', 'bookings.BookingClass', 'bookings.SeatNumber', 
        'bookings.BookingPaltform')
        ->where('flight_manifests.id',$id)
        ->get();
        return response()->json(['Flight Manifest Data' => $flightmanifest]);
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
            'booking' => 'required|string', 
            'flight' => 'required|string'
        ]);

        $bookingId = Booking::where('bookings.SeatNumber',$request->booking)->first()->id;
        $flightId = Flight::where('flights.ArriveGate',$request->flight)->first()->id;
        $flightmanifest = FlightManifest::find($id);
        $flightmanifest-> bookings_id = $bookingId;
        $flightmanifest-> flights_id = $flightId;
        $flightmanifest->update();
        return response()->json('Flight Manifest Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flightmanifest = FlightManifest::find($id);
        $flightmanifest->delete();
        return response()->json('Flight Manifest Data Deleted');
    }
}
