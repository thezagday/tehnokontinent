<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use \App\Share;
use \App\Service;
use \App\News;
use \App\Product;
use \App\Article;
use \App\Catalogs;
use \App\Accessories;
use \App\Comment;
use \App\DescriptionsProduct;
use \App\CertificatesProduct;

class UploadController extends Controller
{
    
    public function add_item_shares(Request $request)
    {
        if (!(Input::all()))//нормальное условие
        {
            return view ('admin.shares.add_item_shares');
        }
        elseif($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/shares',$file->getClientOriginalName());
            $img_path = '/images/shares/'.$file->getClientOriginalName();
        }
        else
        {
        	$img_path = '';
        }
            
            DB::table('shares')->insert([
                'title' => Input::get('title'),
                'short_body'  => Input::get('short_body'),
                'body' => Input::get('body'),
                'price'  => Input::get('price'),
                'relevance' =>Input::get('relevance'),
                'img_path' => $img_path,
            ]);
        
        return redirect()->action('AdminController@read_shares');
    }
    public function update_item_shares(Request $request)
    {
        $share = Share::find(Input::get('id'));
        $img_path = $share->img_path;

        if($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/shares',$file->getClientOriginalName());

            $share->update([
                    'title' => Input::get('title'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                    'price'  => Input::get('price'),
                    'relevance' =>Input::get('relevance'),
                    'img_path' => '/images/shares/'.$file->getClientOriginalName(),
                ]); 

			if ($img_path != null)
			{
				if(!DB::table('shares')->where('img_path','like',$img_path)->first())
            	{
					if (file_exists(public_path() .$img_path)) 
            		{
                		unlink(public_path() .$img_path);
            		}
            	}
			}
        }
        else
        {
            $share->update([
                    'title' => Input::get('title'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                    'price'  => Input::get('price'),
                    'relevance' =>Input::get('relevance'),
                ]); 
        
        }
        return redirect()->action('AdminController@read_shares');
    }
    
    
    public function add_item_services(Request $request)
    {
        if (!(Input::all()))
        {
            return view ('admin.services.add_item_services');
        }
        elseif ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path().'/images/services',$file->getClientOriginalName());
            $img_path = '/images/services/'.$file->getClientOriginalName();
        }
        else
        {
			$img_path = '';
        }

        DB::table('services')->insert([
                'title' => Input::get('title'),
                'short_body'  => Input::get('short_body'),
                'body' => Input::get('body'),
                'img_path' => $img_path,
            ]);
        
        return redirect()->action('AdminController@read_services');
    }
    public function update_item_services(Request $request)
    {
    	$services = Service::find(Input::get('id'));
    	$img_path = $services->img_path;

        if ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/services',$file->getClientOriginalName());
            
            $services->update([
                    'title' => Input::get('title'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                    'img_path' => '/images/services/'.$file->getClientOriginalName(),
                ]); 

            if ($img_path != null)
			{
				if(!DB::table('services')->where('img_path','like',$img_path)->first())
            	{
					if (file_exists(public_path() .$img_path)) 
            		{
                		unlink(public_path() .$img_path);
            		}
            	}
			}
        }
        else
        {
            $services->update([
                    'title' => Input::get('title'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                ]); 
        }
        return redirect()->action('AdminController@read_services');
    }
    
    
    public function add_item_news(Request $request)
    {
        if (!(Input::all()))
        {
            return view ('admin.news.add_item_news');
        }
        elseif ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path().'/images/news',$file->getClientOriginalName());
            $img_path = '/images/news/'.$file->getClientOriginalName();
        }
        else
        {
        	$img_path='';
        }
        DB::table('news')->insert([
                'title' => Input::get('title'),
                'short_body'  => Input::get('short_body'),
                'body' => Input::get('body'),
                'img_path' =>$img_path ,
                'date' => Input::get('date'),
            ]);
        return redirect()->action('AdminController@read_news');
    }
    public function update_item_news(Request $request)
    {
        $news = News::find(Input::get('id'));
        $img_path = $news->img_path;

        if ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/news',$file->getClientOriginalName());
            
            $news->update([
                    'title' => Input::get('title'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                    'img_path' => '/images/news/'.$file->getClientOriginalName(),
                    'date' => Input::get('date'),
                ]); 

            if ($img_path != null)
			{
				if(!DB::table('news')->where('img_path','like',$img_path)->first())
            	{
					if (file_exists(public_path() .$img_path)) 
            		{
                		unlink(public_path() .$img_path);
            		}
            	}
			}
        }
        else
        {
            $news->update([
                    'title' => Input::get('title'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                    'date' => Input::get('date'),
                ]); 
            
        }
        return redirect()->action('AdminController@read_news');
    }
    
    public function add_item_articles(Request $request)
    {
        if (!(Input::all()))
        {
            return view ('admin.articles.add_item_articles');
        }
        elseif ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path().'/images/articles',$file->getClientOriginalName());
			$img_path = '/images/articles/'.$file->getClientOriginalName();
        }
        else
        {
            $img_path = '';
        }

        DB::table('articles')->insert([
                'title' => Input::get('title'),
                'short_body'  => Input::get('short_body'),
                'body' => Input::get('body'),
                'img_path' => $img_path,
                'date' => Input::get('date'),
            ]);
        return redirect()->action('AdminController@read_articles');
    }
    public function update_item_articles(Request $request)
    {
        $article = Article::find(Input::get('id'));
        $img_path = $article->img_path;

        if ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/articles',$file->getClientOriginalName());
            
            $article->update([
                    'title' => Input::get('title'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                    'img_path' => '/images/articles/'.$file->getClientOriginalName(),
                    'date' => Input::get('date'),
                ]);
            if ($img_path != null)
			{
				if(!DB::table('articles')->where('img_path','like',$img_path)->first())
            	{
					if (file_exists(public_path() .$img_path)) 
            		{
                		unlink(public_path() .$img_path);
            		}
            	}
			}
            
        }
        else
        {
            $article->update([
                    'title' => Input::get('title'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                    'date' => Input::get('date'),
                ]); 
            
        }
        return redirect()->action('AdminController@read_articles');
    }
    
    public function add_item_comments(Request $request)
    {
        if (!(Input::all()))
        {
            return view ('admin.comments.add_item_comments');
        }
        elseif($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path().'/images/comments',$file->getClientOriginalName());
            $img_path = '/images/comments/'.$file->getClientOriginalName();
        }
        else
        {
            $img_path = '';
        }
        DB::table('comments')->insert([
                'name' => Input::get('name'),
                'city' => Input::get('city'),
                'short_body'  => Input::get('short_body'),
                'body' => Input::get('body'),
                'img_path' => $img_path,
                'date' => Input::get('date'),
            ]);
            return redirect()->action('AdminController@read_comments');
    }
    public function update_item_comments(Request $request)
    {
        $comment = Comment::find(Input::get('id'));
        $img_path = $comment->img_path;
        
        if ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/comments',$file->getClientOriginalName());
            
           	$comment->update([
                    'name' => Input::get('name'),
                    'city' => Input::get('city'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                    'img_path' => '/images/comments/'.$file->getClientOriginalName(),
                    'date' => Input::get('date'),
                ]); 
            if ($img_path != null)
			{
				if(!DB::table('comments')->where('img_path','like',$img_path)->first())
            	{
					if (file_exists(public_path() .$img_path)) 
            		{
                		unlink(public_path() .$img_path);
            		}
            	}
			}
        }
        else
        {
            $comment->update([
                    'name' => Input::get('name'),
                    'city' => Input::get('city'),
                    'short_body'  => Input::get('short_body'),
                    'body' => Input::get('body'),
                    'date' => Input::get('date'),
                ]); 
        }
        return redirect()->action('AdminController@read_comments'); 
    }

    public function update_banner(Request $request)
    {
        $banner =\App\Banner::find(1);
        $img_path = $banner->img_path;

        if ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/banner',$file->getClientOriginalName());

            
            $banner->update([
                'img_path' => '/images/banner/'.$file->getClientOriginalName(),
                'title'  => Input::get('title'),
                'body' => Input::get('body'),
                ]);

            if ($img_path != null)
			{
				if(!DB::table('banner')->where('img_path','like',$img_path)->first())
            	{
					if (file_exists(public_path() .$img_path)) 
            		{
                		unlink(public_path() .$img_path);
            		}
            	}
			}
            
        }
        else
        {
            $banner->update([
                    'title'  => Input::get('title'),
                    'body' => Input::get('body'),
                ]); 
        }
        return redirect()->action('AdminController@read_banner');
    }

    public function add_slider(Request $request)
    {
        if (!(Input::all()))
        {
            return view ('admin.slider.add_slider');
        }
        elseif ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path().'/images/slider',$file->getClientOriginalName());
            $img_path = '/images/slider/'.$file->getClientOriginalName();
        }
        else
        {
        	$img_path = '';
        }
        DB::table('slider')->insert([
                'img_path' => $img_path,
                'title' => Input::get('title'),
                'body' => Input::get('body'),
                'price'  => Input::get('price'),
                'share' => Input::get('share'),
            ]);
        return redirect()->action('AdminController@read_slider');
    }
    public function update_item_slider(Request $request)
    {
        if (Input::get('share') == 'null')
        {
            $share = null;
        }
        else
        {
            $share = Input::get('share');
        }
        $slider = Slider::find(Input::get('id'));
        $img_path = $slider->img_path;

        if ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/slider',$file->getClientOriginalName());
            
            $slider->update([
                    'img_path' => '/images/slider/'.$file->getClientOriginalName(),
                    'title' => Input::get('title'),
                    'body' => Input::get('body'),
                    'price'  => Input::get('price'),
                    'share' => $share,
                ]); 
            if ($img_path != null)
			{
				if(!DB::table('slider')->where('img_path','like',$img_path)->first())
            	{
					if (file_exists(public_path() .$img_path)) 
            		{
                		unlink(public_path() .$img_path);
            		}
            	}
			}
        }
        else
        {
            $slider->update([
                    'title' => Input::get('title'),
                    'body' => Input::get('body'),
                    'price'  => Input::get('price'),
                    'share' => $share,
                ]); 
        }
        return redirect()->action('AdminController@read_slider');
    }

    public function add_item_product(Request $request)
    {
        if ($request->isMethod('get'))
        {
            return view ('admin.products.add_item_product',['parent'=> Input::get('parent')]);
        }
        elseif ($request->hasFile('default_img'))
        {
            $file = $request->file('default_img');
            $file->move(public_path().'/images/products',$file->getClientOriginalName());
            $default_img = '/images/products/'.$file->getClientOriginalName();
        }
        else
        {
           $default_img = '';
        }
        DB::table('products')->insert([
                'title' => Input::get('title'),
                'discount' => Input::get('discount'),
                'is_new'  => Input::get('is_new'),
                'width_full' => Input::get('width_full'),
                'width_useful' => Input::get('width_useful'),
                'wave' => Input::get('wave'),
                'height' => Input::get('height'),
                'price' => Input::get('price'),
                'parent'=> Input::get('parent'),
                'default_img' => $default_img,
            ]);
            return redirect('read_products?parent='.Input::get('parent'));
    }
    public function update_item_product(Request $request)
    {
        $product = Product::find(Input::get('id'));
        $default_img = $product->default_img;

        if ($request->hasFile('default_img'))
        {
            $file = $request->file('default_img');
            $file->move(public_path() . '/images/products',$file->getClientOriginalName());
        
            $product->update([
                    'title' => Input::get('title'),
                    'discount' => Input::get('discount'),
                    'is_new'  => Input::get('is_new'),
                    'width_full' => Input::get('width_full'),
                    'width_useful' => Input::get('width_useful'),
                    'wave' => Input::get('wave'),
                    'height' => Input::get('height'),
                    'price' => Input::get('price'),
                    'default_img'=> '/images/products/'.$file->getClientOriginalName(),
                ]); 

            if ($default_img!= null)
            {
            	if (!DB::table('products')->where('default_img','like',$default_img)->first())
            	{
            		if (file_exists( public_path() .$default_img))
            		{
                		unlink(public_path() .$default_img);
            		}
            	}
            }
        }
        else
        {
           $product->update([
                    'title' => Input::get('title'),
                    'discount' => Input::get('discount'),
                    'is_new'  => Input::get('is_new'),
                    'width_full' => Input::get('width_full'),
                    'width_useful' => Input::get('width_useful'),
                    'wave' => Input::get('wave'),
                    'height' => Input::get('height'),
                    'price' => Input::get('price'),
                ]); 
            
        }
        return redirect('read_products?parent='.Input::get('parent'));
    }

    public function add_item_catalogs(Request $request) 
    {
        if (!(Input::all()))
        {
            $products = DB::table('products')->pluck('parent');
            $catalogs = DB::table('catalogs')
                    ->whereNotIn('id', $products)
                    ->get();

            return view ('admin.catalogs.add_item_catalogs',['catalogs'=>$catalogs]);
        }
        elseif($request->hasFile('default_img'))
        {
            $file = $request->file('default_img');
            $file->move(public_path().'/images/catalogs',$file->getClientOriginalName());
            $default_img ='/images/catalogs/'.$file->getClientOriginalName();
        }
        else
        {
            $default_img = '';
        }
        DB::table('catalogs')->insert([
                'title' => Input::get('title'),
                'parent' => Input::get('parent'),
                'default_img' =>$default_img,
                ]);
        return redirect()->action('AdminController@read_catalogs');
    }
    public function update_item_catalogs(Request $request)
    {
        if (Input::get('parent') == 'null')
        {
            $parent = null;
        }
        else
        {
            $parent =Input::get('parent');
        }

        $catalog = Catalogs::find(Input::get('id'));
        $default_img = $catalog->default_img;

        if ($request->hasFile('default_img'))
        {
            $file = $request->file('default_img');
            $file->move(public_path() . '/images/catalogs',$file->getClientOriginalName());
            
            
            
            $catalog->update([
                    'title' => Input::get('title'),
                    'parent'  => $parent,
                    'default_img' => '/images/catalogs/'.$file->getClientOriginalName(),
                ]); 

            if ($default_img!= null)
            {
            	if (!DB::table('catalogs')->where('default_img','like',$default_img)->first())
            	{
            		if (file_exists( public_path() .$default_img))
            		{
                		unlink(public_path() .$default_img);
            		}
            	}
            }
        }
        else
        {
            $catalog->update([
                    'title' => Input::get('title'),
                    'parent'  => $parent,
                ]); 
            
        }
        return redirect()->action('AdminController@read_catalogs');
    }


    public function add_images_products(Request $request)
    {
        if($request->isMethod('post'))
        {
            if($request->hasFile('img_path'))
            {
                $file = $request->file('img_path');
                $file->move(public_path() . '/images/images_products',$file->getClientOriginalName());
                
                DB::table('images_products')->insert([
                    'img_path' => '/images/images_products/'.$file->getClientOriginalName(),
                    'parent' => Input::get('parent'),
                ]);
            }
        }
        return redirect('read_images_products?parent='.Input::get('parent'));
    }
    
    public function add_item_descriptions_products(Request $request)
    {
        if($request->isMethod('post'))
        {
            if($request->hasFile('img_path'))
            {
                $file = $request->file('img_path');
                $file->move(public_path() . '/images/descriptions_products',$file->getClientOriginalName());
                $img_path = '/images/descriptions_products/'.$file->getClientOriginalName();
            }
            else
            {
            	$img_path = '';
            }
            DB::table('descriptions_products')->insert([
                    'title' => Input::get('title'),
                    'body' => Input::get('body'),
                    'img_path' =>$img_path ,
                    'parent' => Input::get('parent'),
                ]);
        } 
        return redirect('read_descriptions_products?parent='.Input::get('parent'));
    }
    public function update_item_descriptions_products(Request $request)
    {
        $descriptions_products = DescriptionsProduct::find(Input::get('id'));
        $img_path = $descriptions_products->img_path;

        if ($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/descriptions_products',$file->getClientOriginalName());
            
        
            $descriptions_products->update([
                    'title' => Input::get('title'),
                    'body' => Input::get('body'),
                    'img_path' => '/images/descriptions_products/'.$file->getClientOriginalName(),
            ]);
            if ($img_path != null)
            {
                if(!DB::table('descriptions_products')->where('img_path','like',$img_path)->first())
                {
                    if (file_exists(public_path() .$img_path)) 
                    {
                        unlink(public_path() .$img_path);
                    }
                }
            }
        }
        else
        {
            $descriptions_products->update([
                    'title' => Input::get('title'),
                    'body' => Input::get('body'),
            ]);
        }
        return redirect('read_descriptions_products?parent='.Input::get('parent'));
    }
    
    
    public function add_item_certificates_products(Request $request)
    {
        if ($request->isMethod('get'))
        {
            return view ('admin.products.certificates.add_item_certificates_products',['parent' => Input::get('parent') ]);
        }
        elseif($request->isMethod('post'))
        {
            if($request->hasFile('img_path') && $request->hasFile('prev'))
            {
                $file = $request->file('img_path');
                $file->move(public_path() . '/images/certificates_products',$file->getClientOriginalName());
                
                $file_prev = $request->file('prev');
                $file_prev->move(public_path() . '/images/certificates_products_prev',$file_prev->getClientOriginalName());
                
                DB::table('certificates_products')->insert([
                    'title' => Input::get('title'),
                    'img_path' => '/images/certificates_products/'.$file->getClientOriginalName(),
                    'parent' => Input::get('parent'),
                    'prev' => '/images/certificates_products_prev/'.$file_prev->getClientOriginalName(),
                ]);
            }
        } 
        return redirect('read_certificates_products?parent='.Input::get('parent'));
    }
    public function update_item_certificates_products(Request $request)
    {
        if($request->isMethod('post'))
        {
            $certificates_products = CertificatesProduct::find(Input::get('id'));
            $img_path = $certificates_products->img_path;
            $prev = $certificates_products->prev;

            if($request->hasFile('img_path') && $request->hasFile('prev'))
            {
                $file = $request->file('img_path');
                $file->move(public_path() . '/images/certificates_products',$file->getClientOriginalName());
                
                $file_prev = $request->file('prev');
                $file_prev->move(public_path() . '/images/certificates_products_prev',$file_prev->getClientOriginalName());
                
                
                
                $certificates_products->update([
                    'title' => Input::get('title'),
                    'img_path' => '/images/certificates_products/'.$file->getClientOriginalName(),
                    'prev' => '/images/certificates_products_prev/'.$file_prev->getClientOriginalName(),
                ]);


                if ($img_path != null)
                {
                    if(!DB::table('certificates_products')->where('img_path','like',$img_path)->first())
                    {
                        if (file_exists(public_path() .$img_path)) 
                        {
                            unlink(public_path() .$img_path);
                        }
                    }
                }
                if ($prev != null)
                {
                    if(!DB::table('certificates_products')->where('prev','like',$prev)->first())
                    {
                        if (file_exists(public_path() .$prev)) 
                        {
                            unlink(public_path() .$prev);
                        }
                    }
                }

            }
            elseif($request->hasFile('img_path'))
            {
                $file = $request->file('img_path');
                $file->move(public_path() . '/images/certificates_products',$file->getClientOriginalName());
                
                
                $certificates_products->update([
                    'title' => Input::get('title'),
                    'img_path' => '/images/certificates_products/'.$file->getClientOriginalName(),
                ]);

                if ($img_path != null)
                {
                    if(!DB::table('certificates_products')->where('img_path','like',$img_path)->first())
                    {
                        if (file_exists(public_path() .$img_path)) 
                        {
                            unlink(public_path() .$img_path);
                        }
                    }
                }
            }
            elseif($request->hasFile('prev'))
            {
                $file_prev = $request->file('prev');
                $file_prev->move(public_path() . '/images/certificates_products_prev',$file_prev->getClientOriginalName());
                
                
                $certificates_products->update([
                    'title' => Input::get('title'),
                    'prev' => '/images/certificates_products_prev/'.$file_prev->getClientOriginalName(),
                ]);

                if ($prev != null)
                {
                    if(!DB::table('certificates_products')->where('prev','like',$prev)->first())
                    {
                        if (file_exists(public_path() .$prev)) 
                        {
                            unlink(public_path() .$prev);
                        }
                    }
                }
            }
            else
            {
                $certificates_products->update([
                    'title' => Input::get('title'),
                ]);
            }
        } 
        return redirect('read_certificates_products?parent='.Input::get('parent'));
    }
    
    
    public function add_item_accessories(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view ('admin.accessories.add_item_accessories');
        }
        else
        {
            if($request->hasFile('img_path'))
            {
                $file = $request->file('img_path');
                $file->move(public_path() . '/images/accessories',$file->getClientOriginalName());
                $img_path = '/images/accessories/'.$file->getClientOriginalName();
                
            }
            else
            {
             	$img_path = '';   
            }
            DB::table('accessories')->insert([
                    'title' => Input::get('title'),
                    'body' => Input::get('body'),
                    'price'  => Input::get('price'),
                    'img_path' => $img_path,
                ]);
            return redirect()->action('AdminController@read_accessories');
        }
    }
    public function update_item_accessories(Request $request)
    {
        if($request->isMethod('post'))
        {
            $accessory = Accessories::find(Input::get('id'));
            $img_path = $accessory->img_path;

            if($request->hasFile('img_path'))
            {
                $file = $request->file('img_path');
                $file->move(public_path() . '/images/accessories',$file->getClientOriginalName());
                
                //удаляем старую картинку
                $accessory->update([
                    'title' => Input::get('title'),
                    'body' => Input::get('body'),
                    'price' => Input::get('price'),
                    'img_path' => '/images/accessories/'.$file->getClientOriginalName(),
                ]);

                if ($img_path != null)
	            {
	            	if (!DB::table('accessories')->where('img_path','like',$img_path)->first())
	            	{
	            		if (file_exists( public_path() .$img_path))
	            		{
	                		unlink(public_path() .$img_path);
	            		}
	            	}
	            }
            }
            else
            {
                $accessory->update([
                    'title' => Input::get('title'),
                    'body' => Input::get('body'),
                    'price' => Input::get('price'),
                ]);
            }
        } 
        return redirect('read_accessories');
    }
    
    
    public function add_instructions_products(Request $request)
    {
        if ($request->isMethod('get'))
        {
            return view ('admin.products.instructions.add_instructions_products',['parent' => Input::get('parent') ]);
        }
        elseif($request->isMethod('post'))
        {
            if($request->hasFile('link'))
            {
                $file = $request->file('link');
                $file->move(public_path() . '/docs',$file->getClientOriginalName());
                
                DB::table('instructions_products')->insert([
                    'title' => Input::get('title'),
                    'link' => '/docs/'.$file->getClientOriginalName(),
                    'parent' => Input::get('parent'),
                ]);
            }
        } 
        return redirect('read_instructions_products?parent='.Input::get('parent'));
    }
    public function update_item_materials(Request $request)
    {
        DB::table('materials')
                ->where('id',Input::get('id'))
                ->update([
                    'title' => Input::get('title'),
                    'short_body'  => Input::get('short_body'),
                    'body'  => Input::get('body'),
                ]);
        if($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/materials',$file->getClientOriginalName());
            
            DB::table('images_material_company')
                ->insert([
                    'img_path' => '/images/materials/'.$file->getClientOriginalName(),
                ]);
        }
        return redirect()->action('AdminController@read_materials');
    }
    public function add_brands(Request $request)
    {
        if($request->isMethod('post'))
        {
            if($request->hasFile('img_path'))
            {
                $file = $request->file('img_path');
                $file->move(public_path() . '/images/brands',$file->getClientOriginalName());
                
                DB::table('brands')->insert([
                    'img_path' => '/images/brands/'.$file->getClientOriginalName(),
                ]);
            }
        }
        return redirect('read_brands');
    }
}
