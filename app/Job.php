<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Purifier;
class Job extends Model
{
    //
    protected $table = "jobs";

    public function setData(Request $request) {
        $this->job_name = $request->name;
        $this->job_type_id = $request->job_type_id;
        $this->slug = $request->slug;
        $this->country_id = $request->country_id;
        $this->province_id = $request->province_id;
        $this->district_id = $request->district_id;
        $this->company_id = $request->company_id;
        $this->image = $request->image;
        $this->time_from = date('Y-m-d', strtotime($request->time_start));
        $this->time_to = date('Y-m-d', strtotime($request->time_to));
        $this->salary = $request->salary;
        $this->description = Purifier::clean($request->description);
        $this->content = $request->contentInfo;
    }

    public static function checkSlug($slug = null, $id = null) {
        $job = null;
        if(!empty($slug)) {
            if(!empty($id)) {
                $job = Job::where('slug',$slug)->where('id','<>', $id)->first();
            }
            else {
                $job = Job::where('slug', $slug)->first();
            }
        }
        return ($job != null) ? false : true;
    }

    public static function findBySlug($slug) {
        return Job::where('slug',$slug)->where('status',config('global.statusActive'))->first();
    }

    public static function convertSlug($raw) {
        $cleanLink = strip_tags(Purifier::clean($raw));
        $arr = explode('.',$cleanLink);
        if (count($arr) == 2 ) {
            return $arr[0];
        }
        return false;
    }

    public function getArrayCateSelected() {
        $arr = [];
        $cates = $this->jobCates;
        foreach ($cates as $cate) {
            $arr[] = $cate->id;
        }
        return $arr;
    }

    public function getArrayLevelSelected() {
        $arr = [];
        $levels = $this->jobLevels;
        foreach ($levels as $level) {
            $arr[] = $level->id;
        }
        return $arr;
    }

    public static function findRelateBig($jobType, $id) {
        $jobBig = Job::where('status', config('global.statusActive'))
                        ->where('job_type_id', $jobType)
                        ->where('time_to','>', date('Y-m-d'))
                        ->where('id','<',$id)->limit(10)->get();
        return $jobBig;
    }

    public static function findRelateSmall($jobType, $id) {
        $jobSmall = Job::where('status', config('global.statusActive'))
            ->where('job_type_id', $jobType)
            ->where('time_to','>', date('Y-m-d'))
            ->where('id','>',$id)->limit(10)->get();
        return $jobSmall;
    }

    public static function searchJob(Request $request) {
        $name = $request->name;
        $job_types = $request->job_types;
        $provinces = $request->provinces;
        $result = null;
        if(!empty($name)) {
            $result = Job::where(function ($query) use ($name) {
                $query->where('job_name','like', "%".$name."%");
            });
        } else {
            $result = Job::where('job_name','like',"%");
        }
        if(!empty($job_types)) {
            $result = $result->whereIn('job_type_id', $job_types);
        }
        if(!empty($provinces)) {
            $result = $result->whereIn('province_id', $provinces);
        }
        return $result;
    }

    public function country() {
        return $this->belongsTo('App\Country', 'country_id');
    }
    public function province() {
        return $this->belongsTo('App\Province', 'province_id');
    }
    public function jobDistrict() {
        return $this->belongsTo('App\District','district_id');
    }
    public function jobType() {
        return $this->belongsTo('App\JobType','job_type_id');
    }


    public function jobCates() {
        return $this->belongsToMany('App\JobCategory');
    }

    public function jobLevels() {
        return $this->belongsToMany('App\JobLevel');
    }

    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }
}
