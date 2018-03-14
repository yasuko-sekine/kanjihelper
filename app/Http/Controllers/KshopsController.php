<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KshopsController extends Controller
{   
    public function index()
    {
        return view('kshops.index');
    }
    
    public function create()
    {
        $acckey= env('GNAB_ACCESSKEY');
        $format= "json";
        $kshops = [];
            $lat = '35.681167';
            $lng = '139.767052';
            $range = '4';
            $freeword = 'カラオケ';
            $hit_per_page = '100';
            $uri4   = "https://api.gnavi.co.jp/RestSearchAPI/20150630/";
            $url4  = sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s", $uri4, "?format=", $format,"&keyid=", $acckey, "&latitude=", $lat, "&longitude=", $lng, "&range=", $range, "&freeword=", $freeword, "&hit_per_page=", $hit_per_page);
            $json4 = file_get_contents($url4);
            $obj4  = json_decode($json4);
            

            $rests = $obj4->rest;
            if (!is_array($rests)) $rests = [$rests];
            
            foreach ($rests as $g_kshop) {
                $kshop = new \App\Kshop();
                $kshop->kshopid = $g_kshop->id;
                $kshop->name = $g_kshop->name;
                $kshop->latitude = $g_kshop->latitude;
                $kshop->longitude = $g_kshop->longitude;
                $kshop->url = $g_kshop->url;
                $kshop->image_url = $g_kshop->image_url->shop_image1;
                $kshop->pr = $g_kshop->pr->pr_short;
                $kshops[] = $kshop;
            }

        return view('kshops.create', [
            'kshops' => $kshops,
        ]);        
    }

    public function show($id)
    {
        //
    }

}
