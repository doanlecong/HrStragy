<?php

namespace App\Http\Controllers;

use App\JobLevel;
use App\JobType;
use Illuminate\Http\Request;

class JobLevelController extends Controller
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
        $jobType = $request->jobtype;
        if ($jobType!=null && !empty($jobType)) {
            $jobLevels = JobLevel::where('job_type_id', $jobType)->paginate(10);
        } else {
            $jobLevels = JobLevel::paginate(10);
        }
        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.job_and_relate.job_level.table', ['jobLevels' => $jobLevels]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return view('layouts.admin.job_and_relate.job_level.index')->with('jobLevels',$jobLevels)->with('jobtype', $jobType);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $jobLevel = $request->jobtype;
        if($jobLevel != null && !empty($jobLevel)) {
            return view('layouts.admin.job_and_relate.job_level.create')->with('jobtype', JobType::find($jobLevel));
        } else {
            $jobLevels = JobType::all();
            return view('layouts.admin.job_and_relate.job_level.create')->with('jobtypes', $jobLevels);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'abbr' => 'required|max:70',
            'name' => 'required|max:200',
            'job_type_id' => 'required',
        ]);

        $jobLevel = new JobLevel();
        $jobLevel = JobLevel::setData($jobLevel, $request);
        $jobLevel->save();
        return redirect()->route('job_level.index', 'jobtype='.$request->job_type_id);
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
        $jobLevel = JobLevel::find($id);
        if($jobLevel != null) {
            $dataSpan = "";
            if($jobLevel->status == config('global.statusActive')) {
                $jobLevel->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$jobLevel->id."' data-href='".route('job_level.toggleShow', $jobLevel->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.'.$jobLevel->status)."</span>";
            } else if ($jobLevel->status == config('global.statusDisable')){
                $jobLevel->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$jobLevel->id."' data-href='".route('job_level.toggleShow', $jobLevel->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.'.$jobLevel->status)."</span>";
            }
            $jobLevel->save();
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
        $jobLevel = JobLevel::find($id);
        if(!empty($jobLevel)) {
            $jobLevel = $jobLevel->jobType;
            return view('layouts.admin.job_and_relate.job_level.edit')->with('jobLevel', $jobLevel)->with('jobtype', $jobLevel);
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
        $jobLevel = JobLevel::find($id);
        if(!empty($jobLevel)) {
            $this->validate($request, [
                'abbr' => 'required|max:70',
                'name' => 'required|max:200',
                'job_type_id' => 'required',
            ]);
            $jobLevel = JobLevel::setData($jobLevel, $request);
            $jobLevel->save();
        }
        return redirect()->route('job_level.index', 'jobtype='.$request->job_type_id);
    }

    public function delete(Request $request, $id) {
        $jobLevel = JobLevel::find($id);
        if($jobLevel !=null) {
            $jobLevel->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('job_level.index');
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
