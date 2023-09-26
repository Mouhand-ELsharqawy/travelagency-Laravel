<?php

namespace App\Http\Controllers;

use App\Models\AirPort;
use Illuminate\Http\Request;

class AirPortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airports = AirPort::paginate(6);
        return response()->json(['air port data' => $airports]);
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
            'name' => 'required|string',
            'country' => 'required|string', 
            'state' => 'required|string', 
            'city' => 'requried|string'
        ]);
        AirPort::create([
            'name' => $request->name , 
            'country' => $request->country , 
            'state' => $request->state , 
            'city' => $request->city
        ]);
        return response()->json('air port data created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $airport = AirPort::find($id);
        return response()->json(['air port data' => $airport]);   
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
            'name' => 'required|string', 
            'country' => 'required|string', 
            'state' => 'required|string', 
            'city' => 'required|string'
        ]);
        $airport = AirPort::find($id);

        $airport->name = $request->name;
        $airport->country = $request->country;
        $airport->state = $airport->state;
        $airport->city = $request->city;
        $airport->update();

        return response()->json('air port data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $airport = AirPort::find($id);
        $airport->delete();
        return response()->json('air port data deleted');
    }
}
