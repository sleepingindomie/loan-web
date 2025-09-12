<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanApplicationController extends Controller
{
    /**
     * Show the loan application form.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('loan-application.form');
    }

    /**
     * Store a new loan application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1000',
            'tenure' => 'required|numeric|min:1',
            'purpose' => 'required|string',
        ]);

        $loanApplication = LoanApplication::create([
            'amount' => $validatedData['amount'],
            'tenure' => $validatedData['tenure'],
            'purpose' => $validatedData['purpose'],
            'status' => 'pending',
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('borrower.loans')->with('success', 'Your loan application has been submitted successfully!');
    }

    /**
     * Show the borrower's loan applications.
     *
     * @return \Illuminate\View\View
     */
    public function showLoans()
    {
        // Only fetch loan applications for the currently logged-in user
        $loanApplications = LoanApplication::where('user_id', Auth::id())->get();
        return view('loan-application.show-loans', compact('loanApplications'));
    }
}
