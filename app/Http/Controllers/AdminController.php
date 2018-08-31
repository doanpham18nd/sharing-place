<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Bill\BillRepositoryInterface;
use App\Repositories\Eloquent\Client\ClientRepositoryInterface;
use App\Repositories\Eloquent\Demand\DemandRepositoryInterface;
use App\Repositories\Eloquent\Vendor\VendorRepositoryInterface;

class AdminController extends Controller
{
    protected $billRepo;
    protected $demandRepo;
    protected $vendorRepo;
    protected $clientRepo;

    public function __construct(BillRepositoryInterface $billRepository,
                                DemandRepositoryInterface $demandRepository,
                                VendorRepositoryInterface $vendorRepository,
                                ClientRepositoryInterface $clientRepository
    )
    {
        $this->middleware('auth:admin');
        $this->demandRepo = $demandRepository;
        $this->billRepo = $billRepository;
        $this->vendorRepo = $vendorRepository;
        $this->clientRepo = $clientRepository;
    }

    public function index()
    {
        $userRegisterTotal = $this->clientRepo->getByMonth();
        return view('admin.index', compact('userRegisterTotal'));
    }
}
