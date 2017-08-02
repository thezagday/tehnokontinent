<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Menu;
use App\Catalogs;
use App\User;
use App\Contacts;
use App\Advantage;
use App\Material;
use App\Share;
use App\Service;
use App\News;
use App\Article;
use App\Comment;
use App\Modal;
use App\Product;
use App\DescriptionsProduct;
use App\Bestseller;
use App\Slider;
use App\ColorsProduct;
use App\Accessories;
use App\Banner;
use App\ImagesMaterialCompany;
use App\ImagesProduct;
use App\CertificatesProduct;
use App\InstructionsProduct;
use App\Brand;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $catalogs = Catalogs::all();
        return view('admin.admin',['catalogs'=>$catalogs]);
    }
    public function reset()
    {
        if (!Input::get('old') && !Input::get('new') && !Input::get('confirm'))
        {
            return view('auth.reset');
        }
        else
        {
            $user = User::find(1); //в таблице одна запись (один админ) с id = 1
            
            if (Hash::check((Input::get('old')), $user->password))
            {
                if ( Input::get('new') == Input::get('confirm') )
                {
                    $user->password = Hash::make(Input::get('new'));
                    $user->save();
                    return view('auth.reset',['message'=>'Пароль успешно изменен!']);
                }
                else
                {
                    return view('auth.reset',['message'=>'Новые пароли не совпадают!']);
                }
            }
            else
            {
                return view('auth.reset',['message'=>'Старый пароль был не такой!']);
            }
        }
    }
    
    /***** CRUD MENU *****/
    
    public function read_menu()
    {
        return view('admin.menu.read_menu',['menu' => Menu::all()]);
    }
    public function edit_item_menu()
    {
        $id = Input::get('id');
        return view('admin.menu.edit_item_menu',['item_menu' => Menu::find($id)]);
    }
    public function update_item_menu()
    {
        DB::table('menu')
                ->where('id',Input::get('id'))
                ->update([
                    'title' => Input::get('title'),
                    //'link'  => Input::get('link'),
                ]); 
        return redirect()->action('AdminController@read_menu');
    }
    public function delete_item_menu()
    {
        $id = Input::get('id');
        DB::table('menu')->where('id', '=', $id)->delete();
        return redirect()->action('AdminController@read_menu');
    }
    
    
    
    /***** CRUD CONTACTS *****/
    
    public function read_contacts()
    {
        return view('admin.contacts.read_contacts',['contacts' => Contacts::all()]);
    }
    public function update_contacts()
    {
        DB::table('contacts')
                ->where('id',1)
                ->update([
                    'phone_mts' => Input::get('phone_mts'),
                    'phone_velcome'  => Input::get('phone_velcome'),
                    'phone' => Input::get('phone'),
                    'address'  => Input::get('address'),
                    'work'  => Input::get('work'),
                    'mail'  => Input::get('mail'),
                    'inst' => Input::get('inst'),
                    'vk' => Input::get('vk'),
                    'fb' => Input::get('fb'),
                    'footer'  => Input::get('footer'),
                ]); 
        return redirect()->action('AdminController@read_contacts');
    }
    
    /***** CRUD CATALOGS *****/
    
    public function read_catalogs()
    {
        return view('admin.catalogs.read_catalogs',['catalogs' => Catalogs::all()]);
    }
    public function edit_item_catalogs()
    {
        $id = Input::get('id');
        $id_parent_catalog = Catalogs::find($id)->parent;
        //по этому id нужно взять parent
        //залить каталог по parent и вывести только его title
        $parent_catalog = Catalogs::find($id_parent_catalog);
        $catalogs = DB::table('catalogs')
                ->Where('id', '<>', $id_parent_catalog)
                ->Where('id','<>', $id)
                ->get();
        return view('admin.catalogs.edit_item_catalogs',['item_catalogs' => Catalogs::find($id),'parent_catalog'=>$parent_catalog,'catalogs'=> $catalogs]);
    }
    
    public function delete_item_catalogs()
    {
        $catalog = Catalogs::find(Input::get('id'));
        
        $sub_catalogs = $catalog->get_childrens;
        /*Удалять еще дефаултные картинки подкатологов*/
        if ($sub_catalogs != null)
        {
            foreach ($sub_catalogs as $sub) 
            {
                $sub_default_img = $sub->default_img;
                $sub->delete();
                if ($sub_default_img != null)
                {
                    
                    if (!DB::table('catalogs')->where('default_img','like',$sub_default_img)->first())
                    {
                        if (file_exists(public_path().$sub_default_img))
                        {
                            unlink(public_path().$sub_default_img);
                        }
                    }
                }
            }
        }
        $default_img = $catalog->default_img;
        $catalog->delete();
        if ($default_img != null)
        {
            if (!DB::table('catalogs')->where('default_img','like',$default_img)->first())
            {
               if (file_exists(public_path().$default_img)) 
                {
                    unlink(public_path().$default_img);
                } 
            }
        }
        
        return redirect()->action('AdminController@read_catalogs');
    }
    
    
    /*CRUD ADVANTAGES*/
    
    public function read_advantages()
    {
        return view('admin.advantages.read_advantages',['advantages' => Advantage::all()]);
    }
    public function edit_item_advantages()
    {
        $id = Input::get('id');
        return view('admin.advantages.edit_item_advantages',['item_advantages' => Advantage::find($id)]);
    }
    public function update_item_advantages()
    {
        DB::table('advantages')
                ->where('id',Input::get('id'))
                ->update([
                    'title' => Input::get('title'),
                    'body'  => Input::get('body'),
                ]); 
        return redirect()->action('AdminController@read_advantages');
    }
    public function add_item_advantages() 
    {
        if (!Input::all())
        {
            return view ('admin.advantages.add_item_advantages');
        }
        else
        {
            DB::table('advantages')->insert([
                'title' => Input::get('title'),
                'body' => Input::get('body'),
                ]);
        return redirect()->action('AdminController@read_advantages');
        }
    }
    public function delete_item_advantages()
    {
        $id = Input::get('id');
        DB::table('advantages')->where('id', '=', $id)->delete();
        return redirect()->action('AdminController@read_advantages');
    }
    
    /*CRUD MATERIALS*/
    public function read_materials()
    {
        return view('admin.materials.read_materials',['materials' => Material::all()]);
    }
    public function edit_item_materials()
    {
        $id = Input::get('id');
        $images = ImagesMaterialCompany::all();

        return view('admin.materials.edit_item_materials',['item_materials' => Material::find($id),'images'=>$images]);
    }
    public function delete_images_material_company()
    {
        $images_material_company = ImagesMaterialCompany::find(Input::get('id'));
        $img_path = $images_material_company->img_path;
        $images_material_company->delete();

        if ($img_path != null)
        {
            if (! DB::table('materials')->where('img_path','like',$img_path)->first())
            {
                if (file_exists( public_path() .$img_path))
                {
                    unlink(public_path() .$img_path);
                }
            }
        }
        return redirect()->action('AdminController@read_materials');
    }
    
    
    /*CRUD SHARES*/
    public function read_shares()
    {
        return view('admin.shares.read_shares',['shares' => Share::all()]);
    }
    public function edit_item_shares()
    {
        $id = Input::get('id');
        return view('admin.shares.edit_item_shares',['item_shares' => Share::find($id)]);
    }
    public function delete_item_shares()
    {
        $share = Share::find(Input::get('id'));
        $img_path = $share->img_path;
        $share->delete();
        if ($img_path != null)
        {
            if (!DB::table('shares')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path() .$img_path))
                {
                    unlink(public_path() .$img_path);
                }
            }
        }
        return redirect()->action('AdminController@read_shares');
    }
    
    /*CRUD SERVICES*/
    public function read_services()
    {
        return view('admin.services.read_services',['services' => Service::all()]);
    }
    public function edit_item_services()
    {
        $id = Input::get('id');
        return view('admin.services.edit_item_services',['item_services' => Service::find($id)]);
    }
    public function delete_item_services()
    {
        $service = Service::find(Input::get('id'));
        $img_path = $service->img_path;
        $service->delete();
        if ($img_path != null)
        {
            if (!DB::table('services')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                    unlink(public_path() .$img_path);
                }
            }
        }
        
        return redirect()->action('AdminController@read_services');
    }
    
    /*CRUD NEWS*/
    public function read_news()
    {
        return view('admin.news.read_news',['news' => News::all()]);
    }
    public function edit_item_news()
    {
        $id = Input::get('id');
        return view('admin.news.edit_item_news',['item_news' => News::find($id)]);
    }
    public function delete_item_news()
    {
        $news = News::find(Input::get('id'));
        $img_path = $news->img_path;
        $news->delete();
        if ($img_path != null)
        {
            if (!DB::table('news')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                    unlink(public_path() .$img_path);
                }
            }
        }
        return redirect()->action('AdminController@read_news');
    }
    
    /*CRUD ARTICLES*/
    public function read_articles()
    {
        return view('admin.articles.read_articles',['articles' => Article::all()]);
    }
    public function edit_item_articles()
    {
        $id = Input::get('id');
        return view('admin.articles.edit_item_articles',['item_articles' => Article::find($id)]);
    }
    public function delete_item_articles()
    {
        $article = Article::find(Input::get('id'));
        $img_path = $article->img_path;
        $article->delete();

        if ($img_path != null)
        {
            if (!DB::table('articles')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                    unlink(public_path() .$img_path);
                }
            }
        }
        
        return redirect()->action('AdminController@read_articles');
    }
    
    /*CRUD COMMENTS*/
    public function read_comments()
    {
        return view('admin.comments.read_comments',['comments' => Comment::all()]);
    }
    public function edit_item_comments()
    {
        $id = Input::get('id');
        return view('admin.comments.edit_item_comments',['item_comments' => Comment::find($id)]);
    }
    public function delete_item_comments()
    {
        $comments = Comment::find(Input::get('id'));
        $img_path = $comment->img_path;
        $comment->delete();
        if ($img_path != null)
        {
            if (!DB::table('comments')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                    unlink(public_path() .$img_path);
                }   
            }
        }
        return redirect()->action('AdminController@read_comments');
    }
    
    /*CRUD MODALS*/
    public function read_modals()
    {
        return view('admin.modals.read_modals',['modals' => Modal::all()]);
    }
    public function update_modals()
    {
        DB::table('modals')
                ->where('id',1)
                ->update([
                    'partners' => Input::get('partners'),
                    'payment'  => Input::get('payment'),
                    'leave'  => Input::get('leave'),
                    'buy'  => Input::get('buy'),
                ]); 
        return redirect()->action('AdminController@read_modals');
    }

    /***** CRUD BANNER *****/
    
    public function read_banner()
    {
        return view('admin.banner.read_banner',['banner' => Banner::all()]);
    }

    public function read_slider()
    {
    	return view('admin.slider.read_slider',['slider'=>Slider::all()]);
    }
    public function edit_item_slider()
    {
        $item_slider = Slider::find(Input::get('id'));
        
        $share = Share::find($item_slider->share);

        return view('admin.slider.edit_item_slider',['item_slider' =>$item_slider ,'shares'=>Share::all(),'share'=>$share]);
    }
    public function delete_item_slider()
    {
        /*Удаляем картинку из БД*/
        $slider = Slider::find(Input::get('id'));
        $img_path = $slider->img_path;
        $slider->delete();

        if ($img_path != null)
        {
            if (! DB::table('slider')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                     unlink(public_path().$img_path);
                }
            }
        }
        return redirect()->action('AdminController@read_slider');
    }
    
    /*CRUD CATALOG*/
    public function read_products()
    {
        $products = DB::table('products')
            ->where('parent', '=', Input::get('parent'))
            ->get();
        return view('admin.products.read_products',['products' => $products,'parent'=>Input::get('parent')]);
    }
    public function edit_item_product()
    {
        $id = Input::get('id');
        return view('admin.products.edit_item_product',['item_product' => Product::find($id)]);
    }
    public function delete_item_product()
    {
        
        $product = Product::find(Input::get('id'));
        $default_img = $product->default_img;
        $product->delete();

        /*Удаляем картинку по умолчанию*/
        if ($default_img != null)
        {
            if (!DB::table('products')->where('default_img','like',$default_img)->first())
            {
                if (file_exists(public_path().$default_img))
                {
                    unlink(public_path().$default_img);
                }
            }
        }

        /*Удаляем соответствующие картинки данному продукту*/
        $images_products = DB::table('images_products')->where('parent', Input::get('id'))->get();
        foreach ($images_products as $item) 
        {
            if ($item->img_path != null)
            {
                if (!DB::table('images_products')->where('img_path','like',$item->img_path))
                {
                   if (file_exists(public_path().$item->img_path))
                    {
                        unlink(public_path() .$item->img_path);
                    } 
                }
                
            }
            
        }
        
        /*Удаляем соответствующие описания данному продукту*/
        $descriptions_products = DB::table('descriptions_products')->where('parent', Input::get('id'))->get();
        foreach ($descriptions_products as $item)
        {
           if ($item->img_path != null)
            {
                if (!DB::table('descriptions_products')->where('img_path','like',$item->img_path))
                {
                   if (file_exists(public_path().$item->img_path))
                    {
                        unlink(public_path() .$item->img_path);
                    } 
                }
                
            }
        }
        
        /*Удаляем соответствующие инструкции данному продукту*/
        $instructions_products = DB::table('instructions_products')->where('parent', Input::get('id'))->get();
        foreach ($instructions_products as $item)
        {
            if ($item->link != null)
            {
                if (!DB::table('instructions_products')->where('link','like',$item->link))
                {
                   if (file_exists(public_path().$item->link))
                    {
                        unlink(public_path() .$item->link);
                    } 
                }
                
            }
        }
        
        /*Удаляем соответствующие сертификаты данному продукту*/
        $certificates_products = DB::table('certificates_products')->where('parent', Input::get('id'))->get();
        foreach ($certificates_products as $item)
        {
            if ($item->img_path != null)
            {
                if (!DB::table('certificates_products')->where('img_path','like',$item->img_path))
                {
                   if (file_exists(public_path().$item->img_path))
                    {
                        unlink(public_path() .$item->img_path);
                    } 
                }
                
            }
            if ($item->prev != null)
            {
                if (!DB::table('certificates_products')->where('img_path','like',$item->prev))
                {
                   if (file_exists(public_path().$item->prev))
                    {
                        unlink(public_path() .$item->prev);
                    } 
                }
                
            }
        }
        
        
        return redirect('read_products?parent='.Input::get('parent'));
    }
    
    /*CRUD ACCESSORIES*/
    
    public function read_accessories()
    {
        return view('admin.accessories.read_accessories',['accessories' => \App\Accessories::all()]);
    }
    public function edit_item_accessories()
    {
        $id = Input::get('id');
        return view('admin.accessories.edit_item_accessories',['item_accessories' => \App\Accessories::find($id)]);
    }
    public function delete_item_accessories()
    {
        $accessory = Accessories::find(Input::get('id'));
        $img_path = $accessory->img_path;
        $accessory->delete();

        if ($img_path != null)
        {
            if (!DB::table('accessories')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                    unlink(public_path().$img_path);
                }
            }
        }
        return redirect()->action('AdminController@read_accessories');
    }
    
    /*DESCRIPTION PRODUCTS*/
    
    public function read_descriptions_products()
    {
        $descriptions = DB::table('descriptions_products')
            ->where('parent', '=', Input::get('parent'))
            ->get();
        return view ('admin.products.descriptions.read_descriptions_products',['descriptions'=>$descriptions,'parent'=>Input::get('parent'),'parprod'=> Input::get('parprod')]);
    }
    public function edit_item_descriptions_products()
    {
        $id = Input::get('id');
        return view('admin.products.descriptions.edit_item_descriptions_products',['item_descriptions_products' => DescriptionsProduct::find($id)]);
    }
    
    public function add_item_descriptions_products()
    {
        return view ('admin.products.descriptions.add_item_descriptions_products',['parent' => Input::get('parent')]);
        //остальное добавление в контроллере UploadController
    }
    public function delete_item_descriptions_products()
    {
        $descriptions_products = DescriptionsProduct::find(Input::get('id'));
        $img_path = $descriptions_products->img_path;
        $descriptions_products->delete();

        if ($img_path!= null)
        {
            if (!DB::table('descriptions_products')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                    unlink(public_path() .$img_path);
                }
            }
        }
        return redirect('read_descriptions_products?parent='.Input::get('parent'));
    }
    
    /*IMAGES PRODUCTS*/
    
    public function read_images_products()
    {
        $images = DB::table('images_products')
            ->where('parent', '=', Input::get('parent'))
            ->get();
        return view ('admin.products.images.read_images_products',['images'=>$images,'parent'=> Input::get('parent'),'parprod'=> Input::get('parprod')]);
    }
    public function delete_images_products()
    {
        $images_products = ImagesProduct::find(Input::get('id'));
        $img_path = $images_products->img_path;
        $images_products->delete();
        if ($img_path != null)
        {
          if (! DB::table('images_products')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                    unlink(public_path() .$img_path);
                }
            }  
        }
        return redirect('read_images_products?parent='.Input::get('parent'));
    }
    
    /*COLORS PRODUCTS*/
    public function read_colors_products()
    {
        $colors = Product::find(Input::get('parent'))->get_colors;
        return view('admin.products.colors.read_colors_products',['colors'=>$colors,'parent'=> Input::get('parent'),'parprod'=> Input::get('parprod')]);
    }
    public function add_item_colors_products(Request $request)
    {
        if ($request->isMethod('get'))
        {
            //добавить только те цвета, которых нет у этого продукта
            $colors_product_id_in_table_products_colors_product = DB::table('products_colors_product')
                    ->where('product_id','=',Input::get('parent'))
                    ->pluck('colors_product_id');
            
            $colors = DB::table('colors_products')
                    ->whereNotIn('id', $colors_product_id_in_table_products_colors_product)
                    ->get();
            return view('admin.products.colors.all_colors',['colors'=> $colors,'parent' => Input::get('parent')]);
        }
        elseif ($request->isMethod('post'))
        {
            foreach (Input::get('ids') as $id) 
            {
               DB::table('products_colors_product')->insert([
                'colors_product_id' => $id,
                'product_id' => Input::get('parent'),
                ]);
            }
            return redirect('read_colors_products?parent='.Input::get('parent'));
        }
    }
    public function delete_item_colors_products()
    {
        DB::table('products_colors_product')
                ->where([['colors_product_id', '=', Input::get('id')],['product_id','=',Input::get('parent')]])
                ->delete();
        return redirect('read_colors_products?parent='.Input::get('parent'));
    }
    
    
    /*ACCESSORIES PRODUCTS*/
    public function read_accessories_products()
    {
        $accessories = Product::find(Input::get('parent'))->get_accessories;
        return view('admin.products.accessories.read_accessories_products',['accessories'=>$accessories,'parent'=> Input::get('parent'),'parprod'=> Input::get('parprod')]);
    }
    public function add_accessories_products(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $accessories_id_in_table_accessories_products = DB::table('accessories_products')
                    ->where('product_id','=',Input::get('parent'))
                    ->pluck('accessories_id');
            
            $accessories = DB::table('accessories')
                    ->whereNotIn('id', $accessories_id_in_table_accessories_products)
                    ->get();
            
            return view('admin.products.accessories.all_accessories',['accessories'=>$accessories,'parent' => Input::get('parent')]);
        }
        elseif ($request->isMethod('post'))
        {
            foreach (Input::get('ids') as $id)
            {
                DB::table('accessories_products')->insert([
                'accessories_id' => $id,
                'product_id' => Input::get('parent'),
                ]);
            }
            return redirect('read_accessories_products?parent='.Input::get('parent'));
        }
    }
    public function delete_item_accessories_products()
    {
        DB::table('accessories_products')
                ->where([['accessories_id', '=', Input::get('id')],['product_id','=',Input::get('parent')]])
                ->delete();
        return redirect('read_accessories_products?parent='.Input::get('parent'));
    }
    
    
    /*CERTIFICATES PRODUCTS*/
    public function read_certificates_products()
    {
        $certificates = Product::find(Input::get('parent'))->get_certificates;
        return view('admin.products.certificates.read_certificates_products',['certificates'=>$certificates,'parent'=> Input::get('parent'),'parprod'=> Input::get('parprod')]);
    }
    public function edit_item_certificates_products()
    {
        $item_certificates = \App\CertificatesProduct::find(Input::get('id'));
        return view('admin.products.certificates.edit_item_certificates_products',['item_certificates' =>$item_certificates,'parent'=> Input::get('parent') ]);
    }
    public function delete_certificates_products()
    {
        $certificates_products = CertificatesProduct::find(Input::get('id'));
        $img_path = $certificates_products->img_path;
        $prev = $certificates_products->prev;
        $certificates_products->delete();

        if ($img_path != null)
        {
            if (!DB::table('certificates_products')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                    unlink(public_path() .$img_path);
                }
            }
        }

        if ($prev != null)
        {
            if (!DB::table('certificates_products')->where('prev','like',$prev)->first())
            {
                if (file_exists(public_path().$prev))
                {
                    unlink(public_path() .$prev);
                }
            }
        }
        return redirect('read_certificates_products?parent='.Input::get('parent'));
    }
    
    /*INSTRUCTIONS PRODUCTS*/
    
    public function read_instructions_products()
    {
        $instructions = Product::find(Input::get('parent'))->get_instructions;
        return view('admin.products.instructions.read_instructions_products',['instructions'=>$instructions,'parent'=> Input::get('parent'),'parprod'=> Input::get('parprod')]);
    }
    public function edit_instructions_products()
    {
        $item_instructions = \App\InstructionsProduct::find(Input::get('id'));
        return view('admin.products.instructions.edit_instructions_products',['item_instructions'=>$item_instructions,'parent'=> Input::get('parent')]);
    }
    public function update_instructions_products()
    {
         DB::table('instructions_products')
                ->where('id',Input::get('id'))
                ->update([
                    'title' => Input::get('title'),
                ]); 
        return redirect('read_instructions_products?parent='.Input::get('parent'));
    }
    public function delete_instructions_products()
    {
        $instructions_products = InstructionsProduct::find(Input::get('id'));
        $link = $instructions_products->link;
        $instructions_products->delete();

        if ($link != null)
        {
            if (!DB::table('instructions_products')->where('link','like',$link)->first())
            {
                if (file_exists(public_path().$link))
                {
                    unlink(public_path() .$link);
                }
            }
        }
        return redirect('read_instructions_products?parent='.Input::get('parent'));
    }

    /*BESTSELLERS*/
    public function read_bestsellers() 
    {
        $bestsellers = Bestseller::all();
        $bestsellers_page = array();
        if ($bestsellers != null)
        {
            foreach ($bestsellers as $bestseller)
            {
                array_push($bestsellers_page, Product::find($bestseller->id_best_product));
            }
        }
        return view ('admin.bestsellers.read_bestsellers',['bestsellers'=> $bestsellers_page]);
    }
    public function add_item_bestsellers()
    {
        if (!Input::all())
        {
            $products_id_in_table_bestsellers = DB::table('bestsellers')
                    ->pluck('id_best_product');
            
            $products = DB::table('products')
                    ->whereNotIn('id', $products_id_in_table_bestsellers)
                    ->get();
            
            return view ('admin.bestsellers.add_item_bestsellers',['products'=> $products]);
        }
        elseif (Input::get('ids')!= null)
        {
            foreach (Input::get('ids') as $id)
            {
                DB::table('bestsellers')->insert([
                'id_best_product' => $id,
                ]);
            }
            return redirect()->action('AdminController@read_bestsellers');
        }
    }
    public function delete_item_bestsellers()
    {
        DB::table('bestsellers')
                ->where('id_best_product', '=', Input::get('id'))
                ->delete();
        return redirect()->action('AdminController@read_bestsellers');
    }
    public function read_colors()
    {
    	return view('admin.colors.read_colors',['colors'=>ColorsProduct::all()]);
    }
    public function add_item_color()
    {
        if (!Input::all())
        {
            return view ('admin.colors.add_item_color');
        }
        else
        {
            DB::table('colors_products')->insert([
                'title' => Input::get('title'),
                ]);
        	return redirect()->action('AdminController@read_colors');
        }
    }
    public function edit_item_color()
    {
    	$id = Input::get('id');
        return view('admin.colors.edit_item_color',['item_color' => ColorsProduct::find($id)]);
    }
    public function update_item_color()
    {
    	DB::table('colors_products')
                ->where('id',Input::get('id'))
                ->update([
                    'title' => Input::get('title'),
                ]); 
        return redirect()->action('AdminController@read_colors');
    }
    public function delete_item_color()
    {
    	ColorsProduct::find(Input::get('id'))->delete();
    	return redirect()->action('AdminController@read_colors');
    }

    public function read_brands()
    {
        $images = DB::table('brands')->get();
        return view ('admin.brands.read_brands',['images'=>$images]);
    }
    public function delete_brands()
    {
        $brand = Brand::find(Input::get('id'));
        $img_path = $brand->img_path;
        $brand->delete();
        if ($img_path != null)
        {
          if (! DB::table('brands')->where('img_path','like',$img_path)->first())
            {
                if (file_exists(public_path().$img_path))
                {
                    unlink(public_path() .$img_path);
                }
            }  
        }
        return redirect('read_brands');
    }
    
}
