<?php

namespace App\Http\Controllers;

use App\CandidateInfo;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','isCandidateGuestManager']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = null;
        $status = null;
        if($request->has('name') && !empty($request->name)){
            $name = $request->name;
            $name = htmlspecialchars($name);
        }
        if($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            $status = htmlspecialchars($status);
        }
        $candidates = CandidateInfo::searchContact($name, $status);
        if(!empty($candidates)) {
            $candidates = $candidates->orderBy('created_at', 'desc')->paginate(20);
        } else {
            $candidates = CandidateInfo::orderBy('created_at', 'desc')->paginate(20);
        }

        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.candidate_contact.table', ['candidates' => $candidates, 'count' => count($candidates)]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return view('layouts.admin.candidate_contact.index')
            ->with('candidates', $candidates)
            ->with('count', count($candidates));
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
        $candidates = CandidateInfo::find($id);
        if($candidates != null) {
            $dataSpan = "";
            if($candidates->status == config('global.statusActive')) {
                $candidates->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$candidates->id."' data-href='".route('candidate.toggleRead', $candidates->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.read'.$candidates->status)."</span>";
            } else if ($candidates->status == config('global.statusDisable')){
                $candidates->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$candidates->id."' data-href='".route('candidate.toggleRead', $candidates->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.read'.$candidates->status)."</span>";
            }
            $candidates->save();
        }
        return response(
            $dataSpan,
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function searchContact(Request $request){
        $candidates = null;
        $name = null;
        $status = null;
        if($request->has('name') && !empty($request->name)){
            $name = $request->name;
            $name = htmlspecialchars($name);
        }
        if($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            $status = htmlspecialchars($status);
        }
        $candidates = CandidateInfo::searchContact($name, $status);
        if(!empty($candidates)) {
            $candidates = $candidates->orderBy('created_at', 'desc')->paginate(20);
        } else {
            $candidates = CandidateInfo::orderBy('created_at', 'desc')->paginate(20);
        }
        return response(
            view('layouts.admin.candidate_contact.table', ['candidates' => $candidates, 'count' => count($candidates)]),
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function viewInstant($id) {
        $candidates = CandidateInfo::find($id);
        if($candidates != null) {
            return response(
                view('layouts.admin.candidate_contact.view_instant', ['candidate' => $candidates]),
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
        $candidates = CandidateInfo::find($id);
        if($candidates !=null) {
            $candidates->delete();
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
