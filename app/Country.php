<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Country extends Model
{
    //
    protected $table = "countries";


    public static function setData(Country $country, Request $request) {
        $country->name = $request->name;
        $country->code = $request->code;
        return $country;
    }

    public function provinces() {
        return $this->hasMany('App\Province','country_id');
    }
}
