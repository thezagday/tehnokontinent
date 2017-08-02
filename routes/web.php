<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
 * 
 * //Route::get('message/{id}/edit',['uses'=>'HomeController@edit','as'=>'message.edit'])->where(['id'=>'[0-9]+']);
|*/
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('reset', '\App\Http\Controllers\AdminController@reset');
Route::post('reset', '\App\Http\Controllers\AdminController@reset');
/* Загрузка картинки*/
Route::get('upload',['as' => 'upload_form', 'uses' => 'UploadController@getForm']);
Route::post('upload',['as' => 'upload_file','uses' => 'UploadController@upload']);

/*Поиск*/
Route::get('/search',['uses'=>'SearchController@search','as'=>'search']);

/* Pages */
Route::get('/', ['uses'=>'HomeController@index','as'=>'home']);

Route::get('/company',['uses'=>'HomeController@company','as'=>'home']);
Route::get('/comments',['uses'=>'HomeController@comments','as'=>'home']);

Route::get('/catalogs',['uses'=>'CatalogController@catalogs','as'=>'catalog']);
Route::get('/catalog_page',['uses'=>'CatalogController@catalog_page','as'=>'catalog']);
Route::get('/catalogs_list',['uses'=>'CatalogController@catalogs_list','as'=>'catalog']);

Route::any('/products',['uses'=>'ProductController@products','as'=>'product']);
Route::get('/product_page',['uses'=>'ProductController@product_page','as'=>'product']);
Route::get('/products_list',['uses'=>'ProductController@products_list','as'=>'product']);


Route::get('/shares',['uses'=>'ShareController@shares','as'=>'share']);
Route::get('/share_page',['uses'=>'ShareController@share_page','as'=>'share']);

Route::get('/services',['uses'=>'ServiceController@services','as'=>'service']);
Route::get('/service_page',['uses'=>'ServiceController@service_page','as'=>'service']);

Route::get('/news',['uses'=>'NewsController@news','as'=>'news']);
Route::get('/news_page',['uses'=>'NewsController@news_page','as'=>'news']);

Route::get('/articles',['uses'=>'ArticleController@articles','as'=>'article']);
Route::get('/article_page',['uses'=>'ArticleController@article_page','as'=>'article']);

Route::get('/certificates',['uses'=>'CertificatesController@certificates','as'=>'certificates']);

Route::get('/contacts',['uses'=>'ContactsController@contacts','as'=>'contacts']);

Route::get('/accessories',['uses'=>'AccessoryController@accessories','as'=>'accessories']);
Route::get('/accessories_page',['uses'=>'AccessoryController@accessories_page','as'=>'accessories']);
Route::get('/accessories_list',['uses'=>'AccessoryController@accessories_list','as'=>'accessories']);


/* ADMIN */

Route::get('/admin', ['uses'=>'AdminController@admin','as'=>'admin']);

/* Menu */
Route::get('/read_menu', ['uses'=>'AdminController@read_menu','as'=>'admin']);
Route::get('/edit_item_menu', ['uses'=>'AdminController@edit_item_menu','as'=>'admin']);
Route::post('/update_item_menu', ['uses'=>'AdminController@update_item_menu','as'=>'admin']);
Route::any('/add_item_menu',['uses'=>'AdminController@add_item_menu','as'=>'admin']);
Route::get('/delete_item_menu',['uses'=>'AdminController@delete_item_menu','as'=>'admin']);

/*Modal*/
Route::get('/read_modals', ['uses'=>'AdminController@read_modals','as'=>'admin']);
Route::post('/update_modals', ['uses'=>'AdminController@update_modals','as'=>'admin']);



/*Catalogs*/
Route::get('/read_catalogs', ['uses'=>'AdminController@read_catalogs','as'=>'admin']);
Route::get('/edit_item_catalogs', ['uses'=>'AdminController@edit_item_catalogs','as'=>'admin']);
Route::post('/update_item_catalogs', ['uses'=>'UploadController@update_item_catalogs','as'=>'upload']);
Route::any('/add_item_catalogs',['uses'=>'UploadController@add_item_catalogs','as'=>'upload']);
Route::get('/delete_item_catalogs',['uses'=>'AdminController@delete_item_catalogs','as'=>'admin']);

/*Shares*/
Route::get('/read_shares', ['uses'=>'AdminController@read_shares','as'=>'admin']);
Route::get('/edit_item_shares', ['uses'=>'AdminController@edit_item_shares','as'=>'admin']);
Route::post('/update_item_shares', ['uses'=>'UploadController@update_item_shares','as'=>'upload']);
Route::any('/add_item_shares',['uses'=>'UploadController@add_item_shares','as'=>'upload']);
Route::get('/delete_item_shares',['uses'=>'AdminController@delete_item_shares','as'=>'admin']);

