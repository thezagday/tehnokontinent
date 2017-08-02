<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Catalogs;
use App\Comment;
use App\Article;
use App\Advantage;
use App\Material; //текстовый материал 
use App\Bestseller;
use App\Product;
use App\Slider;
use App\ImagesMaterialCompany;
use App\Brand;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        /*Хиты продаж*/
        
        $bestsellers = Bestseller::all();
        $bestsellers_page = array();
        if ($bestsellers != null)
        {
            foreach ($bestsellers as $bestseller)
            {
                array_push($bestsellers_page, Product::find($bestseller->id_best_product));
            }
        }
        
        /**/
        $parent_catalogs = DB::table('catalogs')->whereNull('parent')->get();
        
        $articles = Article::all();

        foreach ($articles as $article)
        {
            $date = strval($article->date);
            $day = substr($date,8,2);
            $month = substr($date,5,2);
            
            $article->date = $day;

            switch ($month) {
                case '01':
                   $article->month = "Янв";
                    break;
                case '02':
                   $article->month = "Фев";
                    break;
                case '03':
                    $article->month = "Мар";
                    break;
                case '04':
                   $article->month = "Апр";
                    break;
                case '05':
                   $article->month = "Май";
                    break;
                case '06':
                   $article->month = "Июнь";
                    break;
                case '07':
                   $article->month = "Июль";
                    break;
                case '08':
                   $article->month = "Авг";
                    break;
                case '09':
                   $article->month = "Сен";
                    break;
                case '10':
                   $article->month = "Окт";
                    break;
                case '11':
                   $article->month = "Ноя";
                    break;
                case '12':
                   $article->month = "Дек";
                    break;
                
                default:
                    $article->month = "Без даты";
                    break;
            }
        }


        return view('pages.home',[
            'catalogs'=> Catalogs::all(),
            'count_catalogs'=> Catalogs::count(),
            'comments'=> Comment::all(),
            'articles'=> $articles,
            'advantages'=> Advantage::all(),
            'material'=> Material::all(),
            'slider'=>Slider::all(),
            'bestsellers'=>$bestsellers_page,
            'parent_catalogs'=>$parent_catalogs,
            'brands'=>Brand::all(),
        ]);
    }
    public function company()
    {
        $images = ImagesMaterialCompany::all();
        return view('pages.company',['comments'=> Comment::all(),'material'=> Material::find(1),'images'=>$images]); //взять материал именно о компании
    }

    
    public function comments(Request $request)
    {
        
        if ($request->input('f')) //f - fresh - фильтр свежих записей
        {
            $comments = DB::table('comments')
                ->latest('date')
                ->paginate(10)
                ->setPath('comments?f=1');
            return view('pages.comments',['comments'=> $comments,'material'=> Material::find(2)]);
        }
        else
        {
            if (Input::get('count'))
            {
                $comments = DB::table('comments')
                    ->paginate(Input::get('count'));
                return view('pages.comments',['comments'=> $comments,'material'=> Material::find(2)]);
            }
            else
            {
                $comments = DB::table('comments')
                    ->paginate(10);
                return view('pages.comments',['comments'=> $comments,'material'=> Material::find(2)]);
            }
            
        }
        
    }
}
