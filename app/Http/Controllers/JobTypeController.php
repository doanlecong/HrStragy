<?php

namespace App\Http\Controllers;

use App\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
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
        $jobTypes = JobType::paginate(10);
        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.job_and_relate.job_type.table', ['jobTypes' => $jobTypes]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return view('layouts.admin.job_and_relate.job_type.index')->with('jobTypes', $jobTypes);
    }

    public function findRelateData(Request $request) {
        $id = $request->id;
        $cateJobTypes = null;
        $levelJobType = null;
        if(!empty($id)) {
            $jobType = JobType::find($id);
            $cateJobTypes = $jobType->jobCates()->where('status', config('global.statusActive'))->get()->toArray();
            $levelJobType = $jobType->jobLevels()->where('status', config('global.statusActive'))->get()->toArray();
        }
        return response()->json([
            'success' => true,
            'cateJobs' => $cateJobTypes,
            'levelJobs' => $levelJobType,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.job_and_relate.job_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'abbr' => 'required|max:50|unique:job_types,abbr',
            'name' => 'required|max:200'
        ]);

        $jobType = new JobType();
        $jobType = JobType::setData($jobType, $request);
        $jobType->save();
        return redirect()->route('job_type.index');
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

    public function toggleShow($id) {
        $jobType = JobType::find($id);
        if($jobType != null) {
            $dataSpan = "";
            if($jobType->status == config('global.statusActive')) {
                $jobType->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$jobType->id."' data-href='".route('job_type.toggleShow', $jobType->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.'.$jobType->status)."</span>";
            } else if ($jobType->status == config('global.statusDisable')){
                $jobType->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$jobType->id."' data-href='".route('job_type.toggleShow', $jobType->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.'.$jobType->status)."</span>";
            }
            $jobType->save();
        }
        return response(
            $dataSpan,
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
        $jobType = JobType::find($id);
        if($jobType!= null) {
            return view('layouts.admin.job_and_relate.job_type.edit')->with('jobType', $jobType);
        }
        return redirect()->route('404');
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
        $jobType = JobType::find($id);
        if($jobType !=null) {
            $this->validate($request,[
                'abbr' => 'required|max:50',
                'name' => 'required|max:200'
            ]);
            $jobType = JobType::setData($jobType, $request);
            $jobType->save();
        }

        return redirect()->route('job_type.index');
    }

    public function delete(Request $request, $id){
        $jobType = JobType::find($id);
        if($jobType !=null) {
            $jobType->jobCates()->delete();
            $jobType->jobLevels()->delete();
            $jobType->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('job_type.index');
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
