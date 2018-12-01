<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateInfo extends Model
{
    //
    protected $table = "candidate_infos";

    public static function searchContact($name = null, $status = null) {
        $contactUs = null;
        if(!empty($name)) {
            $contactUs = CandidateInfo::where(function ($query) use ($name) {
                $query->where('name','like', "%".$name."%")
                    ->orWhere('phone','like',"%".$name."%")
                    ->orWhere('email','like', "%".$name."%");
            });
            if(!empty($status)) {
                $contactUs = $contactUs->where(function ($query) use ($status) {
                    $query->where('status', $status);
                });
            }
        } else {
            if(!empty($status)) {
                $contactUs = CandidateInfo::where('status', $status);
            }
        }
        return $contactUs;
    }

    public static function getData($arrSearch) {
        $query = (new CandidateInfo)->newQuery();
        if(isset($arrSearch['name']) && !empty($arrSearch['name'])) {
            $query = $query->where('name','LIKE','%'.$arrSearch['name'].'%');
        }

        if(isset($arrSearch['phone']) && !empty($arrSearch['phone'])) {
            $query = $query->where('phone', 'LIKE',$arrSearch['phone'].'%');
        }
        if(isset($arrSearch['email']) && !empty($arrSearch['email'])) {
            $query = $query->where('email','LIKE',$arrSearch['email'].'%');
        }

        if (isset($arrSearch['location']) && !empty($arrSearch['location'])) {
            $query = $query->where('address','=', $arrSearch['location']);
        }

        if(isset($arrSearch['industry']) && !empty($arrSearch['industry'])) {
            $query = $query->where('industry', '=',$arrSearch['industry']);
        }
        $query = $query->orderBy('created_at','desc');
        $data = $query->paginate(20);
        return $data;
    }
}
