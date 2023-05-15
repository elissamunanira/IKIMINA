<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rule;
use App\Models\Penalty;
use Illuminate\Support\Facades\DB;

class PenaltyController extends Controller
{
    public function index()
    {
        $i = 0;
        $penalties = Penalty::with(['user', 'rule'])->orderBy('created_at', 'desc')->get();
        return view('penalties.index', compact('penalties','i'));
    }

    public function create()
    {
        $users = user::all();
        $rules = Rule::all();
        return view('penalties.create', compact('users', 'rules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rule_id' => 'required|exists:rules,id',
            'description' => 'required', 
        ]);

        $penalty = Penalty::create($validated); 

        return redirect()->route('penalties.index')->with('success','New Penalty created successfully');
    }

    public function edit( $id){ 
        // $users = User::find($id);
        $penalty = Penalty::with(['rule','user'])->find($id);
        $rules = Rule::pluck('name', 'id');
        $users = User::select(DB::raw("CONCAT(firstname, ' ', lastname) AS full_name"), 'id')->pluck('full_name', 'id');
        return view('penalties.edit', compact('penalty','users','rules' ));
    }

    public function update(Penalty $penalty, Request $request){

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rule_id' => 'required|exists:rules,id',
            'description' => 'required', 
        ]);

        $penalty -> update($validated); 

        return redirect()->route('penalties.index')->with('success','Penalty updated successfully');
    }

    public function pay(Penalty $penalty)
    {
        $penalty->update(['paid' => true]);
    }
    public function destroy(Penalty $penalty){
        delete();

        return redirect()->route('penalities.index')->with('success','penalty deleted successfully');
    }
}
