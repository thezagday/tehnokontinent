<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use \App\Filter;

class SearchController extends Controller
{
    public function search()
    {
        $id = Input::get('id');
        $search = Input::get('search');
        
        if ($id == 0)//поиск по всем каталогам
        {
            $amount = count(DB::table('products')->where('title','like','%'.$search.'%')->get());

            if (Input::get('count'))//выбран ли фильтр по кол-ву отоображаемых товаров
            {
                $search_results = DB::table('products')
                    ->where('title','like','%'.$search.'%')
                    ->paginate(Input::get('count'));
            }
            else
            {
                if (Input::get('filter')!=null)
                {
                    switch (Input::get('filter'))
                    {
                        case 'desc':
                            $search_results = DB::table('products')
                                    ->where('title','like','%'.$search.'%')
                                    ->orderBy('price','desc')
                                    ->paginate(10)
                                    ->setPath('search?filter=desc');
                                    break;

                        case 'title':
                            $search_results = DB::table('products')
                                    ->where('title','like','%'.$search.'%')
                                    ->orderBy('title','asc')
                                    ->paginate(10)
                                    ->setPath('search?filter=title');
                                    break;

                        case 'asc':
                            $search_results = DB::table('products')
                                    ->where('title','like','%'.$search.'%')
                                    ->orderBy('price','asc')
                                    ->paginate(10)
                                    ->setPath('search?filter=asc');
                                    break;
                    }
                }
                else
                {
                    $search_results = DB::table('products')
                                ->where('title','like','%'.$search.'%')
                                ->paginate(10);
                }
            }
            return view('pages.search',['search_results'=> $search_results,'search'=>$search,'catalogs' => \App\Catalogs::all(),'material' =>\App\Material::find(2),'filters'=>Filter::all(),'amount'=>$amount]);
            
        }
        else //поиск по выбранному каталогу
        {
            $amount = count( DB::table('products')->where('parent', '=', $id)->where('title','like','%'.$search.'%')->get());
            
            if (Input::get('count')) //выбран ли фильтр по кол-ву отоображаемых товаров
            {
                $search_results = DB::table('products')
                    ->where('parent', '=', $id)
                    ->where('title','like','%'.$search.'%')
                    ->paginate(Input::get('count'));
            }
            else
            {
                if (Input::get('filter')!=null)
                {
                    switch (Input::get('filter'))
                    {
                        case 'desc':
                            $search_results = DB::table('products')
                                    ->where('title','like','%'.$search.'%')
                                    ->orderBy('price','desc')
                                    ->paginate(10)
                                    ->setPath('search?filter=desc');
                                    break;

                        case 'title':
                            $search_results = DB::table('products')
                                    ->where('title','like','%'.$search.'%')
                                    ->orderBy('title','asc')
                                    ->paginate(10)
                                    ->setPath('search?filter=title');
                                    break;

                        case 'asc':
                            $search_results = DB::table('products')
                                    ->where('title','like','%'.$search.'%')
                                    ->orderBy('price','asc')
                                    ->paginate(10)
                                    ->setPath('search?filter=asc');
                                    break;
                    }
                }
                else
                {
                    $search_results = DB::table('products')
                                ->where('title','like','%'.$search.'%')
                                ->paginate(10);
                }
            }
            return view('pages.search',['search_results'=> $search_results,'search'=>$search,'catalog'=> \App\Catalogs::find($id),'catalogs' => \App\Catalogs::all(),'material' =>\App\Material::find(2),'filters'=>Filter::all(),'amount'=>$amount]);
        }
    }
}