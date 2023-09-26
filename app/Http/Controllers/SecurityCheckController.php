<?php

namespace App\Http\Controllers;

use App\Models\PessengerOne;
use App\Models\SecurityCheck;
use Illuminate\Http\Request;

class SecurityCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $securities = SecurityCheck::join('pessenger_ones','security_checks.pessenger_ones_id','=','pessenger_ones.id')
        ->select('pessenger_ones.FirstName', 'pessenger_ones.LastName', 'pessenger_ones.DOB',
        'security_checks.CheckResult', 'security_checks.comments')
        ->paginate(6);
        return response()->json(['Security checks Data' => $securities]);
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
            'CheckResult' => 'required|string', 
            'comments' => 'required|string'
        ]);

        $passengerId = PessengerOne::where('pessenger_ones.DOB',$request->passenger)->first()->id; 

        SecurityCheck::create([
            'pessenger_ones_id' => $passengerId, 
            'CheckResult' => $request->CheckResult, 
            'comments' => $request->comments
        ]);

        return response()->json('Security Check Data Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $security = SecurityCheck::join('pessenger_ones','security_checks.pessenger_ones_id','=','pessenger_ones.id')
        ->select('pessenger_ones.FirstName', 'pessenger_ones.LastName', 'pessenger_ones.DOB',
        'security_checks.CheckResult', 'security_checks.comments')
        ->where('security_checks.id',$id)
        ->get();
        return response()->json(['Security checks Data' => $security]);
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
            'CheckResult' => 'required|string', 
            'comments' => 'required|string'
        ]);

        $passengerId = PessengerOne::where('pessenger_ones.DOB',$request->passenger)->first()->id;

        $security = SecurityCheck::find($id);

        $security->pessenger_ones_id = $passengerId;
        $security->CheckResult = $request->CheckResult;
        $security->comments = $request->comments;

        $security->update();
        return response()->json('Security Check Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $security = SecurityCheck::find($id);
        $security->delete();
        return response()->json('Security Check Data Deleted');
    }
}
