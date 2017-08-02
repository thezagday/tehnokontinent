<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(255);
        $this->ComposeMenu();
        $this->ComposeMainMenu();
        $this->ComposeParentCatalogs();
        $this->ComposeContacts();
        $this->ComposeServices();
        $this->ComposeModals();
        $this->ComposeBanner();
        $this->ComposeRegion();
        /*Admin*/
        $this->ComposeAdminCatalog();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    private function ComposeMenu()
    {
        view()->composer('index', function($view)
        {
            $view->with('menu', \App\Menu::all());
        });
    }
    
    private function ComposeMainMenu()
    {
        view()->composer('index', function($view)
        {
            $view->with('main_menu', \App\Main_menu::all());
        });
    }
    private function ComposeParentCatalogs()
    {
        view()->composer('index', function($view)
        {
            $view->with('parent_catalogs', DB::table('catalogs')->whereNull('parent')->get());
            $view->with('catalogs', DB::table('catalogs')->get());
            //$view->with('parent_catalogs', DB::table('catalogs')->where('parent', '=', 0)->get());
        });
    }
    private function ComposeContacts()
    {
        view()->composer('index', function($view)
        {
            $view->with('contacts', \App\Contacts::all());
        });
    }
    private function ComposeServices()
    {
        view()->composer('index', function($view)
        {
            $view->with('services', \App\Service::all());
        });
    }
    private function ComposeModals()
    {
        view()->composer('index', function($view)
        {
            $view->with('modals', \App\Modal::all());
        });
    }
    private function ComposeAdminCatalog()
    {
        view()->composer('admin', function($view)
        {
            $view->with('catalogs', \App\Catalogs::all());
        });
    }
    private function ComposeBanner()
    {
        view()->composer('_common._banner', function($view)
        {
            $view->with('banner', \App\Banner::find(1));
        });
    }
    private function ComposeRegion()
    {
        view()->composer('index', function($view)
        {
            
            /*function getIpInfo($ip)
            {
                $curl = curl_init();
                if($curl) 
                {
                  curl_setopt($curl, CURLOPT_URL, 'http://194.85.91.253:8090/geo/geo.html');
                  curl_setopt($curl, CURLOPT_POSTFIELDS, "$ip");
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                  $response = curl_exec($curl);
                  curl_close($curl);
                  if (substr($response, 0, 5) == '<?xml') 
                  {
                      $xml = new SimpleXMLElement($response);
                      return $xml->ip;
                  }
                } //Ошибка инициализации CURL, возможно у Вас не установлена библиотека
                return false;
            }

            $info = getIpInfo($_SERVER['REMOTE_ADDR']);
           // echo $info->city; // город
            $region = $info->region; // регион
           // echo $info->district; // федеральный округ РФ


            $view->with('region', $region);*/
        });
    }


    
}
