<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestContactInfo extends Model
{
    protected $table = "guest_contact_infos";

    public static function searchContact($requestData) {
        $contactUs = GuestContactInfo::where('name','like', "%".$requestData."%")
            ->orWhere('title','like',"%".$requestData."%")
            ->orWhere('email','like', "%".$requestData."%");
        return $contactUs;
    }
}
