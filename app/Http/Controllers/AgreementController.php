<?php

namespace App\Http\Controllers;

use App\Mail\AgreementMail;
use App\Repositories\Eloquent\Agreement\AgreementRepositoryInterface;
use App\Repositories\Eloquent\Client\ClientRepositoryInterface;
use App\Repositories\Eloquent\Demand\DemandRepositoryInterface;
use App\Repositories\Eloquent\Vendor\VendorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function getAdd($demandId)
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

    public function postAdd(Request $request)
    {
        $demand = $this->demandRepo->findOnlyPublished($request['demand_id']);
        $vendor = $this->vendorRepo->findOnlyPublished($request['vendor_id']);
        $data['client_id'] = $demand->client->id;
        $data['demand_id'] = $request['demand_id'];
        $data['vendor_id'] = $request['vendor_id'];
        $data['created_user'] = Auth::user()['id'];
        $data['agreement_status'] = 1;
        $data['agreement_kind'] = 1;
        if(!empty($demand->specify_time)) {
            $data['specify_time'] = $demand->specify_time;
        } else {
            $data['start_date'] = $demand->start_date;
            $data['end_date'] = $demand->end_date;
        }
        $data['price_total'] = $request['price_total'];
        $agreementId = $this->agreementRepo->insertAgreement($data);
        Mail::to('yaphetsss.94@gmail.com')->send(new AgreementMail($agreementId,$demand, $vendor));
        $this->demandRepo->updateStatus($request['demand_id'], 2);
        return redirect()->route('demand.list')->with('success', 'Đã gửi mail thành công');
    }
}
