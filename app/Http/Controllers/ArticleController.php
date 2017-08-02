<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Article;
use \App\Material;

class ArticleController extends Controller
{
    public function articles()
    {
        $articles = DB::table('articles')
        	->paginate(5);

        return view('pages.articles',['articles'=>$articles,'material'=> Material::find(2)]);
    }
    public function article_page(Request $request)
    {
        return view('pages.article_page',['article'=>  Article::find($request->id)]);
    }
}
