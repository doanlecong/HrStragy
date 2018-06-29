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
}
