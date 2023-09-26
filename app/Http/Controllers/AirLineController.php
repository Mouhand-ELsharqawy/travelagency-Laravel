<?php

namespace App\Http\Controllers;

use App\Models\AirLine;
use Illuminate\Http\Request;

class AirLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlines = AirLine::paginate(5);
        return response()->json(['air lines'=> $airlines]);
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
            'code' => 'required|string' , 
            'name' => 'required|string' , 
            'country' => 'required|string', 
            'desc' => 'required|string'
        ]);

        AirLine::create([
            'code' => $request->code , 
            'name' => $request->name , 
            'country' => $request->country , 
            'description' => $request->desc
        ]);
        return response()->json(['Air Line Data Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $airline = AirLine::find($id);
        return response()->json(['air line'=>$airline]);
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
            'name' => 'required|string', 
            'country' => 'required|string', 
            'desc' => 'required|string'
        ]);
        $airline = AirLine::find($id);
        $airline->code = $request->code; 
        $airline->name = $request-> name;
        $airline->country = $request->country;
        $airline->description = $request->desc;
        $airline->update();
        return response()->json('air line data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $airline = AirLine::find($id);
        $airline->delete();
        return response()->json('air line data deleted');
    }
}
