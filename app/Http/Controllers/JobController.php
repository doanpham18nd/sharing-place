<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Job\JobRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $jobRepo;

    public function __construct(JobRepositoryInterface $jobRepository)
    {
        $this->jobRepo = $jobRepository;
    }

    public function index()
    {
        $jobs = $this->jobRepo->getAllPublished();
        return view('admin.job.index', compact('jobs'));
    }

    public function postAdd(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        $this->jobRepo->insert($data);
        return response()->json($request->all());
    }
}
