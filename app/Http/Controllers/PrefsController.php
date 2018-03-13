<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class PrefsController extends Controller
{
    public function create()
    {
        //
    }
    
    public function show($id)
    {
        $pref = \App\Pref::find($id);
        $pref_c = $pref->code;
        $rests = [];
        $acckey= env('GNAB_ACCESSKEY');
        $format= "json";
        $uri3   = "https://api.gnavi.co.jp/RestSearchAPI/20150630/";
        $url3  = sprintf("%s%s%s%s%s%s%s%s", $uri3, "?format=", $format,"&keyid=", $acckey, "&pref=", $pref_c, "&freeword=", "居酒屋");
        $json3 = file_get_contents($url3);
        $obj3  = json_decode($json3);
        
        foreach ($obj3->rest as $g_rest2) {
            $rest = new \App\Rest();
            $rest->restid = $g_rest2->id;
            $rest->name = $g_rest2->name;
            $rest->url = $g_rest2->url;
            $rest->image_url = $g_rest2->image_url->shop_image1;
            $rest->pr = $g_rest2->pr->pr_short;
            $rests[] = $rest;
        }
        
        $prefs = \App\Pref::all();
        
        return view('prefs.show', [
            'rests' => $rests,
            'prefs' => $prefs,
        ]);
    }
}
