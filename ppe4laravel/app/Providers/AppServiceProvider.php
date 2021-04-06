<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Poste;

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
        $nbValid = Poste::where('isValide', 0)->get();
        \View::share('nbValid',count($nbValid));
    }
}
