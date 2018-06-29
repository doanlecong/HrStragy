<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class JobCategory extends Model
{
    //
    protected $table = "job_categories";

    public static function setData(JobCategory $jobCategory, Request $request) {
        $jobCategory->name = $request->name;
        $jobCategory->job_type_id = $request->job_type_id;
        return $jobCategory;
    }

    public function jobType() {
        return $this->belongsTo('App\JobType','job_type_id');
    }
}
