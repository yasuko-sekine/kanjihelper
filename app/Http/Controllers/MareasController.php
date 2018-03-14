<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MareasController extends Controller
{
    public function show($id)
    {
        $marea = \App\Marea::find($id);
        
        $marea_c = $marea->code;
        // $category_l = 'RSFST21000';
        $freeword = '酒';
        $freeword_condition = '2';
        $hit_per_page = '100';
        $rests = [];
        $acckey= env('GNAB_ACCESSKEY');
        $format= "json";
        $uri3   = "https://api.gnavi.co.jp/RestSearchAPI/20150630/";
        $url3  = sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s", $uri3, "?format=", $format,"&keyid=", $acckey, "&areacode_m=", $marea_c, "&freeword=", $freeword, "&freeword_condition=", $freeword_condition, "&hit_per_page=", $hit_per_page);
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
        
        $mareas = $marea->pref->mareas;
        
        return view('mareas.show', [
            'rests' => $rests,
            'mareas' => $mareas,
        ]);
    }
}
