<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Purifier;

class TypeClientService extends Model
{
    protected $table = "type_client_services";

    public function clientServices() {
        return $this->hasMany('App\ClientService','type_client_service_id');
    }

    public static function convertSlug($raw) {
        $cleanLink = strip_tags(Purifier::clean($raw));
        $arr = explode('.',$cleanLink);
        if (count($arr) == 2 ) {
            return $arr[0];
        }
        return false;
    }

    public static function findBySlug($slug) {
        return TypeClientService::where('slug',$slug)->where('status',config('global.statusActive'))->first();
    }

    public static function checkSlug($slug = null, $id = null) {
        $type = null;
        if(!empty($slug)) {
            if(!empty($id)) {
                $type = TypeClientService::where('slug',$slug)->where('id','<>', $id)->first();
            }
            else {
                $type = TypeClientService::where('slug', $slug)->first();
            }
        }
        return ($type != null) ? false : true;
    }
}
