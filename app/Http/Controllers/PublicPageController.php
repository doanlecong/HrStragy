<?php

namespace App\Http\Controllers;

use App\ClientService;
use App\CompanyInfoSetting;
use App\CooperateInfo;
use App\CustomerStory;
use App\Job;
use App\OurService;
use App\TypeClientService;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{

    public function notFound() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::all();
        $clientService = TypeClientService::select(['id', 'name'])->get();

        return view('user_404')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)->with('info', $companyInfo);
    }

    public function welcome() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::select(['id', 'title','description', 'image'])->get();
        $clientService = TypeClientService::select(['id', 'name'])->get();
        $ourCoops = CooperateInfo::where('status', config('global.statusActive'))->orderBy('order','asc')->get();
        $newJobs = Job::where('status', config('global.statusActive'))->where('time_to','>',date('Y-m-d'))->orderBy('created_at', 'desc')->limit(8)->get();
        return view('welcome')->with('ourservices', $ourService)->with('clientServices', $clientService)->with('ourCoops', $ourCoops)->with('jobs', $newJobs)->with('info', $companyInfo);
    }

    public function aboutUs() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::select(['id', 'title'])->get();
        $clientService = TypeClientService::select(['id', 'name'])->get();
        $companyInfo = CompanyInfoSetting::first();
        return view('aboutus')->with('companyInfo', $companyInfo)->with('ourservices', $ourService)->with('clientServices', $clientService)->with('info', $companyInfo);
    }

    public function jobSearch(Request $request) {

        $jobs = Job::searchJob($request);
        if( !empty($jobs)) {
            $jobs = $jobs->where('status', config('global.statusActive'))->where('time_to','>',date('Y-m-d'))->paginate(10);
        } else{
            $jobs = Job::where('status', config('global.statusActive'))->where('time_to','>',date('Y-m-d'))->paginate(10);
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

        $ourService = OurService::select(['id', 'title'])->get();
        $clientService = TypeClientService::select(['id', 'name'])->get();

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
            $clientService = TypeClientService::select(['id', 'name'])->get();
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
        $clientService = TypeClientService::select(['id', 'name'])->get();

        return view('ourservices')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)->with('info', $companyInfo);
    }

    public function viewService(Request $request) {
        $service = $request->service;
        if(!empty($service)) {
            $serviceId = decrypt($service);
            if($serviceGET = OurService::find($serviceId)) {
                // Get Date To Header
                $companyInfo = CompanyInfoSetting::first();
                $ourService = OurService::select(['id', 'title'])->get();
                $clientService = TypeClientService::select(['id', 'name'])->get();
                return view('view_service')
                    ->with('serviceSelect',$serviceGET)
                    ->with('ourservices', $ourService)
                    ->with('clientServices', $clientService)
                    ->with('info', $companyInfo);
            }
        }
        return redirect()->route('notFound_404');
    }

    public function clientService() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::select(['id', 'title'])->get();
        $clientService = TypeClientService::all();
        return view('client_service')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo);
    }

    public function viewTypeClientService(Request $request) {
        $service = $request->service;
        if(!empty($service)) {
            $serviceId = decrypt($service);
            if($serviceGET = TypeClientService::find($serviceId)) {
                // Get Date To Header
                $companyInfo = CompanyInfoSetting::first();
                $ourService = OurService::select(['id', 'title'])->get();
                $clientService = TypeClientService::select(['id', 'name'])->get();
                $svInsideType = ClientService::where('type_client_service_id', $serviceId)->where('status', config('global.statusActive'))->paginate(20);
                return view('view_type_client_service')
                    ->with('serInsides', $svInsideType)
                    ->with('serviceSelect',$serviceGET)
                    ->with('ourservices', $ourService)
                    ->with('clientServices', $clientService)
                    ->with('info', $companyInfo);
            }
        }
        return redirect()->route('notFound_404');
    }

    public function viewClientService(Request $request) {
        $serviceID = $request->service;

        if(!empty($serviceID)) {
            if($serviceGET = ClientService::find($serviceID)) {
                $ourService = OurService::select(['id', 'title'])->get();
                $companyInfo = CompanyInfoSetting::first();
                $clientService = TypeClientService::select(['id', 'name'])->get();
                $relatePostsBig = ClientService::select(['id','title'])->where('status', config('global.statusActive'))->where('id','>',$serviceID)->limit(10)->get()->toArray();
                $relatePostsSmall =  ClientService::select(['id','title'])->where('status', config('global.statusActive'))->where('id','<',$serviceID)->limit(10)->get()->toArray();
                $relatePosts = array_merge($relatePostsBig, $relatePostsSmall);

                return view('view_clien_service')
                    ->with('serviceSelect',$serviceGET)
                    ->with('relatePosts', $relatePosts)
                    ->with('ourservices', $ourService)
                    ->with('clientServices', $clientService)
                    ->with('info', $companyInfo);
            }
        }
        return redirect()->route('notFound_404');
    }


    public function customerStory() {
        $customerStories = CustomerStory::orderBy('created_at', 'desc')->paginate(20);
        $ourService = OurService::select(['id', 'title'])->get();
        $clientService = TypeClientService::select(['id', 'name'])->get();
        $companyInfo = CompanyInfoSetting::first();
//        return dd($customerStories);
        return view('customer_stories')
            ->with('custStories', $customerStories)
            ->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo);
    }

    public function viewCustomerStory(Request $request) {
        $storyId = $request->story;
        if($story = CustomerStory::find($storyId)) {
            $companyInfo = CompanyInfoSetting::first();
            $ourService = OurService::select(['id', 'title'])->get();
            $clientService = TypeClientService::select(['id', 'name'])->get();
            $storyBig = CustomerStory::select(['id','title'])->where('status', config('global.statusActive'))->where('id','>',$storyId)->limit(10)->get()->toArray();
            $storySmall  = CustomerStory::select(['id','title'])->where('status', config('global.statusActive'))->where('id','<',$storyId)->limit(10)->get()->toArray();
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
        $ourService = OurService::select(['id', 'title'])->get();
        $clientService = TypeClientService::select(['id', 'name'])->get();
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

    public function candidate() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::select(['id', 'title'])->get();
        $clientService = TypeClientService::select(['id', 'name'])->get();
        return view('contactus_candidate')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo);
    }

    public function guest() {
        $companyInfo = CompanyInfoSetting::first();
        $ourService = OurService::select(['id', 'title'])->get();
        $clientService = TypeClientService::select(['id', 'name'])->get();
        return view('contact_guest')->with('ourservices', $ourService)
            ->with('clientServices', $clientService)
            ->with('info', $companyInfo);
    }

}

