<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
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
    public function index()
    {
        $countries = Country::paginate(20);
        return view('layouts.admin.job_and_relate.country.index')->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findRelateData(Request $request) {
        $countryID = $request->id;
        $provinces = null;
        if(!empty($countryID)) {
            $country = Country::find($countryID);
            $provinces = $country->provinces()->where('status', config('global.statusActive'))->get()->toArray();
        }
        return  response()->json([
            'success' => true,
            'provinces' =>$provinces
        ], 200);
    }

    public function create()
    {
        return view('layouts.admin.job_and_relate.country.create');
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
            'code' => 'required|max:10'
        ]);

        $country = new Country();
        $country = Country::setData($country, $request);
        $country->save();

        return redirect()->route('country.index');
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
        $country = Country::find($id);
        $dataSpan = "";
        if($country != null) {
            if($country->status == config('global.statusActive')) {
                $country->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$country->id."' data-href='".route('country.toggleShow', $country->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.'.$country->status)."</span>";
            } else if ($country->status == config('global.statusDisable')){
                $country->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$country->id."' data-href='".route('country.toggleShow', $country->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.'.$country->status)."</span>";
            }
            $country->save();
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
        $country = Country::find($id);
        if(!empty($country)) {
            return view('layouts.admin.job_and_relate.country.edit')->with('country', $country);
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
        $country = Country::find($id);
        if(!empty($country)) {
            $this->validate($request, [
                'name' => 'required|max:200',
                'code' => 'required|max:10'
            ]);
            $country = Country::setData($country, $request);
            $country->save();
            return redirect()->route('country.index');
        }
    }

    public function delete(Request $request, $id) {
        $country = Country::find($id);
        if($country !=null) {
            $country->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('country.index');
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
