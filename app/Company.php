<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Purifier;
class Company extends Model
{
    //
    protected $table = "companies";

    public static function setData(Company $company, Request $request) {
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = Purifier::clean($request->address);
        $company->description = Purifier::clean($request->description);
        $company->image = $request->image;
        $company->content = $request->contentInfo;
        return $company;
    }

    public static function findByName($name = '') {
        if( $name != '') {
            $comps = Company::where('name','like', '%'.$name.'%');
            return $comps;
        }
        return null;
    }

    public function jobs() {
        return $this->hasMany('App\Job','company_id');
    }
}
