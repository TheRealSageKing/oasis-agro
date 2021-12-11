<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\v1\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        $user = User::find($currentUser->id);
        $portfolios = $user->investments;

        return view('dashboard.client.portfolio.index', compact('portfolios'));
    }
}
