<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;
use App\Models\LoanCategory;

class LoanController extends Controller
{
     public function index()
    {
        // $user = User::all();
        $loans = Loan::with('user')->get();
        // $interest = $this->amount * $this->interest_rate * $this->duration / 12;
        return view('loans.index', compact('loans'));
    }

    public function store(Request $request)
    {
        // $branch_id=$request->branch_name;
        // // dd($branch_id);
        // $branch_details = Branch::find($branch_id);
        // $branch_name= $branch_details->branch_name;
        // $post = new Post();
        // $post->branch_name=$branch_name;

        // Store the loan request in the database
        $category_id = $request->category;
        $category_details = LoanCategory::find($category_id);
        $loanCategory = $category_details->name;
        $loan = new Loan();
        $loan->category = $loanCategory;
        $loan->user_id = auth()->user()->id;
        $loan->amount = $request->input('amount');
        // $loan->duration = $request->input('duration');
        // $loan->interest_rate = $request->input('interest_rate');
        $loan->status = 'pending';
        $loan->save();
        $loan->loanCategory()->attach($category_id);

        // Redirect the user back to the loan request form with a success message
        return redirect()->back()->with('success', 'Loan request submitted successfully.');
    }


    public function create()
    {

        $categories = LoanCategory::all();
        $users = User::all();
        return view('loans.create',compact('users','categories'));
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


    public function show($id)
    {
        $loan = Loan::findOrFail($id);

        return view('loans.show', compact('loan'));
    }


    public function edit($id){

        $loan = Loan::find($id);
        return view('loans.edit',compact('loan'));

    }

    public function update(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = $request->input('status');
        $loan->save();

        return redirect()->route('loans.show', ['id' => $loan->id]);
    }

    public function calculateInterest()
    {
        $interest = $this->principal * $this->interest_rate * $this->duration / 12;
        return view ('loans.index',compact('interest'));
    }

}
