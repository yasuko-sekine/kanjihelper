<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class RestsController extends Controller
{
    public function create()
    {
        $acckey= env('GNAB_ACCESSKEY');
        $format= "json";
        // $r_pref = request()->pref;
        // $areacode_m = request()->areacode_m;
        
        // $uri1   = "https://api.gnavi.co.jp/master/PrefSearchAPI/20150630/";
        // $url1  = sprintf("%s%s%s%s%s", $uri1, "?format=", $format,"&keyid=", $acckey);
        // $json1 = file_get_contents($url1);
        // $obj1  = json_decode($json1);
        
        // foreach ($obj1->pref as $g_pref) {
        //     $pref = new \App\Pref();
        //     $pref->code = $g_pref->pref_code;
        //     $pref->name = $g_pref->pref_name;
        //     $pref->save();
        // }
        
        $uri2   = "https://api.gnavi.co.jp/master/GAreaMiddleSearchAPI/20150630/";
        $url2 = sprintf("%s%s%s%s%s", $uri2, "?format=", $format,"&keyid=", $acckey);
        $json2 = file_get_contents($url2);
        $obj2  = json_decode($json2); 
        
        foreach ($obj2->garea_middle as $g_marea) {
            $marea = new \App\Marea();
            $marea->code = $g_marea->areacode_m;
            $marea->name = $g_marea->areaname_m;
            $marea->pref_code = $g_marea->pref->pref_code;
            $marea->pref_name = $g_marea->pref->pref_name;
            $marea->save();
        }        
        
        $rests = [];
            $pref_c = 'PREF13';
            $uri3   = "https://api.gnavi.co.jp/RestSearchAPI/20150630/";
            $url3  = sprintf("%s%s%s%s%s%s%s%s", $uri3, "?format=", $format,"&keyid=", $acckey, "&pref=", $pref_c, "&freeword=", "居酒屋");
            $json3 = file_get_contents($url3);
            $obj3  = json_decode($json3);
            
            foreach ($obj3->rest as $g_rest) {
                $rest = new \App\Rest();
                $rest->restid = $g_rest->id;
                $rest->name = $g_rest->name;
                $rest->url = $g_rest->url;
                $rest->image_url = $g_rest->image_url->shop_image1;
                $rest->pr = $g_rest->pr->pr_short;
                $rests[] = $rest;
            }
            
        $prefs = \App\Pref::all();

        return view('rests.create', [
            'rests' => $rests,
            'prefs' => $prefs,
        ]);
    }

}
