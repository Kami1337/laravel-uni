<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view)
        {
            $view->with('manufacturers', \App\Manufacturer::has('cars')->pluck('name'));
        });
       
        view()->composer('cars.create', function ($view)
        {
            $view->with('manufacturers', \App\Manufacturer::all());
            $view->with('enginetype', \App\Enginetype::all());
            
        });

        view()->composer('cars.edit', function ($view)
        {
            $view->with('manufacturers', \App\Manufacturer::all());    
            $view->with('enginetype', \App\Enginetype::all());       
        });
        
        view()->composer('layouts.header', function ($view)
        {
            $view->with('hours', \App\Hours::all()->where('hours',!NULL));           
        });
        view()->composer('layouts.carousel', function ($view)
        {
            $view->with('cars', \App\Car::all()->where('status',!'1'));    
        });
      
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
}
