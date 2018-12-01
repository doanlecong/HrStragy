<?php

namespace App\Http\Controllers;

use App\ClientService;
use App\CompanyInfoSetting;
use App\CooperateInfo;
use App\CustomerStory;
use App\InternalRecruitmentNote;
use App\Job;
use App\OurCompanyProfile;
use App\OurService;
use App\OurStaffInFo;
use App\TypeClientService;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{

    public function notFound() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::all();
        $clientService = TypeClientService::select(['id', 'name','slug'])->get();

        return view('user_404')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)->with('info', $companyInfo);
    }

    public function welcome() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::select(['id', 'title','slug','description', 'image'])->get();
        $clientService = TypeClientService::select(['id', 'name','slug'])->get();
        $ourCoops = CooperateInfo::where('status', config('global.statusActive'))->orderBy('order','asc')->get();
        $typeDisplayJob = config('global.type_display_job');
        if($typeDisplayJob ==='created_time'){
            $newJobs = Job::where('status', config('global.statusActive'))->orderBy('created_at', 'desc')
                ->limit(config('global.limit_number_job_on_homepage') ?? 10)->get();
        } else if($typeDisplayJob === 'time_end_job') {
            $newJobs = Job::where('status', config('global.statusActive'))->where('time_to','>',date('Y-m-d'))
                ->orderBy('created_at', 'desc')->limit(config('global.limit_number_job_on_homepage') ?? 10)->get();
        } else {
            $newJobs = Job::where('status', config('global.statusActive'))->where('time_to','>',date('Y-m-d'))
                ->orderBy('created_at', 'desc')->limit(config('global.limit_number_job_on_homepage')?? 10)->get();
        }
        return view('welcome')->with('ourservices', $ourService)->with('clientServices', $clientService)->with('ourCoops', $ourCoops)->with('jobs', $newJobs)->with('info', $companyInfo);
    }

    public function aboutUs() {
        $ourService = OurService::select(['id', 'title','slug'])->get();
        $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
        $companyInfo = CompanyInfoSetting::first();
        return view('aboutus')->with('companyInfo', $companyInfo)->with('ourservices', $ourService)->with('clientServices', $clientService)->with('info', $companyInfo);
    }

    public function companyProfile() {
        $ourService = OurService::select(['id', 'title','slug'])->get();
        $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
        $companyInfo = OurCompanyProfile::first();
        $info = CompanyInfoSetting::first();
        return view('company_profile')->with('companyInfo', $companyInfo)->with('ourservices', $ourService)->with('clientServices', $clientService)->with('info', $info);
    }

    public function ourStaff() {
        $ourService = OurService::select(['id', 'title','slug'])->get();
        $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
        $companyInfo = OurStaffInFo::first();
        $info = CompanyInfoSetting::first();
        return view('our_staff')->with('companyInfo', $companyInfo)->with('ourservices', $ourService)->with('clientServices', $clientService)->with('info', $info);
    }

    public function internalRecruitment() {
        $ourService = OurService::select(['id', 'title','slug'])->get();
        $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
        $companyInfo = InternalRecruitmentNote::first();
        $info = CompanyInfoSetting::first();
        return view('internal_recruitment')->with('companyInfo', $companyInfo)->with('ourservices', $ourService)->with('clientServices', $clientService)->with('info', $info);
    }

    public function jobSearch(Request $request) {

        $jobs = Job::searchJob($request);
        if( !empty($jobs)) {
            $jobs = $jobs->where('status', config('global.statusActive'))->orderBy('created_at', 'desc')->paginate(10);
        } else{
            $jobs = Job::where('status', config('global.statusActive'))->orderBy('created_at', 'desc')->paginate(10);
        }
        if($request->isXmlHttpRequest()) {
            return response(
                view('list_job', ['jobs' => $jobs, 'count' => count($jobs)]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        $companyInfo = CompanyInfoSetting::first();
        $jobTypes = \App\JobType::select(['id', 'name', 'abbr'])->where('status', config('global.statusActive'))->get();
        $provinces = \App\Province::where('status', config('global.statusActive'))->get();

        $ourService = OurService::select(['id', 'title','slug'])->get();
        $clientService = TypeClientService::select(['id', 'name','slug'])->get();

        return view('job_search')->with('jobs',$jobs)
            ->with('jobTypes', $jobTypes)
            ->with('provinces', $provinces)
            ->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo);
    }


    public function viewJobSearch($slug) {
        $rawSlug = Job::convertSlug($slug);
        if($rawSlug && $job = Job::findBySlug($rawSlug)) {
            $companyInfo = CompanyInfoSetting::first();
            $jobRelateBig = Job::findRelateBig($job->job_type_id, $job->id);
            $jobRalateSmall = Job::findRelateSmall($job->job_type_id, $job->id);
            $ourService = OurService::all();
            $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
            return view('view_job')
                ->with('ourservices', $ourService)
                ->with('clientServices', $clientService)
                ->with('job', $job)
                ->with('jobSmalls', $jobRalateSmall)
                ->with('jobBigs', $jobRelateBig)
                ->with('info', $companyInfo);
        }
        return redirect()->route('notFound_404');
    }


    public function ourService() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::all();
        $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();

        return view('ourservices')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)->with('info', $companyInfo);
    }

    public function viewService($slug) {
        $rawSlug = OurService::convertSlug($slug);
        if($rawSlug && $serviceGET = OurService::findBySlug($rawSlug)) {
                // Get Date To Header
                $companyInfo = CompanyInfoSetting::first();
                $ourService = OurService::select(['id', 'title', 'slug'])->get();
                $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
                return view('view_service')
                    ->with('serviceSelect',$serviceGET)
                    ->with('ourservices', $ourService)
                    ->with('clientServices', $clientService)
                    ->with('info', $companyInfo);
        }
        return redirect()->route('notFound_404');
    }

    public function clientService() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::select(['id', 'title','slug'])->get();
        $clientService = TypeClientService::all();
        return view('client_service')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo);
    }

    public function viewTypeClientService($slug) {
        $rawSlug = TypeClientService::convertSlug($slug);
        if($rawSlug && $serviceGET = TypeClientService::findBySlug($rawSlug)) {
            // Get Date To Header
            $companyInfo = CompanyInfoSetting::first();
            $ourService = OurService::select(['id', 'title','slug'])->get();
            $clientService = TypeClientService::select(['id', 'name','slug'])->get();
            $svInsideType = ClientService::where('type_client_service_id', $serviceGET->id)->where('status', config('global.statusActive'))->orderBy('created_at','desc')->paginate(20);
            return view('view_type_client_service')
                ->with('serInsides', $svInsideType)
                ->with('serviceSelect',$serviceGET)
                ->with('ourservices', $ourService)
                ->with('clientServices', $clientService)
                ->with('info', $companyInfo);
        }

        return redirect()->route('notFound_404');
    }

    public function viewClientService($slug) {
        $rawSlug = TypeClientService::convertSlug($slug);

        if($rawSlug && $serviceGET = ClientService::findBySlug($rawSlug)) {
            $ourService = OurService::select(['id', 'title','slug'])->get();
            $companyInfo = CompanyInfoSetting::first();
            $clientService = TypeClientService::select(['id', 'name','slug'])->get();
            $relatePostsBig = ClientService::select(['id','title', 'slug'])->where('status', config('global.statusActive'))->where('id','>',$serviceGET->id)->limit(10)->get()->toArray();
            $relatePostsSmall =  ClientService::select(['id','title','slug'])->where('status', config('global.statusActive'))->where('id','<',$serviceGET->id)->limit(10)->get()->toArray();
            $relatePosts = array_merge($relatePostsBig, $relatePostsSmall);

            return view('view_clien_service')
                ->with('serviceSelect',$serviceGET)
                ->with('relatePosts', $relatePosts)
                ->with('ourservices', $ourService)
                ->with('clientServices', $clientService)
                ->with('info', $companyInfo);
        }

        return redirect()->route('notFound_404');
    }


    public function customerStory() {
        $customerStories = CustomerStory::where('status', config('global.statusActive'))->orderBy('created_at', 'desc')->paginate(20);
        $ourService = OurService::select(['id', 'title', 'slug'])->get();
        $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
        $companyInfo = CompanyInfoSetting::first();
//        return dd($customerStories);
        return view('customer_stories')
            ->with('custStories', $customerStories)
            ->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo);
    }

    public function viewCustomerStory($slug) {
        $rawSlug = CustomerStory::convertSlug($slug);
        if($rawSlug && $story = CustomerStory::findBySlug($rawSlug)) {
            $companyInfo = CompanyInfoSetting::first();
            $ourService = OurService::select(['id', 'title', 'slug'])->get();
            $clientService = TypeClientService::select(['id', 'name','slug'])->get();
            $storyBig = CustomerStory::select(['id','title','slug'])->where('status', config('global.statusActive'))->where('id','>',$story->id)->limit(10)->get()->toArray();
            $storySmall  = CustomerStory::select(['id','title','slug'])->where('status', config('global.statusActive'))->where('id','<',$story->id)->limit(10)->get()->toArray();
            $stories = array_merge($storySmall, $storyBig);
            return view('view_cust_story')
                ->with('story', $story)
                ->with('storyList', $stories)
                ->with('ourservices', $ourService)
                ->with('clientServices', $clientService)
                ->with('info', $companyInfo);
        }
        return redirect()->route('notFound_404');
    }

    public function ourCooperate() {
        $ourService = OurService::select(['id', 'title', 'slug'])->get();
        $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
        $ourCoops = CooperateInfo::where('status', config('global.statusActive'))->orderBy('order','asc')->get();
        $companyInfo = CompanyInfoSetting::first();
        return view('ourcooperate')
            ->with('ourCoops', $ourCoops)
            ->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo);
    }

    public function showCooperate(Request $request) {
        $id = $request->coop;
        if(!empty($id) && !empty($coop = CooperateInfo::find($id))) {
            return response(
                view('layouts.admin.cooperate.view_instant', ['coop' => $coop]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return response()->json([
            'success' => false,
            'message' => "Not Found ! May be it has been delete !",
        ],404);
    }

    public function candidate(Request $request) {
        $jobSlug = $rawSlug = Job::convertSlug($request->job);
        if($jobSlug && $job = Job::findBySlug($jobSlug)) {
            $jobID = $job->id;
        }
        else {
            $jobID = -1;
        }
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::select(['id', 'title', 'slug'])->get();
        $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
        $jobTypes = \App\JobType::select(['id', 'name', 'abbr'])->where('status', config('global.statusActive'))->get();
        $provinces = \App\Province::where('status', config('global.statusActive'))->get();
        return view('contactus_candidate')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo)
            ->with('job_id', $jobID)
            ->with('jobTypes',$jobTypes ?? [])
            ->with('addresses', $provinces ?? []);
    }

    public function guest() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::select(['id', 'title', 'slug'])->get();
        $clientService = TypeClientService::select(['id', 'name', 'slug'])->get();
        return view('contact_guest')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo);
    }

    public function getDataImportant() {
        $publicPath = storage_path().'/app/public/';
        $listFileInPath = array_diff(scandir($publicPath), ['.','..']);
        $zipName = date('YmdHi').rand(100,4444).'.zip';
        $zipPath = storage_path().'/app/'.$zipName;
        $zipObject = new \ZipArchive();
        $zipObject->open($zipPath,\ZipArchive::CREATE);
        foreach ($listFileInPath as $fileName) {
            $zipObject->addFile($publicPath.$fileName);
        }
        $zipObject->close();
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

}

