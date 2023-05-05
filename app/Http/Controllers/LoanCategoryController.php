<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;
use App\Models\LoanCategory;

class LoanCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        $loanCategories = LoanCategory::all();
        return view('loan_categories.index', compact('loanCategories'));
    }

    public function create()
    {
        return view('loan_categories.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
        'name' => 'required|string',
        'principal' => 'required|numeric',
        'interest_rate' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
    ]);

    $loanCategory = new LoanCategory();
    $loanCategory->name = $validatedData['name'];
    $loanCategory->principal = $validatedData['principal'];
    $loanCategory->interest_rate = $validatedData['interest_rate'];
    $loanCategory->duration = $validatedData['duration'];
    $loanCategory->save();

    return redirect()->route('loan_categories.index')->with('success', 'Loan category created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $loanCategory = LoanCategory::find($id);
        return view('loan_categories.edit',compact('loanCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $loanCategory = LoanCategory::find($id);
        $loanCategory->name = $request->input('name');
        $loanCategory->principal = $request->input('principal');
        $loanCategory->interest_rate = $request->input('interest_rate');
        $loanCategory->duration = $request->input('duration');
        $loanCategory->save();

        return redirect('/loan-categories')->with('success', 'Loan category updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
