<?php

namespace App\Http\Controllers;

use App\Models\AirLine;
use App\Models\AirPort;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::join('air_ports','flights.air_ports_id','=','air_ports.id')
        ->join('air_lines','flights.air_lines_id','=','air_lines.id')
        ->select('flights.DepartGate', 'flights.ArriveGate','air_lines.code', 
        'air_lines.name', 'air_lines.country', 'air_lines.description',
        'air_ports.name', 'air_ports.country', 'air_ports.state', 'air_ports.city')
        ->paginate(6);

        return response()->json(['Flights'=>$flights]);

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
            'depart' => 'required|string', 
            'arrive' => 'required|string', 
            'airline' => 'required|string', 
            'airport' => 'required|string'
        ]);   
        $airlineId = AirLine::where('air_lines.code',$request->airline)->first()->id;
        $airportId = AirPort::where('air_ports.name',$request->airport)->first()->id;

        Flight::create([
            'DepartGate' => $request->depart, 
            'ArriveGate' => $request->arrive, 
            'air_lines_id' => $airlineId , 
            'air_ports_id' => $airportId
        ]);

        return response()->json('Flight Data created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flight = Flight::join('air_ports','flights.air_ports_id','=','air_ports.id')
        ->join('air_lines','flights.air_lines_id','=','air_lines.id')
        ->select('flights.DepartGate', 'flights.ArriveGate','air_lines.code', 
        'air_lines.name', 'air_lines.country', 'air_lines.description',
        'air_ports.name', 'air_ports.country', 'air_ports.state', 'air_ports.city')
        ->paginate(6);
        return response()->json(['Flight'=>$flight]);
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
            'depart' => 'required|string', 
            'arrive' => 'required|string', 
            'airline' => 'required|string', 
            'airport' => 'required|string'
        ]);   
        $airlineId = AirLine::where('air_lines.code',$request->airline)->first()->id;
        $airportId = AirPort::where('air_ports.name',$request->airport)->first()->id;

        $flight = Flight::find($id);
        $flight->DepartGate = $request->depart;
        $flight->ArriveGate = $request->arrive;
        $flight->air_lines_id = $airlineId;
        $flight->air_ports_id = $airportId;
        $flight->update();
        return response()->json('Flight Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = Flight::find($id);
        $flight->delete();
        return response()->json('Flight Data Deleted');
    }
}
