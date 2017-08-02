<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Accessories;
use App\Catalogs;
use App\Material;
use App\Filter;

class AccessoryController extends Controller
{
    public function accessories()
    {
        $amount = count(DB::table('accessories')->get());
        
        if (Input::get('filter')!=null)
        {
            switch (Input::get('filter'))
            {
                case 'desc':
                    $accessories = DB::table('accessories')
                        ->orderBy('price','desc')
                        ->paginate(10)
                        ->setPath('accessories?filter=desc');
                    break;

                case 'title':
                    $accessories = DB::table('accessories')
                        ->orderBy('title','asc')
                        ->paginate(10)
                        ->setPath('accessories?filter=title');
                    break;

                case 'asc':
                     $accessories = DB::table('accessories')
                        ->orderBy('price','asc')
                        ->paginate(10)
                        ->setPath('accessories?filter=asc');;
            }
            return view ('pages.accessories',['accessories'=>$accessories ,'catalogs'=> Catalogs::all(),'material'=> Material::find(2),'filters'=>Filter::all(),'amount'=>$amount]);
        }
        else
        {
            if (Input::get('count'))
            {
                $accessories = DB::table('accessories')
                    ->paginate(Input::get('count'));

                return view ('pages.accessories',['accessories'=>$accessories ,'catalogs'=> Catalogs::all(),'material'=> Material::find(2),'filters'=>Filter::all(),'amount'=>$amount]);
            }
            else
            {
                $accessories = DB::table('accessories')
                ->paginate(10);

                return view ('pages.accessories',['accessories'=>$accessories ,'catalogs'=> Catalogs::all(),'material'=> Material::find(2),'filters'=>Filter::all(),'amount'=>$amount]);
            }
            
        }
    }
    public function accessories_list()
    {
        $amount = count(DB::table('accessories')->get());
        
        if (Input::get('filter')!=null)
        {
            switch (Input::get('filter'))
            {
                case 'desc':
                    $accessories = DB::table('accessories')
                        ->orderBy('price','desc')
                        ->paginate(10)
                        ->setPath('accessories_list?filter=desc');
                    break;

                case 'title':
                    $accessories = DB::table('accessories')
                        ->orderBy('title','asc')
                        ->paginate(10)
                        ->setPath('accessories_list?filter=title');
                    break;

                case 'asc':
                     $accessories = DB::table('accessories')
                        ->orderBy('price','asc')
                        ->paginate(10)
                        ->setPath('accessories_list?filter=asc');;
            }
            return view ('pages.accessories_list',['accessories'=>$accessories ,'catalogs'=> Catalogs::all(),'material'=> Material::find(2),'filters'=>Filter::all(),'amount'=>$amount]);
        }
        else
        {
            if (Input::get('count'))
            {
                $accessories = DB::table('accessories')
                    ->paginate(Input::get('count'));

                return view ('pages.accessories_list',['accessories'=>$accessories ,'catalogs'=> Catalogs::all(),'material'=> Material::find(2),'filters'=>Filter::all(),'amount'=>$amount]);
            }
            else
            {
                $accessories = DB::table('accessories')
                ->paginate(10);

                return view ('pages.accessories_list',['accessories'=>$accessories ,'catalogs'=> Catalogs::all(),'material'=> Material::find(2),'filters'=>Filter::all(),'amount'=>$amount]);
            }
            
        }
    }
    public function accessories_page()
    {
    	$accessory = Accessories::find(Input::get('id'));
    	
    	$related =  Accessories::take(12)
    		->where('id','<>',Input::get('id'))
    		->get();
    	
    	return view('pages.accessories_page',[
    		'catalogs'=> Catalogs::all(),
    		'accessory'=>$accessory,
    		'related' =>$related,
    		'material'=> Material::find(2),
    		]);
    }
}
