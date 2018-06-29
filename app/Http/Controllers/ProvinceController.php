<?php

namespace App\Http\Controllers;

use App\Country;
use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
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
        if(!empty($request->country) && !empty($country = Country::find($request->country))) {
            $provinces = Province::where('country_id', $country->id)->paginate(10);
            if($request->isXmlHttpRequest()) {
                return response(
                    view('layouts.admin.job_and_relate.province.table', ['provinces' => $provinces]),
                    200,
                    ['Content-Type', 'application/json']
                );
            }
            return view('layouts.admin.job_and_relate.province.index')->with('provinces', $provinces)->with('country', $country);
        }
        return redirect()->route('404');
    }


    public function findRelateDistrict(Request $request) {
        $provinceID = $request->id;
        $districts = null;
        if(!empty($provinceID)) {
            $province = Province::find($provinceID);
            $districts = $province->districts()->where('status', config('global.statusActive'))->get()->toArray();
        }
        return  response()->json([
            'success' => true,
            'districts' =>$districts
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $provinceID = $request->country;
        if(!empty($provinceID) && !empty($province = Country::find($provinceID))){

            return view('layouts.admin.job_and_relate.province.create')->with('country',$province);
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
        $this->validate($request,  [
            'name' => 'required|max:200',
            'code' => 'alpha_num',
            'country_id' => 'required|numeric'
        ]);

        $province = new Province();
        $province  = Province::setData($province, $request);
        $province->save();
        return redirect()->route('province.index','country='.$request->country_id);
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
        $province = Province::find($id);
        $dataSpan = "";
        if($province != null) {
            if($province->status == config('global.statusActive')) {
                $province->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$province->id."' data-href='".route('province.toggleShow', $province->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.'.$province->status)."</span>";
            } else if ($province->status == config('global.statusDisable')){
                $province->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$province->id."' data-href='".route('province.toggleShow', $province->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.'.$province->status)."</span>";
            }
            $province->save();
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
    public function edit(Request $request, $id)
    {
        if(!empty($province = Province::find($id))){
            return view('layouts.admin.job_and_relate.province.edit')->with('province',$province);
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
        $province = Province::find($id);
        if(!empty($province)) {
            $this->validate($request,  [
                'name' => 'required|max:200',
                'code' => 'alpha_num',
                'country_id' => 'required|numeric'
            ]);
            $province  = Province::setData($province, $request);
            $province->save();
            return redirect()->route('province.index','country='.$request->country_id);
        }
        return redirect()->route('404');
    }

    public function delete(Request $request, $id) {
        $province = Province::find($id);
        if($province !=null) {
            $countryId = $province->country_id;
            $province->districts()->delete();
            $province->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('province.index','country='.$countryId);
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