/*Services*/
Route::get('/read_services', ['uses'=>'AdminController@read_services','as'=>'admin']);
Route::get('/edit_item_services', ['uses'=>'AdminController@edit_item_services','as'=>'admin']);
Route::post('/update_item_services', ['uses'=>'UploadController@update_item_services','as'=>'upload']);
Route::any('/add_item_services',['uses'=>'UploadController@add_item_services','as'=>'upload']);
Route::get('/delete_item_services',['uses'=>'AdminController@delete_item_services','as'=>'admin']);

/*News*/
Route::get('/read_news', ['uses'=>'AdminController@read_news','as'=>'admin']);
Route::get('/edit_item_news', ['uses'=>'AdminController@edit_item_news','as'=>'admin']);
Route::post('/update_item_news', ['uses'=>'UploadController@update_item_news','as'=>'upload']);
Route::any('/add_item_news',['uses'=>'UploadController@add_item_news','as'=>'upload']);
Route::get('/delete_item_news',['uses'=>'AdminController@delete_item_news','as'=>'admin']);

/*Articles*/
Route::get('/read_articles', ['uses'=>'AdminController@read_articles','as'=>'admin']);
Route::get('/edit_item_articles', ['uses'=>'AdminController@edit_item_articles','as'=>'admin']);
Route::post('/update_item_articles', ['uses'=>'UploadController@update_item_articles','as'=>'upload']);
Route::any('/add_item_articles',['uses'=>'UploadController@add_item_articles','as'=>'upload']);
Route::get('/delete_item_articles',['uses'=>'AdminController@delete_item_articles','as'=>'admin']);


/* Contacts */
Route::get('/read_contacts', ['uses'=>'AdminController@read_contacts','as'=>'admin']);
Route::post('/update_contacts', ['uses'=>'AdminController@update_contacts','as'=>'admin']);

/*Banner*/
Route::get('/read_banner', ['uses'=>'AdminController@read_banner','as'=>'admin']);
Route::post('/update_banner', ['uses'=>'UploadController@update_banner','as'=>'upload']);

/*Slider*/
Route::get('/read_slider', ['uses'=>'AdminController@read_slider','as'=>'admin']);
Route::get('/edit_item_slider', ['uses'=>'AdminController@edit_item_slider','as'=>'admin']);
Route::any('/add_slider',['uses'=>'UploadController@add_slider','as'=>'upload']);
Route::post('/update_item_slider',['uses'=>'UploadController@update_item_slider','as'=>'upload']);
Route::get('/delete_item_slider',['uses'=>'AdminController@delete_item_slider','as'=>'admin']);

/*Comments*/
Route::get('/read_comments', ['uses'=>'AdminController@read_comments','as'=>'admin']);
Route::get('/edit_item_comments', ['uses'=>'AdminController@edit_item_comments','as'=>'admin']);
Route::post('/update_item_comments', ['uses'=>'UploadController@update_item_comments','as'=>'upload']);
Route::any('/add_item_comments',['uses'=>'UploadController@add_item_comments','as'=>'upload']);
Route::get('/delete_item_comments',['uses'=>'AdminController@delete_item_comments','as'=>'admin']);

/*Advantages*/

Route::get('/read_advantages', ['uses'=>'AdminController@read_advantages','as'=>'admin']);
Route::get('/edit_item_advantages', ['uses'=>'AdminController@edit_item_advantages','as'=>'admin']);
Route::post('/update_item_advantages', ['uses'=>'AdminController@update_item_advantages','as'=>'admin']);
Route::any('/add_item_advantages',['uses'=>'AdminController@add_item_advantages','as'=>'admin']);
Route::get('/delete_item_advantages',['uses'=>'AdminController@delete_item_advantages','as'=>'admin']);

/*Materials*/
Route::get('/read_materials', ['uses'=>'AdminController@read_materials','as'=>'admin']);
Route::get('/edit_item_materials', ['uses'=>'AdminController@edit_item_materials','as'=>'admin']);
Route::post('/update_item_materials', ['uses'=>'UploadController@update_item_materials','as'=>'upload']);
Route::get('/delete_images_material_company', ['uses'=>'AdminController@delete_images_material_company','as'=>'admin']);



/*Accessories*/
Route::get('/read_accessories', ['uses'=>'AdminController@read_accessories','as'=>'admin']);
Route::get('/edit_item_accessories', ['uses'=>'AdminController@edit_item_accessories','as'=>'admin']);
Route::post('/update_item_accessories', ['uses'=>'UploadController@update_item_accessories','as'=>'upload']);
Route::any('/add_item_accessories',['uses'=>'UploadController@add_item_accessories','as'=>'upload']);
Route::get('/delete_item_accessories',['uses'=>'AdminController@delete_item_accessories','as'=>'admin']);

/*Products*/
Route::get('/read_products', ['uses'=>'AdminController@read_products','as'=>'admin']);
Route::get('/edit_item_product', ['uses'=>'AdminController@edit_item_product','as'=>'admin']);
Route::any('/add_item_product', ['uses'=>'UploadController@add_item_product','as'=>'upload']);
Route::post('/update_item_product', ['uses'=>'UploadController@update_item_product','as'=>'upload']);
Route::get('/delete_item_product', ['uses'=>'AdminController@delete_item_product','as'=>'admin']);

