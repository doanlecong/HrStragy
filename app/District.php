<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class District extends Model
{
    //
    protected $table = "districts";

    public static function setData(District $district, Request $request) {
        $district->name = $request->name;
        $district->code = $request->code;
        $district->province_id = $request->province_id;
        $district->country_id = $request->province_id;
        return $district;
    }

    public function province() {
        return $this->belongsTo('App\Province','province_id');
    }

    public function country() {
        return $this->belongsTo('App\Country', 'country_id');
    }
}
