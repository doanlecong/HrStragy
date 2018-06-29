<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class JobLevel extends Model
{
    //
    protected $table = "job_levels";

    public static function setData(JobLevel $jobLevel,Request $request) {
        $jobLevel->abbrie = $request->abbr;
        $jobLevel->name = $request->name;
        $jobLevel->job_type_id = $request->job_type_id;
        return $jobLevel;
    }

    public function jobType() {
        return $this->belongsTo('App\JobType', 'job_type_id');
    }
}
