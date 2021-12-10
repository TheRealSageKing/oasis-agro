<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPaymentsRequest;
use App\Models\v1\PaymentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $currentUser = Auth::user();
        $wallet = $currentUser->wallet;
        $ledger = $currentUser->ledger;

        $payments = PaymentHistory::where('payment_type', 'withdraw')
            ->where('status', 'pending')
            ->where('user_id', $currentUser->id)->get();
        return view('dashboard.client.payment.index',  compact('payments', 'wallet','ledger'));
    }

    public function history(){
        $currentUser = Auth::user();
        $payments = PaymentHistory::where('user_id', $currentUser->id)->get();
        return view('dashboard.client.payment.history',  compact('payments'));
    }

    public function request(RequestPaymentsRequest $request){
        $request->validated();
        $currentUser = Auth::user();
        try{
            //check if password matches user password
            if (!Hash::check(request('password'), $currentUser->password))
                throw new \Exception('Wrong credential or password');

            //check balance in wallet...
            if ($currentUser->wallet < $request->amount)
                throw new \Exception('Insufficient Balance');

            //check if customer has a bank set
            if ( $currentUser->bank == null || $currentUser->account_no == null || $currentUser->account_name == null)
                throw new \Exception('Please set your payment details in your account section');

            $currentUser->payment_histories->create([
                'amount'=> $request->amount,
                'payment_type' => 'withdraw',
                'status' => 'pending'
            ]);

            return $this->successResponse('Request for payment was made successfully');
        }catch(\Exception $ex)
        {
            return $this->errorResponse($ex->getMessage());
        }
    }

    public function fundWallet()
    {

    }
}
