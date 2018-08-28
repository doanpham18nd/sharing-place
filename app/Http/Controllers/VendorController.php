<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Agreement\AgreementRepositoryInterface;
use App\Repositories\Eloquent\Demand\DemandRepositoryInterface;
use App\Repositories\Eloquent\DemandDetail\DemandDetailRepositoryInterface;
use App\Repositories\Eloquent\District\DistrictRepositoryInterface;
use App\Repositories\Eloquent\Prefecture\PrefectureRepositoryInterface;
use App\Repositories\Eloquent\Province\ProvinceRepositoryInterface;
use App\Repositories\Eloquent\Vendor\VendorRepositoryInterface;
use App\Repositories\Eloquent\VendorDetail\VendorDetailRepository;
use App\Repositories\Eloquent\VendorDetail\VendorDetailRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    /**
     * @var VendorRepositoryInterface|\App\Repositories\Eloquent\Vendor\VendorRepositoryInterface
     */
    protected $vendorRepo;

    protected $provinceRepo;

    protected $districtRepo;

    protected $prefectureRepo;

    protected $vendorDetailRepo;
    protected $agreementRepo;

    protected $demandRepo;

    /**
     * VendorController constructor.
     * @param VendorRepositoryInterface $vendorRepository
     * @param ProvinceRepositoryInterface $provinceRepository
     * @param PrefectureRepositoryInterface $prefectureRepository
     * @param DistrictRepositoryInterface $districtRepository
     * @param VendorDetailRepositoryInterface $vendorDetailRepository
     * @param DemandRepositoryInterface $demandRepository
     * @param AgreementRepositoryInterface $agreementRepository
     */
    public function __construct
    (
        VendorRepositoryInterface $vendorRepository,
        ProvinceRepositoryInterface $provinceRepository,
        PrefectureRepositoryInterface $prefectureRepository,
        DistrictRepositoryInterface $districtRepository,
        VendorDetailRepositoryInterface $vendorDetailRepository,
        DemandRepositoryInterface $demandRepository,
        AgreementRepositoryInterface $agreementRepository
    )
    {
        $this->vendorRepo = $vendorRepository;
        $this->provinceRepo = $provinceRepository;
        $this->districtRepo = $districtRepository;
        $this->prefectureRepo = $prefectureRepository;
        $this->vendorDetailRepo = $vendorDetailRepository;
        $this->demandRepo = $demandRepository;
        $this->agreementRepo = $agreementRepository;
    }

    public function getByAdmin()
    {
        $vendors = $this->vendorRepo->getAllPublished();
        $provinces = $this->provinceRepo->getAllPublished();
        return view('admin.vendor.index', compact('vendors', 'provinces'));
    }

    public function index()
    {
        $vendors = $this->vendorRepo->getAllPublished();
        $provinces = $this->provinceRepo->getAllPublished();
        return view('vendor.index', compact('vendors', 'provinces'));
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
        try {
            DB::beginTransaction();
            $vendor[] = $request->only('user_name', 'vendor_name',
                'vendor_email', 'vendor_web', 'vendor_bank',
                'price_total', 'province_id', 'district_id',
                'prefecture_id', 'address');
            $vendor[0]['password'] = bcrypt($request->password);
            $vendor[0]['created_at'] = Carbon::now();
            $vendor[0]['updated_at'] = Carbon::now();
            DB::transaction(function () use ($vendor, $request) {
                $vendorId = $this->vendorRepo->insertGetId($vendor[0]);
                if (!empty($request->province_extra_id)) {
                    foreach ($request->province_extra_id as $key => $provinceId) {
                        $vendorDetail['province_extra_id'] = $provinceId;
                        $vendorDetail['vendor_id'] = $vendorId;
                        $vendorDetail['phone_extra_number'] = $request['phone_extra_number'][$key];
                        $vendorDetail['district_extra_id'] = $request['district_extra_id'][$key];
                        $vendorDetail['prefecture_extra_id'] = $request['prefecture_extra_id'][$key];
                        $vendorDetail['address_extra'] = $request['address_extra'][$key];
                        $vendorDetail['created_at'] = Carbon::now();
                        $vendorDetail['updated_at'] = Carbon::now();
                        $this->vendorDetailRepo->insert($vendorDetail);
                    }
                }
            });
            DB::commit();
            return redirect()->back()->with('success', 'Đã đăng ký thành công.Vui lòng chờ Admin xác nhận!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmAgreement($id)
    {
        $agreement = $this->agreementRepo->findByVendorId($id, Auth::user()['id']);
        $demand = $this->demandRepo->findOnlyPublished($agreement['demand_id']);
        $vendor = $this->vendorRepo->findOnlyPublished($agreement['vendor_id']);
        return view('vendor.agreement.confirm', compact('demand', 'vendor','id'));
    }
}
