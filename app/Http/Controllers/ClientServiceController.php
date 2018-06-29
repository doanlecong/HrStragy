<?php

namespace App\Http\Controllers;

use App\ClientService;
use App\TypeClientService;
use Illuminate\Http\Request;

class ClientServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isStoryServiceManager']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ClientService::paginate(10);
        return view('layouts.admin.clientservice.index')
            ->with('services', $services);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeClientService::all();
        return view('layouts.admin.clientservice.create')->with('types',$types);
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
            'title'=>'required|max:100',
            'type_service' => 'required',
            'image' => 'required',
            'contentInfo' =>'required',
        ]);
        $clientService = new ClientService();
        $clientService->title = $request->title;
        $clientService->type_client_service_id = $request->type_service;
        $clientService->image = $request->image;
        $clientService->content = $request->contentInfo;

        $clientService->save();
        return redirect()->route('client_service.index');
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

    public function viewInstant($id)
    {
        $clientService = ClientService::find($id);
        return response(
            view('layouts.admin.clientservice.view_instant', ['service' => $clientService]),
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
        $clientService = ClientService::find($id);
        if ($clientService != null) {
            $types = TypeClientService::all();
            return view('layouts.admin.clientservice.edit')->with('service', $clientService)
                ->with('types',$types);
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
            'title'=>'required|max:100',
            'type_service' => 'required',
            'image' => 'required',
            'contentInfo' =>'required',
        ]);
        $clientService = ClientService::find($id);
        if ($clientService != null) {
            $clientService->title = $request->title;
            $clientService->image = $request->image;
            $clientService->type_client_service_id = $request->type_service;
            $clientService->content = $request->contentInfo;
            $clientService->save();
            return redirect()->route('client_service.index');
        }
        return redirect()->route('404');
    }

    public function delete(Request $request, $id)
    {
        $clientService = ClientService::find($id);
        if($clientService !=null) {
            $clientService->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('client_service.index');
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
