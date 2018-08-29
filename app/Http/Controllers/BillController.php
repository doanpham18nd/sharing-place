<?php

namespace App\Http\Controllers;

use App\Mail\AgreementMail;
use App\Mail\BillMail;
use App\Repositories\Eloquent\Agreement\AgreementRepositoryInterface;
use App\Repositories\Eloquent\Bill\BillRepositoryInterface;
use App\Repositories\Eloquent\BillDetail\BillDetailRepositoryInterface;
use App\Repositories\Eloquent\Demand\DemandRepositoryInterface;
use App\Repositories\Eloquent\Vendor\VendorRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BillController extends Controller
{
    protected $billRepo;
    protected $demandRepo;
    protected $vendorRepo;
    protected $agreementRepo;
    protected $billDetailRepo;

    public function __construct(BillRepositoryInterface $billRepository,
                                DemandRepositoryInterface $demandRepository,
                                VendorRepositoryInterface $vendorRepository,
                                AgreementRepositoryInterface $agreementRepository,
                                BillDetailRepositoryInterface $billDetailRepository
    )
    {
        $this->demandRepo = $demandRepository;
        $this->billRepo = $billRepository;
        $this->vendorRepo = $vendorRepository;
        $this->agreementRepo = $agreementRepository;
        $this->billDetailRepo = $billDetailRepository;
    }

    public function confirmAgreement($agreementId, Request $request)
    {
        $agreement = $this->agreementRepo->findByVendorId($agreementId, Auth::user()->id);
        $agreement['price_total'] = $request['price_total'];
        $demand = $this->demandRepo->findOnlyPublished($agreement['demand_id']);
        $this->agreementRepo->updateStatus($agreementId, 2);
        $this->demandRepo->updateStatus($agreement['demand_id'], 3);
        $billId = $this->billRepo->insertBill($agreement);
        foreach ($demand->demandDetails as $demandDetail) {
            $billDetail['job_price'] = $demandDetail->job->job_price;
            $billDetail['bill_id'] = $billId;
            $billDetail['job_id'] = $demandDetail->job->id;
            $billDetail['created_at'] = $billDetail['updated_at'] = Carbon::now();
            $this->billDetailRepo->insert($billDetail);
        }

        return view('company.bill.detail', compact('billId'));
    }

    public function getDetail($id)
    {
        $bill = $this->billRepo->findOnlyPublished($id);
        return view('vendor.bill.detail', compact('bill'));
    }

    public function postDetail($id)
    {
        $bill = $this->billRepo->findOnlyPublished($id);
        Mail::to('yaphetsss.94@gmail.com')->send(new BillMail($bill));
    }
}
