<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Bill\BillRepositoryInterface;
use App\Repositories\Eloquent\Demand\DemandRepositoryInterface;
use App\Repositories\Eloquent\Vendor\VendorRepositoryInterface;

class AdminController extends Controller
{
    protected $billRepo;
    protected $demandRepo;
    protected $vendorRepo;

    public function __construct(BillRepositoryInterface $billRepository,
                                DemandRepositoryInterface $demandRepository,
                                VendorRepositoryInterface $vendorRepository
    )
    {
        $this->middleware('auth:admin');
        $this->demandRepo = $demandRepository;
        $this->billRepo = $billRepository;
        $this->vendorRepo = $vendorRepository;
    }

    public function index()
    {
       return view('admin.index');
    }
}
