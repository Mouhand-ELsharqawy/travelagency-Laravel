<?php

namespace App\Http\Controllers;

use App\Models\NoFlyList;
use App\Models\PessengerOne;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class NoFlyListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noflylist = NoFlyList::join('pessenger_ones','no_fly_lists.pessenger_ones_id','=','pessenger_ones.id')
        ->select('pessenger_ones.FirstName', 'pessenger_ones.LastName','no_fly_lists.ActiveFrom',
         'no_fly_lists.ActiveTo', 'no_fly_lists.reason')
        ->paginate(6);

        return response()->json(['Number Of Flight lists' => $noflylist ]);
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
            'activefrom' => 'required|string', 
            'activeto' => 'required|string', 
            'reason' => 'required|string', 
            'passenger' => 'required|string'
        ]);
        $passengerId = PessengerOne::where('pessenger_ones.FirstName',$request->passenger)
        ->first()->id;

        NoFlyList::create([
            'ActiveFrom' => $request->activ, 
            'ActiveTo' => $request->activeto , 
            'reason' => $request->reason, 
            'pessenger_ones_id' => $passengerId
        ]);

        return response()->json('No Fly List Data Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $noflylist = NoFlyList::join('pessenger_ones','no_fly_lists.pessenger_ones_id','=','pessenger_ones.id')
        ->select('pessenger_ones.FirstName', 'pessenger_ones.LastName','no_fly_lists.ActiveFrom',
         'no_fly_lists.ActiveTo', 'no_fly_lists.reason')
         ->where('no_fly_lists.id',$id)
         ->get();

         return response()->json([' Fly List One ' => $noflylist]);
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
            'activefrom' => 'required|string', 
            'activeto' => 'required|string', 
            'reason' => 'required|string', 
            'passenger' => 'required|string'
        ]);
        $passengerId = PessengerOne::where('pessenger_ones.FirstName',$request->passenger)
        ->first()->id;
        $noflylist = NoFlyList::find($id);

        $noflylist->ActiveFrom = $request->activefrom;
        $noflylist->ActiveTo = $request->activeto;
        $noflylist->reason = $request->reason;
        $noflylist->pessenger_ones_id = $passengerId;
        $noflylist->update();

        return response()->json('No Fly Data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $noflylist = NoFlyList::find($id);
        $noflylist->delete();
        return response()->json('No Fly Data deleted');
    }
}
