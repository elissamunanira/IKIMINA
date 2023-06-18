<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User;
use App\Models\Mituelle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class MituelleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mituelle.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'mituelle_amount' => 'required|numeric|min:0',
            'mituelle_month' => 'required|date',
        ]);

        $savings = new Saving;
        $savings->user_id = $validatedData['user_id'];
        $savings->amount = $validatedData['mituelle_amount'];
        $savings->month = $validatedData['mituelle_month'];
        $savings->save();

        return redirect()->route('savings.totalSavings')->with('success', 'mituelle record added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showMituelles(User $user)
    {
        $i = 0;
        $mituelles = Mituelle::where('user_id', $user->id)->get();
        return view('mituelles.index', compact('user', 'mituelles','i'));
    }


    //total mituelle for single user

     public function singleTotalMituelles(){

        $i=0;
        $users = User::with('mituelles')->get();
        return view('mituelle.totalMituelle',compact('users','i'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('mituelle.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
