<?php

namespace App\Http\Controllers;

use App\OurService;
use Illuminate\Http\Request;
use Purifier;

class OurServiceController extends Controller
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
        $ourServices = OurService::paginate(10);
        return view('layouts.admin.ourservice.index')
            ->with('services', $ourServices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.ourservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:200',
            'image' => 'required',
            'contentInfo' => 'required',
            'description' => "required"
        ]);

        $ourService = new OurService();
        $slug = str_slug($request->title, '-');
        $canUseSlug = OurService::checkSlug($slug, null);
        if(!$canUseSlug) {
            $slug = $slug.rand(1000,9999);
        }
        $ourService->slug = $slug;
        $ourService->title = $request->title;
        $ourService->image = $request->image;
        $ourService->description = Purifier::clean($request->description);
        $ourService->content = $request->contentInfo;

        $ourService->save();
        return redirect()->route('our_service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function viewInstant($id)
    {
        $ourService = OurService::find($id);
        return response(
            view('layouts.admin.ourservice.view_instant', ['service' => $ourService]),
            200,
            ['Content-Type', 'application/json']
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ourSevice = OurService::find($id);
        if ($ourSevice != null) {
            return view('layouts.admin.ourservice.edit')->with('service', $ourSevice);
        }
        return redirect()->route('404');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'image' => 'required',
            'contentInfo' => 'required',
            'description' => "required"
        ]);

        $ourService = OurService::find($id);
        if ($ourService != null) {
            if($request->title != $ourService->title) {
                $slug = str_slug($request->title, '-');
                if(!OurService::checkSlug($slug, $ourService->id)) {
                    $slug = $slug.rand(1000, 9999);
                }
                $ourService->slug = $slug;
            }

            $ourService->title = $request->title;
            $ourService->image = $request->image;
            $ourService->description = Purifier::clean($request->description);
            $ourService->content = $request->contentInfo;
            $ourService->save();
            return redirect()->route('our_service.index');
        }
        return redirect()->route('404');
    }

    public function delete(Request $request, $id)
    {
        $ourService = OurService::find($id);
        if($ourService !=null) {
            $ourService->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('our_service.index');
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
