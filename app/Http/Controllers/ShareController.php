<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Share;
use \App\Material;

class ShareController extends Controller
{
    public function shares(Request $requrest)
    {
        if ($requrest->input('rel'))
        {

			$shares = DB::table('shares')
                ->where('relevance','=',1)
                ->paginate(10)
                ->setPath('shares?rel=1');
                
			return view('pages.shares',['shares'=> $shares,'material'=> Material::find(2),'rel'=> 1]);//смотреть таблицу
			
        }
        else
        {
        	$shares = DB::table('shares')
                ->paginate(10);
            return view('pages.shares',['shares'=> $shares,'material'=> Material::find(2)]);//смотреть таблицу
        }
    }

    
    public function share_page(Request $request)
    {
        return view('pages.share_page',['share'=>  Share::find($request->id)]);
    }
}
