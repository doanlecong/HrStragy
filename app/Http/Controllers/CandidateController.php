<?php

namespace App\Http\Controllers;

use App\CandidateInfo;
use App\Job;
use App\JobType;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','isCandidateGuestManager','isJobAndRelateManager']);
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
        Log::info($request->all());
//        return response()->json([
//            'success' => true,
//            'data'    => [],
//        ]);
        $arrSearch = [
            'name' => $request->input('name' , null),
            'phone' => $request->input('phone', null),
            'email' => $request->input('email',null),
            'location' => $request->input('location', null),
            'industry' => $request->input('industry', null),
        ];
        $data = CandidateInfo::getData($arrSearch);
        return response(
            view('layouts.admin.candidate_contact.table', ['candidates' => $data, 'count' => count($data), 'arrSearch' => $arrSearch]),
            200,
            ['Content-Type', 'application/json']
        );
    }

    public function getIndutries() {
        $data = JobType::select(['id', 'abbr','name'])->get();
        return response()->json([
            'success' => true,
            'data'    => (count($data)) ? $data->toArray() : [],
        ]);
    }

    public function getLocations() {
        $data = Province::leftJoin('countries', 'provinces.country_id', '=', 'countries.id')
            ->select(['provinces.id','provinces.name', 'countries.name as country_name'])->get();
        return response()->json([
            'success' =>  true,
            'data'    => count($data) ? $data->toArray() : [],
        ]);
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
            if(!empty($candidates->job_id)) {
                if($job = Job::find($candidates->job_id)) {
                    $job->number_apply = ($a = $job->number_apply - 1) > 0 ? $a : 0;
                    $job->save();
                }

            }
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

    public function viewImage($imageName) {
        $path = storage_path('app/public/').$imageName;
        if(File::exists($path)) {
            $handler = new \Symfony\Component\HttpFoundation\File\File($path);
        } else {
            return response('', 404);
        }

        $lifetime = 31556926; // One year in seconds

        /**
         * Prepare some header variables
         */
        $file_time = $handler->getMTime(); // Get the last modified time for the file (Unix timestamp)

        $header_content_type = $handler->getMimeType();
        $header_content_length = $handler->getSize();
        $header_etag = md5($file_time . $path);
        $header_last_modified = gmdate('r', $file_time);
        $header_expires = gmdate('r', $file_time + $lifetime);

        $headers = array(
            'Content-Disposition' => 'inline; filename="' . $imageName. '"',
            'Last-Modified' => $header_last_modified,
            'Cache-Control' => 'must-revalidate',
            'Expires' => $header_expires,
            'Pragma' => 'public',
            'Etag' => $header_etag
        );

        /**
         * Is the resource cached?
         */
        $h1 = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $header_last_modified;
        $h2 = isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $header_etag;

        if ($h1 || $h2) {
            return response('',304,$headers); // File (image) is cached by the browser, so we don't have to send it again
        }

        $headers = array_merge($headers, array(
            'Content-Type' => $header_content_type,
            'Content-Length' => $header_content_length
        ));
        return response(file_get_contents($path), 200, $headers);
        // return Response::make(file_get_contents($path), 200, $headers);
    }

    public function downloadFile($fileName) {
        return Storage::disk('public')->download($fileName);
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
