<?php

namespace App\Http\Controllers;

use App\CustomerStory;
use Illuminate\Http\Request;

class CustomerStoryController extends Controller
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
    public function index(Request $request)
    {
        $customerStories =CustomerStory::orderBy('created_at', 'desc')->paginate(10);
        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.customer_story.table', ['cstories' => $customerStories,'count' => count($customerStories)]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return view('layouts.admin.customer_story.index')->with('cstories', $customerStories)->with('count', count($customerStories));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.customer_story.create');
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
            'title' => 'required|max:200',
            'writer' => 'required|max:200',
            'description' => 'required',
            'image_thumb' => 'required',
            'contentInfo' => 'required'
        ]);

        $cusStory = new CustomerStory();
        $cusStory = CustomerStory::setData($cusStory, $request);
        $slug = str_slug($request->title, '-');
        $canUseSlug = CustomerStory::checkSlug($slug, null);
        if(!$canUseSlug) {
            $slug = $slug.rand(1000,9999);
        }
        $cusStory->slug = $slug;
        $cusStory->save();
        return redirect()->route('customer_story.index');
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

    public function searchCustomerStory(Request $request){
        $custStory = null;
        $name = $request->name;
        $name = htmlspecialchars($name);
        if($name != null && $name != "" && !empty($name)) {
            $custStory = CustomerStory::findByTitle($name)->orderBy('created_at','asc')->paginate(5);
        } else {
            $custStory = CustomerStory::paginate(10);
        }
        return response(
            view('layouts.admin.customer_story.table', ['cstories' => $custStory,'count' => count($custStory)]),
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function viewInstant($id) {
        $custStory = CustomerStory::find($id);
        return response(
            view('layouts.admin.customer_story.view_instant', ['custStory' => $custStory]),
            200,
            ['Content-Type', 'application/json']
        );
    }


    public function toggleShow($id) {
        $custStory = CustomerStory::find($id);
        $dataSpan = "";
        if($custStory != null) {
            if($custStory->status == config('global.statusActive')) {
                $custStory->status = config('global.statusDisable');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$custStory->id."' data-href='".route('customer_story.toggleShow', $custStory->id)."' class='badge badge-danger white-text toogle-show box-shadown-light-dark'>". config('global.'.$custStory->status)."</span>";
            } else if ($custStory->status == config('global.statusDisable')){
                $custStory->status = config('global.statusActive');
                $dataSpan = "<span style='cursor: pointer;' title='Click to show or hide this in customer page' data-id='".$custStory->id."' data-href='".route('customer_story.toggleShow', $custStory->id)."' class='badge background-green white-text toogle-show box-shadown-light-dark'>". config('global.'.$custStory->status)."</span>";
            }
            $custStory->save();
        }
        return response(
            $dataSpan,
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
        if(!empty($cusStory = CustomerStory::find($id))) {
            return view('layouts.admin.customer_story.edit')->with('custStory', $cusStory);
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
        if(!empty($cusStory = CustomerStory::find($id))) {
            $this->validate($request, [
                'title' => 'required|max:200',
                'writer' => 'required|max:200',
                'description' => 'required',
                'image_thumb' => 'required',
                'contentInfo' => 'required'
            ]);
            $cusStory = CustomerStory::setData($cusStory, $request);
            if($request->title != $cusStory->title) {
                $slug = str_slug($request->title, '-');
                if(!CustomerStory::checkSlug($slug, $cusStory->id)) {
                    $slug = $slug.rand(1000, 9999);
                }
                $cusStory->slug = $slug;
            }
            $cusStory->save();
            return redirect()->route('customer_story.index');
        }
        return redirect()->route('404');
    }

    public function delete(Request $request, $id) {

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
