<?php

namespace App\Http\Controllers;

use App\OurCompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileInfoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','isCoopCompanyInfoManager']);
    }

    public function index() {
        $companyProfile = OurCompanyProfile::first();
        return view('layouts.admin.company_profile.company_profile')->with('info',$companyProfile);
    }

    public function edit() {
        $profile = OurCompanyProfile::first();
        return view('layouts.admin.company_profile.edit_company_profile')
            ->with('info',$profile);
    }

    public function updateInfo(Request $request) {
        $profile = OurCompanyProfile::first();
        if($profile == null) {
            $profile = new OurCompanyProfile();
        }
        $this->validate($request, [
            'title' => 'required|max:191',
            'contentInfo' => 'required'
        ]);
        $profile->title = $request->title;
        $profile->content = $request->contentInfo;
        $profile->save();

        return redirect()->route('viewCompanyProfile');
    }
}