/*Descriptions products*/
Route::get('/read_descriptions_products', ['uses'=>'AdminController@read_descriptions_products','as'=>'admin']);
Route::get('/edit_item_descriptions_products', ['uses'=>'AdminController@edit_item_descriptions_products','as'=>'admin']);
Route::post('/update_item_descriptions_products', ['uses'=>'UploadController@update_item_descriptions_products','as'=>'upload']);
Route::get('/add_item_descriptions_products',['uses'=>'AdminController@add_item_descriptions_products','as'=>'admin']);
Route::post('/add_item_descriptions_products',['uses'=>'UploadController@add_item_descriptions_products','as'=>'upload']);
Route::get('/delete_item_descriptions_products',['uses'=>'AdminController@delete_item_descriptions_products','as'=>'admin']);

/*Images products*/
Route::get('/read_images_products', ['uses'=>'AdminController@read_images_products','as'=>'admin']);
Route::any('/add_images_products',['uses'=>'UploadController@add_images_products','as'=>'upload']);
Route::get('/delete_images_products',['uses'=>'AdminController@delete_images_products','as'=>'admin']);

/*Colors products*/
Route::get('/read_colors_products', ['uses'=>'AdminController@read_colors_products','as'=>'admin']);
Route::any('/add_item_colors_products',['uses'=>'AdminController@add_item_colors_products','as'=>'admin']);
Route::get('/delete_item_colors_products',['uses'=>'AdminController@delete_item_colors_products','as'=>'admin']);


/*Certificates products*/
Route::get('/read_certificates_products', ['uses'=>'AdminController@read_certificates_products','as'=>'admin']);
Route::get('/edit_item_certificates_products', ['uses'=>'AdminController@edit_item_certificates_products','as'=>'admin']);
Route::any('/add_item_certificates_products',['uses'=>'UploadController@add_item_certificates_products','as'=>'upload']);
Route::get('/delete_certificates_products',['uses'=>'AdminController@delete_certificates_products','as'=>'admin']);
Route::any('/update_item_certificates_products',['uses'=>'UploadController@update_item_certificates_products','as'=>'upload']);

/*Instructions products*/
Route::get('/read_instructions_products', ['uses'=>'AdminController@read_instructions_products','as'=>'admin']);
Route::any('/add_instructions_products',['uses'=>'UploadController@add_instructions_products','as'=>'upload']);
Route::get('/delete_instructions_products', ['uses'=>'AdminController@delete_instructions_products','as'=>'admin']);
Route::get('/edit_instructions_products', ['uses'=>'AdminController@edit_instructions_products','as'=>'admin']);
Route::any('/update_instructions_products', ['uses'=>'AdminController@update_instructions_products','as'=>'admin']);

/*Accessories products*/
Route::get('/read_accessories_products', ['uses'=>'AdminController@read_accessories_products','as'=>'admin']);
Route::any('/add_accessories_products', ['uses'=>'AdminController@add_accessories_products','as'=>'admin']);
Route::get('/delete_item_accessories_products', ['uses'=>'AdminController@delete_item_accessories_products','as'=>'admin']);


/*Bestsellers*/
Route::get('/read_bestsellers', ['uses'=>'AdminController@read_bestsellers','as'=>'admin']);
Route::any('/add_item_bestsellers', ['uses'=>'AdminController@add_item_bestsellers','as'=>'admin']);
Route::get('/delete_item_bestsellers', ['uses'=>'AdminController@delete_item_bestsellers','as'=>'admin']);

/*Colors*/
Route::get('/read_colors', ['uses'=>'AdminController@read_colors','as'=>'admin']);
Route::any('/add_item_color',['uses'=>'AdminController@add_item_color','as'=>'admin']);
Route::get('/delete_item_color', ['uses'=>'AdminController@delete_item_color','as'=>'admin']);
Route::get('/edit_item_color', ['uses'=>'AdminController@edit_item_color','as'=>'admin']);
Route::post('/update_item_color', ['uses'=>'AdminController@update_item_color','as'=>'admin']);

/*Feedback*/
Route::post('/mail',['uses'=>'MailController@mail','as'=>'mail']);
Route::post('/message',['uses'=>'MailController@message','as'=>'mail']);
Route::post('/feedback',['uses'=>'MailController@feedback','as'=>'mail']);
Route::post('/user_dispatch',['uses'=>'MailController@user_dispatch','as'=>'mail']);

/*Brands*/
Route::get('/read_brands', ['uses'=>'AdminController@read_brands','as'=>'admin']);
Route::any('/add_brands',['uses'=>'UploadController@add_brands','as'=>'upload']);
Route::get('/delete_brands',['uses'=>'AdminController@delete_brands','as'=>'admin']);

Route::get('/site_map',['uses'=>'MapController@map','as'=>'map']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
