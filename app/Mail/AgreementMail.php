<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
class AgreementMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $demand;

    protected $vendor;

    protected $pdf;

    /**
     * Create a new message instance.
     *
     * @param $demand
     * @param $vendor
     * @param PDF $pDF
     */
    public function __construct($demand, $vendor)
    {
        $this->demand = $demand;
        $this->vendor = $vendor;
    }

    /**
     * Build the message.
     *
     * @return AgreementMail
     */
    public function build()
    {
        return $this->view('admin.email.agreement')->subject('THÔNG BÁO THỰC HIỆN HỢP ĐỒNG')->with([
            'demand' => $this->demand,
            'vendor' => $this->vendor,
        ]);
    }
}
