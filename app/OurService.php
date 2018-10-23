<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Purifier;
class OurService extends Model
{
    //
    protected $table = "our_services";
    public static function checkSlug($slug = null, $id = null) {
        $type = null;
        if(!empty($slug)) {
            if(!empty($id)) {
                $type = OurService::where('slug',$slug)->where('id','<>', $id)->first();
            }
            else {
                $type = OurService::where('slug', $slug)->first();
            }
        }
        return ($type != null) ? false : true;
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
        return OurService::where('slug',$slug)->where('status',config('global.statusActive'))->first();
    }
}
