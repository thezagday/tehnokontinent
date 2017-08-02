<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Catalogs;
use App\Material;


use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    public function catalogs()
    {
        $catalogs = Catalogs::all();
        if (!Input::get('id'))
        {
            $parent_catalogs = DB::table('catalogs')->whereNull('parent')->get();
            calculate_min_price($parent_catalogs);

            return view('pages.catalogs',['catalogs'=>$catalogs ,'parent_catalogs'=>$parent_catalogs,'material'=> Material::find(2)]);
        }
        else /*Сюда приходим после index.blade*/
        {
            if (DB::table('catalogs')->where('parent', Input::get('id'))->first() != null) //заменить на hasMany
            {
                
                $parent_catalogs = DB::table('catalogs')->where('parent', '=', Input::get('id') )->get();
                calculate_min_price($parent_catalogs);
                $breadcrumbs = get_breadcrumbs(Input::get('id'));

                return view('pages.catalogs',['catalogs'=>$catalogs ,'parent_catalogs'=>$parent_catalogs,'material'=> Material::find(2),'breadcrumbs'=>$breadcrumbs]);
            }
            else
            {
                return redirect()->action('ProductController@products', ['parent' => Input::get('id')]);
            }
        }
    }
    public function catalogs_list()
    {
        $catalogs = Catalogs::all();
        if (!Input::get('id'))
        {
            $parent_catalogs = DB::table('catalogs')->whereNull('parent')->get();
            calculate_min_price($parent_catalogs);

            return view('pages.catalogs_list',['catalogs'=>$catalogs ,'parent_catalogs'=>$parent_catalogs,'material'=> Material::find(2)]);
        }
        else /*Сюда приходим после index.blade*/
        {
            if (DB::table('catalogs')->where('parent', Input::get('id'))->first() != null) //заменить на hasMany
            {
                $parent_catalogs = DB::table('catalogs')->where('parent', '=', Input::get('id') )->get();
                calculate_min_price($parent_catalogs);
                $breadcrumbs = get_breadcrumbs(Input::get('id'));
                
                return view('pages.catalogs_list',['catalogs'=>$catalogs ,'parent_catalogs'=>$parent_catalogs,'material'=> Material::find(2),'breadcrumbs'=>$breadcrumbs]);
            }
            else
            {
                return redirect()->action('ProductController@products', ['parent' => Input::get('id')]);
            }
        }
    }
}
