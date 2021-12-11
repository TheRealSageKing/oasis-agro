<?php

namespace App\Http\Controllers;

use App\Mail\NotifyInvestorOfNewInvestment;
use App\Models\User;
use App\Models\v1\Investment;
use App\Models\v1\Package;
use App\Models\v1\PaymentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Unicodeveloper\Paystack\Paystack;

class PaymentGatewayController extends Controller
{
    public function redirectToGateway(){
        try{
            return paystack()->getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            Log::info($e);
            return redirect()->back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    public function handleGatewayCallback(){
        try{
            $paymentDetails = paystack()->getPaymentData();
            $data = $paymentDetails['data'];

            $currentUser = Auth::user();

            $transaction = PaymentHistory::where('reference', $data['reference'])->get();
            if ($transaction)
            {
                redirect()->route('client.investments.index')->with('success', 'Payment was successful');
            }

            if ( $data['status'] != 'success')
            {
                throw new \Exception('Payment was not successful. Please try again');
            }

            DB::beginTransaction();
            $payment = PaymentHistory::create([
                'user_id' => $currentUser->id,
                'amount' => $data['amount'] / 100,
                'payment_type' => 'deposit',
                'status' => 'completed',
                'reference' => $data['reference'],
                'channel' => $data['channel']
            ]);

            $package = Package::find($data['metadata']['uuid']);
            if (!$package)
                throw new \Exception('Investment Package is currently not available');

            $currentDate = Carbon::now();
            $maturityDate = $currentDate->addDays($package->duration );

            $paidAmt = $data['amount']/100;
            $qty = $paidAmt / $package->amount;

            $investment = Investment::create([
                'package_id' => $package->id,
                'qty' => $qty,
                'pkg_amt' => $package->amount,
                'user_id' => $currentUser->id,
                'duration' => $package->duration,
                'roi' => $package->roi,
                'is_open' => 1,
                'maturity_date' => $maturityDate,
            ]);


            User::where('id', $currentUser->id)->update([
                'ledger' => $currentUser->ledger + $paidAmt
            ]);

            DB::commit();

            //Email user of succesful investment here and details of investment.
            Mail::to($currentUser->email)->send(new NotifyInvestorOfNewInvestment($currentUser, $investment));
            return redirect()->route('client.investments.index')->with('success', 'Payment was successful');

        }catch (\Exception $ex)
        {
            Log::error($ex);
            DB::rollBack();
            return redirect()->route('client.investments.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
