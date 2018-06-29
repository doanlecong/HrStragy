<?php

namespace App\Http\Controllers;

use App\CooperateInfo;
use Illuminate\Http\Request;

class CooperateController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isCoopCompanyInfoManager']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooperates = CooperateInfo::orderBy('order', 'asc')->get();
        $minOrder = CooperateInfo::getMinOrder();
        $maxOrder = CooperateInfo::getCurrentMaxOrder();
        return view('layouts.admin.cooperate.index')
            ->with('coops',$cooperates)
            ->with('min', $minOrder)
            ->with('max', $maxOrder)
            ->with('count', count($cooperates));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.cooperate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:100',
            'descript' => 'required|max:500',
            'image_thumb' => 'required',
            'link' => 'required',
            'image_big' => 'required',
            'contentInfo' => 'required'
        ]);
        $currentMaxOrder = CooperateInfo::getCurrentMaxOrder();
        $coop =  new CooperateInfo();
        $coop = CooperateInfo::setData($coop, $request);
        $coop->order = $currentMaxOrder + 1;
        $coop->save();
        return redirect()->route('cooperate.index');

    }

    public function moveUp($id){
        $coop = CooperateInfo::find($id);
        if($coop != null) {
            $upDirection = config('global.up');
            CooperateInfo::changeOrder($coop, $upDirection);
        }
        return $this->getNewDataOrder();
    }

    public function moveDown($id) {
        $coop = CooperateInfo::find($id);
        if($coop != null) {
            $upDirection = config('global.down');
            CooperateInfo::changeOrder($coop, $upDirection);
        }
        return $this->getNewDataOrder();
    }


    public function getNewDataOrder() {
        $cooperates = CooperateInfo::orderBy('order', 'asc')->get();
        $minOrder = CooperateInfo::getMinOrder();
        $maxOrder = CooperateInfo::getCurrentMaxOrder();
        return response(
            view('layouts.admin.cooperate.table', ['coops' => $cooperates, 'min' => $minOrder , 'max' => $maxOrder, 'count' => count($cooperates)]),
            200,
            ['Content-Type', 'application/json']
        );
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

    public function viewInstant($id) {
        $coop = CooperateInfo::find($id);
        return response(
            view('layouts.admin.cooperate.view_instant', ['coop' => $coop]),
            200,
            ['Content-Type', 'application/json']
        );
    }



    public function toggleShow($id) {
        $coop = CooperateInfo::find($id);
        if($coop != null) {
            if($coop->status == config('global.statusActive')) {
                $coop->status = config('global.statusDisable');
            } else if ($coop->status == config('global.statusDisable')){
                $coop->status = config('global.statusActive');
            }
            $coop->save();
        }
        return $this->getNewDataOrder();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coop = CooperateInfo::find($id);
        if($coop!= null) {
            return view('layouts.admin.cooperate.edit')->with('coop', $coop);
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
        $this->validate($request,[
            'title' => 'required|max:100',
            'descript' => 'required|max:500',
            'image_thumb' => 'required',
            'link' => 'required',
            'image_big' => 'required',
            'contentInfo' => 'required'
        ]);
        
        $coop = CooperateInfo::find($id);
        if($coop != null) {
            $coop = CooperateInfo::setData($coop, $request);
            $coop->save();
            return redirect()->route('cooperate.index');
        }
        return redirect()->route('404');
    }



    public function delete(Request $request, $id) {
        $coop = CooperateInfo::find($id);
        if($coop !=null) {
            $coop->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('cooperate.index');
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
