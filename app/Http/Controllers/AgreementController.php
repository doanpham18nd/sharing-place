<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Agreement\AgreementRepositoryInterface;
use App\Repositories\Eloquent\Client\ClientRepositoryInterface;
use App\Repositories\Eloquent\Demand\DemandRepositoryInterface;
use App\Repositories\Eloquent\Vendor\VendorRepositoryInterface;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    protected $agreementRepo;

    protected $demandRepo;

    protected $clientRepo;

    protected $vendorRepo;

    public function __construct(AgreementRepositoryInterface $agreementRepository,
                                DemandRepositoryInterface $demandRepository,
                                ClientRepositoryInterface $clientRepository,
                                VendorRepositoryInterface $vendorRepository)
    {
        $this->agreementRepo = $agreementRepository;
        $this->demandRepo = $demandRepository;
        $this->clientRepo = $clientRepository;
        $this->vendorRepo = $vendorRepository;
    }

    public function index()
    {
        return view('admin.agreement.index');
    }

    public function postAddAgreement($demandId)
    {
        $demand = $this->demandRepo->findOnlyPublished($demandId);
        $vendors = $this->vendorRepo->getByAddress($demand);
        return view('admin.agreement.add_agreement', compact('demand', 'vendors'));
    }

    public function getVendor(Request $request)
    {
        $vendor = $this->vendorRepo->findOnlyPublished($request->vendor_id);
        return view('admin.agreement.component.vendor', compact('vendor'));
    }
}
