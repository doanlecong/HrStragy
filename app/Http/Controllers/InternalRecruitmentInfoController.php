<?php

namespace App\Http\Controllers;

use App\InternalRecruitmentNote;
use Illuminate\Http\Request;

class InternalRecruitmentInfoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','isCoopCompanyInfoManager']);
    }

    public function index() {
        $internalRecruit = InternalRecruitmentNote::first();
        return view('layouts.admin.internal_recruitment.internal_recruitment')->with('info',$internalRecruit);
    }

    public function edit() {
        $interRecruit = InternalRecruitmentNote::first();
        return view('layouts.admin.internal_recruitment.edit_internal_recruitment')
            ->with('info',$interRecruit);
    }

    public function updateInfo(Request $request) {
        $interRecruit = InternalRecruitmentNote::first();
        if($interRecruit == null) {
            $interRecruit = new InternalRecruitmentNote();
        }
        $this->validate($request, [
            'title' => 'required|max:191',
            'contentInfo' => 'required'
        ]);

        $interRecruit->title = $request->title;
        $interRecruit->content = $request->contentInfo;
        $interRecruit->save();

        return redirect()->route('viewInternaRecruit');
    }
}
