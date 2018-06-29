<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        $companies = Company::paginate(10);
        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.job_and_relate.company.table', ['comps' => $companies, 'count' => count($companies)]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return view('layouts.admin.job_and_relate.company.index')
            ->with('comps', $companies)
            ->with('count', count($companies));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.job_and_relate.company.create');
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
            'name' => 'required|max:100',
            'description' => 'required|max:500',
            'phone' => 'required|max:20',
            'email' => 'required|email',
            'image' => 'required',
            'address' => 'required',
            'contentInfo' => 'required'
        ]);

        $company = new Company();
        $company = Company::setData($company, $request);
        $company->save();
        return redirect()->route('company_job.index');
    }

    public function searchCompany(Request $request) {
        $comps = null;
        $name = $request->name;
        $name = htmlspecialchars($name);
        if($name != null && $name != "" && !empty($name)) {
            $comps = Company::findByName($name)->orderBy('name','asc')->paginate(10);
        } else {
            $comps = Company::paginate(10);
        }
        return response(
            view('layouts.admin.job_and_relate.company.table', ['comps' => $comps, 'count' => count($comps)]),
            200,
            ['Content-Type', 'application/json']
        );
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
        $comp = Company::find($id);
        if($comp != null) {
            $dataSpan = "";
            if($comp->status == config('global.statusActive')) {
                $comp->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$comp->id."' data-href='".route('company_job.toggleShow', $comp->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.'.$comp->status)."</span>";
            } else if ($comp->status == config('global.statusDisable')){
                $comp->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$comp->id."' data-href='".route('company_job.toggleShow', $comp->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.'.$comp->status)."</span>";
            }
            $comp->save();
        }
        return response(
            $dataSpan,
            200,
            ['Content-Type', 'application/json']
        );
    }


    public function getDataCompanyJson(){
        $comps = Company::paginate(5);
        return response(
            view('layouts.admin.job_and_relate.company.table', ['comps' => $comps,'count' => count($comps)]),
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function viewInstant($id) {
        $com = Company::find($id);
        if($com != null) {
            return response(
                view('layouts.admin.job_and_relate.company.view_instant', ['comp' => $com]),
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

    public function relateJob($id) {
        $com = Company::find($id);
        if($com!=null) {
            $jobCompany = $com->jobs()->paginate(10);
            return response(
                view('layouts.admin.job_and_relate.company.table_relate_job', ['jobs' => $jobCompany, 'count' => count($jobCompany)]),
                200,
                ['Content-Type', 'application/json']
            );
        } else {
            response(
                view('layouts.assessories.404'),
                200,
                ['Content-Type', 'application/json']
            );
        }
    }

    public function getDataCompany() {
        return "dadasdasdad";
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        if($company!=null) {
            return view('layouts.admin.job_and_relate.company.edit')->with('comp', $company);
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
        $comp = Company::find($id);
        if($comp!=null) {
            $this->validate($request, [
                'name' => 'required|max:100',
                'description' => 'required|max:500',
                'phone' => 'required|max:20',
                'email' => 'required|email',
                'image' => 'required',
                'address' => 'required',
                'contentInfo' => 'required'
            ]);
            $comp = Company::setData($comp, $request);
            $comp->save();
            return redirect()->route('company_job.index');
        }
        return redirect()->route('404');
    }


    public function delete(Request $request, $id) {
        $comp = Company::find($id);
        if($comp !=null) {
            $comp->delete();
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
