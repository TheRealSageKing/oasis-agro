<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyInvestorOfNewInvestment extends Mailable
{
    use Queueable, SerializesModels;

    public $investorDetails;
    public $investmentDetails;

    /**
     * Create a new message instance.
     *
     * @param $investorDetails
     * @param $investmentDetails
     */
    public function __construct($investorDetails, $investmentDetails)
    {
        $this->investorDetails = $investorDetails;
        $this->investmentDetails = $investmentDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notification of Investment')->view('emails.new-investment-email', [
            'investment' => $this->investmentDetails,
            'investor' => $this->investorDetails
        ]);
    }
}
