<?php

namespace App\Http\Controllers;

use App\Mail\AgreementMail;
use App\Repositories\Eloquent\Bill\BillRepositoryInterface;
use App\Repositories\Eloquent\Demand\DemandRepositoryInterface;
use App\Repositories\Eloquent\Vendor\VendorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class BillController extends Controller
{
    protected $billRepo;
    protected $demandRepo;
    protected $vendorRepo;

    public function __construct(BillRepositoryInterface $billRepository,
                                DemandRepositoryInterface $demandRepository,
                                VendorRepositoryInterface $vendorRepository
    )
    {
        $this->demandRepo = $demandRepository;
        $this->billRepo = $billRepository;
        $this->vendorRepo = $vendorRepository;
    }

    public function postAdd(Request $request)
    {
        $demand = $this->demandRepo->findOnlyPublished($request['demand_id']);
        $vendor = $this->vendorRepo->findOnlyPublished($request['vendor_id']);
        Mail::to('yaphetsss.94@gmail.com')->send(new AgreementMail($demand, $vendor));
        return Redirect::back();
    }
}
