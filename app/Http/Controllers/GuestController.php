<?php

namespace App\Http\Controllers;

use App\GuestContactInfo;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isCandidateGuestManager']);
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
            $guestContact = GuestContactInfo::where('status', $status)->orderBy('created_at','desc')->paginate(50);
        } else {
            $guestContact = GuestContactInfo::orderBy('created_at','desc')->paginate(20);
        }

        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.guest_contact.table', ['guests' => $guestContact, 'count' => count($guestContact)]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return view('layouts.admin.guest_contact.index')
            ->with('guests', $guestContact)
            ->with('count', count($guestContact));
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
        $guestContact = GuestContactInfo::find($id);
        $dataSpan = "";
        if($guestContact != null) {
            if($guestContact->status == config('global.statusActive')) {
                $guestContact->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$guestContact->id."' data-href='".route('guest_contact.toggleRead', $guestContact->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.read'.$guestContact->status)."</span>";
            } else if ($guestContact->status == config('global.statusDisable')){
                $guestContact->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$guestContact->id."' data-href='".route('guest_contact.toggleRead', $guestContact->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.read'.$guestContact->status)."</span>";
            }
            $guestContact->save();
        }
        return response(
            $dataSpan,
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function searchContact(Request $request){
        $guestContact = null;
        $name = $request->name;
        $name = htmlspecialchars($name);
        if($name != null && $name != "" && !empty($name)) {
            $guestContact = GuestContactInfo::searchContact($name)->orderBy('created_at','desc')->paginate(20);
        } else {
            $guestContact = GuestContactInfo::paginate(20);
        }
        return response(
            view('layouts.admin.contactus.table', ['contactUs' => $guestContact, 'count' => count($guestContact)]),
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function viewInstant($id) {
        $guestContact = GuestContactInfo::find($id);
        if($guestContact != null) {
            return response(
                view('layouts.admin.contactus.view_instant', ['contactUs' => $guestContact]),
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
        $guestContact = GuestContactInfo::find($id);
        if($guestContact !=null) {
            $guestContact->delete();
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
