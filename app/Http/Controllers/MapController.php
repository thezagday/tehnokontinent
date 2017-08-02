<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Main_menu;
use App\Catalogs;

class MapController extends Controller
{
    public function map()
    {
        $main_menu = Main_menu::all();
        $catalogs = Catalogs::all();
        return view('pages.site_map',['main_menu'=>$main_menu,'catalogs'=>$catalogs]);
    }
}