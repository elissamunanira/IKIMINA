<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;
use App\Models\payment;

class LoanPaymentController extends Controller
{

    public function index()
    {
        $i = 0;
        // $user = User::all();
        $payments = Payment::with('user')->orderBy('created_at', 'desc')->get();
        return view('loan_payments.index', compact('payments','i'));
        
    }
    public function showPaymentForm($loan){
        $users = User::all();
        $loans = Loan::all();
        return view('loan_payments.create',compact('users', 'loans'));
    }
    //
    public function recordPayment(Request $request){
        // Validate the input
        $request->validate([
            'user_id' => 'required',
            'loan_id' => 'required',
            'amount_paid' => 'required|numeric',
        ]);

        // Create a new payment record
        $payment = new Payment;
        $payment->user_id = $request->input('user_id');
        $payment->loan_id = $request->input('loan_id');
        $payment->amount_paid = $request->input('amount_paid');
        $payment->save();

        // Update the loan balance
        $loan = Loan::find($request->input('loan_id'));
        $loan->paid_amount += $request->input('amount_paid');
        $loan->save();

        return redirect()->back()->with('success', 'Payment recorded successfully');
        }
}