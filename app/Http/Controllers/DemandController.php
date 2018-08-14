<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Client\ClientRepositoryInterface;
use App\Repositories\Eloquent\Demand\DemandRepositoryInterface;
use App\Repositories\Eloquent\DemandDetail\DemandDetailRepositoryInterface;
use App\Repositories\Eloquent\District\DistrictRepositoryInterface;
use App\Repositories\Eloquent\Job\JobRepositoryInterface;
use App\Repositories\Eloquent\Prefecture\PrefectureRepositoryInterface;
use App\Repositories\Eloquent\Province\ProvinceRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandController extends Controller
{
    protected $demandRepo;
    protected $jobRepo;
    protected $provinceRepo;
    protected $prefectureRepo;
    protected $demandDetailRepo;
    protected $clientRepo;
    protected $districtRepo;

    public function __construct
    (
        DemandRepositoryInterface $demandRepository,
        JobRepositoryInterface $jobRepository,
        ProvinceRepositoryInterface $provinceRepository,
        PrefectureRepositoryInterface $prefectureRepository,
        DistrictRepositoryInterface $districtRepository,
        DemandDetailRepositoryInterface $demandDetailRepository,
        ClientRepositoryInterface $clientRepository
    )
    {
        $this->demandRepo = $demandRepository;
        $this->jobRepo = $jobRepository;
        $this->provinceRepo = $provinceRepository;
        $this->prefectureRepo = $prefectureRepository;
        $this->demandDetailRepo = $demandDetailRepository;
        $this->clientRepo = $clientRepository;
        $this->districtRepo = $districtRepository;
    }

    public function index(Request $request)
    {
        $phone = '';
        if (isset($request->user_phone)) {
            $phone = $request->user_phone;
        }
        $jobs = $this->jobRepo->getAllAvailable();
        $provinces = $this->provinceRepo->getAllPublished();

        return view('admin.demand.index', compact('phone', 'jobs', 'provinces'));
    }

    public function getDistrict(Request $request)
    {
        $provinceId = $request->province_id;
        $districts = $this->districtRepo->getPreBy($provinceId);
        return view('admin.demand.component.district', compact('districts'));
    }

    public function getPrefecture(Request $request)
    {
        $districtId = $request->district_id;
        $prefectures = $this->prefectureRepo->getPreBy($districtId);
        return view('admin.demand.component.prefecture', compact('prefectures'));
    }

    public function postAdd(Request $request)
    {
        try {
            DB::beginTransaction();
            $clients = $request->only(
                'user_name',
                'user_phone1',
                'user_phone2',
                'user_email',
                'province_id', 'prefecture_id', 'district_id', 'contact_method');
            $clients['created_at'] = Carbon::now();
            $clients['updated_at'] = Carbon::now();
            $clientId = $this->clientRepo->insertGetId($clients);
            $demands = $request->only('specify_time', 'specify_datetime', 'config_time	', 'config_datetime1', 'config_datetime2');
            $demands['client_id'] = $clientId;
            $demands['created_at'] = Carbon::now();
            $demands['updated_at'] = Carbon::now();
            $demandId = $this->demandRepo->insertGetId($demands);
            if (!empty($request->job_id)) {
                foreach ($request->job_id as $value) {
                    $demandDetails['job_id'] = $value;
                    $demandDetails['demand_id'] = $demandId;
                    $demandDetails['created_at'] = Carbon::now();
                    $demandDetails['updated_at'] = Carbon::now();
                    $this->demandDetailRepo->insert($demandDetails);
                }
            }
            DB::commit();
            return redirect()->route('agreement.postAdd', $demandId)->with('success', 'Tạo mới thành công nhu cầu!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addExtra(Request $request)
    {
        $demandExtra = $request->only('data')['data'];
        $jobExtra = $request->only('job_id')['job_id'];
        foreach ($demandExtra as $key => $demand) {
            $demands[$demand['name']] = $demand['value'];
        }
        $district_selected = $this->districtRepo->findOnlyPublished($demands['district_id']);
        $prefecture_selected = $this->prefectureRepo->findOnlyPublished($demands['prefecture_id']);
        $province_selected = $this->provinceRepo->findOnlyPublished($demands['province_id']);
        $jobs = $this->jobRepo->getAllAvailable();
        foreach ($jobExtra as $key => $value) {
            $jobArray = $value;
        }
        return view('admin.demand.component.result',
            compact('district_selected', 'demands', 'prefecture_selected', 'province_selected', 'jobArray', 'jobs'));

    }
}
