<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class AgreementMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $demand;

    protected $vendor;

    protected $agreementId;

    protected $pdf;

    /**
     * Create a new message instance.
     *
     * @param $agreementId
     * @param $demand
     * @param $vendor
     */
    public function __construct($agreementId, $demand, $vendor)
    {
        $this->demand = $demand;
        $this->vendor = $vendor;
        $this->agreementId = $agreementId;
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
            'agreementId' => $this->agreementId
        ]);
    }
}
