<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('dashboard.admin.index');
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
