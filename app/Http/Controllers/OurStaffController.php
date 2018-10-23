<?php

namespace App\Http\Controllers;

use App\OurStaffInFo;
use Illuminate\Http\Request;

class OurStaffController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','isCoopCompanyInfoManager']);
    }

    public function index() {
        $ourStaff = OurStaffInFo::first();
        return view('layouts.admin.our_staff.our_staff')->with('info', $ourStaff);
    }

    public function edit() {
        $ourStaff = OurStaffInFo::first();
        return view('layouts.admin.our_staff.edit_our_staff')
            ->with('info',$ourStaff);
    }

    public function updateInfo(Request $request) {
        $ourStaff = OurStaffInFo::first();
        if($ourStaff == null) {
            $ourStaff = new OurStaffInFo();
        }
        $this->validate($request, [
            'title' => 'required|max:191',
            'contentInfo' => 'required'
        ]);
        $ourStaff->title = $request->title;
        $ourStaff->content = $request->contentInfo;
        $ourStaff->save();

        return redirect()->route('viewOurStaff');
    }
}
