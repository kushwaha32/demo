<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Navchild;

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
       
        view()->composer('welcome', function($view){
           $news = Navchild::where('nvparent', '=', 'news')->get();
           $heawes = Navchild::where('nvparent', '=', 'health&welness')->get();
           $fashions = Navchild::where('nvparent', '=', 'fashion')->get();
           $techs = Navchild::where('nvparent', '=', 'tech')->get();
           $business = Navchild::where('nvparent', '=', 'business')->get();
           $view->with(compact('news', 'heawes', 'fashions', 'techs', 'business'));
        });
    }
}
