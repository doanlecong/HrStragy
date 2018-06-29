<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    //
    protected $table = 'contact_infos';

    public static function searchContact($requestData) {
        $contactUs = ContactInfo::where('name','like', "%".$requestData."%")
            ->orWhere('title','like',"%".$requestData."%")
            ->orWhere('email','like', "%".$requestData."%");
        return $contactUs;
    }
}
