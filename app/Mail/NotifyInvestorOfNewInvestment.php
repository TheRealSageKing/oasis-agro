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
        $this->investmentDetails = $investmentDetails;
        $this->investorDetails = $investorDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notification of Investment')->view('emails.new-investment-email', [
            'investmentDetails' => $this->investmentDetails,
            'investorDetails' => $this->investorDetails
        ]);
    }
}
