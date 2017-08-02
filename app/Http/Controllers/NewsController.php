<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\News;
use \App\Material;


class NewsController extends Controller
{
    public function news(Request $request)
    {
        if ($request->input('f'))
        {
            $news = DB::table('news')
                ->latest('date')
                ->paginate(10)
                ->setPath('news?f=1');

			return view('pages.news',['news'=>$news  ,'material'=> Material::find(2)]);
        }
        else
        {
        	if ($request->input('count'))
        	{
        		$news = DB::table('news')
                	->paginate($request->input('count'));
            	return view('pages.news',['news'=> $news,'material'=> Material::find(2)]);
        	}
        	else
        	{
        		$news = DB::table('news')
                	->paginate(10);
            	return view('pages.news',['news'=> $news,'material'=> Material::find(2)]);
        	}
        	
        }
        
    }
    public function news_page(Request $request)
    {
        return view('pages.news_page',['news'=>  News::find($request->id)]);
    }
}
