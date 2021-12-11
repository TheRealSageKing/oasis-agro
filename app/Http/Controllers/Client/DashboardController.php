<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\v1\Investment;
use App\Models\v1\InvestmentHistory;
use App\Models\v1\Package;
use App\Models\v1\PaymentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**we
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentUser = Auth::user();
        $portfolioSummary = InvestmentHistory::whereHas('investment', function($q){
            $q->where('user_id', Auth::user()->id);
        })->limit(5)->orderBy('investment_id', 'desc')->get();

        $investments = Investment::where('is_open', 1)->where('user_id', $currentUser->id);

        $investmentCount = $investments->count();

        return view('dashboard.client.index', [
            'portfolioSummary'=>$portfolioSummary,
            'wallet'=>$currentUser->wallet,
            'ledger'=> $currentUser->ledger,
            'investmentCount' =>$investmentCount
        ]);
    }
}
