<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\v1\Investment;
use App\Models\v1\Package;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index(){
        $packages = Package::where('is_active', 1)->get();
        return view('dashboard.client.investment.index', compact('packages'));
    }

    public function show(Investment $investment){
        return view('dashboard.client.investment.detail', compact('investment'));
    }
}
