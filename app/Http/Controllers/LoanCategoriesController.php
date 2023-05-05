<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanCategoriesController extends Controller
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
        'interest_rate' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
    ]);

    $loanCategory = new LoanCategory();
    $loanCategory->name = $validatedData['name'];
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
        //
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
