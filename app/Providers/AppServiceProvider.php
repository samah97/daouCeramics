<?php

namespace App\Providers;

use App\Actions\ViewReceipientAction;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Voyager;


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
        //Voyager::
        $v = new Voyager();
        $v->addAction(ViewReceipientAction::class);
        Schema::defaultStringLength(191);
        if($this->app->environment('production')){
            URL::forceScheme('https');
        }
    }
}
