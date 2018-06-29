<?php

namespace App\Http\Controllers;

use App\JobCategory;
use App\JobType;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
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
        $jobCateId = $request->jobtype;
        if ($jobCateId!=null && !empty($jobCateId)) {
            $jobCates = JobCategory::where('job_type_id', $jobCateId)->paginate(10);
        } else {
            $jobCates = JobCategory::paginate(10);
        }
        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.job_and_relate.job_category.table', ['jobCates' => $jobCates]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return view('layouts.admin.job_and_relate.job_category.index')->with('jobCates',$jobCates)->with('jobtype', $jobCateId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $jobCateId = $request->jobtype;
        if($jobCateId != null && !empty($jobCateId)) {
            return view('layouts.admin.job_and_relate.job_category.create')->with('jobtype', JobType::find($jobCateId));
        } else {
            $jobCates = JobType::all();
            return view('layouts.admin.job_and_relate.job_category.create')->with('jobtypes', $jobCates);
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
            'name' => 'required|max:200',
            'job_type_id' => 'required',
        ]);

        $jobCate = new JobCategory();
        $jobCate = JobCategory::setData($jobCate, $request);
        $jobCate->save();
        return redirect()->route('job_cate.index', 'jobtype='.$request->job_type_id);

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
        $jobCate = JobCategory::find($id);
        if($jobCate != null) {
            $dataSpan = "";
            if($jobCate->status == config('global.statusActive')) {
                $jobCate->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$jobCate->id."' data-href='".route('job_cate.toggleShow', $jobCate->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.'.$jobCate->status)."</span>";
            } else if ($jobCate->status == config('global.statusDisable')){
                $jobCate->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$jobCate->id."' data-href='".route('job_cate.toggleShow', $jobCate->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.'.$jobCate->status)."</span>";
            }
            $jobCate->save();
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
        $jobCate = JobCategory::find($id);
        if(!empty($jobCate)) {
            $jobCate = $jobCate->jobType;
            return view('layouts.admin.job_and_relate.job_category.edit')->with('jobCate', $jobCate)->with('jobtype', $jobCate);
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
        $jobCate = JobCategory::find($id);
        if(!empty($jobCate)) {
            $this->validate($request, [
                'name' => 'required|max:200',
                'job_type_id' => 'required',
            ]);
            $jobCate = JobCategory::setData($jobCate, $request);
            $jobCate->save();
        }
        return redirect()->route('job_cate.index', 'jobtype='.$request->job_type_id);
    }

    public function delete(Request $request, $id) {
        $jobCate = JobCategory::find($id);
        if($jobCate !=null) {
            $jobCate->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('job_cate.index');
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
