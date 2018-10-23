<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Purifier;
class ClientService extends Model
{
    //
    protected $table = "client_services";

    public function type() {
        return $this->belongsTo('App\TypeClientService','type_client_service_id');
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
        return ClientService::where('slug',$slug)->where('status',config('global.statusActive'))->first();
    }

    public static function checkSlug($slug = null, $id = null) {
        $type = null;
        if(!empty($slug)) {
            if(!empty($id)) {
                $type = ClientService::where('slug',$slug)->where('id','<>', $id)->first();
            }
            else {
                $type = ClientService::where('slug', $slug)->first();
            }
        }
        return ($type != null) ? false : true;
    }
}
