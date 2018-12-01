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

    /****
     * @return array
     * **/
    public static function getData($arrSearch = []) {
        $query = (new MailSubcriber())->newQuery();
        if(isset($arrSearch['email']) && !empty($arrSearch['email'])) {
            $query = $query->where('email','LIKE',$arrSearch['email'].'%');
        }

        if (isset($arrSearch['location']) && !empty($arrSearch['location'])) {
            $query = $query->where('province_id','=', $arrSearch['location']);
        }

        if(isset($arrSearch['industry']) && !empty($arrSearch['industry'])) {
            $query = $query->where('job_type_id', '=',$arrSearch['industry']);
        }
//        $query = $query->orderBy('created_at','desc');
        $data = $query->paginate(20);
        return $data;
    }
}
