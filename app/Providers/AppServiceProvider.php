<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
// use App\Models\Admin\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // View::composer('frontend.layouts.master', function($setting){
        //     $setting->with('setting', Setting::find('id',1));
        //     // $view->with('menus', Menu::all());
        // });
     
    }
}
