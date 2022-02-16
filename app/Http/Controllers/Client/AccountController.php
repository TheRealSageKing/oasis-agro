<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('dashboard.client.account.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAccountRequest $request)
    {
        try {
            $user = Auth::user();
            $account = User::find($user->id);

            if (!$account)
                throw new \Exception('Account does not exist');

            $account->phone = $request->phone;
            $account->bank = $request->bank;
            $account->account_no = $request->acc_no;
            $account->account_name = $request->acc_name;

            $account->save();

            return redirect()->back()->with('success','Account was updated successfully');
        }catch (\Exception $ex)
        {
            return redirect()->back()->withErrors(['message' => $ex->getMessage()]);
        }
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {
            $user = Auth::user();
            $account = User::find($user->id);

            if (!$account)
                throw new \Exception('Account does not exist');

            if ($request->password != $request->confirm_password)
                throw new \Exception('Password does not match');

            $account->password = Hash::make($request->new_password);
            $account->save();

            return redirect()->back()->with('success',  'Password was changed successfully');
        }catch (\Exception $ex)
        {
            return redirect()->back()->withErrors(['message' => $ex->getMessage()]);
        }
    }
}
