<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class JobType extends Model
{
    //
    protected $table = "job_types";

    public static function setData(JobType $jobType, Request $request) {
        $jobType->abbr = $request->abbr;
        $jobType->name = $request->name;
        return $jobType;
    }

    public function jobLevels(){
        return $this->hasMany('App\JobLevel', 'job_type_id');
    }

    public function jobCates(){
        return $this->hasMany('App\JobCategory','job_type_id');
    }
}
