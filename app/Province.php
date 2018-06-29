<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Province extends Model
{
    //
    protected $table = 'provinces';

    public static function setData(Province $province, Request $request) {
        $province->name = $request->name;
        $province->code = $request->code;
        $province->country_id = $request->country_id;
        return $province;
    }

    public function country() {
        return $this->belongsTo('App\Country', 'country_id');
    }


    public function districts() {
        return $this->hasMany('App\District','province_id');
    }
}
