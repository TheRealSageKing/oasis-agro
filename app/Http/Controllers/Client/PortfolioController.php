<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\v1\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        $portfolio = $currentUser->investments;
        return view('dashboard.client.portfolio.index', compact('portfolio'));
    }
}
