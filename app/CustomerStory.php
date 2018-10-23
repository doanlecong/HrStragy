<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Purifier;

class CustomerStory extends Model
{
    //
    protected $table = "customer_stories";

    public static function findByTitle($name = '') {
        if( $name != '') {
            $custs = CustomerStory::where('title','like', '%'.$name.'%');
            return $custs;
        }
        return null;
    }

    public static function setData(CustomerStory $customerStory, Request $request) {
        $customerStory->title = $request->title;
        $customerStory->writer = $request->writer;
        $customerStory->image_thumb = $request->image_thumb;
        $customerStory->description = Purifier::clean($request->description);
        $customerStory->content = $request->contentInfo;

        return $customerStory;
    }

    public static function checkSlug($slug = null, $id = null) {
        $job = null;
        if(!empty($slug)) {
            if(!empty($id)) {
                $job = CustomerStory::where('slug',$slug)->where('id','<>', $id)->first();
            }
            else {
                $job = CustomerStory::where('slug', $slug)->first();
            }
        }
        return ($job != null) ? false : true;
    }

    public static function findBySlug($slug) {
        return CustomerStory::where('slug',$slug)->where('status',config('global.statusActive'))->first();
    }

    public static function convertSlug($raw) {
        $cleanLink = strip_tags(Purifier::clean($raw));
        $arr = explode('.',$cleanLink);
        if (count($arr) == 2 ) {
            return $arr[0];
        }
        return false;
    }
}
