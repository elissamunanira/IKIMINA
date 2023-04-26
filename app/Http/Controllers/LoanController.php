<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    public function index()
    {
        // Display the loan request form
        return view('loans.request');
    }

    public function store(Request $request)
    {
        // Store the loan request in the database
        $loan = new Loan();
        $loan->user_id = auth()->user()->id;
        $loan->amount = $request->input('amount');
        $loan->duration = $request->input('duration');
        $loan->interest_rate = $request->input('interest_rate');
        $loan->status = 'pending';
        $loan->save();

        // Redirect the user back to the loan request form with a success message
        return redirect()->back()->with('success', 'Loan request submitted successfully.');
    }


    public function create()
    {
        return view('loans.create');
    }


    public function approve(Loan $loan)
    {
        // Update the loan status to "approved"
        $loan->status = 'approved';
        $loan->save();

        // Redirect the user back to the loan requests page with a success message
        return redirect()->route('loans.requests')->with('success', 'Loan request approved successfully.');
    }

    public function reject(Loan $loan)
    {
        // Update the loan status to "rejected"
        $loan->status = 'rejected';
        $loan->save();

        // Redirect the user back to the loan requests page with a success message
        return redirect()->route('loans.index')->with('success', 'Loan request rejected successfully.');
    }
}
