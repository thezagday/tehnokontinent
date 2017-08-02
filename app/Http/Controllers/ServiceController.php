<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Service;
use \App\Material;

class ServiceController extends Controller
{
    public function services()
    {
        $services = DB::table('services')
        	->paginate(10);
        return view('pages.services',['services'=>$services,'material'=> Material::find(2)]);
    }
    public function service_page(Request $request)
    {
        return view('pages.service_page',['service'=>  Service::find($request->id)]);
    }
}
