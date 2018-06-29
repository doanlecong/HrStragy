<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailSubcriber extends Model
{
    //
    protected $table = "mail_subscribers";

    public function jobType() {
        return $this->belongsTo('App\JobType', 'job_type_id');
    }
    public function province() {
        return $this->belongsTo('App\Province', 'province_id');
    }
}
