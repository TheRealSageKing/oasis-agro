<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\v1\Investment;
use App\Models\v1\Package;
use App\Models\v1\PaymentHistory;
use Illuminate\Http\Request;

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
    /**
     * Show the application administrator dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $payments = PaymentHistory::where('payment_type', 'withdraw')->where('status', 'pending')->get();
        $investments = Investment::where('is_open', 1);
        $runningInvestments = $investments->get()->sum(function($q){
            return $q->pkg_amt * $q->qty;
        });
        $pendingPayments = $payments->sum(function($q){
            return $q->amount;
        });
        $customerCount = User::whereHas('roles', function ($u){
            $u->where('name', 'client');
        })->count();
        $paymentCount = $payments->count();
        $investmentCount = $investments->count();
        $packageCount = Package::all()->count();

        return view('dashboard.admin.index', [
            'running_investments' => $runningInvestments,
            'pending_payments' => $pendingPayments,
            'customer_count' => $customerCount,
            'payment_count' => $paymentCount,
            'investment_count' => $investmentCount,
            'package_count' => $packageCount
        ]);
    }

    /**
     * Show the application super admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function super()
    {
        return view('dashboard.admin.super');
    }
}
