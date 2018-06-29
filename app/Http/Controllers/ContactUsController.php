<?php

namespace App\Http\Controllers;

use App\ContactInfo;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isContactUsMailSubManager']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            $contactUs = ContactInfo::where('status', $status)->orderBy('created_at','desc')->paginate(50);
        } else {
            $contactUs = ContactInfo::orderBy('created_at','desc')->paginate(20);
        }

        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.contactus.table', ['contactUs' => $contactUs, 'count' => count($contactUs)]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return view('layouts.admin.contactus.index')
            ->with('contactUs', $contactUs)
            ->with('count', count($contactUs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function toggleRead($id) {
        $contactUs = ContactInfo::find($id);
        if($contactUs != null) {
            $dataSpan = "";
            if($contactUs->status == config('global.statusActive')) {
                $contactUs->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$contactUs->id."' data-href='".route('contactus.toggleRead', $contactUs->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.read'.$contactUs->status)."</span>";
            } else if ($contactUs->status == config('global.statusDisable')){
                $contactUs->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$contactUs->id."' data-href='".route('contactus.toggleRead', $contactUs->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.read'.$contactUs->status)."</span>";
            }
            $contactUs->save();
        }
        return response(
            $dataSpan,
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function searchContact(Request $request){
        $contactUs = null;
        $name = $request->name;
        $name = htmlspecialchars($name);
        if($name != null && $name != "" && !empty($name)) {
            $contactUs = ContactInfo::searchContact($name)->orderBy('created_at','desc')->paginate(20);
        } else {
            $contactUs = ContactInfo::paginate(20);
        }
        return response(
            view('layouts.admin.contactus.table', ['contactUs' => $contactUs, 'count' => count($contactUs)]),
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function viewInstant($id) {
        $contactUs = ContactInfo::find($id);
        if($contactUs != null) {
            return response(
                view('layouts.admin.contactus.view_instant', ['contactUs' => $contactUs]),
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }


    public function delete(Request $request, $id) {
        $contactUs = ContactInfo::find($id);
        if($contactUs !=null) {
            $contactUs->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('contactus.index');
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
