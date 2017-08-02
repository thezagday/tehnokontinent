<?php
    use Illuminate\Support\Facades\Input;
    function get_breadcrumbs($id)
    {
        static $arr = array();
        $current_catalog = app\Catalogs::find($id);
        array_push($arr,$current_catalog);

        if ($current_catalog->parent != null)
        {
            return get_breadcrumbs($current_catalog->parent);
        }
        else
        {
            return array_reverse($arr);
        }
    }
    function calculate_min_price($parent_catalogs)
    {
        foreach ($parent_catalogs as $item)
        {
            $min_price = DB::table('products')->where('parent','=',$item->id)->min('price');
            
            if ($min_price != null)
            {
               $item->min_price = $min_price;
            }
        }
    }
    function get_products_order_by_filter_paginate_ten($filter)
    {
        switch ($filter)
            {
                case 'desc':
                    $products = DB::table('products')
                        ->where('parent', '=', Input::get('parent'))
                        ->orderBy('price','desc')
                        ->paginate(10)
                        ->setPath('products?parent='.Input::get('parent').'&filter=desc');
                    break;

                case 'title':
                    $products = DB::table('products')
                        ->where('parent', '=', Input::get('parent'))
                        ->orderBy('title','asc')
                        ->paginate(10)
                        ->setPath('products?parent='.Input::get('parent').'&filter=title');
                    break;

                case 'asc':
                    $products = DB::table('products')
                        ->where('parent', '=', Input::get('parent'))
                        ->orderBy('price','asc')
                        ->paginate(10)
                        ->setPath('products?parent='.Input::get('parent').'&filter=asc');;
            }
            return $products;
    }