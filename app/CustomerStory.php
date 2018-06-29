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
}
