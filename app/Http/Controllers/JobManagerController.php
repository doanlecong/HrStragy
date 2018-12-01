<?php

namespace App\Http\Controllers;

use App\Company;
use App\Country;
use App\Job;
use App\JobType;
use App\Province;
use Illuminate\Http\Request;

class JobManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isJobAndRelateManager']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jobs = Job::searchJob($request);
        if(!empty($jobs)) {
            $jobs = $jobs->orderBy('created_at', 'desc')->paginate(20);
        } else {
            $jobs = Job::orderBy('created_at', 'desc')->paginate(20);
        }
        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.job_and_relate.job.table', ['jobs' => $jobs, 'count' => count($jobs)]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        $jobTypes = JobType::where('status', config('global.statusActive'))->get();
        $provinces = Province::select(['id', 'name'])->where('status', config('global.statusActive'))->get();

        return view('layouts.admin.job_and_relate.job.index')
            ->with('jobs', $jobs)
            ->with('count', count($jobs))
            ->with('jobTypes', $jobTypes)
            ->with('provinces', $provinces);
    }

    public function checkName(Request $request) {
        $name = $request->name;
        $slug = str_slug($name, '-');
        $canUseSlug = Job::checkSlug($slug, null);
        if(!$canUseSlug) {
            $slug = $name." ".uniqid();
            $slug = str_slug($slug, '-');
        }
        return response()->json([
                'success' => true,
                'title' => $request->name,
                'canUseSlug' => $canUseSlug,
                'slug' => $slug
        ], 200);

    }

    public function checkSlug(Request $request) {
        $slug = $request->slug;
        $id = null;
        if($request->has('id')) {
            $id =$request->id;
        }
        $canUseSlug = Job::checkSlug($slug, $id);
        return response()->json([
            'success' => true,
            'canUseSlug' => $canUseSlug,
            'slug' => $slug
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select(['id','name'])->where('status', config('global.statusActive'))->get();
        $jobType = JobType::where('status', config('global.statusActive'))->get();
        $countries = Country::orderBy('code','asc')->get();
        return view('layouts.admin.job_and_relate.job.create')
            ->with('companies', $companies)
            ->with('jobTypes', $jobType)
            ->with('countries', $countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'name' => 'required|max:200',
            'job_type_id' => 'required|numeric',
            'job_cate_id' => 'array',
            'job_level_id' => 'array',
            'image' => 'required|max:200',
            'time_start' => 'required|date',
            'time_to' => 'required|date',
            'slug' => 'required|max:200',
            'company_id' => 'required|numeric',
            'country_id' => 'required|numeric',
//            'province_id' => 'numeric',
//            'district_id' => 'numeric',
            'description' => 'required',
            'salary' => 'required|max:200',
            'contentInfo' =>'required'
        ]);
        $newJob = new Job();
        $newJob->setData($request);
        $newJob->save();
        if(isset($request->job_cate_id)) {
            $newJob->jobCates()->sync($request->job_cate_id);
        } else {
            $newJob->jobCates()->sync(array());
        }
        if(isset($request->job_level_id)) {
            $newJob->jobLevels()->sync($request->job_level_id);
        } else {
            $newJob->jobCates()->sync(array());
        }

        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function viewCandidateList($id) {
        $job = Job::find($id);
        if($job) {
            $candidates = $job->candidates()->paginate(10);
            return response(
                view('layouts.admin.candidate_contact.table', ['count' => count($candidates),'candidates' => $candidates]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return response(
            '404 .Not Found !',
            404,
            ['Content-Type', 'application/json']
        );
    }

    public function toggleShow($id) {
        $job = Job::find($id);
        if($job != null) {
            $dataSpan = "";
            if($job->status == config('global.statusActive')) {
                $job->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$job->id."' data-href='".route('job.toggleShow', $job->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.'.$job->status)."</span>";
            } else if ($job->status == config('global.statusDisable')){
                $job->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$job->id."' data-href='".route('job.toggleShow', $job->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.'.$job->status)."</span>";
            }
            $job->save();
        }
        return response(
            $dataSpan,
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function viewInstant($id) {
        $job = Job::find($id);
        if($job != null) {
            return response(
                view('layouts.admin.job_and_relate.job.view_instant', ['job' => $job]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return response(
            view('layouts.assessories.404'),
            200,
            ['Content-Type', 'application/json']
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        if($job) {
            $companies = Company::select(['id','name'])->where('status', config('global.statusActive'))->get();
            $jobType = JobType::where('status', config('global.statusActive'))->get();
            $relateJoBCate = $job->jobType->jobCates()->select(['id', 'name'])->get() ?? [];
            $relateJobLevel = $job->jobType->jobLevels()->select(['id', 'abbrie', 'name'])->get() ?? [];
            $countries = Country::orderBy('code','asc')->get();
            $provinces = null;
            $districts = null;
            if(!empty($job->province_id)) {
                $provinces = $job->country->provinces()->select(['id', 'name'])->get();
            }
            if(!empty($job->province_id)) {
                $districts = $job->province->districts()->select(['id', 'code', 'name'])->get();
            }

            return view('layouts.admin.job_and_relate.job.edit')
                ->with('job', $job)
                ->with('companies', $companies)
                ->with('jobTypes', $jobType)
                ->with('countries', $countries)
                ->with('relateJobCate', $relateJoBCate)
                ->with('relateJobLevel', $relateJobLevel)
                ->with('provinces', $provinces)
                ->with('districts', $districts);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        if($job) {
            $this->validate($request, [
                'name' => 'required|max:200',
                'job_type_id' => 'required|numeric',
                'job_cate_id' => 'array',
                'job_level_id' => 'array',
                'image' => 'required|max:200',
                'time_start' => 'required|date',
                'time_to' => 'required|date',
                'slug' => 'required|max:200',
                'company_id' => 'required|numeric',
                'country_id' => 'required|numeric',
//                'province_id' => 'numeric',
//                'district_id' => 'numeric',
                'description' => 'required',
                'salary' => 'required|max:200',
                'contentInfo' =>'required'
            ]);
            $job->setData($request);
            $job->save();
            if(isset($request->job_cate_id)) {
                $job->jobCates()->sync($request->job_cate_id);
            } else {
                $job->jobCates()->sync(array());
            }
            if(isset($request->job_level_id)) {
                $job->jobLevels()->sync($request->job_level_id);
            } else {
                $job->jobCates()->sync(array());
            }
        }
        return redirect()->route('job.index');
    }


    public function delete(Request $request, $id) {
        $job = Job::find($id);
        if($job != null) {
            $job->jobCates()->sync(array());
            $job->jobLevels()->sync(array());
            $job->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('cooperate.index');
            }
        } else {
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => false,
                    'message' => "Not Found ! May be it has been delete !",
                ],404);
            }
        }
        return redirect()->route('404');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
