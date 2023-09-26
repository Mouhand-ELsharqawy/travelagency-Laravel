<?php

namespace App\Http\Controllers;

use App\Models\PessengerTwo;
use Illuminate\Http\Request;

class Passenger2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passengers = PessengerTwo::paginate(6);
        return response()->json(['Passenger Two Data'=>$passengers]);
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
            'FirstName' => 'required|string', 
            'LastName' => 'required|string', 
            'DOB' => 'required|string', 
            'citizen' => 'required|string', 
            'residence' => 'required|string', 
            'PassportNumber' => 'required|string'
        ]);
        PessengerTwo::create([
            'FirstName' => $request-> FirstName, 
            'LastName' => $request->LastName, 
            'DOB' => $request->DOB, 
            'CitizenshipCountry' => $request->citizen, 
            'ResidenceCountry' => $request->residence, 
            'PassportNumber' => $request->PassportNumber
        ]);

        return response()->json('Passenger Two Data Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $passenger = PessengerTwo::find($id);
        return response()->json(['Passenger Two Data'=>$passenger]);
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
            'FirstName' => 'required|string', 
            'LastName' => 'required|string', 
            'DOB' => 'required|string', 
            'citizen' => 'required|string', 
            'residence' => 'required|string', 
            'PassportNumber' => 'required|string'
        ]);

        $passenger = PessengerTwo::find($id);


        $passenger->FirstName = $request->FirstName; 
        $passenger->LastName = $request->LastName;
        $passenger->DOB = $request->DOB; 
        $passenger->CitizenshipCountry = $request->citizen;
        $passenger->ResidenceCountry = $request->residence;
        $passenger->PassportNumber = $request->PassportNumber;


        $passenger->update();

        return response()->json('Passenger Two Data Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $passenger = PessengerTwo::find($id);
        $passenger->delete();
        return response()->json('Passenger Two Data Deleted');
    }
}
