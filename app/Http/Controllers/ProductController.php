<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use \App\Catalogs;
use \App\Material;
use \App\Product;
use \App\Filter;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        $amount = count(DB::table('products')->where('parent', '=', Input::get('parent'))->get());
        $current_catalog = Catalogs::find(Input::get('parent'));

        if (Input::get('filter'))
        {
            $products = get_products_order_by_filter_paginate_ten(Input::get('filter'));

            $breadcrumbs = get_breadcrumbs(Input::get('parent'));
            return view('pages.products',['catalogs'=> Catalogs::all(),'products'=>$products,'material'=> Material::find(2),'parent'=>Input::get('parent'),'filters'=>Filter::all(),'amount'=>$amount,'breadcrumbs'=>$breadcrumbs]);
        }
        else
        {
            if (Input::get('count'))
            {
               $products = DB::table('products')
                        ->where('parent', '=', Input::get('parent'))
                        ->orderBy('price','asc')
                        ->paginate(Input::get('count'))
                        ->setPath('products?parent='.Input::get('parent').'&count='.Input::get('count'));

                $breadcrumbs = get_breadcrumbs(Input::get('parent'));
                return view('pages.products',['catalogs'=> Catalogs::all(),'products'=>$products,'material'=> Material::find(2),'parent'=>Input::get('parent'),'filters'=>Filter::all(),'amount'=>$amount,'breadcrumbs'=>$breadcrumbs]); 
            }
            else
            {
                $products = DB::table('products')
                        ->where('parent', '=', Input::get('parent'))
                        ->orderBy('price','asc')
                        ->paginate(10)
                        ->setPath('products?parent='.Input::get('parent'));

                $breadcrumbs = get_breadcrumbs(Input::get('parent'));
                return view('pages.products',['catalogs'=> Catalogs::all(),'products'=>$products,'material'=> Material::find(2),'parent'=>Input::get('parent'),'filters'=>Filter::all(),'amount'=>$amount,'breadcrumbs'=>$breadcrumbs]);
            }
        }
    }

    public function products_list(Request $request)
    {
        $amount = count(DB::table('products')->where('parent', '=', Input::get('parent'))->get());
        $current_catalog = Catalogs::find(Input::get('parent'));

        if (Input::get('filter')!=null)
        {
            $products = get_products_order_by_filter_paginate_ten(Input::get('filter'));
            $breadcrumbs = get_breadcrumbs(Input::get('parent'));
            return view('pages.products_list',['catalogs'=> Catalogs::all(),'products'=>$products,'material'=> Material::find(2),'parent'=>Input::get('parent'),'filters'=>Filter::all(),'amount'=>$amount,'breadcrumbs'=>$breadcrumbs]);
        }
        else
        {
            if (Input::get('count'))
            {
               $products = DB::table('products')
                        ->where('parent', '=', Input::get('parent'))
                        ->orderBy('price','asc')
                        ->paginate(Input::get('count'))
                        ->setPath('products_list?parent='.Input::get('parent').'&count='.Input::get('count'));

                $breadcrumbs = get_breadcrumbs(Input::get('parent'));
                return view('pages.products_list',['catalogs'=> Catalogs::all(),'products'=>$products,'material'=> Material::find(2),'parent'=>Input::get('parent'),'filters'=>Filter::all(),'amount'=>$amount,'breadcrumbs'=>$breadcrumbs]); 
            }
            else
            {
                $products = DB::table('products')
                        ->where('parent', '=', Input::get('parent'))
                        ->orderBy('price','asc')
                        ->paginate(10)
                        ->setPath('products_list?parent='.Input::get('parent'));

                $breadcrumbs = get_breadcrumbs(Input::get('parent'));
                return view('pages.products_list',['catalogs'=> Catalogs::all(),'products'=>$products,'material'=> Material::find(2),'parent'=>Input::get('parent'),'filters'=>Filter::all(),'amount'=>$amount,'breadcrumbs'=>$breadcrumbs]);
            }
        }
    }
    public function product_page()
    {
        $product = DB::table('products')->where('id','=',Input::get('id'))->first();
                
        $images = DB::table('images_products')->where('parent','=', Input::get('id'))->get();
        $colors = Product::find(Input::get('id'))->get_colors;
        $descriptions = Product::find(Input::get('id'))->get_descriptions;
        $accessories  = Product::find(Input::get('id'))->get_accessories;
        $instructions = Product::find(Input::get('id'))->get_instructions;
        $certificates = Product::find(Input::get('id'))->get_certificates;
        
        
        $related = Product::take(12)
            ->where('parent', '=', $product->parent)
            ->where('id','<>',$product->id)
            ->get();
        
        $current_catalog = Catalogs::find($product->parent);
        $breadcrumbs = get_breadcrumbs($current_catalog->id);

        return view('pages.product_page',[
            'catalogs'=> Catalogs::all(),
            'product' => $product,
            'images' => $images,
            'colors'=>$colors,
            'descriptions'=>$descriptions,
            'accessories'=>$accessories,
            'instructions' =>$instructions,
            'certificates' =>$certificates,
            'related' => $related,
            'material'=> Material::find(2),
            'breadcrumbs'=>$breadcrumbs,
            //'curr_cat'=>$curr_cat,
        ]);
    }
}
