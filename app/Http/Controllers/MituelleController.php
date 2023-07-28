<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        $users = User::all();
        return view('mituelle.create',compact('users'));
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

        $mituelles = new Mituelle;
        $mituelles->user_id = $validatedData['user_id'];
        $mituelles->mituelle_amount = $validatedData['mituelle_amount'];
        $mituelles->mituelle_month = $validatedData['mituelle_month'];
        $mituelles->save();

        return redirect()->route('mituelles.totalmituelles')->with('success', 'mituelle record added successfully.');
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
        $users = User::with('mituelle')->get();
        foreach ($users as $user) {
            $totalmituelles = $user->mituelles->sum('mituelle_amount');
        }
        return view('mituelle.totalMituelle',compact('users','i','totalmituelles'));
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
