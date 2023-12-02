<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $referenceNumber;

    public function __construct($payment, $referenceNumber)
    {
        $this->payment = $payment;
        $this->referenceNumber = $referenceNumber;
    }

    public function build()
    {
        return $this->view('emails.receipt')
                    ->subject('Payment Receipt');
    }
}