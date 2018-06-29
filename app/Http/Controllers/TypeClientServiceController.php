<?php

namespace App\Http\Controllers;

use App\TypeClientService;
use Illuminate\Http\Request;
use Purifier;

class TypeClientServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isStoryServiceManager']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types =  TypeClientService::all();
        return view('layouts.admin.type_client_service.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.type_client_service.create');
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
            'name'=>'required|max:100',
            'descript' =>'required',
        ]);

        $type = new TypeClientService();
        $type->name = $request->name;
        $type->image = $request->image;
        $type->descript = Purifier::clean($request->descript);

        $type->save();
        return redirect()->route('type_client_service.index');
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


    ////////////////////////////////////////////////////
    /// for view Instant
    /// ///////////////////////////////////////////////
    public function viewInstant($id){
        $type = TypeClientService::find($id);
        return response(
            view('layouts.admin.type_client_service.view_instant', ['type' => $type]),
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
        $type = TypeClientService::find($id);
        if($type != null) {
            return view('layouts.admin.type_client_service.edit')->with('type', $type);
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
        $this->validate($request, [
            'name'=>'required|max:100',
            'descript' =>'required',
        ]);

        $type = TypeClientService::find($id);
        if($type != null) {
            $type->name = $request->name;
            $type->image = $request->image;
            $type->descript = Purifier::clean($request->descript);

            return redirect()->route('type_client_service.index');
        }
        return redirect()->route('404');
    }


    public function delete(Request $request, $id){
        $type = TypeClientService::find($id);
        if($type !=null) {
            $type->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('type_client_service.index');
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
