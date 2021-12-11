<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PackageRequest;
use App\Http\Requests\admin\PackageUpdateRequest;
use App\Models\v1\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buyPackage($id){
        try{
            $package = Package::find($id);
            return view('dashboard.client.package.buypackage', compact('package'));
        }catch(\Exception $ex)
        {
            return redirect()->back()->withErrors(['msg' => $ex->getMessage()]);
        }
    }

}
