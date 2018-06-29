<?php

namespace App\Http\Controllers;

use App\District;
use App\Province;
use Illuminate\Http\Request;

class DistrictController extends Controller
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
        if(!empty($request->province) && !empty($province = Province::find($request->province))) {
            $districts = District::where('province_id',$province->id)->paginate(10);
            if($request->isXmlHttpRequest()) {
                return response(
                    view('layouts.admin.job_and_relate.district.table', ['districts' => $districts]),
                    200,
                    ['Content-Type', 'application/json']
                );
            }
            return view('layouts.admin.job_and_relate.district.index')->with('districts', $districts)->with('province', $province);
        }
        return redirect()->route('404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $provinceID = $request->province;
        if(!empty($provinceID) && !empty($province = Province::find($provinceID))){

            return view('layouts.admin.job_and_relate.district.create')->with('province',$province);
        }
        return redirect()->route('404');
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
            'code' => 'numeric',
            'province_id' => 'required|numeric',
            'country_id' => 'required|numeric'
        ]);

        $district = new District();
        $district = District::setData($district, $request);
        $district->save();

        return redirect()->route('district.index','province='.$district->province_id);
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


    public function toggleShow($id){
        $district = District::find($id);
        $dataSpan = "";
        if($district != null) {
            if($district->status == config('global.statusActive')) {
                $district->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$district->id."' data-href='".route('district.toggleShow', $district->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.'.$district->status)."</span>";
            } else if ($district->status == config('global.statusDisable')){
                $district->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$district->id."' data-href='".route('district.toggleShow', $district->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.'.$district->status)."</span>";
            }
            $district->save();
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
        if(!empty($district = District::find($id))){
            return view('layouts.admin.job_and_relate.district.edit')->with('district',$district);
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
        $district = District::find($id);
        if(!empty($district)) {
            $this->validate($request,  [
                'name' => 'required|max:200',
                'code' => 'alpha_num',
                'province_id' => 'required|numeric',
                'country_id' => 'required|numeric'
            ]);
            $district  = District::setData($district, $request);
            $district->save();
            return redirect()->route('district.index','province='.$request->province_id);
        }
        return redirect()->route('404');
    }


    public function delete(Request $request, $id) {
        $district = District::find($id);
        if($district !=null) {
            $province = $district->province_id;
            $district->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('district.index','province='.$province);
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
