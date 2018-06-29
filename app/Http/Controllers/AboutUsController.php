<?php

namespace App\Http\Controllers;

use App\CompanyInfoSetting;
use Illuminate\Http\Request;
use Purifier;
class AboutUsController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth','isCoopCompanyInfoManager']);
    }

    public function index() {
        $aboutUsInfo = CompanyInfoSetting::first();
        return view('layouts.admin.contact_advert.aboutus_config')
            ->with('info', $aboutUsInfo);
    }

    public function edit() {
        $aboutUsInfo = CompanyInfoSetting::first();
        return view('layouts.admin.contact_advert.edit_about_us')
            ->with('info',$aboutUsInfo);
    }

    public function updateInfo(Request $request) {
//        return dd($request);
        $aboutUsInfo = CompanyInfoSetting::first();
        if($aboutUsInfo == null) {
            $aboutUsInfo = new CompanyInfoSetting();
        }
        $aboutUsInfo->name = $request->name;
        $aboutUsInfo->address = $request->address;
        $aboutUsInfo->mobile_phone = $request->mobile_phone;
        $aboutUsInfo->phone = $request->phone;
        $aboutUsInfo->slogan = Purifier::clean($request->slogan);
        $aboutUsInfo->owner_info = Purifier::clean($request->owner_info);
        $aboutUsInfo->email = $request->email;
        $aboutUsInfo->facebook = $request->facebook;
        $aboutUsInfo->linkedin = $request->linkedin;
        $aboutUsInfo->skype = $request->skype;
        $aboutUsInfo->google = $request->google;
        $aboutUsInfo->twitter = $request->twitter;
        $aboutUsInfo->ngay_thanh_lap = $request->ngay_thanh_lap;
        $aboutUsInfo->content = $request->contentInfo;
        $aboutUsInfo->save();

        return redirect()->route('viewAboutUs');
    }
}
