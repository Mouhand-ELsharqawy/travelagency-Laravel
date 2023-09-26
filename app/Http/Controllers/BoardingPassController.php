<?php

namespace App\Http\Controllers;

use App\Models\BoardingPass;
use App\Models\Booking;
use Illuminate\Http\Request;

class BoardingPassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boardings = BoardingPass::join('bookings','boarding_passes.bookings_id','=','bookings.id')
        ->select('bookings.FlightDate', 'bookings.status', 'bookings.BookingClass', 
        'bookings.SeatNumber', 'bookings.BookingPaltform','boarding_passes.QRCode')
        ->paginate(6);
        return response()->json(['Boarding Pass Data'=> $boardings]);
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
            'code' => 'required|string', 
            'booking' => 'required|string'
        ]);

        $bookingId = Booking::where('bookings.SeatNumber',$request->booking)->first()->id;

        BoardingPass::create([
            'QRCode' => $request->code, 
            'bookings_id' => $bookingId
        ]);

        return response()->json('Boarding Pass Data Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $boarding = BoardingPass::join('bookings','boarding_passes.bookings_id','=','bookings.id')
        ->select('bookings.FlightDate', 'bookings.status', 'bookings.BookingClass', 
        'bookings.SeatNumber', 'bookings.BookingPaltform','boarding_passes.QRCode')
        ->where('boarding_passes.id',$id)
        ->get();
        return response()->json(['Boarding Pass data' => $boarding]);
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
            'code' => 'required|string', 
            'booking' => 'required|string'
        ]);

        $bookingId = Booking::where('bookings.SeatNumber',$request->booking)->first()->id;

        $boarding = BoardingPass::find($id);

        $boarding->QRCode = $request->code;
        $boarding->bookings_id = $bookingId;

        $boarding->update();

        return response()->json('Boarding Pass Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $boarding = BoardingPass::find($id);
        $boarding->delete();
        
        return response()->json('Boarding Pass Data Deleted');
    }
}
