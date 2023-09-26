<?php

namespace App\Http\Controllers;

use App\Models\PessengerOne;
use Illuminate\Http\Request;

class Passenger1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passengers = PessengerOne::paginate(6);
        return response()->json(['Passenger Data One' => $passengers]);
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
            'firstname' => 'required|string', 
            'lastname' => 'required', 
            'dob' => 'required'
        ]);
        PessengerOne::create([
            'FirstName' => $request->firstname, 
            'LastName' => $request->lastname, 
            'DOB' => $request->dob
        ]);
        return response()->json('Passenger Data Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $passenger = PessengerOne::find($id);
        return response()->json(['Passenger Data One' => $passenger]);
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
            'firstname' => 'required|string', 
            'lastname' => 'required', 
            'dob' => 'required'
        ]);
        $passenger = PessengerOne::find($id);
        $passenger-> FirstName = $request->firstname;
        $passenger->LastName = $request->lastname;
        $passenger->DOB = $request->dob;
        $passenger->update();
        return response()->json('Passenger Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $passenger = PessengerOne::find($id);
        $passenger->delete();
        return response()->json('Passenger Data Deleted');
    }
}
