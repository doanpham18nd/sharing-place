<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
class BillMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $bill;

    /**
     * Create a new message instance.
     *
     * @param $bill
     */
    public function __construct($bill)
    {
        $this->bill = $bill;
    }

    /**
     * Build the message.
     *
     * @return BillMail
     */
    public function build()
    {
        return $this->view('admin.email.bill')->subject('CHI TIẾT HÓA ĐƠN')->with([
            'bill' => $this->bill
        ]);
    }
}
