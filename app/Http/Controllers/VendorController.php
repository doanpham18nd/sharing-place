<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\District\DistrictRepositoryInterface;
use App\Repositories\Eloquent\Prefecture\PrefectureRepositoryInterface;
use App\Repositories\Eloquent\Province\ProvinceRepositoryInterface;
use App\Repositories\Eloquent\Vendor\VendorRepositoryInterface;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * @var VendorRepositoryInterface|\App\Repositories\Eloquent\Vendor\VendorRepositoryInterface
     */
    protected $vendorRepo;

    protected $provinceRepo;

    protected $districtRepo;

    protected $prefectureRepo;


    /**
     * VendorController constructor.
     * @param VendorRepositoryInterface $vendorRepository
     * @param ProvinceRepositoryInterface $provinceRepository
     * @param PrefectureRepositoryInterface $prefectureRepository
     * @param DistrictRepositoryInterface $districtRepository
     */
    public function __construct
    (
        VendorRepositoryInterface $vendorRepository,
        ProvinceRepositoryInterface $provinceRepository,
        PrefectureRepositoryInterface $prefectureRepository,
        DistrictRepositoryInterface $districtRepository
    ) {
        $this->vendorRepo = $vendorRepository;
        $this->provinceRepo = $provinceRepository;
        $this->districtRepo = $districtRepository;
        $this->prefectureRepo = $prefectureRepository;
    }

    public function index()
    {
        $vendors = $this->vendorRepo->getAllPublished();
        $provinces = $this->provinceRepo->getAllPublished();
        return view('admin.vendor.index', compact('vendors', 'provinces'));
    }

    public function addExtra(Request $request)
    {
        $data = $request->all();
        $district_selected = $this->districtRepo->findOnlyPublished($data['district_extra_id']);
        $prefecture_selected = $this->prefectureRepo->findOnlyPublished($data['prefecture_extra_id']);
        $province_selected = $this->provinceRepo->findOnlyPublished($data['province_extra_id']);
        return view('admin.vendor.component.result', compact('data', 'province_selected', 'district_selected', 'prefecture_selected'));
    }

    public function postAdd(Request $request)
    {
        dd($request->all());
    }
}
