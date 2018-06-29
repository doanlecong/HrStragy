<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Purifier;

class CooperateInfo extends Model
{
    //
    protected $table = 'cooperate_infos';
    public static function getMinOrder() {
        $coop = CooperateInfo::orderBy('order','asc')->first();
        if($coop != null) {
            return $coop->order;
        }
        return 1;
    }
    public static function getCurrentMaxOrder() {
        $coop = CooperateInfo::orderBy('order','desc')->first();
        if($coop != null) {
            return $coop->order;
        }
        else return 1;
    }
    public static function changeOrder($coop, $direction){
        if(config('global.up') == $direction) {
            $coopNext = CooperateInfo::where('order','<', $coop->order)->orderBy('order', 'desc')->first();
        }
        else if(config('global.down') == $direction) {
            $coopNext = CooperateInfo::where('order','>', $coop->order)->orderBy('order', 'asc')->first();
        }

        $tempOrder = $coop->order;
        $coop->order = $coopNext->order;
        $coopNext->order = $tempOrder;
        $coop->save();
        $coopNext->save();
    }

    public static function setData(CooperateInfo $coop,Request $request){
        $coop->title = $request->title;
        $coop->descript = Purifier::clean($request->descript);
        $coop->image_small = $request->image_thumb;
        $coop->image_big = $request->image_big;
        $coop->content = $request->contentInfo;
        $coop->link = $request->link;
        return $coop;
    }
}
